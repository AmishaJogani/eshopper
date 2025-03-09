<?php
session_start();

function test_input($data)
{
    $data = trim($data);
    $data = htmlspecialchars($data);
    $data = stripslashes($data);
    return $data;
}

function getUserData()
{

    if (isset($_SESSION['userdata'])) {
        return $_SESSION['userdata'];
    } else {
        return false;
    }
}

function getMessage()
{
    if (isset($_SESSION['message'])) {
        return $_SESSION['message'];
    } else {
        return false;
    }
}

function dd($data){
 echo "<pre>"   ;
 print_r($data);
 die;
}

