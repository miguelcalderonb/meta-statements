<?php
namespace TestUtils;

class MyDummyLog {

    public static $log;


    public static function addToLog($firstValue)
    {
        self::$log[] = $firstValue;
    }

    public static function clean()
    {
        self::$log = [];
    }
}