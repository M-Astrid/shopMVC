<?php
/**
 * Created by PhpStorm.
 * User: astrid
 * Date: 20.11.2019
 * Time: 14:14
 */
namespace Components;

class User
{
    public static function check_logged()
    {
        if (!isset($_SESSION['logged_user']))
        {
            header("Location: /login/");
        }
        else return $_SESSION['logged_user'];
    }
}