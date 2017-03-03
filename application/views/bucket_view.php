<?php
if (isset($_POST['clear']) && $_POST['clear'] == "Очистить") {
    $_SESSION['bucket'] = array ();
    $_POST['clear'] = '';
}

$array = array();
if (isset($_POST['bucket'])) {

    array_push($array, $_POST['id'], $_POST['page']);
    array_push($_SESSION['bucket'], $array);
}
if (!empty($_SESSION['bucket']))
{?>
    <div align="center">
        <table>
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
<form action="/bucket" method="post">
    <table style="border: none">
        <tr>
            <td><input type="submit" name="clear" value="Очистить"></td>
            <td><input type="submit" name="checkout" value="Оформить заказ"></td>
        </tr>
    </table>
</form>

<?php } else {
    echo "<h1 align='center'>Ваша корзина пуста</h1>";
}