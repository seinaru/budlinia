<?php

class Model_Bucket extends Model
{
    function __construct() {
        self::pdoConnect();
    }
}