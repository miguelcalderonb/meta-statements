<?php
namespace Miguelcalderonb\MTStatements;

class StatementExecuter
{
    public function execute(StatementList $list)
    {
        $result = [];

        foreach ($list->get() as $stm) {
            $result[] = $stm->run();
        }

        return $result;
    }
}