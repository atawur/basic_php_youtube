<?php


//$age = array("atik"=>"32","nusaim"=>"3","muzahid"=>"28");//key
$age = array();
$age['atik']=32;
$age['nusaim']=3;
$age['muzahid']=28;
echo "<pre>";
print_r($age);
echo "</pre>";
echo $age['atik']."<br>";
echo $age['nusaim']."<br>";
echo $age['muzahid']."<br>";


foreach($age as $key=>$value){

    echo $key ." is $value years old <br>";


}





?>