<?php $this->load->view('header'); ?> 
<h2>Выберите страну:</h2>
<form method="post" action="<?php echo site_url('home/getHotelsByCountry'); ?>">
    <label for="countryid">Выберите страну:</label>
    <select name="countryid" id="countryid" required>
        <option value="" disabled selected>--Выберите страну--</option>
        <?php foreach ($countries as $country): ?>
            <option value="<?php echo $country['id']; ?>"><?php echo $country['country']; ?></option>
        <?php endforeach; ?>
    </select>
    <button type="submit" name="send" value="1">Отправить</button>
</form>
