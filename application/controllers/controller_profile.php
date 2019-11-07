<?php
/**
 * Created by PhpStorm.
 * User: astrid
 * Date: 07.11.2019
 * Time: 17:28
 */

Class Controller_Profile extends Controller
{
    public function action_index()
    {
        $this->view->generate('profile_view.php', 'template_view.php');
    }
}