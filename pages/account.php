<?php
session_start();
$auth = $_SESSION['auth'] ?? null;

include($_SERVER['DOCUMENT_ROOT'] . "/pages/functions.php");
if (!$auth) {
    header('Location: ../index.php');
} else $user_name = $_SESSION['login'];

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title> VкаеFFF</title>

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

                    <div class="d-flex justify-content-end ">
                        <div class="d-flex justify-content-center" id="username">
                            <?php
                            echo $user_name;
                            ?>
                        </div>
                        <form action="clear-session.php" method="POST">
                            <input type="submit" value="Выйти" />
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
            <h3>Личный кабинет </h3>
            <h5>Добро пожаловать
                <?php
                echo $user_name . '.' . "\n";
                getUserBirthday();
                ?>

            </h5>
            <h5>
                <?php
                getPromotionTime();
                ?>
            </h5>

        </div>
        <h5 class="d-flex justify-content-center">Подарите незабываемые ощущения вашей второй половинке.Закажите подарочный сертификат</h5>
        <div class="grid text-center" style="margin-top:25px">
        <img class="rounded float-end"  src="../img/5469064.jpg"  width="500px">
        <div  style="width: 42rem;" class=" align-items-center">
<p >Подарочный сертификат «ПарПалас» - это отличный способ порадовать как самого близкого человека, 
    так и просто знакомого, важного партнера,
     начальника или коллегу. Став отличной альтернативой при выборе подарка, наш сертификат избавляет Вас от лишних сомнений и мучительных очередей.
      Выбирая наш сертификат, Вы дарите не денежную сумму, а незабываемые эмоции и ощущения.
       Широкий спектр наших услуг помогает выбрать подходящий комплекс процедур, как для мужчины, так и для женщины. 
       Наши внимательные администраторы и специалисты всегда с радостью помогут Вам сделать правильный выбор.
        Каждая подарочная карта является эксклюзивной,
     благодаря персональному нанесению имени или поздравления.</p>
     <p><b>3200 </b> Rub</p>
     </div>
        </div>
        
        <img class="rounded float-start"  src="../img/13454987_5263689.jpg"  width="800px" style="margin-top:20px">
        <p style="margin-top:200px;" class=" align-items-center" >Первая процедура комплекса — тщательное очищение кожи лица от отмерших клеток, секрета сальных желез и внешних загрязнений. 
            Первым делом используется мицеллярная вода, затем пенка или гель для умывания. 
            Каждое средство подбирается под вашу кожу.</p>
     <p><b>3300 </b> Rub</p>

     <img class="rounded float-end"  src="../img/13454987_5263689.jpg"  width="800px" style="margin-top:20px">
        <p style="margin-top:500px;" class=" align-items-center" >Самые выгодные цены вы получаете, приобретая абонементы! 
        Массаж 60 мин - 10 визитов на месяц
         = 29 900 руб Массаж 90 мин - 10 визитов на месяц = 39 900 руб Депозит безлимит на 6 месяцев +15% 
        к сумме от 20 000 руб +20% к сумме от 50 000 руб Абонемент безлимит на 5 процедур = -15% от базовой стоимости</p>
     </div>
        </div>

    </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</body>

</html>