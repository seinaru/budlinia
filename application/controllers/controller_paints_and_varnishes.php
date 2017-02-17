<?php



class Controller_Paints_and_varnishes extends Controller
{

    function __construct()
    {
        $this->model = new Model_Paints_and_varnishes();
        $this->view = new View();

    }

    function action_index()
    {

        $this->view->generate('paints_and_varnishes_view.php', 'template_view.php'); //из главной вюхи выполнить метод ЖЕНЕРАТ
    }
}