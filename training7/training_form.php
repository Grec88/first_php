<?php
require "sanitize.php";

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
$stmt = $conn->prepare("INSERT INTO educations (education_name, short_education_name) VALUES (?, ?)");
$stmt->bind_param("ss", $education_name, $short_education_name);

// Задаем параметры и выполняем запрос
$data = array(
    array("Среднее", "среднее"),
    array("Высшее", "высшее"),
    array("Другое", "другое")
);

foreach ($data as $row) {
    $education_name = $row[0];
    $short_education_name = $row[1];
    $stmt->execute();
}

echo "New records created successfully";

$sql = "SELECT * FROM educations";
$result = $conn->query($sql);


function render_form()
{
    ?>
    <form action="" method="post" name="training_form">
        <p>
            <input type="text" name="username" size="100" maxlength="100" placeholder="Представьтесь пожалуйста" required>
        </p>

        <p>
            <input type="text" name="email" size="100" maxlength="50" placeholder="Введите Email" required>
        </p>

        <p>
            <b>Образование:</b><br>
            <?php
            $servername = "localhost";
            $username = "root";
            $password = "root";
            $dbname = "programming_courses";
            
            $conn = new mysqli($servername, $username, $password, $dbname);
            $sql = "SELECT * FROM educations";
            $result = $conn->query($sql);
            while ($row = $result->fetch_assoc()) {
                echo '<label>' . $row['short_education_name'] . ' <input type="radio" name="education" value="' . $row['education_name'] . '" ></label>';
            }
            ?>
        </p>

        <p>
            <b>Язык программирования:</b><br>
            <?php
            foreach (LANGUAGE_ARR as $language => $language_title) {
                echo '<label>' . $language_title . ' <input type="radio" name="languages[]" value="' . $language . '"></label>';
            }
            ?>
        </p>

        <p>
            <b>Язык программирования:</b><br>
            <?php
            foreach (LEARNING_TIME as $time => $part_of_the_day) {
                echo '<label>' . $part_of_the_day . ' <input type="radio" name="time_for_learning" value="' . $time . '"></label>';
            }
            ?>
        </p>

        <p>
            <b>Немного о себе:</b><br>
            <textarea name="about_me" cols="80" rows="10"></textarea>
        </p>

        <p>
            <input type="submit" value="Отправить заявку">
        </p>
    </form>
    <?php
}
?>
<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="utf-8">
    <title>Заявка на обучение по программированию</title>
</head>

<body>
    <h1>Заявка на обучение по программированию</h1>

    <?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $username = array_key_exists('username', $_POST) ? $_POST['username'] : '';
        $filtered_username = filter_string($username);

        $email = array_key_exists('email', $_POST) ? $_POST['email'] : '';
        $filtered_email = filter_email($email);

        $education = array_key_exists('education', $_POST) ? $_POST['education'] : '';
        $filtered_education = filter_string($education);

        $languages_arr = array_key_exists('languages', $_POST) ? $_POST['languages'] : [];

        $filtered_languages_arr = [];
        foreach ($languages_arr as $language) {
            $filtered_language = filter_string($language);
            if (!$filtered_language) {
                continue;
            }
            if (!array_key_exists($filtered_language, LANGUAGE_ARR)) {
                continue;
            }

            $filtered_languages_arr[] = $filtered_language;
        }

        $time_for_learning = array_key_exists('time_for_learning', $_POST) ? $_POST['time_for_learning'] : '';
        $filtered_time_for_learning = filter_string($time_for_learning);

        $about_me = array_key_exists('about_me', $_POST) ? $_POST['about_me'] : '';
        $filtered_about_me = filter_string($about_me);

        $errors_arr = [];

        if (!$filtered_username) {
            $errors_arr[] = 'Вы не указали свое имя';
        }

        if (!$filtered_email) {
            $errors_arr[] = 'Вы не указали свой email';
        }


        if (count($filtered_languages_arr) != count($languages_arr)) {
            $errors_arr[] = 'Некорректно указан язык программирования';
        }

        if (!array_key_exists($filtered_time_for_learning, LEARNING_TIME)) {
            $errors_arr[] = 'Вы не выбрали время обучения';
        }


        if (!$errors_arr) {
            echo '<h2>' . $filtered_username . ', Ваша заявка на обучение принята, спасибо!</h2>';
        } else {
            echo '<p>';
            echo implode('<br>', $errors_arr);
            echo '</p>';
        }
    } else {
        render_form();
    }

    $stmt->close();
    $conn->close();
    ?>


</body>

</html>