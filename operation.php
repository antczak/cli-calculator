<?php

interface IOperation {
    public function result($a, $b);
}

class AddOperation implements IOperation {
    public function result($a, $b) {
        return $a + $b;
    }
}

class SubtractOperation implements IOperation {
    public function result($a, $b) {
        return $a - $b;
    }
}

class MultiplyOperation implements IOperation {
    public function result($a, $b) {
        return $a * $b;
    }
}

class DivideOperation implements IOperation {
    public function result($a, $b) {
        return $a / $b;
    }
}

?>