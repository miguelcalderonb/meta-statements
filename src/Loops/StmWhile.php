<?php
namespace Miguelcalderonb\MTStatements\Loops;

use Miguelcalderonb\MTStatements\Structs\LoopRestriction;
use Miguelcalderonb\MTStatements\Interfaces\Statement;

class StmWhile implements Statement
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
        StmWhileExec::run($this->first, $this->operator, $this->second, $this->restriction, $this->execute);
    }
}