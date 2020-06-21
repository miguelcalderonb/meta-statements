<?php
namespace MTStatements\Structs;

class LoopRestriction
{
    public $operator;

    //before, after, before_and_after
    public $secondValue;

    public $typeAction;

    public function __construct($operator, $typeAction, $secondValue = null)
    {
        $this->operator = $operator;
        $this->typeAction = $typeAction;
        $this->secondValue = $secondValue;
    }
}