<?php

class Controller_Insulation_materials extends Controller
{

    function __construct()
    {
        $this->model = new Model_Insulation_materials();
        $this->view = new View();

    }

    function action_index()
    {

        $this->view->generate('insulation_materials_view.php', 'template_view.php'); //из главной вюхи выполнить метод ЖЕНЕРАТ
    }
}