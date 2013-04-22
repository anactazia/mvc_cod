<div id="content">
<?php echo heading("Admin", 1); ?>
<hr />
<p class="center">Välkommen, <?php echo $this->session->userdata('nickname'); ?>!<br />
Du är inloggad som administratör!!</p>
<a href='<?php echo base_url()."index.php/user/profile" ?>'><p class="center uppercase small">Ändra dina medlemsuppgifter</p></a>

</div>


