<?php
namespace Models;
use \R;
/**
 * Created by PhpStorm.
 * User: astrid
 * Date: 16.11.2019
 * Time: 18:00
 */
Class Model_Cart extends \Model
{
    // если пользователь авторизован, отдает его корзину массивом из БД, если нет - из сессии
    public function get_cart_products()
    {
        $products = array();
        if (isset($_SESSION['logged_user']))
        {
            $id = $_SESSION['logged_user'];
            $cart = R::load('user', $id)->cart_products;
            if (!empty($cart))
            {
                $products = json_decode($cart);
            }
        } else {
            if(isset($_SESSION['products']))
            {
                $products = $_SESSION['products'];
            }
        }
        return $products;
    }
}