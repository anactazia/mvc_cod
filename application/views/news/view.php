<div id="content">
<?php echo heading("Artiklar", 1); ?>
<hr />
<div class="post">
<?php
echo '<h2>'.$news_item['title'].'</h2><hr /><div class="posttext">';

echo $news_item['text'];?>
</div>
<hr />
<p class="small">Skrivet av <span class="uppercase">
<?php echo $news_item['author'] ?>
<br /><?php echo $news_item['created'] ?></span></p>

</div>
</div>
