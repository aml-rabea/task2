
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
             }else{
                 echo 'Error Try Again';
             }
            }else{
                echo "file is big";
            }
            }else{
                echo 'Extension Not Allowed';
            }
     
     
        }else{
            echo 'Image Field Required'.'<br>'.'<br>'  ;
        }

    $errors = [];

#Validate name
    if(empty( $name )){
        $errors['NAME'] = "Name is required";
    }
    elseif(!preg_match("/^[a-zA-Z-' ]*$/",$name)){

        $errors['NAME'] = "Invalid name only string";
    }

#Validate email
 if(empty($email)){
      $errors['EMAIL'] = "email is required";

  }elseif(!filter_var($email,FILTER_VALIDATE_EMAIL)){
      $errors['EMAIL'] = "Invalid Email";
  }

  #Validate password
if(empty($password)){
      $errors['Password'] = "password is required";
  }elseif(strlen($password) < 6){
    $errors['Password'] = "Length must be >= 6 chars";

  }
  #Validate address
  if(empty($address)){
    $errors['ADDRESS'] = "address is required";

}elseif(strlen($address) < 10){
  $errors['ADDRESS'] = "Length must be >= 10 chars";
}
#Validate url

if(empty($url)){
    $errors['URL'] = "url is required";

}elseif(!filter_var($url,FILTER_VALIDATE_URL)){
  $errors['URL'] = " Invalid url ";

}
#Validate gender 
if(empty($gender)){
    $errors['GENDER'] = "gender is required";
}



if(count($errors) > 0){
    foreach ( $errors as $key => $value) {
        
         echo '/// '.' //'.$value.'<hr>';

    }
}

    else{
           $_SESSION['name']= $name      ;
           $_SESSION['password'] =$password;
          $_SESSION['email']  = $email  ;
          $_SESSION['address'] = $address  ;
          $_SESSION['url'] =  $url        ;
         $_SESSION['gender']  =  $gender   ;
          $_SESSION['image'] = $imgName  ;
    }

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
    <span></span>
  </div>


  <div class="form-group">
    <label for="exampleInputEmail">Email address</label>
    <input type="email"   class="form-control" id="exampleInputEmail1" name="email" aria-describedby="emailHelp" placeholder="Enter email">
    <span></span>
  </div>

  <div class="form-group">
    <label for="exampleInputPassword">New Password</label>
    <input type="password"   class="form-control" id="exampleInputPassword1" name="password" placeholder="Password">
    <span></span>
  </div>
  <div class="form-group">
    <label for="exampleInputaddress">New address</label>
    <input type="text"   class="form-control" id="exampleInputadress1" name="address" placeholder="address">
    <span></span>
  </div>
   <div class="form-group">
    <label for="exampleInputurl">New url</label>
    <input type="text"   class="form-control" id="exampleInputurl1" name="url" placeholder="url">
    <span></span>
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
</div>
<div class="form-group">
    <label for="exampleInputPassword">Image</label>
    <input type="file"  name="image">
  </div>
 
  <input type="submit" class="btn btn-primary" value="submit">
</form>

</div>




</body>
</html>