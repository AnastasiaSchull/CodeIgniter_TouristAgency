<?php $this->load->view('header'); ?>
<h2>Edit City</h2>
<?php echo form_open('home/updateCity'); ?>
    <label for="cityid">Select a City:</label>
    <select name="cityid">
        <?php foreach ($cities as $city): ?>
            <option value="<?php echo $city['id']; ?>"><?php echo $city['city']; ?></option>
        <?php endforeach; ?>
    </select>
    <label for="cityName">New Name:</label>
    <input type="text" name="cityName" required>
    <button type="submit"  class ="btn btn-success">Update</button>
<?php echo form_close(); ?>
<?php $this->load->view('footer'); ?>
