<?php


class Controller_Molded_laminated extends Controller
{

    function __construct()
    {
        $this->model = new Model_Molded_laminated ();
        $this->view = new View();

    }

    function action_index()
    {

        $this->view->generate('molded_laminated_view.php', 'template_view.php'); //из главной вюхи выполнить метод ЖЕНЕРАТ
    }
}