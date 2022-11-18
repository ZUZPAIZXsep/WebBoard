<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    <title>Post</title>
</head>
<body>
<div class="container">
    <h1 class="text-center">Webboard ZUZPAIZXsep</h1>
    <?php include "nav.php"; ?>
    <br>
    <div class="card text-dark bg-white border-primary mb-4">
        <?php 
            $conn = new PDO("mysql:host=localhost;dbname=webboard;charset=utf8","root","");

            $result = $conn->query("SELECT * FROM post where id = $_GET[id]");
            $data=$result->fetch(PDO::FETCH_ASSOC);

            $result2 = $conn->query("SELECT * FROM user where id = $data[user_id]");
            $data2=$result2->fetch(PDO::FETCH_ASSOC);
        ?>
        <div class="card-header bg-primary text-white"><?php echo "$data[title]"; ?></div>
        <div class="card-body"><?php echo "$data[content]<BR><BR>$data2[name] - $data[post_date]"; ?></div>
    </div>
        <?php
            $sql = "SELECT * FROM comment where post_id = $_GET[id] ORDER BY post_date";
            $i = 1;
            foreach($conn->query($sql) as $row){
                $result3 = $conn->query("SELECT * FROM user where id = $row[user_id]");
                $data3=$result3->fetch(PDO::FETCH_ASSOC);?>
                <div class="card text-dark bg-white border-info mb-4">
                    <div class="card-header bg-info text-white"><?php echo "ความคิดเห็นที่ $i"; ?></div>
                    <div class="card-body"><?php echo "$row[content]<BR><BR>$data3[name] - $row[post_date]"; ?></div>
                </div>
                <?php
                $i++;
            }
            $conn = null;
        ?>
    <?php
        if(isset($_SESSION['id'])){ 
    ?>
    <div class="card text-dark bg-white border-success">
    <div class="card-header bg-success text-white text-center">แสดงความคิดเห็น</div>
    <div class="card-body">
        <form action="post_save.php" method="post">
            <input type="hidden" name="post_id" value="<?= $_GET['id']; ?>">
            <div class="row mb-3 justify-content-center">
                <div class="col-lg-10">
                    <textarea name="comment" class="form-control" rows="8"></textarea>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <center>
                        <button type="submit" class="btn btn-success btn-sm text-white"><i class="bi bi-box-arrow-up-right"></i> ส่งข้อความ</button>
                    </center>
                </div>
            </div>
        </form>
    </div>
    </div>
    <?php } ?>
</div>
</body>
</html>