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
    }

    public function check_email_exists($email)
    {
        $user = R::findOne('user', 'email = ?', array($email));
        if ( $user )
        {
            return $user;
        } else return false;
    }

    public function check_username($username)
    {
        $errors=array();

        if ( $username == "" )
        {
            $errors[] = "Введите своё имя";
        }
        if ( strlen($username) < 2 )
        {
            $errors[] = "Имя не может быть короче двух символов";
        }

        return $errors;
    }

    public function check_email($email)
    {
        $errors=array();

        if ( $email == "" )
        {
            $errors[] = "Введите E-mail";
        }
        if ( $this->check_email_exists($email) )
        {
            $errors[] = "Пользователь с таким E-mail уже существует";
        }

        return $errors;
    }

    public function check_password($password, $password2)
    {
        $errors=array();

        if ( $password == "" )
        {
            $errors[] = "Не указан пароль";
        }
        if ( $password != $password2 )
        {
            $errors[] = "Повторный пароль введен неверно";
        }

        return $errors;
    }
}