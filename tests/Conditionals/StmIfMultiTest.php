<?php
use PHPUnit\Framework\TestCase;
use Miguelcalderonb\MTStatements\Conditionals\StmIfMulti;
use Miguelcalderonb\MTStatements\Conditionals\StmIf;
use Miguelcalderonb\MTStatements\Structs\StatementIfList;

class StmIfMultiTest extends TestCase
{
    public function testMultipleStatementWithFunc()
    {
        $value = 7;

        $firstStm = new StmIf($value, '>=', 1, null, '&&');
        $secondStm = new StmIf($value, '<=', 7, null);

        $listStm = new StatementIfList();
        $listStm->add($firstStm);
        $listStm->add($secondStm);

        $customFunction = function($result) {
            if ($result) {
                return 'Value between 1 and 7';
            }

            return 'Value is not between 1 and 7';
        };

        $stmMulti = new StmIfMulti($listStm, $customFunction);

        $this->assertEquals('Value between 1 and 7', $stmMulti->run());
    }

    public function testAnd()
    {
        $firstStm = new StmIf(true, '===', true, null, '&&');
        $secondStm = new StmIf(true, '===', true, null);

        $listStm = new StatementIfList();
        $listStm->add($firstStm);
        $listStm->add($secondStm);

        $stmMulti = new StmIfMulti($listStm);

        $this->assertTrue($stmMulti->run());
    }

    public function testOr()
    {
        $firstStm = new StmIf(false, '===', true, null, '||');
        $secondStm = new StmIf(true, '===', true, null);

        $listStm = new StatementIfList();
        $listStm->add($firstStm);
        $listStm->add($secondStm);

        $stmMulti = new StmIfMulti($listStm);

        $this->assertTrue($stmMulti->run());
    }

    public function testOneHundred()
    {
        $listStm = new StatementIfList();

        for ($i = 0; $i <= 100; $i++) {
            $stm = new StmIf(true, '===', true, null, '&&');
            $listStm->add($stm);
        }

        $stmMulti = new StmIfMulti($listStm);

        $this->assertTrue($stmMulti->run());

        $stmFalse = new StmIf(false, '===', true);

        $listStm->add($stmFalse);
        $stmMulti = new StmIfMulti($listStm);
        $this->assertFalse($stmMulti->run());
    }
}