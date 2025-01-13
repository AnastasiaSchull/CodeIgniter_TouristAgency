<?php
$this->load->view('header');

$data['class']='form-horizontal';
$data['accept-charset']='utf8';
/*
Формы, созданные с помощью хелпера, автоматически выполняют экранирование опасных символов в данных формы 
и делают валидацию данных формы совместно с библиотекой form_validation намного проще.
*/
echo form_open('home/createCity',$data);
echo "<div class='col-md-offset-4'>";
echo '&nbsp;';
echo '<select name="countryid">';
foreach ($countries as $l){
	echo '<option value='.$l['id'].'>';
	echo $l['country'];
	echo '</option>';
}
echo '</select>';
echo '&nbsp;';
	$inp=array('name'=>'city','class'=>'col-md-2', 'style'=>'color:green;margin:5px;', 
		'placeholder'=>'Введите название города','type'=>'text');
	echo form_input($inp);
	echo form_submit(array('name'=>'send','value'=>'Отправить', 
		'class'=>'btn btn-sm btn-success col-sm-2'));
echo "</div>";
echo form_close();

$this->load->view('footer');
?>