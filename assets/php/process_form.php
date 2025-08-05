<?php
require 'db.php';

try {
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $message = $_POST['message'];

        $stmt = $pdo->prepare("INSERT INTO messages (message) VALUES (:message)");
        $stmt->execute(['message' => $message]);

        require 'send_email.php';

        $email_body = "Message:\n$message";
        mail($to, $subject, $email_body, $headers);

        echo 'Message sent successfully!';
    }
} catch (PDOException $e) {
    echo 'Database error: ' . $e->getMessage();
}
?>
