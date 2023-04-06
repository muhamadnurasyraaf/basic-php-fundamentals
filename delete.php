<?php
    require_once 'config.php';

    $id = $_GET['id'];


    $test = $conn->query("DELETE FROM user WHERE id = $id");

    if(!$test){
        echo "
        <script>
            alert('data gagal dibuang');
            document.location.href = 'data.php';
        </script>
        ";
    }
    else{
        echo "
        <script>
            alert('data berjaya dibuang');
            document.location.href = 'data.php';
        </script>
        ";
    }



?>