<?php
    session_start();
    $conn = new PDO("mysql:host=localhost;dbname=webboard;charset=utf8","root","");
    $sql = "DELETE FROM post WHERE id = $_GET[id]";

    $conn->exec($sql);
    $conn = null;
    $_SESSION['delete'] = 'success';
    header("location:index.php");
    die();
?>
