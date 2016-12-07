<?php

class Controller_Floors extends Controller
{

    function action_index()
    {
        $this->view->generate('floors_view.php', 'template_view.php');
    }
}