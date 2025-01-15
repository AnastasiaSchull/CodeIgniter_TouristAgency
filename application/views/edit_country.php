<?php $this->load->view('header'); ?>

<h2>Редактировать страну</h2>
<form method="post" action="<?php echo site_url('home/updateCountry'); ?>">
    <label for="countryid">Выберите страну:</label>
    <select name="countryid">
        <?php foreach ($countries as $country): ?>
            <option value="<?php echo $country['id']; ?>"><?php echo $country['country']; ?></option>
        <?php endforeach; ?>
    </select>
    <label for="countryName">Новое название:</label>
    <input type="text" name="countryName">
    <button type="submit">Сохранить</button>
</form>

<?php $this->load->view('footer'); ?>
