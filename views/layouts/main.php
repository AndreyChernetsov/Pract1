<!doctype html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport"
         content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
   <meta http-equiv="X-UA-Compatible" content="ie=edge">
   <title>PRAC1</title>
</head>
<body>
<header>
    <h1>Внутренняя телефонная связь</h1>
   <nav>
       <?php
       if (!app()->auth::check()):
           ?>
           <a href="<?= app()->route->getUrl('/login') ?>">Вход</a>
           <a href="<?= app()->route->getUrl('/signup') ?>">Регистрация</a>
       <?php
       else:
           ?>
            <a href="<?= app()->route->getUrl('/hello') ?>">Главная</a>
            <a href="<?= app()->route->getUrl('/addsubscribers') ?>">Добавить абонента</a>
            <a href="<?= app()->route->getUrl('/addphone') ?>">Добавить телефон</a>
            <a href="<?= app()->route->getUrl('/subphone') ?>">Прикрепить абонента к номеру телефона</a>
            <a href="<?= app()->route->getUrl('/addroom') ?>">Добавить помещение</a>
            <a href="<?= app()->route->getUrl('/adddepartment') ?>">Добавить подразделение</a>
            <a href="<?= app()->route->getUrl('/logout') ?>">Выход "<?= app()->auth::user()->login ?>"</a>
       <?php
       endif;
       ?>
   </nav>
</header>
<main>
   <?= $content ?? '' ?>
</main>

</body>
</html>