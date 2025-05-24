<?php
// Include necessary files
require_once '../includes/db.php';
require_once '../includes/functions.php';

session_start();
if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit;
}

$user_id = $_SESSION['user_id'];

// Fetch posts from the database
$stmt = $conn->prepare("SELECT id, title, created_at FROM posts WHERE user_id = ?");
$stmt->bind_param('i', $user_id);
$stmt->execute();
$stmt->store_result();
$stmt->bind_result
::contentReference[oaicite:1]{index=1}
 
