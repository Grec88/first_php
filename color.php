<?php
// загрузить изображение из файла
$image = imagecreatefrompng("training14_2_elephant.png");

// выбрать две точки с координатами x и y
$x1 = 100;
$y1 = 50;
$x2 = 200;
$y2 = 150;

// получить индекс цвета для каждой точки
$color_index1 = imagecolorat($image, $x1, $y1);
$color_index2 = imagecolorat($image, $x2, $y2);

// получить массив с компонентами цвета для каждой точки
$color_array1 = imagecolorsforindex($image, $color_index1);
$color_array2 = imagecolorsforindex($image, $color_index2);

// вывести результаты на экран
echo "Цвет в точке ($x1, $y1) имеет следующие компоненты:\n";
print_r($color_array1);
echo "Цвет в точке ($x2, $y2) имеет следующие компоненты:\n";
print_r($color_array2);

?>

