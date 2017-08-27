<?php
//Принимаем постовые данные
$name=$_POST['name'];
$phone=$_POST['phone'];
$what=$_POST['what'];
//Тут указываем на какой ящик послать письмо
$to = "markspirin@outlook.com";
//далее идет само сообщение
$subject = "Заявка с сайта HORNET TATTOO";
$message = "
Письмо отправлено из моей формы.<br />
Пользователь хочет: ".htmlspecialchars($what)."<br />
Имя: ".htmlspecialchars($name)."<br />
Телефон: ".htmlspecialchars($phone).
$headers = "From: hornet-tattoo.ru <site-email@mystile.ru>\r\nContent-type: text/html; charset=UTF-8 \r\n";
mail ($to, $subject, $message, $headers);
header('Location: thanks.html');
exit();
?>
