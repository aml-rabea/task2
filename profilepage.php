<?php

session_start();


echo'NAME:' . $_SESSION['name'].'<hr>';
echo 'PASSWORD:' . $_SESSION['password'].'<hr>';
echo 'EMAIL:' . $_SESSION['email'].'<hr>';
echo 'ADDRESS:' . $_SESSION['address'].'<hr>';
echo 'URL:' . $_SESSION['url'].'<hr>';
echo 'GENDER:' . $_SESSION['gender'].'<hr>';



?>
<html>


<head>

</head>
<body>
    <img src="<?php  echo  $_SESSION['image']; ?> " width="200px" height="200px">
</body>
</html>