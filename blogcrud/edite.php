<?php


require './classes/dbcoon.php';

 public function updateRecord($postData)
        {
            $title = $this->con->real_escape_string($_POST['title']);
            $content = $this->con->real_escape_string($_POST['content']);
            $image = $this->con->real_escape_string($_POST['image']);
            $id = $this->con->real_escape_string($_POST['id']);
        if (!empty($id) && !empty($postData)) {
            $query = "UPDATE blog SET title = '$title', content = '$content', image = '$image' WHERE id = '$id'";
            $sql = $this->con->query($query);
            if ($sql==true) {
                header("Location:index.php");
            }else{
                echo "Registration updated failed try again!";
            }
            }
            
        ?>