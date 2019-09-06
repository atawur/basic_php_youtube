<?php
  /*
    $name = 'mr nngn';

    if($name=='mr x'){
        echo " you are mr x";
    } else if($name=='mr y'){
        echo " you are mr y";
    }else if($name=='mr z'){
        echo  " you are mr z";
    }else if($name=='mr n'){
        echo  " you are mr n";
    } else {
        echo "Your are none of them";
    }
  */

  $name = 'mr zb';

   switch($name){
    case 'mr x':
        echo " you are mr x";
        break;
    case 'mr y':
        echo " you are mr y";
        break;
    case 'mr z':
        echo  " you are mr z";
        break;
    case $name=='mr n':
        echo "You are mr n";
        break;
    default:
    echo "Your are none of them";
    break; 


   }
?>