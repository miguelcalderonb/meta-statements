<?php
namespace MTStatements\Structs;

use MTStatements\Conditionals\StmIf;

class StatementIfList
{
    private $list = [];

    public function add(StmIf $stm)
    {
        $this->list[] = $stm;
    }

    public function get()
    {
        return $this->list;
    }
}