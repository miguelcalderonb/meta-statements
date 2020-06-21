<?php
namespace MTStatements;

use MTStatements\Interfaces\Statement;

class StatementList
{
    private $list = [];

    public function add(Statement $stm)
    {
        $this->list[] = $stm;
    }

    public function get()
    {
        return $this->list;
    }
}