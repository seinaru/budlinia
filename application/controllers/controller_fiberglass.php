<?php


class Controller_Fiberglass extends Controller
{

    function __construct()
    {
        $this->model = new Model_Fiberglass ();
        $this->view = new View();

    }

    function action_index()
    {

        $this->view->generate('fiberglass_view.php', 'template_view.php'); //из главной вюхи выполнить метод ЖЕНЕРАТ
    }
}