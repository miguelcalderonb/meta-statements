<?php
use PHPUnit\Framework\TestCase;
use Miguelcalderonb\MTStatements\Conditionals\StmIfExec;


class StmIfExecTest extends TestCase
{
    public function testEqualsValues()
    {
        $first = 10;
        $second = $first;

        $result = StmIfExec::run($first, '===', $second);
        $this->assertTrue($result);
    }

    public function testEqualsValuesWithFunction()
    {
        $first = 10;
        $second = $first;

        $func = function ($value) {
            if ($value) {
                return 100;
            }

            return 0;
        };

        $result = StmIfExec::run($first, '===', $second, $func);
        $this->assertEquals(100, $result);
    }


    public function testLessThan()
    {
        $first = 0;
        $second = 10;

        $result = StmIfExec::run($first, '<', $second);
        $this->assertTrue($result);
    }

    public function testGraterThan()
    {
        $first = 10;
        $second = 0;

        $result = StmIfExec::run($first, '>', $second);
        $this->assertTrue($result);
    }

    public function testLessThanOrEquals()
    {
        $first = 10;
        $second = 10;

        $result = StmIfExec::run($first, '<=', $second);
        $this->assertTrue($result);

        $first = 9;
        $result = StmIfExec::run($first, '<=', $second);
        $this->assertTrue($result);
    }

    public function testGreaterThanOrEquals()
    {
        $first = 10;
        $second = 10;

        $result = StmIfExec::run($first, '>=', $second);
        $this->assertTrue($result);

        $second = 9;
        $result = StmIfExec::run($first, '>=', $second);
        $this->assertTrue($result);
    }

    public function testDiff()
    {
        $first = 0;
        $second = 10;

        $result = StmIfExec::run($first, '!=', $second);
        $this->assertTrue($result);

        $first = 10;

        $result = StmIfExec::run($first, '!=', $second);
        $this->assertFalse($result);
    }

    public function testDiffWithType()
    {
        $first = "10";
        $second = 10;

        $result = StmIfExec::run($first, '!==', $second);
        $this->assertTrue($result);


        $first = 10;
        $result = StmIfExec::run($first, '!==', $second);

        $this->assertFalse($result);
    }

    public function testOr()
    {
        $first = true;
        $second = false;

        $result = StmIfExec::run($first, '|', $second);

        $this->assertEquals(1, $result);
    }

    public function testOrDouble()
    {
        $first = true;
        $second = false;

        $result = StmIfExec::run($first, '||', $second);

        $this->assertTrue( $result);
    }

    public function testAnd()
    {
        $first = true;
        $second = false;

        $result = StmIfExec::run($first, '&', $second);

        $this->assertEquals(0, $result);
    }

    public function testDoubleAnd()
    {
        $first = false;
        $second = true;

        $result = StmIfExec::run($first, '&&', $second);

        $this->assertFalse( $result);
    }
}