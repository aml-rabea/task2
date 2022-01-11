
<?php 
require 'coon.php';



if($_SERVER['REQUEST_METHOD'] == "POST"){    
require 'repeatcode.php';



$sql = "insert into blog (title,content,date) values ('$title','$content','$date')";

$op = mysqli_query($con, $sql);

if ($op) {
    $Message = 'Raw Inserted';
} else {
    $Message = 'Error try Again : ' . mysqli_error($con);
}

$_SESSION['Message'] = $Message;

header('Location: index.php');


}

?>



<!DOCTYPE html>
<html>

<head>
  <title>task6</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>



<div class="container">

  <h2>task5</h2>

  <form  method="post"  action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>"  >

  
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
    <label for="exampleInputPassword">date</label>
    <input type="date"  name="date">
    <span style="color: pink "><?php if(isset($errors) ) {echo $errors ['date'];}?></span>
  </div>
  <input type="submit" class="btn btn-primary" value="submit">
</form>


</div>
</body>
</html>