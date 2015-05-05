<?php
/**
 * Created by PhpStorm.
 * User: Aaron
 * Date: 15/5/5
 * Time: 上午11:22
 */
session_start();
$session=$_SESSION["Login"];
if($session && $session=="admin")
{
    session_destroy();
    header("Location:login.html");
    exit;
}