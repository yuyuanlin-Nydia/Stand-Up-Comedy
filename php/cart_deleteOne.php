<?php
 session_start();

 $sy = $_GET["sy"];
 
 $arr = $_SESSION["gwc"];
 unset($arr[$sy]);
 $arr = array_values($arr);
 $_SESSION["gwc"] = $arr;
 header("location: cart_main.php");

