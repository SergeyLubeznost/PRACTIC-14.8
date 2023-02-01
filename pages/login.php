<?php

session_start();
$auth = $_SESSION['auth'] ?? null;

if ($auth) {
    header('Location: ../index.php');
}

if (!is_file('users.txt')) {
    $reg_time = time();
    $example_user = ['user1' => ['birthday' => '1987-02-01', 'password' => sha1('user1'), 'regtime' => $reg_time]];

    file_put_contents('users.txt', json_encode($example_user, true));
}
?>

<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>ВкаеФ</title>

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
        <div class="d-flex justify-content-center" id="site-name">
            <a href="../index.php">
                <h1>SPA-салон "VкаеFFF"</h1>
            </a>
        </div>
    </header>

    <main>
        <div class="container">
            <h3>Войти в личный кабинет</h3>
            <form action="process.php" method="post">
                <input name="login" type="text" placeholder="Логин" required /> <br />
                <input name="password" type="password" placeholder="Пароль" required />
                <br />
                <input type="submit" value="Войти" />
            </form>
            <form action="registration.php" method="POST" id="error">
                <input type="submit" value="Зарегестрироваться" />
            </form>
        </div>
    </main>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</body>

</html>