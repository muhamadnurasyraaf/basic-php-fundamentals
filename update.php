<?php
    require_once 'config.php';
    $id = $_GET['id'];
    $data = mysqli_query($conn,"SELECT * FROM user WHERE id = $id;");
    $row = mysqli_fetch_assoc($data);


    if(isset($_POST['submit'])){
        $name = htmlspecialchars($_POST['name']);
        $email = htmlspecialchars($_POST['email']);

        $sql = "UPDATE user SET 
        name = '$name', 
        email = '$email' WHERE id = $id;";
        $result = $conn->query($sql);

        if($result){
            echo "
                <script>
                    alert('Data successfully changed');
                    document.location.href = 'data.php';
                </script>
            ";
        }
        else{
            echo "
                <script>
                    alert('Data failed top changed');
                    document.location.href = 'data.php';
                </script>
            ";
        }
    }

   
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Change Data</title>
</head>
<body>
<form action="" method="post">
        <label for="name" >Full Name:</label>
        <input type="text" id="name" name="name" required value="<?= $row['name'];?> "> <br>

        <label for="email">Email:</label>
        <input type="email" name="email" id="email" required value="<?= $row['email']; ?> "> <br>

        <input type="submit" value="Submit" name="submit">
    </form>
</body>
</html>