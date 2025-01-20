<?php $this->load->view('header'); ?>
<h2>List of Hotels</h2>
<table border="1">
    <tr>
        <th>Image</th>
        <th>Hotel Name</th>
        <th>City</th>
        <th>Stars</th>
        <th>Cost</th>
        <th>Info</th>
    </tr>
    <?php foreach ($hotels as $hotel): ?>
        <tr>
        <td>
                <?php if (!empty($hotel['imagepath'])): ?> <!-- есть ли изображение -->
                    <img src="<?php echo base_url($hotel['imagepath']); ?>" alt="Hotel Image" style="width: 100px; height: auto;">
                <?php else: ?>
                    No Image
                <?php endif; ?>
            </td>
            <td><?php echo $hotel['hotel']; ?></td>
            <td><?php echo $hotel['cityid']; ?></td>
            <td><?php echo $hotel['stars']; ?></td>
            <td><?php echo $hotel['cost']; ?></td>
            <td><?php echo $hotel['info']; ?></td>
        </tr>
    <?php endforeach; ?>
</table>
