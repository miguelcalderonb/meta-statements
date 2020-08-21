<?php
namespace Miguelcalderonb\MTStatements;

use Miguelcalderonb\MTStatements\Interfaces\Statement;

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