<?php


class Controller_Siding extends Controller
{

    function __construct()
    {
        $this->model = new Model_Siding();
        $this->view = new View();

    }

    function action_index()
    {

        $this->view->generate('siding_view.php', 'template_view.php'); //из главной вюхи выполнить метод ЖЕНЕРАТ
    }
}