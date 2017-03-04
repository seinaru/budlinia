<?php
if (isset($_POST['clear']) && $_POST['clear'] == "Очистить") {
    $_SESSION['bucket'] = array ();
    $_POST['clear'] = '';
}

$array = array();
if (isset($_POST['bucket'])) {

    array_push($array, $_POST['id'], $_POST['page']);
    $test = 0;
    echo 'test'.$test.'<br>';
    foreach ($_SESSION['bucket'] as $value) if ($value[0] == $array[0]) $test++;
    echo 'test'.$test.'<br>';
    Model::goodLook($array);
    if ($test == 0) {
        array_push($_SESSION['bucket'], $array);
        Model::goodLook($_SESSION['bucket']);
    }
}
if (!empty($_SESSION['bucket']))
{?>
    <div align="center">
        <table>
            <caption>Корзина:</caption>
            <tr>
                <th>id</th>
                <th>name</th>
                <th>price</th>
            </tr>
<?php
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
<div align="center">
    <form action="/bucket" method="post">
        <table  style="border: none; ">
            <tr>
                <td><input type="submit" name="clear" value="Очистить"></td>
                <td><input type="submit" name="checkout" value="Оформить заказ"></td>
            </tr>
        </table>
    </form>
</div>

<?php } else {
    echo "<h1 align='center' style='margin: 100px 0px;'>Ваша корзина пуста</h1>";
}