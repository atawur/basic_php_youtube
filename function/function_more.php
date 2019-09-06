<?php
/*
echo "Number between 1 to 10<br>";
$i=0;
for ($i;$i<=10;$i++){
    echo $i."<br>";
}


echo "Number between 80 to 90<br>";
$i=11;
for ($i;$i<=90;$i++){
    echo $i."<br>";
}


echo "Number between 100 to 300<br>";
$i=100;
for ($i;$i<=300;$i++){
    echo $i."<br>";
}*/

print_number(1,10);
print_number(80,90);
print_number(100,300);
/*
function print_number(int $starting_number,int $ending_number){

    echo "Number between $starting_number to $ending_number<br>";
     for($i=$starting_number; $i<=$ending_number; $i++){
         echo "Value is =".$i. "<br>";
     }
}*/


function print_number($starting_number,$ending_number){

     if(gettype($starting_number)=='integer' && gettype($ending_number) =='integer' ){
        echo "Number between $starting_number to $ending_number<br>";
        for($i=$starting_number; $i<=$ending_number; $i++){
            echo "Value is =".$i. "<br>";
        }
     }else{

        echo "Please provide integer type data as a parameter<br>";
     }
    
}

 echo "output". sum(1,10);

function sum(int $first_numebr,int $second_number):int{
    $result = $first_numebr+ $second_number;
  //return "String";
    return $result;
}

