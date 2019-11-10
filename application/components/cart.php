<?php
namespace Components;

class Cart
{
    public static function add_product($id)
    {
        $id = intval($id);

        $products_in_cart = array();

        if (isset($_SESSION['products']))
        {
            $products_in_cart = $_SESSION['products'];
        }

        if (array_key_exists($id, $products_in_cart))
        {
            $products_in_cart[$id] ++;
        } else
        {
            $products_in_cart[$id] = 1;
        }

        $_SESSION['products'] = $products_in_cart;

        return self::count_items();
    }

    public static function delete_product($id)
    {
        unset($_SESSION['products'][$id]);
        if (count($_SESSION['products']) == 0)
        {
            unset($_SESSION['products']);
        }
    }

    public static function q_up($id)
    {
        $id = intval($id);

        $_SESSION['products'][$id] ++;
        return $_SESSION['products'][$id];
    }

    public static function q_down($id)
    {
        if ($_SESSION['products'][$id] != 1)
        {
            $_SESSION['products'][$id] --;
        }
        return $_SESSION['products'][$id];
    }

    public static function count_items()
    {
        if (isset ($_SESSION['products']))
        {
            $count = 0;
            foreach ($_SESSION['products'] as $id => $number)
            {
                $count += $number;
            }
        } else $count = 0;

        return $count;
    }

    public static function get_total_price($products)
    {
        $sum = 0;
        foreach ($products as $item)
        {
            $sum += $item['price'] * $_SESSION['products'][$item['id']];
        }

        return $sum;
    }

    public static function get_cart_total_price($item)
    {
        $count = $_SESSION['products'][$item['id']];
        return $item['price']*$count;
    }
}