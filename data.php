<?php 
    session_start();
    require_once 'config.php';


    if(!isset($_SESSION['login']) || $_SESSION['login'] === false){
        header("Location: login.php");
    }
    $data = $conn->query("SELECT * FROM user");

    if(isset($_GET['search'])){
        $keyword = $_GET['keyword'];

       $data =  $conn->query("SELECT * FROM user WHERE  name LIKE '$keyword%' OR name LIKE '%$keyword' OR email LIKE '$keyword%' OR email LIKE '%$keyword';");
        
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Data</title>
</head>
<body>
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="get">
        <input type="text" name="keyword" size="40" autofocus autocomplete="off">
        <button type="submit" name="search" >Search</button>
    </form>
    <table border="1" cellpadding="10">
        <tr>
            <th>ID</th>
            <th>Action</th>
            <th>Full Name</th>
            <th>Email</th>
        </tr>

        <?php while($row =  mysqli_fetch_assoc($data)) : ?>
        <tr>
            <td><?php echo $row['id'] ?></td>
            <td>
                <a href="update.php?id=<?= $row['id'];?>">Edit</a>
                <a href="delete.php?id=<?= $row['id'];?>"  onclick = "return confirm('Are you sure to delete this user data?');">Delete</a>
            </td>
            <td><?php echo $row['name'] ?></td>
            <td><?php echo $row['email'] ?></td>
            <td><?php echo $row['password'] ?></td>
            
            
        </tr>
        <?php endwhile; ?>
    </table>
    <a href="register.php">Back to main menu!</a>
    <a href="ses1.php">Current session</a>

    <?php var_dump($_SESSION['login']); ?>
</body>
</html>