<?php
    session_start();
    require_once 'config.php';
    
    if(isset($_POST['login'])){
        $name = $_POST['name'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $result = mysqli_query($conn,"SELECT * FROM user WHERE name = '$name'");
        
        if(mysqli_num_rows($result) === 1){
            
            $row = mysqli_fetch_assoc($result);
            if(password_verify($password,$row['password'])){
                $_SESSION['login'] = true;
                $_SESSION['id'] = $row['id'];
                header("Location: data.php");
                exit;
            }else{
                echo"
                    <script>
                        alert('Login failed!');
                    </script>
                ";
            }
           
        }

        
    }


?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width= , initial-scale=1.0">
    <title>Login</title>
</head>
<body>
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
        <label for="name">Name:</label>
        <input type="text" name="name" id="email"> <br>
    
        <label for="password">Password</label>
        <input type="password" name="password" id="password"> <br>

        

        <input type="submit" name="login" value="Login"> <br>

        <a href="register.php">Didn't have any account?Register..</a>
    </form>
</body>
</html>