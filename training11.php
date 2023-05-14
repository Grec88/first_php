<?php

//1.Создайте средствами php новый файл "programming_languages.csv". 
// В этом файле должно быть три колонки: идентификатор, название языка 
// программирования и краткое название. Запишите туда три строки с 
// разными языками программирования, причем один из языков должен быть PHP.
// Открываем файл для записи
$fp = fopen("programming_languages.csv", "w");

// Задаем заголовки для колонок
fputcsv($fp, array("id", "name", "short_name"));

// Задаем данные для строк
fputcsv($fp, array(1, "PHP", "php"));
fputcsv($fp, array(2, "Python", "py"));
fputcsv($fp, array(3, "Java", "java"));

// Закрываем файл
fclose($fp);

// 2.	Выведите идентификатор языка программирования из 
// файла "programming_languages.csv" для строки, где 
// краткое название равно "php".

// Открываем файл для чтения
$fp = fopen("programming_languages.csv", "r");

// Пропускаем первую строку с заголовками
fgetcsv($fp);

// Читаем остальные строки по одной
while ($row = fgetcsv($fp)) {
  // Проверяем, равно ли краткое название "php"
  if ($row[2] == "php") {
    // Выводим идентификатор языка программирования
    echo $row[0];
    // Прерываем цикл
    break;
  }
}

// Закрываем файл
fclose($fp);

// 3.	Прочитайте и выведите в консоль содержимое URL страницы http://localhost/training_form.php.

// Задаем URL страницы
$url = "http://localhost/first_php/training_form.php";

// Получаем содержимое страницы с помощью функции file_get_contents
$content = file_get_contents($url);

// Выводим содержимое в консоль с помощью функции echo
echo $content;

// 4.	Удалите вторую строку из файла "programming_languages.csv".

// Открываем файл для чтения
$fp = fopen("programming_languages.csv", "r");

// Создаем пустой массив для хранения данных из файла
$data = array();

// Читаем первую строку с заголовками и добавляем ее в массив
$data[] = fgetcsv($fp);

// Читаем остальные строки по одной и добавляем их в массив, кроме второй строки
$row_number = 1;
while ($row = fgetcsv($fp)) {
  $row_number++;
  if ($row_number != 2) {
    $data[] = $row;
  }
}

// Закрываем файл
fclose($fp);

// Открываем файл для записи
$fp = fopen("programming_languages.csv", "w");

// Записываем данные из массива в файл по одной строке
foreach ($data as $row) {
  fputcsv($fp, $row);
}

// Закрываем файл
fclose($fp);
?>