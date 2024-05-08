<?php

session_start(); // Start the session

// Check if the user is logged in, redirect to login page if not logged in
function checkLoggedIn() {
    if (!isset($_SESSION['user_id'])) {
        header("Location: login.php"); // Redirect to login page
        exit();
    }
}

// Call checkLoggedIn() on restricted pages to enforce authentication
checkLoggedIn();


// Function to logout
function logout() {
    // Unset all session variables
    $_SESSION = array();

    // Destroy the session
    session_destroy();

    // Redirect to the login page or any other desired page after logout
    header("Location: login.php"); // Redirect to your login page
    exit();
}

// Check if the logout parameter exists in the URL
if (isset($_GET['logout'])) {
    logout(); // Call the logout function when the user clicks on the logout link or button
}
?>
