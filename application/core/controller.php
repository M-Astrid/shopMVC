<?php

class Controller {

    public $model_name;
    public $view;
    public $model;

    function __construct()
    {
        $this->view = new View();
    }

    // действие (action), вызываемое по умолчанию
    function action_index()
    {
        // todo
    }

    public function action_success($type)
    {
        $this->view->generate('success_view.php', 'template_view.php', array(
            'type' => $type,
        ));
    }
}
