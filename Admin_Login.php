<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <link rel="stylesheet" href="https://unpkg.com/mvp.css"> 
    <link rel="stylesheet" href="main.css">
    <script src="js/header.js"></script>
</head>
<body>
    <form method="post" action="Admin_Authentication.php">
        <img src= "images/login.png" alt="login" width="100" height="100">
        <h2>Welcome Back Admin!</h2>
        Username: <input type="text" name="username" required><br>
        Password: <input type="password" name="password" required><br>
        <?php
        if (isset($_GET['error'])) {
            echo '<p class="error">'.htmlspecialchars($_GET['error'], ENT_QUOTES, 'UTF-8').'</p>';
        }
        ?>
        <input type="submit" name="login" id="log-in" value="Login">
    </form>
    <div id="loginPopup" class="logout-popup">
        <div class="logout-content">
            <h2>Logging in...</h2>
            <div class="loader"></div>
        </div>
    </div>
</body>
</html>