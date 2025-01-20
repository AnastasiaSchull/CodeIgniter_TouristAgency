<?php $this->load->view('header'); ?> 
<h2>Select a country:</h2>
<form method="post" action="<?php echo site_url('home/getHotelsByCountry'); ?>">
    <label for="countryid">Select a country:</label>
    <select name="countryid" id="countryid" required>
        <option value="" disabled selected>--Select a country--</option>
        <?php foreach ($countries as $country): ?>
            <option value="<?php echo $country['id']; ?>"><?php echo $country['country']; ?></option>
        <?php endforeach; ?>
    </select>
    <button type="submit" class ="btn btn-success" name="send" value="1">Submit</button>
</form>
