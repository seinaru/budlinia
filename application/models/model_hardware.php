<?php


class Model_Hardware extends Model
{
    function __construct() {
        self::pdoConnect();
    }
}
