<?php $this->load->view('header'); ?>

<h2>Register</h2>
<?php echo validation_errors(); ?>

<form method="post" action="<?php echo site_url('user/register'); ?>">
    <label>Login:</label>
    <input type="text" name="login" required>
    <br>
    <label>Email:</label>
    <input type="email" name="email" required>
    <br>
    <label>Password:</label>
    <input type="password" name="password" required>
    <br>
    <label>Confirm Password:</label>
    <input type="password" name="confirm_password" required>
    <br>
    <button type="submit" name="register" class="btn btn-sm btn-success col-sm-2" style=" margin-left: 30px"  >Register</button>
</form>
