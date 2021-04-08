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
    <link rel="stylesheet" href="../css/actor.css">
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
    
    <!-- 大圖當背景 設定在CSS -->
    <div id="bigpic"></div>
    <h2 class=" animate__animated animate__bounceInDown 	animate__slow animate__delay-2s" id="pictitle">知名演員。</h2>
    <div id="smbox">
        <h3 class="title pt-3">登場人物</h3>
        <div id="container" class="col-12  d-flex mb-4 ml-auto mr-auto ">
            <i id="iconleft" class="fa fa-chevron-left  picicon " aria-hidden="true" style="font-size: 40px;" onclick="moveleft()"></i>
            <div class="actormenu d-flex justify-content-start m-3 ">
                <a class="flex-shrink-0 " id="picleft" href="#brian"><img class="topimg" src="../img/actor/3_brian2.jpg" alt="">
                    <p class="bg-info p-3">脫口秀學霸<br> 《曾博恩Brian》</p>
                </a>
                <a href="#jim"><img class="topimg" src="../img/actor/3_jim.jpg " alt="">
                    <p class="bg-info p-3">地獄梗王<br> 《程建評Jim》</p>
                </a>
                <a href="#longlong"><img class="topimg" src="../img/actor/3_longlong1.jpg" alt="">
                    <p class="bg-info p-3">脫口秀小天后<br> 《龍龍》</p>
                </a>
                <a href="#kylie"><img id="kellypic" class="topimg" src="../img/actor/3_kelly.jpg" alt="">
                    <p class="bg-info p-3">脫口秀犀利人妻<br> 《凱莉Kylie》</p>
                </a>
                <a href="#hlong"><img class="topimg" src="../img/actor/3_賀龍-2.jpg" alt="">
                    <p class="bg-info p-3">Better than brian<br> 《賀瓏》</p>
                </a>
                <a href="#haoping"><img class="topimg" src="../img/actor/3_黃豪平.jpg" alt="">
                    <p class="bg-info p-3">比想像中好笑<br> 《黃豪平》</p>
                </a>
                <a href="#ihao"><img class="topimg" src="../img/actor/3_黃逸豪.jpg" alt="">
                    <p class="bg-info p-3" ;>80年代相聲演員<br>《黃逸豪》</p>
                </a>
                <a id="picright" href="#sour"><img class="topimg" src="../img/actor/3_酸酸.jpg" alt="">
                    <p class="bg-info p-3">脫口秀元祖<br>《酸酸》</p>
                </a>
            </div>
            <i id="iconright" class="fa fa-chevron-right picicon " aria-hidden="true" style="font-size: 40px;" onclick="moveright()"></i>
        </div>
    </div>

    

    <div>
        <div id="brian" class="section d-md-flex justify-content-center p-5">
            <div class="col-md-5 col-lg-3 m-sm-1 d-flex flex-wrap   align-items-center ">
                <img class="col-12 img-fluid " class="downimg " src="../img/actor/3_brian1.jpg " alt=" ">
                <div class="col-12 snsgroup d-flex  justify-content-center pt-lg-3">
                    <a class="xshide mr-5 " href="https://www.facebook.com/brianstandup/" target="_blank"><i class="fa fa-facebook-square " aria-hidden="true " style="font-size: 50px;color:white; "></i></a>
                    <a class="xshide" href="https://www.youtube.com/channel/UCDrswN-SqWh7Kii62h9aXGA " target="_blank"> <i class="fa fa-youtube-square " aria-hidden="true " style="font-size: 50px;color:white; "> </i></a>
                </div>
            </div>
            <div class="sectionB col-md-6 col-lg-7   col-sm-12 col-12 ">
                <h2>曾博恩Brian</h2>
                <div class="d-flex flex-wrap justify-content-start ">
                    <div>資歷</div>
                    <div class="flex-grow-1">七年</div>
                </div>
                <div class="d-flex flex-wrap justify-content-start ">
                    <div>風格</div>
                    <div class="flex-grow-1 ">主持節目「博恩夜夜秀」犀利的訪問挑戰觀眾的高笑點與政治敏感神經，主題圍繞在政治和社會議題，完整重現美式的綜藝節目風格。</div>
                </div>
                <div class="d-flex flex-wrap justify-content-start ">
                    <div>熱門影片</div>
                    <div class="flex-grow-1 ">大奶薇薇<br>節目《博恩夜夜秀》</div>
                </div>
                <div class="d-flex flex-wrap justify-content-start ">
                    <div>演出作品</div>
                    <div class="flex-grow-1 ">龍龍 x 博恩《 頂尖對決》<br>《世代交替》<br>《另存新檔》</div>
                </div>
                <div class="d-flex flex-wrap justify-content-start ">
                    <div>紀錄</div>
                    <div class="flex-grow-1 ">
                        -2019年成為台灣首位以單口喜劇形式在兩廳院表演的表演者<br>-博恩夜夜秀為臺灣第一個開放網路募資的脫口秀節目<br>-2020年首度結合單口喜劇與音樂喜劇的表演</div>
                </div>
            </div>
        </div>
        <div id="jim" class="section d-md-flex justify-content-center  p-5 ">
            <div class=" col-md-5 col-lg-3 m-sm-1  d-flex flex-wrap  justify-content-end align-items-center ">
                <img class="col-12 img-fluid " class="downimg " src="../img/actor/3_jim.jpg " alt=" ">
                <div class="col-12 snsgroup d-flex justify-content-around pt-4">
                    <a class="xshide  mr-5" href="https://www.facebook.com/JimComedy " target="_blank"><i class="fa fa-facebook-square " aria-hidden="true " style="font-size: 50px; color:var(--mcolor3); "></i></a>
                    <a class="xshide" href="https://www.youtube.com/channel/UCbK-qRSSDNoqgpkqdWDK3PA " target="_blank"> <i class="fa fa-youtube-square " aria-hidden="true " style="font-size: 50px;color:var(--mcolor3);"> </i></a>
                </div>
            </div>
            <div class="sectionB col-md-6  col-lg-7 col-sm-12 col-12 ">
                <h2>程建評Jim</h2>
                <div class="d-flex flex-wrap justify-content-start ">
                    <div>資歷</div>
                    <div class="flex-grow-1 ">兩年</div>
                </div>
                <div class="d-flex flex-wrap justify-content-start ">
                    <div>風格
                    </div>
                    <div class="flex-grow-1 ">無厘頭反應力極快的演出者，地獄梗的內容，挑戰你的道德底線。</div>
                </div>
                <div class="d-flex flex-wrap justify-content-start ">
                    <div>經歷</div>
                    <div class="flex-grow-1 ">博恩夜夜秀-街訪Jim派特報員</div>
                </div>
                <div class="d-flex flex-wrap justify-content-start ">
                    <div>演出作品</div>
                    <div class="flex-grow-1 ">YOUTUBE個人頻道「在演出的路上」， 搭配Vlog形式與單口喜劇紀錄製作影片
                    </div>
                </div>
            </div>
        </div>

        <div id="longlong" class="section d-md-flex justify-content-center p-5  ">
            <div class="col-md-5 col-lg-3 m-sm-1  d-flex flex-wrap  justify-content-end align-items-center ">
                <img class="col-12 img-fluid " class="downimg " src="../img/actor/3_longlong2.jpg " alt=" ">
                <div class="col-12 snsgroup d-flex justify-content-around pt-3">
                    <a class="xshide mr-5" href="https://www.facebook.com/lunglungtragiclife " target="_blank"><i class="fa fa-facebook-square " aria-hidden="true " style="font-size: 50px;color:white; "></i></a>
                    <a class="xshide" href="https://www.youtube.com/channel/UCVeQrZaD8fOlB5zcxIzFUtg " target="_blank"> <i class="fa fa-youtube-square " aria-hidden="true " style="font-size: 50px;color:white; "> </i></a>
                </div>
            </div>
            <div class="sectionB col-md-6 col-lg-7 col-sm-12 col-12 ">
                <h2>龍龍</h2>
                <div class="d-flex flex-wrap justify-content-start ">
                    <div>風格</div>
                    <div class="flex-grow-1 ">擅長以生活的經歷編織成笑料內容，以輕鬆又帶著厭世的獨特個人魅力，走跳現場喜劇及網路世界。</div>
                </div>
                <div class="d-flex flex-wrap justify-content-start ">
                    <div>熱門影片</div>
                    <div class="flex-grow-1 ">〈不要和Gay當好朋友〉<br>〈頂尖對決完整版〉 <br>〈客家男友摳到爆〉<br>哥哥的閃電刀疤雞〉
                    </div>
                </div>
                <div class="d-flex flex-wrap justify-content-start ">
                    <div>演出作品</div>
                    <div class="flex-grow-1 ">《龍龍x博恩-頂尖對決》<br> 《龍龍x黃豪平 鬥嘴 好難不與你鬥》<br> 《幽默大師上課囉》</div>
                </div>
                <div class="d-flex flex-wrap justify-content-start ">
                    <div>紀錄</div>
                    <div class="flex-grow-1 ">
                        24歲即成為全台最年輕開個人秀之單口喜劇演員 <br> 2019與全台新光影城合作舉辦個人秀，電影院舉辦單口喜劇第一人
                    </div>
                </div>
            </div>
        </div>
        <div id="kylie" class="section d-md-flex justify-content-center p-5  ">
            <div class="col-md-5 col-lg-3 m-sm-1   d-flex flex-wrap  justify-content-end align-items-center ">
                <img class="col-12 img-fluid " class="downimg" src="../img/actor/3_kelly.jpg " alt=" ">
                <div class="col-12 snsgroup d-flex justify-content-around pt-4">
                    <a class="xshide mr-5" href="https://www.facebook.com/kyliesquats " target="_blank"><i class="fa fa-facebook-square " aria-hidden="true " style="font-size: 50px;color:var(--mcolor3); "></i></a>
                    <a class="xshide" href=" "> <i class="fa fa-youtube-square " target="_blank" aria-hidden="true " style="font-size: 50px;color:white "> </i></a>
                </div>
            </div>
            <div class="sectionB col-md-6 col-lg-7 col-sm-12 col-12 ">
                <h2>凱莉Kylie</h2>
                <div class="d-flex flex-wrap justify-content-start ">
                    <div>風格</div>
                    <div class="flex-grow-1 ">有著腐女、慾女的心，語不驚人死不休，常以人妻身份在單口喜劇演出時， 演繹私密尺度的段子，表演過程中會被她的魔性笑聲所感染。
                    </div>
                </div>
                <div class="d-flex flex-wrap justify-content-start ">
                    <div>經歷</div>
                    <div class="flex-grow-1 ">柯文哲 勝選國際記者會現場口譯<br> 國際狗語日報 X 百靈果News 主持人</div>
                </div>
                <div class="d-flex flex-wrap justify-content-start ">
                    <div>演出作品</div>
                    <div class="flex-grow-1 ">《凱莉X黃豪平X微笑丹尼-笑友會2》<br> 《夏日尋歡季》
                        <br> 《龍龍x黃逸豪x馬克吐司x凱莉-幽默大師上課囉！》
                    </div>
                </div>
                <div class="d-flex flex-wrap justify-content-start ">
                    <div>紀錄</div>
                    <div class="flex-grow-1 ">百靈果News為台排名第一的Podcast常勝軍</div>
                </div>
            </div>
        </div>

        <div id="hlong" class="section d-md-flex justify-content-center p-5  ">
            <div class="col-md-5 col-lg-3 m-sm-1   d-flex flex-wrap  justify-content-end align-items-center ">
                <img class="col-12 img-fluid " class="downimg " src="../img/actor/3_賀龍.jpg " alt=" ">
                <div class="col-12 snsgroup d-flex justify-content-around pt-4">
                    <a class="xshide mr-5" href="https://www.facebook.com/horlunghello " target="_blank"><i class="fa fa-facebook-square " aria-hidden="true " style="font-size: 50px;color:white; " target="_blank"></i></a>
                    <a class="xshide" href="https://www.youtube.com/channel/UCnXLslDRBPExnUBunhM918Q " target="_blank"> <i class="fa fa-youtube-square " aria-hidden="true " style="font-size: 50px;color:white; "> </i></a>

                </div>
            </div>
            <div class="sectionB col-md-6 col-lg-7  col-sm-12 col-12 ">
                <h2>賀瓏</h2>
                <div class="d-flex flex-wrap justify-content-start ">
                    <div>風格</div>
                    <div class="flex-grow-1 ">演出內容大膽卻討喜，誇張但邏輯滿點，靠著自己呆傻憨萌的氣質，發展出不同的笑點，吸引許多「鐵賀粉」。賀瓏在「博恩夜夜秀」的人設是想要爭奪主持位置，最有名的一句話是Better than brian，常被拿來和博恩比較。
                    </div>
                </div>
                <div class="d-flex flex-wrap justify-content-start ">
                    <div>經歷</div>
                    <div class="flex-grow-1 ">《博恩夜夜秀》班底</div>
                </div>
                <div class="d-flex flex-wrap justify-content-start ">
                    <div>演出作品</div>
                    <div class="flex-grow-1 ">《百日隔離計畫》<br> 《才不理你》<br>《賀龍x龍哥x范綱群-何不龍嘴》
                    </div>
                </div>
            </div>
        </div>

        <div id="haoping" class="section d-md-flex justify-content-center p-5 ">
            <div class="col-md-5 col-lg-3 m-sm-1  d-flex flex-wrap  justify-content-end align-items-center ">
                <img class="col-12 img-fluid " class="downimg " src="../img/actor/3_黃豪平.jpg " alt=" ">
                <div class="col-12 snsgroup d-flex justify-content-around pt-4">
                    <a class="xshide mr-5" href="https://www.facebook.com/sayhellotoping " target="_blank"><i class="fa fa-facebook-square " aria-hidden="true " style="font-size: 50px;color:var(--mcolor3); "></i></a>
                    <a class="xshide" href="https://www.youtube.com/user/smaljohnA " target="_blank"> <i class="fa fa-youtube-square " aria-hidden="true " style="font-size: 50px;color:var(--mcolor3); "> </i></a>

                </div>
            </div>

            <div class="sectionB col-md-6 col-lg-7 col-sm-12 col-12 ">
                <h2>黃豪平</h2>
                <div class="d-flex flex-wrap justify-content-start ">
                    <div>資歷</div>
                    <div class="flex-grow-1 ">十年
                    </div>
                </div>
                <div class="d-flex flex-wrap justify-content-start ">
                    <div>經歷</div>
                    <div class="flex-grow-1 ">2012年參加《超級模王大道》，以模仿青峰、蔡康永聞名<br> 金鐘獎紅毯零負評主持人<br>《綜藝玩很大》<br>《綜藝3國智》主持群
                    </div>
                </div>
                <div class="d-flex flex-wrap justify-content-start ">
                    <div>演出作品</div>
                    <div class="flex-grow-1 ">《凱莉X黃豪平X微笑丹尼-笑友會2》<br> 《性教育》影片
                    </div>
                </div>
            </div>
        </div>
        <div id="ihao" class="section d-md-flex justify-content-center p-5 ">
            <div class="col-md-5 col-lg-3 m-sm-1   d-flex flex-wrap  justify-content-end align-items-center ">
                <img class="col-12 img-fluid " class="downimg " src="../img/actor/3_黃逸豪.jpg " alt=" ">
                <div class="col-12 snsgroup d-flex justify-content-around pt-4">
                    <a class="xshide mr-5" href="https://www.facebook.com/fanterryuku "><i class="fa fa-facebook-square " aria-hidden="true " style="font-size: 50px;color:white; "></i></a>
                    <a class="xshide" href="https://www.youtube.com/user/terryuku "> <i class="fa fa-youtube-square " aria-hidden="true " style="font-size: 50px;color:white; "> </i></a>
                </div>
            </div>
            <div class="sectionB col-md-6 col-lg-7 col-sm-12 col-12 ">
                <h2>黃逸豪</h2>
                <div class="d-flex flex-wrap justify-content-start ">
                    <div>風格</div>
                    <div class="flex-grow-1 ">經典穿搭為藍色的長袍，很會掌握現場節奏，帶動氣氛。
                    </div>
                </div>
                <div class="d-flex flex-wrap justify-content-start ">
                    <div>經歷</div>
                    <div class="flex-grow-1 ">在《博恩夜夜秀》以護家盟的起手式爆紅，同時是相聲演員</div>
                </div>
                <div class="d-flex flex-wrap justify-content-start ">
                    <div>演出作品</div>
                    <div class="flex-grow-1 ">《龍龍x黃逸豪x馬克吐司x凱莉-幽默大師上課囉！》
                    </div>
                </div>
            </div>
        </div>

        <div id="sour" class="section d-md-flex justify-content-center p-5 ">
            <div class="col-md-5 col-lg-3 m-sm-1   d-flex flex-wrap  justify-content-end align-items-center ">
                <img class="col-12 img-fluid " class="downimg " src="../img/actor/3_酸酸.jpg " alt=" ">
                <div class="col-12 snsgroup d-flex justify-content-around pt-4">
                    <a class="xshide mr-5" href="https://www.facebook.com/AcidComedy " target="_blank"><i class="fa fa-facebook-square " aria-hidden="true " style="font-size: 50px;color:var(--mcolor3); "></i></a>
                    <a class="xshide" href="https://www.youtube.com/user/AcidComedyTV " target="_blank"> <i class="fa fa-youtube-square " aria-hidden="true " style="font-size: 50px;color:var(--mcolor3); "> </i></a>
                </div>
            </div>
            <div class="sectionB col-md-6 col-lg-7 col-sm-12 col-12 ">
                <h2>酸酸</h2>
                <div class="d-flex flex-wrap justify-content-start ">
                    <div>風格</div>
                    <div class="flex-grow-1 ">常將自己是女同志的身分、出櫃的過程寫成段子，成為酸酸的經典演出。
                    </div>
                </div>
                <div class="d-flex flex-wrap justify-content-start ">
                    <div>經歷</div>
                    <div class="flex-grow-1 ">《博恩夜夜秀》固定單元「酸酸知道」主持人<br>中國的節目《超級演說家》來賓<br>PODCAST「涵酸電波」主持人
                    </div>
                </div>
                <div class="d-flex flex-wrap justify-content-start ">
                    <div>演出作品</div>
                    <div class="flex-grow-1 ">《天下吾酸》<br> 《第二人生》

                    </div>
                </div>
            </div>
        </div>
    </div>
    <footer class="myfooter ">Copyright 2020 逗陣笑喜劇俱樂部 | All Rights Reserved | Designed by Nydia Lin
    </footer>


    <script>
        var list = [];
        var picleft = document.getElementById("picleft");
        var iconright = document.getElementById("iconright");
        var iconleft = document.getElementById("iconleft");

        function moveright() {
            // 登場人物下方小圖往右的點擊事件
            var lastitem = list.length - 1;
            var before = window.getComputedStyle(picleft).getPropertyValue("margin-left");
            var after = (parseInt(before) - 200) + "px";
            picleft.style.marginLeft = after;
            iconleft.style.display = "block";
            list.push(iconright.getBoundingClientRect().right);
            // 到最後時向右ICON會往左移，getBoundingClientRect().right就會變小
            if (iconright.getBoundingClientRect().right < list[lastitem - 1]) {
                iconright.style.display = "none";
            }
        }

        function moveleft() {

            var before = window.getComputedStyle(picleft).getPropertyValue("margin-left");
            var after = (parseInt(before) + 200) + "px";
            picleft.style.marginLeft = after;
            iconright.style.display = "block";
            console.log(picleft.style.marginLeft);
            if (parseInt(picleft.style.marginLeft) >= 0) {
                iconleft.style.display = "none";
            }
        }
    </script>
    <script src="../js/0_mutual.js"></script>

</body>

</html>