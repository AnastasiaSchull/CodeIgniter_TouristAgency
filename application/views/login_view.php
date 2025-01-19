<?php $this->load->view('header'); ?>

<?php if ($this->session->flashdata('error')): ?>
    <script>
        alert('<?php echo $this->session->flashdata('error'); ?>');
    </script>
<?php endif; ?>

<h2>Login</h2>
<form method="post" action="<?php echo site_url('user/login'); ?>">
    <label>Email:</label>
    <input type="email" name="email" required autocomplete="username">
    <br>
    <label>Password:</label>
    <input type="password" name="password" required autocomplete="current-password">
    <br>
    <button type="submit" name="login" class="btn btn-sm btn-success col-sm-2" style=" margin-left: 30px"  value="1">Login</button> 
    
</form>

