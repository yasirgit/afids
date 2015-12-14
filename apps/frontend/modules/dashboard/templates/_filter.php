<?php use_helper('Form');
$date_widget = $sf_data->getRaw('date_widget');
$selected_types = $sf_data->getRaw('selected_types');
use_javascripts_for_form($date_widget);
use_stylesheets_for_form($date_widget);
$sf_response->addJavascript('/js/jquery.meio.mask.min.js');
?>
<?php use_helper('Javascript', 'Form', 'jQuery', 'Object', 'Global') ?>

<form action="/dashboard/index" id="form_filter" method="post">
  <input type="hidden" name="avail" value="avail" />
  <fieldset>
    <input type="hidden" name="filter" value="1"/>
    <div class="wrap">
      <div class="missions-available-entry">
        <?php
            $checked = null;
            if (isset($ignore_availability) && $ignore_availability == 1)
                $checked = 'checked';
        ?>
        <?php if ($pilot !== null) {?>
          <input type="checkbox" name="ignore_availability" id="ignore_availability" <?php if($checked) echo "checked= '".$checked."'"?>  value="1" />
            <label for="ignore_availability">Ignore my availability</label>
          <a class="match-flights" href="#" onclick="javascript:jQuery('#personalflights').show();" style="outline: none">Show missions matching my personal flights</a>
          <div id="personalflights" class="personal-flights">
            <div class="holder">
              <div class="bg">
                <table>
                <?php foreach ($personal_flights as $personal_flight): ?>
                <tr>
                  <td>
                    <a class="pfa" href="#" onclick="applyPersonalFlight('<?php echo $personal_flight->getDepartureDate('m/d/Y')?>', '<?php echo $personal_flight->getReturnDate('m/d/Y')?>', '<?php echo $personal_flight->getOriginCity()?>', '<?php echo $personal_flight->getOriginZipcode()?>'); return false;">
                       <?php echo $personal_flight->getName().' ('.$personal_flight->getDepartureDate('m/d/Y').')'?>
                    </a>
                  </td>
                </tr>
                <?php endforeach;?>
                </table>
              </div>
            </div>
          </div>
        <?php }?>
      </div>
    </div>

    <div class="missions-available-filter">
      <div class="bg" id="user_filter_area">
        <div class="wrap">
          <div class="date-range">
            <label for="date_range1">Date Range:</label>
            <?php echo $date_widget->render('date_range1', $date_range1);?>
            <strong class="to">to</strong>
            <?php echo $date_widget->render('date_range2', $date_range2);?>
          </div>
          <div class="flight-days">
            <strong>Flight Days:</strong>
            <ul>
              <li><a href="#monday" class="weekdays">M</a><input type="hidden" name="weekdays[0]" id="monday" value="<?php echo $weekdays[0]?>"/></li>
              <li><a href="#tuesday" class="weekdays">T</a><input type="hidden" name="weekdays[1]" id="tuesday" value="<?php echo $weekdays[1]?>"/></li>
              <li><a href="#wednesday" class="weekdays">W</a><input type="hidden" name="weekdays[2]" id="wednesday" value="<?php echo $weekdays[2]?>"/></li>
              <li><a href="#thursday" class="weekdays">Th</a><input type="hidden" name="weekdays[3]" id="thursday" value="<?php echo $weekdays[3]?>"/></li>
              <li><a href="#friday" class="weekdays">F</a><input type="hidden" name="weekdays[4]" id="friday" value="<?php echo $weekdays[4]?>"/></li>
              <li><a href="#saturday" class="weekdays">Sa</a><input type="hidden" name="weekdays[5]" id="saturday" value="<?php echo $weekdays[5]?>"/></li>
              <li><a href="#sunday" class="weekdays">Su</a><input type="hidden" name="weekdays[6]" id="sunday" value="<?php echo $weekdays[6]?>"/></li>
            </ul>
          </div>
          <div class="location">
            <div class="wrap">
              <strong>Location:</strong>
                <ul>
                  <li id="wing">
                    <div id="activewing" style="display: block;">
                        Wing
                    </div>
                    <div id="inactivewing" style="display: none;">
                        <a href="javascript:getWings()">Wing</a>
                    </div>
                  </li>
                  <li id="airport">
                    <div id="activeairport" style="display: none;">
                        Airport
                    </div>
                    <div id="inactiveairport" style="display: block;">
                        <a href="javascript:getAirports()">Airport</a>
                    </div>
                  </li>
                  <li id="csz">
                    <div id="activecsz" style="display: none;">
                      City/State/Zip
                    </div>
                    <div id="inactivecsz" style="display: block;">
                      <a href="javascript:getCSZ()">City/State/Zip</a>
                    </div>
                  </li>
                </ul>
            </div>
            <div class="wrap">
              <div class="date-range">
                <?php echo select_tag('wing_id', objects_for_select($wings, 'getId', 'getName', $wing_id, array('include_custom' => 'All')), array('id' => 'wing_list')); ?>

                <?php //echo select_tag('ident', objects_for_select($idents, 'getId','getIdent', $ident, array('include_custom' =>'All')), array('style' =>'display:none', 'id'=>'airport_ident'));?>
                <?php echo input_auto_complete_tag('airport_ident', isset($airport_ident) ? $airport_ident : "",
                     'pilotRequest/autoGetIdents',
                     array('autocomplete' => 'off', 'class'=>'text','style'=>'left:15px;width:100px'),
                     array(
                     'use_style'    => true,
                     'indicator'    =>'indicator',
                     )
                    ); ?>
                 <div id="indicator" style="display:none"><img src="/images/loading.gif"></div>

                <input id="city" name="city" type="text" class="text" value="<?php echo $city;?>" style="display:none"/>
                <?php
                echo select_tag('state',
                        options_for_select($states, $state, array('include_custom' => 'All')),
                        array('style' => 'display:none', 'id' => 'state_list', 'class' => 'text'));
?>

                <input id="zipcode" name="zipcode" type="text" class="text" value="<?php echo $zip?>" style="display:none"/>
              </div>
            </div>
          </div>
          <div class="location-as">
            <strong>Location as:</strong>
              <ul>
                <li>
                  <input id="is_orgin" type="checkbox" name="origin" value="1" <?php if ($origin == 1) echo 'checked="checked"'?>/>
                  <label for="is_orgin">Origin</label>
                </li>
                <li>
                  <input id="is_dest" type="checkbox" name="dest" value="1" <?php if ($dest == 1) echo 'checked="checked"'?>/>
                  <label for="is_dest">Destination</label>
                </li>
              </ul>
          </div>
        </div>
  <!--            END OF WRAP-->
        <div class="ad-mission-filter">
          <div class="holder" style="min-height:10px;">
            <strong>Needs:</strong>
            <ul>
              <li>
                <input type="checkbox" name="needs_pilot"  value="1"  <?php if ($needs_pilot) echo 'checked="checked"'?>/>
                <label for="is_pilot">Pilot</label>
              </li>
              <li>
                <input type="checkbox" id="is_ma" name="co_pilot"  value="1" <?php if ($co_pilot) echo 'checked="checked"'?>/>
                <label for="is_ma">Mission Assistant</label>
              </li>
              <li>
                <input type="checkbox" name="ifr" value="1" <?php if ($ifr) echo 'checked="checked"'?>/>
                <label for="is_ifr">IFR Backup</label>
              </li>
            </ul>

            <strong>Show:</strong>
            <a href="#" class="all-missions" name="all_types" id="all_types" onclick="javascript:jQuery('#mtypes').show();">
              <label id="types_text">All Mission Types</label>
            </a>
            <div id="mtypes" class="all-mtype">
              <div class="holder" style="min-height:10px;">
                <div class="bg">
                  <a href="#" class="all-missions" name="c_all_types" id="c_all_types">All/None</a>
                  <input type="hidden" name="checkflag" value="0"/>
                  <br/>
                  <table>
                    <?php foreach ($mission_types as $mission_type): ?>
                    <tr>
                      <td>
                        <?php echo checkbox_tag('selected_types[]', $mission_type->getId(), in_array($mission_type->getId(), $selected_types), array("id" => "ru".$mission_type->getId()))?>
                        <label for="<?php echo "ru".$mission_type->getId()?>"><?php echo $mission_type->getName() ?></label>
                      </td>
                    </tr>
                    <?php endforeach ?>
                    <tr>
                      <td>
                        <a class="btn-dtls" id="done_types"><span>Done</span></a>
                      </td>
                    </tr>
                  </table>
                </div>
              </div>
            </div>
          <div>
          <ul>
            <li>
              <input id="filled" type="checkbox" name="filled"  value="1" <?php if ($filled) echo 'checked="checked"'?>/>
              <label for="filled">Filled</label>
            </li>
            <li>
              <input id="open" type="checkbox" name="open"  value="1" <?php if ($open) echo 'checked="checked"'?>/>
              <label for="open">Open</label>
            </li>
          </ul>
          </div>
        </div>
        <!--           End Ad mission filter-->
        <div class="characteristics">
          <div class="holder" style="min-height:10px;">
            <div>
              <label for="max_pass">Maximum Passengers:</label>
              <input id="max_pass" class="text" type="text" name="max_pass" maxlength="2" value="<?php echo $max_pass?>"/>
            </div>
            <div>
              <label for="max_wei">Maximum Weight:</label>
              <input id="max_wei" class="text" type="text" name="max_weight" maxlength="4" value="<?php echo $max_weight?>"/>
              <strong>lbs</strong>
            </div>
            <div>
              <label for="form-item-12">Maximum Distance:</label>
               <input id="max_dist" class="text" type="text" name="max_distance" maxlength="10" value="<?php echo $max_distance?>"/>
              <strong>miles</strong>
            </div>
            <div>
              <label for="max_eff">Minimum Efficiency:</label>
              <span style="color:red"><?php if($error_min_eff) echo 'please enter number 1 to 100';?></span>
              <input id="max_eff" class="text" type="text" name="min_efficiency" maxlength="3" value="<?php echo $min_efficiency?>"/>
              <strong>%</strong>
              <br/>
            </div>
          </div>
        </div>
        <!--          End characteristics-->
        </div>
        <!--        END BG-->
        </div>
    </div>
    <div class="filter-options">
      <ul>
        <li>
          <input type="submit" value="Find" id="find_button"/>
          <a href="<?php echo url_for('pilotRequest/resetFilterForm')?>" id="reset" name="reset">Reset</a>
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
    </div>
  </fieldset>
</form>

<!-- sort and pagination-->
<?php if ($pager->getNbResults()) {?>
<fieldset>
  <div class="sort">
    <label for="sort_by">Sort by:</label>
    <form method="post" action="/dashboard/index">
        <input type="hidden" name="avail" value="avail" />
        <input type="hidden" name="filter" value="true">
      <select name="sort_by" onchange="jQuery(this).parent().submit()">
        <option value="0" <?php if ($sort_by == 0) echo 'selected'?>>Date (earliest - latest)</option>
        <option value="1" <?php if ($sort_by == 1) echo 'selected'?>>Date (latest - earliest)</option>
      </select>
    </form>
    <div class="pager">
      <form action="/dashboard/index">
        <input type="hidden" name="filter" value="true">
        <input type="hidden" name="avail" value="avail" />
        <?php echo link_to('Previous','/dashboard/index?page='.$pager->getPreviousPage().'&filter=true&avail=true', array('class' => 'btn-pager-prev'))?>
        <input type="text" name="page" class="active-page" value="<?php echo $pager->getPage()?>"/>
        <strong>of <?php echo link_to($pager->getLastPage(),'/dashboard/index?page='.$pager->getLastPage().'&filter=true&avail=true')?></strong>
        <?php echo link_to('Next', '/dashboard/index?page='.$pager->getNextPage().'&filter=true&avail=true', array('class' => 'btn-pager-next'))?>
        <input type="submit" class="hide"/>
      </form>
      <?php if ($sf_user->hasCredential(array('Administrator'), false)) {?>
      <form action="<?php echo url_for('mission/email')?>" method="get" id="email_form">
        <div class="filter-options">
          Select:
          <ul>
            <li><a href="javascript:checkAll()" id="checkall" name="checkall">All</a></li>
            <li><a href="javascript:noneAll()" id="noneall" name="noneall">None</a></li>
            <li>
              <input type="hidden" id="total_checks" name="total_checks"/>
              <a class="btn-action-grey" href="javascript:getClicks()" id="email_post">
                <span>Email Pilots</span>
              </a>
              <input type="submit" class="hide" id="email_submit"/>
            </li>
          </ul>
        </div>
      </form>
      <?php }?>
    </div>
  </div>
  <input class="hide" type="submit" value="submit"/>
</fieldset>
<?php }?>

<script type="text/javascript">
//<![CDATA[
jQuery('#date_range1').datepicker();
jQuery('#date_range2').datepicker();
jQuery('#date_range1,#date_range2').setMask({
  mask:'99/99/9999',
  autoTab: false,
  onInvalid:function(c,nKey){
        jQuery(this).css('background','red');
  },
  onValid: function(c,nKey){
    jQuery(this).css('background','white');
  },
  onOverflow: function(c,nKey){
    jQquery(this).css('background','green');
  }
});
jQuery('#max_wei').bind('keyup blur',function(){
   jQuery(this).val( jQuery(this).val().replace(/[^\d\.]/g,'') ); }
);
jQuery('#max_pass').bind('keyup blur',function(){
   jQuery(this).val( jQuery(this).val().replace(/[^\d]/g,'') ); }
);
jQuery('#max_dist').bind('keyup blur',function(){
   jQuery(this).val( jQuery(this).val().replace(/[^\d\.]/g,'') ); }
);
jQuery('#max_eff').bind('keyup blur',function(){
   jQuery(this).val( jQuery(this).val().replace(/[^\d\.]/g,'') ); }
);
//]]>
</script>
