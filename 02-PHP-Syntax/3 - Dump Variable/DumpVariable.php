<?php
function printResult($inputVar) {
    if (is_numeric($inputVar) === true) {
        echo var_dump($inputVar);
    }
    else {
        echo gettype ($inputVar) . "\n";
    }
}
// tests below
printResult('hello');
printResult(15);
printResult(1.234);
printResult(array(1,2,3));
printResult((object)[2,34]);