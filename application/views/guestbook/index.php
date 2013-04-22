<div id="content">
<a href="<?php echo site_url('guestbook'); ?>"><h1>Guestbook</h1></a>
<hr />
<?php echo validation_errors(); ?>
<div class="formguest">
<?php echo $form; ?>
</div>
<?php foreach($posts as $posts_item): ?>
<article class="newspost">
<p><?php echo $posts_item['text']; ?></p>
<hr />
<p class="uppercase small">Author: <em><?php echo $posts_item['author']; ?></em></p>
</article>
<?php endforeach; ?>
</div>
