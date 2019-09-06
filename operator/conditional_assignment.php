<?php 
$number = null;

if($number==10){
    //echo "10";
}else{
    //echo "Number is not equal 10";
}
//$result = $number==10 ? 'Ten':"Number is not equal 10";
// echo $result;


$result = $number ?? "No value";


echo $result;
?>