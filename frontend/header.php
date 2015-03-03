<!doctype html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1" />
<meta charset="utf-8">
<title>JOMAR</title>
<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
<link href="fonts/font.css" rel="stylesheet" type="text/css" media="all" />
<link href="css/style-responsive.css" rel="stylesheet" type="text/css" media="all" />
</head>
<body class="contact-bg">
<div class="main">
<header>
<h1 id="logo"><a href="index.html"><img src="images/logo.png" alt="logo"></a></h1>
<a href="#" class="login-btn0">Plan room Login</a>
<a href="#" class="login-btn0">Employee Login</a>
<nav>
<div class="toggle"></div>
<ul>
    <?php $nav_menus=$zoom->nav_menu('posts','nav_menu','site_menu');
                  
                foreach ($nav_menus as $nav_menu) {
                        $meta=   $zoom->get_meta($nav_menu['id']);        
                        $childs=  $zoom->has_child($nav_menu['id']);
                        $parent=  $zoom->has_parent($nav_menu['id']);
                        ?>    
                  <?php if($childs){?>
                     <li class='submenu'><a href="<?php echo $nav_menu['url']; ?>"><i class="<?php echo $meta['meta']; ?>"></i> <?php echo $nav_menu['post_title'];?></a><ul>
                  <?php foreach ($childs as $child) { ?>
                    <li><a href="<?php echo $child['url']; ?>"><i class="<?php echo $meta['meta']; ?>"></i> <?php echo $child['post_title'];?></a></li>   
                 <?php } echo '</li></ul>'; ?>  
  
                      <?php }else{?>
                    <?Php if($parent['post_parent']==''){?>  
                 <li><a href="<?php echo $nav_menu['url']; ?>"><i class="<?php echo $meta['meta']; ?>"></i> <?php echo $nav_menu['post_title'];?></a></li>     
                    <?php }}}?>
            
</ul>
</nav>

</header>
