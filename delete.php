<?php
// Include necessary files
require_once '../includes/db.php';
require_once '../includes/functions.php';

$post_id = $_GET['id'];

// Delete post from the database
$stmt = $conn->prepare("DELETE FROM posts WHERE id = ?");
$stmt->bind_param('i', $post_id);
$stmt->execute();
$stmt->close();

header('Location: dashboard.php');
exit;
