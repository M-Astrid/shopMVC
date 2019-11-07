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
        $model = $this->get_model('auth');

        if ($_SERVER['REQUEST_METHOD'] == 'POST')
        {
            $errors = array();

            // check username
            $errors = $model->check_username(trim($_POST['username']));

            // check email
            $errors = array_merge($errors, $model->check_email(trim($_POST['email'])));

            // check password
            $errors = array_merge($errors, $model->check_password($_POST['password'], $_POST['password_2']));
        }
        $this->view->generate('profile_edit_view.php', 'template_view.php', array(
            'errors' => $errors,
        ));
    }
}