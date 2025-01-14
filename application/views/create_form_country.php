<?php
$this->load->view('header');

$data['class']='form-horizontal';
$data['accept-charset']='utf8';
/*
Формы, созданные с помощью хелпера, автоматически выполняют экранирование опасных символов в данных формы 
и делают валидацию данных формы совместно с библиотекой form_validation намного проще.
*/
echo form_open('home/createCountry',$data);
echo "<div class='col-md-offset-4 form-margin'>";
	$inp=array('name'=>'country','class'=>'col-md-2', 'style'=>'color:green;margin:5px;', 
		'placeholder'=>'Введите название страны','type'=>'text');
	echo form_input($inp);
	echo form_submit(array('name'=>'send','value'=>'Отправить', 
		'class'=>'btn btn-sm btn-success col-sm-2'));
echo "</div>";
echo form_close();

$this->load->view('footer');
?>