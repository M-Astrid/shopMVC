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
        $this->view->generate('contact_view.php', 'template_view.php');
    }
}