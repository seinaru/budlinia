<?php

class Controller_Test extends Controller
{

    function __construct()
    {
        $this->model = new Model_Test();
        $this->view = new View();

    }

    function action_index()
    {

        $this->view->generate('test_view.php', 'template_view.php'); //из главной вюхи выполнить метод ЖЕНЕРАТ
    }
}