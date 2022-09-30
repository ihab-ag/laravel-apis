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
            // convert input to integer
            $num= (int)$num;
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

        // covert numbers in string to binary
        function numToBinary($str=""){
            // regex to match all digits
            $pattern = "/[\d]+/";
            // match digits and get start position of match
            preg_match_all($pattern, $str, $matches, PREG_OFFSET_CAPTURE);
            // clean match array (data returns in index 0 of array)
            $matches=$matches[0];
            // get string length
            $str_len=strlen($str);
            // get negative position of each match so when we replace the number the position 
            // of other matches won't change due to change of string length
            foreach($matches as $key=>$match){
                $matches[$key][1]=$match[1]-$str_len;
            }
            // replace match with it's binary equivelant
            foreach($matches as $match){
                $str=substr_replace($str, decbin($match[0]), $match[1],strlen($match[0]));
            }
            // return result
            return $str;
        }
}
