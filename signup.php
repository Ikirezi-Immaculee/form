<!-- <?php
// include '';
?> -->


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>
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
        h2 {
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
        button {
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
            font-size: 13px;

        }
        a:hover{
            color:#ff6347;

        }
    </style>
</head>
<body>
    <h2>Sign Up</h2>
    <?php
        include 'db.php';
        if (isset($_POST['create'])) {
            $name = $_POST['username'];
            $password = $_POST['password'];
            $sql = "INSERT INTO `users`(`user_id`, `username`, `password`) VALUES ('','$name','$password')";
            $result = mysqli_query($conn, $sql);
            if ($result) {
                header('location:login.php');
            } else {
                echo "not inserted";
            }
        }
        ?>
    <form action="" method="post">
        <label for="username">Username:</label>
        <input type="text" id="username" name="username" required>

        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required>

        <button type="submit" name="create" >Sign Up</button><br><br><br>
        <a href="login.php">login here</a>
    </form>
    <?php
//     if (isset($_POST['create'])) {
//         $username=$_POST['username'];
//         $password=$_POST['password'];
//         $verify="SELECT * FROM `users` WHERE `username`='$username' ";
//         $insert="INSERT INTO `users`(`User_id`, `username`, `password`)
//          VALUES ('',' $username','$password')";

//         $check=$conn->query($verify);
//         if($check->num_rows<1){
//          $query=mysqli_query($conn,$insert);
//           header("location:loggin.php");
//         }
//         else{
//             echo '<script>alert("USER ALREADY EXIST");</script>';
//         }
// }
    
    ?>
</body>
</html>
