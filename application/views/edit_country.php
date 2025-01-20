<?php $this->load->view('header'); ?>

<h2>Edit Country</h2>
<form method="post" action="<?php echo site_url('home/updateCountry'); ?>">
    <label for="countryid">Select a Country:</label>
    <select name="countryid">
        <?php foreach ($countries as $country): ?>
            <option value="<?php echo $country['id']; ?>"><?php echo $country['country']; ?></option>
        <?php endforeach; ?>
    </select>
    <label for="countryName">New Name:</label>
    <input type="text" name="countryName">
    <button type="submit"  class ="btn btn-success">Save</button>
</form>

<?php $this->load->view('footer'); ?>
