<?php

class Controller_Auth extends Controller
{
    
    function action_signup()
    {
        $model = $this->get_model('auth');
        $errors = array();

        if ( $_SERVER['REQUEST_METHOD'] == 'POST')
        {
            // check username
            $errors = $model->check_username(trim($_POST['username']));

            // check email
            $errors = array_merge($errors, $model->check_email(trim($_POST['email'])));

            // check password
            $errors = array_merge($errors, $model->check_password($_POST['password'], $_POST['password_2']));

            // no errors, create user
            if ( empty($errors) )
            {
                $user = $model->create_user($_POST['username'], $_POST['email'], $_POST['password']);
                if ($user)
                {
                    header('Location:/success/');
                } else $errors[] = "Ошибка на сервере. Попробуйте еще раз.";
            }
        }
        $this->view->generate('signup_view.php', 'template_view.php', array(
            'errors' => $errors,
        ));
    }

    function action_login()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $errors = array();

            // проверяем заполненность полей
            if (trim($_POST['email']) == "") {
                $errors[] = "Введите E-mail";
            }

            if (trim($_POST['password']) == "") {
                $errors[] = "Введите пароль";
            }


            // no errors. try to find user
            $model = $this->get_model('auth');
            if (empty($errors)) {
                $user = $model->check_email_exists($_POST['email']);
                if ($user) {
                    //e-mail существует
                    if (password_verify($_POST['password'], $user->password)) {
                        $_SESSION['logged_user'] = $user->id;
                        header('Location:/profile/');
                    } else {
                        $errors[] = "Неверный пароль";
                    }
                } else {
                    $errors[] = "Пользователя с таким E-mail не существует";
                }
            }
            if (isset($_SESSION['products']))
            {
                //
            }
        }
        $this->view->generate('login_view.php', 'template_view.php', array(
                'errors' => $errors
            )
        );
    }

    function action_logout()
    {
        unset( $_SESSION['logged_user'] );
        unset( $_SESSION['products'] );
        header('Location:/');
    }

    function action_success()
    {
        $this->view->generate('success_view.php', 'template_view.php');
    }
}