<?php
session_start();
$userName="訪客";
if (isset($_COOKIE["userName"])){
    $userName=$_COOKIE["userName"];
    
}

require("config.php");

// 搜尋功能
if (isset($_POST["searchBtn"])){
    $sql = <<<command
    SELECT * from product 
    where productName like '%{$_POST["searchTxt"]}%' 
    command;
    $result = mysqli_query($link, $sql);
// $num = mysqli_num_rows($result);
}else if (isset($_POST["brian"])){
    $sql = <<<command
    SELECT * from product where productName like '%博恩%'
    command;
    $result = mysqli_query($link, $sql);
}else if (isset($_POST["brian"])){
    $sql = <<<command
    SELECT * from product where productName like '%博恩%'
    command;
    $result = mysqli_query($link, $sql);
}else if (isset($_POST["horlung"])){
    // echo $_POST["searchText"];
    $sql = <<<command
    SELECT * from product where productName like '%賀瓏%'
    command;
    $result = mysqli_query($link, $sql);

}else if (isset($_POST["jim"])){
    $sql = <<<command
    SELECT * from product where productName like '%Jim%'
    command;
    $result = mysqli_query($link, $sql);

}else if (isset($_POST["lunglung"])){
    // echo $_POST["searchText"];
    $sql = <<<command
    SELECT * from product where productName like '%龍龍%'
    command;
    $result = mysqli_query($link, $sql);
}
else if(isset($_POST["p_high"])){
    $commandText = <<<SqlQuery
    SELECT * FROM product order by price DESC
    SqlQuery;
    $result = mysqli_query($link, $commandText);
}
//價格排序功能
else if(isset($_POST["p_low"])){
    $commandText = <<<SqlQuery
    SELECT * FROM product order by price 
    SqlQuery;
    $result = mysqli_query($link, $commandText);
}
else{
    $commandText = <<<SqlQuery
    SELECT * FROM product
    SqlQuery;
    $result = mysqli_query($link, $commandText);
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
    <link rel="stylesheet" href="../css/product_main.css">
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
            <a class="navitem xshide" href="index.php">
                <li  class="m-3"><i class="fa fa-home" aria-hidden="true" style="font-size: 28px;"></i>首頁</li>
            </a>
            <a class="navitem xshide" href="actor.php">
                <li class="m-3"><i class="fa fa-user" aria-hidden="true" style="font-size: 28px;"></i>知名演員</li>
            </a>
            <a href="index.php">
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
                    <a class="dropdown-item" href="index.php">首頁</a>
                    <a class="dropdown-item" href="actor.php">知名演員</a>
                    <a class="dropdown-item" href="openMic.php">OpenMic空間</a>
                    <a class="dropdown-item" href="show_main.php">表演資訊</a>
                </div>
            </li>
        </ul>
    </div>
    <!-- 回到頂端的麥克風圖片 -->
    <a class="xshide" href="#bigpic"><img id="pictop" src="../img/mutual/top.png" alt=""></a>
        <div id="cart_div" class="hide">
            <div id="cart_ref"></div>
        </div>
        <form method="post"  class="content" action="">
            <div id="downsection" class="d-flex justify-content-center">
                <div class="col-lg-2 col-md-0 " id="left_sec">
                    <div class="mb-3">
                        <input name="searchTxt" id="input_value" class="w-75" type="text" placeholder="搜尋商品">
                        <button type="submit" class="btn btn-light" name="searchBtn"><i class="fa fa-search ml-2" aria-hidden="true" style="font-size: 24px;"></i></button>
                    </div>
                    <div>
                        <h4>商品</h4>
                        <ul>
                            <li class="act_search"><button class="btn btn-info my-1" type="submit" name="brian">博恩</button></li>
                            <li class="act_search"><button class="btn btn-info my-1" type="submit" name="horlung">賀瓏</button></li>
                            <li class="act_search"><button class="btn btn-info my-1" type="submit" name="lunglung">龍龍</button></li>
                            <li class="act_search"><button class="btn btn-info my-1" type="submit" name="jim">Jim</button></li>
                        </ul>
                    </div>
                </div>
                <div id="rightsection" class="col-lg-8 d-flex flex-wrap">
                    <div class="col-12 d-flex justify-content-end" id="btn_container">
                        <button type="submit" class="btnB m-2 text-center w-25" name="p_high" id="p_high" >價格由高到低</button>
                        <button type="submit" class="btnB m-2 text-center w-25" name="p_low" id="p_low" >價格由低到高</button>
                    </div>
                </form>
                <div id="product_sec" class="col-12 d-flex  flex-wrap">
                    <?php while ($row=mysqli_fetch_assoc($result)){  ?>
                    <div class="col-lg-3 pt-2 my-2" data-id="1">
                        <a href="./product_info.php?id=<?= $row["productID"] ?>">
                            <div>
                                <img class="p_img"src="../img/product/<?= $row["src"] ?>" alt="">
                                <a  href="cart_add.php?id=<?= $row["productID"] ?>&;name=<?= $row["productName"]?>" >
                                    <div class="cart_btn"><i class="fa fa-cart-plus" aria-hidden="true" style="font-size: 28px;"></i></div>
                                </a>                            
                            </div>
                            <h6><?= $row["productName"] ?></h6>
                            <h5>NT$<?= $row["price"] ?></h5>
                        </a>
                    </div>
                    <?php  }  ?>
                </div>
            </div>
        </div>
    </div>
    <footer>Copyright 2020 返笑喜劇俱樂部<span class="xshide"> | All Rights Reserved | Designed by Nydia Lin</span>
    </footer>
    <script src="../js/0_mutual.js"></script>
    <!-- <script src="../js/product.js"></script> -->


</body>

</html>