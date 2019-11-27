<?php
use Models\Model_Catalog;

class Controller_Main extends Controller
{

	function action_index()
	{
	    $model = new Model_Catalog();
	    $categories = $model::get_categories_list();
	    $products = $model->get_latest_products();
	    $recommended = $model->get_recommended();
		$this->view->generate('main_view.php', 'template_view.php', array(
		    'categories' => $categories,
            'products' => $products,
            'recommended' => $recommended,
        ));
	}
}