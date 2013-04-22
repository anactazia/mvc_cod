<div id="content">
<?php echo heading("News", 1); ?>
<hr />
<a href="news/create"><span class="postlink">Create a new post</span></a>
<?php foreach ($news as $news_item): ?>

<article class="newspost">
    <div>
    <h3><?php echo $news_item['title'] ?></h3>
    </div>
    <div id="main">
        <?php echo $news_item['text'] ?>
    </div>
    <div>
    <hr />
    <p class="uppercase small"><a href="news/<?php echo $news_item['slug'] ?>">View article</a></p>
    </div>
    </article>
    

<?php endforeach ?>
</div>
