<?php
class Calculator{
    public function calc(){
        //Number of arguments; if less than 3, print return.
        if(func_num_args() < 3){
            return "You must enter a string and two numbers</br>";
        }
        //Position of arguments (string, int, int)
        $operation = func_get_arg(0);
        $int1 = func_get_arg(1);
        $int2 = func_get_arg(2);

        //Addition
        if($operation=="+"){
            return "The sum of the numbers are ".($int1+$int2)."</br>";
        }
        //Subtraction
        if($operation=="-"){
            return "The difference of the numbers are ".($int1-$int2)."</br>";
        }
        //Multiplication
        if($operation=="*"){
            return "The product of the numbers are ".($int1*$int2)."</br>";
        }
        //Division
        //Error if int2 = 0 [message]
        if($operation=="/"){
            if($int2 != 0)
            return "The division of the numbers are ".($int1/$int2)."</br>";
            else return "You cannot divide by 0. <br>";
        }
    }
}
?>