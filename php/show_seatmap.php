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
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>知名演員__返笑喜劇俱樂部</title>
    <link rel="stylesheet" href="../css/show_seatmap.css">
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
    

    <div class="d-flex downsection flex-wrap justify-content-center">
        <div class="col-12 d-flex p-4 mb-2">
            <div class="col-3">
                <img class="img-fluid" src="../img/show/<?= $row["src"]?>" alt="">
            </div>
            <form method="post" action="show_checkout.php" >
                <div class="col-8">
                    <h5><?= $row["sName"]?> </h5> <input type="hidden" name="showName" value="<?= $row["sName"]?>">
                    <p>主辦:薩泰爾娛樂</p>
                    <p>演出場次:<?= $row["sDate"]?></p> <input type="hidden" name="session" value="<?= $row["sDate"]?>">
                    <p>演出地點:<?= $row["loc"]?>(<?= $row["city"].$row["town"].$row["address"]?>)</p> 
                    <input type="hidden" name="location" value="<?= $row["loc"]?>">
                    <input type="hidden" name="address" value="(<?= $row["city"].$row["town"].$row["address"]?>)">
                </div>
            
        </div>
        <div class="col-12 text-center steps">
            <div class="d-inline-block  text-center col-2">
                <p class="current_step ml-auto mr-auto">1</p>
                <p>選擇座位/張數</p>
            </div>
            <div class="d-inline-block text-center col-2">
                <p class="ml-auto mr-auto">2</p>
                <p class="ml-auto mr-auto">結帳</p>
            </div>
            <div class="d-inline-block text-center col-2">
                <p class="ml-auto mr-auto">3</p>
                <p>完成訂購</p>
            </div>
        </div>
        <div class="col-12  d-flex justify-content-center " id="seat_info">
            <div class="col-4 mt-5">
                <table>
                    <tr>
                        <th>顏色</th>
                        <th>票區</th>
                        <th>尚餘</th>
                        <th>對號</th>
                        <th>票價</th>
                    </tr>
                    <tr class="tr_info">
                        <td id="sectionA"></td>
                        <td>A區</td>
                        <?php
                        require("config.php");
                        $sql= <<<command
                        SELECT COUNT(*) FROM `seat` WHERE section="A" and vacancy="Y"
                        command;
                        $result=mysqli_query($link,$sql);
                        $row=mysqli_fetch_assoc($result);
                        ?>
                        <td><?= $row["COUNT(*)"] ?></td>
                        <td>是</td>
                        <td>$500</td>
                    </tr>
                    <tr class="tr_info">
                        <td id="sectionB"></td>
                        <td>B區</td>
                        <?php
                        require("config.php");  
                        $sql= <<<command
                        SELECT COUNT(*) FROM `seat` WHERE section="B" and vacancy="Y"
                        command;
                        $result=mysqli_query($link,$sql);
                        $row=mysqli_fetch_assoc($result);
                        ?>
                        <td><?= $row["COUNT(*)"] ?></td>
                        <td>是</td>
                        <td>$300</td>
                    </tr>
                    <tr class="tr_info">
                        <td id="sectionC"></td>
                        <td>C區</td>
                        <?php
                        require("config.php");
                        $sql= <<<command
                        SELECT COUNT(*) FROM `seat` WHERE section="C" and vacancy="Y"
                        command;
                        $result=mysqli_query($link,$sql);
                        $row=mysqli_fetch_assoc($result);
                        ?>
                        <td><?= $row["COUNT(*)"] ?></td>
                        <td>是</td>
                        <td>$100</td>
                    </tr>
                </table>
                <br>
                
                    <h6>您已選擇: <input id="myseat"  name="myseat" type="hidden"> </h6>
                    <p id="selected"></p>
                    <h6>總計張數: <span id="qty" class="num"></span>張 </h6>
                    <h6>票價: <span id="ticket_price" class="num"></span> </h6>
                    <a href="13-1_ticketcheckout.php">
                        <button name=checkoutBtn class="btnA text-center link mb-4" id="checkout_btn">前往結帳</button>
                    </a>
                </form>
            </div >
            <div id="seat_space" class="col-6 ">
                <div class="border p-2 mb-3">
                    <div class="seat_status_sold"></div><span>已售出</span>
                    <div class="seat_status_chosen"></div><span>已選擇</span>
                </div>
                <div id="stage" class="col-7 mb-3 ml-auto mr-auto">表演舞台</div>
                <div class=" ml-auto mr-auto" id="mydiv">
                    <?php
                    $link=mysqli_connect("localhost","root","","backtosmile",3306) ;
                    $result = mysqli_query($link,"set names utf8");
                    $commandText = <<<SqlQuery
                    SELECT * from seat
                    SqlQuery;
                    $result = mysqli_query ( $link, $commandText );
                    // var_dump($commandText );
                    while ($row = mysqli_fetch_assoc($result)){ ?>

                        <?php if ($row["vacancy"]=="N"){ ?>
                        <div class="section<?= $row["section"]; ?> every_seat sold" data-price=<?= $row["price"]; ?>><?= $row["seatID"]; ?> </div> 

                        <?php }else{  ?>  
                        <div class="section<?= $row["section"]; ?> every_seat selling" data-price=<?= $row["price"]; ?>><?= $row["seatID"]; ?></div> 
                        <?php } ?>
                        
                    <?php } ?>
                </div>
            </div> 
        </div>                   
    </div>                   
                
    <footer>Copyright 2020 返笑喜劇俱樂部
        <span class="xshide "> | All Rights Reserved | Designed by Nydia Lin</span>
    </footer>

    <script>
        var steps = document.querySelector(".steps");
        var tr_info = document.querySelectorAll(".tr_info");
        var sectionA = document.querySelectorAll(".sectionA");
        var sectionB = document.querySelectorAll(".sectionB");
        var sectionC = document.querySelectorAll(".sectionC");
        var qty = document.getElementById("qty");
        qty.innerText = "0";

        // 滑鼠經過左右兩邊 對應的位子區塊會有BORDER，滑鼠OUT樣式就會消失
        tr_info.forEach(function(item, index) {
            item.addEventListener('mouseover', function() {
                item.style.backgroundColor = "cadetblue";
                item.style.cursor = "pointer";
                if (index === 0) {
                    sectionA.forEach(function(item) {
                        item.style.border = "2px solid black";
                    })
                } else if (index === 1) {
                    sectionB.forEach(function(item) {
                        item.style.border = "2px solid black";
                    })
                } else {
                    sectionC.forEach(function(item) {
                        item.style.border = "2px solid black";
                    })

                }
            });
            item.addEventListener('mouseout', function() {
                item.style.backgroundColor = "white";
                if (index === 0) {
                    sectionA.forEach(function(item) {
                        item.style.border = "2px solid white";
                    })
                } else if (index === 1) {
                    sectionB.forEach(function(item) {
                        item.style.border = "1px solid white";
                    })
                } else {
                    sectionC.forEach(function(item) {
                        item.style.border = "1px solid white";
                    })

                }
            })
        })

        // 滑鼠經過右邊的區塊  左邊的表格也會變換樣式
        var every_seat = document.querySelectorAll(".every_seat")
        every_seat.forEach(function(item) {
            item.addEventListener('mouseover', function(e) {
                if (e.target.classList.contains("sectionA")) {
                    tr_info[0].style.backgroundColor = "cadetblue";
                    e.target.style.border = "2px solid black";
                } else if (e.target.classList.contains("sectionB")) {
                    tr_info[1].style.backgroundColor = "cadetblue";
                    e.target.style.border = "2px solid black";
                } else {
                    tr_info[2].style.backgroundColor = "cadetblue";
                    e.target.style.border = "2px solid black";
                }
            })
            item.addEventListener('mouseout', function(e) {
                tr_info[0].style.backgroundColor = "white";
                e.target.style.border = "2px solid black";
            });
        });
        //避免滑左邊的位置 左邊的表格全部變顏色
        mydiv.addEventListener('mouseout', function(e) {
            if (e.target.classList.contains("sectionA")) {
                tr_info[0].style.backgroundColor = "white";
                e.target.style.border = "0px solid black";
            } else if (e.target.classList.contains("sectionB")) {
                tr_info[1].style.backgroundColor = "white";
                e.target.style.border = "0px solid black";
            } else {
                tr_info[2].style.backgroundColor = "white";
                e.target.style.border = "0px solid black";
            }
        });


        // 點選位子=>左邊出現選擇座位號碼
        var tot = [];
        var chosen_seat = [];
        var seats = document.querySelectorAll(".selling");
        var qty;
        var after;
        var ticket_price;
        var seat_price;
        seats.forEach(function(seat) {
            // 位子被點選時會有灰底白字
            seat.addEventListener("click", function() {
                seat.classList.toggle("selected_seat");
                var selected = document.getElementById("selected");
                chosen_seat.push(seat.innerText)
                // 當選取的位置沒有selected_seat，就刪除陣列中的內容
                //當同樣的位子出現兩次，就刪除

                // 計算票價
                const priceList = [{
                    area: "A區",
                    price: 500,
                }, {
                    area: "B區",
                    price: 300,
                }, {
                    area: "C區",
                    price: 100,
                }]
                ticket_price = document.getElementById("ticket_price");
                if (seat.classList.contains("sectionA")) {
                    tot.push(priceList[0].price)

                } else if (seat.classList.contains("sectionB")) {
                    tot.push(priceList[1].price)
                } else {
                    tot.push(priceList[2].price)
                }

                function plus(total, num) {
                    return total + num;
                }
                if (seat.classList.contains("selected_seat") === false) {

                    if (chosen_seat.indexOf(seat.innerText) != -1) {
                        chosen_seat.splice(chosen_seat.indexOf(seat.innerText), 1)
                        chosen_seat.pop();
                    }

                };

                // 如果點選的位置不包含selected_seat的CLASS， 總價格陣列數量超過兩個， 總價格加總就扣掉最後一個價格 * 2
                // 這樣判斷不對，假設有白目客人狂點同個位置的話，因為原本的方法沒有去刪減取消選取的票價，價格就錯誤了
               
                seat_price = parseInt(seat.getAttribute("data-price"));
                if (!seat.classList.contains("selected_seat")) {
                    tot.splice(0, 1);
                    tot.pop();
                    ticket_price.innerText = `NT$ ${tot.reduce(plus)}`;
                } else {
                    ticket_price.innerText = `NT$ ${tot.reduce(plus)}`;
                }

                after = Array.from(new Set(chosen_seat)); //去除重複的值
                selected.innerText = `${after}`
                // 計算張數
                qty = document.getElementById("qty");
                qty.innerText = after.length;
                
                 // 按下前往結帳後
                checkout_btn.onclick = function() {
                     myseat.setAttribute("value",after)
                };
            })
        });
    </script>
     <script src="../js/0_mutual.js"></script>



</body>

</html>