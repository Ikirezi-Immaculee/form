<?php
session_start();
if(!empty(isset($_SESSION['names']))){
    header("location:employee.php");
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Login</title>
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

        .button {
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

        a {
            text-decoration: none;
            color: blue;
            align-items: center;
        }

        a:hover {
            color: green;
            background-color: white;
        }
    </style>
</head>

<body>
    <h1>Login</h1>
    
    <?php
        include 'db.php';
        if (isset($_POST['login'])) {
            $name = $_POST['username'];
            $password = $_POST['password'];

            $sql = "SELECT * FROM `Users` WHERE username='$name' AND password='$password'";
            $result = mysqli_query($conn, $sql);

            if ($result->num_rows > 0) {
                $ed=$result->fetch_assoc();
                $_SESSION['names']=$ed['username'];
                header('location:employee.php');
            } else {
                echo "no valid records";
            }
        }
        ?>
    <form action="" method="post">
        <label for="username">Username:</label><br>
        <input type="text" id="username" name="username" required><br>
        <label for="password">Password:</label><br>
        <input type="password" id="password" name="password" required><br>
        <input type="submit" name="login" value="login" class="button"><br><br><br>
        <a href="signup.php">create new account</a>
    </form>

</body>

</html>