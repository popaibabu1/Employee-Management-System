<?php
include('connection.php');

$id = $_GET['id'];

$sql = "SELECT * FROM employee WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows == 0) {
    echo "Employee not found.";
    exit;
}

$employee = $result->fetch_assoc();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $department = $_POST['department'];
    $position = $_POST['position'];
    $hire_date = $_POST['hire_date'];

    $updateSql = "UPDATE employee SET name = ?, email = ?, phone = ?, department = ?, position = ?, hire_date = ? WHERE id = ?";
    $updateStmt = $conn->prepare($updateSql);
    $updateStmt->bind_param("ssssssi", $name, $email, $phone, $department, $position, $hire_date, $id);

    if ($updateStmt->execute()) {
        echo "<script>
        alert('Record Update.');
         window.location='../Employee Management System/index.php';
        </script>";
    } else {
        echo "Error updating record: " . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <title>Edit Employee</title>
</head>
<body class="bg-success">
<div class="container mt-5">
    <h2 class="text-info text-center">Edit Employee</h2>
    <form method="POST">
        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" class="form-control" name="name" id="name" value="<?php echo htmlspecialchars($employee['name']); ?>" required>
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" name="email" id="email" value="<?php echo htmlspecialchars($employee['email']); ?>" required>
        </div>
        <div class="mb-3">
            <label for="phone" class="form-label">Phone</label>
            <input type="text" class="form-control" name="phone" id="phone" value="<?php echo htmlspecialchars($employee['phone']); ?>" required>
        </div>
        <div class="mb-3">
            <label for="department" class="form-label">Department</label>
            <input type="text" class="form-control" name="department" id="department" value="<?php echo htmlspecialchars($employee['department']); ?>" required>
        </div>
        <div class="mb-3">
            <label for="position" class="form-label">Position</label>
            <input type="text" class="form-control" name="position" id="position" value="<?php echo htmlspecialchars($employee['position']); ?>" required>
        </div>
        <div class="mb-3">
            <label for="hire_date" class="form-label">Hire Date</label>
            <input type="date" class="form-control" name="hire_date" id="hire_date" value="<?php echo htmlspecialchars($employee['hire_date']); ?>" required>
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
        <a href="index.php" class="btn btn-secondary">Cancel</a>
    </form>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
