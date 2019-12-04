<?php
/**
 * Created by PhpStorm.
 * User: astrid
 * Date: 20.11.2019
 * Time: 14:14
 */
namespace Components;

abstract class User extends \Controller
{
// если не авторизован, перенаправляет на страницу авторизации
    public static function check_logged()
    {
        if (!isset($_SESSION['logged_user']))
        {
            header("Location: /login/");
        }
        else return $_SESSION['logged_user'];
    }

// проверяет админ права, если нет, то ограничивает доступ
    public static function check_admin()
    {
        $id = User::check_logged();
        $user = \Model::get_object_array_by_id('user', $id);
        if ( $user['role'] == 'admin' )
        {
            return true;
        }
        else die('Нет прав доступа');
    }

// админ права true or false
    public static function is_admin()
    {
        if (isset($_SESSION['logged_user']))
        {
            $id = $_SESSION['logged_user'];
            $user = \Model::get_object_array_by_id('user', $id);
            if ( $user['role'] == 'admin' )
            {
                return true;
            }
        }
        return false;
    }
}