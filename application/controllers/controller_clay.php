<?php

class Controller_Clay extends Controller
{

    function __construct()
    {
        $this->model = new Model_Clay();
        $this->view = new View();

    }

    function action_index()
    {

        $this->view->generate('clay_view.php', 'template_view.php'); //из главной вюхи выполнить метод ЖЕНЕРАТ
    }
}