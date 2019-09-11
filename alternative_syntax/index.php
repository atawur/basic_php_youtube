<?php

$number = -20;
/*
if($number==0){
    echo "Number is 0";
}else if($number >0){
    echo "Number is positive";
}else{
    echo "Number is negative";
}*/

if($number==0):
    echo "Number is zero";

elseif($number >0):
    echo "Number is postive";
else :
    
    echo "Number is negative";

endif;

?>

<?php if($number==0):?>
 <?php    echo "Number is zero";?>

<?php elseif($number >0):?>
 <?php    echo "Number is postive";?>
<?php else :?>
    
 <?php    echo "Number is negative";?>

<?php endif; ?>


-----------print array using foraech----------

<?php 
 $name = array("Mr x","Mr Y","Mr Z");
   foreach($name as $key=>$value):
 echo $value."<br>";

   endforeach;


?>
------ for loop<br>

<?php
 for($i=0;$i<=10;$i++):

    echo $i."<br>";
 endfor;   





?>
-----------while loop <br>

<?php 
 $i=1;
 while($i<=20):

    echo $i."<br>";
    $i++;

 endwhile;   

?>

-----Switch case<br>

<?php
 $numebr=-20;

 switch ($numebr):

        case $numebr==0:
            echo "Number is 0";
            break;
        case $numebr>0:
            echo "Number is potive";
            break;
        default:
        echo "Number is negative";
        break;
 endswitch;     
        




?>


