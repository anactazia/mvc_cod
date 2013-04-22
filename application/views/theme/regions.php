<div id="content">
<h1>Regions</h1>
<hr />
<?php 
require_once('application/controllers/viewcontainer.php');
$view = new Viewcontainer();
require_once('application/controllers/session.php');
$session = new Session($flash=null);
?>
<?php if($view->RegionHasView('flash')): ?>
<div id='outer-wrap-flash'>
<div id='inner-wrap-flash'>
<div id='flash'><?php $view->Render('flash')?></div>
</div>
</div>
<?php endif; ?>

<?php if($view->RegionHasView('featured-first', 'featured-middle', 'featured-last')): ?>
<div id='outer-wrap-featured'>
<div id='inner-wrap-featured'>
<div id='featured-first'><?php $view->Render('featured-first')?></div>
<div id='featured-middle'><?php $view->Render('featured-middle')?></div>
<div id='featured-last'><?php $view->Render('featured-last')?></div>
</div>
</div>
<?php endif; ?>

<div id='outer-wrap-main'>
<div id='inner-wrap-main'>
<div id='primary'><?php $session->GetMessages()?><?=@$main?><?php $view->Render('primary')?><?php $view->Render()?></div>
<div id='sidebar'><?php $view->Render('sidebar')?></div>
</div>
</div>


<div id='outer-wrap-triptych'>
<div id='inner-wrap-triptych'>
<div id='triptych-first'><?php $view->Render('triptych-first')?></div>
<p>hej här är triptych first</p>
<div id='triptych-middle'><?php $view->Render('triptych-middle')?></div>
<p>hej här är triptych middlet</p>
<div id='triptych-last'><?php $view->Render('triptych-last')?></div>
<p>hej här är triptych last</p>
</div>
</div>


<div id='outer-wrap-footer'>
<?php if($view->RegionHasView('footer-column-one', 'footer-column-two', 'footer-column-three', 'footer-column-four')): ?>
<div id='inner-wrap-footer-column'>
<div id='footer-column-one'><?php $view->Render('footer-column-one')?></div>
<div id='footer-column-two'><?php $view->Render('footer-column-two')?></div>
<div id='footer-column-three'><?php $view->Render('footer-column-three')?></div>
<div id='footer-column-four'><?php $view->Render('footer-column-four')?></div>
</div>
<?php endif; ?>

</div>
</div>
