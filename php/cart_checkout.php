<?php
session_start();

$userName="訪客";
if (isset($_COOKIE["userName"])){
    $userName=$_COOKIE["userName"];
    
}

require("config.php");
$sql = <<< command
SELECT * from customer
where account='{$_COOKIE["userName"]}'
command;
$result = mysqli_query($link, $sql);
$row = mysqli_fetch_assoc($result);
$orderDate=date('Y-m-d');

$arr = $_SESSION["gwc"];   
$amount=0;
foreach($arr as $k=>$v){
    $v[0]; $v[1];
    $amount = $amount +$v[1];
}


if (isset($_POST["checkout"])){
    // 加入Oder表格
    $sql = <<< command
    INSERT INTO orders (cID,orderDate,shipCity,shipTown,shipAddress)
    values({$row["cID"]},'$orderDate','{$row["city"]}','{$row["town"]}','{$row["address"]}')
    command; 
    $result = mysqli_query($link, $sql);  
    // echo "<br><br><br><br><br>".$sql;

    foreach($arr as $k=>$v){
        $v[0]; $v[1];
        $sql = "select * from product where productID='{$v[0]}'";
        $result = mysqli_query($link, $sql);  
        $row=mysqli_fetch_assoc($result);

        $sql2 = <<< command
        select * from orders ORDER BY orderID DESC LIMIT 1
        command; 
        $result2 = mysqli_query($link, $sql2);
        $row2=mysqli_fetch_assoc($result2); 

        // 加入Order_details表格
        $sql3 = <<< command
        INSERT INTO orders_details (orderID,productID,unitPrice,quantity)
        values({$row2["orderID"]},$v[0],{$row["price"]},$v[1])
        command; 
        $result = mysqli_query($link, $sql3); 
        unset($_SESSION["gwc"]);
        header("location:index1.php");
    }
}


?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>知名演員__返笑喜劇俱樂部</title>
    <link rel="stylesheet" href="../css/cart_main.css">
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
    <div class="content">
        <div class="container d-flex downsection" >
            <div class="col-8 mx-2 ">
                 <div class="bg-white my-3 p-4 rounded">
                    <h2>配送資訊</h2>
                    <hr>
                    <h5>收件人資訊 </h5>
                    <p>姓名:&nbsp;&nbsp;<?= $row["cLastName"].$row["cFirstName"]   ?></p>
                    <p>電話:&nbsp;&nbsp;<?= $row["tele"]   ?></p>
                    <p>地址:&nbsp;&nbsp;<?= $row["city"].$row["town"].$row["address"]   ?></p>
                </div>
                <div class="bg-white p-4 rounded">
                    <h2>信用卡資訊</h2>
                    <hr>
                    <input type="number" style="width:140px" class="mx-2">-<input type="number" style="width:140px"class="mx-2">-<input type="number"style="width:140px"class="mx-2">-<input type="number" style="width:140px" class="mx-2">
                </div>            

            </div>
            <div class="">
                <form method="post" action="">
                <p>購買數量: <b class="float-right" style="font-size:20px"><?= $_GET["amount"]."件"  ?> </b></p>
                <p>商品總計: <b class="float-right" style="font-size:20px"><?= $_GET["sum"]."元"  ?> </b></p>
                <p>運費:
                <?php
                if ($_GET["sum"] >999){
                    echo "<s class='float-right'>$60</s>"."<span>您已達免運門檻</span>";
                }else{
                    echo "<span class='float-right'>$60</span>";
                }
                ?> 
                </p>
                <hr>
                <p>實付金額:<b class="float-right" style="font-size:20px"><?php
                if ($_GET["sum"] >999){
                    echo $_GET["sum"]."元";
                }else{
                    $tot=$_GET['sum']+60;
                    echo "$tot"."元" ;  
                }
                ?> </b> </p>
                <button id="finished" name="checkout" type="submit" class="btnA" style="width:250px;padding:10px">結帳 </button>
            </form>

            </div>
        </div>
    </div>

    <footer>Copyright 2020 返笑喜劇俱樂部
        <span class="xshide"> | All Rights Reserved | Designed by Nydia Lin</span>
    </footer>
    <script src="./js/0_mutual.js"></script>
    <script>
        var finished= document.getElementById('finished');
        finished.addEventListener("click",function(){
            alert("已訂購完成，商品會在3-5天送達您的指定住址");
        })
    </script>
</body>
</html>