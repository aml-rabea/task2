

<?php 
require './classes/dbcoon.php';

public function deleteRecord($id)
        {
            $query = "DELETE FROM blog WHERE id = '$id'";
            $sql = $this->con->query($query);
        if ($sql==true) {
            header("Location:index.php");
        }else{
            echo "Record does not delete try again";
            }
        }
    }
?>