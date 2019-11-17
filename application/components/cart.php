<?php
namespace Components;
use \Model;

class Cart
{
    //очистка корзины
    public static function clear()
    {
        $products_in_cart = array();
        self::save_cart_products($products_in_cart);
    }


    public static function add_product($id)
    {
        $id = intval($id);

        $products_in_cart = self::get_cart_products();

        if (array_key_exists($id, $products_in_cart))
        {
            $products_in_cart[$id] ++;
        } else
        {
            $products_in_cart[$id] = 1;
        }

        self::save_cart_products($products_in_cart);

        return self::count_items();
    }


    public static function delete_product($id)
    {
        $products_in_cart = self::get_cart_products();
        unset($products_in_cart[$id]);
        self::save_cart_products($products_in_cart);

        return true;
    }


    public static function q_up($id)
    {
        $id = intval($id);
        $products_in_cart = self::get_cart_products();
        $products_in_cart[$id] ++;
        self::save_cart_products($products_in_cart);
        return $products_in_cart[$id];
    }


    public static function q_down($id)
    {
        $products_in_cart = self::get_cart_products();
        if ($products_in_cart[$id] != 1)
        {
            $products_in_cart[$id] --;
        }
        self::save_cart_products($products_in_cart);
        return $products_in_cart[$id];
    }


    public static function count_items()
    {
        $products_in_cart = self::get_cart_products();
        if (!empty($products_in_cart))
        {
            $count = 0;
            foreach ($products_in_cart as $id => $number)
            {
                $count += $number;
            }
        } else $count = 0;

        return $count;
    }


    // общая стоимсть всех товаров в корзине
    public static function get_total_price($products)
    {
        $products_in_cart = self::get_cart_products();
        $sum = 0;
        foreach ($products as $item)
        {
            $sum += ($item['price'] * $products_in_cart[$item['id']]);
        }
        return $sum;
    }


    // общая стоимость для отдельного наименования товара в корзине
    public static function get_cart_total_price($item)
    {
        $products_in_cart = self::get_cart_products();
        $count = $products_in_cart[$item['id']];
        return $item['price']*$count;
    }


    // если пользователь авторизован, то тянет корзину из БД, если нет, то из сессии
    public static function get_cart_products()
    {
        $products_in_cart = array();
        if (isset($_SESSION['logged_user']))
        {
            $id = $_SESSION['logged_user'];
            $cart = Model::get_object_array_by_id('user', $id)['cart_products'];
            if (!empty($cart))
            {
                $products_in_cart = json_decode($cart, true);
            }
        } else {
            if(isset($_SESSION['products']))
            {
                $products_in_cart = $_SESSION['products'];
            }
        }
        return $products_in_cart;
    }


    // если пользователь авторизован, то сохраняет корзину в БД, если нет, то в сессию
    public static function save_cart_products($products)
    {
        if (isset($_SESSION['logged_user']))
        {
            $id = $_SESSION['logged_user'];
            $data['cart_products'] = json_encode($products);
            Model::update_object('user', $id, $data);
        } else {
            $_SESSION['products'] = $products;
        }
        return true;
    }
}