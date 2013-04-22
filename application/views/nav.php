<body>

<div id="container">
<div id="nav">
<div class="menudiv1">

<a href="<?php echo base_url(); ?>index.php/site/home">Hem</a>
<a href="<?php echo base_url(); ?>index.php/site/about">Om</a>
<a href="<?php echo base_url(); ?>index.php/guestbook">Gästbok</a>
<a href="<?php echo base_url(); ?>index.php/news">Blogg</a>
<a href="<?php echo base_url(); ?>index.php/site/contact">Kontakt</a>
<a href="http://www.student.bth.se/~anza13/phpmvc/me/<?php echo constant('KMOM'); ?>/home.php">Me-Sidan</a>

    </div>
    
    <?php 
  
$email=$this->session->userdata('email');
$hash = md5(strtolower(trim($email)));
$gravatar = "<img class='gravatar' src='http://www.gravatar.com/avatar/$hash.jpg?r=pg&amp;d=wavatar&amp;' />";



    if($this->session->userdata('is_logged_in')) { 
    ?>
    <div class="menudiv2">
    
    <a href="<?php echo base_url(); ?>index.php/user/profile"><?php echo $this->session->userdata('email'); ?></a><br />
    <a href="<?php echo base_url(); ?>index.php/user/members">Medlemssida</a>
    </div>
    <div class="menudiv3">
    <a href="<?php echo base_url(); ?>index.php/user/profile"><?php echo $gravatar; ?></a><br />
    <a href="<?php echo base_url(); ?>index.php/user/logout"><span class="logout">Logout</span></a>
    </div>
    <?php ;} else { ?>
    <div class="menudiv4">
    <a href="<?php echo base_url(); ?>index.php/user/login">Login</a> 
    </div> 
    <?php ;}?>
        

</div>
