<?php

class Model_Drain extends Model
{
    function __construct() {
        self::pdoConnect();
    }
}
