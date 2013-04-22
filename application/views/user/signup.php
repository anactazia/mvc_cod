<div id="content">
<?php echo heading("Sign Up", 1); ?>
<hr />
<p class="center">Skapa ett konto</p>
<div class="signupform">
	<?php
	
	echo form_open('index.php/user/signup_validation');
		
	echo "<p class='signuprows'><span class='signuplabel'>E-Mail</span>";
	echo form_input('email', $this->input->post('email'));
	echo "</p>";
	
	echo "<p class='signuprows'><span class='signuplabel'>Lösenord</span>";
	echo form_password('password');
	echo "</p>";
	
	echo "<p class='signuprows'><span class='signuplabel'>Upprepa Lösenord</span>";
	echo form_password('cpassword');
	echo "</p>";
	
	echo "<p class='signuprows'><span class='signuplabel'></span>";
	echo form_hidden('role', 'user');
	echo "</p>";
	
	echo "<p class='signupsubmit'>";
	echo form_submit('signup_submit', 'Sign Up');
	echo "</p>";
	?>
	</div>
	<div class="signuperror">
	<?php
	echo validation_errors();
	echo form_close();
	?>
	</div>
	
	
	
	<?php 
	if ($this->session->flashdata('message')) {
        ?>
        	<div class="signupmessage">
        		<?php echo $this->session->flashdata('message'); ?>
        	</div>
        <?php
        }
?>
	


</div>

