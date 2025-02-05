<?php
$this->load->view('header');

//echo form_open('home/createHotel');
//нужен form_open_multipart для работы с загрузкой файлов
echo form_open_multipart('home/createHotel'); 

// echo "<div class='col-md-offset-* form-margin'>";
echo "<div class='form-container'>";
echo form_label('Hotel Name:', 'hotel');
echo form_input('hotel');

echo form_label('Country:', 'countryid');
echo '<select name="countryid">';
foreach ($countries as $country) {
    echo '<option value="' . $country['id'] . '">' . $country['country'] . '</option>';
}
echo '</select>';

echo form_label('City:', 'cityid');
echo '<select name="cityid">';
foreach ($cities as $city) {
    echo '<option value="' . $city['id'] . '">' . $city['city'] . '</option>';
}
echo '</select>';

echo form_label('Stars:', 'stars');
echo form_input('stars');

echo form_label('Cost:', 'cost');
echo form_input('cost');

echo form_label('Info:', 'info');
echo form_textarea('info');

echo '<div class="upload-container">'; // div с классом
echo form_label('Upload Images:', 'images');
echo form_upload(['name' => 'images[]', 'multiple' => 'multiple']); // multiple позволяет выбрать несколько файлов
echo '</div>'; 


echo form_submit('send', 'Add Hotel', ['class' => 'btn btn-success']);
echo "</div>";
echo form_close();

$this->load->view('footer');
?>
