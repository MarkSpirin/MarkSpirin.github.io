﻿<?php
if (isset($_POST['login'])) { $login = $_POST['login']; if ($login == '') { unset($login);} } //заносим введенный пользователем логин в переменную $login, если он пустой, то уничтожаем переменную
if (isset($_POST['password'])) { $password=$_POST['password']; if ($password =='') { unset($password);} }

if (isset($_POST['email'])) { $email=$_POST['email']; if ($email =='') { unset($email);} }
//заносим введенный пользователем пароль в переменную $password, если он пустой, то уничтожаем переменную

if (empty($login) or empty($password) or empty($email)) //если пользователь не ввел логин или пароль, то выдаем ошибку и останавливаем скрипт
{
exit ("Вы ввели не всю информацию, венитесь назад и заполните все поля!");
}
//если логин и пароль введены,то обрабатываем их, чтобы теги и скрипты не работали, мало ли что люди могут ввести
$login = stripslashes($login);
$login = htmlspecialchars($login);

$password = stripslashes($password);
$password = htmlspecialchars($password);

$email = stripslashes($email);
$email = htmlspecialchars($email);

//удаляем лишние пробелы
$login = trim($login);
$password = trim($password);
$email = trim($email);


// подключаемся к базе
include ("bd.php");// файл bd.php должен быть в той же папке, что и все остальные, если это не так, то просто измените путь 

// проверка на существование пользователя с таким же логином
$result = mysql_query("SELECT id FROM users WHERE login='$login'",$db);
$myrow = mysql_fetch_array($result);
if (!empty($myrow['id'])) {
exit ("Извините, введённый вами логин уже зарегистрирован. Введите другой логин.");
}

// если такого нет, то сохраняем данные
$result2 = mysql_query ("INSERT INTO users (login,password,email) VALUES('$login','$password', '$email')");
// Проверяем, есть ли ошибки
if ($result2=='TRUE')
{
echo "Вы успешно зарегистрированы!. <a href='index.html'>Главная страница</a>";
}

else {
echo "Ошибка! Вы не зарегистрированы.";
     }
?>
<!DOCTYPE html>
<html lang="ru">
  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title> Мастерская автозвука «SoundPark» г.Чита</title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
    

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
   <body>
<header>
      <div class="container">
        <div class="row">
          <div class="col-sm-4 logotype">
            <img src="img/logo.png" alt="Логотип «SoundPark»" class="img-responsive">
          </div>
          <div class="col-sm-4 text-center descript">
            <h4>Мастерская автозвука «SoundPark»</h4>
            <h5>Город Чита</h5>
          </div>
          <div class="col-sm-4 phone_number">
            <h3><a href="tel:+79144421230">8 (914) 442-12-30</a></h3>
            <p>Режим работы с 9<sup>00</sup> до 20<sup>00</sup></p>
          </div>
        </div>
      </div>
  </header>
<!---<nav id="top_nav">
      <div class="container">
        <div class="row">
           <ul class="list-inline">
            <a href="index.html#main">
              <li>Главная</li>
            </a>
            <a href="index.html#types">
              <li>Услуги</li>
            </a>
            <a href="index.html#portfolio">
              <li>Наши работы</li>
            </a>
            <a href="index.html#offer">
              <li>Акция</li>
            </a>
            <a href="index.html#feedback">
              <li>Отзывы</li>
            </a>
            <a href="index.html#contacts">
              <li>Контакты</li>
            </a>
           
          </ul>
        </div>
      </div>
</nav>-->

<section id="main">
       <div class="container">
         <div class="row main_header">
           <h1><span>Профессиональный автозвук от «SoundPark» </span><br><span>Спасибо что обратились к нам</span></h1>
         </div>
        <div class="row">
          <h3> Спасибо за<span> регистрацию!</span></h3>
        </div>
        <div class="row main_buttons">
       
        <a href="index.html"><button id="ask">На главную</button></a>
        <a href="index.html#portfolio"><button id="info_masters">Наши работы</button></a>
        </div>
       </div>
</section>

<footer id="contacts">
  <div class="container">
    <div class="row">
      <div class="col-md-5 col-md-offset-1">
        <div class="map">
          <script type="text/javascript" charset="utf-8" async src="https://api-maps.yandex.ru/services/constructor/1.0/js/?um=constructor%3A8761d1d94b69326c3ccc40f6fe48a8d242f5371c59e2cf1ff7c44e18a87710d2&amp;width=400&amp;height=329&amp;lang=ru_RU&amp;scroll=true"></script>
        </div>
      </div>
      <div class="col-md-6">
        <h2>Контакты</h2>
      <div class="row">
          <address>
          <p id="address">
            Адресс:
          </p>
          <p id="chita">
            Чита, ул. Селенгинская 3
          </p>
        </address>
      </div>
       <div class="row">
         <div class="phone_footer">
         <p id="phone_footer">
           Телефон:
         </p>
         <p id="number">
           +7 (914) 442-12-30
         </p>
       </div>
       </div>
       <div class="row social">
       <div class="social_icon">
         <a href=""><img src="img/vk.png" alt="Вконтакте"></a>
       </div>
         <div class="social_icon">
           <a href=""><img src="img/insta.png" alt="Инстаграм"></a>
         </div>
         
         <button id="get_answer" data-toggle="modal" href="#get_question_footer">Задать вопрос</button>
       </div>
      </div>
    </div>
    <div class="row details_row">
      <div class="col-md-4 details">
      <h5>ИП "АвтоСаунд"</h5>
        <p>ОГРН 312312312312
        <br>
        ИНН 231231424124
        </p>
      </div>
      <div class="col-md-4 policy">
        <a data-toggle="modal" href="#">Политика конфиденциальности</a>
        <br>
        <p>Чита, 2016-2018</p>
      </div>
      <div class="col-md-4 stramilov">
        <h4>Сайт разработан:</h4>
        <a href="https://vk.com/id0">Александр.С</a>
      </div>
    </div>
  </div>
</footer>
  
</body>
</html>