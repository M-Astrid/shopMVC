<?php
use Components\Cart;
use Components\Pagination;

class Controller {

    public $model_name;
    public $view;
    public $model;

	
	function __construct()
	{
		$this->view = new View();

		//components
		$this->cart = new Cart();
	}

	protected function get_model($name)
    {
        require_once ROOT."/models/model_$name.php";
        $model_name = 'Model_'.ucfirst($name);
        return new $model_name;
    }
	
	// действие (action), вызываемое по умолчанию
	function action_index()
	{
		// todo	
	}

    function action_success($type)
    {
        $this->view->generate('success_view.php', 'template_view.php', array(
            'type' => $type,
        ));
    }
}
