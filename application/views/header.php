<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Туристическое агенство</title>
	<link rel="stylesheet" href="<?php echo base_url("assets/css/bootstrap.css"); ?>" />
	<link rel="stylesheet" href="<?php echo base_url('assets/css/style.css'); ?>">

</head>
<body>
<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
	    <li>
		      <a href="<?php echo site_url('home/index'); ?>">Список стран</a>
	    </li>
	    <li>
		      <a href="<?php echo site_url('home/createCountry'); ?>">Добавить страну</a>
        </li>	
	    <li>
		      <a href="<?php echo site_url('home/deleteCountry'); ?>">Удалить страну</a>
        </li>
	    <li>
		      <a href="<?php echo site_url('home/createCity'); ?>">Добавить город</a>
        </li>
	    <li>
		      <a href="<?php echo site_url('home/deleteCity'); ?>">Удалить город</a>
        </li>
	    <li>
		      <a href="<?php echo site_url('home/getCityByCountry'); ?>">Список городов конкретной страны</a>
	    </li>
		<li>
			<a href="<?php echo site_url('home/createHotel'); ?>">Добавить отель</a>
		</li>
		<li>
			<a href="<?php echo site_url('home/deleteHotel'); ?>">Удалить отель</a>
		</li>
		<li>
			<a href="<?php echo site_url('home/getHotels'); ?>">Список отелей</a>
		</li>

      </ul>
    </div>
  </div>
</nav>	
