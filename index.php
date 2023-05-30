<?php
require "sanitize.php";
require "auth.php";

function render_login_form()
{
    ?>
    <form method="post">
        <p>
            <label>Email</label>
            <input type="text" name="email">

            <label>Пароль</label>
            <input type="password" name="password">
        </p>
        <p>
            <input type="submit" value="Войти">
        </p>
    </form>

        <a href="registration.php">Регистрация</a>
    <?php
}


function login(): string
{
    $errors_arr = [];

    $email = array_key_exists('email', $_POST) ? $_POST['email'] : '';
    $filtered_email = filter_email($email);
    if (!$filtered_email) {
        $errors_arr[] = 'Вы не указали Email';
    }

    $password = array_key_exists('password', $_POST) ? $_POST['password'] : '';
    $filtered_password = filter_string($password);
    if (!$filtered_password) {
        $errors_arr[] = 'Вы не указали Пароль';
    }

    $user_id = get_user_id_by_email_and_password($email, $password);
    if (!$user_id) {
        $errors_arr[] = 'Вы указали неправильный email или пароль для входа';
    }

    $content_html = '';

    if ($errors_arr) {
        $content_html .= '<p>';
        $content_html .= implode('<br>', $errors_arr);
        $content_html .= '</p>';

        return $content_html;
    }

    set_user_session_id($user_id);

    $content_html .= 'Вы успешно авторизовались<br>';
    $content_html .= '<a href="training_form.php">Отправить заявку на обучение по программированию</a>';

    return $content_html;
}


// $user_id = get_current_user_id();
// if ($user_id) {
//     header('Location: first_php/training_form.php');
// }
// ?>

<html>

<head>
    <title>
        Portfolio
    </title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="CSS/style.css">
</head>

<body>
    <!-- header start -->
    <header class="header">
        <div class="header__wrapper">
            <nav class="header__nav">
                <ul class="header__menu">
                    <li class="header__menu-item">
                        <a href="" class="header__menu-link">
                            <span class="header__menu-link-home">Home</span>
                        </a>
                    </li>
                    <li class="header__menu-item">
                        <a href="" class="header__menu-link">
                            About me
                        </a>
                    </li>
                    <li class="header__menu-item">
                        <a href="" class="header__menu-link">
                            Skills
                        </a>
                    </li>

                    <li class="header__menu-item">
                        <a href="" class="header__menu-link">
                            Portfolio
                        </a>
                    </li>

                    <li class="header__menu-item">
                        <a href="" class="header__menu-link">
                            Contacts
                        </a>
                    </li>

                </ul>
            </nav>
        </div>
    </header>
    <!-- header end -->
    <main>
        <secction class="info">
            <div class="info__wrapper">
                <div class="info__caption">
                    <h1 class="info__title">
                        Aleksey Likhtinov
                    </h1>
                    <p class="info__desc">
                        Web developer 21 years old, Kursk
                    </p>
                </div>
                <div class="info__pic">
                    <img src="img\icon.jpg" alt="Aleksey Likhtinov" class="info__thumb">
                </div>
            </div>
        </secction>
        <ul>
            <li><a href="training2.php">Второе домашнее задание</a></li>
            <li><a href="training3.php">Третье домашнее задание</a></li>
            <li><a href="training4\training4.php">Четвертое домашнее задание</a></li>
            <li><a href="training5.php">Пятое домашнее задание</a></li>
            <li><a href="training6.php">Шестое домашнее задание</a></li>
            <li><a href="training_form.php">Седьмое домашнее задание</a></li>
            <li><a href="training9.php">Девятое домашнее задание</a></li>
            <li><a href="training11.php">Одинадцатое домашнее задание</a></li>
            <li><a href="color.php">Четырнадцатое домашнее задание</a></li>
            <li><a href="lemon.php">Четырнадцатое домашнее задание отфильтрованная картинка</a></li>
            <li><a href="trapezoid.php">Четырнадцатое домашнее задание трапеция</a></li>
        </ul>
        <?php
        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            echo login();
        } else {
            render_login_form();
        }
        ?>
    </main>
</body>

</html>