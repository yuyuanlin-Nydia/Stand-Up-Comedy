<?php
setcookie("userName","Guest",time()-60*60*24);
header("location: index1.php");

?>