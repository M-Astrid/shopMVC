<?php
/**
 * Created by PhpStorm.
 * User: astrid
 * Date: 18.10.2019
 * Time: 14:04
 */
use Components\Pagination;

class Controller_Catalog extends Controller
{

    public function action_index($category_id=0, $page=1)
    {
        $model = new \Models\Model_Catalog;

        $categories = $model->get_category_list();
        $products = $model->get_products_by_category($category_id, $page);
        $total = $model::get_total_products_in_category($category_id);
        $paginator = new Pagination($total, $page, $model::SHOW_BY_DEFAULT, 'page-');

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