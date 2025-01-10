<!-- // File: functions.php -->
<?php
session_start();

function encryptPassword($password) {
    return password_hash($password, PASSWORD_BCRYPT);
}

function isLoggedIn() {
    return isset($_SESSION['admin']);
}
?>