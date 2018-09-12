<?php
require_once './app.php';
require_once './unittest.php';

$testmanager = new TestManager("tests");
$testmanager->runAll();
$calculator = new Calculator();
$calculator->registerOperation(new AddOperation(), "+");
$calculator->registerOperation(new SubtractOperation(), "-");
$calculator->registerOperation(new MultiplyOperation(), "*");
$calculator->registerOperation(new DivideOperation(), "/");
$app = new App($calculator, new DefaultOutput(), new DefaultInput());
$app->run();

?>