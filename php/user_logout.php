<?php
setcookie("userName","Guest",time()-60*60*24);
unset($_SESSION["gwc"]);
header("location: index1.php");

?>