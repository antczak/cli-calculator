<?php
require_once './operation.php';

class Calculator {
    private $operations = [];
    
    public function registerOperation(IOperation $operation, $sign) {
            $this->operations[$sign] = $operation;
    }
    
    private function evalOperation($sign, $a, $b) {
        $operation = $this->operations[$sign];
        return $operation->result($a, $b);
    }
    
    public function parseExpression($expression) {
        $expression = preg_replace("/\s/", "", $expression);
        $data = preg_split("/([^0-9])/", $expression, -1, PREG_SPLIT_DELIM_CAPTURE);
        return $this->evalOperation($data[1], $data[0], $data[2]);
    }  
    
    public function __get($property) {
        if (property_exists($this, $property))
            return $this->$property;
    }
}

?>
