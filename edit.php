<?php

include 'db.php';

$id = $_GET['id'];

$result = mysqli_query(
    $conn,
    "SELECT * FROM employees WHERE id = $id"
);

$row = mysqli_fetch_assoc($result);

if(isset($_POST['update'])){

    $name = $_POST['name'];
    $email = $_POST['email'];
    $department = $_POST['department'];
    $salary = $_POST['salary'];

    $sql = "UPDATE employees
            SET
            name='$name',
            email='$email',
            department='$department',
            salary='$salary'
            WHERE id=$id";

    mysqli_query($conn, $sql);

    header("Location: index.php");
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Employee</title>
</head>
<body>

<h2>Edit Employee</h2>

<form method="POST">

<input
    type="text"
    name="name"
    value="<?php echo $row['name']; ?>"
    required>

<br><br>

<input
    type="email"
    name="email"
    value="<?php echo $row['email']; ?>"
    required>

<br><br>

<input
    type="text"
    name="department"
    value="<?php echo $row['department']; ?>"
    required>

<br><br>

<input
    type="number"
    step="0.01"
    name="salary"
    value="<?php echo $row['salary']; ?>"
    required>

<br><br>

<button type="submit" name="update">
Update
</button>

</form>

</body>
</html>