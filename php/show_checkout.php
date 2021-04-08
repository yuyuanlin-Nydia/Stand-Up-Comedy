<?php
session_start();
$userName = "訪客";
if (isset($_COOKIE["userName"])) {
    $userName = $_COOKIE["userName"];
} else {
    header("location: user_login.php");
}

//把字串轉成陣列
$seat = explode(",", $_POST["myseat"]);

//結帳 把資料送進資料庫
if (isset($_POST["checkoutBtn2"])) {
    require("config.php");
    $sql = "UPDATE seat SET vacancy = 'N' WHERE seatID in(";
    $sql2 = "";
    for ($i = 0; $i < count($_POST["seatID"]); $i++) {
        $sql2 .= "'{$_POST['seatID'][$i]}',";
    }
    ;
    $sql = $sql . rtrim($sql2, ",") . ")"; //去除最後的逗號並加上括號
    // echo '<br><br><br><br><br><br>'.$sql ;
    // UPDATE seat SET vacancy = 'N' WHERE seatID in('3排01','3排02')
    $result = mysqli_query($link, $sql);
    echo '<script>alert("感謝您透過返笑喜劇俱樂部訂票!");
        location.href="index.php"</script>';
} else {
    //上一頁沒選擇座位時
    //會需要放在else裡是因為因為表單post給自己 $seat會是空
    if ($seat[0] == '') {
        echo '<script>alert("您未選擇任何座位!請重新選擇");
        history.back()</script>';
    }
}
;

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>知名演員__返笑喜劇俱樂部</title>

    <link rel="stylesheet" href="../css/0_mutual.css">
    <link rel="stylesheet" href="../css/bootstrap/bootstrap.min.css">
    <script src="../js/bootstrap/jquery.min.js"></script>
    <script src="../js/bootstrap/popper.min.js"></script>
    <script src="../js/bootstrap/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
    <style>
        @import url("https://fonts.googleapis.com/earlyaccess/notosanstc.css");
        .delete{
            cursor:pointer;
        }
        .delete:hover{
            text-decoration:underline;
        }
        .downsection{
            margin-top:120px;
        }
    </style>
</head>

<body >
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
            <h1 class="text-center mb-3">欲購買票券</h1>
            <div style="background-color:var(--mcolor4)" class="p-4">
                <h4 class="text-info"><?=$_POST["showName"]?> </h4>
                <span>日期:<?=$_POST["session"]?></span><br>
                <span>地點:<?=$_POST["location"] . $_POST["address"]?></span><br><br>
                <form method="post" action="" >
                <table class="col-12 table ">
                    <thead>
                        <tr class="bg-warning text-dark">
                            <th scope="col">座位資訊</th>
                            <th scope="col">數量</th>
                            <th scope="col">區域</th>
                            <th scope="col">售價</th>
                            <th scope="col">移除</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                        for ($i = 0; $i < count($seat); $i++) {
                            require("config.php");
                            $result = mysqli_query($link, "set names utf8");
                            $sql = <<< cmd
                            SELECT * FROM `seat` where seatID='$seat[$i]';
                            cmd;
                            $result = mysqli_query($link, $sql);
                            $row = mysqli_fetch_assoc($result);
                    ?>
                         <tr>
                            <td> <?=$seat[$i]?><input name='seatID[]' value=<?=$seat[$i]?> type='hidden'></td>
                            <td class='qty'>1<input name='amount' value='$v[1]' type='hidden'></td>
                            <td ><?=$row["section"]?>區</td>
                            <td class='price'><?=$row["price"]?></td>
                            <td class="delete" onclick="deleteItem(this)">刪除</td>
                        </tr>
                    <?php }?>
 		            </tbody>
                </table>
            </div>
            <hr>
            <h3 class='col-12 text-right'>總計:<span >NT$<span id="tot_price"></span>  元 </span></h3><input name='any' type='hidden' value='5'>
            <h4 class='col-12 text-right'>數量:<span > <span id="tot_qty"> </span>張</h4>
            <div id="checkout" class="container my-5 ">
                <h2>訂購人基本資料</h2>
                <hr>
                <?php
                    $sql = <<< cmd
                    SELECT cId,cFirstName,cLastName,tele,eMail FROM `customer` where account='$userName';
                    cmd;
                    $result = mysqli_query($link, $sql);
                    $row = mysqli_fetch_assoc($result);
                ?>
                <div>
                    <label for="name">姓　　名 &nbsp;<input type="text" id="name"  value="<?=$row["cLastName"] . $row["cFirstName"]?>"></label> <br>
                    <label for="tele">電　　話&nbsp; <input type="text" id="tele" value="<?=$row["tele"]?>"></label> <br>
                    <label for="email">電子郵件&nbsp; <input type="text" id="email" value="<?=$row["eMail"]?>"></label> <br>
                    <p>※請輸入正確的E-mail，系統將寄送訂單回函至您的信箱。 若您遲未收到訂單回函，請至會員服務中查詢您的訂單紀錄 <br> ※下單前請再次確認您的購買明細及配送資訊，訂單成立後無法異動訂單內容
                    </p>
                </div>
                <div class="my-5">
                    <h2>信用卡資訊</h2>
                    <hr>
                    <input type="text" style="width:140px" class="mx-2" pattern="[0-9]{4}">-<input type="text" style="width:140px" class="mx-2" pattern="[0-9]{4}">-<input type="text" style="width:140px" class="mx-2" pattern="[0-9]{4}">-<input type="text" style="width:140px" class="mx-2" pattern="[0-9]{4}">                </div>
                <div>
                    <input type="button" class='btnA mx-2' style='width:150px;padding:10px' name='deleteBtn' id='deleteBtn' value="取消購買">
                    <input type="submit" class='btnA mx-2' style='width:150px;padding:10px' name='checkoutBtn2' value="結帳">
                </div>
                </form>
            </div>

            </div>
        </div>
    </div>
</div>
    <footer>Copyright 2020 返笑喜劇俱樂部<span class="xshide"> | All Rights Reserved | Designed by Nydia Lin</span>
    </footer>
    <script src="0_mutual.js"></script>
    <!-- <script src="7-3-1_product.js"></script> -->
    <script>
        //計算數量和價格
        function count(){
            var qty=document.getElementsByClassName('qty');
            tot_qty.innerText=qty.length
            var all=0;
            var price=document.getElementsByClassName('price');
            for(i=0;i<price.length;i++){
                 all+=parseInt(price[i].innerText);
            };
            tot_price.innerText=all
        }
        count();

        //按下刪除=>移除表格外，再重新計算票價和數量
        function deleteItem(apple){
            apple.parentNode.remove();
            count();
        }

        //按下取消購買 回到首頁
        deleteBtn.onclick=function(){
            var answer=confirm("確定取消購票嗎?");
            if(answer){
                window.location.href="index.php";
            }
        }


    </script>


</body>

</html>
