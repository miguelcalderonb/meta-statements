<?php
namespace Miguelcalderonb\MTStatements\Conditionals;

use Miguelcalderonb\MTStatements\Interfaces\Statement;

class StmIf implements Statement
{
    public $first;
    public $operator;
    public $second;
    public $execute;
    public $logicalOperator;

    public function __construct($first, String $operator, $second, $execute = null, $logicalOperator = null)
    {
        $this->first = $first;
        $this->operator = $operator;
        $this->second = $second;
        $this->execute = $execute;
        $this->logicalOperator = $logicalOperator;
    }

    public function run()
    {
        return SmtIfExec::run($this->first, $this->operator, $this->second, $this->execute);
    }
}