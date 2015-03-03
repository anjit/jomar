<?php
switch ($_REQUEST['action'])
{
    case 'login':
		  $uname = $_REQUEST['username'];
		  
		  $password = $_REQUEST['password'];
		  
          $status = $member_object->login($uname,$password);
		  
		  
		  if($status=='true')
		  {
				echo 'dashboard.php';
				die();	  
		  }
		  else
		  {
			  echo 'false';
			  die();
		  }
         
    break;
    
    case 'single_question_delete':
         $question_object->delete_question($_REQUEST['qid']);
         $redirect_url = 'dashboard.php?fun=show_all_questions';   
         echo $redirect_url;
         die();
    break;  

    case 'multiple_question_delete':
          $q_ids = isset($_REQUEST['q_ids']);
          for($i=0;$i<=count($q_ids);$i++)
          {
              $question_object->delete_question($q_ids[$i]);
          }
             
          $redirect_url = 'dashboard.php?fun=show_all_questions';  
          echo $redirect_url;
          die();
    break;
	
	 case 'single_banner_delete':
         $banner_object->delete_banner($_REQUEST['bid']);
         $redirect_url = 'banner.php?fun=view_banner';   
         echo $redirect_url;
         die();
    break; 
	
	case 'multiple_banner_delete':
		 
          $banner_ids = (isset($_REQUEST['banner_ids'])?$_REQUEST['banner_ids']:'');
          
			  for($i=0;$i<=count($banner_ids);$i++)
			  {
				 
				  $banner_object->delete_banner(@$banner_ids[$i]);
				  
			  }
		  
          $redirect_url = 'banner.php?fun=view_banner';  
          echo $redirect_url;
          die();
    break;
    
	 case 'single_video_delete':
         $video_object->delete_video($_REQUEST['vid']);
         $redirect_url = 'vedio.php?fun=view_all_vedios' ;
         echo $redirect_url;
         die();
    break; 
	
	case 'multiple_video_delete':
		 
          $video_ids = (isset($_REQUEST['video_ids'])?$_REQUEST['video_ids']:'');
          
			  for($i=0;$i<=count($video_ids);$i++)
			  {
				 
				  $video_object->delete_video(@$video_ids[$i]);
				  
			  }
		  
          $redirect_url = 'vedio.php?fun=view_all_vedios' ;
          echo $redirect_url;
          die();
    break;
	case 'single_menu_delete':
         $menu_object->delete_menu($_REQUEST['menu_id']);
         $redirect_url = 'dashboard.php?fun=view_menu';   
         echo $redirect_url;
         die();
    break; 
	
	 case 'multiple_menu_delete':
          $menu_ids = $_REQUEST['menu_ids'];
          for($i=0;$i<=count($menu_ids);$i++)
          {
              $menu_object->delete_menu(@$menu_ids[$i]);
          }
             
          $redirect_url = 'dashboard.php?fun=view_menu';  
          echo $redirect_url;
          die();
    break;
	case 'single_cat_delete_lms':
         $category_object->delete_category($_REQUEST['category_id']);
         $redirect_url = 'dashboard.php?fun=show_all_categories';   
         echo $redirect_url;
         die();
    break; 
	
	 case 'multiple_cat_delete':
          $cat_ids = $_REQUEST['category_ids'];
          for($i=0;$i<=count($cat_ids);$i++)
          {
              $category_object->delete_category(@$cat_ids[$i]);
          }
             
          $redirect_url = 'dashboard.php?fun=show_all_categories';  
          echo $redirect_url;
          die();
	
	case 'single_cms_delete':
         $cms_object->delete_cms($_REQUEST['page_id']);
         $redirect_url = 'dashboard.php?fun=view_cms';   
         echo $redirect_url;
         die();
    break; 
	
	 case 'multiple_cms_delete':
          $page_ids = $_REQUEST['page_ids'];
          for($i=0;$i<=count($page_ids);$i++)
          {
              $cms_object->delete_menu(@$page_ids[$i]);
          }
             
          $redirect_url = 'dashboard.php?fun=view_cms';  
          echo $redirect_url;
          die();
    break;
	case 'admin_logout':
         $member_object->logout();
		 $redirect_url = 'index.php';   
         echo $redirect_url;
         die();
    break;
	
}
?>
