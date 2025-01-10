<?php
include '../config/config.php';
include '../includes/functions.php';
include '../templates/header.php';
if (!isLoggedIn()) {
    header("Location: login.php");
    exit;
}

$id = $_GET['id'];
$stmt = $pdo->prepare("DELETE FROM users WHERE id = ?");
$stmt->execute([$id]);

header("Location: dashboard.php");
exit;
?>
<?php
include '../templates/footer.php';
?>