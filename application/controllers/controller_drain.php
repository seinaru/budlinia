<?php


class Controller_Drain extends Controller
{

    function __construct()
    {
        $this->model = new Model_Drain();
        $this->view = new View();

    }

    function action_index()
    {

        $this->view->generate('drain_view.php', 'template_view.php'); //из главной вюхи выполнить метод ЖЕНЕРАТ
    }
}