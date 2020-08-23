<?php

use Miguelcalderonb\MTStatements\Loops\StmWhileExec;
use Miguelcalderonb\MTStatements\Structs\LoopRestriction;
use PHPUnit\Framework\TestCase;

class StmWhileExecTest extends TestCase
{
    public function testRunFunc()
    {
        $restrict = new LoopRestriction('+', 'before', 1);
        $result= StmWhileExec::run(0, '<=', 10, $restrict, ['TestUtils\MyDummyLog', 'addToLog']);

        $firstResult = 11;
        $this->assertEquals($firstResult, $result[0]);
        $this->assertEquals('<=', $result[1]);
        $this->assertEquals(10, $result[2]);

        $this->assertEquals(count(TestUtils\MyDummyLog::$log)-1, 10);
        $this->assertEquals(TestUtils\MyDummyLog::$log[10], $firstResult);

        \TestUtils\MyDummyLog::clean();
    }
}