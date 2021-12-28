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
    if ($index != null) {
        echo("Target found at index: " . $index);
    } else {
        echo("Target not found in list");
    }
    
    $numbers = [1,2,3,4,5,6,7,8,9,10];
    
    $result = linearSearch($numbers, 12);
    verify($result);
}
?>