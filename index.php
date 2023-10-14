<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $data = json_decode(file_get_contents('php://input'), true);
    $message = $data['message'];

    // Send the email
    $to = 'lewismachabe@gmail.com';
    $subject = 'New Message';
    $headers = 'From: your-email@example.com' . "\r\n" .
        'Reply-To: your-email@example.com' . "\r\n" .
        'Content-Type: text/plain; charset=UTF-8' . "\r\n";

    if (mail($to, $subject, $message, $headers)) {
        http_response_code(200);
    } else {
        http_response_code(500);
    }
} else {
    http_response_code(400);
}
?>
