<?php
/**
 * Created by PhpStorm.
 * User: astrid
 * Date: 09.11.2019
 * Time: 12:11
 */
use Components\Cart;
use Models\Model_Catalog;

Class Controller_Cart extends Controller
{
    public function action_index()
    {
        // определяем модель
        $model = new Model_Catalog();

        // получаем массив товаров и их количества в корзине
        $cart = Cart::get_cart_products();

        // если в корзине есть товары, достаем их из БД и считаем общую цену
        if (!empty($cart))
        {
            $products_ids = array_keys($cart);
            $products = $model::get_products_by_ids($products_ids);

            $total_price = Cart::get_total_price($products);
        }
        // если товаров нет, в шаблон передастся пустой массив

        $this->view->generate("cart_view.php", "template_view.php", array(
            'cart' => $cart,
            'products' => $products,
            'total_price' => $total_price,
        ));
    }


    public function action_checkout ()
    {
        // определяем модели
        $model = new Model_Catalog();

        // получаем массив товаров и их количества в корзине
        $cart = Cart::get_cart_products();

        // если в корзине есть товары, достаем их из БД и считаем общую цену
        if (!empty($cart))
        {
            $products_ids = array_keys($cart);
            $products = $model::get_products_by_ids($products_ids);

            $total_price = Cart::get_total_price($products);
        } // если товаров нет, в переменной $cart будет пустой массив

        // если метод пост
        if ($_SERVER['REQUEST_METHOD'] == "POST")
        {
            // получаем данные формы
            $data = $_POST;
            $username = $data['username'];
            $tel = $data['tel'];
            $comment = $data['comment'];

            // проверяем данные формы
            if (!$this->validate_phone_number($tel))
            {
                $errors[] = 'Недопустимый формат телефонного номера';
            }
            if ($username == '')
            {
                $errors[] = 'Укажите своё имя';
            }

            // если верно, добавляем заказ в БД и отправляем емэйл менеджеру
            if (empty($errors))
            {
                $model = new \Models\Model_Order;
                $order_id = $model->create_order($username, $tel, $comment, $_SESSION['logged_user'], $cart);

                $admin_email = 'jean.jen@ya.ru';
                $subject = 'Заказ № '.$order_id;
                $content = 'Пользователь '.$username.' оформил заказ на сумму '.$total_price;
                $result = mail($admin_email, $subject, $content);
                Cart::clear();
                header("Location:/success/order/");
            }

        } else { // если метод гет

            // если пользователь авторизован, получаем данные пользователя
            if (isset($_SESSION['logged_user']))
            {
                $id = $_SESSION['logged_user'];
                $user = $model->get_object_array_by_id('user', $id);
                $username = $user['username'];
            } else $username = '';
        }

        $this->view->generate("checkout_view.php", "template_view.php", array(
            'errors' => $errors,
            'username' => $username,
            'products' => $products,
            'cart' => $cart,
            'total_price' => $total_price,
        ));
}


    // Ajax responses
    public function action_add($id, $quantity=1)
    {
        echo Cart::add_product($id, $quantity);
        return true;
    }

    public function action_delete($id)
    {
        Cart::delete_product($id);
        $referer = $_SERVER['HTTP_REFERER'];
        header("Location: $referer");
    }

    public function action_q_down($id)
    {
        $quantity = Cart::q_down($id);

        echo $quantity;
        return true;
    }

    public function action_q_up($id)
    {
        $quantity = Cart::q_up($id);

        echo $quantity;
        return true;
    }

    public function action_refresh_prices($id)
    {
        $model = new Model_Catalog();

        $products_ids = array_keys(Cart::get_cart_products());
        $products = $model::get_products_by_ids($products_ids);
        $item = $model->get_product_by_id($id);

        $total_price = strval(Cart::get_total_price($products));
        $cart_total_price = strval(Cart::get_cart_total_price($item));
        $cart_count = strval(Cart::count_items());

        $data = array(
            'cart_total_price' => $cart_total_price,
            'subtotal' => $total_price,
            'cart_count' => $cart_count,
        );

        echo json_encode($data);
        return true;
    }

    private function validate_phone_number( $string ) {

        if ( preg_match( '/^[+]?([\d]{0,3})?[\(\.\-\s]?([\d]{3})[\)\.\-\s]*([\d]{3})[\.\-\s]?([\d]{4})$/', $string ) ) {

            return true;

        } else {

            return false;
        }

    }
}