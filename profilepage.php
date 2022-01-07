<?php

session_start();


echo'NAME:' . $_SESSION['name'].'<hr>';
echo 'PASSWORD:' . $_SESSION['password'].'<hr>';
echo 'EMAIL:' . $_SESSION['email'].'<hr>';
echo 'ADDRESS:' . $_SESSION['address'].'<hr>';
echo 'URL:' . $_SESSION['url'].'<hr>';
echo 'GENDER:' . $_SESSION['gender'].'<hr>';
echo 'IMAGE:' . $_SESSION['image'].'<hr>';

?>