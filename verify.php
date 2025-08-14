<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $input_code = $_POST['code'];
    $expected_code = $_SESSION['2fa_code'] ?? null;

    if ($input_code == $expected_code) {
        echo '<div style="border:1px solid #ccc; padding:20px;">You have entered 2FA secret code correctly. Login Successful!</div>';
    } else {
        echo '<div style="border:1px solid #ccc; padding:20px;">You have entered Wrong 2FA secret code. Login Failed!</div>';
    }
} else {
    header('Location: login.php');
    exit();
}
?>
