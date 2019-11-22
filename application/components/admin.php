<?php
/**
 * Created by PhpStorm.
 * User: astrid
 * Date: 20.11.2019
 * Time: 13:43
 */
namespace Components;
use \Model;

abstract class Admin extends \Controller
{
    public static function check_admin()
    {
        $id = User::check_logged();
        $user = Model::get_object_array_by_id('user', $id);
        if ( $user['role'] == 'admin' )
        {
            return true;
        }
        else die('Нет прав доступа');
    }
}