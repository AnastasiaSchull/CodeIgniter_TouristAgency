<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Туристическое агентство</title>
    <link rel="stylesheet" href="<?php echo base_url("assets/css/bootstrap.css"); ?>" />
    <link rel="stylesheet" href="<?php echo base_url('assets/css/style.css'); ?>">
</head>
<body>
<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">

        <?php if ($this->session->userdata('user')): ?>
            <!-- для всех авторизованных пользователей -->
            <li><a href="<?php echo site_url('home/index'); ?>">Список стран</a></li>
            <li><a href="<?php echo site_url('home/getCityByCountry'); ?>">Список городов</a></li>
            <li><a href="<?php echo site_url('home/getHotels'); ?>">Список отелей</a></li>
            <li><a href="<?php echo site_url('home/getHotelsByCountry'); ?>">Отели по стране/городу</a></li>

            <?php if ($this->session->userdata('user')['role'] == 2): ?>
                <!-- ссылки, доступные только администратору , то есть пользователям с ролью==2, устанавливаем роль, например-->
                <!-- UPDATE touristgency.users
                     SET roleid = 2
                     WHERE id = 10; -->

                <li><a href="<?php echo site_url('home/createCountry'); ?>">Добавить страну</a></li>
                <li><a href="<?php echo site_url('home/deleteCountry'); ?>">Удалить страну</a></li>
                <li><a href="<?php echo site_url('home/createCity'); ?>">Добавить город</a></li>
                <li><a href="<?php echo site_url('home/deleteCity'); ?>">Удалить город</a></li>
                <li><a href="<?php echo site_url('home/createHotel'); ?>">Добавить отель</a></li>
                <li><a href="<?php echo site_url('home/deleteHotel'); ?>">Удалить отель</a></li>
                <li><a href="<?php echo site_url('home/edit'); ?>">Редактировать данные</a></li>
            <?php endif; ?>

            <li><a href="<?php echo site_url('user/logout'); ?>">Выход</a></li>
            <li  style="color: white; margin-top: 15px;"  >Привет, <?php echo $this->session->userdata('user')['login']; ?></li>
        <?php else: ?>
            <!-- ссылки для гостей (неавторизованных пользователей) -->
            <li><a href="<?php echo site_url('user/login'); ?>">Войти</a></li>
            <li><a href="<?php echo site_url('user/register'); ?>">Регистрация</a></li>
        <?php endif; ?>

      </ul>
    </div>
  </div>
</nav>
