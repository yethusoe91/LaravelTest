<?php

class ArrayTransformer
{
    function transformedArray(array $inputArray){
        $zero_keys = array_keys($inputArray, 0);
        $non_zero_values = array_values(array_diff_key($inputArray, array_flip($zero_keys)));

        $begin_count = round(count($zero_keys) / 2);
        $end_count = count($zero_keys) - $begin_count;

        $beginning= [];
        for($i = 0; $i < $begin_count; $i++){
            $beginning[$i] = 0;
        }

        $ending= [];
        for($i = 0; $i < $end_count; $i++){
            $ending[$i] = 0;
        }

        return array_merge($beginning, $non_zero_values,$ending);
    }

    public function printResult($array){
        echo('Original : '.implode(',', $array).'<br/>');
        $result = $this->transformedArray($array);
        echo('Result : ' .implode(',', $result).'<br/><br/>');
    }
}

$example1 = [3,5,6,0,7,0,1];
$example2 = [5,0,0,6,0,8];
$example3 = [1,2,3,0,0,0,0];
$example4 = [1,2,3];

$result = (new ArrayTransformer)->printResult($example1);
$result = (new ArrayTransformer)->printResult($example2);
$result = (new ArrayTransformer)->printResult($example3);
$result = (new ArrayTransformer)->printResult($example4);
