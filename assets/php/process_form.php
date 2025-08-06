<?php
require 'db.php';

try {
    require 'send_email.php';

        $email_body = "Message:\n$message";
        mail($to, $subject, $email_body, $headers);

        echo 'Message sent successfully!';
} catch (PDOException $e) {
    echo 'Database error: ' . $e->getMessage();
}
?>
