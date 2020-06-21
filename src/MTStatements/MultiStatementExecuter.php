<?php
namespace MTStatements;

class MultiStatementExecuter
{
    public function execute(MultiStatementExecuter $multiList)
    {
        $result = [];

        foreach ($multiList->get() as $list) {
            $stmExec = new StatementExecuter();

            $result[] = $stmExec->execute($list);
        }

        return $result;
    }
}