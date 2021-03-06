<?php
/**
 * Created by PhpStorm.
 * User: astrid
 * Date: 20.11.2019
 * Time: 19:50
 */
class Controller_Admin_Products extends Components\User
{
    public function action_create()
    {
        // проверяем права доступа
        self::check_admin();

        $errors = array();

        if (isset($_POST['submit']))
        {
            $data = array();

            // определяем необходимые поля
            $fields = ['name', 'category_id', 'code', 'price', 'availability', 'brand', 'description', 'is_new', 'is_recommended',  'display'];

            // валидация данных
            if ($_POST['name'] == '') $errors[] = 'Укажите название товара';
            if ($_POST['code'] == '') $errors[] = 'Укажите артикул';
            if ($_POST['price'] == '') $errors[] = 'Укажите цену товара';

            // если ошибок нет, получаем данные из указанных полей формы и заполныем ими массив
            if (empty($errors))
            {
                foreach ($fields as $field)
                {
                    $data[$field] = $_POST[$field];
                }

                $id = \Model::create_object('product', $data);

                if ($id)
                {
                    if (is_uploaded_file($_FILES['img']['tmp_name']))
                    {
                        move_uploaded_file($_FILES['img']['tmp_name'], $_SERVER['DOCUMENT_ROOT']."/upload/img/catalog/$id.jpg");
                    }
                }

                // перенаправляем на список товаров
                $referer = "/admin/products/";
                header("Location: $referer");
            }
        }
        $categories = \Models\Model_Catalog::get_categories_list();
        $this->view->generate('admin/product_create_view.php','admin/template_view.php', array(
            "categories" => $categories,
            "errors" => $errors,
        ));
    }

    public function action_list()
    {
        // проверяем права доступа
        self::check_admin();

        // получаем список товаров
        $products = \Models\Model_Catalog::get_admin_products();

        $this->view->generate('admin/products_view.php', 'admin/template_view.php', array(
            'products' => $products,
        ));
    }

    public function action_update($id)
    {
        // проверяем права доступа
        self::check_admin();

        $product = \Model::get_object_array_by_id('product', $id);

        if (isset($_POST['submit']))
        {
            $data = array();
            $errors = array();

            // определяем необходимые поля
            $fields = ['name', 'category_id', 'code', 'price', 'availability', 'brand', /*'img',*/ 'description', 'is_new', 'is_recommended', 'display'];

            // валидация данных
            if ($_POST['name'] == '') $errors[] = 'Укажите название товара';
            if ($_POST['code'] == '') $errors[] = 'Укажите артикул';
            if ($_POST['price'] == '') $errors[] = 'Укажите цену товара';

            // если ошибок нет, получаем данные из указанных полей формы и заполныем ими массив
            if (empty($errors))
            {
                foreach ($fields as $field) {
                    if ($product[$field] != $_POST[$field])
                    {
                        $data[$field] = $_POST[$field];
                    }
                }
                // если заружено изображение,
                if (is_uploaded_file($_FILES['img']['tmp_name']))
                {
                    // проверяем, что загруженный файл - это картинка
                    $types = array('image/gif', 'image/png', 'image/jpeg');
                    $size = 1024000;
                    if (!in_array($_FILES['picture']['type'], $types)) $errors[] = 'Неверный тип файла. Поддерживаемые форматы: jpg, gif, png)';
                    if ($_FILES['picture']['size'] > $size) $errors[] = 'Слишком большой размер изображения.';

                    if (empty($errors))
                    {
                        // получаем имя загруженного файла
                        $name = $_FILES['img']['name'];

                        // если изображение с таким именем уже есть на сервере, добавляем префикс
                        while (file_exists($_SERVER['DOCUMENT_ROOT']."/upload/img/catalog/$name"))
                        {
                            $ext = pathinfo($name, PATHINFO_EXTENSION);
                            $name = basename($name, ".$ext") . '_1.' . $ext;
                        }

                        // сохраняем файл на сервер
                        move_uploaded_file($_FILES['img']['tmp_name'], $_SERVER['DOCUMENT_ROOT']."/upload/img/catalog/$name");

                        // добавляем имя изображения в массив дата
                        $data['img'] = $name;

                        // если у товара до этого было изображение, удаляем его с сервера
                        if (file_exists($_SERVER['DOCUMENT_ROOT']."/upload/img/catalog/".$product['img']))
                        {
                            unlink($_SERVER['DOCUMENT_ROOT']."/upload/img/catalog/".$product['img']);
                        }
                    }
                }

                // обновляем продукт данными из массива
                $product = \Model::update_object('product', $id, $data);
                header("Location: /admin/products/");
            }
        }
        $categories = \Model::get_all_objects('category');
        $this->view->generate('admin/product_update_view.php','admin/template_view.php', array(
            "product" => $product,
            'categories' => $categories,
            'errors' => $errors,
        ));
    }

    public function action_delete($id)
    {
        // проверяем права доступа
        self::check_admin();

        if (isset($_POST['submit']))
        {
            \Model::delete_object('product', $id);
            header("Location: /admin/products/");
        }
        $this->view->generate('admin/product_delete_view.php','admin/template_view.php', array(
            "id" => $id,
        ));
    }
}
