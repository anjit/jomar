<?php
 class query {
     
   public  function __cunstruct($opration,$query)
     {
     $this->opration = $opration;
     $this->query =    $query;
     }
   public function get_posts($query)
     {
         print_r($query);
                
         foreach ($query as $key => $value) {
           
           echo $key.' = ';
           echo json_encode($value);
           //echo ' and ';
         }

      if($query=='all')
         {
           $sql='select * from demo';    
         //echo '1st working';
         }
         else
         {
           

            $sql='select * from demo where '.$query;   
           //echo '2nd working';
         


         }
      $res=mysql_query($sql) or die(mysql_error()); 
     while( $rows =mysql_fetch_assoc($res))
             { 
              $results[] = $rows ; 
             }   
         
       $opt= new query();
      foreach($results as $key => $value)
       {
       $opt->{$key} = $value;
       }
       return $opt;
      
     
     }
     
 } 
?>
