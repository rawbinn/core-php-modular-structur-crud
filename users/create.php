<?php
require_once __DIR__ . '/../core/auth.php';

if (!isLoggedIn()) {
    $_SESSION['error'] = "You must be logged in to access this page";
    redirectToLogin();
}
?>
<h1>Create User</h1>
<form action="actions/store.php" method="POST">
    <label>Name:</label>
    <input type="text" name="name" required><br><br>
    <label>Email:</label>
    <input type="email" name="email" required><br><br>
    <label>Password:</label>
    <input type="password" name="password" required><br><br>
    <input type="submit" value="Create User">
</form>
<a href="index.php">Back to Users</a>