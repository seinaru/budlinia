<?php

    $array = array();

    //$_SESSION['bucket'] = array();
    Model::goodLook($_SESSION);
    Model::goodLook($_POST);
    if (isset($_POST['backet'])) {
        array_push($array, $_POST['id'], $_POST['page']);
        Model::goodLook($array);
        echo 'session';
        Model::goodLook($_SESSION['bucket']);
        array_push($_SESSION['bucket'], $array);
        echo 'так выглядит корзина:';Model::goodLook($_SESSION);
        //echo 'status:'.session_status();
    }


?>
<form enctype="multipart/form-data" action="/test" method="post">
    <input type="hidden" name="MAX_FILE_SIZE" value="30000">
    Send this file: <input name="userfile" type="file">
    <input type="submit" value="Send File">
</form>

<form action="/test" method="post" >
    Введите число <input type="text" name="num" value="" /><br/>
    У Вас есть компьютер? <select name="type">
        <option value="yes">Да</option>
        <option value="no">Нет</option>
    </select><br/>
    Ваш комментарий:<br/>
    <textarea name="v" ></textarea><br/>
    <input type="submit" name="bsubmit" value="Отправить" />
</form>

<?php
Model::goodLook($_POST);
Model::addToDB_CSV_Table();
?><br><?php

/*$query = "SELECT * FROM wood_materials";
$rs = Model::fatchArray($query);*/
/*Model::goodLook($rs);*/
/*$dataDB = $rs;*/
/*foreach ($dataDB as $value)
{
    ?>
        <div class="dataDB">
            <img src=" <?php print_r($value['picture'])?>">
            <p align="center">
                <?php
                    print_r($value['name']);
                ?>
            </p>
            <br>
            <p>
                Код товара: <?php print_r($value['id']); ?>
            </p>
            <p>
                <?php print_r($value['price']); ?> <?php print_r($value['currency']);?>
            </p>
            <br>
            <form>
                <input type="button" name="backet" value="Заказать">
            </form>
        </div>
    <?php
}*/

