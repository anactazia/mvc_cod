<div id="content">
<h1>Gästbok</h1>
<hr />
<?php echo validation_errors(); ?>
<div class="formguest">
<?php echo $form; ?>
</div>
<?php foreach($posts as $posts_item): ?>
<article class="newspost">
<p><?php echo $posts_item['text']; ?></p>
<hr />
<p class="uppercase small">Skribent: <em><?php echo $posts_item['author']; ?></em></p>
</article>
<?php endforeach; ?>
</div>
