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
        $sql = "SELECT * FROM users WHERE Username = :username";
        $stmt = $db->prepare($sql);

        // Bind the username to the SQL statement
        $stmt->bindParam(':username', $username, PDO::PARAM_STR);
        

        // Execute the SQL statement
        $stmt->execute();

        // Fetch the user from the database
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        // Check if the user exists and the password is correct
        if ($user && password_verify($password, $user['PasswordHash'])) {
            // Store the user's ID in the session
            $_SESSION['UserID'] = $user['UserID'];
            $_SESSION['username'] = $username;
            $_SESSION['AcessLevel'] = $user['AccessLevel'];

            // Redirect the user to their homepage
            header("Location: liquorhomepage.php");
            exit;
        } else {
            // Redirect the user back to the login page with an error message
            header("Location: index.php?error=Invalid username or password");
            exit;
        }
    } else if (isset($_POST["signup"])) {
        // Hash the password
        $passwordHash = password_hash($password, PASSWORD_DEFAULT);

        // Prepare a SELECT statement to check if the username already exists
        $sql = "SELECT * FROM users WHERE Username = :username";
        $stmt = $db->prepare($sql);
        
        // Bind the username to the SQL statement
        $stmt->bindParam(':username', $username, PDO::PARAM_STR);
        
        // Execute the SQL statement
        $stmt->execute();
        
        // Fetch the results
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        
        // If the username already exists, redirect back to the sign up page with an error message
        if ($result) {
            header("Location: signup.php?error=Username already exists.");
            exit;
        }
        
        // If the username does not exist, continue with the sign up process
        // Hash the password
        $passwordHash = password_hash($password, PASSWORD_DEFAULT);
        
        // Prepare an SQL statement to insert the new user into the database
        $sql = "INSERT INTO users (Username, PasswordHash, AccessLevel) VALUES (:username, :password, 1)";
        $stmt = $db->prepare($sql);
        
        // Bind the username and password to the SQL statement
        $stmt->bindParam(':username', $username, PDO::PARAM_STR);
        $stmt->bindParam(':password', $passwordHash, PDO::PARAM_STR);
        
        // Execute the SQL statement
        $stmt->execute();
        
        // Redirect the user back to the login page with a success message
        header("Location: signup.php?success=User created successfully. Please log in using the link below 👇");
        exit;
        
    }
}
?>