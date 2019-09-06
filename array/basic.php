<?php

//$name = "atik";
$name = array('muzahid',"alif","nusaim","nazmul","atik");
echo "<pre>";
print_r($name);
echo "</pre>";
echo $name[0]."<br>";
echo $name[1]."<br>";
echo $name[2]."<br>";
echo $name[3]."<br>";
echo $name[4]."<br>";

$total= count($name);
echo "<br>Ussing for loop:".$total."<br>";
    for($i=0;$i<$total;$i++){

        echo $name[$i]."<br>";
    }

?>

