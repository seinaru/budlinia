<?php


class Model_Fiberglass extends Model
{
    function __construct() {
        self::pdoConnect();
    }
}
