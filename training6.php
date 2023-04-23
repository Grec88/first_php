<?php
//1.Приведите пример запроса и ответа при обращению к веб-серверу https://ya.ru по схеме “Взаимодействие клиента и сервера”. Отправка HTTP-сообщения и Чтение ответа от сервера
// Отправка HTTP-сообщения:

// GET / HTTP/1.1
// Host: ya.ru
// User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:95.0) Gecko/20100101 Firefox/95.0
// Accept: text/html,application/xhtml+xml,application/xml;q=0.9,image/avif,image/webp,*/*;q=0.8
// Accept-Language: ru-RU,ru;q=0.8,en-US;q=0.5,en;q=0.3
// Accept-Encoding: gzip, deflate, br
// Connection: keep-alive
// Upgrade-Insecure-Requests: 1

// Чтение ответа от сервера:

// HTTP/1.1 200 OK
// Server: nginx
// Date: Wed, 15 Dec 2021 14:28:33 GMT
// Content-Type: text/html; charset=UTF-8
// Content-Length: 1234
// Connection: keep-alive
// X-Frame-Options: DENY
// Expires: Thu, 16 Dec 2021 14:28:33 GMT
// Cache-Control: no-cache,no-store,max-age=0,must-revalidate
// P3P: policyref="/w3c/p3p.xml", CP="NON DSP ADM DEV PSD IVDo OUR IND STP PHY PRE NAV UNI"
// Set-Cookie: yandexuid=123456789; Expires=Sat, 13-Dec-2031 14:28:33 GMT; Domain=.ya.ru; Path=/; Secure; SameSite=None

// <!DOCTYPE html>
// <html lang="ru">
// <head>
//     <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
//     <title>Яндекс</title>
//     <!-- ... -->
// </head>
// <body>
//     <!-- ... -->
// </body>
// </html>
//2.Какими способами можно исключить ошибку 500?
/*
Ошибка 500 — это общий код состояния HTTP, который означает, что на стороне сервера произошла непредвиденная ошибка и сервер не может дать более конкретную информацию о проблеме. Это может быть вызвано различными причинами, такими как неправильная конфигурация сервера, ошибки в скриптах, проблемы с ресурсами или базами данных и т.д.
Проверьте файлы .htaccess на вашем сервере. Возможно, в них есть неправильные директивы или синтаксические ошибки, которые вызывают ошибку 500. Вы можете временно переименовать или удалить файл .htaccess и посмотреть, исчезает ли ошибка.
Проверьте права доступа к файлам и папкам на вашем сервере. Возможно, у вас установлены неправильные права доступа (chmod), которые не позволяют серверу читать или исполнять файлы. Вы можете изменить права доступа с помощью FTP-клиента или командной строки.
Проверьте логи ошибок на вашем сервере. Возможно, в них есть более подробная информация о причине ошибки 500. Вы можете посмотреть логи ошибок с помощью панели управления хостингом или командной строки.
Проверьте версию PHP и его расширения на вашем сервере. Возможно, у вас установлена несовместимая или устаревшая версия PHP или его расширений, которые вызывают конфликты или ошибки. Вы можете изменить версию PHP и его расширения с помощью панели управления хостингом или командной строки.
Проверьте работоспособность баз данных на вашем сервере. Возможно, у вас есть проблемы с подключением к базам данных или их повреждением, которые вызывают ошибку 500. */
//3.Используя PHP распарсите следующий URL https://developer.mozilla.org/ru/docs/Web/HTTP/Overview#http_%D1%81%D0%BE%D0%BE%D0%B1%D1%89%D0%B5%D0%BD%D0%B8%D1%8F
// Задаем URL для парсинга
$url = "https://developer.mozilla.org/ru/docs/Web/HTTP/Overview#http_%D1%81%D0%BE%D0%BE%D0%B1%D1%89%D0%B5%D0%BD%D0%B8%D1%8F";

// Парсим URL с помощью функции parse_url()
$parts = parse_url($url);

// Выводим результат на экран
print_r($parts);
//4.Доработайте функцию формирования URL из лекции, так, чтобы можно было указывать порт.
// Дорабатываем функцию формирования URL, добавляя параметр $port
function build_url(string $scheme, string $domain, array $url_path_arr, array $query_param_arr = [], int $port = null):string{
    // Составляем URL из схемы и домена
    $url = $scheme . '://' . $domain;
    // Если указан порт, добавляем его к URL
    if ($port) {
        $url .= ':' . $port;
    }
    // Добавляем путь к URL
    $url .= '/' . implode('/', $url_path_arr);
    // Если есть параметры запроса, добавляем их к URL
    if($query_param_arr) {
        $url .= '?' . http_build_query($query_param_arr);
    }
    // Возвращаем URL
    return $url;
}

// Пример использования функции с указанием порта
echo build_url('https', 'example.com', ['test', 'page'], ['q' => 'php'], 8080);
//5.Сделайте редирект на сайт https://ya.ru/ При помощи отладчика в браузере посмотрите время загрузки страницы, а также сделайте скриншот с заголовками ответа сервера.
// Отправляем заголовок Location с URL для редиректа
header('Location: https://ya.ru/');
// Завершаем работу скрипта
exit;
?>