<div class="missions-available">
<div class="wrap">
  <h2>Missions Available</h2>
    <form action="#">
      <fieldset>
        <div class="missions-available-entry">
          <input id="form-item-1" type="checkbox"/>
          <label for="form-item-1">Ignore my availability</label>
          <a class="match-flights" href="#">Show missions matching my personal flights</a>
          <input class="hide" type="submit" value="submit"/>
        </div>
      </fieldset>
    </form>
</div>
    <form action="#">
      <fieldset>
        <div class="missions-available-filter">
          <div class="bg">
            <div class="wrap">
              <div class="date-range">
                <label for="form-item-2">Date Range:</label>
                <input id="form-item-2" class="text" type="text"/>
                <strong class="to">to</strong>
                <input class="text" type="text" title="date-range"/>
              </div>
              <div class="flight-days">
                <strong>Flight Days:</strong>
                <ul>
                  <li>
                    <a href="#">M</a>
                  </li>
                  <li>
                    <a href="#">T</a>
                  </li>
                  <li>
                    <a href="#">W</a>
                  </li>
                  <li>
                    <a href="#">Th</a>
                  </li>
                  <li>
                    <a href="#">F</a>
                  </li>
                  <li class="active">
                    <a href="#">Sa</a>
                  </li>
                  <li class="active">
                    <a href="#">Su</a>
                  </li>
                </ul>
              </div>
              <div class="location">
                <div class="wrap">
                  <strong>Location:</strong>
                    <ul>
                      <li class="active">
                        <a href="#">Wing</a>
                      </li>
                      <li>
                        <a href="#">Airport</a>
                      </li>
                      <li>
                        <a href="#">City/State/Zip</a>
                      </li>
                    </ul>
                </div>
                <select title="location">
                  <option>All</option>
                </select>
              </div>
              <div class="location-as">
                <strong>Location as:</strong>
                  <ul>
                    <li>
                      <input id="form-item-3" type="checkbox" checked="checked"/>
                      <label for="form-item-3">Orgin</label>
                    </li>
                    <li>
                      <input id="form-item-4" type="checkbox" checked="checked"/>
                      <label for="form-item-4">Destination</label>
                    </li>
                  </ul>
              </div>
            </div>
<!--            END OF WRAP-->
            <div class="ad-mission-filter">
              <div class="holder">
                <strong>Needs:</strong>
                <ul>
                  <li>
                    <input id="form-item-5" type="checkbox" checked="checkbox"/>
                    <label for="form-item-5">Pilot</label>
                  </li>
                  <li>
                    <input id="form-item-6" type="checkbox"/>
                    <label for="form-item-6">Mission Assistant</label>
                  </li>
                  <li>
                    <input id="form-item-7" type="checkbox"/>
                    <label for="form-item-7">IFR Backup</label>
                  </li>
                </ul>
                <strong>Show:</strong>
                <a href="#" class="all-missions">All Mission Types</a>
                <ul>
                  <li>
                    <input id="form-item-8" type="checkbox" checked="checkbox"/>
                    <label for="form-item-8">Filled</label>
                  </li>
                  <li>
                    <input id="form-item-9" type="checkbox" checked="checkbox"/>
                    <label for="form-item-9">Open</label>
                  </li>
                </ul>
              </div>
            </div>
<!--           End Ad mission filter-->
            <div class="characteristics">
              <div class="holder">
                <div>
                     <label for="form-item-10">Maximum Passengers:</label>
                     <input id="form-item-10" type="text" class="text" value="- any -"/>
                </div>
                <div>
                     <label for="form-item-11">Maximum Weight:</label>
                     <input id="form-item-11" type="text" class="text" value="- any -"/>
                     <strong>lbs</strong>
                </div>
                <div>
                     <label for="form-item-12">Maximum Distance:</label>
                     <input id="form-item-12" type="text" class="text" value="- any -"/>
                     <strong>miles</strong>
                </div>
                <div>
                     <label for="form-item-13">Maximum Efficiency:</label>
                     <input id="form-item-13" type="text" class="text" value="- any -"/>
                     <strong>%</strong>
                </div>
             </div>
          </div>
<!--          End characteristics-->
          <input class="hide" type="hidden" value="submit"/>
        </div>
<!--        END BG-->
      </div>
      </fieldset>
    </form>
    <div class="filter-options">
      <ul>
        <li>
          <a href="#">Save filter settings</a>
        </li>
        <li>
          <a href="#">Reset filter</a>
        </li>
        <li>
          <a href="#">Hide Filters</a>
        </li>
      </ul>
    </div>
    <form action="#">
      <fieldset>
        <div class="sort">
          <label for="form-item-14">Sort by:</label>
          <select id="form-item-14">
            <option>Date (earliest - latest)</option>
          </select>
          <div class="pager">
            <div>
              <a class="btn-pager-prev" href="#">Previous</a>
              <span class="active-page">1</span>
              <strong>
              of 
              <a href="#">12</a>
              </strong>
              <a class="btn-pager-next" href="#">Next</a>
            </div>
          </div>
<!--          END PAGER-->
        </div>
<!--        END SORT-->
        <input class="hide" type="submit" value="submit"/>
      </fieldset>
    </form>
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
                    <a href="#">
                      <img alt="ico" src="/images/ico-car.gif"/>
                    </a>
                  </li>
                  <?php foreach ($mission_legs as $mission_leg):?>
                  <li>
                    <?php if(isset($mission_leg)):?><a class="leg-link" href="javascript:getInfo(<?php echo $mission->getId().$mission_leg->getLegNumber()?>)" id="<?php echo 'leg_'.$mission->getId().$mission_leg->getLegNumber()?>" ><?php echo 'Leg '.$mission_leg->getLegNumber()?></a><?php endif;?>
                  </li>
                  <?php endforeach;?>
                  <li>
                    <a href="#">
                      <img alt="ico" src="/images/ico-car-active.gif"/>
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
              <table class="leg-info" id="<?php echo 'leg_info'.$mission->getId().$leg->getLegNumber()?>" style="display:<?php echo $dis?>">
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
                          <em>PST</em>
                        </dd>
                        <dt>To:</dt>
                        <dd>
                          <strong>
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
                        <dd>325 mi</dd>
                        <dt>Efficiency:</dt>
                        <dd>78%</dd>
                      </dl>                    
                    </td>
                  </tr>
                </tbody>
              </table>
              <table class="leg-comment" id="<?php echo 'leg_com'.$mission->getId().$leg->getLegNumber()?>" style="display:<?php echo $dis?>">
                <tbody>
                  <tr>
                    <td class="cell-1"> 
                    Comment:
                    </td>
                    <td>
                    <span>Special conditions and circumstances listed here.</span>
                      <a href="<?php echo url_for('@pilot_req?id='.$leg->getId())?>" class="btn-request">
                        <span>Request This Mission</span>
                      </a>
                    </td>
                  </tr>
                </tbody>
              </table>
             <?php $dis = 'none';?>
              <?php };?>
              <div class="route">
                <strong>RETURN HOME:</strong>
                <ul>
                  <li>
                    <img alt="ico" src="/images/ico-hospital.gif"/>
                  </li>
                  <li>
                    <a href="#">
                      <img alt="ico" src="/images/ico-car.gif"/>
                    </a>
                  </li>
                  <li class="disabled">
                    <a class="leg-link" href="#">Leg 3</a>
                  </li>
                  <li>
                    <a class="leg-link" href="#">Leg 2</a>
                  </li>
                  <li>
                    <a class="leg-link" href="#">Leg 1</a>
                  </li>
                  <li>
                    <a href="#">
                      <img alt="ico" src="/images/ico-car-active.gif"/>
                    </a>
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
            <a href="#">Discussion (7)</a>
          </li>
          <li>
            <img alt="ico" src="/images/ico-split.gif"/>
            A split mission has been suggested
          </li>
        </ul>
      </div>
      <!--END HOLDER-->
      <?php
      };
       ?>
       <?php endif;?>
    </div>
    <!--      END LOCATION MARCHES-->
    <div class="interest-missions">
      <h3>Below are other missions you may be interested in</h3>
      <?php if(isset($missions)):?>
      <?php foreach ($missions as $mission):?>
      <?php 
      $has_legs = MissionLegPeer::getbyMissId($mission->getId());
      $count = 0;
      ?>
      <?php foreach ($has_legs as $lg){
        $count++;
      }
      ?>
      <?php if($count != 0):?>
      <!--      CHANGE IF CLICK DETAIL-->
        <div class="holder">
          <dl class="mission-criteria">
            <dt>Itinerary:</dt>
            <dd>
            <?php $o_mission = MissionPeer::retrieveByPK($mission->getId())?>
            <?php if(isset($o_mission)):?>
              <?php 
              if($o_mission->getItineraryId()){
                $iti = ItineraryPeer::retrieveByPK($o_mission->getItineraryId());
                if(isset($iti)){
                  echo $iti->getId();
                }
              }
              ?>
            <?php endif;?>
            </dd>
            <dt>Mission:</dt>
            <dd>
            <?php 
            if(isset($mission)){
              echo $mission->getId();
            }
            ?>
            </dd>
            <dt>Passenger Type:</dt>
            <dd>Patient</dd>
            <dt>Illness:</dt>
            <dd>Cancer</dd>
            <dt>Mission Type:</dt>
            <dd>Standard</dd>
            <dt><a href="javascript:closeAll(<?php echo $mission->getId()?>)" id="close_all">close all</a></dt>
          </dl>
          <div class="interest-missions-info">
            <div class="frame">
              <div class="bg" id="<?php echo 'bg_'.$mission->getId()?>">
                <dl class="mission-time">
                  <dt>Date:</dt>
                  <dd>
                  <strong>8/2/09</strong>
                  (Sat) to
                  <strong>8/3/09</strong>
                  (Sun)
                  </dd>
                  <dt>Time:</dt>
                  <dd>Can leave anytime</dd>
                </dl>
                <dl class="flight-path">
                  <dt>Flight Path:</dt>
                  <dd>ABC, DEF, GHI</dd>
                </dl>
                <dl class="mission-ad-info">
                  <dt>Passengers:</dt>
                  <dd>1</dd>
                  <dt>Weight:</dt>
                  <dd>117 lbs</dd>
                </dl>
                <a class="btn-dtls" href="javascript:getLegs(<?php echo $mission->getId()?>)">
                  <span>Details</span>
                </a>
              </div>
<!--              END BG-->
            </div>
<!--            End FRAME-->
          </div>
<!--          END interest-missions-info-->
<!--        END HOLDER-->
        <?php 
        if(isset($mission)){
          $o_mission_legs = MissionLegPeer::getbyMissId($mission->getId());
        }
        ?>
<!--   START INTEREST"S LEGS -->
        <div class="location-matches-info" id="<?php echo 'other_leg'.$mission->getId()?>" style="display:none">
          <div class="frame">
            <div class="bg">
               <div class="route">
                <strong>TO TREATMENT:</strong>
                <ul>
                  <li>
                    <img alt="ico" src="/images/ico-home.gif"/>
                  </li>
                  <li>
                    <a href="#">
                      <img alt="ico" src="/images/ico-car.gif"/>
                    </a>
                  </li>
                  <?php foreach ($o_mission_legs as $mission_leg):?>
                  <li>
                    <?php if(isset($mission_leg)):?><a class="leg-link" href="javascript:getOtherInfo(<?php echo $mission->getId().$mission_leg->getLegNumber()?>)" id="<?php echo 'leg_'.$mission->getId().$mission_leg->getLegNumber()?>"><?php echo 'Leg '.$mission_leg->getLegNumber()?></a><?php endif;?>
                  </li>
                  <?php endforeach;?>
                  <li>
                    <a href="#">
                      <img alt="ico" src="/images/ico-car-active.gif"/>
                    </a>
                  </li>
                  <li>
                    <img alt="ico" src="/images/ico-hospital.gif"/>
                  </li>
                </ul>
               </div>
<!--               END ROUTE-->
             <?php if(isset($o_mission_legs)):?>
             <?php 
             foreach ($o_mission_legs as $leg){
             ?>
              <table class="leg-info" id="<?php echo 'leg_o_info'.$mission->getId().$leg->getLegNumber()?>">
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
                          <em>PST</em>
                        </dd>
                        <dt>To:</dt>
                        <dd>
                          <strong>
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
                        <dd>325 mi</dd>
                        <dt>Efficiency:</dt>
                        <dd>78%</dd>
                      </dl>                    
                    </td>
                  </tr>
                </tbody>
              </table>
              <table class="leg-comment" id="<?php echo 'leg_o_com'.$mission->getId().$leg->getLegNumber()?>">
                <tbody>
                  <tr>
                    <td class="cell-1"> 
                    Comment:
                    </td>
                    <td>
                    <span>Special conditions and circumstances listed here.</span>
                      <a href="#" class="btn-request">
                        <span>Request This Mission</span>
                      </a>
                    </td>
                  </tr>
                </tbody>
              </table>
              <?php $dis = 'none';?>
              <?php };?>
              <?php endif;?>
              <div class="route">
                <strong>RETURN HOME:</strong>
                <ul>
                  <li>
                    <img alt="ico" src="/images/ico-hospital.gif"/>
                  </li>
                  <li>
                    <a href="#">
                      <img alt="ico" src="/images/ico-car.gif"/>
                    </a>
                  </li>
                  <li class="disabled">
                    <a class="leg-link" href="#">Leg 3</a>
                  </li>
                  <li>
                    <a class="leg-link" href="#">Leg 2</a>
                  </li>
                  <li>
                    <a class="leg-link" href="#">Leg 1</a>
                  </li>
                  <li>
                    <a href="#">
                      <img alt="ico" src="/images/ico-car-active.gif"/>
                    </a>
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
<!--      END INTERES'S LEG-->
          <ul class="discussion">
            <li>
              <a href="#">Discussion (7)</a>
            </li>
            <li>
            <img alt="ico" src="/images/ico-split.gif"/>
            A split mission has been suggested</li>
          </ul>
        </div>
        <?php endif?>
      <?php endforeach;?>
      <?php endif;?>
    </div>
</div>

<script type="text/javascript">
//<![CDATA[
$(document).ready(function() {

});
function getInfo(id){
  if($('#leg_info'+id).hide()){
    $('#leg_info'+id).show();
    $('#leg_com'+id).show();
  }
}

function getLegs(id){
  if($('#other_leg'+id).hide()){
    $('#other_leg'+id).show();
    $('#bg_'+id).hide();
  }
}
function closeAll(id){
  if($('#other_leg'+id).show()){
    $('#other_leg'+id).hide();
    $('#bg_'+id).show();
  }
}
// ]]>
</script>