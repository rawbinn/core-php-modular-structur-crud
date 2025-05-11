<?php
require_once __DIR__ . '/../helpers/user.php';
require_once __DIR__ . '/../core/auth.php';

if (!isLoggedIn()) {
    $_SESSION['error'] = "You must be logged in to access this page";
    redirectToLogin();
}

$id = $_GET['id'] ?? null;
if (!$id) {
    die("User ID is missing.");
}

$user = getUserById($id);

if (!$user) {
    die("User not found.");
}
?>

<h1>Edit User</h1>
<form action="actions/update.php" method="POST">
    <input type="hidden" name="id" value="<?= $user['id'] ?>">
    <label>Name:</label>
    <input type="text" name="name" value="<?= htmlspecialchars($user['name']) ?>" required><br><br>
    <label>Email:</label>
    <input type="email" name="email" value="<?= htmlspecialchars($user['email']) ?>" required><br><br>
    <label>Password:</label>
    <input type="password" name="password"><br><br>
    <input type="submit" value="Update User">
</form>
<a href="index.php">Back to Users</a>