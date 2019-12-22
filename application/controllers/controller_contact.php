<?php
/**
 * Created by PhpStorm.
 * User: astrid
 * Date: 08.11.2019
 * Time: 19:15
 */

Class Controller_Contact extends Controller
{
    public function action_index()
    {
        ob_start();
        if ($_SERVER['REQUEST_METHOD'] == "POST")
        {
            $admin_email = "jean-jen@yandex.ru";

            $name = $_POST['name'];
            $email = $_POST['email'];
            $subject = $_POST['subject'];
            $message = "Пользователь $name оставил сообщение:\n".$_POST['message']."\nОбратный e-mail: ".$email;
            $result = mail($admin_email, $subject, $message);
            header("Location:/success/contact/");
        }else
        {
            if (isset($_SESSION['logged_user']))
            {
                $user = Model::get_object_array_by_id('user', $_SESSION['logged_user']);
                $name = $user['username'];
                $email = $user['email'];
            } else
            {
                $name = '';
                $email = '';
            }
        }
        $this->view->generate('contact_view.php', 'template_view.php', array(
            'name' => $name,
            'email' => $email,
        ));
    }
}