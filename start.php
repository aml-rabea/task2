<!DOCTYPE html>
     <html> 
     <head> 
  <title></title>
  
  </head>
  <body> 
 
   <table   style="width:100%" width="600px" cellspacing="0px" cellpadding="0px"   >
   
      <?php
      for($i=1;$i<=8;$i++)
	  {
          echo "<tr>";
          for($x=1;$x<=8;$x++)
		  {
          $total=$i+$x;
          if($total%2==0)
		  {
          echo "<td height=100px width=100px bgcolor=#FFFFFF></td>";
          }
		  else
		  {
          echo "<td height=100px width=100px bgcolor=#000000></td>";
          }
          }
          echo "</tr>";
    }
          ?>
  </table>
  </body>
  </html>