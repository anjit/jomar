	<div class="sidebar content-box" style="display: block;">
                <ul class="nav">
                    <!-- Main menu -->
                <?php $nav_menus=$zoom->nav_menu('posts','nav_menu','admin'); 
                      
                foreach ($nav_menus as $nav_menu) {
                        $meta=   $zoom->get_meta($nav_menu['id']);        
                        $childs=  $zoom->has_child($nav_menu['id']);
                        $parent=  $zoom->has_parent($nav_menu['id']);
                        ?>    
                  <?php if($childs){?>
                     <li class='submenu'><a href="<?php echo $nav_menu['url']; ?>"><i class="<?php echo $meta['meta']; ?>"></i> <?php echo $nav_menu['post_title'];?></a><ul>
                  <?php foreach ($childs as $child) { ?>
                    <li><a href="<?php echo $child['url']; ?>"><i class="<?php echo $meta['meta']; ?>"></i> <?php echo $child['post_title'];?></a><li>   
                 <?php } echo '<li></ul>'; ?>  
  
                      <?php }else{?>
                    <?Php if($parent['post_parent']==''){?>  
                 <li><a href="<?php echo $nav_menu['url']; ?>"><i class="<?php echo $meta['meta']; ?>"></i> <?php echo $nav_menu['post_title'];?></a><li>     
                    <?php }}}?>
                                     
                </ul>
             </div>