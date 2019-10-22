<?php
/**
 * Created by PhpStorm.
 * User: astrid
 * Date: 18.10.2019
 * Time: 14:04
 */

class Controller_Catalog extends Controller
{

    public function action_index()
    {
        $model = $this->get_model('catalog');

        $categories = $model->get_category_list();
        $products = $model->get_products();

        $this->view->generate('catalog_view.php', 'template_view.php', array(
            'categories' => $categories,
            'products' => $products,
            'show_all_products' => True,
        ));
    }

    public function action_category($category_id, $page=1)
    {
        $model = $this->get_model('catalog');

        $categories = $model->get_category_list();
        $products = $model->get_products_by_category($category_id, $page);
        //$total = $model->get_total_products_in_category($category_id);
        $total = $model::get_total_products_in_category($category_id);
        $paginator = new Pagination($total, $page, Model_Catalog::SHOW_BY_DEFAULT, 'page-');

        $this->view->generate('catalog_view.php', 'template_view.php', array(
            'category_id' => $category_id,
            'categories' => $categories,
            'products' => $products,
            'total' => $total,
            'page' => $page,
            'paginator' => $paginator,
        ));
    }


}