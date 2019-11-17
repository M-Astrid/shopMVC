<?php
/**
 * Created by PhpStorm.
 * User: astrid
 * Date: 07.11.2019
 * Time: 17:28
 */

Class Controller_Profile extends Controller
{
    private function check_logged()
    {
        if (isset($_SESSION['logged_user']))
        {
            return true;
        } else header('Location:/login/');
    }

    public function action_index()
    {
        $this->check_logged();

        $this->view->generate('profile_view.php', 'template_view.php');
    }

    public function action_edit()
    {
        $this->check_logged();

        if ($_SERVER['REQUEST_METHOD'] == 'POST')
        {
            $model = $this->get_model('auth');
            $user = $model->get_object_array_by_id('user', $_SESSION['logged_user']);
            $errors = array();

            // check username
            if ( $_POST['username'] != $user['username'] )
            {
                $errors = $model->check_username(trim($_POST['username']));
                $data['username'] = $_POST['username'];
            }

            // check email
            if ( $_POST['email'] != $user['email'] )
            {
                $errors = array_merge($errors, $model->check_email(trim($_POST['email'])));
                $data['email'] = $_POST['email'];
            }

            // check password
            if ( $_POST['password'] != '' )
            {
                $errors = array_merge($errors, $model->check_password($_POST['password'], $_POST['password_2']));
                $data['password'] = password_hash($_POST['password'], PASSWORD_DEFAULT);
            }

            // no errors, update profile
            if ( !$errors )
            {
                Model::update_object('user', $_SESSION['logged_user'], $data);

            }
        }
        $user = Model::get_object_array_by_id('user', $_SESSION['logged_user']);
        $this->view->generate('profile_edit_view.php', 'template_view.php', array(
            'errors' => $errors,
            'user' => $user,
        ));
    }
}