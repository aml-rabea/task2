<?php
  
  // Include database file
  session_start();
require './classes/dbcoon.php';


  $blogObj = new blog();
  // Delete record from table
  if(isset($_GET['deleteId']) && !empty($_GET['deleteId'])) {
      $deleteId = $_GET['deleteId'];
      $blogObj->deleteRecord($deleteId);
  }
     
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>blog</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"/>
</head>
<body>
<div class="card text-center" style="padding:15px;">
  <h4>blog</h4>
</div><br><br> 
<div class="container">
  <?php
  
  
    
  ?>
  <h2>View Records
    <a href="add.php" style="float:right;"><button class="btn btn-success"><i class="fas fa-plus"></i></button></a>
  </h2>
  <table class="table table-hover">
    <thead>
      <tr>
        <th>Id</th>
        <th>title</th>
        <th>content</th>
        <th>image</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
        <?php 
          $blog = $blogObj->displayData(); 
          foreach ($blogs as $blog) {
        ?>
        <tr>
          <td><?php echo $blog['id'] ?></td>
          <td><?php echo $blog['title'] ?></td>
          <td><?php echo $blog['content'] ?></td>
          <td><?php echo $blog['image'] ?></td>
          <td>
            <button class="btn btn-primary mr-2"><a href="edit.php?editId=<?php echo $blog['id'] ?>">
              <i class="fa fa-pencil text-white" aria-hidden="true"></i></a></button>
            <button class="btn btn-danger"><a href="index.php?deleteId=<?php echo $blog['id'] ?>" >
              <i class="fa fa-trash text-white" aria-hidden="true"></i>
            </a></button>
          </td>
        </tr>
      <?php } ?>
    </tbody>
  </table>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>