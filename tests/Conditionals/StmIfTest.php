<?php
use PHPUnit\Framework\TestCase;
use Miguelcalderonb\MTStatements\Conditionals\StmIf;

class StmIfTest extends TestCase
{
    public function testEqualsValues()
    {
        $first = 10;
        $second = $first;

        $smt = new StmIf($first, '===', $second);
        $this->assertTrue($smt->run());
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

        $smt = new StmIf($first, '===', $second, $func);
        $this->assertEquals(100, $smt->run());
    }


    public function testLessThan()
    {
        $first = 0;
        $second = 10;

        $smt = new StmIf($first, '<', $second);
        $this->assertTrue($smt->run());
    }

    public function testGraterThan()
    {
        $first = 10;
        $second = 0;

        $smt = new StmIf($first, '>', $second);
        $this->assertTrue($smt->run());
    }

    public function testLessThanOrEquals()
    {
        $first = 10;
        $second = 10;

        $smt = new StmIf($first, '<=', $second);
        $this->assertTrue($smt->run());

        $smt->first = 9;
        $this->assertTrue($smt->run());
    }

    public function testGreaterThanOrEquals()
    {
        $first = 10;
        $second = 10;

        $smt = new StmIf($first, '>=', $second);
        $this->assertTrue($smt->run());

        $smt->second = 9;
        $this->assertTrue($smt->run());
    }

    public function testDiff()
    {
        $first = 0;
        $second = 10;

        $smt = new StmIf($first, '!=', $second);
        $this->assertTrue($smt->run());

        $smt->first = 10;

        $this->assertFalse($smt->run());
    }

    public function testDiffWithType()
    {
        $first = "10";
        $second = 10;

        $smt = new StmIf($first, '!==', $second);
        $this->assertTrue($smt->run());


        $smt->first = 10;
        $this->assertFalse($smt->run());
    }

    public function testOr()
    {
        $first = true;
        $second = false;

        $smt = new StmIf($first, '|', $second);

        $this->assertEquals(1, $smt->run());
    }

    public function testOrDouble()
    {
        $first = true;
        $second = false;

        $smt = new StmIf($first, '||', $second);

        $this->assertTrue( $smt->run());
    }

    public function testAnd()
    {
        $first = true;
        $second = false;

        $smt = new StmIf($first, '&', $second);

        $this->assertEquals(0, $smt->run());
    }

    public function testDoubleAnd()
    {
        $first = false;
        $second = true;

        $smt = new StmIf($first, '&&', $second);

        $this->assertFalse( $smt->run());
    }
}