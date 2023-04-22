<?php
/*1.В коде программы определены две переменные, содержащие имена компаний. Посчитайте их общую длину в символах и выведите ее на экран. */
$company1 = "Microsoft";
$company2 = "Apple";

$total_length = strlen($company1) + strlen($company2);
echo $total_length . "<br>";
/* 2.Округлите число, записанное в переменную $number, до двух знаков после запятой и выведите результат на экран.*/
$number = 3.14159;
$rounded_number = round($number, 2);
echo $rounded_number . "<br>";
/*3.Напишите функцию, которая будет из себя представлять мини-калькулятор. В данном калькулятор можно будет выполнить простые действия с двумя целыми числами. В качестве аргументов данная функция должна принимать три параметра: */
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

echo calculator(3, 4) . "<br>"; // выводит 7
echo calculator(3, 4, "-") . "<br>"; // выводит -1
/* 5.В PHP есть функция sprintf(). Самостоятельно изучите ее на https://www.php.net/manual/ru/function.sprintf.php. Выведите при помощи данной функции переменную, которая:*/
$num = 3.14;
$str = "Привет";

echo sprintf("Число: %f\n", $num);
echo sprintf("Строка: %s\n", $str);
?>
<html>
    <br></br>
<a href="main.php">Ссылка на файл с калькулятором</a>
</html>