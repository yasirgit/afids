<?php $is_pilot = $sf_user->hasCredential('Pilot');?>
<div class="wrap">
    <?php if( isset($flag) ){?>
    <script type="text/javascript">
        jQuery(document).ready( function(){
                   jQuery('#dashboard_availables').hide();
                   jQuery('#dashboard_pendings').hide();
                   jQuery('#dashboard_visual').show();
                   jQuery('ul.mission-tabs li').removeClass('active');
                   jQuery('ul.mission-tabs li:last').addClass('active');
        });
    </script>
    <?php }?>
    <?php if( isset($pilot_request) ){?>
            <script type="text/javascript">
                jQuery(document).ready( function(){
                    jQuery('#mission_request_table').hide();
                    jQuery('#afidsavailable_missions_table').hide();
                    jQuery('#coordinated_missions_table').hide();
                    jQuery('#member_requests_table').hide();
                    jQuery('#pilot_requests_table_one').show();
                    jQuery('ul.mission-tabs li').removeClass('active');
                    jQuery('ul.mission-tabs li:last').addClass('active');                    
                });
            </script>
    <?php } ?>
  <?php include_component('dashboard', 'priorityList')?>
  <?php //if ($is_pilot){
    //include_component('dashboard', 'currentMissions');
  //}else{
    include_component('dashboard', 'recentItems');
  //}
  ?>
<?php //#Notification ?> 
<?php include_component('dashboard', 'instrumentNotication');?> 
</div>

<?php if (!$sf_user->hasCredential(array('Member'), false)) { ?>
    <?php if (!$is_pilot) include_component('dashboard', 'requests')?>
<?php } ?>
<?php if ($is_pilot) include_component('dashboard', 'availableMissions',array( 'orgin_airport'=>$orgin_airport,'types'=> $types , 'dest_airport'=>$dest_airport ,'miss_type' => $miss_type ,'miss_date1' => $miss_date1 , 'miss_date2' => $miss_date2,'airport_list'=> $airport_list,'legs' => $legs,'date_widget' => $date_widget,'window_loc'=> isset($window_loc) ? $window_loc : null,'window_loc_visual'=> isset($window_loc_visual) ? $window_loc_visual : null ))?>

<div class="instrumental-info">
<?php //if (!$is_pilot) {?>
  <?php include_component('dashboard', 'personalNotepad')?>
  <?php if (!$is_pilot){?>
    <?php if (!$sf_user->hasCredential(array('Member'), false)) { ?>
        <?php include_component('dashboard', 'teamNotepad')?>
    <?php } ?>
  <?php } ?> 
<?php // }?>
</div>

