<?php
session_start();
$userName="訪客";
if (isset($_COOKIE["userName"])){
    $userName=$_COOKIE["userName"];
    
}
require("config.php");
$commandText = <<<SqlQuery
SELECT sID,s.sName,s.locID, s.sActor, s.sDate,s.sDesc,s.src,l.loc
FROM showinfo as s
INNER JOIN locinfo as l
ON s.locID= l.locID
SqlQuery;
$result = mysqli_query($link, $commandText);



if (isset($_POST["searchBtn"])) {
    require("config.php");
    $sql = <<<command
    SELECT sID,s.sName,s.locID, s.sActor, s.sDate,s.sDesc,s.src,l.loc 
    FROM showinfo as s INNER JOIN locinfo as l ON s.locID= l.locID 
    where sActor like '%{$_POST["searchTxt"]}%' OR
    sName like '%{$_POST["searchTxt"]}%' OR
    sDesc like '%{$_POST["searchTxt"]}%' OR
    loc like '%{$_POST["searchTxt"]}%'
    command;
    $result = mysqli_query($link, $sql);
    $num = mysqli_num_rows($result);
}

$arr = $_SESSION["gwc"];   
$amount=0;
foreach($arr as $k=>$v){
    $v[1];
    $amount = $amount +$v[1];
}


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>知名演員__返笑喜劇俱樂部</title>
    <link rel="stylesheet" href="../css/show_main.css">
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

<body >
    <div class="mynavbar d-inline  animate__animated animate__fadeInUp animate__delay-1s">
        <ul class="text-right pr-4">
            <span class="text-info">
            <?php echo $userName; ?></span><span class="text-secondary">您好</span>
        <?php if ($userName=="訪客"){ ?>
                <a href="user_login.php">
                    <li id="login">會員登入/註冊</li>
                </a>
                <a href="cart_main.php">
                <li id="cart">購物車<span><?= "(".$amount.")" ?></span></li>
                </a>
            <?php  } else{?>
                <a href="user_edit.php">
                    <li id="login">修改資料</li>
                </a>
                <a href="user_logout.php">
                    <li id="">會員登出</li>
                </a>
                <a href="cart_main.php">
                <li id="cart">購物車<span><?= "(".$amount.")" ?></span></li>
                    </li>
                </a>
            <?php } ?>   
           
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
    
    <div id=bigpic></div>
    <h2 class="animate__animated animate__bounceInDown 	animate__slow animate__delay-2s" id="pictitle">表演資訊。</h2>

    <!-- 搜尋功能 -->
    <form method="post" action="">
        <div class="d-flex justify-content-center m-5">
            <input id="input_value" type="text" placeholder="搜尋演員或表演名稱" name="searchTxt">
            <button name="searchBtn" type="submit" class="btn btn-light ml-2 "><i class="fa fa-search " aria-hidden="true" style="font-size: 40px;"></i></button>
        </div>
    </form>
    <p class="text-center my-3"><?php if ($num>0) echo " 此次搜尋到  " . $num . "   筆資料<br>"  ?></p>
    <div id="show" class="section-center d-flex justify-content-start    flex-wrap px-5 my-5">
    <?php while ($row = mysqli_fetch_assoc($result)) { ?> 
            <div class="col-lg-4 col-md-6 col-10 mb-5">
                <div class="card showitem">
                    <div class="img_box"><img class="showpic img-fluid " src="../img/show/<?php echo $row["src"] ?>" alt=""></div>
                    <h4 class="pl-3"><?php echo $row["sActor"] . "-" . $row["sName"] ?></h4>
                    <p class="pl-3"><?php echo  $row["sDate"] . "  " . $row["loc"] ?></p>
                    <p class="pl-3"><?php echo  $row["sDesc"] ?></p>
                    <a class="ticket stretched-link" href="show_info.php?id=<?= $row["sID"] ?>" >購票去&gt;&gt;&gt;</a>
                </div>
            </div>
            <?php } ?>
    </div>
    <footer>Copyright 2020 返笑喜劇俱樂部
        <span class="xshide "> | All Rights Reserved | Designed by Nydia Lin</span>
    </footer>
    <?php
    mysqli_close($link);
    ?>

    <script src="../js/0_mutual.js "></script>
</body>

</html>