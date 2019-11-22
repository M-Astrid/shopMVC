<?php
/**
 * Created by PhpStorm.
 * User: astrid
 * Date: 20.11.2019
 * Time: 19:50
 */
class Controller_Admin_Products extends \Components\Admin
{
    public function action_products_list()
    {
        // проверяем права доступа
        self::check_admin();

        // получаем список товаров
        $products = \Model::get_all_objects('product');

        $this->view->generate('admin\products_view.php', 'admin\template_view.php', array(
            'products' => $products,
        ));
    }

    public function action_delete($id)
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST' and isset($_POST['submit']))
        {
            \Model::delete_object('product', $id);
            header("Location: /admin/products/");
        }
        $this->view->generate('admin/products_delete_view.php','admin/template_view.php', array(
            "id" => $id,
            ));
    }
/*
 * универсальный метод
    public function action_delete($table, $id, $message = "Вы действительно хотите удалить объект #$id?") //controller
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST')
        {
            \Model::delete_object('product', $id);
            $referer = preg_replace("~delete/[\d]+~", "", $_SERVER['HTTP_REFERER']);
            header("Location: $referer");
        }

        $this->view->generate('admin/product/delete_view.php','admin/template_view.php', array(
            "message" => $message,
        ));
}
*/
    public function action_update($id)
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST')
        {
            $data = array();
            $errors = array();

            // определяем необходимые поля
            $fields = ['name', 'category_id', 'code', 'price', 'availability', 'brand', 'img', 'description', 'is_new', 'is_recommended', 'display'];

            // валидация данных
            if ($_POST['name'] == '') $errors[] = 'Укажите название товара';
            if ($_POST['code'] == '') $errors[] = 'Укажите артикул';
            if ($_POST['price'] == '') $errors[] = 'Укажите цену товара';

            // если ошибок нет, получаем данные из указанных полей формы и заполныем ими массив
            if (!isset($errors)) {
                foreach ($fields as $field) {
                    $data[$field] = $_POST[$field];
                }

                \Model::update_object('product', $id, $data);
            }
        }
        $product = \Model::get_object_array_by_id('product', $id);
        $this->view->generate('admin/product_update_view.php','admin/template_view.php', array(
            "product" => $product,
        ));
    }

    public function action_create()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST')
        {
            $data = array();
            $errors = array();

            // определяем необходимые поля
            $fields = ['name', 'category_id', 'code', 'price', 'availability', 'brand', 'img', 'description', 'is_new', 'is_recommended',  'display'];

            // валидация данных
            if ($_POST['name'] == '') $errors[] = 'Укажите название товара';
            if ($_POST['code'] == '') $errors[] = 'Укажите артикул';
            if ($_POST['price'] == '') $errors[] = 'Укажите цену товара';

            // если ошибок нет, получаем данные из указанных полей формы и заполныем ими массив
            if (!isset($errors))
            {
                foreach ($fields as $field)
                {
                    $data[$field] = $_POST[$field];
                }

                $product = \Model::create_object('product', $data);

                // перенаправляем на созданный объект
                $referer = "/admin/products/$product/";
                header("Location: $referer");
            }
        }
        $categories = \Models\Model_Catalog::get_categories_list();
        $this->view->generate('admin/products_create_view.php','admin/template_view.php', array(
            "product" => $product,
            "categories" => $categories,
            "errors" => $errors,
        ));
}
}
