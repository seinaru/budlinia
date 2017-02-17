<?php


class Controller_Hardware extends Controller
{

    function __construct()
    {
        $this->model = new Model_Hardware();
        $this->view = new View();

    }

    function action_index()
    {

        $this->view->generate('hardware_view.php', 'template_view.php'); //из главной вюхи выполнить метод ЖЕНЕРАТ
    }
}