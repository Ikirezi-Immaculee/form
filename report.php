<?php
    include "db.php";
    if(isset($_POST['report'])) {
        $query = "SELECT COUNT(*) AS total_employees, AVG(salary) AS average_salary, department FROM employee GROUP BY department";
        $result = $conn->query($query);
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Employee Summary Report</title>
    <style>
        table {
            border-collapse: collapse;
            width: 100%;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
        a{
            color:black;
            text-decoration:none;
            border:2px solid black;
            padding:5px;
            background:green;

        }
        a:hover{
            background:white;
        }
    </style>
</head>
<body>

    <h2>Employee Summary Report <span>&nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;  &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;  &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp;&nbsp;  &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; </span> <a href="employee.php">GO BACK </a></h2>
 
        <table border="1">
            <tr>
                <th>Department</th>
                <th>Total Employees</th>
                <th>Average Salary</th>
            </tr>
          <?php   while($row = $result->fetch_assoc()) { ?>
                <tr>
                <td><?php echo $row['department']; ?> </td>
                <td> <?php echo $row['total_employees']; ?> </td>
                <td><?php echo $row['average_salary']; ?></td>
                </tr>

                <?php } ?>
          </table>
</body>
</html>
