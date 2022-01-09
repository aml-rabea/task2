<?php
 $action = null;

 $action = $_POST['action'];



 if($action == "delete")
 {
     $deleteId = $_POST['deleteId'];         
     $readData = file("text.txt", FILE_IGNORE_NEW_LINES);            
     $arrOut = array();

     foreach ($readData as $key => $val)
     {
          if ($key != $deleteId) $arrOut[] = $val;
     }           

     $strArr = implode("\n",$arrOut);
     $fp = fopen('text.txt', 'w');
     if (count($readData) < 0)
     {
      fwrite($fp, $strArr."\r\n");
     }
     else
     fwrite($fp, $strArr);   
     fclose($fp);
 }

$file = fopen('text.txt' ,'r');
while(!feof($file)){
    ?>


 <section style="background-color: pink;">
<?php echo fgets($file) . "<br>"."<br>" ;?>
<form action="" method="post" name="deleteForm" id="deleteForm">
<input type="submit" id="delete" name="delete" value="Delete" onclick="return confirm('Do you want to delete this line?');"/>
 <input type="hidden" id="deleteId" name="deleteId" value="<?php echo $key; ?>"/>
 <input type="hidden" name="action" id="action" value="delete"/>
</form>
</section>

<?php 
}

fclose($file);
?>
