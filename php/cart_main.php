<?php 
session_start();
$userName="訪客";
if (isset($_COOKIE["userName"])){
    $userName=$_COOKIE["userName"];
}
else{
    setcookie("lastPage", "cart_main.php");
    header("location: user_login.php");
}

$arr = $_SESSION["gwc"];    
$amount=0;
foreach($arr as $k=>$v){
    $v[1];
    $amount = $amount +$v[1];
}

if (isset($_POST["deleteBtn"])){
   unset($_SESSION["gwc"]);
}

// echo $_POST["myseat"];
?>


<!DOCTYPE html>
<html lang="en">

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
    
        <div id="cart_div" class="hide">
            <div id="cart_ref"></div>
        </div>
        <div class="container downsection content">
        <h1 class="text-center mb-3">購物車商品</h1> 
        <?php if($amount==0){
            echo "<h5 class='text-center my-5 text-muted'> 您的購物車目前尚未選購商品! </h5>";

        } else {
            echo '<div class="">
                    <table class="col-12 table ">
                        <thead>
                            <tr class="bg-dark text-white">
                                <th scope="col"></th>
                                <th scope="col">商品</th>
                                <th scope="col">售價</th>
                                <th scope="col">數量</th>
                                <th scope="col">小計</th>
                            </tr>
                        </thead>
                        <tbody>
                        <form method="post" action="12-1_checkout.php">';
            $arr = $_SESSION["gwc"];     
            $sum = 0;
            $amount=0;
            
            foreach($arr as $k=>$v)
            {
               $v[0]; $v[1];
               require("config.php");
               $sql = "select * from product where productID='{$v[0]}'";
               $result = mysqli_query($link,$sql);
               $row=mysqli_fetch_assoc($result);
               $tot=$row["price"]*$v[1];
               //  var_dump($result);
               // <input name="cart" value="shop" type="hidden">
               echo "<tr>
                        <td><a href='cart_deleteOne.php?sy={$k}'>刪除</a></td>
                        <td><img class='p_img' src='../img/product/{$row["src"]}'> 
                            {$row["productName"]}<input name='p_name' value='{$v[0]}' type='hidden'></td>
                        <td>{$row["price"]}</td>
                        <td>{$v[1]}<input name='amount' value='$v[1]' type='hidden'></td>
                        <td>{$tot}</td>
                    </tr>";   

               $amount = $amount +$v[1];
               $sum = $sum +$v[1]*$row["price"];
            }
 
            echo "</tbody>      
                    </table>
                    <hr>
                    <h3 class='col-12 text-right'>總計:<span class='price'>NT$ $sum 元 </span></h3><input name='any' type='hidden' value='5'>
                        <p class='col-12 text-right'>數量:<span class='price'> $amount </span>件</h3>
                    <div class='text-right'>
                        <a class='btnA mx-2' style='width:250px;padding:10px' name='deleteBtn' href='cart_deleteAll.php' >清除購物車 </a>
                        <a class='btnA mx-2' style='width:250px;padding:10px' name='checkoutBtn' href='cart_checkout.php?amount= $amount &sum= $sum '><input name='tot'  type='hidden' value='abc'>結帳 </a>
                        <p class='my-3'>下一步:確認收件方式與付款資訊 </p>
                    </div>
                </div>
            </form>
        </div>";
        }?>
        </div>
    </div>
    <footer>Copyright 2020 返笑喜劇俱樂部
        <span class="xshide"> | All Rights Reserved | Designed by Nydia Lin</span>
    </footer> 
    
    <script src="../js/0_mutual.js"></script>

</body>

</html>
