<?php


class Controller_Building_mixture extends Controller
{

    function __construct()
    {
        $this->model = new Model_Building_mixture();
        $this->view = new View();

    }

    function action_index()
    {

        $this->view->generate('building_mixture_view.php', 'template_view.php'); //из главной вюхи выполнить метод ЖЕНЕРАТ
    }
}