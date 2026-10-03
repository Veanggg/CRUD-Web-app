<?php
include 'config.php';

$id = isset($_GET['id']) ? (int) $_GET['id'] : 0;

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = (int) $_POST['id'];
    $task = trim($_POST['task']);

    if ($task != '') {
        $stmt = mysqli_prepare($conn, "UPDATE tasks SET task = ? WHERE id = ?");
        mysqli_stmt_bind_param($stmt, "si", $task, $id);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);
    }

    header("Location: index.php");
    exit;
}

$result = mysqli_query($conn, "SELECT * FROM tasks WHERE id = $id");
$row = mysqli_fetch_assoc($result);

if (!$row) {
    die("Task not found.");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Task</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f5f5f5;
            color: #111827;
        }

        .card {
            border: 1px solid #e5e7eb;
            background-color: #ffffff;
        }

        .btn-success,
        .btn-secondary {
            background-color: #d1d5db;
            border-color: #d1d5db;
            color: #111827;
        }
    </style>
</head>
<body>

<div class="container mt-5" style="max-width: 600px;">
    <div class="card shadow-sm">
        <div class="card-body">
            <h3 class="mb-4">Edit Task</h3>

            <form method="POST">
                <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                <div class="mb-3">
                    <label class="form-label">Task</label>
                    <input type="text" name="task" class="form-control" value="<?php echo htmlspecialchars($row['task']); ?>" required>
                </div>
                <button type="submit" class="btn btn-success">Update</button>
                <a href="index.php" class="btn btn-secondary">Back</a>
            </form>
        </div>
    </div>
</div>

</body>
</html>
