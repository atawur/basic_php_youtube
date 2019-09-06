<?php

$person = array(
    "nusaim"=>array("age"=>3,"hobby"=>'football',"gender"=>"male"),
    "foysal"=>array("age"=>30,"hobby"=>'cricket',"gender"=>"male"),
    "zakir"=>array("age"=>33,"hobby"=>'football',"gender"=>"male")
);

//echo $person["nusaim"]['gender'];

//echo $person["foysal"]['age']."<br>";
//echo $person["zakir"]['age']."<br>";

//echo "<pre>";

//print_r($person["nusaim"]);

foreach($person as $key =>$value){
    $output = " name: $key ";
    foreach($value as $k=>$val){

        $output = $output ." ". $k .":".$val;

    }

    echo $output."<br>";
}


?>