<?php
include 'db.php';

$countQuery = mysqli_query(
    $conn,
    "SELECT COUNT(*) as total FROM employees"
);

$countData = mysqli_fetch_assoc($countQuery);

$totalEmployees = $countData['total'];

if(isset($_GET['search'])){

    $search = $_GET['search'];

    $result = mysqli_query(
        $conn,
        "SELECT * FROM employees
         WHERE name LIKE '%$search%'
         OR department LIKE '%$search%'"
    );

}else{

    $result = mysqli_query(
        $conn,
        "SELECT * FROM employees"
    );
}
?>

<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="style.css">
    <title>Employee Management System</title>
</head>
<body>

<h2>Employee Management System</h2>

<a href="add.php">Add Employee</a>

<br><br>

<h3>Total Employees:
<?php echo $totalEmployees; ?>
</h3>

<form method="GET">

    <input
        type="text"
        name="search"
        placeholder="Search employee">

    <button type="submit">
        Search
    </button>

</form>

<br>

<table border="1" cellpadding="10">
    <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Email</th>
        <th>Department</th>
        <th>Salary</th>
        <th>Actions</th>
    </tr>

    <?php while($row = mysqli_fetch_assoc($result)){ ?>

    <tr>
        <td><?php echo $row['id']; ?></td>
        <td><?php echo $row['name']; ?></td>
        <td><?php echo $row['email']; ?></td>
        <td><?php echo $row['department']; ?></td>
        <td><?php echo $row['salary']; ?></td>

        <td>
            <a href="edit.php?id=<?php echo $row['id']; ?>">Edit</a>
            |
            <a href="delete.php?id=<?php echo $row['id']; ?>" onclick="return confirm('Delete this employee?')">Delete</a>
        </td>
    </tr>

    <?php 
    } ?>

</table>

</body>
</html>