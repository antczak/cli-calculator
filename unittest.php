<?php

class TestManager {
    
    private $dir;
    private $tests = [];
    private $success = 0;
    private $fail = 0;
    
    public function __construct($dir) {
        $this->dir = $dir;
        $this->collectTests($dir);
    }
    
    private function collectTests($dir) {
        $files = array_diff(scandir($dir), array("..", "."));
        foreach($files as $file) {
            $this->tests[] = $file;
        }
    }
    
    public function run($test) {
        print "Uruchamiam test ".$test."\n";
        require_once $this->dir.'/'.$test;
        $classname = str_replace(".php", "", $test);
        $object = new $classname();
        $testmethods  = preg_grep('/^test_/', get_class_methods($object));
        foreach($testmethods as $method) {
            $object->{$method}();
        } 
        print "Podsumowanie testu ".$test.
                " - zakończone sukcesem: ".$object->success.
                ", zakończone niepowodzeniem: ".$object->fail."  \n";
        $this->success += $object->success; 
        $this->fail += $object->fail; 
    }
    
    public function runAll() {
        print "Uruchamiam wszystkie testy \n";
        foreach($this->tests as $test)  {
            $this->run($test);
        }
        print "Podsumowanie wszystkich testów - zakończone sukcesem: "
            .$this->success.", zakończone niepowodzeniem: ".$this->fail."  \n";
    }
    
    public function __get($property) {
        if (property_exists($this, $property))
            return $this->$property;
    }
}

class Test {
    
    private $success = 0;
    private $fail = 0;
    
    public function assertTrue($value) {
        !$value ? $this->fail() : $this->success();
    }
    
    public function assertFalse($value) {  
        $value ? $this->fail() : $this->success();     
    }
    
    public function assertEquals($value, $value2) {
        $value != $value2 ? $this->fail() : $this->success();  
    }
    
    private function fail() {
        print "Niepowodzenie (Klasa: ".debug_backtrace()[2]['class'].
                ", Metoda: ".debug_backtrace()[2]['function'].
                ", Linia: ".debug_backtrace()[1]['line'].
                ") - ".debug_backtrace()[1]['function']." \n";
        $this->fail++;
    }
    
    private function success() {
        $this->success++;
    }
    
    public function __get($property) {
        if (property_exists($this, $property))
            return $this->$property;
    }
    
    
}

?>