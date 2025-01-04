<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;
use GuzzleHttp\Promise;
use GuzzleHttp\Promise\Utils;
use Auth;
use Log;
use App\Models\Contact;
use Exception;

class WhatsAppController extends Controller
{
    protected $client;
    protected $apiUrl;
    protected $accessToken;

    public function __construct()
    {
        $loggedinuser = Auth::guard('customer')->user();
        $phonenumberid = $loggedinuser->phonenumberid;
        $this->client = new Client();
        $this->apiUrl = "https://graph.facebook.com/v20.0/{$phonenumberid}/messages";
        $this->accessToken = $loggedinuser->apptoken;
        // dd( $this->accessToken);
    }

    public function handleWebhooknew(Request $request)
    {
       
        $loggedinuser = Auth::guard('customer')->user();
        if (!$loggedinuser) {
            return redirect()->route('userloginpage')->with('error', 'You must be logged in to perform this action.');
        }
        $contacts = Contact::where('userid',$loggedinuser->id)->where('type', '=', $request->modulename)->where('status', $request->segmentname)->get();
        $mediaimage = '';
        if ($request->hasFile('mediaimage') && $request->file('mediaimage')->isValid()) {
            $bannerimage = $request->file('mediaimage');
            $uniqueFileName = uniqid() . '_' . time() . '.' . $bannerimage->getClientOriginalExtension();
            $uploadedPath = 'assets/images/templates';
            // Move the uploaded image to the public directory
            $bannerimage->move(public_path($uploadedPath), $uniqueFileName);
            // Store the full image path
            $mediaimage = url("{$uploadedPath}/{$uniqueFileName}");
        }
        $promises = [];
        foreach ($contacts as $contact) {
            try {
                $promises[] = $this->sendMessage(
                    $contact->phonenumber,
                    $request->template,
                    $mediaimage,
                    $request->mediatype,
                    $request->languagetype
                );
            } catch (Exception $e) {
                Log::error('Error sending message for contact: ' . $contact->id, [
                    'message' => $e->getMessage()
                ]);
            }
        }
        // dd($promises);
        $results = Utils::settle($promises)->wait();
        // dd($results);

        foreach ($results as $result) {
            if ($result['state'] === 'rejected') {
                Log::error('Promise rejected', ['reason' => $result['reason']]);
            } else {
                Log::info('Message sent successfully', ['response' => $result['value']]);
            }
        }

        return back()->with('success', 'Message sent successfully!');
    }

    protected function sendMessage($phone, $templateid, $mediaimage, $mediatype, $languagetype)
    {
        try {
            $data = [
                'messaging_product' => 'whatsapp',
                'to' => $phone,
                'type' => 'template',
                'template' => [
                    'name' => $templateid,
                    'language' => [
                        'code' => $languagetype ?: 'en',
                    ],
                    'components' => []
                ]
            ];
            // Add media to the template if available
            if ($mediaimage && $mediatype) {
                $data['template']['components'][] = [
                    'type' => 'header',
                    'parameters' => [
                        [
                            'type' => $mediatype,
                            $mediatype => [
                                'link' => $mediaimage
                            ]
                        ]
                    ]
                ];
            }
            // Log the data being sent
            Log::info('Sending WhatsApp message', ['data' => $data]);
            // Send the message using an async request
            $response = $this->client->postAsync($this->apiUrl, [
                'headers' => [
                    'Authorization' => 'Bearer ' . $this->accessToken,
                    'Content-Type' => 'application/json',
                ],
                'json' => $data,
            ]);
            // Wait for the response and handle success or failure
            $response = $response->wait();
            if ($response->getStatusCode() !== 200) {
                Log::error('Error sending message', [
                    'status' => $response->getStatusCode(),
                    'body' => $response->getBody()->getContents(),
                ]);
            } else {
                Log::info('Message sent successfully', [
                    'status' => $response->getStatusCode(),
                    'body' => $response->getBody()->getContents(),
                ]);
            }
        } catch (\Exception $e) {
            // Log the exception details
            Log::error('Exception occurred while sending message', [
                'error' => $e->getMessage(),
                'trace' => $e->getTraceAsString(),
            ]);
        }
    }

}
