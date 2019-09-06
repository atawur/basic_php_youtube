<?php
/*
$i=11;
while($i<=10){
    //echo ++$i."<br>";// $i=$i+1,echo $i
    echo $i++."<br>";// echo $i,$i=$i+1,

    //echo $i."<br>";
}

echo "Do while loop start here"."<br>";


$j=11;
do{
 echo $j++."<br>";
}while($j<=10)

*/
$i=0;

while($i<=10){
   
     $i++."<br>";

    if($i==5){
        goto end;
    }
}

end :
echo "Loop ends<br>use of goto";
$n=0;
a: echo $n."<br>";
$n++;

if($n<=10){
    goto a;
}



?>