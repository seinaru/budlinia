<?php

class Model_Loose_materials extends Model
{
    function __construct() {
        self::pdoConnect();
    }
}