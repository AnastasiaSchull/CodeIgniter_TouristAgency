<?php
$this->load->view('header');
echo '<h2>'.$title.'</h2>';

echo '<table class="table table-striped">';
	foreach($countries as $c)
	{
		echo '<tr>';
		echo '<td>'.$c['country'].'</td>';
		echo '</tr>';
	}
echo '</table>';
$this->load->view('footer');
?>