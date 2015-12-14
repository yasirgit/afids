<?php use_helper('Form');
use_helper('Form');
$date_widget = $sf_data->getRaw('date_widget');
use_javascripts_for_form($date_widget);
use_stylesheets_for_form($date_widget);
?>
<?php use_helper('Javascript', 'Form') ?>
<?php use_helper('jQuery', 'Form') ?>

<div class="missions-available">
<div class="wrap">
  <h2>Missions Available with Camps</h2>
    <form action="#" id="ignore_filter">
      <fieldset>
        <div class="missions-available-entry">
          <?php if (isset($has_filters)):?>
               <?php if ($has_filters->getAvailability() == 1):?>
                 <input id="unset_availability" type="checkbox" name="unset_availability" checked="checked"/>
               <?php else:?>
                 <input id="unset_availability" type="checkbox" name="unset_availability"/>
               <?php endif?>
          <?php else:?>
                 <input id="unset_availability" type="checkbox" name="unset_availability"/>
          <?php endif?>
          <input type="hidden" name="member_id" value="<?php echo $member_id?>"/>
          <input type="hidden" id="is_a_check" name="is_a_check" value=""/>
          <label for="form-item-1">Ignore my availability</label>
          <a class="match-flights" href="#">Show missions matching my personal flights</a>
          <input class="hide" type="submit" value="submit"/>
        </div>
      </fieldset>
    </form>
</div>
    <form action="<?php echo url_for('mission/form')?>" id="form_filter" method="post">
      <fieldset>
        <div class="missions-available-filter">
          <div class="bg" id="user_filter_area">
            <div class="wrap">
              <input type="hidden" name="primary_airportID" value="<?php echo $primary_airport_id?>"/>
              <input type="hidden" name="member_id" value="<?php echo $member_id?>"/>
              <input type="hidden" name="set_availability" id="set_availability"/>
              <?php if(isset($av)):?>
                <input type="hidden" id="first_date" name="first_date" value="<?php echo $av->getFirstDate()?>"/>
                <input type="hidden" id="last_date" name="last_date" value="<?php echo $av->getlastDate()?>"/>
                <input type="hidden" id="not_av" name="not_av" value="<?php echo $av->getNotAvailable()?>"/>
                <input type="hidden" id="no_weekday" name="no_weekday" value="<?php echo $av->getNoWeekday()?>"/>
                <input type="hidden" id="no_weekend" name="no_weekend" value="<?php echo $av->getNoWeekend()?>"/>
                <input type="hidden" id="as_ma" name="as_ma" value="<?php echo $av->getAsMissionMssistant()?>"/>
              <?php endif?>
              <div class="date-range">
                <label for="form-item-2">Date Range:</label>
                <?php if(isset($has_filters)):?>
                  <?php if($has_filters->getDateRange1()):?>
                       <?php echo $date_widget->render('date_range1', $has_filters->getDateRange1());?>
                        <?php else:?>
                       <?php echo $date_widget->render('date_range1', $date_range1);?>
                <?php endif?>
                 <?php else:?>
                       <?php echo $date_widget->render('date_range1', $date_range1);?>
                  <?php endif?>
                <strong class="to">to</strong>
                 <?php if(isset($has_filters)):?>
                  <?php if($has_filters->getDateRange2()):?>
                       <?php echo $date_widget->render('date_range2', $has_filters->getDateRange2());?>
                       <?php else:?>
                       <?php echo $date_widget->render('date_range2', $date_range2);?>
                <?php endif?>
                  <?php else:?>
                       <?php echo $date_widget->render('date_range2', $date_range2);?>
                  <?php endif?>
              </div>
              <div class="flight-days">
                <strong>Flight Days:</strong>
                <ul>
                 <?php if(isset($has_filters)):?>
                  <?php if($has_filters->getDay1() == 'Monday'):?>
                     <li id="1day" class="active">
                       <a href="javascript:getDay1()" name="day_1" id="day_1">M</a>
                     </li>
                     <?php else:?>
                     <li id="1day">
                       <a href="javascript:getDay1()" name="day_1" id="day_1">M</a>
                     </li>
                <?php endif?>
                  <?php else:?>
                     <li id="1day">
                       <a href="javascript:getDay1()" name="day_1" id="day_1">M</a>
                     </li>
                  <?php endif?>
                  <input type="hidden" name="day1" id="day1"/>
                  
                 <?php if(isset($has_filters)):?>
                  <?php if($has_filters->getDay2() == 'Tuesday'):?>
                     <li id="2day" class="active">
                       <a href="javascript:getDay2()" name="day_2" id="day_2">T</a>
                     </li>
                     <?php else:?>
                     <li id="2day">
                       <a href="javascript:getDay2()" name="day_2" id="day_2">T</a>
                     </li>
                <?php endif?>
                 <?php else:?>
                     <li id="2day">
                       <a href="javascript:getDay2()" name="day_2" id="day_2">T</a>
                     </li>
                  <?php endif?>
                    <input type="hidden" name="day2" id="day2"/>
                    
                  <?php if(isset($has_filters)):?>
                  <?php if($has_filters->getDay3() == 'Wednesday'):?>
                     <li id="3day" class="active">
                       <a href="javascript:getDay3()" name="day_3" id="day_3">W</a>
                     </li>
                      <?php else:?>
                     <li id="3day">
                       <a href="javascript:getDay3()" name="day_3" id="day_3">W</a>
                     </li>
                  <?php endif?>
                    <?php else:?>
                     <li id="3day">
                       <a href="javascript:getDay3()" name="day_3" id="day_3">W</a>
                     </li>
                  <?php endif?>
                  <input type="hidden" name="day3" id="day3"/>

                  <?php if(isset($has_filters)):?>
                    <?php if($has_filters->getDay4() == 'Thursday'):?>
                       <li id="4day" class="active">
                         <a href="javascript:getDay4()" name="day_4" id="day_4">Th</a>
                       </li>
                         <?php else:?>
                       <li id="4day">
                         <a href="javascript:getDay4()" name="day_4" id="day_4">Th</a>
                       </li>
                    <?php endif?>
                  <?php else:?>
                     <li id="4day">
                       <a href="javascript:getDay4()" name="day_4" id="day_4">Th</a>
                     </li>
                  <?php endif?>
                  <input type="hidden" name="day4" id="day4"/>
                  
                  
                  <?php if(isset($has_filters)):?>
                  <?php if($has_filters->getDay5() == 'Friday'):?>
                     <li id="5day" class="active">
                       <a href="javascript:getDay5()" name="day_5" id="day_5">F</a>
                     </li>
                      <?php else:?>
                     <li id="5day">
                       <a href="javascript:getDay5()" name="day_5" id="day_5">F</a>
                     </li>
                  <?php endif?>
                   <?php else:?>
                     <li id="5day">
                       <a href="javascript:getDay5()" name="day_5" id="day_5">F</a>
                     </li>
                  <?php endif?>
                  <input type="hidden" name="day5" id="day5"/>
                  
                   <?php if(isset($has_filters)):?>
                  <?php if($has_filters->getDay6() == 'Saturday'):?>
                     <li id="6day" class="active">
                       <a href="javascript:getDay6()" name="day_6" id="day_6">Sa</a>
                     </li>
                       <?php else:?>
                     <li id="6day">
                       <a href="javascript:getDay6()" name="day_6" id="day_6">Sa</a>
                     </li>
                <?php endif?>
                  <?php else:?>
                     <li id="6day">
                       <a href="javascript:getDay6()" name="day_6" id="day_6">Sa</a>
                     </li>
                  <?php endif?>
                  <input type="hidden" name="day6" id="day6"/>
                  
                  <?php if(isset($has_filters)):?>
                  <?php if($has_filters->getDay7() == 'Sunday'):?>
                     <li id="7day" class="active">
                       <a href="javascript:getDay7()" name="day_7" id="day_7">Su</a>
                     </li>
                      <?php else:?>
                     <li id="7day">
                       <a href="javascript:getDay7()" name="day_7" id="day_7">Su</a>
                     </li>
                <?php endif?>
                  <?php else:?>
                     <li id="7day">
                       <a href="javascript:getDay7()" name="day_7" id="day_7">Su</a>
                     </li>
                  <?php endif?>
                  <input type="hidden" name="day7" id="day7"/>
                </ul>
              </div>
              <div class="location">
                <div class="wrap">
                  <strong>Location:</strong>
                    <ul>
                      <li class="active">
                        <a href="javascript:getWings()" id="wing">Wing</a>
                      </li>
                      <li>
                        <a href="javascript:getAirports()">Airport</a>
                      </li>
                      <li>
                        <a href="javascript:getCSZ()">City/State/Zip</a>
                      </li>
                    </ul>
                </div>
                <div class="wrap">
                <select title="location" style="display:block" id="wing_list" name="wing">
                <?php foreach ($wings as $wing):?>
                  <option>
                    <?php echo $wing?>
                  </option>
                <?php endforeach;?>
                </select>
                <?php if(isset($f_person_id)):?><input type="hidden" id="f_person" value="<?php echo $f_person_id?>"/><?php endif?>
                <div class="date-range">
                
                  <?php if(isset($has_filters)):?>
                  <?php if($has_filters->getIdent()):?>
                        <input id="airport_ident" name="airport_ident" type="text" class="text" value="<?php echo $has_filters->getIdent()?>" style="display:none"/>
                  <?php else:?>
                        <input id="airport_ident" name="airport_ident" type="text" class="text" value="" style="display:none"/>
                  <?php endif?>
                   <?php else:?>
                        <input id="airport_ident" name="airport_ident" type="text" class="text" value="" style="display:none"/>
                  <?php endif?>
                  
                <?php if(isset($has_filters)):?>
                  <?php if($has_filters->getCity()):?>
                        <input id="city" name="city" type="text" class="text" value="<?php echo $has_filters->getCity()?>" style="display:none"/>
                           <?php else:?>
                        <input id="city" name="city" type="text" class="text" value="" style="display:none"/>
                  <?php endif?>
                  <?php else:?>
                        <input id="city" name="city" type="text" class="text" value="" style="display:none"/>
                  <?php endif?>
                  
                 <?php if(isset($has_filters)):?>
                  <?php if($has_filters->getZipcode()):?>
                        <input id="zipcode" name="zipcode" type="text" class="text" value="<?php echo $has_filters->getZipcode()?>" style="display:none"/>
                          <?php else:?>
                        <input id="zipcode" name="zipcode" type="text" class="text" value="" style="display:none"/>
                  <?php endif?>
                   <?php else:?>
                        <input id="zipcode" name="zipcode" type="text" class="text" value="" style="display:none"/>
                  <?php endif?>
                  
                    <select title="location" style="display:none" id="state_list" class="text" name="state">
                    <?php foreach ($states as $state):?>
                      <option>
                        <?php echo $state?>
                      </option>
                    <?php endforeach;?>
                    </select>
                </div>
                </div>
              </div>
              <div class="location-as">
                <strong>Location as:</strong>
                  <ul>
                    <li>
                  <?php if(isset($has_filters)):?>
                  <?php if($has_filters->getOrgin() == 1):?>
                        <input id="is_orgin" type="checkbox" name="orgin" checked="checked"/>
                        <?php else:?>
                        <input id="is_orgin" type="checkbox" name="orgin"/>
                  <?php endif?>
                      <?php else:?>
                        <input id="is_orgin" type="checkbox" name="orgin"/>
                  <?php endif?>
                      <label for="form-item-3">Orgin</label>
                    </li>
                    
                    <li>
                 <?php if(isset($has_filters)):?>
                  <?php if($has_filters->getDest() == 1):?>
                        <input id="is_dest" type="checkbox" name="dest" checked="checked"/>
                         <?php else:?>
                        <input id="is_dest" type="checkbox" name="dest"/>
                  <?php endif?>
                  <?php else:?>
                        <input id="is_dest" type="checkbox" name="dest"/>
                  <?php endif?>
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
                <?php if(isset($has_filters)):?>
                  <?php if($has_filters->getIsPilot() == 1):?>
                        <input id="is_pilot" type="checkbox" name="pilot" checked="checked"/>
                          <?php else:?>
                        <input id="is_pilot" type="checkbox" name="pilot"/>
                  <?php endif?>
                  <?php else:?>
                        <input id="is_pilot" type="checkbox" name="pilot"/>
                  <?php endif?>
              <label for="form-item-5">Pilot</label>
            </li>
            <li>
              <?php if(isset($has_filters)):?>
                  <?php if($has_filters->getIsMa() == 1):?>
                        <input id="is_ma" type="checkbox" name="ma" checked="checked"/>
                         <?php else:?>
                        <input id="is_ma" type="checkbox" name="ma"/>
                <?php endif?>
                  <?php else:?>
                        <input id="is_ma" type="checkbox" name="ma"/>
                  <?php endif?>
              <label for="form-item-6">Mission Assistant</label>
            </li>
            <li>
                <?php if(isset($has_filters)):?>
                  <?php if($has_filters->getIfrBackup() == 1):?>
                        <input id="is_ifr" type="checkbox" name="ifr_back" checked="checked"/>
                         <?php else:?>
                        <input id="is_ifr" type="checkbox" name="ifr_back"/>
                  <?php endif?>
                <?php else:?>
                        <input id="is_ifr" type="checkbox" name="ifr_back"/>
                  <?php endif?>
              <label for="form-item-7">IFR Backup</label>
            </li>
            </ul>
              <strong>Show:</strong>
              <a href="#" class="all-missions" name="all_types" id="all_types">All Mission Types</a>
               <?php if(isset($has_filters)):?>
                  <?php if($has_filters->getAlltype() == 1):?>
                        <input id="all_t" type="checkbox" name="all_t" value="1"/>
                <?php endif?>
                  <?php else:?>
                        <input id="all_t" type="checkbox" name="all_t"/>
                  <?php endif?>
              <input type="hidden" id="location_type" name="location_type" value="1"/>
              <ul>
              <li>
                <?php if(isset($has_filters)):?>
                  <?php if($has_filters->getFilled() == 1):?>
                        <input id="filled" type="checkbox" name="filled" checked="checked"/>
                     <?php else:?>
                        <input id="filled" type="checkbox" name="filled"/>
                  <?php endif?>
                     <?php else:?>
                        <input id="filled" type="checkbox" name="filled"/>
                  <?php endif?>
              <label for="form-item-8">Filled</label>
              </li>
              <li>
                <?php if(isset($has_filters)):?>
                  <?php if($has_filters->getOpen() == 1):?>
                        <input id="open" type="checkbox" name="open" checked="checked"/>
                            <?php else:?>
                        <input id="open" type="checkbox" name="open"/>
                  <?php endif?>
                        <?php else:?>
                        <input id="open" type="checkbox" name="open"/>
                  <?php endif?>
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
               <?php if(isset($has_filters)):?>
                  <?php if($has_filters->getMaxPassenger()):?>
                        <input id="max_pass" class="text" type="text" name="max_pass" value="<?php echo $has_filters->getMaxPassenger()?>"/>
                          <?php else:?>
                        <input id="max_pass" class="text" type="text" name="max_pass"/>
                  <?php endif?>
                  <?php else:?>
                        <input id="max_pass" class="text" type="text" name="max_pass"/>
                  <?php endif?>
            </div>
            <div>
            <label for="form-item-11">Maximum Weight:</label>
             <?php if(isset($has_filters)):?>
                  <?php if($has_filters->getMaxWeight()):?>
                        <input id="max_wei" class="text" type="text" name="max_wei" value="<?php echo $has_filters->getMaxWeight()?>"/>
                         <?php else:?>
                        <input id="max_wei" class="text" type="text" name="max_wei"/>
                  <?php endif?>
                    <?php else:?>
                        <input id="max_wei" class="text" type="text" name="max_wei"/>
                  <?php endif?>
            <strong>lbs</strong>
            </div>
            <div>
            <label for="form-item-12">Maximum Distance:</label>
                <?php if(isset($has_filters)):?>
                  <?php if($has_filters->getMaxDistance()):?>
                        <input id="max_dist" class="text" type="text" name="max_dist" value="<?php echo $has_filters->getMaxDistance()?>"/>
                            <?php else:?>
                        <input id="max_dist" class="text" type="text" name="max_dist"/>
                  <?php endif?>
                     <?php else:?>
                        <input id="max_dist" class="text" type="text" name="max_dist"/>
                  <?php endif?>
            <strong>miles</strong>
            </div>
            <div>
            <label for="form-item-13">Maximum Efficiency:</label>
               <?php if(isset($has_filters)):?>
                  <?php if($has_filters->getMaxEffciency()):?>
                        <input id="max_eff" class="text" type="text" name="max_eff" value="<?php echo $has_filters->getMaxEffciency()?>"/>
                          <?php else:?>
                        <input id="max_eff" class="text" type="text" name="max_eff"/>
                  <?php endif?>
                  <?php else:?>
                        <input id="max_eff" class="text" type="text" name="max_eff"/>
                  <?php endif?>
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
              <form id="user_filter_action" method="post">
<!--              Pervuois filters-->
              <input type="hidden" id="available" name="available"/>
              <input type="hidden" id="store" name="store"/>
              <input type="hidden" id="s_set_avi" name="s_set_avi"/>
              <input type="hidden" id="f_unset_avi" name="f_unset_avi"/>
              <input type="hidden" id="f_date_range1" name="f_date_range1"/>
              <input type="hidden" id="f_date_range2" name="f_date_range2"/>
              
              <input type="hidden" id="f_day_1" name="f_day_1"/>
              <input type="hidden" id="f_day_2" name="f_day_2"/>
              <input type="hidden" id="f_day_3" name="f_day_3"/>
              <input type="hidden" id="f_day_4" name="f_day_4"/>
              <input type="hidden" id="f_day_5" name="f_day_5"/>
              <input type="hidden" id="f_day_6" name="f_day_6"/>
              <input type="hidden" id="f_day_7" name="f_day_7"/>
              
              <input type="hidden" id="f_wing" name="f_wing"/>
              <input type="hidden" id="f_ident" name="f_ident"/>
              <input type="hidden" id="f_city" name="f_city"/>
              <input type="hidden" id="f_zipcode" name="f_zipcode"/>
              <input type="hidden" id="f_state" name="f_state"/>
              
              <input type="hidden" id="f_orgin" name="f_orgin"/>
              <input type="hidden" id="f_dest" name="f_dest"/>
              
              <input type="hidden" id="f_pilot" name="f_pilot"/>
              <input type="hidden" id="f_ma" name="f_ma"/>
              <input type="hidden" id="f_ifr" name="f_ifr"/>
              
              <input type="hidden" id="f_alltype" name="f_alltype"/>
              <input type="hidden" id="f_filled" name="f_filled"/>
              <input type="hidden" id="f_open" name="f_open"/>
              
              <input type="hidden" id="f_maxpass" name="f_maxpass"/>
              <input type="hidden" id="f_maxwei" name="f_maxwei"/>
              <input type="hidden" id="f_maxdist" name="f_maxdist"/>
              <input type="hidden" id="f_maxeff" name="f_maxeff"/>
              <input type="hidden" id="f_location_type" name="f_location_type"/>

                <ul>
                <li>
                     <input type="button" value="Find" id="find_button"/>
                         <a href="#" id="reset" name="reset">Reset</a>
                         <input type="hidden" id="reset" name="reset"/>  
                </li>
                  <li>
                    <a href="#" id="save_filter" name="save_filter">Save filter settings</a>
                    <input type="hidden" id="save_user_filter" name="save_user_filter"/>
                  </li>
                  <li id="hide_area" style="display:block">
                    <a href="#" id="hide_filter" name="hide_filter">Hide Filters</a>
                    <input type="hidden" id="hide_user_filter" name="hide_user_filter"/>
                  </li>
                  <li id="show_area" style="display:none">
                    <a href="#" id="show_filter" name="show_filter">Show Filters</a>
                    <input type="hidden" id="show_user_filter" name="show_user_filter"/>
                  </li>
                </ul>
              </form>
            </div>
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
</div>
            <div id="body_part">
            <div class="location-matches">
<!--            *******************************-->
<h3>Below are the best matches based on your location</h3>
 <?php 
 if(isset($camps)){
   for($i=0;$i<count($camps);$i++)
   {
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
        }
        if(isset($miss_dates[$count1-1])){
          $mission_date = $miss_dates[$count1-1];
        }
        if(isset($appt_dates[$count2-1])){
          $appt_date = $appt_dates[$count2-1];
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
 <?php }?>
<!--            *******************************-->
    </div>
    </div>
    <!--      END LOCATION MARCHES-->
    
  <div class="interest-missions">
      <h3>Below are other missions you may be interested in</h3>
      <?php if(isset($imissions)):?>
      <?php foreach ($imissions as $mission):?>
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
             <?php if(isset($mission)){
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
                if($mission->getPassengerId()){
                  $pass = $mission->getPassenger();
                  echo $pass_type->getName();
                }
              }
          ?>
            </dd>
            <dt><a href="javascript:closeAll(<?php echo $mission->getId()?>)" id="close_all">close all</a></dt>
          </dl>
          <div class="interest-missions-info">
            <div class="frame">
              <div class="bg" id="<?php echo 'bg_'.$mission->getId()?>">
                <dl class="mission-time">
                  <dt>Date:</dt>
                  <dd>
                  <strong>
                          <?php 
                          if(isset($mission)){
                            if($mission->getMissionDate()){
                              echo $mission->getMissionDate('m/d/y').'('.date('l',strtotime($miss->getMissionDate())).')'.' to '.$mission->getApptDate('m/d/y').'('.date('l',strtotime($miss->getApptDate())).')';
                            }else{
                              echo '--';
                            }
                          }
                          ?>
                  </strong>
                  </dd>
                  <dt>Time:</dt>
                  <dd>Can leave anytime</dd>
                </dl>
                <dl class="flight-path">
                  <dt>Flight Path:</dt>
                  <dd>
                  <?php 
                  $miss_legs = MissionLegPeer::getbyMissId($mission->getId());
                  $airport_ident_from = array();
                  $airport_ident_to = array();
                  $c= 0;
                  foreach ($miss_legs as $legg){
                    if($legg->getTransportation() == 'air_mission'){
                      $airport_ident_from[$c] = AirportPeer::retrieveByPK($legg->getFromAirportId())->getIdent();
                      $airport_ident_to[$c] = AirportPeer::retrieveByPK($legg->getToAirportId())->getIdent();
                      $c++;
                    }
                  }
                  ?>
                  <?php for($i=0;$i<$c;$i++):?>
                    <?php echo $airport_ident_from[$i].' '.$airport_ident_to[$i]?>
                  <?php endfor?>
                  </dd>
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
        <?php $other = 0?>
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
                       <?php foreach ($o_mission_legs as $mission_leg):?>
                        <?php if($mission_leg->getTransportation() == 'ground_mission' && $mission_leg->getGroundOrigin() == 'patient' && $mission_leg->getGroundDestination() == 'lodging'):?>
                          <?php if(isset($mission_leg) && $mission_leg->getCancelled() == null):?> 
                           <a href="#" onclick="return false">    
                              <img alt="ico" src="/images/ico-car-active.gif"/>
                           </a>    
                           <?php else:?>
                           <a href="#" onclick="return false">    
                              <img alt="ico" src="/images/ico-car.gif"/>
                           </a>    
                           <?php endif;?>
                        <?php endif;?>
                      <?php endforeach;?>
                    </a>
                  </li>
                  <?php foreach ($o_mission_legs as $mission_leg):?>
                    <?php if(isset($mission_leg) && $mission_leg->getTransportation() == 'air_mission' && $mission_leg->getCancelled() == null && $mission_leg->getId() == $mission_leg->getReverseFrom()):?>
                      <li>
                       <a class="leg-link" href="javascript:getOtherInfo(<?php echo $mission->getId().$mission_leg->getLegNumber()?>)" id="<?php echo 'leg_'.$mission->getId().$mission_leg->getLegNumber()?>" onclick="return false">
                        <?php echo 'Leg '.$mission_leg->getLegNumber()?>
                        </a>
                      </li>
                      <?php elseif($mission_leg->getTransportation() == 'air_mission' && $mission_leg->getId() == $mission_leg->getReverseFrom()):?>
                        <li class="disabled" id="<?php echo 'off_leg'.$mission->getId().$mission_leg->getLegNumber()?>">
                          <a class="leg-link" href="javascript:getOtherInfo(<?php echo $mission->getId().$mission_leg->getLegNumber()?>)" id="<?php echo 'leg_'.$mission->getId().$mission_leg->getLegNumber()?>" onclick="return false"><?php echo 'Leg '.$mission_leg->getLegNumber()?></a>
                        </li>
                      <?php endif;?>
                  <?php endforeach;?>
                  <li>
                  <a href="#">
                    <?php foreach ($o_mission_legs as $mission_leg):?>
                         <?php if($mission_leg->getTransportation() == 'ground_mission' && $mission_leg->getGroundOrigin() == 'lodging' &&  $mission_leg->getGroundDestination() == 'facility'):?>
                              <?php if(isset($mission_leg) && $mission_leg->getCancelled() == null):?> 
                                    <a href="#" onclick="return false">
                                          <img alt="ico" src="/images/ico-car-active.gif"/>
                                    </a>
                             <?php else:?>
                                    <a href="#" onclick="return false">
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
      <?php if(isset($o_mission_legs)):?>
             <?php 
             foreach ($o_mission_legs as $leg){
               if($leg->getReverseFrom() == $leg->getId()){
           ?>
             <?php if($leg->getCancelled()){
               $display = 'leg-info disabled';
             }else{
               $display = 'leg-info';
             }
            ?>
         <table class="<?php echo $display?>" id="<?php echo 'leg_o_info'.$mission->getId().$leg->getLegNumber()?>">
            <tbody>
                  <tr>
            <td class="cell-1">
                      <strong class="leg">
            <?php
            if($leg->getLegNumber()){
              echo 'Leg '.$leg->getLegNumber();
}?>
              <br/>
                       <?php
                       if($leg->getTransportation() == 'ground_mission'){
                         echo 'ground';
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
                              echo $miss->getMissionDate('m/d/y').'('.date('l',strtotime($miss->getMissionDate())).')'.' to'.$miss->getApptDate('m/d/y').'('.date('l',strtotime($miss->getApptDate())).')';
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
                          <?php if($leg->getTransportation() =='air_mission'):?>
                            <?php 
                            if($leg->getFromAirportId()){
                              $airport_from = AirportPeer::retrieveByPK($leg->getFromAirportId());
                              if(isset($airport_from)){
                                echo $airport_from->getIdent                                                              ();
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
                          <?php elseif($leg->getTransportation() =='ground_mission'):?>
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
                          <?php elseif($leg->getTransportation() =='ground_mission'):?>
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
                    <?php if($display == 'leg-info'):?>
                    
                      <?php if($mission->getMissionSpecificComments()):?>
                        <div id="<?php echo 'edit_comment2'.$mission->getId()?>">--<?php echo $mission->getMissionSpecificComments();?>--</div>
                      <?php else:?>
                        <div id="<?php echo 'edit_comment2'.$mission->getId()?>">--Click here leave comment--</div>
                      <?php endif?>
                      <?php if($other == 0):?>
                        <?php echo input_in_place_editor_tag('edit_comment2'.$mission->getId(), 'pilotRequest/saveCommentMission?id='.$mission->getId(),array('save_text'=>'Save')) ?>    
                        <?php $other++?>
                      <?php endif?>
                        <?php if($mission->getMissionDate() && $mission->getApptDate()):?>
                           <span>Special conditions and circumstances listed here.</span>
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
                        <?php endif?>
                       <?php else:?>
                      <div align="left">
                        <a href="<?php echo url_for('@mission_view?id='.$mission->getId())?>">
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
                      <?php endif;?>
                    <?php endif;?>
                </td>
                  </tr>
                  </tbody>
              </table>
                <?php $dis = 'none';?>
              <?php 
               };
               };?>
                <?php endif;?>
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
        <?php if(isset($o_mission_legs)):?>
             <?php 
             foreach ($o_mission_legs as $leg){
               if($leg->getReverseFrom() != $leg->getId()){
           ?>
             <?php if($leg->getCancelled()){
               $display = 'leg-info disabled';
             }else{
               $display = 'leg-info';
             }
            ?>
         <table class="<?php echo $display?>" id="<?php echo 'leg_o_info'.$mission->getId().$leg->getLegNumber()?>">
            <tbody>
               <tr>
            <td class="cell-1">
               <strong class="leg">
            <?php
            if($leg->getLegNumber()){
              echo 'Leg '.$leg->getLegNumber();
            }?>
              <br/>
              <?php
              if($leg->getTransportation() == 'ground_mission'){
                echo 'ground';
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
                              echo $miss->getMissionDate('m/d/y').'('.date('l',strtotime($miss->getMissionDate())).')'.' to'.$miss->getApptDate('m/d/y').'('.date('l',strtotime($miss->getApptDate())).')';
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
                          <?php if($leg->getTransportation() =='air_mission'):?>
                            <?php 
                            if($leg->getFromAirportId()){
                              $airport_from = AirportPeer::retrieveByPK($leg->getFromAirportId());
                              if(isset($airport_from)){
                                echo $airport_from->getIdent                                                              ();
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
                          <?php elseif($leg->getTransportation() =='ground_mission'):?>
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
                          <?php elseif($leg->getTransportation() =='ground_mission'):?>
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
                    <?php if($display == 'leg-info'):?>
                    
                      <?php if($mission->getMissionSpecificComments()):?>
                        <div id="<?php echo 'edit_comment2'.$mission->getId()?>">--<?php echo $mission->getMissionSpecificComments();?>--</div>
                      <?php else:?>
                        <div id="<?php echo 'edit_comment2'.$mission->getId()?>">--Click here leave comment--</div>
                      <?php endif?>
                      <?php if($other == 0):?>
                        <?php echo input_in_place_editor_tag('edit_comment2'.$mission->getId(), 'pilotRequest/saveCommentMission?id='.$mission->getId(),array('save_text'=>'Save')) ?>    
                        <?php $other++?>
                      <?php endif?>
                        <?php if($mission->getMissionDate() && $mission->getApptDate()):?>
                           <span>Special conditions and circumstances listed here.</span>
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
                        <?php endif?>
                       <?php else:?>
                      <div align="left">
                        <a href="<?php echo url_for('@mission_view?id='.$mission->getId())?>">
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
                      <?php endif;?>
                    <?php endif;?>
                </td>
                  </tr>
                  </tbody>
              </table>
                <?php $dis = 'none';?>
              <?php 
               };
               };?>
                <?php endif;?>

                </div>
<!--            END BG-->
                </div>
<!--          END FRAME-->
                </div>
<!--        Location matches info-->
                <!--      END INTERES'S LEG-->
               <ul class="discussion">
               <li>
               <a href="javascript:showDiscussions2(<?php echo $leg->getId()?>)">Discussion
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
            A split mission has been suggested</li>
          </ul>
            <div class="comment-box" style="display:none" id="<?php echo "comments_2".$leg->getId()?>">
             <a class="btn-close" href="javascript:close2(<?php echo $leg->getId()?>)">Close</a>
             <div class="wrap">
             <p>Instructions for posting comments...Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam vitae ligula sem. Vivamus ege stas, mi vel tincidunt aliquam, felis metus faucibus justo, fringilla interdum mi quam et erat.</p>
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
               <form action="<?php echo url_for('pilotRequest/addDiscussion')?>" method="post" id="<?php echo 'dis_form'.$leg->getId()?>">
                  <label for="form-item-15">Add Comment:</label>
                  <?php if(isset($leg)):?><input type="hidden" name="dis_leg_id" value="<?php echo $leg->getId()?>"/><?php endif?>
                  <?php if($sf_user->getId()):?><input type="hidden" name="user_id" value="<?php echo $sf_user->getId()?>"/><?php endif?>
                  <textarea rows="10" cols="10" name="comment_dis" id="comment_dis"></textarea>
                  <input id="comm2" name="comm2" type="hidden"/>
                  <a href="#" onclick="jQuery('#<?php echo 'dis_form'.$leg->getId()?>').submit();return false;" class="btn-action">
                              <span>SUBMIT</span><strong>&nbsp;</strong>
      </a>
                              </form>
                              <!--              END BOX-->
                              </div>
      </div>
                              </div>
      <?php endif?>
     <?php endforeach;?>
      <?php endif;?>
    </div>
      </div>
      
<div id="time"></div>
      <script type="text/javascript">
      //<![CDATA[
      jQuery(document).ready(function()
      {
        jQuery('#airport_ident').val('');
        jQuery('#as_ma').val('');

        jQuery('#date_range1').val('');
        jQuery('#date_range2').val('');

        jQuery('#day1').val('');
        jQuery('#day2').val('');
        jQuery('#day3').val('');
        jQuery('#day4').val('');
        jQuery('#day5').val('');
        jQuery('#day6').val('');
        jQuery('#day7').val('');

        jQuery('#first_date').val('');
        jQuery('#last_date').val('');

        jQuery('#location_type').val('');
        jQuery('#max_dist').val('');
        jQuery('#max_eff').val('');
        jQuery('#max_pass').val('');
        jQuery('#max_wei').val('');

        jQuery('#no_weekday').val('');
        jQuery('#no_weekend').val('');
        jQuery('#not_av').val('');
        jQuery('#primary_airportID').val('');
        jQuery('#set_availability').val('');
        jQuery('#state').val('');
        jQuery('#wing').val('');
        jQuery('#zipcode').val('');

      });

      var loc = jQuery("#location").val();

      <?php
      $wing = array();
      $state = array();

      if(isset($has_filters)){
        if($has_filters->getWing()){
          $wing[] = "{$has_filters->getId()} : '{$has_filters->getWing()}'";
        }
        if($has_filters->getState()){
          $state[] = "{$has_filters->getId()} : '{$has_filters->getState()}'";
        }
      }
      ?>
      var wing = {<?php echo join(',', $wing)?>};
      var state = {<?php echo join(',', $state)?>};
      var id = jQuery('#f_person').val();

      if(wing[id]){
        jQuery('#wing_list').val(wing[1]);
      }
      if(state[id]){
        jQuery('#state_list').val(state[1]);
      }

      function filterForm()
      {
        jQuery('#body_part').css('opacity', 0.6);
        jQuery.ajax({
          url : '/mission/form',
          type: 'POST',
          data: jQuery("#form_filter").serialize(),
          success: function(data){
            jQuery('#body_part').css('opacity', 1).html(data);
          }
        });
      }
      function ignoreFrom()
      {
        jQuery('#body_part').css('opacity', 0.6);
        jQuery.ajax({
          url : '/mission/form',
          type: 'POST',
          data: jQuery("#ignore_filter").serialize(),
          success: function(data){
            jQuery('#body_part').css('opacity', 1).html(data);
          }
        });
      }

      function sortForm()
      {
        jQuery('#body_part').css('opacity', 0.6);
        jQuery.ajax({
          url : '/mission/form',
          type: 'POST',
          data: jQuery("#sort").serialize(),
          success: function(data){
            jQuery('#body_part').css('opacity', 1).html(data);
          }
        });
      }

      jQuery('#unset_availability').click(function()
      {
        if(jQuery('#unset_availability').is(':checked'))
        {
          jQuery('#unset_availability').val('on');
          jQuery('#is_a_check').val('');
          jQuery('#available').val('on');
          jQuery('#store').val('on');
        }else{
          jQuery('#unset_availability').val('');
          jQuery('#is_a_check').val(1);
          jQuery('#available').val('');
          jQuery('#store').val('');
        }
      });

      jQuery('#find_button').click(function()
      {
        userFilterAction();
        filterForm();
        //        ignoreFrom();
      });

      function userFilterAction()
      {
        jQuery('#body_part').css('opacity', 0.6);
        jQuery.ajax({
          url : '/mission/form',
          type: 'POST',
          data: jQuery("#user_filter_action").serialize(),
          success: function(data){
            jQuery('#body_part').css('opacity', 1).html(data);
          }
        });
      }//      var timeout;
      //
      //      function timeout_trigger() {
      //        alert('Your filter(s) has sent');
      //      }
      //      function timeout_clear() {
      //        clearTimeout(timeout);
      //        clear();
      //      }
      //
      //      function timeout_init() {
      //        timeout = setTimeout('filterForm()', 3000);
      //      }
      //

      //      $('#form_filter input:checkbox').bind('click', function(){
      //        filterForm();
      //      });
      //
      //      $('#form_filter input:text').bind('click', function(){
      //        filterForm();
      //        timeout_init()
      //      });

      function showDiscussions(id){
        if(jQuery('#comments_1'+id).css('display') == 'none'){
          jQuery('#comments_1'+id).css('display','block');
        }
        if(jQuery('#comments_2'+id).css('display') == 'none'){
          jQuery('#comments_2'+id).css('display','block');
        }
      }
      function showDiscussions2(id){
        if(jQuery('#comments_2'+id).css('display') == 'none'){
          jQuery('#comments_2'+id).css('display','block');
        }
      }

      function close1(id){
        if(jQuery('#comments_1'+id).css('display') == 'block'){
          jQuery('#comments_1'+id).css('display','none');
        }
      }
      function close2(id){
        if(jQuery('#comments_2'+id).css('display') == 'block'){
          jQuery('#comments_2'+id).css('display','none');
        }
      }

      function getInfo(id){
        //
        //        if($('#leg_max'+id).val()){
        //          var max = $('#leg_max'+id).val();
        //        }
        //
        //        var the_number = id +'';
        //        var temp_end_index = the_number.length;
        //        var temp_beginning_index = temp_end_index-1;
        //        var test_string = the_number.substring( temp_beginning_index , temp_end_index );
        //        var begin_string = the_number.substring( the_number, temp_beginning_index);
        //
        //        var maxy =parseInt(max);
        //
        //        if(test_string == max){
        //          for(i=the_number-test_string;i<the_number;i++){
        //            if($('#leg_info'+i).show()){
        //              $('#leg_info'+i).hide();
        //              $('#leg_com'+i).hide();
        //              if($('#on_leg'+i).attr('class')){
        //                $('#on_leg'+i).attr('class','');
        //              }
        //            }
        //          }
        //        }else{
        //          for(i=the_number-test_string;i<id+maxy;i++){
        //            if($('#leg_info'+i).show()){
        //              $('#leg_info'+i).hide();
        //              $('#leg_com'+i).hide();
        //              if($('#on_leg'+i).attr('class')){
        //                $('#on_leg'+i).attr('class','');
        //              }
        //            }
        //          }
        //        }

        if(jQuery('#leg_info'+id).css('display') == 'none'){
          jQuery('#leg_info'+id).show();
          jQuery('#leg_com'+id).show();
          jQuery('#on_leg'+id).attr('class','active');
        }else if(jQuery('#leg_info'+id).css('display') == 'block'){
          jQuery('#leg_info'+id).hide();
          jQuery('#leg_com'+id).hide();
          jQuery('#on_leg'+id).attr('class','');
        }
      }

      function getInfoReturn(id){
        if(jQuery('#leg_infoReturn'+id).css('display') == 'none'){
          jQuery('#leg_infoReturn'+id).show();
          jQuery('#leg_comReturn'+id).show();
          jQuery('#on_leg'+id).attr('class','active');
        }else if(jQuery('#leg_infoReturn'+id).css('display') == 'block'){
          jQuery('#leg_infoReturn'+id).hide();
          jQuery('#leg_comReturn'+id).hide();
          jQuery('#on_leg'+id).attr('class','');
        }
      }


      function getLegs(id){
        if(jQuery('#other_leg'+id).hide()){
          jQuery('#other_leg'+id).show();
          jQuery('#bg_'+id).hide();
        }
      }

      function closeAll(id){
        if(jQuery('#other_leg'+id).show()){
          jQuery('#other_leg'+id).hide();
          jQuery('#bg_'+id).show();
        }
      }

      //$('#form-item-10').click(function()
      //{
      //  $('#form-item-10').val('');
      //});
      //$('#form-item-11').click(function()
      //{
      //  $('#form-item-11').val('');
      //});
      //$('#form-item-12').click(function()
      //{
      //  $('#form-item-12').val('');
      //});
      //$('#form-item-13').click(function()
      //{
      //  $('#form-item-13').val('');
      //});

      function getDay1(){
        if(jQuery('#1day').attr('class') == 'active'){
          jQuery('#1day').attr('class','');
          jQuery('#day1').val('');
        }else{
          jQuery('#1day').attr('class','active');
          jQuery('#day1').val('Monday');
        }
      }
      function getDay2(){
        jQuery('#day2').val('Tuesday');
        if(jQuery('#2day').attr('class') == 'active'){
          jQuery('#2day').attr('class','');
          jQuery('#day3').val('');
        }else{
          jQuery('#2day').attr('class','active');
          jQuery('#day3').val('Tuesday');
        }
      }
      function getDay3(){
        if(jQuery('#3day').attr('class') == 'active'){
          jQuery('#3day').attr('class','');
          jQuery('#day3').val('');
        }else{
          jQuery('#3day').attr('class','active');
          jQuery('#day3').val('Wednesday');
        }
      }
      function getDay4(){
        if(jQuery('#4day').attr('class') == 'active'){
          jQuery('#4day').attr('class','');
          jQuery('#day4').val('');
        }else{
          jQuery('#4day').attr('class','active');
          jQuery('#day4').val('Thursday');
        }
      }
      function getDay5(){
        if(jQuery('#5day').attr('class') == 'active'){
          jQuery('#5day').attr('class','');
          jQuery('#day5').val('');
        }else{
          jQuery('#5day').attr('class','active');
          jQuery('#day5').val('Friday');
        }
      }
      function getDay6(){
        if(jQuery('#6day').attr('class') == 'active'){
          jQuery('#6day').attr('class','');
          jQuery('#day6').val('');
        }else{
          jQuery('#6day').attr('class','active');
          jQuery('#day6').val('Saturday');
        }
      }
      function getDay7(){
        if(jQuery('#7day').attr('class') == 'active'){
          jQuery('#7day').attr('class','');
          jQuery('#day7').val('');

        }else{
          jQuery('#7day').attr('class','active');
          jQuery('#day7').val('Sunday');
        }
      }

      function getWings(){
        if(jQuery('#state_list').css('display','block') && jQuery('#city').css('display','block')){
          jQuery('#state_list').css('display','none');
          jQuery('#city').css('display','none');
          jQuery('#zipcode').css('display','none');
        }
        if(jQuery('#airport_ident').css('display','block')){
          jQuery('#airport_ident').css('display','none');
        }
        if(jQuery('#wing_list').css('display','none')){
          jQuery('#wing_list').css('display','block');
        }
      }

      function getAirports(){
        if(jQuery('#wing_list').css('display','block')){
          jQuery('#wing_list').css('display','none');
        }
        if(jQuery('#state_list').css('display','block') && jQuery('#city').css('display','block')){
          jQuery('#state_list').css('display','none');
          jQuery('#city').css('display','none');
        }

        if(jQuery('#airport_ident').css('display') == 'none'){
          jQuery('#airport_ident').css('display','block');
        }else{
          jQuery('#airport_ident').css('display','none');
        }
      }
      function getCSZ(){
        if(jQuery('#wing_list').css('display','block')){
          jQuery('#wing_list').css('display','none');
        }
        if(jQuery('#airport_ident').css('display','block')){
          jQuery('#airport_ident').css('display','none');
        }

        if(jQuery('#state_list').css('display') == 'none' && jQuery('#city').css('display') == 'none')
        {
          jQuery('#state_list').css('display','block');
          jQuery('#city').css('display','block');
          jQuery('#zipcode').css('display','block');
        }else{
          jQuery('#state_list').css('display','none');
          jQuery('#city').css('display','none');
          jQuery('#zipcode').css('display','none');
        }
      }

      jQuery('#wing_list').change(function()
      {
        jQuery('#location_type').val(1);
        jQuery('#f_location_type').val(1);
      });

      jQuery('#airport_ident').change(function()
      {
        jQuery('#location_type').val(2);
        jQuery('#f_location_type').val(2);
        jQuery('#f_ident').val(jQuery('#airport_ident').val());
      });
      jQuery('#city').change(function()
      {
        jQuery('#location_type').val(3);
        jQuery('#f_location_type').val(3);
        jQuery('#f_city').val(jQuery('#city').val());
      });
      jQuery('#zipcode').change(function()
      {
        jQuery('#location_type').val(3);
        jQuery('#f_location_type').val(3);
        jQuery('#f_zipcode').val(jQuery('#zipcode').val());
      });

      jQuery('#state_list').change(function()
      {
        jQuery('#location_type').val(3);
        jQuery('#f_location_type').val(3);
        jQuery('#f_state').val(jQuery('#state_list').val());
      });

      jQuery('#all_types').click(function()
      {
        jQuery('#all_t').val(1);
      });

      jQuery('#open').click(function()
      {
        jQuery('#all_t').val('');
      });

      jQuery('#filled').click(function()
      {
        jQuery('#all_t').val('');
      });

      jQuery('#ignore_filter input:checkbox').bind('click', function(){
        ignoreFrom();
      });

      jQuery('#save_user_filter').val(1);
      if(jQuery('#unset_availability').is(':checked')){
        jQuery('#f_avi').val(1);
      }
      if(jQuery('#date_range1').val()){
        jQuery('#f_date_range1').val(jQuery('#date_range1').val());
      }
      if(jQuery('#date_range2').val()){
        jQuery('#f_date_range2').val(jQuery('#date_range2').val());
      }
      if(jQuery('#day_1').is(':clicked')){
        if(jQuery('#day1').val()){
          jQuery('#f_day_1').val(jQuery('#day1').val());
        }
      }
      if(jQuery('#day_2').is(':clicked')){
        if(jQuery('#day2').val()){
          jQuery('#f_day_2').val(jQuery('#day2').val());
        }
      }
      if(jQuery('#day_3').is(':clicked')){
        if(jQuery('#day3').val()){
          jQuery('#f_day_3').val(jQuery('#day3').val());
        }
      }
      if(jQuery('#day_4').is(':clicked')){
        if(jQuery('#day4').val()){
          jQuery('#f_day_4').val(jQuery('#day4').val());
        }
      }
      if(jQuery('#day_5').is(':clicked')){
        if(jQuery('#day5').val()){
          jQuery('#f_day_5').val(jQuery('#day5').val());
        }
      }
      if(jQuery('#day_6').is(':clicked')){
        if(jQuery('#day6').val()){
          jQuery('#f_day_6').val(jQuery('#day6').val());
        }
      }
      if(jQuery('#day_7').is(':clicked')){
        if(jQuery('#day7').val()){
          jQuery('#f_day_7').val(jQuery('#day7').val());
        }
      }

      if(jQuery('#location_type').val() == 1){
        if(jQuery('#wing_list').val() != '-- select --'){
          jQuery('#f_wing').val(jQuery('#wing_list').val());
        }
      }else if(jQuery('#location_type').val() == 2){
        if(jQuery('#airport_ident').val()){
          jQuery('#f_ident').val(jQuery('#airport_ident').val());
        }
      }else if(jQuery('#location_type').val() == 3){
        if(jQuery('#city').val()){
          jQuery('#f_city').val(jQuery('#city').val());
        }
        if(jQuery('#zipcode').val()){
          jQuery('#f_zipcode').val(jQuery('#zipcode').val());
        }
        if(jQuery('#state_list').val()){
          jQuery('#f_state').val(jQuery('#state_list').val());
        }
      }
      if(jQuery('#is_orgin').is(':checked')){
        if(jQuery('#is_orgin').val()){
          jQuery('#f_orgin').val(jQuery('#is_orgin').val());
        }
      }
      if(jQuery('#is_dest').is(':checked')){
        if(jQuery('#is_dest').val()){
          jQuery('#f_dest').val(jQuery('#is_dest').val());
        }
      }
      if(jQuery('#is_pilot').is(':checked')){
        if(jQuery('#is_pilot').val()){
          jQuery('#f_pilot').val(jQuery('#is_pilot').val());
        }
      }
      if(jQuery('#is_ma').is(':checked')){
        if(jQuery('#is_ma').val()){
          jQuery('#f_ma').val(jQuery('#is_ma').val());
        }
      }
      if(jQuery('#is_ifr').is(':checked')){
        if(jQuery('#is_ifr').val()){
          jQuery('#f_ifr').val(jQuery('#is_ifr').val());
        }
      }

      if(jQuery('#all_t').val()){
        jQuery('#f_alltype').val(jQuery('#all_t').val());
      }
      if(jQuery('#filled').is(':checked')){
        if(jQuery('#filled').val()){
          jQuery('#f_filled').val(jQuery('#filled').val());
        }
      }

      if(jQuery('#open').is(':checked')){
        if(jQuery('#open').val()){
          jQuery('#f_open').val(jQuery('#open').val());
        }
      }

      if(jQuery('#max_pass').val()){
        jQuery('#f_maxpass').val(jQuery('#max_pass').val());
      }
      if(jQuery('#max_wei').val()){
        jQuery('#f_maxwei').val(jQuery('#max_wei').val());
      }
      if(jQuery('#max_dist').val()){
        jQuery('#f_maxdist').val(jQuery('#max_dist').val());
      }
      if(jQuery('#max_eff').val()){
        jQuery('#f_maxeff').val(jQuery('#max_eff').val());
      }

      jQuery('#save_filter').click(function()
      {

        jQuery('#save_user_filter').val(1);
        if(jQuery('#unset_availability').is(':checked')){
          jQuery('#f_avi').val(1);
        }
        if(jQuery('#date_range1').val()){
          jQuery('#f_date_range1').val(jQuery('#date_range1').val());
        }
        if(jQuery('#date_range2').val()){
          jQuery('#f_date_range2').val(jQuery('#date_range2').val());
        }
        if(jQuery('#day_1').is(':clicked')){
          if(jQuery('#day1').val()){
            jQuery('#f_day_1').val(jQuery('#day1').val());
          }
        }
        if(jQuery('#day_2').is(':clicked')){
          if(jQuery('#day2').val()){
            jQuery('#f_day_2').val(jQuery('#day2').val());
          }
        }
        if(jQuery('#day_3').is(':clicked')){
          if(jQuery('#day3').val()){
            jQuery('#f_day_3').val(jQuery('#day3').val());
          }
        }
        if(jQuery('#day_4').is(':clicked')){
          if(jQuery('#day4').val()){
            jQuery('#f_day_4').val(jQuery('#day4').val());
          }
        }
        if(jQuery('#day_5').is(':clicked')){
          if(jQuery('#day5').val()){
            jQuery('#f_day_5').val(jQuery('#day5').val());
          }
        }
        if(jQuery('#day_6').is(':clicked')){
          if(jQuery('#day6').val()){
            jQuery('#f_day_6').val(jQuery('#day6').val());
          }
        }
        if(jQuery('#day_7').is(':clicked')){
          if(jQuery('#day7').val()){
            jQuery('#f_day_7').val(jQuery('#day7').val());
          }
        }

        if(jQuery('#location_type').val() == 1){
          if(jQuery('#wing_list').val() != '-- select --'){
            jQuery('#f_wing').val(jQuery('#wing_list').val());
          }
        }else if(jQuery('#location_type').val() == 2){
          if(jQuery('#airport_ident').val()){
            jQuery('#f_ident').val(jQuery('#airport_ident').val());
          }
        }else if(jQuery('#location_type').val() == 3){
          if(jQuery('#city').val()){
            jQuery('#f_city').val(jQuery('#city').val());
          }
          if(jQuery('#zipcode').val()){
            jQuery('#f_zipcode').val(jQuery('#zipcode').val());
          }
          if(jQuery('#state_list').val()){
            jQuery('#f_state').val(jQuery('#state_list').val());
          }
        }

        if(jQuery('#is_orgin').is(':checked')){
          if(jQuery('#is_orgin').val()){
            jQuery('#f_orgin').val(jQuery('#is_orgin').val());
          }
        }
        if(jQuery('#is_dest').is(':checked')){
          if(jQuery('#is_dest').val()){
            jQuery('#f_dest').val(jQuery('#is_dest').val());
          }
        }
        if(jQuery('#is_pilot').is(':checked')){
          if(jQuery('#is_pilot').val()){
            jQuery('#f_pilot').val(jQuery('#is_pilot').val());
          }
        }
        if(jQuery('#is_ma').is(':checked')){
          if(jQuery('#is_ma').val()){
            jQuery('#f_ma').val(jQuery('#is_ma').val());
          }
        }
        if(jQuery('#is_ifr').is(':checked')){
          if(jQuery('#is_ifr').val()){
            jQuery('#f_ifr').val(jQuery('#is_ifr').val());
          }
        }

        if(jQuery('#all_t').val()){
          jQuery('#f_alltype').val(jQuery('#all_t').val());
        }
        if(jQuery('#filled').is(':checked')){
          if(jQuery('#filled').val()){
            jQuery('#f_filled').val(jQuery('#filled').val());
          }
        }

        if(jQuery('#open').is(':checked')){
          if(jQuery('#open').val()){
            jQuery('#f_open').val(jQuery('#open').val());
          }
        }

        if(jQuery('#max_pass').val()){
          jQuery('#f_maxpass').val(jQuery('#max_pass').val());
        }
        if(jQuery('#max_wei').val()){
          jQuery('#f_maxwei').val(jQuery('#max_wei').val());
        }
        if(jQuery('#max_dist').val()){
          jQuery('#f_maxdist').val(jQuery('#max_dist').val());
        }
        if(jQuery('#max_eff').val()){
          jQuery('#f_maxeff').val(jQuery('#max_eff').val());
        }

        userFilterAction();
      });

      jQuery('#reset_filter').click(function()
      {
        jQuery('#reset_user_filter').val(1);
        userFilterAction();
      });

      jQuery('#hide_filter').click(function()
      {
        if(jQuery('#user_filter_area').css('display') == 'block'){
          jQuery('#user_filter_area').css('display','none');
          jQuery('#hide_area').css('display','none');
          jQuery('#show_area').css('display','block');
        }
      });

      jQuery('#show_filter').click(function()
      {
        if(jQuery('#user_filter_area').css('display') == 'none'){
          jQuery('#user_filter_area').css('display','block');
          jQuery('#hide_area').css('display','block');
          jQuery('#show_area').css('display','none');
        }
      });

      jQuery('#reset').click(function()
      {
        if(jQuery('#unset_availability').is(':checked')){
          jQuery('#unset_availability').attr('checked','');
        }

        if(jQuery('#date_range1').val()){
          jQuery('#date_range1').val('');
        }
        if(jQuery('#date_range2').val()){
          jQuery('#date_range2').val('');
        }
        if(jQuery('#1day').attr('class') == 'active'){
          jQuery('#1day').attr('class','');
        }
        if(jQuery('#2day').attr('class') == 'active'){
          jQuery('#2day').attr('class','');
        }
        if(jQuery('#3day').attr('class') == 'active'){
          jQuery('#3day').attr('class','');
        }
        if(jQuery('#4day').attr('class') == 'active'){
          jQuery('#4day').attr('class','');
        }
        if(jQuery('#5day').attr('class') == 'active'){
          jQuery('#5day').attr('class','');
        }
        if(jQuery('#6day').attr('class') == 'active'){
          jQuery('#6day').attr('class','');
        }
        if(jQuery('#7day').attr('class') == 'active'){
          jQuery('#7day').attr('class','');
        }
        if(jQuery('#wing_list').val() != '--select--'){
          jQuery('#wing_list').val('--select--');
        }
        if(jQuery('#airport_ident').val()){
          jQuery('#airport_ident').val('');
        }
        if(jQuery('#city').val()){
          jQuery('#city').val('');
        }
        if(jQuery('#zipcode').val()){
          jQuery('#zipcode').val('');
        }
        if(jQuery('#state_list').val()){
          jQuery('#state_list').val('Al');
        }
        if(jQuery('#is_orgin').is(':checked')){
          jQuery('#is_orgin').attr('checked','');
        }
        if(jQuery('#is_dest').is(':checked')){
          jQuery('#is_dest').attr('checked','');
        }
        if(jQuery('#is_pilot').is(':checked')){
          jQuery('#is_pilot').attr('checked','');
        }
        if(jQuery('#is_ma').is(':checked')){
          jQuery('#is_ma').attr('checked','');
        }
        if(jQuery('#is_ifr').is(':checked')){
          jQuery('#is_ifr').attr('checked','');
        }
        if(jQuery('#filled').is(':checked')){
          jQuery('#filled').attr('checked','');
        }
        if(jQuery('#open').is(':checked')){
          jQuery('#open').attr('checked','');
        }
        if(jQuery('#max_pass').val()){
          jQuery('#max_pass').val('');
        }
        if(jQuery('#max_wei').val()){
          jQuery('#max_wei').val('');
        }
        if(jQuery('#max_dist').val()){
          jQuery('#max_dist').val('');
        }
        if(jQuery('#max_eff').val()){
          jQuery('#max_eff').val('');
        }
        location.reload();
      });

      jQuery('#sort_by').change(function()
      {
        sortForm();
      });
      jQuery('#date_range1').datepicker();
      jQuery('#date_range2').datepicker();
      // ]]>
</script>
  