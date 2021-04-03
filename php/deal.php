<?php
$city = $_POST['city'];//接收用POST方法丟過來的縣市
$link=mysqli_connect("localhost","root","","backtosmile",3306);
$sql = "SELECT town FROM taiwan  WHERE city = '$city'";
$result = mysqli_query($link, $sql) or die("取出資料失敗！".mysqli_error($link));
$res = "";//把準備回傳的變數res準備好
while($data=mysqli_fetch_assoc($result)){
   $res .= "
      <option value='{$data["town"]}'>{$data['town']}</option>
   ";//將對應的型號項目遞迴列出
};
// var_dump($sql);

echo $res;//將型號項目丟回給ajax



?>