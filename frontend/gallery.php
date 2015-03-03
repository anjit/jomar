<?php 
include(dirname(__FILE__).'/routs.php');
include(dirname(__FILE__).'/header.php');
?>
<div class="content-section">
<div class="wrapper">
<div class="details">
        <div class="title">
          <h3><?php echo $posts[0]['post_title'];?></h3>
          <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. </p>
        </div>
        <div class="content">
        <?php echo $posts[0]['post_content'];?>
        </div>
      </div>
</div>
</div>
<?php
include('footer.php');
?>
