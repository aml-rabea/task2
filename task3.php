

<?php 

if($_SERVER['REQUEST_METHOD'] == "GET"){

    $name     = $_GET['name']; 
    $email    = $_GET['email'];
    $password = $_GET['password'];
    $address  = $_GET['address']; 
     $url     = $_GET['url'];
    

     

    

      # Validate Name 
   if(empty($name)){
    $nameErr = "Name is required";
   }
    elseif(is_numeric($name)){

        $nameErr = "Only string";
        

    }
    

      
      
        //  if (!preg_match("/^[a-zA-Z-' ]*$/",$name)) {
        //   $nameErr = "Only string";
        //  }




# Validate Password 
  if(empty($password)){
    $errorpass= "password is required";
  }
  elseif(strlen($password) < 6){
     $errorpass= "Length must be >= 6 chars";
  }

  # Validate address
  if(empty($address)){
    $erroradd = "address is required";
}
elseif(strlen($address) < 10){
    $erroradd = "Length must be >= 10 chars";
}

# Validate email
if (empty( $email )) {
    $emailErr = "Email is required";
}

// elseif (strops ($email,$mark) == false)) {
//     $emailErr = "Invalid email format";
// }

    




//    else {
    
//     if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
//       $emailErr = "Invalid email format";
//     }
//   }
# Validate url
  if (empty($url)) {
    $websiteErr = "required";
  }
//    else {
    

//     if (!preg_match("/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i",$websiteErr)) {
//       $websiteErr = "Invalid URL";
//     }
//   }

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
  <h2>FORM</h2>
 
 
 
  <form   action="<?php  echo  $_SERVER['PHP_SELF'];?>"  method="GET">
 
  
  <div class="form-group">
    <label for="exampleInputName">Name</label>
    <input type="text" class="form-control" id="exampleInputName"  name="name" aria-describedby="" placeholder="Enter Name">
    <span><?php if(isset( $nameErr))  echo  $nameErr ;
 ?></span>
  </div>


  <div class="form-group">
    <label for="exampleInputEmail">Email address</label>
    <input type="email"   class="form-control" id="exampleInputEmail1" name="email" aria-describedby="emailHelp" placeholder="Enter email">
    <span><?php if(isset( $emailErr))  echo  $emailErr  ?></span>
  </div>

  <div class="form-group">
    <label for="exampleInputPassword">New Password</label>
    <input type="password"   class="form-control" id="exampleInputPassword1" name="password" placeholder="Password">
    <span><?php if(isset($errorpass)) echo $errorpass?></span>
  </div>
  <div class="form-group">
    <label for="exampleInputaddress">New address</label>
    <input type="text"   class="form-control" id="exampleInputadress1" name="address" placeholder="address">
    <span><?php if(isset($erroradd)) echo $erroradd  ?></span>
  </div>
   <div class="form-group">
    <label for="exampleInputurl">New url</label>
    <input type="url"   class="form-control" id="exampleInputurl1" name="url" placeholder="url">
    <span><?php if(isset($websiteErr)) echo $websiteErr  ?></span>
  </div> 
 
  
  <button type="submit" class="btn btn-primary">Submit</button>
</form>

</div>







</body>
</html>