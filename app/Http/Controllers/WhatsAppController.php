<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;
use GuzzleHttp\Promise;
use GuzzleHttp\Promise\Utils;
use App\Models\Template;
use Auth;
use App\Models\Campaign;
use App\Models\Message;
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
        $contacts = Contact::where('userid', $loggedinuser->id)->where('type', '=', $request->modulename)->where('status', $request->segmentname)->get();
        $mediaimage =asset("assets/images/Media/{$request->mediaimage}");
        // dd($mediaimage);
        $templatedata = Template::where('name', $request->template)->where('userid', $loggedinuser->id)->first();

        $promises = [];
        foreach ($contacts as $contact) {
            try {
                $promises[] = $this->sendMessage(
                    $contact->phonenumber,
                    $request->template,
                    $mediaimage,
                    $request->mediatype,
                    $request->languagetype,
                    $templatedata->components,
                    $request->campaignname,
                );
            } catch (Exception $e) {
                Log::error('Error sending message for contact: ' . $contact->id, [
                    'message' => $e->getMessage()
                ]);
            }
        }
        $results = Utils::settle($promises)->wait();
        // dd($results);

        foreach ($results as $result) {
            if ($result['state'] === 'rejected') {

                Log::error('Promise rejected', ['reason' => $result['reason']]);
            } else {
                Log::info('Message sent successfully', ['response' => $result['value']]);
            }
        }

        $data = Campaign::create([
            'campaignname' => $request->campaignname,
            'modulename' => $request->modulename,
            'template' => $request->template,
            'segmentname' => $request->segmentname,
            'userid' => $loggedinuser->id,
            'sendimmediate' => $request->sendimmediate,
            'scheduledatetime' => $request->scheduledatetime,
            'datetime' => $request->datetime,
            'mediatype' => $request->mediatype,
            'languagetype' => $request->languagetype,
            'mediaimage' => $mediaimage != null ? $mediaimage : null,
        ]);
        return back()->with('success', 'Message sent successfully!');
    }

    protected function sendMessage($phone, $templateid, $mediaimage, $mediatype, $languagetype, $components,$campaign_name)
    {
        $loggedinuser = Auth::guard('customer')->user();
        if (!$loggedinuser) {
            return redirect()->route('userloginpage')->with('error', 'You must be logged in to perform this action.');
        }
        $successfulRecipients = [];
        $failedRecipients = [];
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
        //    dd(  $data);
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
                $data = Message::create([
                    'userid' => $loggedinuser->id,
                    'templatename' => $templateid,
                    'campaignname' => $campaign_name,
                    'imageurl' => $mediaimage,
                    'type' => 'Sent',
                    'senderid' => $loggedinuser->mobilenumber,
                    'recievedid' => str_replace('+', '', $phone),
                    'message' => $components,
                ]); 
                $successfulRecipients[] = [// Replace with actual variable for recipient name
                    'mobile' => $phone,
                ];
            }
        } catch (Exception $e) {
            // Log the exception details
            Log::error('Exception occurred while sending message', [
                'error' => $e->getMessage(),
                'trace' => $e->getTraceAsString(),
            ]);
            $failedRecipients[] = [
                'mobile' => $phone,
            ];
        }
        Log::info('Successful Recipients:', $successfulRecipients);
        Log::error('Failed Recipients:', $failedRecipients);

    }

}
