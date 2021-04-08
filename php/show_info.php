<?php
session_start();
$userName="訪客";
if (isset($_COOKIE["userName"])){
    $userName=$_COOKIE["userName"];
    
}
require("config.php");
$id=$_GET["id"];
$commandText = <<<SqlQuery
SELECT s.locID, s.sName, s.sActor, s.sDate,s.src,l.loc,l.city,l.town,l.address
FROM showinfo as s
INNER JOIN locinfo as l
ON s.locID= l.locID
where sID = $id
SqlQuery;

$result = mysqli_query ( $link, $commandText );
$row = mysqli_fetch_assoc ( $result );
// var_dump($row);
mysqli_close($link);

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
    <link rel="stylesheet" href="../css/show_info.css">
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
    
    <div class="container downsection">
        <div>
            <h2><?= $row["sActor"]."《".$row["sName"]."》" ?></h2>
            <p>主辦:薩泰爾娛樂</p>
        </div>

        <div class="main-section d-flex ">
            <img class="col-3 img-fluid" src="../img/show/<?= $row["src"] ?>" alt="">
            <table class="col-9  table-striped">
                <tr>
                    <th>表演時間</th>
                    <th>表演地點</th>
                    <th>票價</th>
                    <th>票劵狀況</th>
                </tr>
                <tr>
                    <td><?= $row["sDate"] ?></td>
                    <td><?= $row["loc"] ?>​<br><?= $row["city"].$row["town"].$row["address"] ?>​</td>
                    <td>500、300、100 </td>
                    <td><a href="show_seatmap.php?id=<?= $id ?>">購買</a></td>
                </tr>
               
            </table>
        </div>
        <div class="down-section">
            <div class="">
                <ul class="text-center tabs">
                    <li class="tab_link btn-click active d-inline-block m-4 p-2" onclick="tabChange(event, 'item1')">節目介紹</li>
                    <li class="tab_link btn-click d-inline-block m-4 p-2" onclick="tabChange(event, 'item2')">人物介紹</li>
                    <li class="tab_link btn-click d-inline-block m-4 p-2" onclick="tabChange(event, 'item3')">折扣優惠</li>
                    <li class="tab_link btn-click d-inline-block m-4 p-2" onclick="tabChange(event, 'item4')">注意事項</li>
                </ul>
                <div class="tab_content d-flex flex-wrap justify-content-start w-75 mr-auto ml-auto">
                    <div id="item1" class="content_item show">
                        <p>睽違一年，曾博恩專場回歸！<br> TAIWAN從未有過的現場喜劇新體驗， 結合單口喜劇（stand-up comedy）與音樂喜劇（musical comedy）的120分鐘表演， 一睹你從來沒有看過的曾博恩！<br> 在 雙聲道 BliveT 裡不怕你不唱，只怕練太壯！<br> 單口喜劇還可以怎麼玩？ 一起陪薩泰爾走出新型喜劇的路，跟著我們一起挑戰從未嘗試過的演出形式！
                        </p>
                        <br>
                        <br>
                        
                        <br>
                    </div>
                    <div id="item2" class="content_item hide">
                        <p> 曾博恩，擁有高學歷，卻一腳踏入喜劇的世界!成為節目「博恩夜夜秀主持人」後，帶起一股單口喜劇的熱潮與討論。</p>
                        <br>
                        <br>
                        <br>
                        <br>
                        <br>        
                    </div>
                    <div id="item3" class="content_item hide">
                        <br>  
                        <b class="blue-words ">【折扣優惠】</b> <br> ◇會員享9折優惠<br> ◇團體票，全票購滿10張9折優惠(單場)<br> ◇身心障礙人士及陪同者(限1人)５折優惠，兩人須同時進場請持票及證件<br> ※輪椅席(平台空地，限使用輪椅之觀眾購買)，請洽主辦單位飛樂鈴揚或兩廳院國家音樂廳或戲劇院購買
                        <br>  <br>  
                    </div>
                    <div id="item4" class="content_item hide">
                        <b class="blue-words">【購票方式】</b>：<br> 1.網路（限信用卡）<br> 2.售票點（現金、信用卡）<br> 3.超商（限現金）萊爾富、7-11、全家<br> 網路購票說明： 1.請先加入會員<br> 2.取票方式（售票點取票、手機取電子票[僅部分場館開放使用]、國內郵寄[另收50元郵資]、超商取票[每張票券另收8元手續費]）。 <br>訂購完成即可取票，敬請提早領取。 <br><b class="blue-words">【注意事項】</b><br>                        ◎本演出建議4歲以上年齡觀賞，不論大人小孩，每人一票，請持票準時入場<br>◎退、換票最遲須於演出日10天前辦理，收票價10%手續費，逾期恕不受理
                        <br>◎演出同步錄影 <br>◎防疫期間觀賞演出，請配合量額溫，實聯制，並全程佩戴口罩
                    </div>
                </div>
            </div>
        </div>
    </div>
    <footer>Copyright 2020 返笑喜劇俱樂部 | All Rights Reserved | Designed by Nydia Lin
    </footer>
    <script src="0_mutual.js"></script>
    <script>
        function tabChange(evt, className) {
            var i, x, tablinks;
            // x抓取頁面中的class="content_item"
            x = document.getElementsByClassName("content_item");
            //計算x的長度並將這些class="class"都進行display:none隱藏的動作
            for (i = 0; i < x.length; i++) {
                x[i].style.display = "none";
            }
            //tablinks 抓取頁面中的tablink
            tablinks = document.getElementsByClassName("tab_link");
            //將tablinks代入for循環中並利用classList.remove刪除class="active" 
            for (i = 0; i < x.length; i++) {
                tablinks[i].classList.remove("active");
            }
            //document.getElementById=className(函數帶進來的參數)樣式設定為display:block; 當前點擊的a link執行function 顯示出來對應的內容。
            document.getElementById(className).style.display = "block";
            //並對當前點擊的div新增“active” 這個class
            evt.currentTarget.classList.add("active");
        }
    </script>
</body>

</html>
