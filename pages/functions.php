<?php
function getUsersList()
{
    $users_array = json_decode(file_get_contents($_SERVER["DOCUMENT_ROOT"] . '/pages/users.txt'), true);
    return $users_array;
}
function existsUser($login)
{
    $users = getUsersList();
    $flag = false;

    foreach ($users as $key => $value) {
        if ($key === $login) {
            $flag = true;
            break;
        }
    }

    return $flag;
}
function checkPassword($login, $password)
{
    $users = getUsersList();
    return (existsUser($login) && sha1($password) === $users[$login]['password']) ? true : false;
}

function getCurrentUser()
{
    session_start();

    if ($_SESSION && $_SESSION['login']) {
        return $_SESSION['login'];
    } else return null;
}

function getPromotionTime()
{
    $login_time = $_SESSION['entrytime'];

    $target_date = $login_time + 86400;

    $time_left = $target_date - time();
    $time_left_check = $time_left;
    $hours = floor($time_left / (60 * 60));
    $time_left %= (60 * 60);
    $min = floor($time_left / 60);
    $time_left %= 60;

    $sec = $time_left;
    $discount = '7%';
    if (checkBirthday()) {
        $discount = '50%';
    }
    
    if ($time_left_check <= 0) {
        echo 'Скидка сгорела';
    } else {
        echo "У вас персональная скидка - $discount.<br>";
        echo "До окончании акции осталось $hours ч. $min м. $sec с.";
    }
}

function checkPromotionTime()
{
  
    $login_time = $_SESSION['entrytime'];
    $target_date = $login_time + 86400;
    $time_left = $target_date - time();

    if ($time_left > 0) {
        return true;
    } else return false;
}

function getUserBirthday()
{
    $users = getUsersList();
    $login = getCurrentUser();
    $user_birthday = $users[$login]['birthday'];
    $birthday = mb_substr($user_birthday, 5);
    $today = date('m\-d');
    $year = date('o');
    if ($today === $birthday) {
        echo "С днём рождения!";
    } else {
        $birthday_unix = strtotime("$year-$birthday 00:00:00+0400");
        $today_unix = strtotime("$year-$today 00:00:00+0400");
        $time_left = ($birthday_unix - $today_unix) / (60 * 60 * 24);

        if ($time_left < 0) {
            $time_left = 365 - -$time_left;
            echo "До вашего дня рождения осталось $time_left д.";
        } else echo "До вашего дня рождения осталось $time_left д.";
    }
}

function checkBirthday()
{
    $users = getUsersList();
    $login = getCurrentUser();
    $user_birthday = $users[$login]['birthday'];
    $birthday = mb_substr($user_birthday, 5);
    $today = date('m\-d');

    if ($today === $birthday) {
        return true;
    } else return false;
}

function getDiscound($price)
{
    if (checkBirthday()) {
        return $price * 0.9;
    } else return $price * 0.95;
}
