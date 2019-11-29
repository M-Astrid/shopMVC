<?php
namespace Models;
use \R;
/**
 * Created by PhpStorm.
 * User: astrid
 * Date: 14.11.2019
 * Time: 11:39
 */

class Model_Order extends \Model
{
    public function create_order($name, $tel, $comment, $userid, $products)
    {
        $order = R::dispense('orders');
        $order->name = $name;
        $order->tel = $tel;
        $order->comment = $comment;
        $order->products = json_encode($products);
        $order->status = 1;
        $order->user = R::findOne('user', 'id = ?', array($userid));
        R::store($order);

        return $order->id;
    }

    public static function get_user_orders($id)
    {
        return R::getAll('SELECT id, date, status, products FROM orders WHERE user_id = ?', [$id]);
    }
}