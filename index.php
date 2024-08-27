<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <link rel="stylesheet" href="https://unpkg.com/mvp.css"> 
    <link rel="stylesheet" href="main.css">
    <script src="js/header.js"></script>
</head>
<body>
    <form method="post"  action="Authenticate.php">
        <img src= "images/liquor-store.jpg" alt="login" width="100" height="100">
        <p>Admin? <a href="admin_login.php">Login here</a></p>
        <h2>Welcome!</h2>
        Username: <input type="text" name="username" required><br>
        Password: <input type="password" name="password" required><br>
        <?php
        if (isset($_GET['error'])) {
            echo '<p class="error">'.htmlspecialchars($_GET['error'], ENT_QUOTES, 'UTF-8').'</p>';
        }
        ?>
        <input type="submit" name="login" id="log-out" value="Login">
        <div class="signup">
            <p>Don't have an account? <a href="signup.php">Sign up</a></p>
        </div>
    </form>
</body>
</html>