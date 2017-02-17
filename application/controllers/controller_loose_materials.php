<?php


class Controller_Loose_materials extends Controller
{

    function __construct()
    {
        $this->model = new Model_Loose_materials();
        $this->view = new View();

    }

    function action_index()
    {

        $this->view->generate('loose_materials_view.php', 'template_view.php'); //из главной вюхи выполнить метод ЖЕНЕРАТ
    }
}