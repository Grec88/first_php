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
$stmt->close();
$conn->close();

// Определяем функцию для постраничного вывода данных
function paginate($page, $limit)
{
  // Создаем подключение к базе данных
  $servername = "localhost";
  $username = "root";
  $password = "";
  $dbname = "my_database";

  $conn = new mysqli($servername, $username, $password, $dbname);

  // Проверяем подключение
  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }

  // Вычисляем смещение для запроса SELECT ... LIMIT
  $offset = ($page - 1) * $limit;

  // Выбираем записи из таблицы request_for_traning с ограничением по количеству и смещению
  $sql = "SELECT * FROM request_for_traning LIMIT $offset, $limit";
  $result = $conn->query($sql);

  // Выводим данные в виде таблицы
  echo "<table border='1'>";
  echo "<tr><th>id</th><th>username</th><th>email</th><th>language</th><th>education</th></tr>";
  while ($row = $result->fetch_assoc()) {
    echo "<tr>";
    echo "<td>" . $row['id'] . "</td>";
    echo "<td>" . $row['username'] . "</td>";
    echo "<td>" . $row['email'] . "</td>";
    echo "<td>" . $row['education_id'];
  }
  $conn->close();
}


  // Закрываем подготовленное выражение и подключение

  ?>