<?php
namespace Miguelcalderonb\MTStatements;

class BasicOperation
{
    public static function execute($value, $operator, $secondValue = null)
    {
        switch ($operator) {
            case '+':
                return $value + $secondValue;
                break;
            case '++':
                return $value+1;
                break;
            case '-':
                return $value - $secondValue;
                break;
            case '--':
                return $value-1;
                break;
            case '*':
                return $value * $secondValue;
                break;
            case '/':
                return $value / $secondValue;
                break;
            case '%':
                return $value % $secondValue;
                break;
        }
    }
}