<?php
function calculator($num1, $num2, $operand = "+") {
    switch ($operand) {
        case "+":
            return $num1 + $num2;
        case "-":
            return $num1 - $num2;
        case "*":
            return $num1 * $num2;
        case ":":
            return $num1 / $num2;
        default:
            return "Неверный операнд";
    }
}
?>