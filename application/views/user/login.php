<div id="content">
<?php echo heading("Login", 1); ?>
<hr />
<p class="center">Välkommen att logga in!</p>
<div class="loginform">
	<?php
	
	echo form_open('index.php/user/login_validation');
	
	echo "<p class='loginrows'><span class='loginlabel'>E-Mail</span>";
	echo form_input('email', $this->input->post('email'));
	echo "</p>";
	
	echo "<p class='loginrows'><span class='loginlabel'>Lösenord</span>";
	echo form_password('password');
	echo "</p>";
	
	echo "<p class='loginsubmit'>";
	echo form_submit('login_submit', 'Login');
	echo "</p>";
	
	echo form_close();
	?>
	</div>
	<div class="loginerror">
	<?php
	echo validation_errors();
	echo form_close();
	?>
	</div>

<a href='<?php echo base_url() . "index.php/user/signup"; ?>' ><p class="logincreate">Skapa nytt konto</p></a>

<?php 
	if ($this->session->flashdata('message')) {
        ?>
        	<div class="loginmessage">
        		<?php echo $this->session->flashdata('message'); ?>
        	</div>
        <?php
        }
?>

</div>

