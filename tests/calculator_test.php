<?php
require_once './unittest.php';
require_once './calculator.php';

class calculator_test extends Test {
    
    public function test_registerOperation() {
        $calculator = new Calculator();
        $operations[0] = new AddOperation();
        $operations[1] = new SubtractOperation();
        $operations[2] = new MultiplyOperation();
        $operations[3] = new MultiplyOperation();
        $operations[4] = new DivideOperation();
        $calculator->registerOperation($operations[0], "+");
        $calculator->registerOperation($operations[1], "-");
        $calculator->registerOperation($operations[2], "*");
        $calculator->registerOperation($operations[3], "x");
        $calculator->registerOperation($operations[4], "/");
        $this->assertEquals(count($calculator->operations), 5);
    }
    
    public function test_parseExpression() {
        $calculator = new Calculator();
        $calculator->registerOperation(new AddOperation(), "+");
        $calculator->registerOperation(new SubtractOperation(), "-");
        $calculator->registerOperation(new MultiplyOperation(), "*");
        $calculator->registerOperation(new DivideOperation(), "/");
        $this->assertEquals($calculator->parseExpression("2    + 4"), 6);
        $this->assertEquals($calculator->parseExpression("2-4"), -2);
        $this->assertEquals($calculator->parseExpression("   2*10"), 20);
        $this->assertEquals($calculator->parseExpression("2/4"), 0.5);
    }
}

?>