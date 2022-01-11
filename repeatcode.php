<?php 

require 'coon.php';

function Clean($input){

    return  trim(strip_tags(stripslashes($input)));

 
}
 

$errors = ['title' => null , 'content' => null , 'date' => null ];



$title     = Clean($_POST['title']); 
$content = Clean($_POST['content']);
$date = Clean($_POST['date']);

#Validate title
if(empty( $title )){
    $errors['title'] = "title is required";
}
elseif(!preg_match("/^[a-zA-Z-' ]*$/",$title)){

    $errors['title'] = "Invalid title only string";
}

 #Validate content
 if(empty($content)){
    $errors['content'] = "conten is required";
}elseif(strlen($content) < 10){
  $errors['content'] = "Length must be >= 10 chars";

}

if(empty($date)){
    $errors['date'] = "date is required";








}



?>