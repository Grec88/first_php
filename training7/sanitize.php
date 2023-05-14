<?php


function filter_string(string $str): string
{
    $filtered_str = strip_tags($str);
    $filtered_str = htmlspecialchars($filtered_str);

    return $filtered_str;
}

function filter_email(string $email): string
{
    $filtered_email = filter_var($email, FILTER_SANITIZE_EMAIL);
    $filtered_email = filter_var($filtered_email, FILTER_VALIDATE_EMAIL);

    return $filtered_email;
}

const EDUCATION_SCHOOL = 'school';
const EDUCATION_HIGHER = 'higher';
const EDUCATION_OTHER = 'other';
const EDUCATION_ARR = [
    EDUCATION_SCHOOL => 'Среднее',
    EDUCATION_HIGHER => 'Высшее',
    EDUCATION_OTHER => 'Другое'
];

const LANGUAGE_PHP = 'php';
const LANGUAGE_PY = 'python';
const LANGUAGE_GO = 'go';
const LANGUAGE_ARR = [
    LANGUAGE_PHP => 'PHP',
    LANGUAGE_PY => 'Python',
    LANGUAGE_GO => 'GoLang'
];

const MORNING_LEARNING = 'morning';
const DAY_LEARNING = 'day';
const EVENING_LEARNING = 'evening';
const LEARNING_TIME = [
    MORNING_LEARNING => 'Morning, 9:00 - 12:00',
    DAY_LEARNING => 'Day, 12:00 - 17:00',
    EVENING_LEARNING => 'Evening, 17:00 - 21:00'

];