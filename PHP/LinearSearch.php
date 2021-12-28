<?php
function linearSearch(Array $list, $key)
{
    $count = count($list);

    for ($i = 0; $i < $count; $i++) {
        if ($list[$i] == $key) {
            return $i;
        }
    }

    return -1;
}

function verify($index)
{
    $numbers = [1,2,3,4,5,6,7,8,9,10];
    
    $result = linearSearch($numbers, $index);
    
    if ($result != null) {
        echo("Target found at index: " . $result);
    } else {
        echo("Target not found in list");
    }
}
?>