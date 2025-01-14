<?php
$this->load->view('header');

echo form_open('home/deleteHotel');
echo '<div class="col-md-offset-3 form-margin">';
echo form_label('Select Hotel:', 'hotelid');
echo '<select name="hotelid">';
foreach ($hotels as $hotel) {
    echo '<option value="' . $hotel['id'] . '">' . $hotel['hotel'] . '</option>';
}
echo '</select>';
echo form_submit('send', 'Delete Hotel', ['class' => 'btn btn-danger']);
echo '</div>';
echo form_close();

$this->load->view('footer');
?>
