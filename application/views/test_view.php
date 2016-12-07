<form enctype="multipart/form-data" action="/test" method="post">
    <input type="hidden" name="MAX_FILE_SIZE" value="30000">
    Send this file: <input name="userfile" type="file">
    <input type="submit" value="Send File">
</form>
<?php

Model::addToDB_CSV_Table();
?><br><?php

$query = "SELECT * FROM wood_materials";
$rs = Model::fatchArray($query);
/*Model::goodLook($rs);*/
$dataDB = $rs;
foreach ($dataDB as $value)
{
    ?>
        <div class="dataDB">
            <img src="<?php print_r($value['picture'])?>">
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
                <?php print_r($value['price']); ?> <?php print_r($value['currency']); ?>
            </p>
            <br>
            <form>
                <input type="button" name="backet" value="Заказать">
            </form>
        </div>
    <?php
}

