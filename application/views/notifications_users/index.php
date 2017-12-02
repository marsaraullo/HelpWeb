<?php
$output = '';
if(count($notifications)>0){
  foreach($notifications as $row){
      $datetime1 = new DateTime();
      $datetime2 = new DateTime($row['datetime']);
      $interval = $datetime1->diff($datetime2);
      $d = $interval->format('%a');
      $h = $interval->format('%h');
      $i = $interval->format('%i');

      if($d>0){
        $display_time = $d.'d';
      }elseif($d<=0 && $h<=0){
        $display_time = $i.'m';
      }else{
        $display_time = $h.'h';
      }

      if (strlen($row['title']) > 19){
        $item_name = substr($row['title'], 0, 18) . '...';
      }else{
        $item_name = $row['title'];
      }

      if($row['helper_id']!=""){
        $status = '<i class="fa fa-circle text-red"></i>';
      }else{
        $status = '<i class="fa fa-circle text-green"></i>';
      }

      $output .= '<li><strong><a href="'.site_url().'/jobposts_users/job/'.$row['id'].'"><h5>'.$status.' '.$item_name.'</strong> (P '.$row['min_cost'].' - P '.$row['max_cost'].') <small><span class="pull-right">'.$display_time.' ago</span></small></h5></a></li>';
    }
}else{
  $output .= '<li><a href="'.site_url().'/jobposts_users">No notification found</a></li>';
}

$data = array(
  'notification'   => $output,
  'unseen_notification' => $count_notification
);

echo json_encode($data);

?>
