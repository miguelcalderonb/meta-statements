<?php
namespace Miguelcalderonb\MTStatements\Conditionals;

class SmtIfExec
{
    public static function run($first, String $operator, $second, $execute = null)
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

        return $execute($result, $first, $operator, $second);
    }
}
