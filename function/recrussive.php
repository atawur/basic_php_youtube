<?php

function print_number($num){
    echo $num."<br>";
    if($num <50){
        print_number($num+1);
    }
    
}


print_number(0);

?>