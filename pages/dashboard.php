<!-- // File: dashboard.php -->
<?php
include '../config/config.php';
include '../includes/functions.php';
include '../templates/header.php';


if (!isLoggedIn()) {
    header("Location: login.php");
    exit;
}

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['add_user'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $dob = $_POST['dob'];
    $phone = $_POST['phone'];

    $stmt = $pdo->prepare("INSERT INTO users (name, email, date_of_birth, phone) VALUES (?, ?, ?, ?)");
    $stmt->execute([$name, $email, $dob, $phone]);
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
    <title>Dashboard</title>
</head>
<body>
    <div class="container mt-5">
        <h1>Welcome, <?php echo $_SESSION['admin']['name']; ?></h1>
        <!-- <a href="logout.php" class="btn btn-danger">Logout</a> -->
        <div class="col-6 container card shadow-lg bg-warning-subtle">

            <h2 class="mt-4">Add User</h2>
            <form method="POST" class="w-50 mb-3">
                <div class="mb-3">
                    <input type="text" name="name" class="form-control" placeholder="Name" required>
                </div>
                <div class="mb-3">
                    <input type="email" name="email" class="form-control" placeholder="Email" required>
                </div>
                <div class="mb-3">
                    <input type="date" name="dob" class="form-control" required>
                </div>
                <div class="mb-3">
                    <input type="text" name="phone" class="form-control" placeholder="Phone" required>
                </div>
                <button type="submit" name="add_user" class="btn btn-primary">Add User</button>
            </form>
        </div>

        <h2 class="mt-5">User List</h2>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Date of Birth</th>
                    <th>Phone</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $stmt = $pdo->query("SELECT * FROM users");
                while ($user = $stmt->fetch()): ?>
                    <tr>
                        <td><?php echo $user['name']; ?></td>
                        <td><?php echo $user['email']; ?></td>
                        <td><?php echo $user['date_of_birth']; ?></td>
                        <td><?php echo $user['phone']; ?></td>
                        <td>
                        <a href="../pages/edit_user.php?id=<?php echo $user['id']; ?>" class="btn btn-warning btn-sm">Edit</a>
                            <a href="../pages/delete_user.php?id=<?php echo $user['id']; ?>" class="btn btn-danger btn-sm">Delete</a>
                        </td>
                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    </div>
</body>
</html>

<?php
include '../templates/footer.php';
?>