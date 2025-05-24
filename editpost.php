<?php
// Include necessary files
require_once '../includes/db.php';
require_once '../includes/functions.php';

$post_id = $_GET['id'];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $title = $_POST['title'];
    $content = $_POST['content'];

    // Update post in the database
    $stmt = $conn->prepare("UPDATE posts SET title = ?, content = ? WHERE id = ?");
    $stmt->bind_param('ssi', $title, $content, $post_id);
    $stmt->execute();
    $stmt->close();

    header('Location: dashboard.php');
    exit;
}

// Fetch post from the database
$stmt = $conn->prepare("SELECT title, content FROM posts WHERE id = ?");
$stmt->bind_param('i', $post_id);
$stmt->execute();
$stmt->store_result();
$stmt->bind_result($title, $content);
$stmt->fetch();
$stmt->close();
?>

<form method="POST">
    <input type="text" name="title" value="<?= htmlspecialchars($title) ?>" required>
    <textarea name="content" required><?= htmlspecialchars($content) ?></textarea>
    <button type="submit">Update Post</button>
</form>
