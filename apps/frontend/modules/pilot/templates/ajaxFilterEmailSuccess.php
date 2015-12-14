<?php use_helper('Form', 'Object', 'jQuery')?>

<div class="passenger-form">
  <form action="#" id="filter_email_form">
    <fieldset>
      <div class="box full">
        <div class="wrap">
          <label for="flight_status">Pilot Status</label>
          <?php echo select_tag('flight_status', options_for_select($flight_statuses, '', array('include_custom' => 'All')), array('onchange' => "countFiltered('filter_email_form');"))?>
        </div>

        <div class="wrap">
          <label for="availability">Availability</label>
          <div class="wrap">
            <input type="checkbox" value="1" name="weekday" id="available_weekday" onchange="countFiltered('filter_email_form');"/>
            <label class="raw" for="available_weekday">Weekdays</label><br clear="all"/>
            <input type="checkbox" value="1" name="night" id="available_night" onchange="countFiltered('filter_email_form');"/>
            <label class="raw" for="available_night">Nights</label><br clear="all"/>
            <input type="checkbox" value="1" name="last_minute" id="available_last_minute" onchange="countFiltered('filter_email_form');"/>
            <label class="raw" for="available_last_minute">Last Minute</label><br clear="all"/>
            <input type="checkbox" value="1" name="weekend" id="available_weekend" onchange="countFiltered('filter_email_form');"/>
            <label class="raw" for="available_weekend">Weekends</label><br clear="all"/>
            <input type="checkbox" value="1" name="assistant" id="available_assistant" onchange="countFiltered('filter_email_form');"/>
            <label class="raw" for="available_assistant">As Mission Assistant</label>
          </div>
        </div>
        <div class="wrap">
          <label for="transplant">Transplant</label>
          <input type="checkbox" class="" id="transplant" name="transplant" onchange="countFiltered('filter_email_form');"/>
          <label for="transplant" class="raw">Yes</label>
        </div>
        <div class="wrap">
          <label for="email_list_id">Mailing List</label>
          <?php echo select_tag('email_list_id', objects_for_select($email_lists, 'getId', 'getDescription', '', array('include_custom' => 'All')), array('onchange' => "countFiltered('filter_email_form');"))?>
        </div>
        <div class="wrap">
          <label for="efficiency">Use Efficiency or more</label>
          <input type="text" class="text narrowest" id="efficiency" name="efficiency" onchange="countFiltered('filter_email_form')"/>
          % (enter a value from 0 to 100)
        </div>

        <div class="wrap">
          <label>Wing</label>
          <div class="wrap">
            Select:
            <?php echo jq_link_to_function('All', "$('.wing').attr('checked', 'checked');")?>
            ,
            <?php echo jq_link_to_function('None', "$('.wing').attr('checked', false);")?>
          </div>
          <div class="wrap">
            <table>
             <?php $count = 0?>
             <?php foreach ($wings as $wing) {?>
              <?php $count++;?>
              <?php if($count%3==1):?>
              <tr>
              <?php endif;?>
                <td>
                  <input type="checkbox" class="wing" id="wing_<?php echo $wing->getId()?>" value="<?php echo $wing->getId()?>" name="wing_ids[]" onchange="countFiltered('filter_email_form')"/>
                    <label for="wing_<?php echo $wing->getId()?>"><?php echo $wing->getName()?></label>
                </td>
              <?php if($count%3==0):?>
              </tr>
              <?php endif;?>
             <?php }?>                
            </table>
          </div>
        </div>
        <div class="wrap">
          <label for="state">State</label>
          <?php echo select_tag('state', options_for_select($states, '', array('include_custom' => 'All')), array('onchange' => "countFiltered('filter_email_form');"))?>
        </div>
        <div class="wrap">
          <label for="home_base">Home base</label>
          <input type="text" class="text narrowest" id="home_base" name="home_base" onchange="countFiltered('filter_email_form');"/>
        </div>
        <div class="wrap">
          <label for="area_code">Area code</label>
          <input type="text" class="text narrowest" id="area_code" name="area_code" onchange="countFiltered('filter_email_form');"/>
        </div>
        <div class="wrap">
          <label for="county">County Name:</label>
          <input type="text" class="text narrowest" id="county" name="county" onchange="countFiltered('filter_email_form');"/>
        </div>
        <div class="wrap" id="matches" style="font-size:24px; font-weight:bold;">
          
        </div>
        <div class="form-submit">
          <a href="#" class="btn-action" onclick="getFiltered('filter_email_form');"><span>Done</span><strong>&nbsp;</strong></a>
          <a href="#" onclick="$('#lightbox-overlay').click();return false;" class="cancel">Cancel</a>
        </div>
      </div>
    </fieldset>
  </form>
</div>