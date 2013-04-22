<div id="content">
<h1>Blogg</h1>
<hr />
<p class="center">Skriv i bloggen</p>
<div class="formnews">
<?php echo validation_errors(); ?>

<?php echo form_open('index.php/news/create') ?>

	<label for="title"><span class="newslabel">Rubrik</span></label><br /> 
	<input class="newsinput" type="input" name="title" /><br />

	<label for="text"><span class="newslabel">Text</span></label><br/>
	<textarea class="newstextarea" name="text"></textarea><br />
	
	<input type="submit" name="submit" value="Skicka till blogg" class="newssubmit"/> 

</form>
</div>
</div>

