<?php use_stylesheets_for_form($form);?>
<?php use_javascripts_for_form($form);?>
<?php use_stylesheets_for_form($form_a);?>
<?php use_javascripts_for_form($form_a);?>
<?php use_stylesheets_for_form($form_airport);?>
<?php use_javascripts_for_form($form_airport);?>
<?php use_helper('Javascript', 'Form') ?>
<?php use_helper('jQuery', 'Form') ?>


<?php use_helper('jQuery'); ?>
<h2><?php echo $title ?></h2>
<?php
$airport_info = AirportPeer::retrieveByPK($camp->getAirportId());
?>
<div class="passenger-form">
<form action="<?php echo url_for('@camp_create') ?>" method="post" id="camp_form">
  <input type="hidden" name="id" value="<?php echo $camp->getId() ?>" />
  <input type="hidden" name="referer" value="<?php echo $referer ?>" />
  <div class="box full">
    <a href="#addagency-popup" id="add_new_agency" class="open-popup"></a>
    <div class="wrap">
      <label>Agency</label>
      <?php echo input_auto_complete_tag('agency', $agency == '*' ? '' : $agency,
      'agency/autoComplete',
      array('autocomplete' => 'off', 'class'=>'text','style'=>'200px'),
      array(
      'use_style'    => true,
      'indicator'    =>'indicator',
      )
     ); ?>
      <span id="indicator" style="display:none"><?php echo image_tag('/images/loading.gif')?></span>
      <?php if(isset($agency_id)):?><input type="hidden" id="pre_agency_id" value="<?php echo $agency_id?>"/><?php endif;?>
      <?php if ($sf_user->hasCredential(array('Administrator','Staff','Coordinator','Volunteer'), false)):?><a href="#" onclick="jQuery('#add_new_agency').click();return false;" id="add_agency">Add New</a><?php endif;?>
    </div>
    <div class="wrap">
     <label>Airport Identifier</label>
      <?php echo input_auto_complete_tag('airport', $airport == '*' ? '' : $airport, 
      'airport/autoComplete',
      array('autocomplete' => 'off', 'class'=>'text','style'=>'200px'),
      array(
      'use_style'    => true,
      'indicator'    =>'airport_indicator',
      )
     ); ?>
      <span id="airport_indicator" style="display:none"><?php echo image_tag('/images/loading.gif')?></span>
      <?php if(isset($airport_id)):?><input type="hidden" id="pre_airport_id" value="<?php echo $airport_id?>"/><?php endif;?>
    </div>
    <div class="wrap">
      <label>Airport City</label>
      <input type="text" class="text" name="airport_city" id="airport_city" readonly="true" value="<?php if(isset($airport_info)) echo $airport_info->getCity();?>" />
    </div>
    <a href="#addairport-popup" id="add_new_airport" class="open-popup"></a>
    <div class="wrap">
      <?php echo $form['camp_name']->renderLabel(); ?>
      <?php echo $form['camp_name']->render(); ?>
      <?php echo $form['camp_name']->renderError(); ?>
    </div>
    <div class="wrap">
      <?php echo $form['session']->renderLabel(); ?>
      <?php echo $form['session']->render(); ?>
      <?php echo $form['session']->renderError(); ?>
    </div>        
    <div class="wrap">
      <?php echo $form['arrival_date']->renderLabel(); ?>
      <?php echo $form['arrival_date']->render(); ?>	
      <?php //echo $form['arrival_date']->renderHelp(); ?>
    </div>
    <div class="wrap">
      <?php echo $form['arrival_comment']->renderLabel(); ?>
      <?php echo $form['arrival_comment']->render(); ?>
      <?php echo $form['arrival_comment']->renderHelp(); ?>
    </div>
    <div class="wrap">	
      <?php echo $form['departure_date']->renderLabel(); ?>
      <?php echo $form['departure_date']->render(); ?>
      <?php echo $form['departure_date']->renderError(); ?>      
    </div>
    <div class="wrap">
      <?php echo $form['departure_comment']->renderLabel(); ?>
      <?php echo $form['departure_comment']->render(); ?>
      <?php echo $form['departure_comment']->renderHelp(); ?>
    </div>
    <div class="wrap">
      <?php echo $form['comment']->renderLabel(); ?>
      <?php echo $form['comment']->render(); ?>
      <?php echo $form['comment']->renderError(); ?>
    </div>
    <?php echo $form['_csrf_token'] ?>
    <div class="form-submit">
      <a href="#" onclick="jQuery('#camp_form').submit(); return false;" class="btn-action"><span>Save</span><strong>&nbsp;</strong></a>
      <a href="<?php echo url_for('camp') ?>" class="cancel">Cancel</a>
    </div>
  </div>
</form>
</div>
<input type="hidden" id="back_agency_id"/>
<input type="hidden" id="agency_id" name="agency_id"/>
 <?php slot('popup') ?>
   <div class="add-passenger" id="addagency-popup" style="display: none; z-index: 1001; position: absolute; left: 400px; top: 145px; ">
     <div class="holder">
        <div class="bg">
          <div id="agency_form">
            <?php 
            echo jq_form_remote_tag(array(
            'update'  => 'agency_form',
            'url'     => 'agency/updateAjax?camp=1',
            'method'  => 'post',
            ), array(
            'id'    => 'form',
            'style' => 'display:block;'
            ));
            ?> 
              <h3>Add New Agency</h3>
              <div class="passenger-form">
                  <div class="box">
                    <div class="wrap">
                      <?php echo $form_a['name']->renderLabel()?>
                      <?php echo $form_a['name']->renderError(); ?>
                      <?php echo $form_a['name']->render(); ?>
                      <?php echo $form_a['_csrf_token'] ?>
                    </div>
                    <div class="wrap">
                      <?php echo $form_a['address1']->renderLabel()?>
                      <?php echo $form_a['address1']->renderError(); ?>
                      <?php echo $form_a['address1']->render(); ?>
                    </div>
                    <div class="wrap">
                      <?php echo $form_a['address2']->renderLabel()?>
                      <?php echo $form_a['address2']->renderError(); ?>
                      <?php echo $form_a['address2']->render(); ?>
                    </div>
                    <div class="wrap">
                      <?php echo $form_a['city']->renderLabel()?>
                      <?php echo $form_a['city']->renderError(); ?>
                      <?php echo $form_a['city']->render(); ?>
                    </div>
                    <div class="wrap">
                      <?php echo $form_a['county']->renderLabel()?>
                      <?php echo $form_a['county']->renderError(); ?>
                      <?php echo $form_a['county']->render(); ?>
                    </div>
                    <div class="wrap">
                      <?php echo $form_a['state']->renderLabel()?>
                      <?php echo $form_a['state']->renderError(); ?>
                      <?php echo $form_a['state']->render(); ?>
                    </div>
                    <div class="wrap">
                      <?php echo $form_a['country']->renderLabel()?>
                      <?php echo $form_a['country']->renderError(); ?>
                      <?php echo $form_a['country']->render(); ?>
                    </div>
                    <div class="wrap">
                      <?php echo $form_a['zipcode']->renderLabel()?>
                      <?php echo $form_a['zipcode']->renderError(); ?>
                      <?php echo $form_a['zipcode']->render(); ?>
                    </div>
                  </div><!--box-->                       
                  <div class="box alt">     
                    <div class="wrap">
                      <?php echo $form_a['phone']->renderLabel()?>
                      <?php echo $form_a['phone']->renderError(); ?>
                      <?php echo $form_a['phone']->render(); ?>
                    </div>
                    <div class="wrap">
                      <?php echo $form_a['comment']->renderLabel()?>
                      <?php echo $form_a['comment']->renderError(); ?>
                      <?php echo $form_a['comment']->render(); ?>
                    </div>
                    <div class="wrap">
                      <?php echo $form_a['fax_phone']->renderLabel()?>
                      <?php echo $form_a['fax_phone']->renderError(); ?>
                      <?php echo $form_a['fax_phone']->render(); ?>
                    </div>
                    <div class="wrap">
                      <?php echo $form_a['fax_comment']->renderLabel()?>
                      <?php echo $form_a['fax_comment']->renderError(); ?>
                      <?php echo $form_a['fax_comment']->render(); ?>
                    </div>
                    <div class="wrap">
                      <?php echo $form_a['email']->renderLabel()?>
                      <?php echo $form_a['email']->renderError(); ?>
                      <?php echo $form_a['email']->render(); ?>
                    </div>
                    <div class="form-submit">
                        <a href="#" onclick="jQuery('#agency_form_submit').click(); return false;" class="btn-action"><span>Save</span><strong>&nbsp;</strong></a>
                        <input type="submit" class="hide" id="agency_form_submit"/>
              <a href="<?php echo url_for('camp/create') ?>" class="cancel">Cancel</a>
              </div>
              </div>
              </div>
              </form>
          </div>
      </div>
    </div>
 </div><!--addagency-popup-->
              
              
  <div class="add-passenger" id="addairport-popup" style="display: none; z-index: 1001; position: absolute; left: 400px; top: 145px; ">
   <div class="holder">
    <div class="bg">
     <div id="airport_form">
            <?php 
            echo jq_form_remote_tag(array(
            'update'  => 'airport_form',
            'url'     => 'airport/updateAjax',
            'method'  => 'post',
            ), array(
            'id'    => 'form_airport',
            'style' => 'display:block;'
            ));
            ?>
        	  <h3>Add New Airport</h3>
        	   <div class="passenger-form">
                       <div class="box">
                            <div class="wrap">
                            <?php echo $form_airport['ident']->renderLabel();?>
                            <?php echo $form_airport['ident']->render();?>
                            <?php echo $form_airport['ident']->renderError();?>
                            <span id="ident_warring" style="color:red"></span>
                            </div>
                            <div class="wrap">
                            <?php echo $form_airport['name']->renderLabel();?>
                            <?php echo $form_airport['name']->render();?>
                            <?php echo $form_airport['name']->renderError();?>
                            </div>
                            <div class="wrap">
                            <?php echo $form_airport['city']->renderLabel();?>
                            <?php echo $form_airport['city']->render();?>
                            <?php echo $form_airport['city']->renderError();?>
                            </div>
                            <div class="wrap">
                            <?php echo $form_airport['state']->renderLabel();?>
                            <?php echo $form_airport['state']->render();?>
                            <?php echo $form_airport['state']->renderError();?>
                            </div>
                            <div class="wrap">
                            <?php echo $form_airport['latitude']->renderLabel();?>
                            <?php echo $form_airport['latitude']->render();?>
                            <?php echo $form_airport['latitude']->renderError();?>
                            </div>
                            <div class="wrap">
                            <?php echo $form_airport['longitude']->renderLabel();?>
                            <?php echo $form_airport['longitude']->render();?>
                            <?php echo $form_airport['longitude']->renderError();?>
                            </div>
                      </div>
                      <div class="box alt">
                          <div class="wrap">
                            <?php echo $form_airport['runway_length']->renderLabel();?>
                            <?php echo $form_airport['runway_length']->render();?>
                            <?php echo $form_airport['runway_length']->renderError();?>
                            </div>
                            <div class="wrap">
                            <?php echo $form_airport['wing_id']->renderLabel();?>
                            <?php echo $form_airport['wing_id']->render();?>
                            <?php echo $form_airport['wing_id']->renderError();?>
                            </div>
                            <div class="wrap">
                            <?php echo $form_airport['gmt_offset']->renderLabel();?>
                            <?php echo $form_airport['gmt_offset']->render();?>
                            <?php echo $form_airport['gmt_offset']->renderError();?>
                            </div>
                            <div class="wrap">
                            <?php echo $form_airport['dst_offset']->renderLabel();?>
                            <?php echo $form_airport['dst_offset']->render();?>
                            <?php echo $form_airport['dst_offset']->renderError();?>
                            </div>
                            <div class="wrap">
                            <?php echo $form_airport['zipcode']->renderLabel();?>
                            <?php echo $form_airport['zipcode']->render();?>
                            <?php echo $form_airport['zipcode']->renderError();?>
                            </div>
                            <div class="wrap">
                            <?php echo $form_airport['closed']->renderLabel();?>
                            <?php echo $form_airport['closed']->render();?>
                            <?php echo $form_airport['closed']->renderError();?>
                            <?php echo $form_airport['_csrf_token'] ?>
                            </div>
                            <div class="form-submit">
                                 <a href="#" onclick="jQuery('#airport_form_submit').click(); return false;" class="btn-action"><span>Save</span><strong>&nbsp;</strong></a>
                                 <input type="submit" class="hide" id="airport_form_submit"/>
                                <a href="<?php echo url_for('camp/create') ?>" class="cancel">Cancel</a>
                            </div>
                        </div><!--box alt-->
               </div>
            </form>
      </div><!--airport_form-->
    </div><!--bg-->
   </div><!--holder-->
  </div><!--addairport-popup-->
  <?php end_slot() ?>
  
<script type="text/javascript">
//<![CDATA[
jQuery(document).ready(function() {
  //Airport Form Check Ident Is used
  <?php
  $names = array();
  $cities = array();
  $count = 0;
  $agencies = AgencyPeer::getNames();
  //  $size = sizeof($names);

  foreach ($agencies as $id => $name)
  {
    $names[$id] = $name;
  }

  foreach ($airports as $airport)
  {
    if($airport->getIdent() && $airport->getCity()){
      $cities[$airport->getIdent()] = $airport->getCity();
    }
  }
  ?>

  var names = <?php echo json_encode($names)?>;
  var cities = <?php echo json_encode($cities)?>;

  jQuery('#airport').change(function()
  {
    setTimeout(refreshProgress, 1500);
  });
  
  function refreshProgress(){
    if(cities[jQuery('#airport').val()]){
      var aa = cities[jQuery('#airport').val()];
      jQuery('#airport_city').val(aa);
    }
    setTimeout(refreshProgress, 1500);
  }

  //  ("#airp_ident").blur(function () {
  //    for(i = 0; i< sizeOf; i++ ){
  //      if($("#airp_ident").get(0).value != null){
  //        if(idents[i] == $("#airp_ident").get(0).value){
  //          $('<div style="color:red">This Ident Name has Already Used !</div>')
  //          .insertAfter( $(this) )
  //          .fadeIn('slow')
  //          .animate({opacity: 1.0}, 3000)
  //          .fadeOut('slow', function() {
  //            $(this).remove();
  //          });
  //        }
  //      }
  //    }
  //  });

  if(jQuery('#pre_agency_id').val()){
    jQuery('#agency').val(names[jQuery('#pre_agency_id').val()]);
  }

  if(jQuery('#back_agency_id').val()){
    jQuery('#agency').val(names[jQuery('#back_agency_id').val()]);
    jQuery('#agency_id').val(jQuery('#back_agency_id').val());
  }
});

jQuery(function() {
  jQuery("#camp_arrival_date_date").datepicker();
  jQuery("#camp_departure_date_date").datepicker();
});

jQuery('#camp_departure_date_date').change(function(){

//    var today = new Date();
//    var first_val = jQuery('#camp_departure_date_date').val().split("/");
//    first_val = new Date(first_val[2], first_val[0], first_val[1]);
//
//    if(first_val.getTime() < today.getTime()){
//	jQuery('#camp_departure_date_date').val("");
//	alert("Departure date must not be smaller than today");
//	return false;
//    }

    if(firstDateStatus(jQuery('#camp_arrival_date_date').val(), jQuery('#camp_departure_date_date').val()) == "equal"){
	jQuery('#camp_departure_date_date').val('');
	alert('Arrival Date and Departure Date can not be same!');
    }else if(firstDateStatus(jQuery('#camp_arrival_date_date').val(), jQuery('#camp_departure_date_date').val()) == "big"){
	jQuery('#camp_departure_date_date').val('');
	alert('Departure Date must be greater than Arrival Date!');
    }
});
jQuery('#camp_arrival_date_date').change(function(){

//    var today = new Date();
//
//    var first_val = jQuery('#camp_arrival_date_date').val();
//    first_val = first_val.split("/");
//    first_val = new Date(first_val[2], first_val[0], first_val[1]);
//
//    if(first_val.getTime() < today.getTime()){
//	alert('as');
//	jQuery('#camp_arrival_date_date').val("");
//	alert("Arrival date must not be smaller than today");
//	return false;
//    }
  
  if(firstDateStatus(jQuery('#camp_arrival_date_date').val(), jQuery('#camp_departure_date_date').val()) == "equal"){
	jQuery('#camp_arrival_date_date').val('');
	alert('Arrival Date and Departure Date can not be same!');
  }else if(firstDateStatus(jQuery('#camp_arrival_date_date').val(), jQuery('#camp_departure_date_date').val()) == "big"){
	jQuery('#camp_arrival_date_date').val('');
	alert('Arrival Date must be lower than Departure Date!');
  }
});

jQuery('#camp_form').submit(function(){
  if(jQuery('#camp_arrival_date_date').val() == ''){
    alert('Arrival Date Can not be empty!');
	return false;
  }else if(jQuery('#camp_departure_date_date').val() == ''){
    alert('Departure Date Can not be empty!');
	return false;
  }else {
   return true;
  }
});
function firstDateStatus(first_val, second_val){
    //var camp_arrival_date_date = jQuery('#camp_arrival_date_date').val();
    first_val = first_val.split("/");
    first_val = new Date(first_val[2], first_val[0], first_val[1]);

    second_val = second_val.split("/");
    second_val = new Date(second_val[2], second_val[0], second_val[1]);
    if(first_val.getTime() > second_val.getTime()){
	return "big";
    }else if(first_val.getTime() == second_val.getTime()){
	return "equal";
    }
    return "small";
}
// ]]>
</script>
