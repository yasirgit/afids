<?php use_helper('Pilot')?>

<?php $miss_array = $sf_data->getRaw('miss_array');?>
<div id="body_part">
  <div class="location-matches">
    <h3>Below are the best matches based on your location</h3>
 <?php
 $camps = array();
 foreach ($miss_array as $mission){

     //check if mission is already in camp printed
     $already_printed = false;
     foreach ($camps as $key => $value){
         if ($mission->getCampId()==$value)
                 $already_printed = true;
     }
     $camps[$mission->getCampId()] = $mission->getCampId();

    $count1= 0;
    $count2 = 0;

    //if grouped camp missions are not printed yet
    if(!$already_printed){
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
                          echo date('m/d/y',strtotime($mission->getMissionDate())).'('.date('l',strtotime($mission->getMissionDate())).')'
                                  .' to ';
                          echo $mission->getApptDate()!=null?date('m/d/y',strtotime($mission->getApptDate())).'('.date('l',strtotime($mission->getApptDate())).')':'';
                          ?>
                          </strong>
<!--                          <strong>8/2/09</strong>-->
<!--                          (Sat) to-->
<!--                          <strong>8/3/09</strong>-->
<!--                          (Sun)-->
                        </dd>
                        <dt>Time:</dt>
                        <dd>
                            <?php echo $mission->getFlightTime() ? $mission->getFlightTime() : 'Can leave anytime'?>
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
                        </dd>
                        <dt>To:</dt>
                        <dd>
                          <strong>
                          <?php
                          $legs = $mission->getMissionLegs();
                          if($legs)$destination_airport = $legs[0]->getToAirportId();
                          $airport_from = AirportPeer::retrieveByPK($destination_airport);
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
                          <strong>
                            Varied
                            </strong>
                        </dd>
                        <dt>Weight:</dt>
                        <dd>
                          <strong>
                            Varied
                            </strong>
                        </dd>
                      </dl>
                    </td>
                    <td class="cell-4">
                      <dl class="mission-ad-info">
                        <dt>Distance:</dt>
                        <dd>
                          <strong>
                            Varied
                            </strong>
                        </dd>
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
                </div>
              </div>
<!--              END BG-->
            </div>
<!--            END FRAME-->
          </div>
<!--          end holder-->
<br/>

 <?php
    }//end if already
    
    }//end foreach
    ?>
<!--            *******************************-->
    </div>
    </div>

<!-- end best match-->

    <!--END HOLDER-->

