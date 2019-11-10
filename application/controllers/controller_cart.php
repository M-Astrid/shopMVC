<?php
/**
 * Created by PhpStorm.
 * User: astrid
 * Date: 09.11.2019
 * Time: 12:11
 */
use Components\Cart;

Class Controller_Cart extends Controller
{
    public function action_index()
    {
        $model = $this->get_model('catalog');

        $categories = $model::get_category_list();

        if (isset($_SESSION['products']))
        {
            $products_ids = array_keys($_SESSION['products']);
            $products = $model::get_products_by_ids($products_ids);

            $total_price = Cart::get_total_price($products);
        }

        $this->view->generate("cart_view.php", "template_view.php", array(
            'categories' => $categories,
            'products' => $products,
            'total_price' => $total_price,
        ));
    }


    // Ajax responses
    public function action_add($id)
    {
        echo Cart::add_product($id);
        return true;
    }

    public function action_delete($id)
    {
        Cart::delete_product($id);
        return true;
    }

    public function action_q_down($id)
    {
        $quantity = Cart::q_down($id);

        echo $quantity;
        return true;
    }

    public function action_refresh_prices($id)
    {
        $model = $this->get_model('catalog');

        $products_ids = array_keys($_SESSION['products']);
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
}