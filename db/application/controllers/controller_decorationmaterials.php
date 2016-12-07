<?php
class Controller_Decorationmaterials extends Controller
{

    function __construct()
    {
        $this->model = new Model_Decorationmaterials();
        $this->view = new View();
    }

    function action_index()
    {
        $data = $this->model->get_data();// из этой модели выпонить медот ГЕТ_ДАТА и передать массив в $data
        $this->view->generate('decorationmaterials_view.php', 'template_view.php', $data); //из главной вюхи выполнить метод ЖЕНЕРАТ
    }
}