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
        if ($_SERVER['REQUEST_METHOD'] == "POST")
        {
            $admin_email = "jean-jen@yandex.ru";

            $name = $_POST['name'];
            $email = $_POST['email'];
            $subject = $_POST['subject'];
            $message = "Текст: ".$_POST['message']." \nОт кого: ".$name." \nОбратный e-mail: ".$email;
            $result = mail($admin_email, $subject, $message);
        }
        $this->view->generate('contact_view.php', 'template_view.php');
    }
}