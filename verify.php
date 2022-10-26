<?php
    session_start();
    if(isset($_SESSION['id'])){
        header("location:index.php");
        die();
    }
?>

    
    
    <?php 
        
        $user =  $_POST["login"];
        $pass =  $_POST["pwd"];

        if ($user == 'admin' && $pass == 'ad1234') {
        
            $_SESSION["username"] = "admin";
            $_SESSION["role"] = "a";
            $_SESSION["id"] = session_id();
            header("location:index.php");
            die();
        }
        else if ($user == 'member' && $pass == 'mem1234') {
            
            $_SESSION["username"] = "member";
            $_SESSION["role"] = "m";
            $_SESSION["id"] = session_id();
            header("location:index.php");
            die();
        }

        else {
            $_SESSION['error']='error';
            header("location:login.php");
            die();
        }

    
    ?>
