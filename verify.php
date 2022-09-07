<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verify</title>
</head>
<body>
    <h1 align="center">Webboard ZUZPAIZXsep</h1>
    <hr>
    <br>
    <div align="center">
    
    
    <?php 
        $user =  $_POST["login"];
        $pass =  $_POST["pwd"];

        if ($user == 'admin' && $pass == 'ad1234') {
            echo "ยินดีต้อนรับคุณ ADMIN";

        }
        else if ($user == 'member' && $pass == 'mem1234') {
            echo "ยินดีต้อนรับคุณ MEMBER";
        }
        else if ($user == 'ZUZPAIZXsep' && $pass == 'ZUZPAIZX1234') {
            echo "ยินดีต้อนรับคุณ ZUZPAIZX";
        }

        else {
            echo "ชื่อบัญชีหรือรหัสผ่านไม่ถูกต้อง";
        }

    
    ?><br>

    </div>
    <div align ="center"><a href="index.php">กลับไปหน้าหลัก</a></div>
</body>
</html>