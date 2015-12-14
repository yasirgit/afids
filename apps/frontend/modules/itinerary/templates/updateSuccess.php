<?php include_stylesheets_for_form($form) ?>
<?php include_javascripts_for_form($form) ?>
<?php include_stylesheets_for_form($form_req) ?>
<?php include_javascripts_for_form($form_req) ?>

<?php include_stylesheets_for_form($person_form) ?>
<?php include_javascripts_for_form($person_form) ?>

<?php use_stylesheets_for_form($agency_form);?>
<?php use_javascripts_for_form($agency_form);?>

<?php use_stylesheets_for_form($form1);?>
<?php use_javascripts_for_form($form1);?>
<?php use_stylesheets_for_form($form2);?>
<?php use_javascripts_for_form($form2);?>
<?php use_stylesheets_for_form($form3);?>
<?php use_javascripts_for_form($form3);?>
<?php use_stylesheets_for_form($form4);?>
<?php use_javascripts_for_form($form4);?>
<?php use_stylesheets_for_form($form5);?>
<?php use_javascripts_for_form($form5);?>
<?php use_helper('Javascript', 'Form') ?>
<?php use_helper('jQuery', 'Form') ?>
<?php use_helper('jQuery') ?>
<style type="text/css">
#ui-datepicker-div{
    z-index:9999;
}
</style>
<script type="text/javascript">
  jQuery.fn.center = function () {
        this.css("position","absolute");
        this.css("top", ( jQuery(window).height() - this.height() ) / 2+jQuery(window).scrollTop() + "px");
        this.css("left", ( jQuery(window).width() - this.width() ) / 2+jQuery(window).scrollLeft() + "px");
        return this;
      }
      
jQuery(document).ready(
  function(){   

     jQuery("#loading-lightbox-overlay").height((jQuery(document).height() + 175)).width(jQuery(document).width());
     if(/itinerary_edit/.test(window.location.href)){
         jQuery("#comps").show();
         jQuery('#campnn_passenger_id').val(jQuery("#passenger_id").val());
     }
     jQuery('input').keydown(function(e){
        if (e.keyCode == 13) {
            jQuery(this).parent('form').submit();
            return false;
        }
    });
  });
</script>
<?php echo jq_javascript_tag()?>
function personAddPassenger(element)
{
  jQuery.ajax({
    url : '<?php echo url_for('itinerary/ajaxAddPersonAndPassenger')?>',
    beforeSend: function(){
      jQuery("#loading-lightbox-overlay").show();
    },
    data : jQuery(element).serialize(),    
    success : function(data){
      jQuery("#addpersonandpassanger_form").html(data);      
      jQuery("#loading-lightbox-overlay").hide();
    },
    error : function(){
     alert("error");
    }
  })
  return false;
}
var passComponent = { id: 0 };
function setSelectionIdNew(text, li)
{
  var id = li.id.split('_');
  jQuery('#'+id[0]+'_id').val(id[1]);
  jQuery('#campnn_passenger_id').val(id[1]);
  passComponent.id = id[1];
  jQuery.ajax({
    url: '<?php echo url_for('passenger/getPassengerLodgingAndFacility')?>',
    data: {id: id[1] },
    dataType: 'json',
    cache : false,
    beforeSend: function(){
      jQuery("#lodging_indicator, #facility_indicator").show()
    },
    success: function(data){
      jQuery('#facility').val(data.facility);
      jQuery('#lodging').val(data.lodging);
      jQuery('#faclodpassid').val(id[1]);
      jQuery('#fac_dest').show();
      jQuery('#lod_dest').show();
      jQuery('#fac_city').text(data.facility_city);
      jQuery('#fac_state').text(data.facility_state);
      jQuery('#fac_phone').text(data.facility_phone);
      jQuery('#fac_comm').text(data.facility_phone_comment);
      jQuery('#lod_city').text(data.facility_city);
      jQuery('#lod_state').text(data.facility_state);
      jQuery('#lod_phone').text(data.lodging_phone);
      jQuery('#lod_comm').text(data.lodging_phone_comment);
      jQuery("#lodging_indicator, #facility_indicator").hide();
    }
  });
  jQuery('#pass_name').text(jQuery.trim(jQuery(text).val()));
  jQuery('#pass_name1').text(jQuery.trim(jQuery(text).val()));
  jQuery('#comps').show();
  jQuery('#companion_holder').hide();
  jQuery('#addcompanionbutton').show();
  jQuery('#addFacilityAndLodging').show();
  
}

function setSelectionId(text, li)
{
  //console.log("masum: " + text);
  var id = li.id.split('_');
  jQuery('#'+id[0]+'_id').val(id[1]);
}

function setSelectionFac(text, li){
  jQuery.ajax({
    url: '<?php echo url_for('passenger/getFacilityContent')?>',
    data: {id: passComponent.id, facility: text.value },
    dataType: 'json',
    cache : false,
    beforeSend: function(){
      jQuery("#facility_indicator").show();
    },
    success: function(data){
      jQuery('#fac_city').text('');
      jQuery('#fac_state').text('');
      jQuery('#fac_phone').text('');
      jQuery('#fac_comm').text('');
      jQuery('#fac_city').text(data.facility_city);
      jQuery('#fac_state').text(data.facility_state);
      jQuery('#fac_phone').text(data.facility_phone);
      jQuery('#fac_comm').text(data.facility_phone_comment);
      jQuery("#facility_indicator").hide();
    }
  });
}

function setSelectionLod(text, li){
  jQuery.ajax({
    url: '<?php echo url_for('passenger/getLodgingContent')?>',
    data: {id: passComponent.id, lod: text.value },
    dataType: 'json',
    cache : false,
    beforeSend: function(){
      jQuery("#lodging_indicator").show();
    },
    success: function(data){
      jQuery('#lod_city').text('');
      jQuery('#lod_state').text('');
      jQuery('#lod_phone').text('');
      jQuery('#lod_comm').text('');
      jQuery('#lod_city').text(data.facility_city);
      jQuery('#lod_state').text(data.facility_state);
      jQuery('#lod_phone').text(data.lod_phone);
      jQuery('#lod_comm').text(data.lod_phone_comment);
      jQuery("#lodging_indicator").hide();
    }
  });
}

function passAddCompanies(element)
{
  jQuery.ajax({
    url : '<?php echo url_for('companion/passengercompanions')?>',
    beforeSend: function(){ 
      jQuery('#companion_holder').css({ opacity: 0.3})
    },
    data : { id : passComponent.id, time: (new Date()).getTime() },
    success : function(data){
      jQuery(element).hide();
      jQuery('#companion_holder').html(data).css({ opacity: 1})
      jQuery('#companion_holder').show();
    }
  })
 }
<?php echo jq_end_javascript_tag()?>

<div class="passenger-form">
<div class="person-view">
<h2><?php echo $title ?></h2>
  <form action="<?php echo url_for('@itinerary_create') ?>" method="post" id="itine_form">
      <a href="#addpassenger-popup" id="add_new_passenger" class="open-popup"></a>
      <a href="#addrequester-popup" id="add_new_requester" class="open-popup"></a>
      <a href="#addcompanion-popup" id="add_new_companion" class="open-popup"></a>
      <a href="#addfacandlod-popup" id="add_new_facandlod" class="open-popup"></a>
      <a href="#addpersonandpassanger-popup" id="add_new_person_passenger" class="level_2_open_popup"></a>
      <a href="#add_requester_agency_popup" id="add_new_requester_agency" class="level_2_open_popup"></a>
      <a href="#addpersonandpassanger-popup" id="add_new_person_on_requester" class="level_2_open_popup"></a>
    <input type="hidden" name="id" value="<?php echo $itine->getId() ?>" />
    <?php if(isset($referer)):?><input type="hidden" name="referer" value="<?php echo $referer ?>" /><?php endif; ?>
    <?php if(isset($back)):?><input type="hidden" name="back" value="<?php echo $back ?>" /><?php endif; ?>
    
    <?php if(isset($current_pass_id)):?>
      <input type="hidden" id="current_pass_id" value="<?php echo $current_pass_id ?>"/>
    <?php endif; ?>
    <?php if(isset($current_facility)):?><input type="hidden" id="current_facility" value="<?php echo $current_facility ?>"/><?php endif; ?>
    <?php if(isset($current_lodging)):?><input type="hidden" id="current_lodging" value="<?php echo $current_lodging ?>" /><?php endif; ?>
      <br/>
    <?php
    $errors = $form->getErrorSchema()->getErrors();
    foreach ($errors as $name => $error)
    {
      echo $name .':'.$error ;
    }
    ?>
        <div class="box alt">
            <div class="wrap">
              <?php echo $form['date_requested']->renderLabel(); ?>
              <?php echo $form['date_requested']->render(); ?>
              <?php echo $form['date_requested']->renderError(); ?>
              <?php echo $form['_csrf_token'] ?>
            </div>
            <div class="wrap">
              <?php echo $form['mission_type_id']->renderLabel(); ?>
              <?php echo $form['mission_type_id']->render(); ?>
              <?php echo $form['mission_type_id']->renderError(); ?>
            </div>
            <div class="wrap">
              <div class="wrap">
                <label>Mission 1:</label>
              </div>
              <br/>
              <div class="wrap" style="margin-left: 12px; min-height: 141px;">
                <div class="wrap">
                  <label style="width:50px !important;">Start:</label>
                  <select id="missionSelect" onchange="selectChange();" name="missionSelect">
                    <option value="1" selected>Home</option>
                    <option value="2">Treatment</option>
                  </select>
                  <label style="width:50px !important; padding-left: 30px;">End:</label>
                  <select id="missionSelectLast" onchange="selectChangeTwo();">
                    <option value="1">Home</option>
                    <option value="2" selected>Treatment</option>
                  </select>
                </div>
                <br/>
                <div class="wrap">
                  <?php echo $missionform1['mission_date']->renderLabel();?>
                  <?php //$missionform1->getWidget('mission_date')->addOption('id', 'sshaa');
                  // $missionform1['mission_date']->setOption('id', 'lalala');?>
                  <?php echo $missionform1['mission_date']->render(array('id' => 'mis1', 'name'=>'mis1'));?>
                  <!--<input id="travelDate" type="text" name="travelDate" value=""/>-->
                </div>
                <br/>
                <div id="appointshow" style="display: block">
                  <div class="wrap">
                    <?php echo $missionform1['appt_date']->renderLabel();?>
                    <?php echo $missionform1['appt_date']->render(array('id' => 'appdate1', 'name'=>'appdate1'));?>
                  </div>
                  <br/>
                  <?php echo $form['apoint_time']->renderLabel(); ?>
                  <?php echo $form['apoint_time']->render(); ?>
                  <div id="times" style="display: none">
                  <select id="hour" name="hour" style="margin-left: 0px; width: 45px" class="text">
                    <option>---</option>
                    <?php for($i=0;$i<13;$i++){?>
                      <option <?php if(isset($hour) && ($hour == $i)) echo 'selected'?> value="<?php if($i<10){echo '0';}echo $i?>"><?php if($i<10){echo '0';}echo $i?></option>
                    <?php }?>
                  </select>
                  <select id="minut" name="minut" style="margin-left: 0px; width: 45px" class="text">
                    <option>---</option>
                    <?php for($i=0;$i<60;$i++){?>
                    <option <?php if(isset($minut) && ($minut == $i)) echo 'selected'?> value="<?php if($i<10){echo '0';}echo $i?>"><?php if($i<10){echo '0';}echo $i?></option>
                    <?php }?>
                  </select>
                  <?php echo $form['timetype']->render(); ?>
                   </div>
                  <?php echo $form['apoint_time']->renderError(); ?>
                </div>
                <br/>
                
              </div>
              <br/>
              <input type="hidden" id="yes_no" name="yes_no" value="0"/>
              <div class="wrap" style="min-height: 120px;">
                <label>Mission 2:</label>
                <div class="wrap">
                  <label><input type="checkbox" value="1" name="save_template" id="save_template" onclick="toggle1(this);"/>yes</label>
                  <br clear="all"/>
                </div>
                  <br clear="all"/>
                  <div id="newTemplate" style="display:none;">
                    <div class="wrap" style="margin-left: 12px;">
                      <div class="wrap">
                        <label style="width:50px !important;">Start:</label>
                        <select id="missionTwoSelect" disabled>
                          <option value="1">Home</option>
                          <option value="2" selected>Treatment</option>
                        </select>
                        <label style="width:50px !important; padding-left: 30px;">End:</label>
                        <select id="missionTwoSelectLast" disabled>
                          <option value="1" selected>Home</option>
                          <option value="2">Treatment</option>
                        </select>
                      </div>
                      <br/>
                      <div class="wrap">
                        <?php echo $missionform2['mission_date']->renderLabel();?>
                        <?php echo $missionform2['mission_date']->render(array('id' => 'mis2', 'name'=>'mis2'));?>
                      </div>
                    </div>
                  </div>
                  <?php if($mis2bn):?>
                  <script type="text/javascript">
                    //jQuery('#save_template').attr(checked);
                    jQuery('#newTemplate').show();
                  </script>
                  <?php endif?>
              </div>
            </div>
        </div>
      <div class="box">
          <div class="preferences" style="width:360px;">
          <div class="frame">
            <div class="bg">
              <div class="holder">
                 <div class="wrap">
                 <label>Passenger</label>
                  <?php
                  echo input_auto_complete_tag(
                    'passenger_a',
                    $passenger_a == '*' ? '' : $passenger_a,
                    'passenger/autoComplete1',
                    array('autocomplete' => 'off', 'class'=>'text','style'=>'width:150px; left:13px'),
                    array(
                      'use_style'    => true,
                      'indicator'    =>'airport_indicator',
                      'after_update_element' => 'setSelectionIdNew'
                    ));
                  ?>
                 <?php if(isset($need_pass)):?>
                    <ul class="error_list"><li>Please choice Passenger!</li></ul>
                 <?php endif;?>
                  <?php echo input_hidden_tag('passenger_id', $sf_params->has('passenger_id') ? $sf_params->get('passenger_id') : $itine->getPassengerId())?>
                  <span id="airport_indicator" style="display:none"><?php echo image_tag('/images/loading.gif')?></span>
                  <?php if ($sf_user->hasCredential(array('Administrator','Staff','Coordinator'), false)):?><a href="#" onclick="jQuery('#add_new_passenger').click();return false;">add new</a><?php endif;?>
                </div>
              </div>
              <div class="holder">
              <div class="wrap">
                  <label for="form-item-2">Baggage Weight:</label>
                  <input id="b_weight" class="text" style="width: 30px;" type="text" value="<?php echo $b_weight;?>" name="b_weight"/>
                  &nbsp;&nbsp;&nbsp;&nbsp;
                  <?php
                  $lb = null;
                  $kg = null;
                  if($b_type=='LB'){
                    $lb = "LB";
                  }else{
                    $kg = "KG";
                  }
                  ?>
                  <select class="text" style="width: 50px" id="b_type" name="b_type">
                    <option value="LB" <?php if($lb)echo 'selected'?>>LB</option>
                    <option value="KG" <?php if($kg)echo 'selected'?>>KG</option>
                  </select>
                  <?php //echo $form['b_weight']->renderLabel();?>
                  <?php //echo $form['b_weight']->render();?>
                  <?php //echo $form['b_type']->render();?>
                </div>
                <div class="wrap">
                  <label for="form-item-2">Baggage Description:</label>
                  <input id="b_desc" class="text" type="text" value="<?php echo $b_desc;?>" name="b_desc"/>
                </div>
              </div>              
              <div class="wrap" style="margin-left: 12px; display:none;" id="comps" >
              <?php if($passenger_a) {?>
                <p>Previous Companions for <span id="pass_name" style="font-weight: bold"><?php echo $passenger_a ? $passenger_a : ""?></span></p>
                <a href="#" class="btn-action" style="<?php if (isset($selected_companions)) echo 'display:none;'?>" onclick="passAddCompanies(this); return false;" id="addcompanionbutton"><span>Add Companions</span><strong>&nbsp;</strong></a>
                <?php if($companions)?>
                <?php if (count($companions) == 0):?>
                  <div id="companion_holder" style="<?php if (!isset($selected_companions)) echo 'display:none;'?>">
                  </div>                
                <?php else:?>
                    <?php if ($sf_user->hasCredential(array('Administrator','Staff','Coordinator'), false)):?>
                      <table class="companion-table" id="companions">
                        <thead style="<?php if (count($companions) == 0) echo 'display:none;'?>">
                          <tr>
                            <td class="cell-1">Companion</td>
                            <td>Relationship</td>
                          </tr>
                        </thead>
                        <tbody id="companion-table-companions-tbody">
                          <?php foreach ($companions as $companion)
                            {?>
                            <tr>
                              <td class="cell-1">
                                <input type=checkbox name="companions[]" id="companion_<?php echo $companion->getId()?>" value="<?php echo $companion->getId()?>" <?php if (isset($selected_companions) && in_array($companion->getId(), $selected_companions)) echo 'checked'?>/>
                                <label for="companion_<?php echo $companion->getId()?>"><?php echo $companion->getName()?></label>
                              </td>
                              <td class="cell-2"><?php echo $companion->getRelationship()?></td>
                            </tr>
                        <?php }?>
                        </tbody>
                      </table>
                    <?php endif?>
                <?php endif?>                
                <?php if ($sf_user->hasCredential(array('Administrator','Staff','Coordinator'), false)) {?>
                  <a style="padding-left:20px;" href="#" onclick="jQuery('#add_new_companion').click();return false;">add new</a>
                <?php } ?>
              <?php }?>
              </div>
              <!--<div class="wrap">
                   <br clear="all"/>
                  <a href="#" class="btn-action" style="margin-left: 10px;" onclick="jQuery('#add_new_companion').click();return false;"><span>Add New Companion</span><strong>&nbsp;</strong></a>
              </div>-->
            </div>
          </div>
          </div>
             <div class="wrap">
              <label>Requester *</label>
              <?php echo input_auto_complete_tag(
                'requester_a',
                $requester_a == '*' ? '' : $requester_a,
                'requester/autoComplete1',
                array('autocomplete' => 'off', 'class'=>'text','style'=>'width:150px; left:13px'),
                array(
                  'use_style'    => true,
                  'indicator'    =>'req_indicator',
                  'after_update_element' => 'setSelectionId'
                )
              ); ?>
              <?php if(isset($need_requester_id)):?>
                  <ul class="error_list">
                      <li>Please give a requester name</li>
                  </ul>
              <?php endif;?>
              <?php echo input_hidden_tag('requester_id', $sf_params->has('requester_id') ? $sf_params->get('requester_id') : $itine->getRequesterId())?>
              <span id="req_indicator" style="display:none"><?php echo image_tag('/images/loading.gif')?></span>
              <?php if ($sf_user->hasCredential(array('Administrator','Staff','Coordinator'), false)):?>
                  <a href="#" onclick="jQuery('#add_new_requester').click();return false;">add new</a>
              <?php endif;?>
              <?php if(isset($need_req)):?><label style="color:red;width:150px;">Please choice Requester!</label><?php endif;?>
            </div>
             <div class="wrap">
             <label>Facility</label>
             <?php echo input_auto_complete_tag('facility', $current_facility == '*' ? '' : $current_facility,
                                      'itinerary/autoCompleteFacility',
                                      array('autocomplete' => 'off', 'class'=>'text narrow','style'=>'width:150px;'),
                                      array(
                                      'use_style'    => true,
                                      'indicator'    =>'facility_indicator',
                                      'with'         => "value+'&passId='+passComponent.id",
                                      'after_update_element' => 'setSelectionFac'
                                      )
                                       ); ?>
                                        <span id="facility_indicator" style="display:none"><?php echo image_tag('/images/loading.gif')?></span>
                                        
             <!--<input type="text" name="facility" id="facility" class="text narrow" value="<?php //echo $current_facility?>"/>-->
             <?php
//             echo input_auto_complete_tag('facility', $facility == '*' ? '' : $facility,
//             'passenger/autoCompleteFacility',
//             array('autocomplete' => 'off', 'class'=>'text','style'=>'200px'),
//             array(
//             'use_style'    => true,
//             'indicator'    =>'facility_indicator',
//              )); ?>
              <!--  <span id="facility_indicator" style="display:none"><?php //echo image_tag('/images/loading.gif')?></span>
                 <?php //if(isset($need_facility)):?><label style="color:red;width:150px;">Please choice Facility!</label><?php //endif;?>-->
                 <br clear="all"/>
                 <div style="margin-left: 90px; display: none" id="fac_dest">
                   <b>City/State: </b><span id="fac_city"></span>/<span id="fac_state"></span><br clear="all"/>
                   <b>Phone: </b><span id="fac_phone"></span><br clear="all"/>
                   <b>Comment: </b><span id="fac_comm"></span><br clear="all"/>
                 </div>
            </div>
             <div class="wrap">
             <label>Lodging</label>
             <!--<input type="text" name="lodging" id="lodging" class="text narrow" value="<?php //echo $current_lodging?>"/>-->
             <?php echo input_auto_complete_tag('lodging', $current_lodging == '*' ? '' : $current_lodging,
                                      'itinerary/autoCompleteLodging',
                                      array('autocomplete' => 'off', 'class'=>'text narrow','style'=>'width:150px;'),
                                      array(
                                      'use_style'    => true,
                                      'indicator'    =>'lodging_indicator',
                                      'with'         => "value+'&passId='+passComponent.id",
                                      'after_update_element' => 'setSelectionLod'
                                      )
                                       ); ?>
                                       <span id="lodging_indicator" style="display:none"><?php echo image_tag('/images/loading.gif')?></span>
             <!--<img src="/images/loading.gif" style="display:none;" id="lodging_indicator">-->
              <?php
//              echo input_auto_complete_tag('lodging', $lodging == '*' ? '' : $lodging,
//              'passenger/autoCompleteLodging',
//              array('autocomplete' => 'off', 'class'=>'text','style'=>'200px'),
//              array(
//              'use_style'    => true,
//              'indicator'    =>'lodging_indicator',
//              )); ?>
               <!-- <span id="lodging_indicator" style="display:none"><?php //echo image_tag('/images/loading.gif')?></span>
                <?php //if(isset($need_lodging)):?><label style="color:red;width:150px;">Please choice Lodging!</label><?php //endif;?> -->
                <br clear="all"/>
                 <div style="margin-left: 90px; display: none" id="lod_dest">
                   <b>City/State: </b><span id="lod_city"></span>/<span id="lod_state"></span><br clear="all"/>
                   <b>Phone: </b><span id="lod_phone"></span><br clear="all"/>
                   <b>Comment: </b><span id="lod_comm"></span><br clear="all"/>
                 </div>
            </div>
            <div class="wrap">
              <a href="#" id="addFacilityAndLodging" style="display: none" onclick="jQuery('#add_new_facandlod').click();return false;">add new Facility and Lodging</a>
            </div>
        <?php if(isset($current_pass_id)):?>
        <input type="hidden" id="current_pass_id" value="<?php echo $current_pass_id ?>"/>
        <script type="text/javascript">
            passComponent.id = <?php echo $current_pass_id;?>;
            jQuery('#fac_dest').show();
            jQuery('#lod_dest').show();
            jQuery('#fac_city').text("<?php echo $current_facility_city;?>");
            jQuery('#fac_state').text("<?php echo $current_facility_state;?>");
            jQuery('#fac_phone').text("<?php echo $current_facility_phone;?>");
            jQuery('#fac_comm').text("<?php echo $current_facility_phone_comment;?>");
            jQuery('#lod_city').text("<?php echo $current_lodging_city;?>");
            jQuery('#lod_state').text("<?php echo $current_lodging_state;?>");
            jQuery('#lod_phone').text("<?php echo $current_lodging_phone;?>");
            jQuery('#lod_comm').text("<?php echo $current_lodging_phone_comment;?>");
        </script>
      <?php endif?>
      </div>
      <div class="box full">
            <!--<div class="wrap">
              <?php //echo $form['waiver_need']->renderLabel(); ?>
              <?php //echo $form['waiver_need']->render(); ?>
              <?php //echo $form['waiver_need']->renderError(); ?>
            </div>
             <div class="wrap">
              <?php //echo $form['need_medical_release']->renderLabel(); ?>
              <?php //echo $form['need_medical_release']->render(); ?>
              <?php //echo $form['need_medical_release']->renderError(); ?>
            </div>-->
            <div class="wrap">
              <?php echo $form['comment']->renderLabel(); ?>
              <?php echo $form['comment']->render(); ?>
              <?php echo $form['comment']->renderError(); ?>
            </div>
            <input type="hidden" value="<?php echo $referer?>" id="back" name="back"/>
            <input type="hidden" id="facility_pass_id" name="facility_pass_id"/>
            <input type="hidden" id="lodging_pass_id" name="lodging_pass_id"/>
            <div class="form-submit">
                  <a href="#" onclick="jQuery('#itine_form').submit(); return false;" class="btn-action"><span>Save</span><strong>&nbsp;</strong></a>
                  <a href="<?php echo url_for($referer) ?>" class="cancel">Cancel</a>
          </div>
        </div>
  </form>
</div>
</div>

<?php slot('popup') ?>
<!-- Start Companion -->
 <div class="add-passenger" id="addcompanion-popup" style="display: none; z-index: 1001; position: absolute; left: 400px; top: 145px; ">
    <div class="holder">
        <div class="bg">
            <h2>Add New Companion</h2>
            <div class="passenger-form">
            <div class="person-view">
                
            <!-- form action="<?php echo url_for('itinerary/updateAjaxCompanion?itId='.$itine->getId()) ?>" id="new_companion_form" method="post" -->
                <?php
                echo jq_form_remote_tag(array(
                'update'  => 'addcompanion-popup',
                'url'     => 'itinerary/updateAjaxCompanion?itId='.$itine->getId().'&time=' . urlencode(date('d-m-y-h-i-s')),
                'loading'  => "jQuery('#loading-lightbox-overlay-image').center();Element.show('loading-lightbox-overlay');",
                'complete' => "Element.hide('loading-lightbox-overlay');",
                'method'  => 'post',
                ), array(
                'id'    => 'form_passenger_companion',
                'style' => 'display:block;'
                ));
                        ?>
              <?php echo $form_a->renderHiddenFields()?>
              <?php echo $form_a->renderGlobalErrors()?>
              <div class="box">
                <div class="wrap">
                        <?php echo $form_a['name']->renderLabel(); ?>
                        <?php echo $form_a['name']->render(); ?>
                        <?php echo $form_a['name']->renderError(); ?>
                </div>
                 <div class="wrap">
                        <?php echo $form_a['relationship']->renderLabel(); ?>
                        <?php echo $form_a['relationship']->render(); ?>
                        <?php echo $form_a['relationship']->renderError(); ?>
                </div>
                 <div class="wrap">
                        <?php echo $form_a['date_of_birth']->renderLabel(); ?>
                        <?php echo $form_a['date_of_birth']->render(); ?>
                        <?php echo $form_a['date_of_birth']->renderError(); ?>
                </div>
                 <div class="wrap">
                        <?php echo $form_a['weight']->renderLabel(); ?>
                        <?php echo $form_a['weight']->render(); ?>
                        <?php echo $form_a['weight']->renderError(); ?>
                </div>
                 <div class="wrap">
                        <?php echo $form_a['companion_phone']->renderLabel(); ?>
                        <?php echo $form_a['companion_phone']->render(); ?>
                        <?php echo $form_a['companion_phone']->renderError(); ?>
                </div>
                 <div class="wrap">
                        <?php echo $form_a['companion_phone_comment']->renderLabel(); ?>
                        <?php echo $form_a['companion_phone_comment']->render(); ?>
                        <?php echo $form_a['companion_phone_comment']->renderError(); ?>
                </div>
                <input type="hidden" name="itId" value="<?php if(isset($itine)) echo $itine->getId()?>" />
                <div class="form-submit">
                  <input type="submit" class="hide" id="comp_form_submit"/>
                  <a href="#" onclick="jQuery('#comp_form_submit').click(); return false;" class="btn-action"><span>Save</span><strong>&nbsp;</strong></a>
                  <a href="#" onclick="jQuery('#lightbox-overlay').click();" class="cancel">Cancel</a>
                </div>
              </div>
            </form>
          </div>
        </div>
        </div>
    </div>
 </div>
 <!-- End Companion -->

   <div class="add-passenger" id="addpassenger-popup" style="display: none; z-index: 1001; position: absolute; left: 400px; top: 145px; ">
     <div class="holder">
        <div class="bg">
          <div id="passenger_form">
              <h3>Add New Passenger</h3>
             <div class="steps-area">
              <div class="step-list">
              <ul>
                    <li class="" style="display:list-item;" id="s1">
                    <a href="javascript:void(0)" class="first"><strong>Step 1</strong><span class="right-c"></span></a>
                    </li>
                    <li class="" style="display:list-item;" id="s2">
                    <a href="javascript:void(0)" class="second" >Step 2</a>
                    </li>
                    <li class="" style="display:list-item;" id="s3">
                    <a href="javascript:void(0)" class="third" >Step 3</a>
                    </li>
                    <li class="" style="display:list-item;" id="s4">
                    <a href="javascript:void(0)" class="forth" >Step 4</a>
                    </li>
                    <li class="" style="display:list-item;" id="s5">
                    <a href="javascript:void(0)" class="fifth">Step 5</a>
                    </li>
              </ul>
              </div>
              <?php jq_javascript_tag();?>
                jQuery(window).load(function () {
              <?php
              $has = 0;
              if(strstr($sf_context->getActionName(),'step3')){
                $has = 1;
              }
              ?>
              var is_step3 = <?php echo $has?>;
              if(is_step3 == 1){
                     jQuery('.fifth').click();
              }
              });
              <?php jq_end_javascript_tag();?>
              <div class="steps-holder">
                <div class="step" style="display:none;" id="step1">
                      <div class="passenger-form">
                        <?php
                        echo jq_form_remote_tag(array(
                        'update'  => 'passenger_form',
                        'url'     => 'passenger/update1Ajax',
                        'method'  => 'post',
                        'loading'  => "jQuery('#loading-lightbox-overlay-image').center();Element.show('loading-lightbox-overlay');",
                        'complete' => "Element.hide('loading-lightbox-overlay');"
                        ), array(
                        'id'    => 'form_passenger',
                        'style' => 'display:block;'
                        ));
                        ?>
                          <input type="hidden" name="id" value="<?php echo $passenger->getId() ?>" />
                          <input type="hidden" name="referer" value="<?php echo $referer ?>" />
                          <input type="hidden" id="back" name="back" value="<?php echo $back?>"/>
                          <?php if(isset($f_back)): ?><input type="hidden" name="f_back" value="<?php echo $f_back ?>" /><?php endif;?>
                              <fieldset>
                                <div class="box">
                                    <div class="wrap">
                                      <label>Person</label>
                                      <!--Farazi-->
                                      <?php echo input_auto_complete_tag('person_a', $person_a == '*' ? '' : $person_a,
                                      'person/autoNotPassenger',
                                      array('autocomplete' => 'off', 'class'=>'text narrow','style'=>'left:-395px;top:-165px;width:200px'),
                                      array(
                                      'use_style'    => true,
                                      'indicator'    =>'person_indicator',
                                      'after_update_element' => 'setSelectionId'
                                      )
                                       ); ?>                                       
                                      <input type="hidden" id="personpass_id" name="personpass_id" value=""/>
                                      <?php //echo input_hidden_tag('personpass_id')?>
                                      <span id="person_indicator" style="display:none"><?php echo image_tag('/images/loading.gif')?></span>
                                      <?php echo isset($form1['_csrf_token']) ? $form1['_csrf_token']:"" ?>
                                         <?php if(isset($person_need)):?>
                                       <label style="color:red;">Required!</label>
                                        <?php endif;?>
                                    </div>
                                      <?php if ($sf_user->hasCredential(array('Administrator','Staff','Coordinator'), false)):?>
                                            <!-- a href="<?php echo url_for('person/update?add_pass_iti='.'yes') ?>" id="add_per_pass" name="add_per_pass">Add Person and Passenger</a -->
                                            <a onclick="jQuery('#add_new_person_passenger').click();jQuery('#action_from_passenger_or_requester').val('from_passenger');return false;" href="javascript:void(0)" id="add_per_pass" name="add_per_pass">Add Person and Passenger</a>
                                      <?php endif;?>
                                   <div class="wrap">
                                      <?php echo $form1['passenger_type_id']->renderLabel(); ?>
                                      <?php echo $form1['passenger_type_id']->render(); ?>
                                      <?php echo $form1['passenger_type_id']->renderError(); ?>

                                    </div>
                                    <div class="wrap">
                                      <?php echo $form1['parent']->renderLabel(); ?>
                                      <?php echo $form1['parent']->render(); ?>
                                      <?php echo $form1['parent']->renderError(); ?>
                                    </div>
                                    <div class="wrap">
                                      <?php echo $form1['date_of_birth']->renderLabel(); ?>
                                      <?php echo $form1['date_of_birth']->render(); ?>
                                      <?php echo $form1['date_of_birth']->renderError(); ?>
                                    </div>
                                     <div class="wrap">
                                      <?php echo $form1['weight']->renderLabel(); ?>
                                      <?php echo $form1['weight']->render(); ?>
                                      <?php echo $form1['weight']->renderError(); ?>
                                    </div>
                                     <div class="wrap">
                                      <?php echo $form1['language_spoken']->renderLabel(); ?>
                                      <?php echo $form1['language_spoken']->render(); ?>
                                      <?php echo $form1['language_spoken']->renderError(); ?>
                                    </div>
                               </div>
                               <div class="box alt">
                                    <div class="wrap">
                                      <?php echo $form1['passenger_illness_category_id']->renderLabel(); ?>
                                      <?php echo $form1['passenger_illness_category_id']->render(); ?>
                                      <?php echo $form1['passenger_illness_category_id']->renderError(); ?>
                                    </div>
                                    <div class="wrap">
                                      <?php echo $form1['illness']->renderLabel(); ?>
                                      <?php echo $form1['illness']->render(); ?>
                                      <?php echo $form1['illness']->renderError(); ?>
                                    </div>
                                     <div class="wrap">
                                      <?php echo $form1['best_contact_method']->renderLabel(); ?>
                                      <?php echo $form1['best_contact_method']->render(); ?>
                                      <?php echo $form1['best_contact_method']->renderError(); ?>
                                    </div>
                                    <div class="form-submit">
                                       <a href="#" onclick="jQuery('#pass1_form_submit').click(); return false;" class="btn-action"><span>Save and Continue >></span><strong>&nbsp;</strong></a>
                                       <a href="/person" class="cancel">Cancel</a>
                                      <input type="submit" class="hide" id="pass1_form_submit" />
                                      </div>
                                      </div>
                                      </fieldset>
                                      </form>
                    </div>
                 </div>
                 <div class="step" style="display:none;" id="step2">
                 <div class="passenger-form">
                 <?php
                 echo jq_form_remote_tag(array(
                 'update'  => 'passenger_form',
                 'url'     => 'passenger/update2Ajax',
                 'loading'  => "jQuery('#loading-lightbox-overlay-image').center();Element.show('loading-lightbox-overlay');",
                 'complete' => "Element.hide('loading-lightbox-overlay');",
                 'method'  => 'post',
                 ), array(
                 'id'    => 'form_passenger1',
                 'style' => 'display:block;'
                 ));
                        ?>
                        <input type="hidden" name="id" value="<?php echo $passenger->getId() ?>" />
                          <input type="hidden" name="back" value="<?php echo $back ?>" />
                                                <input type="hidden" name="referer" value="<?php echo $referer ?>" />
                                                <?php if(isset($f_back)): ?><input type="hidden" name="f_back" value="<?php echo $f_back ?>" /><?php endif;?>
                            <fieldset>
                              <div class="box">
                                      <div class="wrap">
                                            <?php echo $form2['public_considerations']->renderLabel(); ?>
                                            <?php echo $form2['public_considerations']->render(); ?>
                                            <?php echo $form2['public_considerations']->renderError(); ?>
                                            <?php echo $form2['_csrf_token'] ?>
                                      </div>
                                       <div class="wrap">
                                            <?php echo $form2['private_considerations']->renderLabel(); ?>
                                            <?php echo $form2['private_considerations']->render(); ?>
                                            <?php echo $form2['private_considerations']->renderError(); ?>
                                     </div>
                              </div>
                             <div class="box alt">
                                       <div class="wrap">
                                            <?php echo $form2['ground_transportation_comment']->renderLabel(); ?>
                                            <?php echo $form2['ground_transportation_comment']->render(); ?>
                                            <?php echo $form2['ground_transportation_comment']->renderError(); ?>
                                      </div>
                                       <div class="wrap">
                                            <?php echo $form2['travel_history_notes']->renderLabel(); ?>
                                            <?php echo $form2['travel_history_notes']->render(); ?>
                                            <?php echo $form2['travel_history_notes']->renderError(); ?>
                                      </div>
                                      <br/>
                                  </div>
                                  <div class="box alt">
                                              <div class="form-submit2">
                                              <br/>
                                              <br/>
                                              <br/>
                                              <br/>
                                             <a href="#" onclick="jQuery('#pass2_form_submit').click(); return false;" class="btn-action"><span>Save and Continue >></span><strong>&nbsp;</strong></a>
                                             <input type="submit" class="hide" id="pass2_form_submit"/>
                                             <a href="<?php echo url_for($referer) ?>" class="cancel">Cancel</a>
                                        </div>
                                  </div>
                            </fieldset>
                            <br/>
                      </form>
                    </div>
               </div>
               <div class="step" style="display:none;" id="step3">
                    <div class="passenger-form">
                     <?php
                     echo jq_form_remote_tag(array(
                     'update'  => 'passenger_form',
                     'url'     => 'passenger/update3Ajax',
                     'loading'  => "jQuery('#loading-lightbox-overlay-image').center();Element.show('loading-lightbox-overlay');",
                     'complete' => "Element.hide('loading-lightbox-overlay');",
                     'method'  => 'post',
                     ), array(
                     'id'    => 'form_passenger1',
                     'style' => 'display:block;'
                     ));
                        ?>
                           <input type="hidden" name="id" value="<?php echo $passenger->getId() ?>" />
                          <input type="hidden" name="back" value="<?php echo $back ?>" />
                          <input type="hidden" name="referer" value="<?php echo $referer ?>" />
                          <?php if(isset($f_back)): ?><input type="hidden" name="f_back" value="<?php echo $f_back ?>" /><?php endif;?>
                              <fieldset>
                              <div class="box">
                                <div class="innerbox">
                                          <h3 align="center">Releasing Physician</h3>
                                          <div class="wrap">
                                            <?php echo $form3['releasing_physician']->renderLabel(); ?>
                                            <?php echo $form3['releasing_physician']->render(); ?>
                                            <?php echo $form3['releasing_physician']->renderError(); ?>
                                            <?php echo $form3['_csrf_token'] ?>
                                          </div>
                                          <div class="wrap">
                                            <?php echo $form3['releasing_phone']->renderLabel(); ?>
                                            <?php echo $form3['releasing_phone']->render(); ?>
                                            <?php echo $form3['releasing_phone']->renderError(); ?>
                                          </div>
                                          <div class="wrap">
                                            <?php echo $form3['releasing_fax1']->renderLabel(); ?>
                                            <?php echo $form3['releasing_fax1']->render(); ?>
                                            <?php echo $form3['releasing_fax1']->renderError(); ?>
                                          </div>
                                          <div class="wrap">
                                                <?php echo $form3['releasing_fax1_comment']->renderLabel(); ?>
                                                <?php echo $form3['releasing_fax1_comment']->render(); ?>
                                                <?php echo $form3['releasing_fax1_comment']->renderError(); ?>
                                          </div>
                                          <div class="wrap">
                                                <?php echo $form3['releasing_email']->renderLabel(); ?>
                                                <?php echo $form3['releasing_email']->render(); ?>
                                                <?php echo $form3['releasing_email']->renderError(); ?>
                                          </div>
                                          <div class="wrap">
                                                <?php echo $form3['need_medical_release']->renderLabel(); ?>
                                                <?php echo $form3['need_medical_release']->render(); ?>
                                                <?php echo $form3['need_medical_release']->renderError(); ?>
                                          </div>
                                          <div class="wrap">
                                                <?php echo $form3['medical_release_requested']->renderLabel(); ?>
                                                <?php echo $form3['medical_release_requested']->render(); ?>
                                                <?php echo $form3['medical_release_requested']->renderError(); ?>
                                          </div>
                                          <div class="wrap">
                                                <?php echo $form3['medical_release_received']->renderLabel(); ?>
                                                <?php echo $form3['medical_release_received']->render(); ?>
                                                <?php echo $form3['medical_release_received']->renderError(); ?>
                                          </div>
                                      </div>
                                      </div>
                                      <div class="box alt">
                                      <div class="innerbox">
                                         <h3 align="center">Treating Physician</h3>
                                          <div class="wrap">
                                            <?php echo $form3['treating_physician']->renderLabel(); ?>
                                            <?php echo $form3['treating_physician']->render(); ?>
                                            <?php echo $form3['treating_physician']->renderError(); ?>
                                          </div>
                                          <div class="wrap">
                                                <?php echo $form3['treating_phone']->renderLabel(); ?>
                                                <?php echo $form3['treating_phone']->render(); ?>
                                                <?php echo $form3['treating_phone']->renderError(); ?>
                                          </div>
                                          <div class="wrap">
                                                <?php echo $form3['treating_fax1']->renderLabel(); ?>
                                                <?php echo $form3['treating_fax1']->render(); ?>
                                                <?php echo $form3['treating_fax1']->renderError(); ?>
                                          </div>
                                          <div class="wrap">
                                                <?php echo $form3['treating_fax1_comment']->renderLabel(); ?>
                                                <?php echo $form3['treating_fax1_comment']->render(); ?>
                                                <?php echo $form3['treating_fax1_comment']->renderError(); ?>
                                          </div>
                                          <div class="wrap">
                                                <?php echo $form3['treating_email']->renderLabel(); ?>
                                                <?php echo $form3['treating_email']->render(); ?>
                                                <?php echo $form3['treating_email']->renderError(); ?>
                                          </div>
                                        </div>
                                         <div class="form-submit2" align="right">
                                              <br/>
                                              <br/>
                                              <a href="#" onclick="jQuery('#pass3_form_submit').click(); return false;" class="btn-action"><span>Save and Continue >></span><strong>&nbsp;</strong></a>
                                             <input type="submit" class="hide" id="pass3_form_submit"/>
                                             <a href="<?php echo url_for($referer) ?>" class="cancel">Cancel</a>
                                        </div>
                                        </div>
                              </div>
                              </fieldset>
                           </form>
                        </div>
                    </div><!-- END FORM3 -->
                <div class="step" style="display:none;" id="step4">
                    <div class="passenger-form">
                     <?php
                     echo jq_form_remote_tag(array(
                     'update'  => 'passenger_form',
                     'url'     => 'passenger/update4Ajax',
                     'loading'  => "jQuery('#loading-lightbox-overlay-image').center();Element.show('loading-lightbox-overlay');",
                     'complete' => "Element.hide('loading-lightbox-overlay');",
                     'method'  => 'post',
                     ), array(
                     'id'    => 'form_passenger1',
                     'style' => 'display:block;'
                     ));
                        ?>
                          <input type="hidden" name="id" value="<?php echo $passenger->getId() ?>" />
                          <input type="hidden" name="back" value="<?php echo $back ?>" />
                          <input type="hidden" name="referer" value="<?php echo $referer ?>" />
                          <?php if(isset($f_back)): ?><input type="hidden" name="f_back" value="<?php echo $f_back ?>" /><?php endif;?>
                              <fieldset>
                              <div class="box">
                                    <div class="innerbox">
                                           <h3 align="center">Destination Lodging</h3>
                                            <div class="wrap">
                                                  <?php echo $form4['lodging_name']->renderLabel(); ?>
                                                  <?php echo $form4['lodging_name']->render(); ?>
                                                  <?php echo $form4['lodging_name']->renderError(); ?>
                                                  <?php echo $form4['_csrf_token'] ?>
                                            </div>
                                            <div class="wrap">
                                                    <?php echo $form4['lodging_phone']->renderLabel(); ?>
                                                    <?php echo $form4['lodging_phone']->render(); ?>
                                                    <?php echo $form4['lodging_phone']->renderError(); ?>
                                            </div>
                                            <div class="wrap">
                                                    <?php echo $form4['lodging_phone_comment']->renderLabel(); ?>
                                                    <?php echo $form4['lodging_phone_comment']->render(); ?>
                                                    <?php echo $form4['lodging_phone_comment']->renderError(); ?>
                                            </div>
                                    </div>
                              </div>
                               <div class="box alt">
                                 <div class="innerbox">
                                           <h3 align="center">Destination Facility</h3>
                                            <div class="wrap">
                                                  <?php echo $form4['facility_name']->renderLabel(); ?>
                                                  <?php echo $form4['facility_name']->render(); ?>
                                                  <?php echo $form4['facility_name']->renderError(); ?>
                                          </div>
                                          <div class="wrap">
                                                  <?php echo $form4['facility_phone']->renderLabel(); ?>
                                                  <?php echo $form4['facility_phone']->render(); ?>
                                                  <?php echo $form4['facility_phone']->renderError(); ?>
                                          </div>
                                          <div class="wrap">
                                                  <?php echo $form4['facility_phone_comment']->renderLabel(); ?>
                                                  <?php echo $form4['facility_phone_comment']->render(); ?>
                                                  <?php echo $form4['facility_phone_comment']->renderError(); ?>
                                          </div>
                                          </div>
                                         <div class="form-submit2" align="right">
                                              <br/>
                                              <br/>
                                              <a href="#" onclick="jQuery('#pass4_form_submit').click(); return false;" class="btn-action"><span>Save and Continue >></span><strong>&nbsp;</strong></a>
                                             <input type="submit" class="hide" id="pass4_form_submit"/>
                                             <a href="<?php echo url_for($referer) ?>" class="cancel">Cancel</a>
                                        </div>
                              </div>
                                <div class="box full">
                                <div class="wrap">
                                        <?php echo $form3['facility_city']->renderLabel(); ?>
                                        <?php echo $form3['facility_city']->render(); ?>
                                        <?php echo $form3['facility_city']->renderError(); ?>
                                </div>
                                <div class="wrap">
                                        <?php echo $form3['facility_state']->renderLabel(); ?>
                                        <?php echo $form3['facility_state']->render(); ?>
                                        <?php echo $form3['facility_state']->renderError(); ?>
                                </div>
                                </div>
                              </fieldset>
                           </form>
                        </div>
                    </div><!--                    END FORM4-->
     <div class="step" style="display:none;" id="step5">
                    <div class="passenger-form">
                     <?php
                     echo jq_form_remote_tag(array(
                     'update'  => 'passenger_form',
                     'url'     => 'passenger/update5Ajax',
                     'loading'  => "jQuery('#loading-lightbox-overlay-image').center();Element.show('loading-lightbox-overlay');",
                     'complete' => "Element.hide('loading-lightbox-overlay');",
                     'method'  => 'post',

                     ), array(
                     'id'    => 'form_passenger1',
                     'style' => 'display:block;'
                     ));
                        ?>
                          <input type="hidden" name="id" value="<?php echo $passenger->getId() ?>" />
                          <input type="hidden" name="back" value="<?php echo $back ?>" />
                          <input type="hidden" name="referer" value="<?php echo $referer ?>" />
                          <?php if(isset($f_back)): ?><input type="hidden" name="f_back" value="<?php echo $f_back ?>" /><?php endif;?>
                              <fieldset>
                              <div class="box">
                                        <div class="wrap">
                                         <label>Requester</label>
                                          <?php echo input_auto_complete_tag('requester_p', $requester_p == '*' ? '' : $requester_p,
                                          'requester/autoComplete',
                                          array('autocomplete' => 'off', 'class'=>'text narrow','style'=>'200px'),
                                          array(
                                          'use_style'    => true,
                                          'indicator'    =>'req_indicator',
                                          )
                                           ); ?>
                                            <span id="req_indicator" style="display:none"><?php echo image_tag('/images/loading.gif')?></span>
                                                  <?php echo $form5['_csrf_token'] ?>
                                            </div>
                                            <div class="wrap">
                                                    <?php echo $form5['emergency_contact_name']->renderLabel(); ?>
                                                    <?php echo $form5['emergency_contact_name']->render(); ?>
                                                    <?php echo $form5['emergency_contact_name']->renderError(); ?>
                                            </div>
                                            <div class="wrap">
                                                    <?php echo $form5['emergency_contact_primary_phone']->renderLabel(); ?>
                                                    <?php echo $form5['emergency_contact_primary_phone']->render(); ?>
                                                    <?php echo $form5['emergency_contact_primary_phone']->renderError(); ?>
                                            </div>
                                            <div class="wrap">
                                                  <?php echo $form5['emergency_contact_primary_comment']->renderLabel(); ?>
                                                  <?php echo $form5['emergency_contact_primary_comment']->render(); ?>
                                                  <?php echo $form5['emergency_contact_primary_comment']->renderError(); ?>
                                            </div>
                              </div>
                               <div class="box alt">
                                            <div class="wrap">
                                                 <br/>
                                            </div>
                                             <div class="wrap">
                                                 <br/>
                                            </div>
                                            <div class="wrap">
                                                    <?php echo $form5['emergency_contact_secondary_phone']->renderLabel(); ?>
                                                    <?php echo $form5['emergency_contact_secondary_phone']->render(); ?>
                                                    <?php echo $form5['emergency_contact_secondary_phone']->renderError(); ?>
                                            </div>
                                            <div class="wrap">
                                                    <?php echo $form5['emergency_contact_secondary_comment']->renderLabel(); ?>
                                                    <?php echo $form5['emergency_contact_secondary_comment']->render(); ?>
                                                    <?php echo $form5['emergency_contact_secondary_comment']->renderError(); ?>
                                            </div>
                                         <div class="form-submit2" align="right">
                                              <br/>
                                              <br/>
                                              <a href="#" onclick="jQuery('#pass5_form_submit').click(); return false;" class="btn-action"><span>Save and Continue >></span><strong>&nbsp;</strong></a>
                                             <input type="submit" class="hide" id="pass5_form_submit"/>
                                             <a class="cancel" href="javascript:void(0)" onclick="jQuery('#lightbox-overlay').click();">Cancel</a>
                                        </div>
                              </div>
                              </fieldset>
                           </form>
                        </div>
                    </div><!-- END FORM4-->
                </div>
             </div><!--Steps area-->
              </div><!--passenger form-->
              </form>
          </div><!--agency_form-->
      </div><!--bg-->
    </div><!--holder-->
 </div><!--addagency-popup-->
 <div class="add-passenger" id="addrequester-popup" style="display: none; z-index: 1001; position: absolute; left: 400px; top: 145px; ">
     <div class="holder">
        <div class="bg">
          <div id="requester_form">           
            <?php
            echo jq_form_remote_tag(array(
            'update'  => 'requester_form',
            'url'     => 'itinerary/updateAjax',
            'loading'  => "jQuery('#loading-lightbox-overlay-image').center();Element.show('loading-lightbox-overlay');",
            'complete' => "Element.hide('loading-lightbox-overlay');",
            'method'  => 'post',
            ), array(
            'id'    => 'form_requester',
            'style' => 'display:block;'
            ));
            ?>
              <h3>Add New Requester</h3>
              <div class="passenger-form">
              <div class="box">
                  <div class="wrap">
                      <label>Person</label>
                      <?php echo input_auto_complete_tag('person_a_req', $person_a_req == '*' ? '' : $person_a_req,
                      'person/autoNotRequester',
                      array('autocomplete' => 'off', 'class'=>'text narrow','style'=>'left:-400px;top:-165px;width:200px'),
                      array('use_style' => true, 'indicator' =>'req_person_indicator', 'after_update_element' => 'setSelectionId')
                       );
                      ?>
                      <a onclick="jQuery('#add_new_person_passenger').click();jQuery('#action_from_passenger_or_requester').val('from_requester');return false;" href="#" id="add_per_pass_req" name="add_per_pass_req">Add new person</a>
                      <?php echo input_hidden_tag('person_id')?>
                      <span id="req_person_indicator" style="display:none"><?php echo image_tag('/images/loading.gif')?></span>
                         <?php if(isset($person_needr)):?>
                      <label style="color:red;">Required!</label>
                      <?php endif;?>
                  </div>
                  <div class="wrap">
                      <label>Agency</label>
                       <?php echo input_auto_complete_tag('agency', $agency == '*' ? '' : $agency,
                       'agency/autoComplete',
                       array('autocomplete' => 'off', 'class'=>'text narrow','style'=>'left:-400px;top:-165px;width:200px'),
                       array(
                       'use_style'    => true,
                       'indicator'    =>'agency_indicator',
                       'after_update_element' => 'setSelectionId'
                       )
                       ); ?>
                      <a onclick="jQuery('#add_new_requester_agency').click();return false;" href="#" id="add_req_agency" name="add_req_agency">Add new agency</a>
                      <?php echo input_hidden_tag('agency_id')?>
                        <span id="agency_indicator" style="display:none"><?php echo image_tag('/images/loading.gif')?></span>
                      <?php echo $form_req['_csrf_token'] ?>
                         <?php if(isset($agency_need)):?>
                      <label style="color:red;">Required!</label>
                      <?php endif;?>
                  <?php echo $form_req['_csrf_token'] ?>
                  </div>
                  <div class="wrap">
                  <?php echo $form_req['title']->renderLabel(); ?>
                  <?php echo $form_req['title']->render(); ?>
                  <?php echo $form_req['title']->renderError(); ?>
                  </div>
                  <div class="wrap">
                  <?php echo $form_req['how_find_af']->renderLabel(); ?>
                  <?php echo $form_req['how_find_af']->render(); ?>
                  <?php echo $form_req['how_find_af']->renderError(); ?>
                  </div>
                  <div class="form-submit">
                        <a href="#" onclick="jQuery('#requester_form_submit').click(); return false;" class="btn-action"><span>Save</span><strong>&nbsp;</strong></a>
                        <input type="submit" class="hide" id="requester_form_submit"/>
						<a class="cancel" href="#" onclick="jQuery('#lightbox-overlay').click();">Cancel</a>
              </div>
              </div><!--box alt-->
              </div><!--passenger form-->
              </form>
          </div><!--agency_form-->
      </div><!--bg-->
    </div><!--holder-->
 </div><!--addagency-popup-->

 <div class="add-passenger" id="addfacandlod-popup" style="display: none; z-index: 1001; position: absolute; left: 400px; top: 145px; ">
     <div class="holder">
        <div class="bg">
          <div id="addfacandlod_form">
            <form method="post" action="<?php echo url_for('itinerary/updateFacLodAjax')?>" onsubmit="jQuery.ajax({type:'POST',dataType:'json',data:jQuery(this).serialize(),success:function(data, textStatus){
             if (data.html == true){
                jQuery('#addfacandlod_form').html(data.content);                
              } else {
                jQuery('#addfacandlod-popup').hide();
                jQuery('#lightbox-overlay').click();
                var haha = data.content;
                jQuery('#facility').val(haha.facility);
                jQuery('#lodging').val(haha.lodging);
                jQuery('#fac_city').text(haha.facility_city);
                jQuery('#fac_state').text(haha.facility_state);
                jQuery('#fac_phone').text(haha.facility_phone);
                jQuery('#fac_comm').text(haha.facility_phone_comment);
                jQuery('#lod_city').text(haha.facility_city);
                jQuery('#lod_state').text(haha.facility_state);
                jQuery('#lod_phone').text(haha.lodging_phone);
                jQuery('#lod_comm').text(haha.lodging_phone_comment);

              }
            },
            url:'/itinerary/updateFacLodAjax'}); return false;" style="display: block;" id="form_requester">
            <input type="hidden" name="faclodpassid" id="faclodpassid" value=""/>
              <h3>Add New Facility and Lodging for <span id="pass_name1" style="font-weight: bold"></span></h3>
              <div class="passenger-form">
                <div class="box">
                            <div class="innerbox">
                                       <h3 align="center">Destination Lodging</h3>
                                        <div class="wrap">
                                              <?php echo isset($form6['_csrf_token']) ? $form6['_csrf_token']:"" ?>
                                              <?php echo $form6['lodging']->renderLabel(); ?>
                                              <?php echo $form6['lodging']->render(); ?>
                                              <?php echo $form6['lodging']->renderError(); ?>
                                              <?php //echo $form3['_csrf_token'] ?>
                                        </div>
                                        <div class="wrap">
                                                <?php echo $form6['lod_phone']->renderLabel(); ?>
                                                <?php echo $form6['lod_phone']->render(); ?>
                                                <?php echo $form6['lod_phone']->renderError(); ?>
                                        </div>
                                        <div class="wrap">
                                                <?php echo $form6['lod_phone_comment']->renderLabel(); ?>
                                                <?php echo $form6['lod_phone_comment']->render(); ?>
                                                <?php echo $form6['lod_phone_comment']->renderError(); ?>
                                        </div>
                                  </div>
                          </div>
                          <div class="box alt">
                              <div class="innerbox">
                                       <h3 align="center">Destination Facility</h3>
                                        <div class="wrap">
                                              <?php echo $form6['facility']->renderLabel(); ?>
                                              <?php echo $form6['facility']->render(); ?>
                                              <?php echo $form6['facility']->renderError(); ?>
                                      </div>
                                      <div class="wrap">
                                              <?php echo $form6['fac_phone']->renderLabel(); ?>
                                              <?php echo $form6['fac_phone']->render(); ?>
                                              <?php echo $form6['fac_phone']->renderError(); ?>
                                      </div>
                                      <div class="wrap">
                                              <?php echo $form6['facility_phone_comment']->renderLabel(); ?>
                                              <?php echo $form6['facility_phone_comment']->render(); ?>
                                              <?php echo $form6['facility_phone_comment']->renderError(); ?>
                                      </div>
                                  </div>
                          </div>
                          <div class="box full">
                              <div class="wrap">
                                      <?php echo $form6['facility_city']->renderLabel(); ?>
                                      <?php echo $form6['facility_city']->render(); ?>
                                      <?php echo $form6['facility_city']->renderError(); ?>
                              </div>
                              <div class="wrap">
                                      <?php echo $form6['facility_state']->renderLabel(); ?>
                                      <?php echo $form6['facility_state']->render(); ?>
                                      <?php echo $form6['facility_state']->renderError(); ?>
                              </div>
                          </div>

                <div class="form-submit">
                        <a href="#" onclick="jQuery('#fac_form_submit').click(); return false;" class="btn-action"><span>Save</span><strong>&nbsp;</strong></a>
                        <input type="submit" class="hide" id="fac_form_submit"/>
              <a href="<?php echo url_for('itinerary/create') ?>" class="cancel">Cancel</a>
              </div>
              </div><!--passenger form-->
              </form>
          </div><!--agency_form-->
      </div><!--bg-->
    </div><!--holder-->
 </div><!--addagency-popup-->
<div class="add-passenger" id="addpersonandpassanger-popup" style="display: none; padding-top:9px;z-index: 2000; position: absolute; left: 400px; top: 145px;height:auto;">
    <div class="holder">
        <div class="bg">
            <div id="addpersonandpassanger_form">
                <h2><?php echo $person_title ?></h2>
                <div class="passenger-form">
<?php
//'complete' => 'jQuery("#person_a").val("'.$person_a.'");jQuery("#lightbox-overlay_").click();'
// if(!isset($person_pass_id)) $person_pass_id = "";
 echo jq_form_remote_tag(array(
	 'update'  => 'addpersonandpassanger_form',
	 'url'     => 'itinerary/ajaxAddPersonAndPassenger',
	 'method'  => 'post',
 	 'loading'  => "jQuery('#loading-lightbox-overlay-image').center();Element.show('loading-lightbox-overlay');",
     'complete' => "Element.hide('loading-lightbox-overlay');"
	 ), array(
 			'id'    => 'person_form',
 			'style' => 'display:block;'
 		)
 	);

 ?>
<!--form action="" method="post" id="person_form" onsubmit="return personAddPassenger(this)" -->
 <?php if(isset($person)): ?><input type="hidden" name="id" value="<?php echo $person->getId() ?>" /><?php endif;?>
 <input type="hidden" name="referer" value="<?php echo $person_referer ?>" />
 <input type="hidden" id="action_from_passenger_or_requester" name="action_from_passenger_or_requester" value="" />
 <input type="hidden" name="key" value="<?php echo $key ?>" />
  <?php echo $person_form['_csrf_token'] ?>
  <?php if (isset($error_msg)){?>
  	 <span style="color: red;"><?php echo $error_msg?></span>
  <?php }?>
<div class="box">
	<div class="wrap">
		<?php echo $person_form['title']->renderLabel()?>
		<?php echo $person_form['title']->render(); ?>
		<?php echo $person_form['title']->renderError(); ?>
	</div>
	<div class="wrap">
		<?php echo $person_form['first_name']->renderLabel(); ?>
		<?php echo $person_form['first_name']->render(); ?>
		<?php echo $person_form['first_name']->renderError(); ?>
       <?php if(isset($first_name_error)):?>
          <ul class="error_list">
             <li>Please give person first name</li>
          </ul>
       <?php endif;?>
	</div>
	<div class="wrap">
		<?php echo $person_form['middle_name']->renderLabel(); ?>
		<?php echo $person_form['middle_name']->render(); ?>
		<?php echo $person_form['middle_name']->renderError(); ?>
	</div>
	<div class="wrap">
		<?php echo $person_form['last_name']->renderLabel(); ?>
		<?php echo $person_form['last_name']->render(); ?>
		<?php echo $person_form['last_name']->renderError(); ?>

	</div>
	<div class="wrap">
		<?php echo $person_form['suffix']->renderLabel(); ?>
		<?php echo $person_form['suffix']->render(); ?>
		<?php echo $person_form['suffix']->renderError(); ?>
	</div>
	<div class="wrap">
		<?php echo $person_form['nickname']->renderLabel(); ?>
		<?php echo $person_form['nickname']->render(); ?>
		<?php echo $person_form['nickname']->renderError(); ?>
	</div>
	<div class="wrap">
		<?php echo $person_form['gender']->renderLabel(); ?>
		<?php echo $person_form['gender']->render(); ?>
		<?php echo $person_form['gender']->renderError(); ?>
	</div>
	<div class="wrap">
            <?php echo $person_form['address1']->renderLabel(); ?>
            <div class="wrap">
                    <?php echo $person_form['address1']->render(); ?>
                    <?php echo $person_form['address1']->renderError(); ?>
                    <?php echo $person_form['address2']->render(); ?>
                    <?php echo $person_form['address2']->renderError(); ?>
            </div>
	</div>
	<div class="wrap">
		<?php echo $person_form['city']->renderLabel(); ?>
		<?php echo $person_form['city']->render(); ?>
		<?php echo $person_form['city']->renderError(); ?>
	</div>
	<div class="wrap">
		<?php echo $person_form['county']->renderLabel(); ?>
		<?php echo $person_form['county']->render(); ?>
		<?php echo $person_form['county']->renderError(); ?>
	</div>
	<div class="wrap">
		<?php echo $person_form['state']->renderLabel(); ?>
		<?php echo $person_form['state']->render(); ?>
		<?php echo $person_form['state']->renderError(); ?>
	</div>
	<div class="wrap">
		<?php echo $person_form['zipcode']->renderLabel(); ?>
		<?php echo $person_form['zipcode']->render(); ?>
		<?php echo $person_form['zipcode']->renderError(); ?>
	</div>
	<div class="wrap">
		<?php echo $person_form['country']->renderLabel(); ?>
		<?php echo $person_form['country']->render(); ?>
		<?php echo $person_form['country']->renderError(); ?>
	</div>
</div>

	<div class="box alt">
		<div class="passenger-form-heading">
			<strong>Phone Number</strong> <strong>Comment</strong>
		</div>
	<div class="wrap">
		<?php echo $person_form['day_phone']->renderLabel(); ?>
		<?php echo $person_form['day_phone']->render(); ?>
		<?php echo $person_form['day_phone']->renderError(); ?>
		<?php echo $person_form['day_comment']->render(); ?>
		<?php echo $person_form['day_comment']->renderError(); ?>
	</div>
	<div class="wrap"><?php echo $person_form['evening_phone']->renderLabel(); ?>
		<?php echo $person_form['evening_phone']->render(); ?>
		<?php echo $person_form['evening_phone']->renderError(); ?>
		<?php echo $person_form['evening_comment']->render(); ?>
		<?php echo $person_form['evening_comment']->renderError(); ?>
	</div>
	<div class="wrap">
		<?php echo $person_form['mobile_phone']->renderLabel(); ?>
		<?php echo $person_form['mobile_phone']->render(); ?>
		<?php echo $person_form['mobile_phone']->renderError(); ?>
		<?php echo $person_form['mobile_comment']->render(); ?>
		<?php echo $person_form['mobile_comment']->renderError(); ?>
	</div>
	<div class="wrap">
		<?php echo $person_form['pager_phone']->renderLabel(); ?>
		<?php echo $person_form['pager_phone']->render(); ?>
		<?php echo $person_form['pager_phone']->renderError(); ?>
		<?php echo $person_form['pager_comment']->render(); ?>
		<?php echo $person_form['pager_comment']->renderError(); ?>
	</div>
	<div class="wrap">
		<?php echo $person_form['pager_email']->renderLabel(); ?>
		<?php echo $person_form['pager_email']->render(); ?>
		<?php echo $person_form['pager_email']->renderError(); ?>
	</div>
	<div class="wrap">
		<?php echo $person_form['other_phone']->renderLabel(); ?>
		<?php echo $person_form['other_phone']->render(); ?>
		<?php echo $person_form['other_phone']->renderError(); ?>
		<?php echo $person_form['other_comment']->render(); ?>
		<?php echo $person_form['other_comment']->renderError(); ?>
	</div>
	<div class="wrap">
            <?php echo $person_form['fax_phone1']->renderLabel(); ?>
            <div class="wrap">
                <div class="wrap">
                        <?php echo $person_form['fax_phone1']->render(); ?>
                        <?php echo $person_form['fax_phone1']->renderError(); ?>
                        <?php echo $person_form['fax_comment1']->render(); ?>
                        <?php echo $person_form['fax_comment1']->renderError(); ?>
                </div>
                <div class="fax-choice">
                        <?php echo $person_form['auto_fax']->render(); ?>
                        <?php echo $person_form['auto_fax']->renderLabel(); ?>
                        <?php echo $person_form['auto_fax']->renderError(); ?>
                </div>
            </div>
	</div>
	<div class="wrap">
		<?php echo $person_form['fax_phone2']->renderLabel(); ?> 
		<?php echo $person_form['fax_phone2']->render(); ?>
		<?php echo $person_form['fax_phone2']->renderError(); ?> 
		<?php echo $person_form['fax_comment2']->render(); ?>
		<?php echo $person_form['fax_comment2']->renderError(); ?>
	</div>
</div>

	<div class="box full">
            <div class="wrap">
                <?php echo $person_form['block_mailings']->renderLabel(); ?>
                <?php echo $person_form['block_mailings']->render(); ?>
                <label class="raw" for="<?php echo $person_form->getName().'_block_mailings'?>">Yes</label>
                <?php echo $person_form['block_mailings']->renderError(); ?>
            </div>
	<div class="wrap">
		<?php echo $person_form['newsletter']->renderLabel(); ?> 
		<?php echo $person_form['newsletter']->render(); ?>
		<label class="raw" for="<?php echo $person_form->getName().'_newsletter'?>">Yes</label>
		<?php echo $person_form['newsletter']->renderError(); ?>
	</div>
	<div class="wrap">
		<?php echo $person_form['email']->renderLabel(); ?> 
		<?php echo $person_form['email']->render(); ?>
		<?php echo $person_form['email']->renderError(); ?>
	</div>
	<div class="wrap">
		<?php echo $person_form['secondary_email']->renderLabel(); ?>
		<?php echo $person_form['secondary_email']->render(); ?> 
		<?php echo $person_form['secondary_email']->renderError(); ?>
	</div>
	<div class="wrap">
		<?php echo $person_form['email_blocked']->renderLabel(); ?> 
		<?php echo $person_form['email_blocked']->render(); ?>
		<label class="raw" for="<?php echo $person_form->getName().'_email_blocked'?>">Yes</label>
		<?php echo $person_form['email_blocked']->renderError(); ?>
	</div>
	<div class="wrap">
		<?php echo $person_form['email_text_only']->renderLabel(); ?>
		<?php echo $person_form['email_text_only']->render(); ?> 
		<label class="raw" for="<?php echo $person_form->getName().'_email_text_only'?>">Yes</label> 
		<?php echo $person_form['email_text_only']->renderError(); ?>
	</div>
	<div class="wrap">
		<?php echo $person_form['comment']->renderLabel(); ?> 
		<?php echo $person_form['comment']->render(); ?>
		<?php echo $person_form['comment']->renderError(); ?>
	</div>
	<div class="wrap">
		<?php echo $person_form['veteran']->renderLabel(); ?> 
		<?php echo $person_form['veteran']->render(); ?>
		<label class="raw" for="<?php echo $person_form->getName().'_veteran'?>">Yes</label>
		<?php echo $person_form['veteran']->renderError(); ?>
	</div>
	<div class="wrap">
            <div class="wrap">
                <?php echo $person_form['deceased']->renderLabel(); ?>
                <?php echo $person_form['deceased']->render(); ?>
                <label class="raw" for="<?php echo $person_form->getName().'_deceased'?>">Yes</label>
                <?php echo $person_form['deceased']->renderError(); ?> <span class="deceased">
                <?php echo $person_form['deceased_date']->renderLabel(); ?>
                <?php echo $person_form['deceased_date']->render(); ?>
                <?php echo $person_form['deceased_date']->renderError(); ?> </span>
            </div>
	</div>
	<div class="wrap">
		<?php echo $person_form['deceased_comment']->renderLabel(); ?>
		<?php echo $person_form['deceased_comment']->render(); ?> 
		<?php echo $person_form['deceased_comment']->renderError(); ?>
	</div>
	<input type="hidden" id="back" name="back" value="<?php echo $back?>" />
	<?php if(isset($stepped)):?>
		<input type="hidden" id="has" name="has" value="<?php echo $stepped?>" />
	<?php endif;?> 
	<?php if(isset($camp_id)):?>
		<input type="hidden" id="camp_id" name="camp_id" value="<?php echo $camp_id?>" />
	<?php endif;?>
	<?php if(isset($person_itine)):?>
		<input type="hidden" id="iti" name="iti" value="<?php echo $person_itine; ?>" />
	<?php endif;?> 
	<?php if(isset($contact)):?>
		<input type="hidden" id="contact" name="contact" value="<?php echo $contact?>" />
	<?php endif;?>
	<div class="form-submit">
		<a class="btn-action" href="#"	onclick="jQuery('#person_form_button').click();return false;"><span>Save and
	Continue &raquo;</span><strong> </strong></a> 
		<a class="cancel" href="<?php echo url_for($person_referer)?>">Cancel</a> 
		<input type="submit" class="hide" id="person_form_button" />
	</div>
</div>
</form>
</div>
</div> 
</div>
</div>
</div>
 <div class="add-passenger" id="add_requester_agency_popup" style="display: none; padding-top:9px;z-index: 2000; position: absolute; left: 400px; top: 145px;height:auto;">
    <div class="holder">
       <div class="bg">          
<div class="passenger-form" id="add_new_agency_on_requester">
  <div class="person-view">
    <h2><?php echo $agency_title ?></h2>
    <?php
       echo jq_form_remote_tag(array(
           'update'  => 'add_new_agency_on_requester',
           'url'     => 'itinerary/ajaxAddNewRequesterAgency',
           'method'  => 'post',
           'loading'  => "jQuery('#loading-lightbox-overlay-image').center();Element.show('loading-lightbox-overlay');",
           'complete' => "Element.hide('loading-lightbox-overlay');",
           ), array(
                  'id'    => 'requester_agency_form',
                  'style' => 'display:block;'
              )
          );
    ?>
      <div class="box">
          <div class="wrap">
            <?php echo $agency_form['name']->renderLabel()?>
            <?php echo $agency_form['name']->render(); ?>
            <?php echo $agency_form['name']->renderError(); ?>
            <?php echo $agency_form['_csrf_token'] ?>
          </div>
          <div class="wrap">
            <?php echo $agency_form['address1']->renderLabel()?>
            <?php echo $agency_form['address1']->render(); ?>
            <?php echo $agency_form['address1']->renderError(); ?>
          </div>
          <div class="wrap">
            <?php echo $agency_form['address2']->renderLabel()?>
            <?php echo $agency_form['address2']->render(); ?>
            <?php echo $agency_form['address2']->renderError(); ?>
          </div>
          <div class="wrap">
            <?php echo $agency_form['city']->renderLabel()?>
            <?php echo $agency_form['city']->render(); ?>
            <?php echo $agency_form['city']->renderError(); ?>
          </div>
          <div class="wrap">
            <?php echo $agency_form['county']->renderLabel()?>
            <?php echo $agency_form['county']->render(); ?>
            <?php echo $agency_form['county']->renderError(); ?>
          </div>
          <div class="wrap">
            <?php echo $agency_form['state']->renderLabel()?>
            <?php echo $agency_form['state']->render(); ?>
            <?php echo $agency_form['state']->renderError(); ?>
          </div>
          <div class="wrap">
            <?php echo $agency_form['country']->renderLabel()?>
            <?php echo $agency_form['country']->render(); ?>
            <?php echo $agency_form['country']->renderError(); ?>
          </div>
          <div class="wrap">
            <label><?php echo $agency_form['zipcode']->renderLabelName()?></label>
            <?php echo $agency_form['zipcode']->render(); ?>
            <?php echo $agency_form['zipcode']->renderError(); ?>
          </div>
          <div class="wrap">
            <?php echo $agency_form['phone']->renderLabel()?>
            <?php echo $agency_form['phone']->render(); ?>
            <?php echo $agency_form['phone']->renderError(); ?>
          </div>
          <div class="wrap">
            <?php echo $agency_form['comment']->renderLabel()?>
            <?php echo $agency_form['comment']->render(); ?>
            <?php echo $agency_form['comment']->renderError(); ?>
          </div>
          <div class="wrap">
            <?php echo $agency_form['fax_phone']->renderLabel()?>
            <?php echo $agency_form['fax_phone']->render(); ?>
            <?php echo $agency_form['fax_phone']->renderError(); ?>
          </div>
          <div class="wrap">
            <?php echo $agency_form['fax_comment']->renderLabel()?>
            <?php echo $agency_form['fax_comment']->render(); ?>
            <?php echo $agency_form['fax_comment']->renderError(); ?>
          </div>
          <div class="wrap">
            <?php echo $agency_form['email']->renderLabel()?>
            <?php echo $agency_form['email']->render(); ?>
            <?php echo $agency_form['email']->renderError(); ?>
          </div>
          <input type="submit" class="hide" id="requester_agency_form_button" />
          <div class="form-submit">
              <a href="javascript:void(0)" onclick="jQuery('#requester_agency_form_button').click(); return false;" class="btn-action"><span>Save</span><strong>&nbsp;</strong></a>
              <a class="cancel" href="#" onclick="jQuery('#lightbox-overlay_').click();">Cancel</a>
          </div>
      </div>
    </form>
  </div>
</div>
       </div>
    </div>
 </div>
<div id="loading-lightbox-overlay" style="display:none;opacity: 0.55; background-color: rgb(0, 0, 0); position: absolute; overflow: hidden; top: 0px; left: 0px; z-index: 100000; width: 976px; height: auto;">
  <span>
         <img id="loading-lightbox-overlay-image" src="/images/ajax-loader.gif">
    </span>
</div>
  <?php end_slot() ?>
<input type="hidden" id="new_req"/>
<input type="hidden" id="new_pass"/>
  <script type="text/javascript">
  //<![CDATA[
  <?php
  $pass_lnames = array();
  $pass_fnames = array();
  $pass_states = array();
  $pass_zips = array();

  $req_lnames = array();
  $req_fnames = array();
  $req_states = array();
  $req_zips = array();

  foreach ($all_passengers as $pass){
    $pperson = PersonPeer::retrieveByPK($pass->getPersonId());
    if(isset($pperson) && $pperson instanceof Person){
      $pass_lnames[$pass->getId()] = $pperson->getLastName();
      $pass_fnames[$pass->getId()] = $pperson->getFirstName();
      $pass_states[$pass->getId()] = $pperson->getState();
      $pass_zips[$pass->getId()] = $pperson->getZipcode();
    }
  }

  foreach ($all_requesters as $req){
    $rperson = PersonPeer::retrieveByPK($req->getPersonId());
    if(isset($rperson) && $rperson instanceof Person){
      $req_lnames[$req->getId()] = $rperson->getLastName();
      $req_fnames[$req->getId()] = $rperson->getFirstName();
      $req_states[$req->getId()] = $rperson->getState();
      $req_zips[$req->getId()] = $rperson->getZipcode();
    }
  }
  ?>
  var pass_lnames = <?php echo json_encode($pass_lnames)?>;
  var pass_fnames = <?php echo json_encode($pass_fnames)?>;
  var pass_states = <?php echo json_encode($pass_states)?>;
  var pass_zips = <?php echo json_encode($pass_zips)?>;

  var req_lnames = <?php echo json_encode($req_lnames)?>;
  var req_fnames = <?php echo json_encode($req_fnames)?>;
  var req_states= <?php echo json_encode($req_states)?>;
  var req_zips= <?php echo json_encode($req_zips)?>;


  jQuery(document).ready(function() {
    // Remove Steps navigation since it is no need
    jQuery('div.steps-area').each(function(){
        jQuery(this).find('div.step-list > ul li a').click(function(){
            return false;
          }
        );
    });
    jQuery('#form1_sub').click(function() {
      jQuery('#step1').hide();
      jQuery('#step2').show();
      jQuery('#s1').addClass("first-checked");
      jQuery('#s2').addClass("active");
    });
    
    jQuery('#form2_sub').click(function() {      
      jQuery('#step1').hide();
      jQuery('#step2').hide();
      jQuery('#step3').show();
      jQuery('#s1').addClass("first-checked");
      jQuery('#s2').addClass("checked");
      jQuery('#s3').addClass("last-active");
    });
    jQuery('#form3_sub').click(function() {

    });

    if (jQuery('#itine_apoint_time').val() == 'exact_time') {
        jQuery('#times').show();
      }

    var timerId1 = null, timerId2 = null;

    /* jQuery('#facility').change(function()
    {
      if (timerId1 != null){
        clearTimeout(timerId1);
      }
      timerId1 = setTimeout('getFacility()', 1500);
    });

    jQuery('#lodging').change(function()
    {
      if (timerId1 != null){
        clearTimeout(timerId1);
      }
      timerId1 = setTimeout('getLodging()', 1500);
    });
*/
    var fac_id ;
    var lod_id ;

    function getFacility(){
      if(jQuery('#facility').next().find('[class=selected]').attr('id')){
        fac_id = jQuery('#facility').next().find('[class=selected]').attr('id');
        jQuery('#facility_pass_id').val(fac_id);
      }
    }

    function getLodging(){
      if(jQuery('#lodging').next().find('[class=selected]').attr('id')){
        lod_id = jQuery('#lodging').next().find('[class=selected]').attr('id');
        jQuery('#lodging_pass_id').val(lod_id);
      }
    }

    if(fac_id){
      jQuery('#facility_pass_id').val(fac_id);
    }
    if(lod_id){
      jQuery('#lodging_pass_id').val(lod_id);
    }

    if(jQuery('#new_req').val()){
      jQuery('#requester_a').val(jQuery('#new_req').val());
    }
    jQuery("#itine_date_requested").datepicker();

    if(jQuery('#current_pass_id').val()){
      //jQuery('#passenger_a').val(pass_lnames[jQuery('#current_pass_id').val()]+','+ pass_fnames[jQuery('#current_pass_id').val()]+','+pass_states[jQuery('#current_pass_id').val()]+','+pass_zips[jQuery('#current_pass_id').val()]);
      jQuery('#passenger_a').val('<?php echo isset($passenger_name) ? $passenger_name : ""?>');
    }
    if(jQuery('#current_facility').val()){
      jQuery('#facility').val(jQuery('#current_facility').val());
    }
    if(jQuery('#current_lodging').val()){
      jQuery('#lodging').val(jQuery('#current_lodging').val());
    }
  });

function toggle1(element){
  if (jQuery(element).attr('checked')){
    jQuery('#newTemplate').show();
    jQuery('#yes_no').val(1);
  } else {
    jQuery('#newTemplate').hide();
    jQuery('#yes_no').val(0);
  }
  
  return false;
}

function selectTimes(){
  //alert(jQuery('#itine_apoint_time').val());
      if (jQuery('#itine_apoint_time').val() == 'exact_time') {
        jQuery('#times').show();
      }else{
        jQuery('#times').hide();
      }
}

function selectChange(){
  jQuery('#missionSelectLast').val(jQuery('#missionTwoSelectLast').val());
  jQuery('#missionTwoSelect').val(jQuery('#missionTwoSelectLast').val());
  jQuery('#missionTwoSelectLast').val(jQuery('#missionSelect').val());
  if(jQuery('#missionSelect').val() == 1){
    jQuery('#appointshow').show();
  }else{
    jQuery('#appointshow').hide();
  }
  return false;
}
function makeCenterAnElement(id, z_index){	
    var msg = jQuery('#'+id);
    var height = jQuery(window).height();
    var width = jQuery(document).width();

    msg.css({
        'left' : width/2 - (msg.width() / 2),  // half width - half element width
        'top' : height/2 - (msg.height() / 2), // similar
        'z-index' : z_index,
        'position':'absolute'                   // make sure element is on top
    });
				
}
function selectChangeTwo(){
  jQuery('#missionSelect').val(jQuery('#missionTwoSelect').val());
  jQuery('#missionTwoSelectLast').val(jQuery('#missionTwoSelect').val());
  jQuery('#missionTwoSelect').val(jQuery('#missionSelectLast').val());
  if(jQuery('#missionSelect').val() == 1){
    jQuery('#appointshow').show();
  }else{
    jQuery('#appointshow').hide();
  }
  return false;
}
function goToStep1(){
     return false;
    $('#step1').show();
    $('#step2, #step3').hide();
  //  location.href = document.getElementById('s1').value;
  }
function goToStep2(){
    return false;
    $('#step2').show();
    $('#step1, #step3').hide();
    //  location.href = document.getElementById('s2').value;
}
function goToStep3(){
	return false;
  $('#step3').show();
  $('#step1, #step2').hide();
  $('#step1, #step2').hide();
  //    location.href = document.getElementById('s3').value;
}
  //]]>
</script>