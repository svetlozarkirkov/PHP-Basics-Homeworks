<?php
function printResult($firstNumber, $secondNumber) {
    $sum = number_format((float)round($firstNumber + $secondNumber, 2), 2, '.', '');
    echo '$firstNumber + $secondNumber = ' . $firstNumber . ' + ' . $secondNumber . ' = ' . $sum . "\n";
}
$firstNumber = 2;
$secondNumber = 5;
printResult($firstNumber, $secondNumber);
$firstNumber = 1.567808;
$secondNumber = 0.356;
printResult($firstNumber, $secondNumber);
$firstNumber = 1234.5678;
$secondNumber = 333;
printResult($firstNumber, $secondNumber);