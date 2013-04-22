<div id="content">
<h1>Inlägg</h1>
<hr />
<p class="center">Här kan du skriva inlägg.</p>
<div class="formnews">
<?php echo validation_errors(); ?>

<?php echo form_open('index.php/news/create') ?>

	<label for="title"><span class="newslabel">Rubrik</span></label><br /> 
	<input class="newsinput" type="input" name="title" /><br />

	<label for="text"><span class="newslabel">Text</span></label><br/>
	<textarea class="newstextarea" name="text"></textarea><br />
	
	<label for="title"><span class="newslabel">Typ</span></label><br /> 
	<input class="newsinput" type="text" name="type" /><br />
	
	<label for="title"><span class="newslabel">Filter</span></label><br /> 
	<input class="newsinput" type="text" name="filter" /><br />
	
	<input class="newsinput" type="hidden" name="author" value="<?php echo $this->session->userdata('nickname'); ?>" /><br />
	
	<input type="submit" name="submit" value="Skicka till blogg" class="newssubmit"/> 

</form>
</div>
</div>

