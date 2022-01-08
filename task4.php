
<?php 
session_start();

function Clean($input){

      $input =  trim($input);
      $input =  strip_tags($input);
      $input =  stripslashes($input);
     return $input;

   
  }

  if($_SERVER['REQUEST_METHOD'] == "POST"){


    $name     = Clean($_POST['name']); 
    $password = Clean($_POST['password']);
    $address  = Clean($_POST['address']); 
    $email    = Clean($_POST['email']);
    $url      = Clean($_POST['url']);
    $gender   = clean( $_POST['gender']);
    //  echo print_r( $gender);
    $errors = [];
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
                 echo 'Image Uploaded';
                 $_SESSION['image'] =  $disPath ;
                 
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

 

#Validate name
    if(empty( $name )){
        $errors['name'] = "Name is required";
    }
    elseif(!preg_match("/^[a-zA-Z-' ]*$/",$name)){

        $errors['name'] = "Invalid name only string";
    }

#Validate email
 if(empty($email)){
      $errors['email'] = "email is required";

  }elseif(!filter_var($email,FILTER_VALIDATE_EMAIL)){
      $errors['email'] = "Invalid Email";
  }

  #Validate password
if(empty($password)){
      $errors['password'] = "password is required";
  }elseif(strlen($password) < 6){
    $errors['password'] = "Length must be >= 6 chars";

  }
  #Validate address
  if(empty($address)){
    $errors['address'] = "address is required";

}elseif(strlen($address) < 10){
  $errors['address'] = "Length must be >= 10 chars";
}
#Validate url

if(empty($url)){
    $errors['url'] = "url is required";

}elseif(!filter_var($url,FILTER_VALIDATE_URL)){
  $errors['url'] = " Invalid url ";

}
#Validate gender 
if(empty($gender)){
    $errors['gender'] = "gender is required";
}




    
           $_SESSION['name']= $name      ;
           $_SESSION['password'] =$password;
          $_SESSION['email']  = $email  ;
          $_SESSION['address'] = $address  ;
          $_SESSION['url'] =  $url        ;
         $_SESSION['gender']  =  $gender   ;
         
    }

  

    
?>



<!DOCTYPE html>
<html>

<head>
  <title>task3</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">
  <h2>task4</h2>
 
 
 
  <form  method="post"  action="<?php  echo  $_SERVER['PHP_SELF'];?>"  enctype="multipart/form-data">
 
  
  <div class="form-group">
    <label for="exampleInputName">Name</label>
    <input type="text" class="form-control" id="exampleInputName"  name="name" aria-describedby="" placeholder="Enter Name">
    <span><?php if(isset($errors) ) {echo "#".$errors ['name'];}?></span>
  </div>


  <div class="form-group">
    <label for="exampleInputEmail">Email address</label>
    <input type="text"   class="form-control" id="exampleInputEmail1" name="email" aria-describedby="emailHelp" placeholder="Enter email">
    <span><?php if(isset($errors) ) {echo "#".$errors ['email'];}?></span>
  </div>

  <div class="form-group">
    <label for="exampleInputPassword">New Password</label>
    <input type="text"   class="form-control" id="exampleInputPassword1" name="password" placeholder="Password">
    <span><?php if(isset($errors) ) {echo "#".$errors ['password'];}?></span>
  </div>
  <div class="form-group">
    <label for="exampleInputaddress">New address</label>
    <input type="text"   class="form-control" id="exampleInputadress1" name="address" placeholder="address">
    <span><?php if(isset($errors)) {echo "#".$errors ['address'];}?></span>
  </div>
   <div class="form-group">
    <label for="exampleInputurl">New url</label>
    <input type="text"   class="form-control" id="exampleInputurl1" name="url" placeholder="url">
    <span><?php if(isset($errors) ) {echo "#".$errors ['url'];}?></span>
  </div> 
  <div class="form-check">
  <input class="form-check-input" type="radio" name="gender" id="flexRadioDefault1">
  <label class="form-check-label" for="flexRadioDefault1">
  female
  </label>
  
</div>
<div class="form-check">
  <input class="form-check-input" type="radio" name="gender" id="flexRadioDefault2" >
  <label class="form-check-label" for="flexRadioDefault2">
  male
  </label>
  <span><?php if(isset($errors) ) {echo "#".$errors ['gender'];}?></span>
</div>
<div class="form-group">
    <label for="exampleInputPassword">Image</label>
    <input type="file"  name="image">
    <span><?php if(isset($errors) ) {echo "#".$errors ['image'];}?></span>
  </div>
 
  <input type="submit" class="btn btn-primary" value="submit">
</form>

</div>




</body>
</html>