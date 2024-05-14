<?php 
session_start();

include 'db.php';
$id=0;
$update=false;
$name="";
$department="";
$position="";
$salary="";

//INSERT NEW RECORDS

if(isset($_POST['save'])){
    $name=$_POST['names'];
    $department=$_POST['department'];
    $position=$_POST['position'];
    $salary=$_POST['salary'];
    $insert=$conn->query("INSERT INTO `employee`(`emp_id`, `names`, `department`, `position`, `salary`) VALUES ('','$name','$department','$position','$salary')");
    if($insert){
        $name="";
        $department="";
        $position="";
        $salary="";
    }


}

//UPDATE CODES

if(isset($_GET['edit'])){
    $id=$_GET['edit'];
    $update=true;
    $select=$conn->query("SELECT * FROM employee WHERE emp_id = '$id'");
    if(mysqli_num_rows($select)){
        $row=$select->fetch_assoc();
        $name=$row['names'];
        $department=$row['department'];
        $position=$row['position'];
        $salary=$row['salary'];

    }
}

if (isset($_POST['update'])) {
    $name=$_POST['names'];
    $department=$_POST['department'];
    $position=$_POST['position'];
    $salary=$_POST['salary'];

    $q=$conn->query("UPDATE `employee` SET `names`='$name',`department`='$department',`position`='$position',`salary`='$salary' WHERE `emp_id`='$id'");
    if($q){
        $name="";
        $department="";
        $position="";
        $salary="";
        $update=false;
    }

}

?>

<?php 
if(empty($_SESSION['names'])){
    header('location:login.php');
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Manage Employees</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        form {
            max-width: 400px;
            margin: 0 auto;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
            background-color: #f9f9f9;
            margin-bottom: 20px;
        }
        h1 {
            text-align: center;
        }
        label {
            display: block;
            margin-bottom: 10px;
        }
        input[type="text"],
        input[type="password"] {
            width: 100%;
            padding: 8px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }
        button, .button {
            background-color: #4CAF50;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            width: 100%;
        }
        button:hover {
            background-color: #45a049;
        }
        a{
            text-decoration: none;
            color: blue;
            align-items: center;
        }
        a:hover{
            color: green;
            background-color: white;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
        .logout{
            position: absolute;
            top: 30px;
            background-color: red;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
    </style>
</head>
<body>
    <a href="logout.php" class="logout">Log out</a>
    <h1>Manage Employees user: <?php echo $_SESSION['names']; ?></h1>
    <form action="report.php" method="post">
        <input type="submit" value="GENERATE REPORT" name="report" class="button">
    </form>
    <form action="" method="post">
        <input type="hidden" name="action" value="add">
        <label for="name">Name:</label><br>
        <input type="text" id="name" name="names" value="<?php echo $name; ?>"><br>
        <label for="department">Department:</label><br>
        <input type="text" id="department" name="department" value="<?php echo $department; ?>" required><br>
        <label for="position">Position:</label><br>
        <input type="text" id="position" name="position" value="<?php echo $position; ?>" required><br>
        <label for="salary">Salary:</label><br>
        <input type="text" id="salary" name="salary" value="<?php echo $salary; ?>" required><br>
        <?php if($update==false): ?>
        <button type="submit" name="save">Add Employee</button><br><br>
        <input type="reset" class="button" value="Reset">
        <?php else: ?>
        <button type="submit" name="update">Update</button>
        <?php endif ?>

    </form>

    <!-- Table to display the form data -->
    <h2>Employee List</h2>
    <table>
        <?php $wq=$conn->query("SELECT * FROM `employee`"); ?>
        <thead>
            <tr>
                <th>Name</th>
                <th>Department</th>
                <th>Position</th>
                <th>Salary</th>
                <th colspan="2">Action</th>
            </tr>
        </thead>
        <tbody>
            <?php while($rows=mysqli_fetch_assoc($wq)){ ?>
            <tr>
                <td><?php echo $rows['names'] ?></td>
                <td><?php echo $rows['department'] ?></td>
                <td><?php echo $rows['position'] ?></td>
                <td><?php echo $rows['salary'] ?></td>
                <td><a href="?edit=<?php echo $rows['emp_id']; ?>" class="button">Update</a></td>
                <td><a href="?delete=<?php echo $rows['emp_id']; ?>" class="button">Delete</a></td>
            </tr>
            <?php } ?>
        </tbody>
    </table>
    <?php
    //DELETE RECORDS

    if(isset($_GET['delete'])){
    $delete=$_GET['delete'];
    $delet="DELETE FROM `employee` WHERE `emp_id`='$delete'";
    $q=mysqli_query($conn,$delet);
    }
    ?>
    

</body>
</html>
