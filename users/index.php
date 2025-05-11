<?php
require_once __DIR__ . '/../core/auth.php';
require_once __DIR__ . '/../helpers/user.php';

if (!isLoggedIn()) {
    $_SESSION['error'] = "You must be logged in to access this page";
    redirectToLogin();
}

$users = getUsers();

?>
<h1>Users</h1>
<a href="create.php">Create New User</a>
<table border="1">
    <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Email</th>
        <th>Actions</th>
    </tr>
    <?php foreach ($users as $user): ?>
        <tr>
            <td><?= $user['id'] ?></td>
            <td><?= htmlspecialchars($user['name']) ?></td>
            <td><?= htmlspecialchars($user['email']) ?></td>
            <td>
                <a href="edit.php?id=<?= $user['id'] ?>">Edit</a> |
                <a href="actions/delete.php?id=<?= $user['id'] ?>" onclick="return confirm('Are you sure?')">Delete</a>
            </td>
        </tr>
    <?php endforeach; ?>
</table>