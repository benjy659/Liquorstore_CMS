<?php
// Start a session
session_start();



// Include your database configuration file
require ('connect.php');

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the username and password from the form
    $username = $_POST['username'];
    $password = $_POST['password'];

    if (isset($_POST["login"])) {
        // Prepare an SQL statement to get the user from the database
        $sql = "SELECT * FROM admins WHERE Username = :username";
        $stmt = $db->prepare($sql);

        // Bind the username to the SQL statement
        $stmt->bindParam(':username', $username, PDO::PARAM_STR);
        

        // Execute the SQL statement
        $stmt->execute();

        // Fetch the user from the database
        $admin = $stmt->fetch(PDO::FETCH_ASSOC);

        // Check if the user exists and the password is correct
        if ($admin && password_verify($password, $admin['PasswordHash'])) {
            // Store the user's ID in the session
            $_SESSION['AdminID'] = $admin['AdminID'];
            $_SESSION['username'] = $username;
            $_SESSION['AccessLevel'] = $admin['AccessLevel'];

            // Redirect the user to their homepage
            header("Location: admin_dashboard.php");
            exit;
        } else {
            // Redirect the user back to the login page with an error message
            header("Location: Admin_login.php?error=Invalid username or password");
            exit;
        }
    }
}
?>
