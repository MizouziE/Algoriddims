<?php
function iterativeBinarySearch($list, $target) 
{
    $first = 0;
    $last = count($list)-1;

    while ($first <= $last) {
        $mid = ($first + $last) >> 1;

        if ($list[$mid] == $target) {
            return $mid;
        } elseif ($list[$mid] > $target) {
            $last = $mid - 1;
        } elseif ($list[$mid] < $target) {
            $first = $mid + 1;
        }
    }

    return -1;
}   

function verifyIterative($index)
{
    $numbers = [1,2,3,4,5,6,7,8,9,10];
    
    $result = iterativeBinarySearch($numbers, $index);
    
    if ($result != null) {
        echo("Target found at index: " . $result);
    } else {
        echo("Target not found in list");
    }
}

function binarySearch($list, $target, $start, $end) 
{
    if ($start > $end)
        return -1;

    $mid = ($start + $end) >> 1;

    if ($list[$mid] == $target) {
        return $mid;
    } elseif ($list[$mid] > $target) {
        return binarySearch($list, $target, $start, $mid-1);
    } elseif ($list[$mid] < $target) {
        return binarySearch($list, $target, $mid+1, $end);
    }
}

function verifyRecursive($index)
{
    $numbers = [1,2,3,4,5,6,7,8,9,10];
    
    $result = binarySearch($numbers, $index, 0, count($numbers) - 1);
    
    if ($result != null) {
        echo("Target found at index: " . $result);
    } else {
        echo("Target not found in list");
    }
}

?>