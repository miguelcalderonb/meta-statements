<?php
namespace Miguelcalderonb\MTStatements\Conditionals;

class SmtIfExec
{
    public static function run($first, String $operator, $second, $execute)
    {
        $result = null;

        switch ($operator) {
            case '=':
                $result = ($first = $second);
                break;
            case '==':
                $result = ($first == $second);
                break;
            case '===':
                $result = ($first === $second);
                break;
            case '<':
                $result = ($first < $second);
                break;
            case '<=':
                $result = ($first <= $second);
                break;
            case '>':
                $result = ($first > $second);
                break;
            case '>=':
                $result = ($first >= $second);
                break;
            case '!=':
                $result = ($first != $second);
                break;
            case '!==':
                $result = ($first !== $second);
                break;
            case '|':
                $result = ($first | $second);
                break;
            case '||':
                $result = ($first || $second);
                break;
            case '&':
                $result = ($first & $second);
                break;
            case '&&':
                $result = ($first && $second);
                break;
        }

        if ($execute == null) {
            return $result;
        }

        if ($result) {
            return $execute($result, $first, $operator, $second);
        }
    }
}