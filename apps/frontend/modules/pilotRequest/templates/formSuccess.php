<!-- sort and pagination-->
<div class="pager">
  People per page:
  <?php foreach ($max_array as $i => $v) {
    if ($i) echo ' | ';
    echo link_to_if($max != $v, $v, '@default_index?module=person&max='.$v);
  }?>
  <div>
    <form action="<?php echo url_for('@default_index?module=person')?>">
      <?php echo link_to('Previous', '@default_index?module=person&page='.$pager->getPreviousPage(), array('class' => 'btn-pager-prev'))?>
      <input type="text" name="page" class="active-page" value="<?php echo $pager->getPage()?>"/>
      <strong>of <?php echo link_to($pager->getLastPage(), '@default_index?module=person&page='.$pager->getLastPage())?></strong>
      <?php echo link_to('Next', '@default_index?module=person&page='.$pager->getNextPage(), array('class' => 'btn-pager-next'))?>
      <input type="submit" class="hide"/>
    </form>
  </div>
</div>
<?php if ($pager->getNbResults()) {?>
<form id="sort" method="post">
    <fieldset>
      <div class="sort">
        <label for="form-item-14">Sort by:</label>
        <select id="sort_by" name="sort_by">
          <option value="0">Date (earliest - latest)</option>
          <option value="1">Date (latest - earliest)</option>
        </select>
        <div class="pager">
          <div>
            <a class="btn-pager-prev" href="#">Previous</a>
            <input type="text" name="page" class="active-page" value="<?php echo $pager->getPage()?>"/>
            <strong>
            of
            <a href="#">12</a>
            </strong>
          <a class="btn-pager-next" href="#">Next</a>
          </div>
        </div>
        <!-- END PAGER -->
      </div>
      <!-- END SORT-->
      <input class="hide" type="submit" value="submit"/>
    </fieldset>
  </form>
<?php }?>
 <div class="location-matches">
<h3>Below are the best matches based on your location</h3>
      <?php if(isset($miss_array)):?>
      <?php 
      foreach ($miss_array as $mission_id){
        ?>
      <div class="holder">
        <dl class="mission-criteria">
          <dt>Itinerary:</dt>
          <dd>
          <?php
          $mission = MissionPeer::retrieveByPK($mission_id);
          if(isset($mission)){
            if($mission->getItineraryId()){
              $iti = ItineraryPeer::retrieveByPK($mission->getItineraryId());
              if(isset($iti)){
                echo $iti->getId();
              }
            }
          }
           ?>
          </dd>
          <dt>Mission:</dt>
          <dd>
          <?php
          $mission = MissionPeer::retrieveByPK($mission_id);
          if(isset($mission)){
            echo $mission->getId();
          }
           ?>
          </dd>
          <dt>Passenger Type:</dt>
          <dd>
          <?php
          if(isset($mission)){
            if($mission->getPassengerId()){
              $pass = $mission->getPassenger();
              $pass_type = $pass->getPassengerType();

              if(isset($pass_type)){
                echo $pass_type->getName();
              }
            }
          }
          ?>
          </dd>
          <dt>Illness:</dt>
          <dd>
           <?php 
           if(isset($mission)){
             if($mission->getPassengerId()){
               $pass = $mission->getPassenger();
               if(isset($pass)){
                 echo $pass->getIllness();
               }
             }
           }
          ?>
          </dd>
          <dt>Mission Type:</dt>
          <dd>
           <?php 
           if(isset($mission)){
             if($mission->getMissionTypeId()){
               $miss_type = $mission->getMissionType();
               if(isset($miss_type)){
                 echo $miss_type->getName();
               }
             }
           }
          ?>
          </dd>
        </dl>
        <?php 
        $mission_legs = MissionLegPeer::getbyMissId($mission->getId());
        ?>
        <div class="location-matches-info">
          <div class="frame">
            <div class="bg">
               <div class="route">
                <strong>TO TREATMENT:</strong>
                <ul>
                  <li>
                    <img alt="ico" src="/images/ico-home.gif"/>
                  </li>
                  <li>
                      <?php foreach ($mission_legs as $mission_leg):?>
                        <?php if($mission_leg->getTransportation() == 'ground_mission' && $mission_leg->getGroundOrigin() == 'patient' && $mission_leg->getGroundDestination() == 'lodging'):?>
                          <?php if(isset($mission_leg) && $mission_leg->getCancelled() == null):?> 
                           <a href="javascript:getInfo(<?php echo $mission->getID().$mission_leg->getLegNumber()?>)" id="leg_.<?php echo $mission->getID().$mission_leg->getLegNumber()?>">    
                              <img alt="ico" src="/images/ico-car-active.gif"/>
                           </a>    
                           <?php else:?>
                           <a href="javascript:getInfo(<?php echo $mission->getID().$mission_leg->getLegNumber()?>)" id="leg_.<?php echo $mission->getID().$mission_leg->getLegNumber()?>">    
                              <img alt="ico" src="/images/ico-car.gif"/>
                           </a>    
                           <?php endif;?>
                        <?php endif;?>
                      <?php endforeach;?>
                  </li>
                  <?php foreach ($mission_legs as $mission_leg):?>
                    <?php if(isset($mission_leg) && $mission_leg->getCancelled() == null && $mission_leg->getTransportation() == 'air_mission' && $mission_leg->getId() == $mission_leg->getReverseFrom()):?>
                    <li class="<?php echo $class?>" id="<?php echo 'on_leg'.$mission->getId().$mission_leg->getLegNumber()?>">
                      <a class="leg-link" href="javascript:getInfo(<?php echo $mission->getId().$mission_leg->getLegNumber()?>)" id="<?php echo 'leg_'.$mission->getId().$mission_leg->getLegNumber()?>" ><?php echo 'Leg '.$mission_leg->getLegNumber()?></a>
                      <?php 
                      $mission_legs = MissionLegPeer::getbyMissId($mission->getId());
                      $count = 0;
                      $last_leg = 0;
                      ?>
                      <?php foreach ($mission_legs as $own_leg):?>
                        <?php $count++;?>
                      <?php endforeach;?>
                    </li>
                    <?php elseif($mission_leg->getTransportation() == 'air_mission' && $mission_leg->getId() == $mission_leg->getReverseFrom()):?>
                    <li class="disabled" id="<?php echo 'off_leg'.$mission->getId().$mission_leg->getLegNumber()?>">
                      <a class="leg-link" href="javascript:getInfo(<?php echo $mission->getId().$mission_leg->getLegNumber()?>)" id="<?php echo 'leg_'.$mission->getId().$mission_leg->getLegNumber()?>" ><?php echo 'Leg '.$mission_leg->getLegNumber()?></a>
                    </li>
                    <?php endif;?>
                  <?php endforeach;?>
                  <li>
                    <a href="#">
                    <?php foreach ($mission_legs as $mission_leg):?>
                        <?php if($mission_leg->getTransportation() == 'ground_mission' && $mission_leg->getGroundOrigin() == 'lodging' && $mission_leg->getGroundDestination() == 'facility'):?>
                          <?php if(isset($mission_leg) && $mission_leg->getCancelled() == null):?> 
                           <a href="javascript:getInfo(<?php echo $mission->getID().$mission_leg->getLegNumber()?>)" id="leg_.<?php echo $mission->getID().$mission_leg->getLegNumber()?>">    
                              <img alt="ico" src="/images/ico-car-active.gif"/>
                           </a>    
                           <?php else:?>
                           <a href="javascript:getInfo(<?php echo $mission->getID().$mission_leg->getLegNumber()?>)" id="leg_.<?php echo $mission->getID().$mission_leg->getLegNumber()?>">    
                              <img alt="ico" src="/images/ico-car.gif"/>
                           </a>    
                           <?php endif;?>
                        <?php endif;?>
                      <?php endforeach;?>
                    </a>
                  </li>
                  <li>
                    <img alt="ico" src="/images/ico-hospital.gif"/>
                  </li>
                </ul>
               </div>
<!--               END ROUTE-->
             <?php $dis = 'block'?>
             <?php 
             foreach ($mission_legs as $leg){
             ?>
                  <?php foreach ($mission_legs as $own_leg):?>
                        <?php $last_leg = $own_leg->getLegNumber();?>
                  <?php endforeach;?>
                  <?php foreach ($mission_legs as $own_leg):?>
                        <?php $first_leg = $own_leg->getLegNumber();?>
                        <?php break;?>
                  <?php endforeach;?>
                      <input type="hidden" id="<?php echo 'leg_max'.$mission->getId().$leg->getLegNumber()?>" value="<?php echo $last_leg?>">
                      <input type="hidden" id="<?php echo 'leg_min'.$mission->getId().$leg->getLegNumber()?>" value="<?php echo $first_leg?>">
             <?php if($leg->getCancelled()){
               $display = 'leg-info disabled';
             }else{
               $display = 'leg-info';
             }
             ?>
             <div id="<?php echo 'leg_info'.$mission->getId().$leg->getLegNumber()?>" style="display:<?php echo $dis?>">
              <table class="<?php echo $display?>">
                <tbody>
                  <tr>
                    <td class="cell-1">
                      <strong class="leg">
                       <?php 
                       if($leg->getLegNumber()){
                         echo 'Leg '.$leg->getLegNumber();
                       }
                       ?>
                      </strong>
                      <dl class="mission-time">
                        <dt>Date:</dt>
                        <dd>
                          <strong>
                          <?php 
                          $miss = MissionPeer::retrieveByPK($leg->getMissionId());
                          if(isset($miss)){
                            if($miss->getMissionDate()){
                              echo $miss->getMissionDate('m/d/y') .' to '.$miss->getApptDate('m/d/y');
                            }else{
                              echo '--';
                            }
                          }
                          ?>
                          </strong>
<!--                          <strong>8/2/09</strong>-->
<!--                          (Sat) to-->
<!--                          <strong>8/3/09</strong>-->
<!--                          (Sun)-->
                        </dd>
                        <dt>Time:</dt>
                        <dd>
                        <?php 
                        if(isset($miss)){
                          if($miss->getFlightTime()){
                            echo $miss->getFlightTime();
                          }else{
                            echo 'Can leave anytime';
                          }
                        }
                        ?>
                        </dd>
                      </dl>
                    </td>
                    <td class="cell-2">
                      <dl class="destination-list">
                        <dt>From:</dt>
                        <dd>
                          <strong>
                          <?php if($leg->getTransportation() == 'air_mission'):?>
                            <?php 
                            if($leg->getFromAirportId()){
                              $airport_from = AirportPeer::retrieveByPK($leg->getFromAirportId());
                              if(isset($airport_from)){
                                echo $airport_from->getIdent();
                              }
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
                          <?php elseif($leg->getTransportation() == 'ground_mission'):?>
                            <?php echo $leg->getGroundOrigin()?>
                          <?php endif?>
                          <em>PST</em>
                        </dd>
                        <dt>To:</dt>
                        <dd>
                          <strong>
                          <?php if($leg->getTransportation() == 'air_mission'):?>
                          <?php 
                          if($leg->getToAirportId()){
                            $airport_to = AirportPeer::retrieveByPK($leg->getToAirportId());
                            if(isset($airport_to)){
                              echo $airport_to->getIdent();
                            }
                          }
                          ?>
                          </strong>
                          <?php 
                          if(isset($airport_to)){
                            if($airport_to->getCity() || $airport_to->getState()){
                              echo '( '.$airport_to->getCity() . ', ' . $airport_to->getState() .' )';
                            }
                          }
                          ?>
                          <?php elseif($leg->getTransportation() == 'ground_mission'):?>
                            <?php echo $leg->getGroundDestination()?>
                          <?php endif?>
                          <em>PST</em>                      
                        </dd>
                      </dl>
                    </td>
                    <td class="cell-3">
                      <dl class="mission-ad-info">
                        <dt>Passengers:</dt>
                        <dd>
                        <?php
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
                            if($county != 0 && isset($pass)){
                              echo 1+$county;
                            }
                          }
                        }
                      ?>
                        </dd>
                        <dt>Weight:</dt>
                        <dd>
                        <?php 
                        if(isset($pass) && isset($weg)){
                          echo $pass->getWeight()+$weg;
                        }else{
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
                        325</dd>
                        <dt>Efficiency:</dt>
                        <dd>78%</dd>
                      </dl>                    
                    </td>
                  </tr>
                </tbody>
              </table>
              </div>
              <div id="<?php echo 'leg_com'.$mission->getId().$leg->getLegNumber()?>" style="display:<?php echo $dis?>">
              <table class="leg-comment">
                <tbody>
                  <tr>
                    <td class="cell-1"> 
                    Comment:
                    </td>
                    <td>
                    <?php if($display == 'leg-info'):?>
                      <?php if($mission->getMissionSpecificComments()):?>
                          <?php echo $mission->getMissionSpecificComments()?>
                      <?php else:?>
                      <span>Special conditions and circumstances listed here.</span>
                      <?php endif?>
                      <?php if($mission->getMissionDate() && $mission->getApptDate()):?>  
                      <?php if($leg->getTransportation() == 'air_mission'):?>
                           <?php 
                            $is_has_requested = PilotRequestPeer::getByMemnerIdLegId($member_id,$leg->getId());
                            ?>
                            <?php if(!isset($is_has_requested)):?>
                            <a href="<?php echo url_for('@pilot_request?id='.$leg->getId())?>" class="btn-request">
                                <span>Request This Mission</span>
                            </a>
                            <?php else:?>
                            <a href="#" class="btn-request">
                              <span>Already Requested!</span>
                           </a>
                            <?php endif;?>
                      <?php endif;?>
                      <?php else:?>
                      <div align="right">
                        
                        <a href="<?php echo url_for('@mission_view?id='.$mission->getId())?>">
                          <span>
                          <?php if(!$mission->getMissionDate()):?>
                          <span>
                              Mission Date Required
                          </span>
                          <?php elseif(!$mission->getApptDate()):?>
                          <span>
                              Appointment Date Required
                          </span>
                          <?php elseif(!$mission->getMissionDate() && !$mission->getApptDate()):?>
                           <span>
                              Appointment Date and Mission Date Required
                          </span>
                          <?php endif;?>
                        </a>
                      </div>
                      <?php endif?>
                    <?php endif?>
                    </td>
                  </tr>
                </tbody>
              </table>
              </div>
             <?php $dis = 'none';?>
              <?php };?>
              <div class="route">
                <strong>RETURN HOME:</strong>
              
                <ul>
                  <li>
                    <img alt="ico" src="/images/ico-hospital.gif"/>
                  </li>
                  <li>
                  <?php $down_legs = MissionLegPeer::getbyMissIdDown($mission->getId())?>
                   <?php foreach ($mission_legs as $mission_leg):?>
                        <?php if($mission_leg->getTransportation() == 'ground_mission' && $mission_leg->getGroundOrigin() == 'facility' && $mission_leg->getGroundDestination() == 'lodging'):?>
                          <?php if(isset($mission_leg) && $mission_leg->getCancelled() == null):?> 
                           <a href="javascript:getInfo(<?php echo $mission->getID().$mission_leg->getLegNumber()?>)" id="leg_.<?php echo $mission->getID().$mission_leg->getLegNumber()?>">    
                              <img alt="ico" src="/images/ico-car-active.gif"/>
                           </a>    
                           <?php else:?>
                           <a href="javascript:getInfo(<?php echo $mission->getID().$mission_leg->getLegNumber()?>)" id="leg_.<?php echo $mission->getID().$mission_leg->getLegNumber()?>">    
                              <img alt="ico" src="/images/ico-car.gif"/>
                           </a>   
                           <?php endif;?>
                        <?php endif;?>
                      <?php endforeach;?>
                  </li>
                  <li class="disabled">
                  <?php foreach ($down_legs as $mission_leg):?>
                    <?php if(isset($mission_leg) && $mission_leg->getCancelled() == null && $mission_leg->getTransportation() == 'air_mission' && $mission_leg->getId() != $mission_leg->getReverseFrom()):?>
                    <li class="" id="<?php echo 'on_leg'.$mission->getId().$mission_leg->getLegNumber()?>">
                      <a class="leg-link" href="javascript:getInfo(<?php echo $mission->getId().$mission_leg->getLegNumber()?>)" id="<?php echo 'leg_'.$mission->getId().$mission_leg->getLegNumber()?>" ><?php echo 'Leg '.$mission_leg->getLegNumber()?></a>
                      <?php 
                      $mission_legs = MissionLegPeer::getbyMissId($mission->getId());
                      $count = 0;
                      $last_leg = 0;
                      ?>
                      <?php foreach ($mission_legs as $own_leg):?>
                        <?php $count++;?>
                      <?php endforeach;?>
                    </li>
                    <?php elseif($mission_leg->getTransportation() == 'air_mission' && $mission_leg->getId() != $mission_leg->getReverseFrom()):?>
                    <li class="disabled" id="<?php echo 'off_leg'.$mission->getId().$mission_leg->getLegNumber()?>">
                      <a class="leg-link" href="javascript:getInfo(<?php echo $mission->getId().$mission_leg->getLegNumber()?>)" id="<?php echo 'leg_'.$mission->getId().$mission_leg->getLegNumber()?>" ><?php echo 'Leg '.$mission_leg->getLegNumber()?></a>
                    </li>
                    <?php endif;?>
                  <?php endforeach;?>
                  </li>
                  <li>
                    <?php foreach ($mission_legs as $mission_leg):?>
                        <?php if($mission_leg->getTransportation() == 'ground_mission' && $mission_leg->getGroundOrigin() == 'lodging' && $mission_leg->getGroundDestination() == 'patient'):?>
                          <?php if(isset($mission_leg) && $mission_leg->getCancelled() == null):?> 
                           <a href="javascript:getInfo(<?php echo $mission->getID().$mission_leg->getLegNumber()?>)" id="leg_.<?php echo $mission->getID().$mission_leg->getLegNumber()?>">    
                              <img alt="ico" src="/images/ico-car-active.gif"/>
                           </a>    
                           <?php else:?>
                           <a href="javascript:getInfo(<?php echo $mission->getID().$mission_leg->getLegNumber()?>)" id="leg_.<?php echo $mission->getID().$mission_leg->getLegNumber()?>">    
                              <img alt="ico" src="/images/ico-car.gif"/>
                           </a>    
                           <?php endif;?>
                        <?php endif;?>
                      <?php endforeach;?>
                  </li>
                  <li>
                      <img alt="ico" src="/images/ico-home.gif"/>  
                  </li>
                </ul>
              </div>
<!--              END ROUTE-->
            </div>
<!--            END BG-->
          </div>
<!--          END FRAME-->
        </div>
<!--        Location matches info-->
        <ul class="discussion">
          <li>
            <a href="javascript:showDiscussions(<?php echo $leg->getId()?>)">Discussion
               <?php 
               $leg_discussions = DiscussionPeer::getByLegID($leg->getId());
               if(isset($leg_discussions)){
                 $count = 0;
                 foreach ($leg_discussions as $discussion){
                   $count++;
                 }
                 if($count>0){
                   echo '( '.$count.' )';
                 }
               }
              ?>
              <?php if($count > 0):?><input type="hidden" id="<?php echo "discussion".$leg->getId()?>" value="<?php echo $count?>"/><?php endif;?>
            </a>
          </li>
          <li>
            <img alt="ico" src="/images/ico-split.gif"/>
            A split mission has been suggested
          </li>
        </ul>
         <div class="comment-box" style="display:none" id="<?php echo "comments_1".$leg->getId()?>">
             <a class="btn-close" href="javascript:close1(<?php echo $leg->getId()?>)">Close</a>
             <div class="wrap">
             <?php if(isset($leg_discussions)):?>
             <?php foreach ($leg_discussions as $dis):?>
              <div class="box">
                <ul>
                  <li>
                  <h4>
                  <?php 
                  if($dis->getUserId()){
                    $person = PersonPeer::retrieveByPK($dis->getUserId());
                    if(isset($person)){
                      echo $person->getTitle().', '.$person->getLastName().' '.$person->getFirstName();
                    }
                  }
                  ?>
                  </h4>
                  <p>
                  <?php
                  if($dis->getComment()){
                    echo $dis->getComment();
                  }
                  ?>
                  </p>
                  <em class="time">
                  <?php if ($dis->getCreatedAt()) {
                    //                    $offset = strtotime(date('Y-m-d')) - strtotime($dis->getCreatedAt());
                    //                    echo date('Y-m-d', strtotime(now - $dis->getCreatedAt()));
                    echo $dis->getCreatedAt();
                  }?>
                  </em>
                  </li>
                </ul>
              </div>
              <?php endforeach;?>
              <?php endif?>
               <form action="<?php echo url_for('pilotRequest/addDiscussion')?>" method="post" id="<?php echo 'dis_form1'.$leg->getId()?>">
                  <label for="form-item-15">Add Comment:</label>
                  <?php if(isset($leg)):?><input type="hidden" name="dis_leg_id" value="<?php echo $leg->getId()?>"/><?php endif?>
                  <?php if($sf_user->getId()):?><input type="hidden" name="user_id" value="<?php echo $sf_user->getId()?>"/><?php endif?>
                  <textarea rows="10" cols="10" name="comment_dis" id="comment_dis"></textarea>
                  <input id="comm1" name="comm1" type="hidden" />
                  <a href="#" onclick="jQuery('#<?php echo 'dis_form1'.$leg->getId()?>').submit();return false;" class="btn-action">
                  <span>SUBMIT</span><strong>&nbsp;</strong>
                  </a>
                </form>
<!--              END BOX-->
             </div>
          </div>
      </div>
      <!--END HOLDER-->
      <br/>
      <?php
      };
       ?>
       <?php endif;?>
 </div>
   