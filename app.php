<?php
require_once './calculator.php';

interface IOutput {
    public function putMessage($message);
}

interface IInput {
    public function getMessage();
}

class DefaultOutput implements IOutput {
    public function putMessage($message) {
        print $message;
    }
}

class DefaultInput implements IInput {
    public function getMessage() {
        return fgets(STDIN);
    }
}

class App {
    private $calculator;
    private $output;
    private $input;
    public function __construct(Calculator $calculator, IOutput $output, IInput $input) {
        $this->calculator = $calculator;
        $this->output = $output;
        $this->input = $input;
    }
    
    public function run() {
        $line = "";
        while(true) {
            $this->output->putMessage("Podaj wyrażenie: ");
            $line = $this->input->getMessage();
            if ($line == "exit")
                break;
            $this->output->putMessage($this->calculator->parseExpression($line)."\n");
        }
    }
}

?>