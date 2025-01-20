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
	    <li>
		      <a href="<?php echo site_url('home/index'); ?>">List of countries</a>
	    </li>
	    <li>
		      <a href="<?php echo site_url('home/createCountry'); ?>">Add a country</a>
        </li>	
	    <li>
		      <a href="<?php echo site_url('home/deleteCountry'); ?>">Delete a country</a>
        </li>
	    <li>
		      <a href="<?php echo site_url('home/createCity'); ?>">Add a city</a>
        </li>
	    <li>
		      <a href="<?php echo site_url('home/deleteCity'); ?>">Delete a city</a>
        </li>
	    <li>
		      <a href="<?php echo site_url('home/getCityByCountry'); ?>">List of cities of a specific country</a>
	    </li>
		<li>
			<a href="<?php echo site_url('home/createHotel'); ?>">Add a hotel</a>
		</li>
		<li>
			<a href="<?php echo site_url('home/deleteHotel'); ?>">Delete a hotel</a>
		</li>
		<li>
			<a href="<?php echo site_url('home/getHotels'); ?>">List of hotels</a>
		</li>		
		<li>
			<a href="<?php echo site_url('home/getHotelsByCountry'); ?>">Hotels of a specific country/city</a>
		</li>
		<li>
            <a href="<?php echo site_url('home/edit'); ?>">Edit</a>
        </li>
      </ul>
    </div>
  </div>
</nav>	
