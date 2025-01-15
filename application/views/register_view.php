<?php $this->load->view('header'); ?>
<body>
    <h2>Выберите, что вы хотите отредактировать:</h2>
    <ul>
        <li><a href="<?php echo site_url('home/editCountry'); ?>">Редактировать страну</a></li>
        <li><a href="<?php echo site_url('home/editCity'); ?>">Редактировать город</a></li>
        <li><a href="<?php echo site_url('home/editHotel'); ?>">Редактировать отель</a></li>
    </ul>
</body>
</html>
