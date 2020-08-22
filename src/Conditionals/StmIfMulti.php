<?php
namespace Miguelcalderonb\MTStatements\Conditionals;

use Miguelcalderonb\MTStatements\Interfaces\Statement;
use Miguelcalderonb\MTStatements\Structs\StatementIfList;

class StmIfMulti implements Statement
{
    private $list;

    private $execute;

    public function __construct(StatementIfList $list, $execute = null)
    {
        $this->list = $list;
        $this->execute = $execute;
    }

    public function run()
    {
        $current = null;

        $stmList = $this->list->get();
        for ($i=0; $i < count($stmList); $i++) {

            $currentStm = $stmList[$i];

            if ($current === null) {
                $current = $currentStm->run();
            }

            if (isset($stmList[$i+1])) {
                $nextStm = $stmList[$i+1];

                $current = StmIfExec::run($current, $currentStm->logicalOperator, $nextStm->run(), null);
            }
        }

        if ($this->execute !== null) {
            $function = $this->execute;
            return $function($current);
        }

        return $current;
    }
}