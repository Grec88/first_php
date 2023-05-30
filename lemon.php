<?php
// загрузить изображение из файла
$image1 = imagecreatefromjpeg("lemon.jpg");

// применить фильтр размытия по Гауссу
imagefilter($image1, IMG_FILTER_GAUSSIAN_BLUR);

// применить фильтр пикселизации с размером блока 5 пикселей
imagefilter($image1, IMG_FILTER_PIXELATE, 5);

// вывести результат на экран
header("Content-type: image/jpeg");
imagejpeg($image1);

//освободить память
imagedestroy($image1);
?>