<!doctype html>
<meta charset=utf-8>
<title>Hello World</title>
current value: <?php echo htmlentities($var1); ?><br>
<?php echo anchor('helloworld2/save/hello', 'Set Hello');?>
<br>
<?php echo anchor('helloworld2/save/world', 'Set World');?>
<br>
<?php echo anchor('helloworld2', 'Current value');?>
