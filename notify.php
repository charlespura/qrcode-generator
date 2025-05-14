<?php
require 'mail.php';  // Include your mail.php file

$data = json_decode(file_get_contents("php://input"));

if (!$data || !isset($data->email) || !isset($data->name)) {
    http_response_code(400);
    echo json_encode(["error" => "Invalid request"]);
    exit;
}

// Get email and name from the request
$email = $data->email;
$name = $data->name;

// Define the subject and message for the email
$subject = "Your QR Code Was Scanned!";
$message = "<h3>Hello {$name},</h3><p>Your QR code was just scanned. Someone visited your profile.</p>";

// Call the send_mail function to send the email
send_mail($email, $subject, $message);

// Respond with a success message
echo json_encode(["success" => true]);
?>
