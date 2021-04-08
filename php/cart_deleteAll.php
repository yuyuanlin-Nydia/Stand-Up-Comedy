<?php
session_start();

$userName = "訪客";
if (isset($_COOKIE["userName"])) {
    $userName = $_COOKIE["userName"];

}

unset($_SESSION["gwc"]);

?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>商品訂購__返笑喜劇俱樂部</title>

    <style>
        @import url("https://fonts.googleapis.com/earlyaccess/notosanstc.css");
    </style>
</head>

<body>
    <script>
        alert("您的購物車已清空!");
        window.location.href="index.php";
    </script>

</body>
</html>
