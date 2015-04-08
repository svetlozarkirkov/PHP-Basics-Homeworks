<?php
    function printResult($inputVar) {
        if (is_numeric($inputVar) === true) {
            echo var_dump($inputVar) . '<br>';
        }
        else {
            echo gettype ($inputVar) . '<br>';
        }
    }
    printResult('hello');
    printResult(15);
    printResult(1.234);
    printResult(array(1,2,3));
    printResult((object)[2,34]);