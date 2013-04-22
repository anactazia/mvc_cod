<div id="content">
<?php echo heading("Artiklar", 1); ?>
<hr />

	<?php
	
	echo form_open('index.php/news/edit_validation');
	
	echo "<p><span class='profilelabel'>Titel</span>";
	echo form_input('title', $news_item['title']);
	echo "</p>";
	
	echo "<p><span class='profilelabel'>Text</span>";
	echo form_textarea('text', $news_item['text']);
	echo "</p>";
	
	echo "<p><span class='profilelabel'>Skribent</span>";
	echo form_input('author', $news_item['author'], 'readonly');
	echo "</p>";
	
	echo "<p><span class='profilelabel'>Slug</span>";
	echo form_input('slug', $news_item['slug'], 'readonly');
	echo "</p>";
	
	$time = date ("Y-m-d H:i:s");
	echo form_hidden('edited', $time, 'readonly');
	echo "</p>";

	
	echo "<p>";
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

<?php print_r($this->session->all_userdata()); ?>

