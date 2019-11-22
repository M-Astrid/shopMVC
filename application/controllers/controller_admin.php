<?php
/**
 * Created by PhpStorm.
 * User: astrid
 * Date: 20.11.2019
 * Time: 14:04
 */
class Controller_Admin extends Components\Admin
{
    public function action_index()
    {
        // проверяем права доступа
        self::check_admin();

        $this->view->generate('admin\main_view.php', 'admin\template_view.php', array());
    }
}