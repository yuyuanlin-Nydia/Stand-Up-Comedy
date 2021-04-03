<?php
$userName = "訪客";
if (isset($_COOKIE["userName"])) {
    $userName = $_COOKIE["userName"];
}

require("config.php");
$sql = <<< cmd
SELECT cId,cFirstName,account,password FROM `customer` where account='{$_POST["account"]}';
cmd;
$result = mysqli_query($link, $sql);
$row = mysqli_fetch_assoc($result);

if (isset($_POST["login_btn"])) {
    if (isset($_POST["account"]) && isset($_POST["pwd"])) {
        if ($_POST["account"] == $row["account"] and $_POST["pwd"] == $row["password"]) {
            //如果我想秀出名字，COOKIE無法存取中文字，待解決~
            setcookie("userName", $_POST["account"]);
            if (isset($_COOKIE["lastPage"])) {
                header(sprintf("Location: %s", $_COOKIE["lastPage"]));
            } else {
                header("location: index1.php");
            }
        }

    }
}

$arr = $_SESSION["gwc"];
$amount = 0;
foreach ($arr as $k => $v) {
    $v[1];
    $amount = $amount + $v[1];
}

?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>知名演員__返笑喜劇俱樂部</title>
    <link rel="stylesheet" href="../css/user_login.css">
    <link rel="stylesheet" href="../css/0_mutual.css">
    <link rel="stylesheet" href="../css/bootstrap/bootstrap.min.css">
    <script src="../js/bootstrap/jquery.min.js"></script>
    <script src="../js/bootstrap/popper.min.js"></script>
    <script src="../js/bootstrap/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
    <style>
        @import url("https://fonts.googleapis.com/earlyaccess/notosanstc.css");
    </style>
</head>

<body>
    <div class="mynavbar d-inline  animate__animated animate__fadeInUp animate__delay-1s">
        <ul class="text-right pr-4">
            <span class="text-info">
            <?php echo $userName; ?></span><span class="text-secondary">您好</span>
        <?php if ($userName == "訪客") {?>
                <a href="user_login.php">
                    <li id="login">會員登入/註冊</li>
                </a>
                <a href="cart_main.php">
                <li id="cart">購物車<span><?="(" . $amount . ")"?></span></li>
                </a>
            <?php } else {?>
                <a href="user_edit.php">
                    <li id="login">修改資料</li>
                </a>
                <a href="user_logout.php">
                    <li id="">會員登出</li>
                </a>
                <a href="cart_main.php">
                <li id="cart">購物車<span><?="(" . $amount . ")"?></span></li>
                    </li>
                </a>
            <?php }?>

        </ul>
        <ul class=" align-self-start navlinks d-flex justify-content-center ">
            <a class="navitem xshide" href="index1.php">
                <li  class="m-3"><i class="fa fa-home" aria-hidden="true" style="font-size: 28px;"></i>首頁</li>
            </a>
            <a class="navitem xshide" href="actor.php">
                <li class="m-3"><i class="fa fa-user" aria-hidden="true" style="font-size: 28px;"></i>知名演員</li>
            </a>
            <a href="index1.php">
                <img class="img-fluid" id="logo" src="../img/mutual/logo.png" alt="">
            </a>

            <a class="navitem xshide" href="openMic.php">
                <li class="m-3" ><i class="fa fa-map-marker" aria-hidden="true" style="font-size: 28px;"></i>OpenMic空間</li>
            </a>
            <a class="navitem xshide" href="show_main.php">
                <li class="m-3" ><i class="fa fa-ticket" aria-hidden="true" style="font-size: 28px;"></i>表演資訊</li>
            </a>
            <a class="navitem xshide" href="product_main.php">
                <li class="m-3"><i class="fa fa-shopping-bag" aria-hidden="true" style="font-size: 28px;"></i> 周邊商品
                </li>
            </a>
            <li id="menubar" class="d-sm-none nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="fa fa-bars  ml-auto" aria-hidden="true" style="font-size: 24px;"></i>
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="index1.php">首頁</a>
                    <a class="dropdown-item" href="actor.php">知名演員</a>
                    <a class="dropdown-item" href="openMic.php">OpenMic空間</a>
                    <a class="dropdown-item" href="show_main.php">表演資訊</a>
                </div>
            </li>
        </ul>
    </div>
    <!-- 回到頂端的麥克風圖片 -->
    <a class="xshide" href="#bigpic"><img id="pictop" src="../img/mutual/top.png" alt=""></a>

    <form method="post" action="">
        <div class="login_box">
            <div>
                <h3>會員登入</h3>
                <h6>帳號&nbsp; <span>ACCOUNT NUMBER</span></h6>
                <input id="account_input" type="text" placeholder="請輸入帳號" name="account">
                <p class="blank_p account_p"></p>
                <h6 class="mt-2">密碼 &nbsp;<span>Password</span></h6>
                <!-- 如果隱藏密碼要顯示星號的話...?? -->
                <input id="pw_input" type="password" placeholder="請輸入密碼" name="pwd"><br>
                <p style="color:yellow;">
                <?php if (isset($_POST["login_btn"])) {?>
                    <?php if (isset($_POST["account"]) && isset($_POST["pwd"])) {?>
                        <?php if (!$_POST["account"] == $row["account"]) {?>
                            <?php echo "您輸入的帳號不存在"; ?>
                        <?php } else {?>
                            <?php echo "密碼錯誤"; ?>
                        <?php }?>
                    <?php }?>
                <?php }?>
                </p>
                <button type="submit" class="btnB login_btn" name="login_btn"> 登入</button><br><br>
                <div >
                    <p>尚未註冊成為會員嗎？
                       <a href="user_register.php">立即註冊</a>
                    </p>
                </div>
            </div>
            <hr>
        </div>
    </form>
    <footer>Copyright 2020 返笑喜劇俱樂部
        <span class="xshide "> | All Rights Reserved | Designed by Nydia Lin</span>
    </footer>

    <script src="../js/0_mutual.js"></script>
</body>

</html>