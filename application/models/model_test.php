<?php

class Model_Test extends Model
{
    function __construct() {
        self::pdoConnect();
    }
}
