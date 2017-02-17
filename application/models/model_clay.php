<?php

class Model_Clay extends Model
{
    function __construct() {
        self::pdoConnect();
    }
}
