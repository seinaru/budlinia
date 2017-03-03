<div align="center">
    <table >
        <tr>
            <th>id</th>
            <th>name</th>
            <th>price</th>
        </tr>
<?php
if (isset($_POST['clear']) && $_POST['clear'] == "Очистить") {
    $_SESSION['bucket'] = array ();
    $_POST['clear'] = '';
}
Model::goodLook($_POST);
$array = array();
if (isset($_POST['bucket'])) {

    array_push($array, $_POST['id'], $_POST['page']);
    array_push($_SESSION['bucket'], $array);
}

foreach ($_SESSION['bucket'] as $value)
{
    $result = Model::sqlQuery("SELECT * FROM ".$value[1]." WHERE id = :id ", array('id' => $value[0]), false, 'fetchAll')[0];
    //Model::goodLook($result);

    ?>
        <tr >
            <?php
                //Model::goodLook($result);
                foreach ($result as $key=>$data)
                {
                    if ($key == "id" or $key == 'name' or $key == 'price')
                    {
                    echo '<td border="solid">';

                    echo $data;
                    echo '</td>';
                    }
                }

            ?>
        </tr>

<?php } ?>

    </table>
</div>
<form action="/bucket" method="post">
    <table style="border: none">
        <tr>
            <td><input type="submit" name="clear" value="Очистить"></td>
            <td><input type="submit" name="checkout" value="Оформить заказ"></td>
        </tr>
    </table>
</form>