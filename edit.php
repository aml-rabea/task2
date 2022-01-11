<?php

require 'coon.php';

$id = $_GET['id'];

# Check if Id ex ...
$sql = "select * from blog where id = $id ";
$data = mysqli_query($con, $sql);

if (mysqli_num_rows($data) == 1) {
    # fetch data
    $Userdata = mysqli_fetch_assoc($data);
} else {
    $Message = 'Invalid Id ';
    $_SESSION['Message'] = $Message;
    header('Location: index.php');
}
if($_SERVER['REQUEST_METHOD'] == "POST"){  
require 'repeatcode.php';



 


    $sql = "update blog set title='$title' , content = '$content' ,  imgName  = ' $imgName ' where id  = $id"; 

    $op  = mysqli_query($con,$sql);

    if($op){
        $Message = "Raw Updated";
    }else{
        $Message = "Error Try Again ".mysqli_error($con) ;
    }

    $_SESSION['Message'] = $Message;
    header("Location: index.php");



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

  <h2>task6</h2>

  <form  method="post"  action="edit.php?id=<?php echo $Userdata['id']; ?>" enctype="multipart/form-data" >

  
  <div class="form-group">
    <label for="exampleInputName">Title</label>
    <input type="text" class="form-control" id="exampleInputName" value="<?php echo $Userdata['title']; ?>"  name="title" aria-describedby="" placeholder="Enter content">
    <span style="color: pink "><?php if(isset($errors) ) {echo $errors ['title'];}?></span>
  </div> 

  <div class="mb-3">
  <label for="exampleFormControlTextarea1" class="form-label">Content</label>
  <textarea class="form-control" id="exampleFormControlTextarea1" value="<?php echo $Userdata['content']; ?>" rows="3" name="content"></textarea>
    <span style="color: pink "><?php if(isset($errors) ) {echo $errors ['content'];}?></span>
  </div>

  <div class="form-group">
    <label for="exampleInputPassword">Image</label>
    <input type="file"  name="image"  value="<?php echo $Userdata[' $imgName ']; ?>">
    <span style="color: pink "><?php if(isset($errors) ) {echo $errors ['image'];}?></span>
  </div>
  <input type="submit" class="btn btn-primary" value="submit">
</form>
 


</div>
</body>
</html>