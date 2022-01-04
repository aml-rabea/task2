<html>

<head>

<title>


TASK1 CALCULATE ELECTRICITY BILL

</title>

</head>

<?php

$units = 50;

$frist_unit = 3.50;
$next_unit = 4.00;
$third_unit = 6.50;


if($units <= 50){
    $bill = $units * $frist_unit;
    echo "ELECTRICITY BILL is =" .$bill ;
}
elseif($unit > 50 && $unit <= 150){

    $bill = $next_unit * $unit;
    echo "ELECTRICITY BILL is =" .$bill ;

}

elseif($unit > 150 ){

    $bill = $$third_unit * $unit;
    echo "ELECTRICITY BILL is =" .$bill ;
}
?>

</html>