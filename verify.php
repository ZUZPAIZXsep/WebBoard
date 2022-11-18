<?php
    session_start();
    if(isset($_SESSION['id'])){
        header("location:index.php");
        die();
    }
    $conn = new PDO("mysql:host=localhost;dbname=webboard;charset=utf8","root","");
    
    $login = $_POST["login"];
    $pwd = $_POST["pwd"];
    $sql = "SELECT * FROM user where login = '$login' and password = sha1('$pwd')";
    $result = $conn->query($sql);
    if($result -> rowCount()==1){
        $data=$result->fetch(PDO::FETCH_ASSOC);
            $_SESSION['username'] = $data["login"];
            $_SESSION['role'] = $data["role"];
            $_SESSION['id'] = $data["id"];
            header("location:index.php");
            die();
    }else{
        $_SESSION['error'] = 'error';
        header("location:login.php");
        die();
    }
    $conn = null;
?>