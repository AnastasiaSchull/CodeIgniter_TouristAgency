<?php $this->load->view('header'); ?>

<h2>Leave a Comment</h2>

<form method="post" action="<?php echo site_url('home/addComment'); ?>">
    <label for="hotel_id">Select Hotel:</label>
    <select name="hotel_id" id="hotel_id" required>
        <option value="" disabled selected>--Select a hotel--</option>
        <?php foreach ($hotels as $hotel): ?>
            <option value="<?php echo $hotel['id']; ?>"><?php echo $hotel['hotel']; ?></option>
        <?php endforeach; ?>
    </select>

    <label for="comment">Your Comment:</label>
    <textarea name="comment" id="comment" rows="4" required></textarea>

    <button type="submit" name="submit" value= "1" class="btn btn-success">Submit</button>
</form>


