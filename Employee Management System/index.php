<?php
include('connection.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <title>Employee Management System</title>
</head>
<body class="bg-dark">
<div class="container mt-5">
    <h2 class=" text-info text-center mb-4">Employee Management System</h2>
    <a href="add_employee.php" class="btn btn-primary mb-3">Add Employee</a>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Department</th>
                <th>Position</th>
                <th>Hire Date</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $sql = "SELECT * FROM employee";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>
                        <td>{$row['id']}</td>
                        <td>{$row['name']}</td>
                        <td>{$row['email']}</td>
                        <td>{$row['phone']}</td>
                        <td>{$row['department']}</td>
                        <td>{$row['position']}</td>
                        <td>{$row['hire_date']}</td>
                        <td>
                            <a href='edit_employee.php?id={$row['id']}' class='btn btn-warning btn-sm'>Edit</a>
                            <a href='delete_employee.php?id={$row['id']}' class='btn btn-danger btn-sm'>Delete</a>
                        </td>
                    </tr>";
                }
            } else {
                echo "<tr><td colspan='8' class='text-center'>No employees found</td></tr>";
            }
            ?>
        </tbody>
    </table>
</div>
</body>
</html>