<?php
include '../config/config.php';
include '../includes/functions.php';
include '../includes/header.php';

if (!isLoggedIn()) {
    header("Location: login.php");
    exit;
}

$id = $_GET['id'];
$stmt = $pdo->prepare("SELECT * FROM users WHERE id = ?");
$stmt->execute([$id]);
$user = $stmt->fetch();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $dob = $_POST['dob'];
    $phone = $_POST['phone'];

    $stmt = $pdo->prepare("UPDATE users SET name = ?, email = ?, date_of_birth = ?, phone = ? WHERE id = ?");
    $stmt->execute([$name, $email, $dob, $phone, $id]);

    header("Location: dashboard.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Edit User</title>
</head>
<body>
    <div class="container mt-5">
        <h1>Edit User</h1>
        <form method="POST" class="w-50">
            <div class="mb-3">
                <input type="text" name="name" class="form-control" value="<?php echo $user['name']; ?>" required>
            </div>
            <div class="mb-3">
                <input type="email" name="email" class="form-control" value="<?php echo $user['email']; ?>" required>
            </div>
            <div class="mb-3">
                <input type="date" name="dob" class="form-control" value="<?php echo $user['date_of_birth']; ?>" required>
            </div>
            <div class="mb-3">
                <input type="text" name="phone" class="form-control" value="<?php echo $user['phone']; ?>" required>
            </div>
            <button type="submit" class="btn btn-primary">Update User</button>
        </form>
    </div>
</body>
</html>
<?php
include '../includes/footer.php';
?>