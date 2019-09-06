<?php
$number = 100;
/*
switch($number){
    case 0;
        echo "number is zero";
        break;
     case $number >0:
        $remain = $number%2;

        switch($remain){
            case 0:
                echo "Number is even";
                break;
            default:
            echo "Number is Odd";
            break;
        }
        break;
        
     default:
      echo "Negative Number";
      break;*/

      switch($number){
        case 0;
            echo "number is zero";
            break;
         case $number >0:
            $remain = $number%2;
    
            if($remain ==0){
                echo "Even number";

            }else{
                echo "Odd Number";
            }
            break;
            
         default:
          echo "Negative Number";
          break;
}

$x='atik';

if('nasif'== $x){
    echo "<br>You are Nasif";
}else{
    echo "<br>Who are you?";
}

