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

//SHOW的區塊
require("config.php");
$commandText = <<<SqlQuery
SELECT sID,s.sName,s.locID, s.sActor, s.sDate,s.sDesc,s.src,l.loc
FROM showinfo as s
INNER JOIN locinfo as l
ON s.locID= l.locID
LIMIt 3
SqlQuery;
$result = mysqli_query($link, $commandText);

?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>首頁__返笑喜劇俱樂部</title>
    <link rel="stylesheet" href="../css/index.css">
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

<body onload="typeWriter()">
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
                </a>
            <?php } ?>   
           
        </ul>
        <ul class=" align-self-start navlinks d-flex justify-content-center" id="myNavbar">
            <a class="navitem xshide" href="index.php">
                <li  class="m-3"><i class="fa fa-home" aria-hidden="true" style="font-size: 28px;"></i>首頁</li>
            </a>
            <a class="navitem xshide" href="actor.php">
                <li class="m-3"><i class="fa fa-user" aria-hidden="true" style="font-size: 28px;"></i>知名演員</li>
            </a>
            <a href="index.php">
                <img class="../img-fluid" id="logo" src="../img/mutual/logo.png" alt="">
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
    <a class="xshide" href="#"><img id="pictop" src="../img/mutual/top.png" alt=""></a>
    
    <!-- 輪播動畫 -->
    <div id="slideshow">
        <img src="../img/index/slider1.png " alt=" ">
        <img src="../img/index/slider2.png " alt=" ">
        <img src="../img/index/slider3.png " alt=" ">
    </div>

    <div id="slogan">
        <h2>返笑喜劇俱樂部</h2>
        <p id="subtitle"></p>
    </div>
    <div id="downsection">
        <div class="pt-2">
            <div class="container py-4">
                <div class="col-md-6 col-sm-12 heading p-1 ">
                    <h4>ACTOR</h4>
                    <h2>一窺演員的經歷</h2>
                    <p class="xshide ">喜劇演員形形色色，台上自由奔放，私底下卻沉默寡言；又或者是台上冷面笑匠，私底下卻樸實憨厚，帶您認識喜劇演員的表演風格、真實性情與經歷。</p>
                    <p class="xshide "><a href="actor.php"> View More+</a></p>
                </div>
                <div id="section2A " class="d-flex flex-sm-wrap justify-content-start ">
                    <i id="iconleft " class="fa fa-chevron-left picicon d-sm-none " aria-hidden="true " style="font-size: 40px; " onclick="moveleft() "></i>
                    <div class="align-self-end col-12 col-sm-3 mr-sm-1 mr-md-2 text-center " id="picleft ">
                        <img class="../img2A img-fluid " src="../img/actor/3_longlong2.jpg " alt=" ">
                        <h5 class="text-left pt-2 ">龍龍</h5>
                        <p class="text-left ">輕鬆又帶著厭世的獨特魅力，在充滿陽剛氣息的喜劇界佔有一席之地。</p>
                    </div>
                    <div class="align-self-end col-12 col-sm-3 mr-sm-1 mr-md-2 text-center flex-grow-0 ">
                        <img class="img2A img-fluid " src="../img/actor/3_賀龍.jpg " alt=" ">
                        <h5 class="text-left pt-2 ">賀龍</h5>
                        <p class="text-left ">野心勃勃地在《博恩夜夜秀》中意圖篡主持棒的位置，真實性情如何呢?</p>
                    </div>
                    <div class=" col-12 col-sm-5 text-center " id="picright ">
                        <img class="../img2B img-fluid " src="../img/actor/3_brian3.jpg " alt=" ">
                        <h5 class="text-left pt-2 ">博恩</h5>
                        <p class="text-left ">《大奶薇薇》讓他在喜劇界爆紅，擁有驚人學歷的他，卻毅然決然踏進喜劇的世界。<span class="xshide "> 主持《博恩夜夜秀》，多次觸碰敏感和具爭議性話題。</span></p>
                    </div>
                    <i id="iconright " class="fa fa-chevron-right picicon d-sm-none " aria-hidden="true " style="font-size: 40px; " onclick="moveright() "></i>
                </div>
                <p class="d-sm-none text-center "><a href="actor.php"> View More+</a></p>

            </div>
            <div class="grayarea ">
                <div class="container py-4 ">
                    <div class="d-flex flex-wrap heading align-items-center mx-sm-5 ">
                        <img class="col-md-12 col-lg-6 xshide m-lg-4 " src="../img/show/show.jpg " alt=" ">
                        <div class="col-md-12 col-lg-5 heading xshide ">
                            <h4>SHOW</h4>
                            <h2>一探表演的魅力</h2>
                            <p class="xshide ">喜劇演員總是需要想不同的段子保持新鮮感，而粉絲最他們最大的支持就是買票入場，並給予最大的“笑聲”。</p>
                            <p class="xshide "><a href="show_main.php "> View More+</a></p>
                        </div>
                    </div>
                    <div id="section3A " class="d-flex flex-wrap justify-content-center mt-2 ">
                        <?php while ($row = mysqli_fetch_assoc($result)) { ?> 
                        <div class="col-md-4 col-sm-6  smdiv ">
                            <img class="img3A img-fluid" src="../img/show/<?php echo $row["src"] ?>" alt="">
                            <h5 class="text-left pt-2"><?php echo $row["sActor"] . "-" . $row["sName"] ?></h5>
                            <p class="text-left">
                                <i class="fa fa-calendar " aria-hidden="true " style="font-size:28px;margin-right: 5px; "> </i>&nbsp;<?php echo  $row["sDate"] ?><br>
                                <i class="fa fa-map-marker " aria-hidden="true " style="font-size: 28px; margin-right: 5px; "></i>&nbsp;<?php echo  $row["loc"] ?>
                            </p>
                            <a class="ticket stretched-link" href="show_info.php?id=<?= $row["sID"] ?>" >購票去&gt;&gt;&gt;</a>
                        </div>
                        <?php } ?>
                    </div>
                </div>
                <p class="d-sm-none text-center "><a href="show_main.php"> View More+</a></p>

            </div>
        </div>

            <div class="container py-4 ">
                <div class="col-lg-6 col-md-12 heading p-1 " id="heading2 ">
                    <h4>SPACE</h4>
                    <h2>一訪初啼試聲的空間</h2>
                    <p class="xshide ">寫了一對自認為幽默的稿子，但「醜媳婦總是要見公婆的」，到底氣氛會沸騰還是凍結，OpenMic空間見真章。</p>
                    <p class="xshide "><a href="openMic.php"> View More+</a></p>
                </div>
                <div id="section4A" class="d-flex flex-wrap justify-content-center ">
                    <div class="col-5 col-md-3 col-sm-5 p-1 align-self-start ">
                        <a href="https://www.facebook.com/TwoThreeComedy " target="_blank ">
                            <img class="img4A img-fluid " src="../img/location/twothreecomedy.jpg " alt=" ">
                            <h5 class="text-center pt-2 ">23喜劇俱樂部</h5>
                            <p class="text-center ">台北市中山區林森北路286號B1</p>
                        </a>
                    </div>
                    <div class="col-5 col-md-3 col-sm-5 p-1 align-self-start ">
                        <a href="https://www.facebook.com/punchwow " target="_blank ">
                            <img class="img4A img-fluid " src="../img/location/moonhalf.png " alt=" ">
                            <h5 class="text-center pt-2 ">月半空間</h5>
                            <p class="text-center "> 台北市中正區羅斯福路三段100-35號 </p>
                        </a>
                    </div>
                    <div class="col-5 col-md-3 col-sm-6 p-1 align-self-start ">
                        <a href="https://www.facebook.com/cardsbgcastle " target="_blank ">
                            <img class="img4A img-fluid " src="../img/location/cards.png " alt=" ">
                            <h5 class="text-center pt-2 ">卡的堡桌遊喜劇</h5>
                            <p class="text-center ">新竹市東區中央路163號2樓</p>
                        </a>
                    </div>
                    <div id="div4A" class="col-5 col-md-3 col-sm-5 p-1 ">
                        <a href="https://www.facebook.com/ComedyClubTaipei" target="_blank "><img class="../img4A img-fluid " src="../img/location/comedy.png " alt=" ">
                            <h5 class="text-center pt-2 ">卡米地喜劇俱樂部</h5>
                            <p class="text-center ">台北市中山區八德路二段325號3樓</p>
                        </a>
                    </div>
                </div>
                <p class="d-sm-none text-center "><a href="openMic.php"> View More+</a></p>
            </div>

            <footer>Copyright 2020 返笑喜劇俱樂部
                <span class="xshide"> | All Rights Reserved | Designed by Nydia Lin</span>
            </footer>
        </div>
    </div>

    <script>
        var i = 0;
        var txt = '陪|你|走|過|人|生|的|笑|與|淚';
        var speed = 200;

        function typeWriter() {
            if (i < txt.length) {
                document.getElementById("subtitle").innerHTML += txt.charAt(i);
                i++;
                setTimeout(typeWriter, speed);
            }
        }


        // 手機螢幕，演員往左往右的選單
        var picleft = document.getElementById("picleft ");
        var iconleft = document.getElementById("iconleft ");
        var iconright = document.getElementById("iconright ");
        var winWide = window.screen.width;

        function moveright() {
            var before = window.getComputedStyle(picleft).getPropertyValue("margin-left ");
            var after = (parseInt(before) - winWide * 0.87) + "px ";
            picleft.style.marginLeft = after;
            iconleft.style.display = "block ";
            if (parseInt(after) <= -700) {
                iconright.style.display = "none ";
            }
        }
        function moveleft() {
            var before = window.getComputedStyle(picleft).getPropertyValue("margin-left ");
            var after = (parseInt(before) + winWide * 0.87) + "px ";
            picleft.style.marginLeft = after;
            iconright.style.display = "block ";
            console.log(parseInt(after));
            if (parseInt(after) >= 1) {
                iconleft.style.display = "none ";
            }
        }
    </script>
    <script src="../js/0_mutual.js"></script>
</body>

</html>