<?php
$content = fopen("sample_1.csv", "r");

$array = [];

while(!feof($content)){
    $string = fgets($content);
    $arr = [];
    $val = "";
    $flag = true;
    $str_len = strlen($string);
    for($i = 0; $i < $str_len; $i++) {
        $current_char = $string[$i];
        if ($current_char === "\"") {
            $flag = !$flag;
        }
        if ($current_char === "," && $flag) {
            array_push($arr, $val);
            $val = "";
        } else {
            $val .= $current_char;
        }

        if ($i === $str_len - 1) {
            array_push($arr, $val);
        } 
        
    }
    if (count($arr) !== 0) {
        array_push($array, $arr);
    }
}
// echo "<pre>";
// var_dump($array);
// echo "</pre>";