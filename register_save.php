<?php
session_start();

$login = $_POST['login'];
$passwd = $_POST['pwd'];
$name = $_POST['name'];
$gender = $_POST['gender'];
$email = $_POST['email'];

$conn = new PDO("mysql:host=localhost;dbname=webboard;charset=utf8","root","");
$passwd=sha1($passwd);

$sql = "SELECT * FROM user where login = '$login'";
$result = $conn->query($sql);
if($result->rowCount()==1){
    $_SESSION['add_login'] = 'error';
    header("location:register.php");
    die();
}else{
    $sql = "INSERT INTO user (login,password,name,gender,email,role) VALUES ('$login','$passwd','$name','$gender','$email','m')";

    $conn->exec($sql);
    $conn = null;
    $_SESSION['add_login'] = 'success';
    header("location:register.php");
    die();
}
?>

