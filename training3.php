<?php 
header('Content-Type: text/html; charset=utf-8');
/*1.Вам даны три строки с фамилиями разных людей. Составьте и выведите на экран слово из символов в таком порядке:
Третий символ из первой строки.
Второй символ из второй строки.
Четвертый символ из третьей строки.*/
$str1 = "Johnson";
$str2 = "Smith";
$str3 = "Svenson";

$result = $str1[2] . $str2[1] . $str3[3];
echo $result . "<br>";
/*2.Воспользуйтесь конструкцией цикла while(), чтобы вывести на экран величины температур в пределах от -50 до 50 градусов Цельсия. */
$temp = -50;
while ($temp <= 50) {
    echo $temp . " ";
    $temp++;
}
echo "<br>";
/*3.Видоизмените выполнение задания в задании 2, воспользовавшись конструкцией цикла for() вместо конструкции цикла while(). */
for ($temp = -50; $temp <= 50; $temp++) {
    echo $temp . " ";
}
echo "<br>";
/*4.Определите многомерный массив, хранящий местоположение и население перечисленных выше городов. В качестве ключа используйте название города. Результирующий массив должен быть отсортирован по ключам */
$cities = [
    "Нью-Йорк" => ["state" => "Нью-Йорк", "population" => 8175133],
    "Лос-Анджелес" => ["state" => "Калифорния", "population" => 3792621],
    "Чикаго" => ["state" => "Иллинойс", "population" => 2695598],
    "Хьюстон" => ["state" => "Техас", "population" => 2100263],
    "Филадельфия" => ["state" => "Пенсильвания", "population" => 1526006],
    "Феникс" => ["state" => "Аризона", "population" => 1445632],
    "Сан-Антонио" => ["state" => "Техас", "population" => 1327407],
    "Сан-Диего" => ["state" => "Калифорния", "population" => 1307402],
    "Даллас" => ["state" => "Техас", "population" => 1197816],
    "Сан-Хосе" => ["state" => "Калифорния", "population" => 945942]
];

ksort($cities);

foreach ($cities as $city => $data) {
    echo "$city, шт. {$data['state']} ({$data['population']} человек)\n";
}
?>