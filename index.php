<?php
include 'config/config.php';  // Adjusted path to the config file
include 'includes/functions.php';  // Adjusted path to the functions file

// Check if the admin is logged in
if (isLoggedIn()) {
    // Redirect to the dashboard
    header("Location: pages/dashboard.php");  // Adjusted path to the dashboard
    exit;
} else {
    // Redirect to the login page
    header("Location: pages/login.php");  // Adjusted path to the login
    exit;
}
?>
