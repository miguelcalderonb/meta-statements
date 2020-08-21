<?php
namespace Miguelcalderonb\MTStatements\Structs;

use Miguelcalderonb\MTStatements\Conditionals\StmIf;

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