<?php
namespace Miguelcalderonb\MTStatements\Loops;

use Miguelcalderonb\MTStatements\BasicOperation;
use Miguelcalderonb\MTStatements\Conditionals\SmtIfExec;
use Miguelcalderonb\MTStatements\Structs\LoopRestriction;

class SmtWhileExec
{
    public static function run($first, String $operator, $second, LoopRestriction $restriction, $execute)
    {
        while (SmtIfExec::run($first, $operator, $second, null)) {

            if ($restriction->typeAction === 'before') {
                $first = self::restriction($first, $restriction);
            }

            $execute($first, $operator, $second);

            if ($restriction->typeAction === 'after') {
                $first = self::restriction($first, $restriction);
            }
        }
    }

    private static function restriction($value, $restriction)
    {
        return BasicOperation::execute($value, $restriction->operator, $restriction->secondValue);
    }
}