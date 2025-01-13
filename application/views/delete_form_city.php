<?php
$this->load->view('header');

$st['class']='form-horizontal';
echo form_open('home/deleteCity',$st);
echo '<div class="col-md-offset-3">';
echo form_label('Выберите город: ','cityid',array('class'=>'control-label'));
echo '&nbsp;';
echo '<select name="cityid">';
foreach ($list as $l){
	echo '<option value='.$l['id'].'>';
	echo $l['city'];
	echo '</option>';
}
echo '</select>';
echo '&nbsp;';
echo form_submit(array('name'=>'send','value'=>'Отправить', 
	'class'=>'btn btn-success'));
echo '</div>';
echo form_close();

$this->load->view('footer');
?>