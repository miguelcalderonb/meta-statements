<?php
namespace MTStatements\Loops;

use MTStatements\Structs\LoopRestriction;
use MTStatements\Interfaces\Statement;

class SmtWhile implements Statement
{
    public $first;

    public $operator;

    public $second;

    public $restriction;

    public $execute;

    public function __construct($first, String $operator, $second, LoopRestriction $restriction, $execute)
    {
        $this->first = $first;
        $this->operator = $operator;
        $this->second = $second;
        $this->restriction = $restriction;
        $this->execute = $execute;
    }

    public function run()
    {
        SmtWhileExec::run($this->first, $this->operator, $this->second, $this->restriction, $this->execute);
    }
}