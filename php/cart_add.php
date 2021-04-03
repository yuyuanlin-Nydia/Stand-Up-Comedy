<?php
session_start();
$userName="訪客";
if (isset($_COOKIE["userName"])){
    $userName=$_COOKIE["userName"];
    
}
$id = $_GET["id"];

//如果是第一次添加購物車,造一個二維數組存到SESSION裏面
//如果不是第一次添加，有兩種情況
 //1.如果該商品購物車裏面不存在，造一個一維數組扔到二維裏面
 //2.如果該商品在購物車存在，讓數量加1
 
//empty()函數用來判斷"值"是不是空的
 if(empty($_SESSION["gwc"]))
 {
     //如果是第一次添加購物車,造一個二維數組存到SESSION裏面
     $arr = array(
         array($id,1)
     );
     
     $_SESSION["gwc"] = $arr;
 }
 else
 {
     $arr = $_SESSION["gwc"];
     $bs = false; //預設沒出現過，一開始直接跳到else
     foreach($arr as $v)
     {
         if($v[0]==$id)
         {
             $bs = true;
         }
     }
     
     if($bs)
     {
         //2.如果該商品在購物車存在，讓數量加1
         foreach($arr as $k=>$v)
         {
             if($v[0] == $id)
             {
                 $arr[$k][1]++;  //用一個變量K來取值和賦值，因為只是取到的值給了$v來代表數組的值,其實數組的值並不會因為$v改變而改變
             }
         }
         $_SESSION["gwc"] = $arr;
         
     }
     else
     {
         //1.該商品購物車裡不存在，造一個一維陣列$attr放進二維陣列$arr
         $attr = array($id,1);
         $arr[] = $attr;
         $_SESSION["gwc"] = $arr;
         var_dump($attr);
     }
 }
 
// var_dump($arr);

// 回到上一頁，不應該是都跳往產品頁面
echo "<script>history.back()</script>";
// header("location: 7-1_product.php");//跳轉到產品介面

?>
