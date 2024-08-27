<!DOCTYPE html>
<html>
<head>
    <title>Sign Up</title>
    <link rel="stylesheet" href="main.css">
    <script src="js/header.js"></script>
</head>
<body>
    <form method="post" action="Authenticate.php">
        <img src= "images/liquor-store.jpg" alt="login" width="100" height="100">
        <h2>Sign Up</h2>
        <input type="text" name="username" placeholder="Username" required>
        <input type="password" name="password" placeholder="Password" required>
        <?php
        if (isset($_GET['error'])) {
            echo '<p class="error">'.htmlspecialchars($_GET['error'], ENT_QUOTES, 'UTF-8').'</p>';
        }
        else if (isset($_GET['success'])) {
            echo '<p class="success">'.htmlspecialchars($_GET['success'], ENT_QUOTES, 'UTF-8').'</p>';
        }
        ?>
        <input type="submit" name="signup" value="Sign Up">
        <div class="signup">
            <p>Already have an account? <a href="index.php">Login</a></p>
        </div>
    </form>
</body>
</html>