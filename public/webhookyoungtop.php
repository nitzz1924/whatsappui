<?php
$hubVerifyToken = 'young_toppers_164';
$accessToken = 'EAAGcPLPwmicBO3JeochtkTAnnULmMOSg381NbjNHhHEcxhZA3kokBBBeeoKCqHZBYBwNwfmIF7tZCiVbBrbZB3FwX5LVoGIBX0S2FNhxBr9c6GpVA83fDANAdVuRElZCSj0JVTI12cbGv1hEzykpEZCn4UczhZAK2w6a0niDFnczzZCFf4sEW9OVQnZBrDsf9vHuO';

require './dbconn.php'; // Include your database connection configuration

// Webhook Verification
if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['hub_challenge']) && isset($_GET['hub_verify_token']) && $_GET['hub_verify_token'] === $hubVerifyToken) {
    echo $_GET['hub_challenge'];
    exit;
}

// Webhook Event Handling (POST)
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $input = file_get_contents('php://input'); // Retrieve the raw POST body
    $data = json_decode($input, true); // Decode JSON payload
    logMessage("Incoming Webhook Data: " . json_encode($data), 'info');

    // Log incoming webhook data for debugging
    file_put_contents('webhook_log.txt', print_r($data, true), FILE_APPEND);

    // Check if the message structure exists

    if (isset($data['entry'][0]['changes'][0]['value']['messages'][0])) {
        $message = $data['entry'][0]['changes'][0]['value']['messages'][0];
        $displayPhoneNumber = $data['entry'][0]['changes'][0]['value']['metadata']['display_phone_number'] ?? '';

        // Extract message details
        $messageText = $message['text']['body'] ?? '';
        $senderPhone = $message['from'] ?? '';


        //--------------------Image Functionality Starts--------------------

        function getMediaUrl($mediaId, $accessToken)
        {
            $url = "https://graph.facebook.com/v17.0/{$mediaId}";
            $headers = [
                "Authorization: Bearer {$accessToken}"
            ];

            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, $url);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

            $response = curl_exec($ch);
            curl_close($ch);

            return json_decode($response, true);
        }

        $comingmediaid = $data['entry'][0]['changes'][0]['value']['messages'][0]['image']['id'];
        logMessage("Coming Image ID :  $comingmediaid", 'error');
        $accessTokenmedia = $accessToken; // Your Page Access Token

        $mediaData = getMediaUrl($comingmediaid, $accessTokenmedia);
        $imageUrl = $mediaData['url'];


        //--------------------Image Functionality Ends--------------------


        // **Retrieve User ID from `register_users` Table**
        $userid = null;

        $query = "SELECT id FROM register_users WHERE mobilenumber = ?";
        $stmt = $conn->prepare($query);

        if (!$stmt) {
            logMessage("SQL Prepare failed: " . $conn->error, 'error');
            http_response_code(500);
            echo json_encode(['status' => 'error', 'message' => 'Database error']);
            exit;
        }

        $stmt->bind_param("s", $displayPhoneNumber);
        $stmt->execute();
        $stmt->bind_result($userid);
        $stmt->fetch();
        $stmt->close();

        if (!$userid) {
            logMessage("Error: No user found for phone number: $displayPhoneNumber", 'error');
            http_response_code(404);
            echo json_encode(['status' => 'error', 'message' => 'User not found']);
            exit;
        }
        // **Insert Message into `messages` Table**
        $insertQuery = "INSERT INTO messages (userid, senderid, type, message,  imageurl, recievedid, created_at, updated_at) 
                        VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
        $stmt = $conn->prepare($insertQuery);

        if (!$stmt) {
            logMessage("SQL Prepare failed: " . $conn->error, 'error');
            http_response_code(500);
            echo json_encode(['status' => 'error', 'message' => 'Database error']);
            exit;
        }

        // Prepare data for insertion
        $type = "Received";
        $messagerec = json_encode($message);
        $receivedid = $displayPhoneNumber;
        $created_at = date('Y-m-d H:i:s');
        $updated_at = date('Y-m-d H:i:s');

        $stmt->bind_param("ssssssss", $userid, $senderPhone, $type, $messagerec, $imageUrl ,$receivedid, $created_at, $updated_at);

        // Execute the query and log results
        if ($stmt->execute()) {
            logMessage("Success: Message inserted for SenderID: $senderPhone, UserID: $userid");
            http_response_code(200);
            echo json_encode(['status' => 'success']);
        } else {
            logMessage("Error: Message insert failed. Error: " . $stmt->error, 'error');
            http_response_code(500);
            echo json_encode(['status' => 'error', 'message' => 'Failed to insert message']);
        }

        $stmt->close();
    } else {
        logMessage("Error: Invalid message structure in webhook data.", 'error');
        http_response_code(400);
        echo json_encode(['status' => 'error', 'message' => 'Invalid message data']);
    }

    exit;
}

/**
 * Log messages to a file.
 *
 * @param string $message The message to log.
 * @param string $type The type of log ('success' or 'error').
 */
function logMessage($message, $type = 'success')
{
    $logFile = __DIR__ . '/messagelog.txt';
    $timestamp = date('Y-m-d H:i:s');
    $logType = strtoupper($type);
    $logEntry = "[$timestamp] [$logType] $message" . PHP_EOL;

    file_put_contents($logFile, $logEntry, FILE_APPEND);
}
