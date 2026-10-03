<?php
include 'config.php';

$id = isset($_GET['id']) ? (int) $_GET['id'] : 0;

if ($id > 0) {
    mysqli_query($conn, "DELETE FROM tasks WHERE id = $id");
}

header("Location: index.php");
exit;
?>
