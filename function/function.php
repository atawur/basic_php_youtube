<?php

$first_number = 30;
$second_number = 50;


 //echo sum($first_number,$second_number);//argument


$third_number = 400;
$fourth_number = 70;


 $resutl = sum($third_number);

 echo $resutl;

//
function sum($f_number,$s_number=100){//function parameter

    return $f_number+$s_number;

}


  echo getFullName("Mr","Atawur","Rahman")."<br>";
  echo getFullName("Mr","karim","Rahman")."<br>";
  echo getFullName("Mr","Kader","Zunayed")."<br>";
  echo getFullName("Mr","Khan","khan")."<br>";
  echo getFullName("Mr","zakir","Hosan")."<br>";

  
function getFullName($first_name,$middle_name,$last_name){
    return $first_name . " ". $middle_name . " " .$last_name;
}

?>