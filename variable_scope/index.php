<?php 
$number = 10;// global scope
$number_second =20;

function test1(){
    global $number,$number_second ;
    $x=30;

    echo $x+$number;
}
//test1();


function test2(){
    
    $z=30;

    $GLOBALS['z']=$z;
 //echo "<pre>";
 //print_r($GLOBALS);
    //echo $z+$GLOBALS['number'];
}
test2();

echo $GLOBALS['z'];

echo "<br> Static scope";

 function getNumber(){
      static $v = 10;
      echo $v."<br>";
      $v++;
 }

 getNumber();
 getNumber();
 getNumber();
 getNumber()
?>