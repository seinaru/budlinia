<?php



class Controller_Wood_materials extends Controller
{

    function __construct()
    {
        $this->model = new Model_Wood_materials();
        $this->view = new View();

    }

    function action_index()
    {

        $this->view->generate('wood_materials_view.php', 'template_view.php'); //из главной вюхи выполнить метод ЖЕНЕРАТ
    }
}