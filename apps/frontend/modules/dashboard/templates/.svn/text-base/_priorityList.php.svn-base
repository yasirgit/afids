<div class="priority-list">
  <h2>Priority List</h2>
  <div class="frame">
    <ul>
      <?php if($sf_user->hasCredential(array('Administrator','Staff','Coordinator'), false)) {?>
      <?php if ($pilot_request_count > 0) {?>
      <li>
         <?php if($sf_user->hasCredential(array('Administrator','Staff'), false) && $pilot_request_count) {?>
        <div class="wrap">
          <p><img alt="ico" src="/images/ico-priority-list-1.png"><a href="<?php echo url_for('@pilot_request_list')?>"><?php echo $pilot_request_count?> Pilot Requests</a> will be flown in 1-2 days; please process them.</p>
        </div>
        <?php } ?>
      </li>
      <?php }?>
      <?php if ($no_pilot_count > 0 || 1==1) {?>
      <li class="alt">
         <?php if(!$sf_user->hasCredential(array('Pilot'), false) && $no_pilot_count) {?>
        <div class="wrap">
          <p><img alt="ico" src="/images/ico-priority-list-1.png"><a href="<?php echo url_for('@request_legs?needs=1');?>"><?php echo $no_pilot_count?> Missions</a> are scheduled in 1-2 days and still need pilot; please process them.</p>
          <!--<em class="time">2 hours ago</em>-->
        </div>
        <?php } ?> 
      </li>
      <?php }?>
      <?php if ($cancelled_legs > 0) {?>
          <?php if($sf_user->hasCredential(array('Administrator'), false) && $cancelled_legs) {?>
            <li>              
              <div class="wrap">
                <p><img alt="ico" src="/images/ico-priority-list-2.png"><a href="<?php echo url_for('missionLeg/indexCancelled')?>"><?php echo $cancelled_legs?> Mission legs</a> has been cancelled; please review the changes.</p>
                <!--<em class="time">2 hours ago</em>-->
              </div>
            </li>
           <?php }?>
      <?php } ?>       
    
      <?php } ?>

        <?php if($sf_user->hasCredential(array('Administrator','Staff','Coordinator'), false) && $pilots_added) {?>
        <li>
          <div class="wrap">
            <?php
             foreach ($pilots_added as $pilot) {
             $member=MemberPeer::retrieveByPK($pilot->getMemberId());
             $pilotPerson = PersonPeer::retrieveByPK($member->getPersonId());
             $name=$pilotPerson->getFirstName()."  ".$pilotPerson->getLastName();
             $mission_leg = MissionLegPeer::retrieveByPK($pilot->getLegId());
             $mission = MissionPeer::retrieveByPK($mission_leg->getMissionId());
             ?>
            <p>
              <img alt="ico" src="/images/ico-priority-list-2.png">
              <b><?php echo $name;?></b> has been added to mission <?php echo $mission->getExternalId();?>-<?php echo $mission_leg->getLegNumber();?>
            </p>
           <?php
             //}
            }
            ?>
         </div>
        </li>
        <?php }?>

       

      <?php if($sf_user->hasCredential(array('Pilot'), false)) {?>
        <li>          
          <div class="wrap">             
            <p><img alt="ico" src="/images/ico-priority-list-2.png"> You have <a href="#dashboard_availables"><?php echo count($near_mission)?> missions available</a> in your area. </p>
          </div>
        </li>        
        <li>          
          <div class="wrap">             
            <p><img alt="ico" src="/images/ico-priority-list-2.png">You have <a href="<?php echo url_for('mission/pendingPilot?pilot_id='.$p_id);?>"><?php echo $pinding?> Missions</a> pending.</p>
            <!--<em class="time">2 hours ago</em>-->
          </div>
        </li>
        <li>
          
          <div class="wrap">
            <p><img alt="ico" src="/images/ico-priority-list-2.png">You have <a href="<?php echo url_for('mission_report/index');?>"><?php echo $miss?> Mission reports</a> to file.</p>
            <!--<em class="time">2 hours ago</em>-->
          </div>
        </li>
        <li>          
          <div class="wrap">
            <p><img alt="ico" src="/images/ico-priority-list-2.png">
            <?php
            if($due_day<=1)
            {
            ?>
             Your membership renewal is overdue. Please renew now so you can continue flying missions. <?php $days=abs($due_day);?> <?php if($days==0) { echo link_to('today', 'renewal/step1'); } else { ?> <a href="<?php echo url_for('renewal/step1')?>"> <?php echo "renewal";//$days." days ago.";?> <?php } ?></a></p>             
            <?php
            }
            else
            {
            ?>
             Your membership renewal is due in less than thirty days. Why not renew now?  <a href="<?php if($due_day<=30) echo url_for('renewal/step1'); else echo "#";?>">  renewal.</a></p>
           <?php } ?>
            <!--<em class="time">2 hours ago</em>-->
            </p>
          </div>
        </li>
      <?php }?>
      <?php if($sf_user->hasCredential(array('Administrator'), false) && isset($un_proc_miss_req) && $un_proc_miss_req > 0) {?>
        <li>
          <div class="wrap">
              <p>
                  <img alt="ico" src="/images/ico-priority-list-2.png">
                  There <?php if($un_proc_miss_req > 1):?>are <?php else:?>is <?php endif;?> <a href="<?php echo url_for('miss_req');?>"><?php echo $un_proc_miss_req?> unprocessed</a> mission request(s). Please process.
              </p>                
         </div>
        </li>
        <?php }?>
        <?php if($sf_user->hasCredential(array('Administrator'), false) && isset($un_proc_mem_apps) && $un_proc_mem_apps > 0) {?>
        <li>
          <div class="wrap">
              <p>
                  <img alt="ico" src="/images/ico-priority-list-2.png">
                  There <?php if($un_proc_mem_apps > 1):?>are <?php else:?>is <?php endif;?><a href="<?php echo url_for('/pending_member');?>"><?php echo $un_proc_mem_apps?> unprocessed</a> member application(s). Please process.
              </p>
         </div>
        </li>
        <?php }?>
        <?php if($sf_user->hasCredential(array('Administrator'), false) && isset($un_proc_pilot_reqs) && $un_proc_pilot_reqs > 0) {?>
        <li>
          <div class="wrap">
              <p>
                  <img alt="ico" src="/images/ico-priority-list-2.png">
                  There <?php if($un_proc_pilot_reqs > 1):?>are <?php else:?>is <?php endif;?><a href="<?php echo url_for('pilot_request_list');?>"><?php echo $un_proc_pilot_reqs?> unprocessed</a> pilot request(s). Please process.
              </p>
         </div>
        </li>
        <?php }?>
        <?php if($sf_user->hasCredential(array('Administrator'), false) && isset($un_coor_mission_legs) && $un_coor_mission_legs > 0) {?>
        <li>
          <div class="wrap">
              <p>
                  <img alt="ico" src="/images/ico-priority-list-2.png">                  
                  There <?php if($un_coor_mission_legs > 1):?>are <?php else:?>is <?php endif;?><a href="<?php echo url_for('/leg?noncoordinatedlegs=true');?>"><?php echo $un_coor_mission_legs?></a> afa or linking mission legs,
                  which <?php if($un_coor_mission_legs > 1):?>are <?php else:?>is <?php endif;?>pending but there is not pilot attached and the mission date is less than 5 days from today.
              </p>
         </div>
        </li>
        <?php }?>
        <?php if($sf_user->hasCredential(array('Administrator'), false) ) {?>
        <li>
          <div class="wrap">
              <p>
                  <img alt="ico" src="/images/ico-priority-list-2.png">
                  There are <a href="/contact/listRequest"><?php if(isset($un_proce_contact_req)) echo $un_proce_contact_req ;else "0"; ?> unprocessed</a> contact request(s). Please process.
              </p>
         </div>
        </li>
         <li>
         <div class="wrap">
              <p>
                  <img alt="ico" src="/images/ico-priority-list-2.png">
                  There are <a href="/contact/listRequest?graterOneDay=ok"><?php if(isset($graterThanOneDay)) echo $graterThanOneDay ;else "0"; ?> unprocessed</a> contact request(s) more than one day. Please process.
              </p>
         </div>
        </li>       
        <?php }?>
        
        <?php if($sf_user->hasCredential(array('Administrator','Staff','Coordinator'), false) && $new_contact_requeststs) {?>
        <li>
          <div class="wrap">
            <?php
            foreach ($new_contact_requeststs as $new_contact_requestst) {
            ?>
            <p>
              <img alt="ico" src="/images/ico-priority-list-2.png">
              A new request for information was received  <?php echo link_to('Process', 'contact/processRequest?id='.$new_contact_requestst->getId())?>
            </p>
           <?php
            }
            ?>
         </div>
        </li>
        <?php }?>
        
        <?php if($sf_user->hasCredential(array('Pilot'), false) && $removed_pilot) {?>
        <li>
          <div class="wrap">
                <?php
                 foreach ($removed_pilot as $reqRemoved) {
                 $mission_leg = MissionLegPeer::retrieveByPK($reqRemoved->getLegId());
                 $mission = MissionPeer::retrieveByPK($mission_leg->getMissionId());
                 ?>
              <p>                  
                  <img alt="ico" src="/images/ico-priority-list-2.png">
                  You were removed from mission <?php echo $mission->getExternalId();?>-<?php echo $mission_leg->getLegNumber();?> .If you feel that this is in error, please contact the office as soon as possible.
              </p>
              <?php
                }
               ?>
         </div>
        </li>
        <?php }?>       
        <?php if($sf_user->hasCredential(array('Pilot'), false) && $revival_pilot) {?>
        <li>
          <div class="wrap">
            <?php
             foreach ($revival_pilot as $req) {
             $mission_leg = MissionLegPeer::retrieveByPK($req->getLegId());
             $mission = MissionPeer::retrieveByPK($mission_leg->getMissionId());
            ?>
            <p>
               <img alt="ico" src="/images/ico-priority-list-2.png">               
               A mission you requested is now in need of a pilot. If you're still interested, please view the mission <a href="/leg_view/<?php echo $req->getLegId();?>"><?php echo $mission->getExternalId();?>-<?php echo $mission_leg->getLegNumber();?></a> and request it again, or contact the office.
            </p>
           <?php
            }
            ?>
         </div>
        </li>
        <?php }?>

        <?php if($sf_user->hasCredential(array('Pilot'), false) && $mission_report_dues) {?>
        <li>
          <div class="wrap">            
            <p>
               <img alt="ico" src="/images/ico-priority-list-2.png">
               Thank for your flying an Angel Flight mission recently. Please complete the mission report as soon as possible. <a href="<?php echo url_for('mission_report/index');?>"> mission report</a>
            </p>           
         </div>
        </li>
        <?php }?>
        <?php //echo "<pre>"; print_r($mission_report_dues);?>
    </ul>
  </div>
</div>
