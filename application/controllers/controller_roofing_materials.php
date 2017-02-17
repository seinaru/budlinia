<?php

class Controller_Roofing_materials extends Controller
{

    function __construct()
    {
        $this->model = new Model_Roofing_materials();
        $this->view = new View();

    }

    function action_index()
    {

        $this->view->generate('roofing_materials_view.php', 'template_view.php'); //из главной вюхи выполнить метод ЖЕНЕРАТ
    }
}