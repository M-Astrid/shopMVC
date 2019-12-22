<?php
/**
 * Created by PhpStorm.
 * User: astrid
 * Date: 20.11.2019
 * Time: 19:50
 */
class Controller_Admin_Categories extends Components\User
{
    public function action_create()
    {
        // проверяем права доступа
        self::check_admin();
        $errors = array();

        if (isset($_POST['submit']))
        {
            $data = array();

            // валидация
            if ($_POST['name'] == '') $errors[] = "Укажите имя категории";

            if (empty($errors))
            {
                $data['name'] = $_POST['name'];

                $category = \Model::create_object('category', $data);

                // перенаправляем на созданный объект
                $referer = "/admin/categories/";
                header("Location: $referer");
            }
        }
        $categories = \Models\Model_Catalog::get_categories_list();
        $this->view->generate('admin/category_create_view.php','admin/template_view.php', array(
            "errors" => $errors,
        ));
    }

    public function action_list()
    {
        // проверяем права доступа
        self::check_admin();

        // получаем список товаров
        $categories = \Model::get_all_objects('category');

        $this->view->generate('admin/categories_view.php', 'admin/template_view.php', array(
            'categories' => $categories,
        ));
    }

    public function action_update($id)
    {
        // проверяем права доступа
        self::check_admin();

        $category = \Model::get_object_array_by_id('category', $id);

        if (isset($_POST['submit']))
        {
            $data = array();
            $errors = array();

            // валидация данных
            if ($_POST['name'] == '') $errors[] = 'Укажите название категории';

            // если ошибок нет, получаем данные из указанных полей формы и заполныем ими массив
            if (empty($errors))
            {
                $fields = ['name', 'status', 'sort_order'];
                foreach ($fields as $field)
                {
                    if ($category['$field'] != $_POST[$field])
                    {
                        $data[$field] = $_POST[$field];
                    }
                }

                \Model::update_object('category', $id, $data);
                header("Location: /admin/categories/");
            }
        }
        $this->view->generate('admin/category_update_view.php','admin/template_view.php', array(
            'category' => $category,
            'errors' => $errors,
        ));
    }

    public function action_delete($id)
    {
        // проверяем права доступа
        self::check_admin();

        if (isset($_POST['submit']))
        {
            \Model::delete_object('category', $id);
            header("Location: /admin/categories/");
        }
        $this->view->generate('admin/category_delete_view.php','admin/template_view.php', array(
            "id" => $id,
        ));
    }
}
