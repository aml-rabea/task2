<html>

<head>

<title>


TASK2 

</title>
<style> 

span{
        font-size: 50px;
        color: red;
        text-align: center;
        font-weight: bolder;
}


</style>


</head>





<?php

function nextch($char){
        $nextchar = ++$char; 
        if ($nextchar == 1) 
{
 $nextchar = $nextchar[0];

 }


 echo "<span>$nextchar</span> ";

}

nextch('m');


// $char = 'd';
// $nextchar = ++$char; 
// var_dump(strlen($nextchar));
// echo $nextchar[0];


 //strlen($char);
?>
</html>