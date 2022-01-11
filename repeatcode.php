<?php 

require 'coon.php';

function Clean($input){

    return  trim(strip_tags(stripslashes($input)));

 
}
 

$errors = ['title' => null , 'content' => null , 'date' => null ];



$title     = Clean($_POST['title']); 
$content = Clean($_POST['content']);


#validate image
if(!empty($_FILES['image']['name'])){

    $imgName     = $_FILES['image']['name'];
    $imgTempPath = $_FILES['image']['tmp_name'];
    $imagSize    = $_FILES['image']['size'];
    $imgType     = $_FILES['image']['type'];
 
 
     $imgExtension1= explode('.',$imgName);
     $imgExtension        = strtolower(end($imgExtension1));
 
     $Extensions   = ['png','jpg','gif'];
 
        if(in_array($imgExtension ,$Extensions)){

            if($_FILES['image']['size'] <2000000){
           
         $finalName = rand().time().'.'.$imgExtension;
 
          $disPath = './images/'.$finalName;
           
         if(move_uploaded_file($imgTempPath,$disPath)){

           
           
         }else{
               $errors['image'] = 'Error Try Again';
         }
        }else{
               $errors['image'] =  "file is big";
        }
        }else{
            $errors['image'] =  'Extension Not Allowed';
        }
 
 
    }else{
        $errors['image'] =  'Image Field Required'.'<br>'.'<br>'  ;
    }
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