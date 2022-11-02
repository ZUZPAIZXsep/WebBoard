<?php
    session_start();
    if(isset($_SESSION['id'])){
        header("location:index.php");
        die();
    }
?>
    <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
     <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
     <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css"> 
    <title>Document</title>
</head>
<body>
    <div class="container-fluid">
    <h1><center>WebBoard ZUZPAIZXsep</h1><br>
    <?php include "nav.php";?>
    <br>
    <div class="row">
        <div class="col-md-3"></div>
        <div class="col-md-6 mb-3">
            <?php
                if(isset($_SESSION['add_login'])){
                    if($_SESSION['add_login']=='error'){
                    echo "<div class='alert alert-danger'>ชื่อบัญชีซ้ำหรือฐานข้อมูลมีปัญหา</div>";
                }else{
                    echo "<div class='alert alert-success'>เพิ่มบัญชีเรียบร้อยแล้ว</div>";
                }
                unset($_SESSION['add_login']);
            }
            ?>
        <div class="card text-dark bg-white border-primary">
            <div class="card-header bg-primary text-white">กรอกข้อมูล</div>
            <div class="card-body">
                <form action="register_save.php" method="post">
                    <div class="row mb-3">
                        <label class="col-md-3 col-form-label">ชื่อบัญชี :</label>
                        <div class="col-md-9"><input type="text" name="login" class="form-control" require></div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-md-3 col-form-label">รหัสผ่าน :</label>
                        <div class="col-md-9"><input type="password" name="pwd" class="form-control" require></div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-md-3 col-form-label">ชื่อ-นามสกุล :</label>
                        <div class="col-md-9"><input type="text" name="name" class="form-control" require></div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-md-3 col-form-label pt-0">เพศ :</label>
                        <div class="col-md-9">
                            <div class="form-check">
                                <input type="radio" name="gender" value="m" class="form-check-input" require>
                                <label class="form-check-label">ชาย</label>
                            </div>
                            <div class="form-check">
                                <input type="radio" name="gender" value="f" class="form-check-input" require>
                                <label class="form-check-label">หญิง</label>
                            </div>
                            <div class="form-check">
                                <input type="radio" name="gender" value="o" class="form-check-input" require>
                                <label class="form-check-label">อื่นๆ</label>
                            </div>        
                        </div>
                        </div>
                    <div class="row mb-3">
                        <label class="col-md-3 col-form-label">email :</label>
                        <div class="col-md-9"><input type="email" name="email" class="form-control" require></div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-md-3 col-form-label"></label>
                        <div class="col-md-9"><button class="btn btn-primary btn-sm" type="submit">
                            <i class="bi bi-save"></i> สมัครสมาชิก
                        </button>
                    </div>
                    </div>
                    
                </form>
            
        </div>
        </div>
        <div class="col-md-3"></div>
    </div>
        <div align ="center"><a href="index.php">กลับไปหน้าหลัก</a></div>
    </div>
</body>
</html>