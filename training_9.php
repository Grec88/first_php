<?php
// Создаем подключение к базе данных
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "programming_courses";

$conn = new mysqli($servername, $username, $password, $dbname);

// Проверяем подключение
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Подготавливаем запрос
$stmt = $conn->prepare("INSERT INTO programming_languages (language_name, short_language_name) VALUES (?, ?)");
$stmt->bind_param("ss", $language_name, $short_language_name);

// Задаем параметры и выполняем запрос
$language_name = "Ruby";
$short_language_name = "ruby";
$stmt->execute();

echo "New record created successfully";

// Выбираем все записи из таблицы educations
$sql = "SELECT * FROM educations";
$result = $conn->query($sql);

// Выводим элемент формы education с опциями из таблицы educations
echo "<select name='education'>";
while ($row = $result->fetch_assoc()) {
  echo "<option value='" . $row['short_education_name'] . "'>" . $row['education_name'] . "</option>";
}
echo "</select>";

// Закрываем подготовленное выражение и подключение
$stmt->close();
$conn->close();
?>
