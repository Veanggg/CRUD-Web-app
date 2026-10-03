<?php
include 'config.php';

$result = mysqli_query($conn, "SELECT * FROM tasks ORDER BY id DESC");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>To-Do List</title>
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

        .btn-primary,
        .btn-warning,
        .btn-danger,
        .btn-success,
        .btn-secondary {
            background-color: #d1d5db;
            border-color: #d1d5db;
            color: #111827;
        }

        .table-dark {
            background-color: #4b5563;
        }
    </style>
</head>
<body>

<div class="container mt-5" style="max-width: 800px;">
    <div class="card shadow-sm">
        <div class="card-body">
            <h2 class="text-center mb-4">To-Do List</h2>

            <form action="create.php" method="POST" class="d-flex gap-2 mb-4">
                <input type="text" name="task" class="form-control" placeholder="Enter a task" required>
                <button type="submit" class="btn btn-primary">Add</button>
            </form>

            <table class="table table-bordered align-middle">
                <thead class="table-dark">
                    <tr>
                        <th width="10%">ID</th>
                        <th>Task</th>
                        <th width="25%">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (mysqli_num_rows($result) > 0): ?>
                        <?php while ($row = mysqli_fetch_assoc($result)): ?>
                            <tr>
                                <td><?php echo $row['id']; ?></td>
                                <td><?php echo htmlspecialchars($row['task']); ?></td>
                                <td>
                                    <a href="update.php?id=<?php echo $row['id']; ?>" class="btn btn-warning btn-sm">Edit</a>
                                    <a href="delete.php?id=<?php echo $row['id']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Delete this task?')">Delete</a>
                                </td>
                            </tr>
                        <?php endwhile; ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="3" class="text-center">No tasks yet.</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

</body>
</html>
