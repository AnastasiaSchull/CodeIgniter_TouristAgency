<?php $this->load->view('header'); ?> 
<h2>Отели в городе: <?php echo $city['city']; ?></h2>
<ul>
    <?php foreach ($hotels as $hotel): ?>
        <li><?php echo $hotel['hotel']; ?> - <?php echo $hotel['stars']; ?> звезд - <?php echo $hotel['cost']; ?>$</li>
    <?php endforeach; ?>
</ul>
