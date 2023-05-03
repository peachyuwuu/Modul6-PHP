<?php

/**
 * print_r2
 *
 * @param  mixed $arr
 * @return void
 */
function print_r2($arr)
{
    echo "<pre>";
    print_r($arr);
    echo "</pre>";
}

function copyright()
{
    $year = date("Y");
    echo "&copy; $year Jonatan Saydi";
}

?>