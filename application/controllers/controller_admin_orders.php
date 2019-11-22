<?php
/**
 * Created by PhpStorm.
 * User: astrid
 * Date: 22.11.2019
 * Time: 14:36
 */
class Controller_Admin_Orders extends \Components\Admin
{
    public function action_list()
    {
        // проверяем права доступа
        self::check_admin();

        $orders = \Model::get_all_objects('orders');
        $this->view->generate('admin/orders_view.php','admin/template_view.php', array(
            "orders" => $orders,
        ));
    }

    public function action_detail($id)
    {
        // проверяем права доступа
        self::check_admin();

        $order = \Model::get_object_array_by_id('orders', $id);
        $order_products = json_decode($order['products'], true);
        $ids = array_keys($order_products);
        $products = Models\Model_Catalog::get_products_by_ids($ids);
        $this->view->generate('admin/order_detail_view.php','admin/template_view.php', array(
            "products" => $products,
            "order_products" => $order_products,
            "order" => $order,
        ));
    }

    public function action_update($id)
    {
        // проверяем права доступа
        self::check_admin();

        if (isset($_POST['submit']))
        {
            $data = array();

            // определяем необходимые поля
            $fields = ['name', 'tel', 'comment', 'products'];

            foreach ($fields as $field)
            {
                $data[$field] = $_POST[$field];
            }
            \Model::update_object('orders', $id, $data);
            header("Location: /admin/orders/$id");
        }
        $order = \Model::get_object_array_by_id('orders', $id);
        $this->view->generate('admin/order_update_view.php','admin/template_view.php', array(
            "order" => $order,
        ));
    }

    public function action_delete($id)
    {
        // проверяем права доступа
        self::check_admin();

        if (isset($_POST['submit']))
        {
            \Model::delete_object('orders', $id);
            header("Location: /admin/orders/");
        }
        $this->view->generate('admin/order_delete_view.php','admin/template_view.php', array(
            "id" => $id,
        ));
    }
}