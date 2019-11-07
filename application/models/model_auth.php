<?php

class Model_Auth extends Model 
{
    public function create_user($username, $email, $password)
    {
        $user = R::dispense('user');
        $user->username = $username;
        $user->email = $email;
        $user->password = password_hash($password, PASSWORD_DEFAULT);
        $user->join_date = time();
        R::store($user);
        return true;
        //echo '<script src="/js/redirect.js" type="text/javascript"></script>';
    }

    public function check_email_exists($email)
    {
        if ( R::count('user', 'email = ?', array($email)) > 0 )
        {
            return true;
        } else return false;
    }

    public function check_user_exists($username)
    {
        if ( R::count('user', 'username = ?', array($username)) > 0 )
        {
            return true;
        } else return false;
    }
}