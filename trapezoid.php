<?php
// вывести изображение на экран
header("Content-type: image/png");

// создать изображение с размерами 300 на 200 пикселей
$image = imagecreatetruecolor(300, 200);

// определить цвет фона белым
$white = imagecolorallocate($image, 255, 255, 255);

// заливить фон белым цветом
imagefill($image, 0, 0, $white);

// определить цвет зеленым
$green = imagecolorallocate($image, 0, 255, 0);

// определить массив с координатами вершин трапеции
$points = array(
 50, 50, // верхний левый угол
 250, 50, // верхний правый угол
 200, 150, // нижний правый угол
 100, 150 // нижний левый угол
);

// нарисовать зеленую трапецию
imagepolygon($image, $points, $green);

imagepng($image);
imagedestroy($image);
?>