<?php $this->load->view('header'); ?>
<body>
    <h2>Select what you want to edit:</h2>
    <ul>
    <li><a href="<?php echo site_url('home/editCountry'); ?>">Edit Country</a></li>
        <li><a href="<?php echo site_url('home/editCity'); ?>">Edit City</a></li>
        <li><a href="<?php echo site_url('home/editHotel'); ?>">Edit Hotel</a></li>
    </ul>
</body>
</html>
