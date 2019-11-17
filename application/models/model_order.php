<?php
namespace Models;
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
        $order->user = R::findOne('user', 'id = ?', array($userid));
        R::store($order);

        return $order->id;
    }
}