<?php use_helper('Form');?>
<?php use_helper('Javascript', 'Form') ?>
<?php use_helper('jQuery', 'Form') ?>
  
<div class="location-matches">
<!--            *******************************-->
<h3>Below are the best matches based on your location</h3>
 <?php 
for($i=0;$i<count($camps);$i++){
  $camp = $camps[$i];
$missions = MissionPeer::getByCampId($camp->getId());
        ?>
        <?php 
        $miss_dates = array();
        $appt_dates = array();
        $count1= 0;
        $count2 = 0;

        foreach ($missions as $miss){
          $mission = $miss;

          if($mission->getMissionDate()){
            $miss_dates[$count1] = $mission->getMissionDate();
            $count1++;
          }
          if($mission->getApptDate()){
            $appt_dates[$count2] = $mission->getApptDate();
            $count2++;
          }

          if(isset($miss_dates[$count1-1])){
            $mission_date = $miss_dates[$count1-1];
          }
          if(isset($appt_dates[$count2-1])){
            $appt_date = $appt_dates[$count2-1];
          }
        }
        ?>
         <div class="holder">
        <dl class="mission-criteria">
          <dt>Itinerary:</dt>
          <dd>Multiple</dd>
          <dt>Patient Type</dt>
          <dd>Camper</dd>
          <dt>Illness:</dt>
          <dd>Multiple</dd>
          <dt>Mission Type:</dt>
          <dd>Camp</dd>
          <dt>Camp Name:</dt>
          <dd>
          <?php 
          if(isset($mission)){
            echo $mission->getCamp()->getCampName();
          }
          ?>
          </dd>
          </dl>
          <div class="location-matches-info">
            <div class="frame">
              <div class="bg">
                <div>
               <table class="leg-info">
                <tbody>
                  <tr>
                    <td class="cell-1">
                      <strong class="leg">
                      
                      </strong>
                      <dl class="mission-time">
                        <dt>Date:</dt>
                        <dd>
                          <strong>
                          <?php 
                          echo date('m/d/y',strtotime($mission_date)).'('.date('l',strtotime($mission_date)).' to '.date('m/d/y',strtotime($appt_date)).'('.date('l',strtotime($appt_date)).')';
                          ?>
                          </strong>
<!--                          <strong>8/2/09</strong>-->
<!--                          (Sat) to-->
<!--                          <strong>8/3/09</strong>-->
<!--                          (Sun)-->
                        </dd>
                        <dt>Time:</dt>
                        <dd>
                         -- 
                        </dd>
                        </dl>
                    </td>
                    <td class="cell-2">
                      <dl class="destination-list">
                        <dt>From:</dt>
                        <dd>
                          <strong>
                            Varied
                            </strong>
                            <?php 
                            $airport_from = AirportPeer::retrieveByPK($destination_airport);
                            ?>
                          <em>PST</em>
                        </dd>
                        <dt>To:</dt>
                        <dd>
                          <strong>
                          <?php 
                          if(isset($airport_from)){
                            echo $airport_from->getIdent();
                          }
                          ?>
                          </strong>
                          <?php 
                          if(isset($airport_from)){
                            if($airport_from->getCity() || $airport_from->getState()){
                              echo '( '.$airport_from->getCity() . ', ' . $airport_from->getState() .' )';
                            }
                          }
                          ?>
                          <em>PST</em>                      
                        </dd>
                      </dl>
                    </td>
                    <td class="cell-3">
                      <dl class="mission-ad-info">
                        <dt>Passengers:</dt>
                        <dd>
                         <?php
                         foreach ($missions as $mission){
                           if(isset($mission)){
                             if($mission->getPassengerId()){
                               $pass = PassengerPeer::retrieveByPK($mission->getPassengerId());
                             }
                             if(isset($pass)){
                               $comps = CompanionPeer::getByPassId($pass->getId());
                               $county = 0;
                               $weg = 0;
                               foreach ($comps as $comp){
                                 $county ++;
                                 $weg = $weg + $comp->getWeight();
                               }
                             }
                           }
                         }
                         if($county>0){
                           echo $county;
                         }else{
                           echo '1';
                         }
                      ?>
                        </dd>
                        <dt>Weight:</dt>
                        <dd>
                        <?php 
                        if(isset($pass) && isset($weg)){
                          echo $pass->getWeight()+$weg;
                        }elseif(isset($pass)){
                          echo $pass->getWeight();
                        }
                        ?>
                        </dd>
                      </dl>
                    </td>
                    <td class="cell-4">
                      <dl class="mission-ad-info">
                        <dt>Distance:</dt>
                        <dd>
                        mi</dd>
                        <dt>Efficiency:</dt>
                        <dd>78%</dd>
                      </dl>                    
                    </td>
                  </tr>
                </tbody>
              </table>
              </div>
              <div>
              <?php $one=0?>
              <table class="leg-comment">
                <tbody>
                  <tr>
                    <td class="cell-1"> 
<!--                    COMMY-->
                    Comment:
                    </td>
                    <td>
                       <?php if($mission->getMissionSpecificComments()):?>
                        <div id="<?php echo 'edit_comment'.$mission->getId()?>">--<?php echo $mission->getMissionSpecificComments();?>--</div>
                      <?php else:?>
                        <div id="<?php echo 'edit_comment'.$mission->getId()?>">--Click here leave comment--</div>
                      <?php endif?>
                      <?php if($one == 0):?>
                           <?php echo input_in_place_editor_tag('edit_comment'.$mission->getId(), 'pilotRequest/saveCommentMission?id='.$mission->getId(),array('save_text'=>'Save')) ?>    
                      <?php $one++?>
                      <?php endif?>
                      <?php if($mission->getMissionDate() && $mission->getApptDate()):?>  
                            <a href="<?php echo url_for('@request_group_mission?id='.$mission->getCamp()->getId())?>" class="btn-request">
                                <span>Request This Mission</span>
                            </a>
                        <?php endif;?>
                      <div align="right">
                        <a href="<?php echo url_for('@mission_view?id='.$mission->getId())?>">
                          <span>
                          <?php if($mission->getMissionDate() == null):?>
                          <span>
                              Mission Date Required
                          </span>
                          <?php elseif($mission->getApptDate() == null):?>
                          <span>
                              Appointment Date Required
                          </span>
                          <?php elseif($mission->getMissionDate() == null && $mission->getApptDate() == mull):?>
                           <span>
                              Appointment Date and Mission Date Required
                          </span>
                          <?php endif;?>
                        </a>
                      </div>
                    </td>
                  </tr>
                </tbody>
              </table>
              </div>
<!--              end comment-->
              </dl>
                </div>
              </div>
<!--              END BG-->
            </div>
<!--            END FRAME-->
          </div>
<!--          end holder-->
<br/>

 <?php }?>
<!--            *******************************-->