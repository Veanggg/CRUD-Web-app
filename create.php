<?php
include 'config.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $task = trim($_POST['task']);

    if ($task != '') {
        $stmt = mysqli_prepare($conn, "INSERT INTO tasks (task) VALUES (?)");
        mysqli_stmt_bind_param($stmt, "s", $task);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);
    }
}

header("Location: index.php");
exit;
?>
