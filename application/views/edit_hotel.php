<?php $this->load->view('header'); ?> 

<h2>Редактировать отель</h2>
<form method="post" action="<?php echo site_url('home/updateHotel'); ?>">
    <label for="hotelid">Выберите отель:</label>
    <select id="hotelid" name="hotelid">
        <option value="">--Выберите отель--</option>
        <?php foreach ($hotels as $hotel): ?>
            <option value="<?php echo $hotel['id']; ?>"><?php echo $hotel['hotel']; ?></option>
        <?php endforeach; ?>
    </select>

    <label for="hotelName">Новое название:</label>
    <input type="text" id="hotelName" name="hotelName">

    <label for="stars">Количество звезд:</label>
    <input type="text" id="stars" name="stars">

    <label for="cost">Стоимость:</label>
    <input type="text" id="cost" name="cost">

    <label for="info">Информация:</label>
    <textarea id="info" name="info"></textarea>

    <button type="submit">Обновить</button>
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
