<?php
/**
 * Created by PhpStorm.
 * User: Aaron
 * Date: 15/5/12
 * Time: 上午9:48
 * 工具类
 */

class Tools
{

    function getCommonId() {
        list($t1, $t2) = explode(' ', microtime());
        return (float)sprintf('%.0f', (floatval($t1) + floatval($t2)) * 1000);
    }

    function microtime_format($tag, $time)
    {
        $time=$time/1000;
        list($usec, $sec) = explode(".", $time);
        $date = date($tag,$usec);
        return str_replace('x', $sec, $date);
    }
}