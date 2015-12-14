<?php use_helper('Pilot')?>
<div class="add-mission">
<h2>Mission Request Added</h2>
<br/>
<?php if(isset($cur_leg)):?>
  <?php 
  if($cur_leg->getMissionId()){
    $mission = MissionPeer::retrieveByPK($cur_leg->getMissionId());
  }
  ?>
        <table class="leg-info">
                <tbody>
                  <tr>
                    <td class="cell-1">
                      <strong class="leg">
                       <?php 
                       if($cur_leg->getLegNumber()){
                         echo 'Leg '.$cur_leg->getLegNumber();
                       }
                       ?>
                      </strong>
                      <dl class="mission-time">
                        <dt>Date:</dt>
                        <dd>
                          <strong>
                          <?php 
                          $miss = MissionPeer::retrieveByPK($cur_leg->getMissionId());
                          if(isset($miss)){
                            if($miss->getMissionDate()){
                              echo $miss->getMissionDate('m/d/y');
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
                          <?php 
                          if($cur_leg->getFromAirportId()){
                            $airport_from = AirportPeer::retrieveByPK($cur_leg->getFromAirportId());
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
                          <em>PST</em>
                        </dd>
                        <dt>To:</dt>
                        <dd>
                          <strong>
                          <?php 
                          if($cur_leg->getToAirportId()){
                            $airport_to = AirportPeer::retrieveByPK($cur_leg->getToAirportId());
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
                          <?php
                            if ($cur_leg->getTransportation() == 'air_mission') {
                              $fa = $cur_leg->getAirportRelatedByFromAirportId();
                              $ta = $cur_leg->getAirportRelatedByToAirportId();
                              if($fa && $ta)
                              echo distance($fa->getLatitude(), $fa->getLongitude(), $ta->getLatitude(), $ta->getLongitude()).'mi';
                            }
                            ?>
                        </dd>
                        <dt>Efficiency:</dt>
                        <dd>
                          <?php if ($airport && $cur_leg->getTransportation() == 'air_mission') {
                              $fa = $cur_leg->getAirportRelatedByFromAirportId();
                              $ta = $cur_leg->getAirportRelatedByToAirportId();
                              if($fa && $ta)
                              echo efficiency($airport->getLatitude(), $airport->getLongitude(), $fa->getLatitude(), $fa->getLongitude(), $ta->getLatitude(), $ta->getLongitude()).'%';
                            }else{
                              echo "-";
                            }?>
                        </dd>
                      </dl>                    
                    </td>
                  </tr>
                </tbody>
              </table>
              <table class="leg-comment" id="<?php echo 'leg_com'.$mission->getId().$cur_leg->getLegNumber()?>">
                <tbody>
                  <tr>
                    <td class="cell-1"> 
                    Comment:
                    </td>
                    <td>
                    <span>Special conditions and circumstances listed here.</span>
                    </td>
                  </tr>
                </tbody>
              </table>
   </div>
   <?php if($cur_leg->getFromAirportId() && $cur_leg->getToAirportId()){?>
       <p>
       Thank you for requesting this mission. You will receive an email confirmation shortly. This itinerary also includes the following open missions. Please review and see if you are available to add a leg.
       </p>
   <?php }else{?>
       <p>
       Thank you for requesting this mission. You will receive an email confirmation shortly.
       </p>
   <?php }?>
   <?php $c =0?>
      <?php foreach ($other_legs as $leg):?>
         <?php $c++?>
      <?php endforeach;?>
   <?php if(isset($other_legs)):?>
    <?php if($c>1):?><h2>Missions Related to this Mission</h2><?php endif?>
   <br/>
   <?php foreach ($other_legs as $leg):?>
   <?php if($leg->getLegNumber() != $cur_leg->getLegNumber()):?>
        <table class="leg-info">
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
                              echo $miss->getMissionDate('m/d/y');
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
                          <?php 
                          if($cur_leg->getFromAirportId()){
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
                          <em>PST</em>
                        </dd>
                        <dt>To:</dt>
                        <dd>
                          <strong>
                          <?php 
                          if($cur_leg->getToAirportId()){
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
                          <?php
                            if ($leg->getTransportation() == 'air_mission') {
                              $fa = $leg->getAirportRelatedByFromAirportId();
                              $ta = $leg->getAirportRelatedByToAirportId();
                              if($fa && $ta)
                              echo distance($fa->getLatitude(), $fa->getLongitude(), $ta->getLatitude(), $ta->getLongitude()).'mi';
                            }else{
                              echo "-";
                            }
                            ?>
                        </dd>
                        <dt>Efficiency:</dt>
                        <dd>
                          <?php if ($airport && $leg->getTransportation() == 'air_mission') {
                              $fa = $leg->getAirportRelatedByFromAirportId();
                              $ta = $leg->getAirportRelatedByToAirportId();
                              if($fa && $ta)
                                 echo efficiency($airport->getLatitude(), $airport->getLongitude(), $fa->getLatitude(), $fa->getLongitude(), $ta->getLatitude(), $ta->getLongitude()).'%';
                            }else{
                              echo "-";
                            }?>
                        </dd>
                      </dl>                    
                    </td>
                  </tr>
                </tbody>
              </table>
              <table class="leg-comment" id="<?php echo 'leg_com'.$mission->getId().$leg->getLegNumber()?>">
                <tbody>
                  <tr>
                    <td class="cell-1"> 
                    Comment:
                    </td>
                    <td>
                    <span>Special conditions and circumstances listed here.</span>
                    <a class="btn-request" href="<?php echo url_for('@pilot_request?id='.$leg->getId())?>">
                        <span>Request This Mission</span>
                    </a>
                    </td>
                  </tr>
                </tbody>
              </table>
              <br/>
      <?php endif;?>
   <?php endforeach;?>
<?php endif;?>
<?php endif;?>