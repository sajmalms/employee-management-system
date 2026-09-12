<?php

include 'db.php';

if(isset($_POST['submit'])){

    $name = $_POST['name'];
    $email = $_POST['email'];
    $department = $_POST['department'];
    $salary = $_POST['salary'];

    $sql = "INSERT INTO employees
            (name,email,department,salary)
            VALUES
            ('$name','$email','$department','$salary')";

    mysqli_query($conn,$sql);

    header("Location:index.php");
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Add Employee</title>
</head>
<body>

<h2>Add Employee</h2>

<form method="POST">

    Name:<br>
    <input type="text" name="name" required><br><br>

    Email:<br>
    <input type="email" name="email" required><br><br>

    Department:<br>
    <input type="text" name="department" required><br><br>

    Salary:<br>
    <input type="number" step="0.01" name="salary" required><br><br>

    <button type="submit" name="submit">
        Save
    </button>

</form>

</body>
</html>
