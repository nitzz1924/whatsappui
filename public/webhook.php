<?php
require './dbconn.php';
$hubVerifyToken = 'yuvmedia_whatsapp_08';
$accessToken = 'EAAKGjLrP6ccBO0hIdJsj181ycKGCPys6uXU88KPg80seM8Lb7727FTZBtQGqzhnZCccf8x2DwIxFloBZAbQZAxSdZASDOGOoofTCLDUu0ROuuu54D4F8BMkVEiuaF3bNPqfjwOoBNCadgVpZCw2BQkMM3sVFFWQg9NGTdadsKSqgAqXPZChxl1xbMgs0olV0jo06n3iWjKmHXrB09ga1eZAfzCUxRg8ZD';

// Verification for GET request (Webhook verification)
if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['hub_challenge']) && isset($_GET['hub_verify_token']) && $_GET['hub_verify_token'] === $hubVerifyToken) {
    echo $_GET['hub_challenge'];
    exit;
}

// Handling POST request (Webhook event data)
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve the incoming POST data (JSON payload)
    $input = file_get_contents('php://input');

    // Decode the JSON data into a PHP array
    $data = json_decode($input, true);

    // Log or process the webhook data here (for debugging, you can log it)
    file_put_contents('webhook_log.txt', print_r($data, true), FILE_APPEND);

    // Now you can access specific fields from $data and process them as needed
    if (isset($data['entry'][0]['changes'][0]['value']['messages'][0])) {
        $message = $data['entry'][0]['changes'][0]['value']['messages'][0];
        $displyphonenumber = $data['entry'][0]['changes'][0]['value']['metadata']['display_phone_number'];

        // Example: Get the message text and sender's phone number
        $messageText = $message['text']['body'] ?? '';
        $senderPhone = $message['from'] ?? '';

        // Prepare and bind the SQL statement
        $stmt = $conn->prepare("INSERT INTO messages (senderid, type, message, recievedid, created_at, updated_at) VALUES (?, ?, ?, ?, ?, ?)");

        // Check if the statement was prepared correctly
        if (!$stmt) {
            die("Prepare failed: " . $conn->error);
        }

        // Variables to insert
        $type = "Recieved";  // Replace with the actual type value
        $messagerec = json_encode($message);  // Replace with the actual message
        $recievedid =  $displyphonenumber;
        $senderid = $senderPhone;  // Replace with the actual message
        $created_at = date('Y-m-d H:i:s');  // Get the current timestamp
        $updated_at = date('Y-m-d H:i:s');  // Same for updated_at

        // Bind parameters: "s" for string, "i" for integer (adjust according to your column types)
        $stmt->bind_param( "ssssss", $senderid,$type, $messagerec, $recievedid, $created_at, $updated_at);

        // Execute the query
        if ($stmt->execute()) {
            echo "New record inserted successfully!";
        } else {
            echo "Error: " . $stmt->error;
        }
        $stmt->close();

    }

    // Respond to WhatsApp with a 200 status code (required to acknowledge receipt)
    http_response_code(200);
    echo json_encode(['status' => 'success']);
    exit;
}
