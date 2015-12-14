
<?php use_helper('jQuery', 'DateForm')?>
<div class="step" style="display: block;">
   <?php echo jq_javascript_tag()?>
    //donation_amount
    //due_amount
    //total_amount_text
    //total_amount
    //ccard_info

    jQuery(document).ready(function(){
        jQuery("#donation_amount").bind('keyup',function(event){
            
            var total;
            var dueamount;
            var donationamount;
            dueamount = parseFloat(jQuery("#due_amount").val(), 10);
            donationamount = parseFloat(jQuery('#donation_amount').val(), 10);

            if(event.keyCode==8 || event.keyCode==32)
            {
                return false;
            }

            var objRegExp  =  /(^-?\d\d*\.\d*$)|(^-?\d\d*$)|(^-?\.\d\d*$)/;
            if(!(objRegExp.test(donationamount))){
                jQuery('#donation_amount').val('');
                alert('Input must be digits');
            }
            
            total = parseFloat(dueamount + donationamount);
            //alert(total);            
            jQuery('#total_amount_text').html(total);
            jQuery('#total_amount').val(total);

            if(total > 0)
            {
              jQuery('.ccard_info').css('display', 'block');
            }
            if(total <= 0)
            {
                jQuery('.ccard_info').css('display', 'none');
            }
        });
    });
<?php echo end_javascript_tag()?>
  <div class="passenger-form">
    <form action="<?php echo url_for('renewal/step5Check?id='.$form->getObject()->getId()) ?>" method="post" <?php $form->isMultipart() and print 'enctype="multipart/form-data" ' ?>>
      <?php echo $form->renderHiddenFields() ?>
      <div class="box full">
        <!--div class="wrap"><label><?php echo $form['premium_choice']->renderLabelName() ?></label>
        <?php //echo $form['premium_choice'] ?> <?php echo $form['premium_choice']->renderError() ?>
        </div-->
        <div class="wrap">
          <label>Volunteer Opportunities</label>
          <div class="wrap">
            Many Angel Flight West members lend valuable assistance beyond
            providing flying skills. Please indicate any areas in which you may
            be willing to assist us:<br/>
            <?php echo $form['mission_orientation']?>
            <?php echo $form['mission_orientation']->renderLabel(null, array('class' => 'raw'))?>
            <?php echo $form['mission_orientation']->renderError()?>
            <br clear="all"/>
            <?php echo $form['mission_coordination']?>
            <?php echo $form['mission_coordination']->renderLabel(null, array('class' => 'raw'))?>
            <?php echo $form['mission_coordination']->renderError()?>
            <br clear="all"/>
            <?php echo $form['pilot_recruitment']?>
            <?php echo $form['pilot_recruitment']->renderLabel(null, array('class' => 'raw'))?>
            <?php echo $form['pilot_recruitment']->renderError()?>
            <br clear="all"/>
            <?php echo $form['fund_raising']?>
            <?php echo $form['fund_raising']->renderLabel(null, array('class' => 'raw'))?>
            <?php echo $form['fund_raising']->renderError()?>
            <br clear="all"/>
            <?php echo $form['celebrity_contacts']?>
            <?php echo $form['celebrity_contacts']->renderLabel(null, array('class' => 'raw'))?>
            <?php echo $form['celebrity_contacts']->renderError()?>
            <br clear="all"/>
            <?php echo $form['graphic_arts']?>
            <?php echo $form['graphic_arts']->renderLabel(null, array('class' => 'raw'))?>
            <?php echo $form['graphic_arts']->renderError()?>
            <br clear="all"/>
            <?php echo $form['hospital_outreach']?>
            <?php echo $form['hospital_outreach']->renderLabel(null, array('class' => 'raw'))?>
            <?php echo $form['hospital_outreach']->renderError()?>
            <br clear="all"/>
            <?php echo $form['event_planning']?>
            <?php echo $form['event_planning']->renderLabel(null, array('class' => 'raw'))?>
            <?php echo $form['event_planning']->renderError()?>
            <br clear="all"/>
            <?php echo $form['media_relations']?>
            <?php echo $form['media_relations']->renderLabel(null, array('class' => 'raw'))?>
            <?php echo $form['media_relations']->renderError()?>
            <br clear="all"/>
            <?php echo $form['telephone_work']?>
            <?php echo $form['telephone_work']->renderLabel(null, array('class' => 'raw'))?>
            <?php echo $form['telephone_work']->renderError()?>
            <br clear="all"/>
            <?php echo $form['computers']?>
            <?php echo $form['computers']->renderLabel(null, array('class' => 'raw'))?>
            <?php echo $form['computers']->renderError()?>
            <br clear="all"/>
            <?php echo $form['clerical']?>
            <?php echo $form['clerical']->renderLabel(null, array('class' => 'raw'))?>
            <?php echo $form['clerical']->renderError()?>
            <br clear="all"/>
            <?php echo $form['printing']?>
            <?php echo $form['printing']->renderLabel(null, array('class' => 'raw'))?>
            <?php echo $form['printing']->renderError()?>
            <br clear="all"/>
            <?php echo $form['writing']?>
            <?php echo $form['writing']->renderLabel(null, array('class' => 'raw'))?>
            <?php echo $form['writing']->renderError()?>
            <br clear="all"/>
            <?php echo $form['speakers_bureau']?>
            <?php echo $form['speakers_bureau']->renderLabel(null, array('class' => 'raw'))?>
            <?php echo $form['speakers_bureau']->renderError()?>
            <br clear="all"/>
            <?php echo $form['wing_team']?>
            <?php echo $form['wing_team']->renderLabel(null, array('class' => 'raw'))?>
            <?php echo $form['wing_team']->renderError()?>
            <br clear="all"/>
            <?php echo $form['web_internet']?>
            <?php echo $form['web_internet']->renderLabel(null, array('class' => 'raw'))?>
            <?php echo $form['web_internet']->renderError()?>
            <br clear="all"/>
            <?php echo $form['foundation_contacts']?>
            <?php echo $form['foundation_contacts']->renderLabel(null, array('class' => 'raw'))?>
            <?php echo $form['foundation_contacts']->renderError()?>
            <br clear="all"/>
            <?php echo $form['aviation_contacts']?>
            <?php echo $form['aviation_contacts']->renderLabel(null, array('class' => 'raw'))?>
            <?php echo $form['aviation_contacts']->renderError()?>
          </div>
        </div>
        <div class="wrap">
          <label>I am a member of</label>
          <div class="wrap">
            <?php echo $form['member_aopa']?>
            <?php echo $form['member_aopa']->renderLabel(null, array('class' => 'raw'))?>
            <?php echo $form['member_aopa']->renderError()?>
            <br clear="all"/>
            <?php echo $form['member_kiwanis']?>
            <?php echo $form['member_kiwanis']->renderLabel(null, array('class' => 'raw'))?>
            <?php echo $form['member_kiwanis']->renderError()?>
            <br clear="all"/>
            <?php echo $form['member_rotary']?>
            <?php echo $form['member_rotary']->renderLabel(null, array('class' => 'raw'))?>
            <?php echo $form['member_rotary']->renderError()?>
            <br clear="all"/>
            <?php echo $form['member_lions']?>
            <?php echo $form['member_lions']->renderLabel(null, array('class' => 'raw'))?>
            <?php echo $form['member_lions']->renderError()?>
            <br clear="all"/>
            <?php echo $form['member_99s']?>
            <?php echo $form['member_99s']->renderLabel(null, array('class' => 'raw'))?>
            <?php echo $form['member_99s']->renderError()?>
            <br clear="all"/>
            <?php echo $form['member_wia']?>
            <?php echo $form['member_wia']->renderLabel(null, array('class' => 'raw'))?>
            <?php echo $form['member_wia']->renderError()?>
          </div>
        </div>
        <div class="wrap">
          <?php echo $form['company_name']->renderLabel()?>
          <?php echo $form['company_name']?>
          <?php echo $form['company_name']->renderError()?>
        </div>
        <div class="wrap">
          <?php echo $form['company_position']->renderLabel()?>
          <?php echo $form['company_position']?>
          <?php echo $form['company_position']->renderError()?>
        </div>
        <div class="wrap">
          <?php echo $form['company_match_funds']->renderLabel()?>
          <?php echo $form['company_match_funds']?>
          <?php echo $form['company_match_funds']->renderError()?>
        </div>

            <div class="wrap">
              <label>Donation Amount</label>
              <input type="text" name="donation_amount" id="donation_amount" value="<?php if($donation_amount!='') echo $donation_amount; else echo 0;?>"/>
          </div>
          <?php if($memberclass->getRenewalFee() == 0){?>
            <div class="wrap">
              <label>Due Amount</label>              
              <span id="due_amount_message">No charge because your member class is <?php echo $memberclass->getName();?></span>
              <input type="hidden" name="due_amount"  id="due_amount" value="0"/>
              <input type="hidden" name="member_due_amount"  id="member_due_amount" value="0"/>
            </div>
          <?php } else {?>
             <div class="wrap">
              <label>Due Amount</label>              
              <input type="text" name="due_amount" disabled="disabled"  id="due_amount" value="<?php echo $memberclass->getRenewalFee();?>"/>
              <input type="hidden" name="member_due_amount"  id="member_due_amount" value="<?php echo $memberclass->getRenewalFee();?>"/>
             </div>
          <?php } ?>
          <div>
              __________________________________________
          </div>
          <div class="wrap">
              <label>Total</label>
              <span id="total_amount_text"><?php if($total_amount!='') echo $total_amount; else echo $memberclass->getRenewalFee();?></span>
              <input type="hidden" name="total_amount" id="total_amount" value="<?php if($total_amount!='') echo $total_amount; else echo 0;?>"/>
          </div>         
          
          <?php if($total_amount!=''){?>
          <div class="ccard_info" id="ccard_info"  style="display: block;">
          <?php } else {?>
          <div class="ccard_info" id="ccard_info" <?php if($memberclass->getRenewalFee() == 0):?>style="display: none;"<?php else: ?> style="display: block;" <?php endif;?>>
          <?php } ?>

              <div class="wrap">
                  <?php echo $form['ccard_number']->renderLabel()?>
                  <?php echo $form['ccard_number']?>
                  <?php echo $form['ccard_number']->renderError()?>
            </div>
            <div class="wrap"><label
                    for="<?php echo $form['ccard_expire']->renderId()?>"> <?php echo $form['ccard_expire']->renderLabelName()?>
            </label> <?php //echo $form['ccard_expire']?> <?php //echo $form['ccard_expire']->renderError()?>
                <?php
                 echo select_month_tag('month', 'Select month', array('use_month_numbers' => true,'include_custom' => 'Select month'),array('style'=>'width:95px'));
                 $year_start = date('Y', strtotime('now'));
                 $year_end = date('Y', strtotime('+20 years'));
                 echo select_year_tag('year', 'Select year', array('year_start' => $year_start, 'year_end' => $year_end, 'include_custom' => 'Select year'), array('style'=>'width:90px'));
                 //'include_blank' => true
                ?>
                <?php if($exp==1){?>
                <ul class="error_list">
                    <li>Please select expiration date </li>
                </ul>
                <?php } ?>
            <?php //echo $form['ccard_expire']
            //          $array = explode("/", $form->getObject()->getCcardExpire());
            //          $s_y = $sf_params->get("s_y") ? $sf_params->get("s_y") : (isset($array[1]) ? $array[1] : "");
            //          $s_m = $sf_params->get("s_m") ? $sf_params->get("s_m") : (isset($array[0]) ? $array[0] : "");
            ?> <?php //echo select_month_tag_miga('s_m', $s_m, array(), array("style"=>"width:40px;")) ?>
            <?php //echo select_year_tag_miga('s_y', $s_y, array(), array("style"=>"width:55px;")) ?>
            </div>
            <div class="wrap"><label
                    for="<?php echo $form['ccard_expire']->renderId()?>"> <?php echo $form['ccard_code']->renderLabelName()?>
            </label> <?php echo $form['ccard_code']?> <?php echo $form['ccard_code']->renderError()?>
            </div>
        </div>      
        <div class="form-submit">
          <a class="btn-action" href="#" onclick="$('#step5_submit').click(); return false;"><span>Save and Continue »</span><strong> </strong></a>
          <a class="cancel" href="#" onclick="$('.fourth').click();">&laquo; Back</a>
          <input type="submit" id="step5_submit" value="submit" class="hide"/>
        </div>
      </div>
    </form>
  </div>
</div>

