<?php

include($_SERVER['DOCUMENT_ROOT'] . "/pages/functions.php");

$username = $_POST['login'] ?? null;
$password = $_POST['password'] ?? null;

if (null !== $username || null !== $password) {

    $download_array = getUsersList();

    if (existsUser($username) && checkPassword($username, $password)) {

        session_start();

        $_SESSION['auth'] = true;
        $_SESSION['login'] = $username;
        $_SESSION['entrytime'] = time();

        header('Location: account.php');
    }
}

?>
<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>SPA-салон "VкаеFFF"</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous" />

    <link rel="stylesheet" href="../css/styles.css" />
</head>

<body>
    <header>
        <nav class="navbar navbar-expand-lg bg-body-tertiary">
            <div class="container-fluid">
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Переключатель навигации">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">

                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="../index.php">Главная</a>
                        </li>
                    </ul>

                    <div class="d-flex justify-content-end">
                        <form action="registration.php" method="POST">
                            <input type="submit" value="Зарегестрироваться" />
                        </form>
                        <form action="login.php" method="POST">
                            <input type="submit" value="Войти" />
                        </form>
                    </div>

                </div>

            </div>
        </nav>
    </header>

    <main>
        <div class="container">
            <h3>Логин и/или пароль неверный</h3>

            <div class="d-flex justify-content-start" id="error">
                <form action="login.php" method="POST">
                    <input type="submit" value="Попробовать ещё раз" />
                </form>
            </div>
        </div>
    </main>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</body>