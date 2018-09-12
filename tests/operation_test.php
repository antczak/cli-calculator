<?php
require_once './unittest.php';
require_once './operation.php';

class operation_test extends Test {
    
    public function test_addOperation() {
        $operation = new AddOperation();
        $this->assertEquals($operation->result(5, 10), 15);
        $this->assertEquals($operation->result(0, 2), 2);
        $this->assertEquals($operation->result(100, -5), 95);
    }
    
    public function test_subtractOperation() {
        $operation = new SubtractOperation();
        $this->assertEquals($operation->result(5, 10), -5);
        $this->assertEquals($operation->result(0, 2), -2);
        $this->assertEquals($operation->result(100, -5), 105);
    }
    
    public function test_multiplyOperation() {
        $operation = new MultiplyOperation();
        $this->assertEquals($operation->result(5, 10), 50);
        $this->assertEquals($operation->result(0, 2), 0);
        $this->assertEquals($operation->result(100, -5), -500);
    }
    
    public function test_divideOperation() {
        $operation = new DivideOperation();
        $this->assertEquals($operation->result(5, 10), 0.5);
        $this->assertEquals($operation->result(0, 2), 0);
        $this->assertEquals($operation->result(100, -5), -20);
    }
}