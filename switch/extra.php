<?php
/*
    $number = 1000;

    if($number > 100){
    echo "value is getter than 100";
    } else if($number==100){
        echo "value is equal to 100";
    }
    else{
        echo "value is less than 100";
    }

*/
 $number = 100;

 switch($number){

    case $number > 100:
        echo "value is getter than 100";
        break;

    case $number==100:
        echo "value is equal to 100";
        break;
    default:
        echo "value is less than 100";
        break;
  


 }
?>