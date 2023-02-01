<?php
session_start();

// подключаем файл с функциями
include($_SERVER['DOCUMENT_ROOT'] . "/pages/functions.php");

// присваиваем информацию о наличии либо осутствии авторизации в переменную
$auth = $_SESSION['auth'] ?? null;

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>ВкаеФ</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous" />

    <link rel="stylesheet" href="css/styles.css" />
</head>

<body>
    <header>
        <nav class="navbar navbar-expand-lg bg-body-tertiary">
            <div class="container-fluid">
               
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Переключатель навигации">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">

                    <?php
                    if (!$auth) {
                    ?>

                        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                            <li class="nav-item">
                                <a class="nav-link active" aria-current="page" href="index.php">Главная</a>
                            </li>
                        </ul>

                        <div class="d-flex justify-content-end">
                            <form action="pages/registration.php" method="POST">
                                <input type="submit" value="Зарегестрироваться" />
                            </form>
                            <form action="pages/login.php" method="POST">
                                <input type="submit" value="Войти" />
                            </form>
                        </div>

                    <?php
                    } ?>

                    <?php
                    if ($auth) { 
                        $user_name = getCurrentUser();
                    ?>

                        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                            <li class="nav-item">
                                <a class="nav-link active" aria-current="page" href="index.php">Главная</a>
                            </li>

                        </ul>

                        <div class="d-flex justify-content-end ">
                            <div class="d-flex justify-content-space-beetwen" id="username">
                                <?php
                                echo $user_name;
                                ?>
                            </div>

                            <form action="pages/account.php" method="POST">
                                <input type="submit" value="Личный кабинет" />
                            </form>

                            <form action="pages/clear-session.php" method="POST">
                                <input type="submit" value="Выйти" />
                            </form>
                        </div>

                    <?php
                    } ?>

                </div>
            </div>
        </nav>
        <div class="d-flex justify-content-center" id="site-name">
            <a href="index.php">
                <h1>SPA-салон "VкаеFFF"</h1>
            </a>
        </div>
    </header>

    <main>

        <div>
            <img src="img/6929238_2547.jpg" alt="" width="1349vw" >
        </div>

        <div class="container">
            <h1>Для вашей половинки</h1>
            <p>
            В любое время года и в любой ситуации ваша избранница хотела бы отдохнуть душой и телом. 
            Подарочный сертификат для женщин в спа станет прекрасным поводом отправиться в салон для приятного времяпрепровождения. 
            Предлагаемые услуги позволят погрузиться в атмосферу тишины и релаксации. Такой отдых станет незабываемым. 
            Наша компания предлагает посетить сеть салонов в Санкт-Петербурге. Преподнеся подарочный сертификат spa женщине вашего сердца,
             вы сможете подарить ей радость отдыха в любое время года и при любой погоде за окном.
            </p>
        </div>
    </main>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</body>

</html>