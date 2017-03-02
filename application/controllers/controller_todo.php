<?php

class Controller_Todo extends Controller
{

    function __construct()
    {
        //$this->model = new Model_todo();
        $this->view = new View();
    }

    function action_index()
    {
        //$data = $this->model->get_data();// из этой модели выпонить медот ГЕТ_ДАТА и передать массив в $data
        $this->view->generate('todo_view.php', 'template_view.php'); //из главной вюхи выполнить метод ЖЕНЕРАТ
    }
}