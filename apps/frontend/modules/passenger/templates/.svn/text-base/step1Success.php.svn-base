<script type="text/javascript">
	jQuery('document').ready( function(){	
		jQuery('#pass2_medical_release_received').change(function(){
			var received_date = jQuery('#pass2_medical_release_received').val();
			var received_date = received_date.split("/");
			var received_date = new Date(received_date[0], received_date[1], received_date[2]);
			
			var requested_date = jQuery('#pass2_medical_release_requested').val();
			var requested_date = requested_date.split("/");
			var requested_date = new Date(requested_date[0], requested_date[1], requested_date[2]);
			
			if( jQuery('#pass2_medical_release_requested').val()  == ''){
				alert('You must filled requested date first!');
				jQuery('#pass2_medical_release_received').val('');
				return false;
			}
			
			if( received_date.getTime() > requested_date.getTime() ){
				alert('Medical release received date must be smaller than requested date !');
				jQuery('#pass2_medical_release_received').val('');
			}
	   });	  
		
	});
</script>


<?php use_helper('jQuery'); ?>

<?php use_stylesheets_for_form($form1);?>
<?php use_javascripts_for_form($form1);?>
<?php use_stylesheets_for_form($form2);?>
<?php use_javascripts_for_form($form2);?>
<?php use_stylesheets_for_form($form3);?>
<?php use_javascripts_for_form($form3);?>

<h2><?php echo $sub_title;?></h2>
<!--Errors-->
                      <?php if (isset($error_msg)){?>
                          <span style="color:red;"><?php echo $error_msg?></span>
                      <?php }?>
<div class="preferences" style="width:325px;">
  <div class="frame">
    <div class="bg">
      <div class="holder">
        <h4>Person Record
        <?php if ($sf_user->hasCredential(array('Administrator','Staff','Pilot','Coordinator','Volunteer'), false))  {?>
          <a class="action-view" href="<?php echo url_for('@person_view?id='.$person->getId())?>">View</a>
        <?php }?>
        </h4>
        <?php echo ($person->getTitle()?$person->getTitle().'. ':'').$person->getName()?><br/>
        <?php echo ($person->getCity()?$person->getCity().', ':'').$person->getState()?><br/>
        <?php echo $person->getCountry()?>
      </div>
    </div>
  </div>
</div>
<div class="steps-area">
    <?php
    if($sf_context->getActionName() == 'step1'){
      $class1= 'first-active';
      $class2= '';
      $class3= '';
    }elseif($sf_context->getActionName() == 'step2'){
      $class1= 'first-checked';
      $class2= 'active';
      $class3= '';
    }elseif($sf_context->getActionName() == 'step3'){
      $class1= 'first-checked';
      $class2= 'checked';
      $class3= 'last-active';
    }
    ?>
    <div class="step-list">
              <ul>
                    <li class="<?php echo $class1?>" style="display:list-item;">
                    <a href="#" class="first" onclick="goToStep1()"><strong>Step 1</strong><span class="right-c"></span></a>
                    </li>
                    <li class="<?php echo $class2?>" style="display:list-item;">
                    <a href="#" class="second" onclick="goToStep2()">Step 2</a>
                    </li>
                    <li class="<?php echo $class3?>" style="display:list-item;" id="s3">
                    <a href="#" class="fifth" onclick="goToStep3()">Step 3</a>
                    </li>
              </ul>
    </div>
    <?php jq_javascript_tag();?>
    $(window).load(function () {
    <?php
    $has = 0;
    if(strstr($sf_context->getActionName(),'step3')){
      $has = 1;
    }
    ?>
    var is_step3 = <?php echo $has?>;
    if(is_step3 == 1){
           $('.fifth').click();
    }
    });
    <?php jq_end_javascript_tag();?>
    <div class="steps-holder">
            <div class="step" style="display:none;" id="step1">
                  <div class="passenger-form">
                    <form id="form1" action="" method="post">
                      <input type="hidden" name="id" value="<?php echo $passenger->getId() ?>" />
                      <input type="hidden" name="referer" value="<?php echo $referer ?>" />
                      <input type="hidden" id="back" name="back" value="<?php echo $back?>"/>
                      <input type="hidden" id="camp_id" name="camp_id" value="<?php echo $camp_id?>"/>
                      <input type="hidden" id="unique_key" name="unique_key" value="<?php echo $key?>" />
                      <?php if(isset($f_back)): ?><input type="hidden" name="f_back" value="<?php echo $f_back ?>" /><?php endif;?>
                          <fieldset>
                            <div class="box">
                              <?php
//                              foreach($form1->getFormFieldSchema() as $name=>$formField)
//                                      {
//                                        echo $name . ":" . $formField->getError() ."<br />";
//                                      }
                              ?>
                                <div class="wrap">
                                  <?php echo $form1['passenger_type_id']->renderLabel(); ?>
                                  <?php echo $form1['passenger_type_id']->render(); ?>
                                  <?php echo $form1['passenger_type_id']->renderError(); ?>
                                  <?php //echo $form1['_csrf_token'] ?>
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
                                  <?php echo $form1['illness']->renderLabel(); ?>
                                  <?php echo $form1['illness']->render(); ?>
                                  <?php echo $form1['illness']->renderError(); ?>
                                </div>
                                 <div class="wrap">
                                  <?php echo $form1['passenger_illness_category_id']->renderLabel(); ?>
                                  <?php echo $form1['passenger_illness_category_id']->render(); ?>
                                  <?php echo $form1['passenger_illness_category_id']->renderError(); ?>
                                </div>
                                 <div class="wrap">
                                  <?php echo $form1['language_spoken']->renderLabel(); ?>
                                  <?php echo $form1['language_spoken']->render(); ?>
                                  <?php echo $form1['language_spoken']->renderError(); ?>
                                </div>
                                 <div class="wrap">
                                  <?php echo $form1['best_contact_method']->renderLabel(); ?>
                                  <?php echo $form1['best_contact_method']->render(); ?>
                                  <?php echo $form1['best_contact_method']->renderError(); ?>
                                </div>
                                  <div class="wrap">
                                  <?php echo $form1['financial']->renderLabel(); ?>
                                  <?php echo $form1['financial']->render(); ?>
                                  <?php echo $form1['financial']->renderError(); ?>
                                </div>
                                  <div class="wrap">
                                  <?php echo $form1['public_considerations']->renderLabel(); ?>
                                  <?php echo $form1['public_considerations']->render(); ?>
                                  <?php echo $form1['public_considerations']->renderError(); ?>
                                </div>
                                  <div class="wrap">
                                  <?php echo $form1['private_considerations']->renderLabel(); ?>
                                  <?php echo $form1['private_considerations']->render(); ?>
                                  <?php echo $form1['private_considerations']->renderError(); ?>
                                </div>
                                 <div class="form-submit">
                                 <a href="#" onclick="$('#form1').submit();return false;" class="btn-action"><span>Save and Continue >></span><strong>&nbsp;</strong></a>
                                  <a href="<?php echo url_for($referer) ?>" class="cancel">Cancel</a>
                                 </div>
                            </div>
                          </fieldset>
                    </form>
                  </div>
            </div>
            <div class="step" style="display:none;" id="step2">
                 <div class="passenger-form">
                   <form id="form2" action="" method="post">
                    <input type="hidden" name="id" value="<?php echo $passenger->getId() ?>" />
                      <input type="hidden" name="back" value="<?php echo $back ?>" />
                      <input type="hidden" id="camp_id" name="camp_id" value="<?php echo $camp_id?>"/>
                      <input type="hidden" name="referer" value="<?php echo $referer ?>" />
                      <input type="hidden" id="unique_key" name="unique_key" value="<?php echo $key?>" />
                      <?php if(isset($f_back)): ?>
                      <input type="hidden" name="f_back" value="<?php echo $f_back ?>" />
                      <?php endif;?>
                        <fieldset>
                          <div class="box">
                                  <div class="wrap">
                                        <?php echo $form2['ground_transportation_comment']->renderLabel(); ?>
                                        <?php echo $form2['ground_transportation_comment']->render(); ?>
                                        <?php echo $form2['ground_transportation_comment']->renderError(); ?>
                                        <?php //echo $form2['_csrf_token'] ?>
                                  </div>
                                   <div class="wrap">
                                        <?php echo $form2['travel_history_notes']->renderLabel(); ?>
                                        <?php echo $form2['travel_history_notes']->render(); ?>
                                        <?php echo $form2['travel_history_notes']->renderError(); ?>
                                  </div>
                                   <div class="innerbox">
                                          <h3 align="center">Treating Physician</h3>
                                      <div class="wrap">
                                        <?php echo $form2['treating_physician']->renderLabel(); ?>
                                        <?php echo $form2['treating_physician']->render(); ?>
                                        <?php echo $form2['treating_physician']->renderError(); ?>
                                      </div>
                                      <div class="wrap">
                                            <?php echo $form2['treating_phone']->renderLabel(); ?>
                                            <?php echo $form2['treating_phone']->render(); ?>
                                            <?php echo $form2['treating_phone']->renderError(); ?>
                                      </div>
                                      <div class="wrap">
                                            <?php echo $form2['treating_fax1']->renderLabel(); ?>
                                            <?php echo $form2['treating_fax1']->render(); ?>
                                            <?php echo $form2['treating_fax1']->renderError(); ?>
                                      </div>
                                      <div class="wrap">
                                            <?php echo $form2['treating_fax1_comment']->renderLabel(); ?>
                                            <?php echo $form2['treating_fax1_comment']->render(); ?>
                                            <?php echo $form2['treating_fax1_comment']->renderError(); ?>
                                      </div>
                                      <div class="wrap">
                                            <?php echo $form2['treating_email']->renderLabel(); ?>
                                            <?php echo $form2['treating_email']->render(); ?>
                                            <?php echo $form2['treating_email']->renderError(); ?>
                                      </div>
                                    </div>
                              </div>
                              <div class="box alt2">
                               <div class="innerbox" style="margin-top:-160px">
                                       <h3 align="center">Releasing Physician</h3>
                                       <div class="wrap">
                                        <?php echo $form2['releasing_physician']->renderLabel(); ?>
                                        <?php echo $form2['releasing_physician']->render(); ?>
                                        <?php echo $form2['releasing_physician']->renderError(); ?>
                                      </div>
                                      <div class="wrap">
                                        <?php echo $form2['releasing_phone']->renderLabel(); ?>
                                        <?php echo $form2['releasing_phone']->render(); ?>
                                        <?php echo $form2['releasing_phone']->renderError(); ?>
                                     </div>
                                      <div class="wrap">
                                        <?php echo $form2['releasing_fax1']->renderLabel(); ?>
                                        <?php echo $form2['releasing_fax1']->render(); ?>
                                        <?php echo $form2['releasing_fax1']->renderError(); ?>
                                      </div>
                                      <div class="wrap">
                                            <?php echo $form2['releasing_fax1_comment']->renderLabel(); ?>
                                            <?php echo $form2['releasing_fax1_comment']->render(); ?>
                                            <?php echo $form2['releasing_fax1_comment']->renderError(); ?>
                                      </div>
                                      <div class="wrap">
                                            <?php echo $form2['releasing_email']->renderLabel(); ?>
                                            <?php echo $form2['releasing_email']->render(); ?>
                                            <?php echo $form2['releasing_email']->renderError(); ?>
                                      </div>
                                         <div class="wrap">
                                        <?php echo $form2['need_medical_release']->renderLabel(); ?>
                                        <?php echo $form2['need_medical_release']->render(); ?>
                                        <?php echo $form2['need_medical_release']->renderError(); ?>
                                      </div>
                                      <div class="wrap">
                                            <?php echo $form2['medical_release_requested']->renderLabel(); ?>
                                            <?php echo $form2['medical_release_requested']->render(); ?>
                                            <?php echo $form2['medical_release_requested']->renderError(); ?>
                                      </div>
                                      <div class="wrap">
                                            <?php echo $form2['medical_release_received']->renderLabel(); ?>
                                            <?php echo $form2['medical_release_received']->render(); ?>
                                            <?php echo $form2['medical_release_received']->renderError(); ?>
                                      </div>
                                    </div>
                                    <div class="form-submit2" style="margin-top:10px">
                                        <a href="<?php echo url_for($referer) ?>" class="cancel" style="float:left;">Cancel</a>
                                        <a href="#" onclick="$('#form2').submit();return false;" class="btn-action"><span>Save and Continue >></span><strong>&nbsp;</strong></a>
                                    </div>
                                </div>
                        </fieldset>
                        <br/>
                  </form>
                </div>
           </div>
           <div class="step" style="display:none;" id="step3">
                <div class="passenger-form">
                      <form id="form3" action="" method="post">
                      <input type="hidden" name="id" value="<?php echo $passenger->getId() ?>" />
                      <input type="hidden" name="back" value="<?php echo $back ?>" />
                      <input type="hidden" id="camp_id" name="camp_id" value="<?php echo $camp_id?>"/>
                      <input type="hidden" name="referer" value="<?php echo $referer ?>" />
                      <input type="hidden" id="unique_key" name="unique_key" value="<?php echo $key?>" />
                      <?php if(isset($f_back)): ?><input type="hidden" name="f_back" value="<?php echo $f_back ?>" /><?php endif;?>
                          <fieldset>
                          <div class="box">
                            <div class="innerbox">
                                       <h3 align="center">Destination Lodging</h3>
                                        <div class="wrap">
                                              <?php echo $form3['lodging_name']->renderLabel(); ?>
                                              <?php echo $form3['lodging_name']->render(); ?>
                                              <?php echo $form3['lodging_name']->renderError(); ?>
                                              <?php //echo $form3['_csrf_token'] ?>
                                        </div>
                                        <div class="wrap">
                                                <?php echo $form3['lodging_phone']->renderLabel(); ?>
                                                <?php echo $form3['lodging_phone']->render(); ?>
                                                <?php echo $form3['lodging_phone']->renderError(); ?>
                                        </div>
                                        <div class="wrap">
                                                <?php echo $form3['lodging_phone_comment']->renderLabel(); ?>
                                                <?php echo $form3['lodging_phone_comment']->render(); ?>
                                                <?php echo $form3['lodging_phone_comment']->renderError(); ?>
                                        </div>
                                  </div>
                          </div>
                          <div class="box alt">
                              <div class="innerbox">
                                       <h3 align="center">Destination Facility</h3>
                                        <div class="wrap">
                                              <?php echo $form3['facility_name']->renderLabel(); ?>
                                              <?php echo $form3['facility_name']->render(); ?>
                                              <?php echo $form3['facility_name']->renderError(); ?>
                                      </div>
                                      <div class="wrap">
                                              <?php echo $form3['facility_phone']->renderLabel(); ?>
                                              <?php echo $form3['facility_phone']->render(); ?>
                                              <?php echo $form3['facility_phone']->renderError(); ?>
                                      </div>
                                      <div class="wrap">
                                              <?php echo $form3['facility_phone_comment']->renderLabel(); ?>
                                              <?php echo $form3['facility_phone_comment']->render(); ?>
                                              <?php echo $form3['facility_phone_comment']->renderError(); ?>
                                      </div>
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
                              <div class="wrap">
                                      <?php echo $form3['requester_id']->renderLabel(); ?>
                                      <?php echo $form3['requester_id']->render(); ?>
                                      <?php echo $form3['requester_id']->renderError(); ?>
                              </div>
                              <div class="wrap">
                                      <?php echo $form3['emergency_contact_name']->renderLabel(); ?>
                                      <?php echo $form3['emergency_contact_name']->render(); ?>
                                      <?php echo $form3['emergency_contact_name']->renderError(); ?>
                              </div>
                              <div class="wrap">
                                      <?php echo $form3['emergency_contact_primary_phone']->renderLabel(); ?>
                                      <?php echo $form3['emergency_contact_primary_phone']->render(); ?>
                                      <?php echo $form3['emergency_contact_primary_phone']->renderError(); ?>
                              </div>
                              <div class="wrap">
                                      <?php echo $form3['emergency_contact_primary_comment']->renderLabel(); ?>
                                      <?php echo $form3['emergency_contact_primary_comment']->render(); ?>
                                      <?php echo $form3['emergency_contact_primary_comment']->renderError(); ?>
                              </div>
                              <div class="wrap">
                                      <?php echo $form3['emergency_contact_secondary_phone']->renderLabel(); ?>
                                      <?php echo $form3['emergency_contact_secondary_phone']->render(); ?>
                                      <?php echo $form3['emergency_contact_secondary_phone']->renderError(); ?>
                              </div>
                              <div class="wrap">
                                      <?php echo $form3['emergency_contact_secondary_comment']->renderLabel(); ?>
                                      <?php echo $form3['emergency_contact_secondary_comment']->render(); ?>
                                      <?php echo $form3['emergency_contact_secondary_comment']->renderError(); ?>
                              </div>
                               <div class="form-submit">
                                  <a href="#" onclick="$('#form3').submit();return false;" class="btn-action"><span>Save</span><strong>&nbsp;</strong></a>
                                  <a href="<?php echo url_for($referer) ?>" class="cancel">Cancel</a>
                               </div>
                              </div>
                          </fieldset>
                       </form>
                </div>
           </div>
    </div>
 </div>

 <?php
 $domain = $_SERVER['HTTP_HOST'];
 $url = "http://" . $domain . $_SERVER['REQUEST_URI'];

 if (strlen(strstr($url,'frontend'))>0) {
   $url_c = 'dev';
 }else{
   $url_c = 'online';
 }
 ?>
 <?php if($url_c == 'dev'):?>
  <input type="hidden" id="s11" value="http://af.com/frontend_dev.php/passenger/step1"/>
  <input type="hidden" id="s22" value="http://af.com/frontend_dev.php/passenger/step2"/>
  <input type="hidden" id="s33" value="http://af.com/frontend_dev.php/passenger/step3"/>
<?php else:?>
  <input type="hidden" id="s1" value="http://http://www.angelflightwest.org/passenger/step1"/>
  <input type="hidden" id="s2" value="http://http://www.angelflightwest.org/passenger/step2"/>
  <input type="hidden" id="s3" value="http://http://www.angelflightwest.org/passenger/step3"/>
<?php endif;?>
  <script type="text/javascript">
  //<![CDATA[
  $(document).ready(function() {
    $('.first').click(function() { return false; });
    $('.second').click(function() { return false; });
    $('.fifth').click(function() { return true; });

    $(function() {
      $("#pass1_date_of_birth").datepicker();
    });
  });

    function goToStep1(){
      $('#step1').show();
      $('#step2, #step3').hide();
    //  location.href = document.getElementById('s1').value;
    }
    function goToStep2(){
      $('#step2').show();
      $('#step1, #step3').hide();
    //  location.href = document.getElementById('s2').value;
    }
  function goToStep3(){
    $('#step3').show();
    $('#step1, #step2').hide();
    $('#step1, #step2').hide();
    //    location.href = document.getElementById('s3').value;
  }
  //  ]]>
  </script>