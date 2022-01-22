<?php
  
  // Include database file
 require './classes/dbcoon.php';
  $blogObj = new blog();
  // Edit blog record
  if(isset($_GET['editId']) && !empty($_GET['editId'])) {
    $editId = $_GET['editId'];
    $blog = $blogObj->displyaRecordById($editId);
  }
  // Update Record in blog table
  if(isset($_POST['update'])) {
    $blogObj->updateRecord($_POST);
  }  
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>update blog</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"/>
</head>
<body>
<div class="card text-center" style="padding:15px;">
  <h4>update blog</h4>
</div><br> 
<div class="container">
    <div class="row">
        <div class="col-md-5 mx-auto">
            <div class="card">
                <div class="card-header bg-primary">
                    <h4 class="text-white">Update Records</h4>
                </div>
                <div class="card-body bg-light">
                  <form action="edit.php" method="POST">
                    <div class="form-group">
                      <label for="name">title:</label>
                      <input type="text" class="form-control" name="uname" value="<?php echo $blog['tile']; ?>" required="">
                    </div>
                    <div class="form-group">
                      <label for="email">Email</label>
                      <input type="email" class="form-control" name="uemail" value="<?php echo $blog['content']; ?>" required="">
                    </div>
                     <div class="form-group">
                        <label for="exampleInputName">Image</label>
                        <input type="file" name="image">
                    </div>

                    <img src="./uploads/<?php echo $blog['image']; ?>" alt="" height="50px" width="50px"> <br>
                    <div class="form-group">
                      <input type="hidden" name="id" value="<?php echo $blog['id']; ?>">
                      <input type="submit" name="update" class="btn btn-primary" style="float:right;" value="Update">
                    </div>
                  </form>
                </div>
                </div>
            </div>
        </div>
    </div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>