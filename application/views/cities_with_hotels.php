<?php $this->load->view('header'); ?> 
<h2>Hotels in the country: <?php echo $country['country']; ?></h2>

<!-- комбобокс  городов -->
<form method="post" action="<?php echo site_url('home/getHotelsByCity/'); ?>">
    <label for="cityid">Select a city:</label>
    <select name="cityid" id="cityid" onchange="this.form.submit()">
        <option value="">--Select a city--</option>
        <?php foreach ($cities as $city): ?>
            <option value="<?php echo $city['id']; ?>"><?php echo $city['city']; ?></option>
        <?php endforeach; ?>
    </select>
</form>
<ul>
    <?php foreach ($hotels as $hotel): ?>
        <li><?php echo $hotel['hotel']; ?></li>
    <?php endforeach; ?>
</ul>
