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

function binarySearch($list, $target, $start, $end) 
{
    if ($start > $end)
        return -1;

    $mid = ($start + $end) >> 1;

    if ($list[$mid] == $target) {
        return $mid;
    } elseif ($list[$mid] > $target) {
        return binary_search($list, $target, $start, $mid-1);
    } elseif ($list[$mid] < $target) {
        return binary_search($list, $target, $mid+1, $end);
    }
}


?>