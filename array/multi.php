<?php
$persons = array(
    "person1"=>array(array("name"=>"atik","age"=>32,"hobby"=>"making tutorial","gender"=>"male")),
    "person2"=>array(array("name"=>"kabir","age"=>33,"hobby"=>"footbal","gender"=>"male")),
    "person3"=>array(array("name"=>"zack","age"=>32,"hobby"=>"Cricke","gender"=>"male")),

);

//echo $persons['person3'][0]['hobby'];
///echo "<pre>";
//print_r($persons);


foreach($persons as $key=>$value){
    $output= "";

     foreach($value as $ke=>$val){
         foreach($val as $k=>$v){

            $output = $output. $k ." :".$v." ";
         }
     }

     echo $output."<br>";
}

?>