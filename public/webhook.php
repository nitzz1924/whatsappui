<?php
require './dbconn.php';
// Configuration
$hubVerifyToken = 'yuvmedia_whatsapp_08';
$accessToken = 'EAAKGjLrP6ccBO0hIdJsj181ycKGCPys6uXU88KPg80seM8Lb7727FTZBtQGqzhnZCccf8x2DwIxFloBZAbQZAxSdZASDOGOoofTCLDUu0ROuuu54D4F8BMkVEiuaF3bNPqfjwOoBNCadgVpZCw2BQkMM3sVFFWQg9NGTdadsKSqgAqXPZChxl1xbMgs0olV0jo06n3iWjKmHXrB09ga1eZAfzCUxRg8ZD';
// Webhook Verification
if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['hub_challenge']) && isset($_GET['hub_verify_token']) && $_GET['hub_verify_token'] === $hubVerifyToken) {
    echo $_GET['hub_challenge'];
    exit;
}
// Webhook Event Handling (POST)
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $input = file_get_contents('php://input'); // Retrieve the raw POST body
    $data = json_decode($input, true); // Decode JSON payload

    // Log incoming webhook data for debugging
    file_put_contents('webhook_log.txt', print_r($data, true), FILE_APPEND);

    // Check if the message structure exists
    if (isset($data['entry'][0]['changes'][0]['value']['messages'][0])) {
        $message = $data['entry'][0]['changes'][0]['value']['messages'][0];
        $displayPhoneNumber = $data['entry'][0]['changes'][0]['value']['metadata']['display_phone_number'] ?? '';

        // Extract message details
        $messageText = $message['text']['body'] ?? '';
        $senderPhone = $message['from'] ?? '';

        // **Retrieve User ID from register_users Table**
        $userid = null;

        // Simplified query to fetch ID
        $query = "SELECT id FROM register_users WHERE mobilenumber = $displayPhoneNumber";
        $stmt = $conn->prepare($query);
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

        // **Insert Message into messages Table**
        $stmt = $conn->prepare("INSERT INTO messages (userid, senderid, type, message, recievedid, created_at, updated_at) 
                                VALUES (?, ?, ?, ?, ?, ?, ?)");

        if (!$stmt) {
            logMessage("SQL Prepare failed: " . $conn->error, 'error');
            http_response_code(500);
            echo json_encode(['status' => 'error', 'message' => 'Database error']);
            exit;
        }

        // Bind values
        $type = "Received";
        $messagerec = json_encode($message);
        $receivedid = $displayPhoneNumber;
        $created_at = date('Y-m-d H:i:s');
        $updated_at = date('Y-m-d H:i:s');

        // Bind parameters
        $stmt->bind_param("sssssss", $userid, $senderPhone, $type, $messagerec, $receivedid, $created_at, $updated_at);

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
function logMessage($message, $type = 'success') {
    $logFile = __DIR__ . '/messagelog.txt';
    $timestamp = date('Y-m-d H:i:s');
    $logType = strtoupper($type);
    $logEntry = "[$timestamp] [$logType] $message" . PHP_EOL;

    file_put_contents($logFile, $logEntry, FILE_APPEND);
}
