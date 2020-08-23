<?php
namespace Miguelcalderonb\MTStatements\Loops;

use Miguelcalderonb\MTStatements\BasicOperation;
use Miguelcalderonb\MTStatements\Conditionals\StmIfExec;
use Miguelcalderonb\MTStatements\Structs\LoopRestriction;

class StmWhileExec
{
    public static function run($first, String $operator, $second, LoopRestriction $restriction, $execute)
    {
        while (StmIfExec::run($first, $operator, $second, null)) {

            if ($restriction->typeAction === 'before') {
                $first = self::restriction($first, $restriction);
            }

            $execute($first, $operator, $second);

            if ($restriction->typeAction === 'after') {
                $first = self::restriction($first, $restriction);
            }
        }

        return [$first, $operator, $second];
    }

    private static function restriction($value, $restriction)
    {
        return BasicOperation::execute($value, $restriction->operator, $restriction->secondValue);
    }
}