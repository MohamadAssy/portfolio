<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
?>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = htmlspecialchars($_POST['name']);
    $email = filter_var($_POST['email'], FILTER_VALIDATE_EMAIL);
    $phone = htmlspecialchars($_POST['phone']);
    $subject = htmlspecialchars($_POST['subject']);
    $message = htmlspecialchars($_POST['message']);

    if ($email) {
        $to = "mhmd8assy@gmail.com";  // Replace with your email
        $headers = "From: " . $email . "\r\n" .
                   "Reply-To: " . $email . "\r\n" .
                   "X-Mailer: PHP/" . phpversion();
        $fullMessage = "Name: $name\nPhone: $phone\n\nMessage:\n$message";

        if (mail($to, $subject, $fullMessage, $headers)) {
            echo "Your message has been sent successfully!";
        } else {
            echo "Failed to send the message. Please try again later.";
        }
    } else {
        echo "Invalid email address. Please enter a valid email.";
    }
}
?>
