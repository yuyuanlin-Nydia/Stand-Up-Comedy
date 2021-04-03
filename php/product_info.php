<?php
session_start();
$userName = "訪客";
if (isset($_COOKIE["userName"])) {
    $userName = $_COOKIE["userName"];
}

$arr = $_SESSION["gwc"];
$amount = 0;
foreach ($arr as $k => $v) {
    $v[1];
    $amount = $amount + $v[1];
}

require("config.php");
$id = $_GET["id"];
$commandText = <<<SqlQuery
SELECT * from product
where ProductID=$id
SqlQuery;
$result = mysqli_query($link, $commandText);
$row = mysqli_fetch_assoc($result);
mysqli_close($link);


if(!isset($_SESSION['status'])){
    $_SESSION['status'] = 0;
}
// 送出評論
if (isset($_POST["okBtn"]) && $_SESSION['status']==0){
    require("config.php");
    $today=date('Ymd');
    $id = $_GET["id"];
    $commandText = <<<SqlQuery
    INSERT into comment (productID,cID,date,content,rating) VALUES ($id,(SELECT cID FROM customer where account="$userName"),$today,"{$_POST["content"]}","{$_POST["rating"]}")
    SqlQuery;
    $result = mysqli_query($link, $commandText);
    mysqli_close($link);

    $_SESSION['status'] +=1;
}
?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>知名演員__返笑喜劇俱樂部</title>
    <link rel="stylesheet" href="../css/product_individual.css">
    <link rel="stylesheet" href="../css/0_mutual.css">
    <link rel="stylesheet" href="../css/bootstrap/bootstrap.min.css">
    <script src="../js/bootstrap/jquery.min.js"></script>
    <script src="../js/bootstrap/popper.min.js"></script>
    <script src="../js/bootstrap/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.3/css/all.css" integrity="sha384-SZXxX4whJ79/gErwcOYf+zWLeJdY/qpuqC4cAa9rOGUstPomtqpuNWT9wdPEn2fk" crossorigin="anonymous">
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
        <div id="downsection" class="container d-flex justify-content-center ">
            <div id="rightsection" class="d-flex col-lg-10">
                <div class="col-lg-6 d-flex flex-wrap">
                    <div id="bigpic" class="col-12 justify-self-center mb-2"><img class="img-fluid" src="../img/product/<?=$row["src"]?>" alt=""></div>
                    <div id="picbox" class=" d-flex">
                        <img class="mx-2 sm_pic" src="../img/product/<?=$row["src"]?>" alt="">
                        <img class="mx-2" src="../img/product/<?=$row["src2"]?>" alt="">
                    </div>
                </div>
                <div class="col-lg-6">
                    <h3 data-id="1"><?=$row["productName"]?></h3>
                    <p>全店，滿NT$1,500，即享免運優惠</p>
                    <h5>NT$<?=$row["price"]?></h5>
                    <p>數量</p>
                    <i id="minus_btn" class="fa fa-minus num_i" aria-hidden="true"></i> <input id="qty_input" type="text" value="1"><i id="plus_btn" class="fa fa-plus num_i" aria-hidden="true"></i>
                    <div>
                    <a  href="cart_add.php?id=<?=$row["productID"]?>&;name=<?=$row["productName"]?>" >
                            <div id="addtocart" class="btnA d-inline-block">加入購物車</div>
                        </a>
                        <div class="btnA d-inline-block">結帳去</div>
                    </div>
                    <div class=" ">
                        <div>
                            <h5 class="d-inline-block">送貨方式</h5>
                            <i id="updown_btn" class=" fa fa-arrow-down d-inline-block " aria-hidden="true"></i>
                        </div>
                        <ul class="hide" id="shipping_way">
                            <li>宅配</li>
                            <li> 7-11 取貨</li>
                        </ul>
                    </div>
                </div>
            </div>

        </div>
        <div id="comment_sec"class="border container my-3 py-2 w-75">
            <h5 >商品評論</h5>
            <button class="btnB " id="write_comment" >撰寫評論</button>
            <br><br>
            <?php
            require('config.php');
            $commandText = <<<SqlQuery
            SELECT  cFirstName,cLastName,account from customer 
            where account='$userName'
            SqlQuery;
            $result = mysqli_query($link, $commandText);
            $row = mysqli_fetch_assoc($result);
            mysqli_close($link);
            ?>          
        <div id="comment_form" class="status">
            <form method="post" action="">
                <div>
                    <span class="form_title">姓名:&nbsp;&nbsp;&nbsp;</span> <input type="text"  value="<?= $row["cLastName"].$row["cFirstName"] ?>	">
                </div><br>
                <div class="star_container">
                    <span class="form_title">星等:</span>
                    <input type="radio" name="rating" id="rate-5" value=5><label for="rate-5" class="fas fa-star"></label>
                    <input type="radio" name="rating" id="rate-4" value=4><label for="rate-4" class="fas fa-star"></label>
                    <input type="radio" name="rating" id="rate-3" value=3><label for="rate-3" class="fas fa-star"></label>
                    <input type="radio" name="rating" id="rate-2" value=2><label for="rate-2" class="fas fa-star"></label>
                    <input type="radio" name="rating" id="rate-1" value=1><label for="rate-1" class="fas fa-star"></label>
                </div>
                <br>
                <!-- 避免重新整理不斷送資料 -->
                <input type="hidden" name="status" value="<? echo $_SESSION['status']; ?>">


                <div>
                    <span class="form_title">評論:&nbsp;&nbsp;&nbsp;</span><textarea rows="5" cols="50" placeholder='請分享您的購買經驗' name="content"></textarea><br>
                </div>
                <button type="submit" name="okBtn"  class="btnA">送出</button>
            </form>
        </div>
            <hr>
            <div id="comment_content">
                <?php
                require("config.php");
                $sql = <<< command
                SELECT co.cID,co.date,co.content,co.date,co.rating,cu.cFirstName,cu.cLastName FROM comment co inner join customer cu on co.cID=cu.cID where productID=$id order by commentID DESC
                command;
                $result=mysqli_query($link,$sql);
                while ($row=mysqli_fetch_assoc($result) ){ ?>
                <div class="my-3" >
                    <p><span class="text-left float-left"><?= $row["cLastName"].$row["cFirstName"] ?></span> <span class="text-right float-right text-muted"><?= $row["date"] ?></span></p><br>
                    <div class="show_star">
                    <?php for ($i=1;$i<=$row["rating"];$i++){?>
                        <input type="radio" name="rating" id="rate-<?= 6-$i ?>" value=<?= 6-$i ?>><label for="rate-<?= 6-$i ?>" class="fas fa-star" style="color:#fd4"></label>
                    <?php  } ?>
                    </div>
                    <p><?= $row["content"] ?></p>
                </div>
                <hr>
                <?php } ?>

                
            </div>
        </div>
        
    </div>
</div>
    <footer>Copyright 2020 返笑喜劇俱樂部<span class="xshide "> | All Rights Reserved | Designed by Nydia Lin</span>
    </footer>
    <script src="../js/0_mutual.js "></script>

    <script>
        // 點擊隱藏撰寫評論的表格
        write_comment.addEventListener("click",function(){
            comment_form.classList.toggle("status");
        })
        // 數量增減
        var qty_input = parseInt(document.getElementById("qty_input").value);
        minus_btn.addEventListener("click", function() {
           if (qty_input > 1) {
               qty_input -= 1;
               // console.log(num_input);
               document.getElementById("qty_input").value = qty_input;
           } else {
               // 待解決變成數量=0時，減號要變半透明
               // minus_btn.style.opacity = "0.2"
        
               document.getElementById("qty_input").value = 0;
           }
        });
        plus_btn.addEventListener("click", function() {
           // minus_btn.style.opacity = "1";
           qty_input += 1;
           document.getElementById("qty_input").value = qty_input;
        });


        // 左側產品圖
        picbox.addEventListener("click", function(e) {
           this.previousElementSibling.innerHTML = `<img src="${e.target.src}">`
        });
        updown_btn.addEventListener("click", function(e) {
           updown_btn.classList.toggle("updown_btn_rotate")
           shipping_way.classList.toggle("show");
        });
    </script>
</body>

</html>