<?php
$userName="訪客";
if (isset($_COOKIE["userName"])){
    $userName=$_COOKIE["userName"];
    
}
require("config.php");
if (isset($_POST["okBtn"])) {

$sql=<<< cmd
update customer
set password='{$_POST["password"]}',
tele='{$_POST["tele"]}',
eMail='{$_POST["eMail"]}',
city='{$_POST["city"]}',
town='{$_POST["town"]}',
address='{$_POST["address"]}'
where account='{$_COOKIE["userName"]}'
cmd;

// echo "$sql";
$result=mysqli_query($link,$sql);
// $row=mysqli_fetch_assoc($result);
header("location: index.php");

};
$sql = <<< command
SELECT password,tele,eMail,city,town,address
from customer
where account='{$_COOKIE["userName"]}'
command;

$result = mysqli_query($link, $sql);
$row = mysqli_fetch_assoc($result);


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
    <link rel="stylesheet" href="../css/user_register.css">
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
    
    <div class="box downsection" id="member_form">
        <h3>修改個人資訊</h3>
        <p>
            <span class=span_red>*為必填欄位</span>
        </p>
 
        <p><label for="new_pwd"><span class=span_red>*</span>新密碼</label> <input class="input1" name="password" type="text" placeholder="請輸入至少八位數密碼"  id="password"> </p>
        <p><label for="confirm_pwd"><span class=span_red>*</span>確認密碼</label> <input class="input1" type="text" placeholder="請再次輸入密碼" name="password"  id="confirm_pwd"> </p>
        <!-- 驗證碼?? -->
        <p><label for="phone"><span class=span_red>*</span>手機</label> <input class="input1" name="tele" type="text" pattern="09[0-9]{2}-[0-9]{6}" placeholder="EX:0912-345678" value=<?php echo "$row[tele]" ?>  id="phone"> </p>
        <p><label for="eMail"><span class=span_red>*</span>電子信箱</label> <input class="input1" name="eMail" type="email"  placeholder="EX:abc@abc.com" value=<?php echo "$row[eMail]" ?> id="eMail"> </p>
        <p><label for="address"><span class=span_red>*</span>地址</label>
        
        <select id='city' name="city"  class="input2">
        <option>選擇縣市</option>
        <?php  
        require("config.php");
        $sql = "SELECT DISTINCT city FROM taiwan";//DISTINCT可選出欄位中具有不同名稱的資料
        $result = mysqli_query($link, $sql);

        ?>
        <?php while ($data = mysqli_fetch_assoc($result)) : ?>
                              
            <option value="<?php echo $data["city"];?>"><?php echo $data["city"];?></option>

        <?php endwhile; ?>
        </select>
    
        <select id='items' class="input2" name="town">
            <option>選擇鄉鎮</option>
        </select>
        <input class="input1" name="address" type="text" value=<?php echo "$row[address]" ?> id="addresstext">
    </p>
    <hr>
    <script>
        $(document).on('change', '#city', function(){
        var city = $('#city :selected').val();//注意:selected前面有個空格！
        $.ajax({
          url:"deal.php",				
          method:"POST",
          data:{
             city:city
          },					
          success:function(res){					
            $('#items').html(res);//處理回吐的資料
          }
        })//end ajax
        });
        </script>

        <script>

        $(document).on('change', '#city', function(){
           var city = $('#city :selected').val();//注意:selected前面有個空格！
           $.ajax({
              url:"deal.php",				
              method:"POST",
              data:{
                 city:city
              },					
              success:function(res){					
                $('#items').html(res);//處理回吐的資料
              }
           })//end ajax
        });
    </script>

        </p>
            <button type="submit" name="okBtn" class="btnA" id="submit">送出資料</button>
        </div>
    </div>
    </div>
    <footer>Copyright 2020 返笑喜劇俱樂部
        <span class="xshide "> | All Rights Reserved | Designed by Nydia Lin</span>
    </footer>
</div>
     </form>
     </div>
    <script src="../js/0_mutual.js "></script>

</body>

</html>