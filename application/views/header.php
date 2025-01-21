<?php
// Устанавливаем кодировку
header('Content-Type: text/html; charset=UTF-8');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Tourist Agency</title>
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
            <li><a href="<?php echo site_url('home/index'); ?>">List of countries</a></li>
            <li><a href="<?php echo site_url('home/getCityByCountry'); ?>">List of cities</a></li>
            <li><a href="<?php echo site_url('home/getHotels'); ?>">List of hotels</a></li>
            <li><a href="<?php echo site_url('home/getHotelsByCountry'); ?>">Hotels by country/city</a></li>
            <li><a href="<?php echo site_url('home/addComment'); ?>">Leave a Comment</a></li>

            <?php if ($this->session->userdata('user')['role'] == 2): ?>
                <!-- ссылки, доступные только администратору , то есть пользователям с ролью==2, устанавливаем роль, например-->
                <!-- UPDATE touristgency.users
                     SET roleid = 2
                     WHERE id = 10; -->

                <li><a href="<?php echo site_url('home/createCountry'); ?>">Add a country</a></li>
                <li><a href="<?php echo site_url('home/deleteCountry'); ?>">Delete a country</a></li>
                <li><a href="<?php echo site_url('home/createCity'); ?>">Add a city</a></li>
                <li><a href="<?php echo site_url('home/deleteCity'); ?>">Delete a city</a></li>
                <li><a href="<?php echo site_url('home/createHotel'); ?>">Add a hotel</a></li>
                <li><a href="<?php echo site_url('home/deleteHotel'); ?>">Delete a hotel</a></li>
                <li><a href="<?php echo site_url('home/edit'); ?>">Edit data</a></li>
            <?php endif; ?>

            <li><a href="<?php echo site_url('user/logout'); ?>">Logout</a></li>
            <li  style="color: white; margin-top: 15px;"  >Hello, <?php echo $this->session->userdata('user')['login']; ?></li>
        <?php else: ?>
            <!-- ссылки для гостей (неавторизованных пользователей) -->
            <li><a href="<?php echo site_url('user/login'); ?>">Login</a></li>
            <li><a href="<?php echo site_url('user/register'); ?>">Register</a></li>
        <?php endif; ?>

      </ul>
    </div>
  </div>
</nav>
