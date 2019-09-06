<?php
/*
  for($i=1;$i<=10;$i++){
      if($i==5){
          break;
      }
      echo $i."</br>";
  }

  for($i=0,$j=100;$i<100;$i++,$j--){
      echo $j."---------".$i."<br>";
  }
  */

  for($i=1;$i<=50;$i++){
    echo $i;
      for($j=1;$j<=$i;$j++){
       echo   "*";
      }
      echo"<br>";
  }
?>