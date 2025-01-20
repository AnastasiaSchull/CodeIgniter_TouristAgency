<?php $this->load->view('header'); ?> 

<h2>Edit a Hotel</h2>
<form method="post" action="<?php echo site_url('home/updateHotel'); ?>" enctype="multipart/form-data">
    <label for="hotelid">Select a Hotel:</label>
    <select id="hotelid" name="hotelid">
        <option value="">--Select a Hotel--</option>
        <?php foreach ($hotels as $hotel): ?>
            <option value="<?php echo $hotel['id']; ?>"><?php echo $hotel['hotel']; ?></option>
        <?php endforeach; ?>
    </select>

    <label for="hotelName">New Name:</label>
    <input type="text" id="hotelName" name="hotelName">

    <label for="stars">Number of Stars:</label>
    <input type="text" id="stars" name="stars">

    <label for="cost">Cost:</label>
    <input type="text" id="cost" name="cost">

    <label for="info">Info:</label>
    <textarea id="info" name="info"></textarea>

      <!--для загрузки новых изображений -->
    <div class="upload-container">
        <label for="images">Upload Images:</label>
        <input type="file" id="images" name="images[]" multiple>
    </div>
    <button type="submit" class ="btn btn-success" style="margin-left:20px" >Update</button>
</form>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
$(document).ready(function(){
    $('#hotelid').change(function(){
        var hotelId = $(this).val();
        if(hotelId) {
            $.ajax({
            url: "<?php echo site_url('home/getHotelData'); ?>",
            type: "POST",
            data: {hotelid: hotelId},
            dataType: "json",
            success: function(data) {
                console.log("Received data:", data); 
                $('#hotelName').val(data.hotel);
                $('#stars').val(data.stars);
                $('#cost').val(data.cost);
                $('#info').val(data.info);
            },
            error: function(xhr, status, error) {
                console.error("Error loading data:", xhr.responseText);
            }
        });

        }
    });
});
</script>


<?php $this->load->view('footer'); ?>
