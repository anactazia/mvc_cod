<div id="content">
<?php echo heading("Blogg", 1); ?>
<hr />
<?php 

foreach ($news as $news_item): 
if($news_item['type'] == 'post'){
?>

<article class="newspost">
    <div>
    <h3><?php echo $news_item['title'] ?></h3>
    </div>
    <div id="main">
        <?php echo $news_item['text'] ?>
    </div>
    <p class="small">Skrivet av <span class="uppercase"><?php echo $news_item['author'] ?><br /><?php echo $news_item['created'] ?></span></p>
    
    <div>
    <hr />
    <p class="uppercase small"><a href="news/view/<?php echo $news_item['slug'] ?>">Visa</a>
        <a href="news/edit/<?php echo $news_item['slug'] ?>">Ändra</a></p>
    </div>
    </article>
    

<?php 
}
endforeach; ?>

</div>
