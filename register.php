<?php

    require_once 'config.php';

    if(isset($_POST['submit'])){
        $name = $_POST['name'];
        $email = $_POST['email'];
        $password = $_POST['password'];

        $use = mysqli_query($conn,"SELECT name FROM user WHERE name = '$name'");

        if(mysqli_fetch_assoc($use)){
            echo "
                <script>
                    alert('Username already registered!');
                    document.location.href = 'register.php';
                </script>
            ";
            return false;
        }

        $hashedpassword = password_hash($password,PASSWORD_DEFAULT);

        $qry = "INSERT INTO user(name , email,password) VALUES('$name','$email','$hashedpassword');";

        $result = $conn->query($qry);

        if(!$result){
            echo "
                <script>
                    alert('Data failed to register');
                </script>
            ";
            return false;
        }
        else{
            echo "
                <script>
                    alert('Data succeed to register');
                    document.location.href = 'data.php';
                </script>
            ";
            
        }
    }


?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TEST (PHP PROJECT)</title>
</head>
<body>
    <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
        <label for="name" >Full Name:</label>
        <input type="text" id="name" name="name"> <br>

        <label for="email">Email:</label>
        <input type="email" name="email" id="email"> <br>

        <label for="password">Password: </label>
        <input type="password" name="password" id="password"> <br>

        <input type="submit" value="Submit" name="submit">
    </form>
    <a href="login.php">Already got an account?Login..</a>

</body>
</html>