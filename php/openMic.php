<?php
session_start();
$userName="訪客";
if (isset($_COOKIE["userName"])){
    $userName=$_COOKIE["userName"];
    
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
    <link rel="stylesheet" href="../css/openMic.css">
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
    
    <div id=bigpic></div>
    <h2 class="animate__animated animate__bounceInDown 	animate__slow animate__delay-2s" id="pictitle">OpenMic空間。</h2>
    <div id="smbox">
        <div id="box" class="d-flex justify-content-center mt-4">
            <ul class="location ">
                <li><a href="#tpe">台北</a></li>
                <li><a href="#hsz">新竹</a></li>
                <li><a href="#khh">高雄</a></li>
            </ul>
        </div>

        <div id="container">
            <h3 class="title xshide" id="tpe">台北</h3>
            <!-- 23喜劇俱樂部 -->
            <div class="d-flex">
                <div class="mapbox col-sm-8 col-md-6 col-12" id="twothree">
                    <a href="https://www.facebook.com/TwoThreeComedy" target="_blank"><img class="img-fluid" src="../img/location/twothreecomedy.jpg" alt="">
                        <h4><b> 23喜劇俱樂部</b></h4>
                    </a>
                    <p> 台北市中山區林森北路286號B1 <br> 02-25815004 </p>
                </div>
                <div class="mapbox col-sm-4 col-md-6 xshide"><iframe class="imgfluid h-100" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3614.360816128427!2d121.52314094950749!3d25.055756983883413!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3442a9339081b3f7%3A0x2fc20daa090f1b79!2zVHdvIFRocmVlIENvbWVkeSBDbHViIDIz5Zac5YqH5L-x5qiC6YOo!5e0!3m2!1szh-TW!2stw!4v1609131732542!5m2!1szh-TW!2stw"
                        frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe></div>

            </div>
            <!-- 卡米地喜劇俱樂部 -->
            <div class="d-flex">
                <div class="mapbox col-sm-8 col-md-6 col-12" id="twothree">
                    <a href="https://www.facebook.com/ComedyClubTaipei" target="_blank"><img class="img-fluid" src="../img/location/comedy.png" alt="">
                        <h4><b>卡米地喜劇俱樂部</b></h4>
                    </a>
                    <p>台北市中山區八德路二段325號3樓<br>02-27410903</p>
                </div>
                <div class="mapbox col-sm-4 col-md-6 xshide"><iframe class="imgfluid h-100" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3614.6041175643286!2d121.54094694907151!3d25.047505583887325!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3442abbed703bea3%3A0x29b91bc6fff2c220!2z5Y2h57Gz5Zyw5Zac5YqH5Z-65ZywIENvbWVkeSBCYXNl!5e0!3m2!1szh-TW!2stw!4v1609132705696!5m2!1szh-TW!2stw"
                        frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe></div>
            </div>
            <!-- 月半窩表演空間 -->
            <div class="d-flex">
                <div class="mapbox col-sm-8 col-md-6 col-12" id="twothree">

                    <a href="https://www.facebook.com/punchwow" target="_blank"><img class="img-fluid" src="../img/location/moonhalf.png" alt="">
                        <h4><b>月半窩表演空間</b></h4>
                    </a>
                    <p>台北市中正區羅斯福路三段100-35號號2樓</p>
                </div>
                <div class="mapbox col-sm-4 col-md-6 xshide"><iframe class="imgfluid h-100" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3615.3800377476573!2d121.52515874907064!3d25.021173783899766!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3442a93ecb8bb673%3A0x735fcd95c3105f48!2z5pyI5Y2K56qp6KGo5ryU56m66ZaT!5e0!3m2!1szh-TW!2stw!4v1609132804108!5m2!1szh-TW!2stw "
                        frameborder="0 " style="border:0; " allowfullscreen=" " aria-hidden="false " tabindex="0 "></iframe></div>

            </div>
            <!-- 卡的堡桌遊喜劇 -->
            <h3 class="title xshide" id="hsz">新竹</h3>
            <div class="d-flex">
                <div class="mapbox col-sm-8 col-md-6 col-12" id="twothree">

                    <a href="https://www.facebook.com/cardsbgcastle" target="_blank"><img class="img-fluid" src="../img/location/cards.png " alt=" ">
                        <h4><b>卡的堡桌遊喜劇</b></h4>
                    </a>
                    <p> 新竹市東區中央路163號2樓<br> 0987-369111</p>
                </div>
                <div class="mapbox col-sm-4 col-md-6 xshide"><iframe class="imgfluid h-100" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3621.6246782493668!2d120.97045931341601!3d24.80830225345926!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3468367896b5a779%3A0xa1bd405e73fc3f2c!2z5Y2h55qE5aCh5qGM6YGK5Zac5YqH6ISr5Y-j56eA4piG5paw56u55beo5Z-O5peB5q2h5qiC6IGa5pyD5bmz5YO55YWx5Lqr56m66ZaT!5e0!3m2!1szh-TW!2stw!4v1609136559351!5m2!1szh-TW!2stw "
                        frameborder="0 " style="border:0; " allowfullscreen=" " aria-hidden="false " tabindex="0 "></iframe></div>

            </div>
            <!-- 喜劇開港 -->
            <h3 class="title xshide" id="khh">高雄</h3>
            <div class="mapbox col-sm-8 col-md-6 col-12" id="twothree">
                <a href="https://www.facebook.com/takaocb2020"><img src="../img/location/takao.png " alt=" ">
                    <h4><b>喜劇開港</b></h4>
                </a>
                <p>地點:不定，依FB公告為準 <br> <a href="https://www.facebook.com/takaocb2020/ " style="text-decoration:underline ">臉書連結  </a></p>
            </div>
        </div>
    </div>
    <footer class="myfooter ">Copyright 2020 返笑喜劇俱樂部 | All Rights Reserved | Designed by Nydia Lin
    </footer>

    <script src="../js/0_mutual.js"></script>

</body>

</html>