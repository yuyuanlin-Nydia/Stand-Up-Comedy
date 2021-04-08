<?php
session_start();
$userName="訪客";
if (isset($_COOKIE["userName"])){
    $userName=$_COOKIE["userName"];
    
}
$_SESSION["FirstName"]=$_POST["cFirstName"];

require("config.php");
if(isset($_POST["okBtn"])){
    $sql = <<< command
    insert into customer
    (cLastName,cFirstname,account,password,tele,eMail,gender,birthday,city,town,address)
    values
    ('{$_POST["cLastName"]}','{$_POST["cFirstName"]}','{$_POST["account"]}','{$_POST["password"]}','{$_POST["tele"]}','{$_POST["eMail"]}','{$_POST["gender"]}','{$_POST["birthday"]}','{$_POST["city"]}','{$_POST["town"]}','{$_POST["address"]}');
    command;
    $result = mysqli_query($link, $sql);
    echo "<script>alert('註冊完成! 即將跳轉至首頁，請重新登入!');location.href = 'index.php'</script>";
    exit();
};

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
    <form method="post" action="">
        <div class="box" id="member_form">
            <h3>請輸入以下資料</h3>
            <p>
                <span class=span_red>*為必填欄位，請填妥欄位資訊。</span>
            </p>
            <p><label for="username"><span class=span_red>*</span>姓　　名</label> <input required class="input2" name="cLastName" type="text" placeholder="姓" id="username">&nbsp;&nbsp;<input  name="cFirstName" class="input2" type="text" placeholder="名"> </p>
            <p><label for="account"><span class=span_red>*</span>帳　　號</label> <input required class="input1" name="account" type="text" placeholder="請輸入至少六位數帳號" id="account"> </p>
            <p><label for="password"><span class=span_red>*</span>密　　碼</label> <input required class="input1" name="password" type="password" placeholder="請輸入至少六位數密碼" id="password" pattern="[a-zA-Z0-9]{6,}"> </p>
            <p><label for="confirm_pwd"><span class=span_red>*</span>確認密碼</label> <input required class="input1" type="password" placeholder="請再次輸入密碼" id="confirm_pwd" pattern="[a-zA-Z0-9]{6,}"> </p>
            <!-- 驗證碼?? -->
            <p><label for="phone"><span class=span_red>*</span>手　　機</label> <input required class="input1"name="tele" type="text" pattern="09[0-9]{2}-[0-9]{6}" placeholder="EX:0912-345678" id="phone"> </p>
            <p><label for="eMail"><span class=span_red>*</span>電子信箱</label> <input required class="input1" name="eMail" type="email"  placeholder="EX:abc@abc.com" id="eMail"> </p>
            <p><label for="gender"><span class=span_red>*</span>性　　別</label>
                <select class="input1" name="gender" id="gender"  >
                    <option value="男">男</option>
                    <option value="女">女</option>
                </select> </p>
            <p>
                <label for="birthday"><span class=span_red>*</span>出生日期</label>
                <input id="birthday" type="date" name="birthday">
            </p>
            <p>
                <label for="address"><span class=span_red>*</span>地　　址</label>
                <select id='city' name="city"  class="input2">
                    <option>選擇縣市</option>
                    <?php  
                    require("config.php");
                    $sql = "SELECT DISTINCT city FROM taiwan";//DISTINCT可選出欄位中具有不同名稱的資料
                    $result = mysqli_query($link, $sql);
                    ?>
                    <?php while ($data = mysqli_fetch_assoc($result)): ?>            
                        <option value="<?php echo $data["city"];?>"><?php echo $data["city"];?></option>
                    <?php endwhile; ?>
                </select>
                <select id='items' class="input2" name="town">
                    <option>選擇鄉鎮</option>
                </select>
                <input required class="input1"  name="address"type="text" id="addresstext">
            </p>
            <hr>
            <h3>會員使用條款</h3>
            <pre class="member_regulation">
            歡迎您在網站進行瀏覽與消費，為維護您的權益，購物前請仔細閱讀以下約定條款。
            認知與接受條款Branded Lifestyle()，Taiwan Branch()系依據本服務條款提供網站（http://www..com.tw）服務。本約定條款是為了保護「您」以及「 Canada Ltd.（以下簡稱）」的利益，當您點選「我同意」的選項或在 網站進行訂購、付款、消費或進行相關行為，即視為您事先已經知悉並同意遵守本約定條款的所有約定。
            當你使用網站時，即表示你已閱讀、瞭解並同意接受本約定書之所有內容。
            有權於任何時間修改或變更本約定書之內容，建議你隨時注意該等修改或變更。你於任何修改或變更後繼續使用網站，視為你已閱讀、瞭解並同意接受該等修改或變更。
            若你未滿十八歲，除應符合上述規定外，並應于你的家長（或監護人）閱讀、瞭解並同意本約定書之所有內容及其後修改變更後，方得使用或繼續使用網站。當你使用或繼續使用網站時，即表示你的家長（或監護人）已閱讀、瞭解並同意接受本約定書之所有內容及其後修改變更。
            您同意您與間有關網站相關服務使用事宜，得以電子文件（如：電子郵件或網站公告）為意思表示方法。
            一、會員規則
             Friends
            非為 VIP，請於台灣官方購物網站或 App申請加入成為 Friends。
            
            如何升級為VIP:
            自首筆消費日起一年內累積消費滿NT$20,000 (淨值價)，即可升等成為 VIP；如該年度內未達到升級成為 VIP，則於次年度起累積消費金額歸零重新累計。 (舉例:首筆消費日為2020/4/1，該年度的到期日為 2021/3/31，次年度的消費金額起始日從2021/4/1開始累計) 
            若於累積期間內單日單筆消費滿NT$10,000者，即可申辦 VIP，Friends資格即失效。
            點數累積:
            憑 Friends資格於全台專櫃/專賣店、台灣官方購物網站或 APP，每消費NT$100即可累積紅利點數1點，每一積分點於專櫃/專賣店下次消費時抵扣NT$1，但需本人持卡及身份証明文件方可抵扣。
            
            
             VIP
            凡至全台專櫃/專賣店、台灣官方購物網站或 APP單筆消費滿NT$10,000即可申辦 VIP。(第三方購物網站不適用)
            
            VIP 優惠:
            凡為 VIP消費，於全台專櫃/專賣店、台灣官方購物網站或 APP消費可享當季正價商品85折，於折扣期間8、7折商品可再享95折優惠。(6折、特價品及折扣皮件商品恕不適用)
            凡 VIP可享 Café 9折優惠及 Home 95折優惠。
            點數累積:
            憑 VIP卡於全台專櫃/專賣店、台灣官方購物網站或 APP，每消費NT$100即可累積紅利點數1點，每一積分點於專櫃/專賣店下次消費時抵扣NT$1，但需本人持卡及身份証明文件方可抵扣。
            
            
            紅利點數細則
            紅利點數於當筆消費日7天後匯入會員帳戶中，並可開始使用。
            台灣官方購物網站及 APP同享會員優惠，線上消費始可累積紅利點數，並可使用紅利點數扣抵。線上購物新增之紅利點數，因需作業處理時間，將於7個工作天轉入會員帳戶。
            紅利點數有效期為二年，自紅利點數匯入帳戶日起算，若於到期日前未使用，將直接移除紅利點數，恕不另行通知。
            每位貴賓之累積紅利點數不得轉讓他人，亦不得兌換成現金。
            會員每人限申請一個帳號，限本人使用，不得轉讓或重複申請。
            欲查詢紅利點數，請至官方網站www..com.tw
            如欲補登紅利點數，請提供消費簽單及電子發票等收據，至全台專櫃/專賣店於消費日起三十天辦理補登，逾期則無法補登；若申請終止會員或經本公司撤銷會員資格或終止會員服務者，其紅利點數及相關優惠等同時失效。
            如本公司系統發生異常情況，本公司有權停止會員權益及優惠，直到異常狀況解除，所有資料以本公司系統紀錄為準。
            新申辦會員首筆消費補登，須於消費日起7天內(含消費當日) 至全台專櫃提出補登需求，並檢附消費簽單及發票等收據，逾期無法補登。
            紅利點數計算將以優惠折扣後之實際消費金額為基準。
            
            
            商品退換貨時紅利點數細則
            換貨
            更換等值商品：將直接安排換貨流程。
            更換大於原購買金額之商品：差額付款不得使用紅利點數折抵。
            更換小於原購買金額之商品：
            (1)如非使用紅利點數折抵，將以原付款方式退還差額，並於未匯入會員帳戶中之紅利點數先扣除退還該差額所產生之紅利點數。
            (2)如使用紅利點數折抵，則優先退還原折抵之紅利點數，若紅利點數不足時再以原付款方式退還「剩餘差額」，並於未匯入會員帳戶中之紅利點數先扣除該「剩餘差額」所產生之紅利點數。
            退貨
            非使用紅利點數折抵商品：將以原付款方式退還，並取消未匯入會員帳戶中之紅利點數。
            使用紅利點數折抵商品：將紅利點數與金額部分以原付款方式退還，並取消未匯入會員帳戶中之紅利點數。
            
            
            相關權益
            本會員制度僅適用於台灣地區全台專賣店、百貨專櫃、台灣官方購物網站與 App購物中心。(不含第三方網站)
            申請對象須年滿16歲以上，每人限申請一個帳號，限本人使用，不得轉讓或重複申請，且持卡人不得同時持有 Friends及 VIP，如經查獲，僅保留最高層級之會員資格，其他會員資格即自動失效。
            持APP行動會員卡享會員優惠及優惠券活動，截圖與翻拍畫面無效
            申辦會員應提供您本人正確、最新的資料，若您提供任何錯誤或不實的資料、或未按指示提供資料、或欠缺必要之資料時，有權不經事先通知，逕行暫停或終止您的帳號。倘個人資料有異動時，請即時更新您個人資料之正確性，以獲取最佳服務。
            辦理退貨時，該筆消費所產生的消費金額，將不計入紅利積點或會員升等之累積消費。
            已作廢之卡片（遺失卡、到期卡）仍被流通時，視為無效，本公司有權將卡片收回，避免再次誤用。
            如有實體卡，請妥善保管 VIP卡，持行動會員卡者如欲重新申辦，請親臨專櫃由銷售人員為您重新核發行動會員卡；如欲重新申辦實體卡者需另酌收辦卡手續工本費NT$50。
            憑卡至全台專賣店及百貨專櫃或於 App，即可查詢現有累積消費金額及有效期限。如有疑問，請電洽客服專線0800-00-1973
            本公司保留隨時變更使用規則之權利及任何爭議之最終決定權。最新使用規則請以全台專賣店、百貨專櫃及官方網站 www..com.tw 及 APP(不含第三方網站)公告為準。
            </pre>

            <input type="checkbox" id="agree"><label for="agree">我同意以上條款</label><br>
            <button type="submit" name="okBtn" class="btnA" id="submit">送出資料</button>
        </div>
    </form>
    <footer>Copyright 2020 返笑喜劇俱樂部
        <span class="xshide"> | All Rights Reserved | Designed by Nydia Lin</span>
    </footer>


     <script>
        $(document).on('change', '#city', function(){
            // val() 方法返回或设置被选元素的值。如果该方法未设置参数，则返回被选元素的当前值。
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
    <script src="../js/0_mutual.js "></script>

</body>

</html>