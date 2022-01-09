<?php 


function Clean($input){

    $input =  trim($input);
    $input =  strip_tags($input);
    $input =  stripslashes($input);
   return $input;

 
}
 

$errors = ['title' => null , 'content' => null , 'image' => null ];

if($_SERVER['REQUEST_METHOD'] == "POST"){

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
}elseif(strlen($content) < 6){
  $errors['content'] = "Length must be >= 50 chars";

}


$file = fopen('text.txt',"a") or die('unable to open file');
$blogData = $title."|---|".$content."|---|".$disPath."\n";
 fwrite($file, $blogData);

   fclose($file);
   
   }


?>

<!DOCTYPE html>
<html>

<head>
  <title>task5</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>



<div class="container">

  <h2>task5</h2>

  <form  method="post"  action="<?php  echo  $_SERVER['PHP_SELF'];?>"  enctype="multipart/form-data">

  
  <div class="form-group">
    <label for="exampleInputName">Title</label>
    <input type="text" class="form-control" id="exampleInputName"  name="title" aria-describedby="" placeholder="Enter content">
    <span style="color: pink "><?php if(isset($errors) ) {echo $errors ['title'];}?></span>
  </div>

  <div class="mb-3">
  <label for="exampleFormControlTextarea1" class="form-label">Content</label>
  <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="content"></textarea>
    <span style="color: pink "><?php if(isset($errors) ) {echo $errors ['content'];}?></span>
  </div>

  <div class="form-group">
    <label for="exampleInputPassword">Image</label>
    <input type="file"  name="image">
    <span style="color: pink "><?php if(isset($errors) ) {echo $errors ['image'];}?></span>
  </div>
  <input type="submit" class="btn btn-primary" value="submit">
</form>


</div>
</body>
</html>
