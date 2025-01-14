<?php
$this->load->view('header');
echo "<div class='col-md-offset-1 form-margin'>";
	echo '<h2>'.$title.$country[0]['country'].'</h2>';

	foreach ($city as $l){
		echo '<h3>'.$l['city'].'</h3>';
}

echo "</div>"; 
$this->load->view('footer');
?>