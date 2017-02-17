<?php


class Controller_Ceilings extends Controller
{

    function __construct()
    {
        $this->model = new Model_Ceilings ();
        $this->view = new View();

    }

    function action_index()
    {

        $this->view->generate('ceilings_view.php', 'template_view.php'); //из главной вюхи выполнить метод ЖЕНЕРАТ
    }
}