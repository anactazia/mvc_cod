<div id="content">
<h1>Create a news item</h1>
<hr />

<div class="formnews">
<?php echo validation_errors(); ?>

<?php echo form_open('index.php/news/create') ?>

	<label for="title"><span class="newslabel">Title</span></label> 
	<input class="newsinput" type="input" name="title" /><br />

	<label for="text"><span class="newslabel">Text</span></label>
	<textarea class="newstextarea" name="text"></textarea><br />
	
	<input type="submit" name="submit" value="Create news item" class="newssubmit"/> 

</form>
</div>
</div>

