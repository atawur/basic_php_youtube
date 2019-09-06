<?php
 /*
 for($i=0;$i<=100;$i++){

    echo $i."<br>";

 }


 for($j=100;$j>=0;$j--){

    echo $j."<br>";

 }
 
 $number=12;

 for($n=0;$n<=10;$n++){
  echo "$number"."x".$n."=".$number*$n."<br>";

 }
 
$count=0;
 for($i=2;$i<=1000;$i++){
    $count = $count+1;
    if($i%2==0){
        echo $i."<br>";
    }
 }
echo "total=".$count;
*/

$count=0;
 for($i=2;$i<=1000;$i=$i+2){
    $count = $count+1;
        echo $i."<br>";
   
 }
echo "total=".$count;
?>