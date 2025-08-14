<!-- login.php -->
<!DOCTYPE html>
<html>
<head><title>Login</title></head>
<body>
    <form method="post" action="send_code.php">
        <label>Email:</label><br>
        <input type="email" name="email" required><br>
        <label>Password:</label><br>
        <input type="password" name="password" required><br>
        <input type="checkbox" name="remember"> Remember my email<br>
        <input type="submit" value="Login">
    </form>
</body>
</html>
