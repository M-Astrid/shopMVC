<?php

class Controller_Auth extends Controller
{
    
    function action_signup()
    {
        $model = $this->get_model('auth');
        $result = false;

        if ( $_SERVER['REQUEST_METHOD'] == 'POST')
        {
            $errors = array();

            // check username
            $username = trim($_POST['username']);
            if ( $username == "" )
            {
                $errors[] = "Введите своё имя";
            }
            if ( strlen($username) < 2 )
            {
                $errors[] = "Имя не может быть короче двух символов";
            }


            // check email
            $email = trim($_POST['email']);
            if ( $email == "" )
            {
                $errors[] = "Введите E-mail";
            }
            if ( $model->check_email_exists($email) )
            {
                $errors[] = "Пользователь с таким E-mail уже существует";
            }


            // check password
            if ( $_POST['password'] == "" )
            {
                $errors[] = "Не указан пароль";
            }
            if ( $_POST['password_2'] != $_POST['password'] )
            {
                $errors[] = "Повторный пароль введен неверно";
            }

            if ( empty($errors) )
            {
                $result = $model->create_user($_POST['username'], $_POST['email'], $_POST['password']);
            }
            else 
            {
                $this->view->generate('auth_view.php', 'template_view.php', array(
                    'errors' => $errors,
                ));
            }
        }
        $this->view->generate('auth_view.php', 'template_view.php', array(
            'register_successful' => $result,
        ));
    }

    function action_login()
    {        
        if(isset($_POST['email']) && isset($_POST['password']))
        {
            $errors = array();
            $data = $_POST;
        
            // проверяем заполненность полей
            if ( trim($_POST['email']) == "" )
            {
                $errors[] = "Введите E-mail";
            }

            if ( trim($_POST['password']) == "" )
            {
                $errors[] = "Введите пароль";
            }


            // no errors. try to find user
            if ( empty( $errors ) )
            {
                $user = R::findOne('user', 'email = ?', array( $data['email' ] ));
                if ( $user )
                {
                    //e-mail существует
                    if ( password_verify( $data['password'], $user->password ))
                    {
                        $_SESSION['logged_user'] = $user->id;
                        header('Location:/');
                    } else
                    {
                        $errors[] = "Неверный пароль";
                    }
                } else
                {
                    $errors[] = "Пользователя с таким E-mail не существует";
                }
            }
        }
        $this->view->generate('auth_view.php', 'template_view.php', array(
            'errors' => $errors
        )
        );
    }

    function action_logout()
    {
        unset( $_SESSION['logged_user'] );
        header('Location:/');
    }
}