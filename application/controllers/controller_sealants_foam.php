<?php


class Controller_Sealants_foam extends Controller
{

    function __construct()
    {
        $this->model = new Model_Sealants_foam ();
        $this->view = new View();

    }

    function action_index()
    {

        $this->view->generate('sealants_foam_view.php', 'template_view.php'); //из главной вюхи выполнить метод ЖЕНЕРАТ
    }
}