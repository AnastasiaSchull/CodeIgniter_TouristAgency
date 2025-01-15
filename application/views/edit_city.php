<?php $this->load->view('header'); ?>
<h2>Редактировать город</h2>
<?php echo form_open('home/updateCity'); ?>
    <label for="cityid">Выберите город:</label>
    <select name="cityid">
        <?php foreach ($cities as $city): ?>
            <option value="<?php echo $city['id']; ?>"><?php echo $city['city']; ?></option>
        <?php endforeach; ?>
    </select>
    <label for="cityName">Новое название:</label>
    <input type="text" name="cityName" required>
    <button type="submit">Обновить</button>
<?php echo form_close(); ?>
<?php $this->load->view('footer'); ?>
