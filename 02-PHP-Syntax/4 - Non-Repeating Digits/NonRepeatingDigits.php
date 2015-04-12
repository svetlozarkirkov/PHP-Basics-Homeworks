<?php
function printResult($input) {
    if ($input < 100) {
        echo 'no';
    }
    else {
        $foundCounter = 0;
        for ($i = 100; $i <= $input && $i < 1000; $i++) {
            $numToStr = strval($i);
            if ($numToStr[0] != $numToStr[1] && $numToStr[1] != $numToStr[2] && $numToStr[0] != $numToStr[2]) {
                echo $i . "\n";
                $foundCounter++;
            }
        }
        if ($foundCounter === 0) {
            echo 'no';
        }
    }
}
// tests below
printResult(1234);
//printResult(145);
//printResult(15);
//printResult(247);