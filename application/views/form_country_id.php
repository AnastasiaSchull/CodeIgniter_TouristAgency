<?php
$this->load->view('header');

$st['class']='form-horizontal';
echo form_open('home/getCityByCountry',$st);
echo '<div class="col-md-offset-3 form-margin">';
echo form_label('Select a country: ','countryid',array('class'=>'control-label'));
echo '&nbsp;';
echo '<select name="countryid">';
foreach ($list as $l){
	echo '<option value='.$l['id'].'>';
	echo $l['country'];
	echo '</option>';
}
echo '</select>';
echo '&nbsp;';
echo form_submit(array('name'=>'send','value'=>'Submit', 
	'class'=>'btn btn-success'));
echo '</div>';
echo form_close();


$this->load->view('footer');
?>