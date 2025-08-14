<?php
session_start();

$valid_email = 'bdhhmugdho@gmail.com'; // Use your RMIT email here
$valid_password = '1234';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];
    if ($email === $valid_email && $password === $valid_password) {
        // Generate 6-digit code
        $code = rand(100000, 999999);
        $_SESSION['2fa_code'] = $code;
        $_SESSION['email'] = $email;

        // Email sending logic
        $subject = "Your verification code";
        $body = "You need provide the following code to login.\nYour verification code is: $code";

        // For demo: uses PHP's mail() function; for production, consider PHPMailer
        mail($email, $subject, $body);

        // Show code input form
        echo '
        <form method="post" action="verify.php">
            <p>We have sent a secret code to your email.</p>
            <p>Please check your email and insert the code in the following input field:</p>
            <label>Two Factor Authentication Code:</label>
            <input type="text" name="code" required>
            <input type="submit" value="Verify Code">
        </form>
        ';
    } else {
        echo "Invalid login!";
    }
} else {
    header('Location: login.php');
    exit();
}
?>
