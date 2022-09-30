<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AssignmentController extends Controller
{
    // function to sort string alphabet and numerical values prioritizing alphabets and alphabets with lower case
    function sortString($str=""){
        // get lower case letters
        preg_match_all('/[a-z]/',$str , $lowers);
        // get all letters
        preg_match_all('/[A-Za-z]/', $str , $letters);
        // get numbers
        preg_match_all('/[\d]/', $str , $numbers);
        // convert array to string
        $letters=implode($letters[0]);
        //string to uppercase
        $letters=strtoupper($letters);
        // get string back to array
        $letters=str_split($letters);
        // sort string alphabatically
        sort($letters);
        // get lowers 
        $lowers=$lowers[0];
        // sort lowers
        sort($lowers);
        // loop in lowers to find match in letters
        foreach($lowers as $lower){
            foreach($letters as $key => $letter){
                // if match found change upper case letter in string to lower
                if($letter===strtoupper($lower)){
                    $letters[$key]=strtolower($letter);
                    break;
                }
            }
        }
        // get numbers
        $numbers=$numbers[0];
        // sort numbers
        sort($numbers);
        // convert arrays to strings
        $letters=implode($letters);
        $numbers=implode($numbers);
        // concat into result
        $result=$letters.$numbers;
        // return result
        return $result;
        }
        
        // function to separate number 
        function separateNumber($num=0){
            // check if input is integer
            if(is_numeric($num))
                return "must be integer";
            // divisor
            $m=10;
            // result array
            $result=[];
            // get modulo till number reaches limit
            while($num!=$num%$m){
                $n=$num%$m;
                $result[]=$n;
                $num-=$n;
                $m*=10;
            }
            $result[]=$num;
            // reverse array
            $result=array_reverse($result);
            return $result;
        }
}
