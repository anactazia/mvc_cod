<div id="content">
<?php echo heading("Profil", 1); ?>
<hr />
<p class="center">Här kan du ändra dina medlemsuppgifter!<br /></p>
<div class="userdetails">
<?php

echo'<table class="usertable">';
echo'<tr><td>Namn:</td><td>' . $this->session->userdata('name') . '</td></tr>';
echo'<tr><td>Användarnamn:</td><td>' . $this->session->userdata('nickname') . '</td></tr>';;
echo'<tr><td>Email:</td><td>' . $this->session->userdata('email') . '</td></tr>';
echo'</table>';
?>
</div>
<div class="profileform">
	<?php
	
	echo form_open('index.php/user/profile_validation');
	
	echo "<p class='profilerows'><span class='profilelabel'>Namn</span>";
	echo form_input('name', $this->input->post('name'));
	echo "</p>";
	
	echo "<p class='profilerows'><span class='profilelabel'>Användarnamn</span>";
	echo form_input('nickname', $this->input->post('nickname'));
	echo "</p>";
	
	echo "<p class='profilerows'><span class='profilelabel'>E-Mail</span>";
	echo form_input('email', $this->session->userdata('email'));
		
	echo "</p>";
	
	echo "<p class='profilerows'><span class='profilelabel'>Lösenord</span>";
	echo form_password('password');
	echo "</p>";
	
	echo "<p class='profilesubmit'>";
	echo form_submit('signup_submit', 'Skicka');
	echo "</p>";
	?>
	</div>
	<div class="profileerror">
	<?php
	echo validation_errors();
	echo form_close();
	?>
	</div>
	
	
	
	<?php 
	if ($this->session->flashdata('message')) {
        ?>
        	<div class="profilemessage">
        		<?php echo $this->session->flashdata('message'); ?>
        	</div>
        <?php
        }
?>
	


</div>
