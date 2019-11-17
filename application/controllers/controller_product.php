<?php
/**
 * Created by PhpStorm.
 * User: astrid
 * Date: 18.10.2019
 * Time: 15:58
 */

class Controller_Product extends Controller
{
    public function action_detail($product_id)
    {
        $model = new \Models\Model_Catalog;

        $product = Model::get_object_array_by_id('product', $product_id);

        $categories = $model->get_category_list();

        $this->view->generate('product_detail_view.php', 'template_view.php', array(
            'product' => $product,
            'categories' => $categories,
        ));
    }
}