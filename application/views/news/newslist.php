<div id="content">
<?php echo heading("Artiklar", 1); ?>
<hr />

<?php foreach ($news as $news_item): 
if($news_item['type'] == 'page'){
?>


<table class="postlist">
<tr>
<td class="td1"><span class="bold"><?php echo $news_item['title'] ?></span></td>
<td class="td2"><span class="small">av <span class="uppercase"><?php echo $news_item['author'] ?></span></span></td>
<td class="td3"><a href="view/<?php echo $news_item['slug'] ?>"><span class="uppercase small">Visa</span></a></td>
<?php if($news_item['author'] == $this->session->userdata('nickname')) { ?>
<td class="td4"><a href="edit/<?php echo $news_item['slug'] ?>"><span class="uppercase small">Ändra</span></a></td>
<?php } else {?>
<td class="td4"></td>	
<?php } ?>	
</tr>
</table>
  
	

<?php 
}
endforeach ?>
</div>

