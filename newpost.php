<?php
    session_start();
    if(!isset($_SESSION['username'])){
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
<div class="container">
    <h1><center>WebBoard ZUZPAIZXsep</h1><br>
    <?php include "nav.php";?>
    <br>
    
    <div class="card text-dark bg-white border-info">
        <div class="card-header bg-info text-white">ตั้งกระทู้ใหม่</div>
        <div class="card-body">
            <form action="newpost_save.php" method="post">
                <div class="row mb-3">
                    <label class="col-lg-3 col-form-label">หมวดหมู่ :</label>
                    <div class="col-lg-9">
                    <select name="category" class="form-select">
                        <?php
                            $conn=new PDO("mysql:host=localhost;dbname=webboard;charset=utf8","root","");
                            $sql="SELECT * FROM category";
                            foreach($conn->query($sql) as $row){
                                echo "<option value=".$row['id'].">".$row['name']."</option>";
                            }
                            $conn=null;
                        ?>
                    </select>
                    </div>
                </div>
                <div class="row mb-3">
                    <label class="col-lg-3 col-form-label">หัวข้อ :</label>
                    <div class="col-lg-9">
                        <input type="text" name="topic" class="form-control" required>
                    </div>
                </div>
                <div class="row mb-3">
                    <label class="col-lg-3 col-form-label">เนื้อหา :</label>
                    <div class="col-lg-9">
                        <textarea class="form-control" name="comment" rows="8" required></textarea>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <center>
                            <button type="submit" class="btn btn-info btn-sm text-white">
                            <i class="bi bi-box-arrow-down"></i>บันทึกข้อความ</button>
                        </center>
                    </div>
                </div>
            </form>
        </div>
    </div>
    
</div>
</body>
</html>