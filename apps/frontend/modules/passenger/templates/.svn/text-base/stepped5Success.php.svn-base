<?php use_stylesheets_for_form($form);?>
<?php use_javascripts_for_form($form);?>

<script type="text/javascript">
function validateStep1() {
  new Ajax.Request('passenger/stepped5', {
    parameters: $('#form1').serialize();
  });
}
function validateStep2() {
  new Ajax.Request('passenger/step5_2', {
    parameters: $('#form2').serialize();
  });
}
function validateStep3() {
  new Ajax.Request('passenger/step5_3', {
    parameters: $('#form3').serialize();
  });
}
function validateStep4() {
  new Ajax.Request('passenger/step5_4', {
    parameters: $('#form4').serialize();
  });
}
function validateStep5() {
  new Ajax.Request('passenger/step5_5', {
    parameters: $('#form5').serialize();
  });
}
</script>
<h2><?php echo $sub_title?></h2> 
<!--Errors-->
                      <?php if (isset($error_msg)){?>
                          <span style="color:red;"><?php echo $error_msg?></span>
                      <?php }?>
                      
                          <?php 
    if($sf_context->getActionName() == 'stepped5'){
      $class1= 'first-active';
      $class2= '';
      $class3= '';
      $class4= '';
      $class5= '';
      $form_display_1 = 'block';
      $form_display_2 = 'none';
      $form_display_3 = 'none';
      $form_display_4 = 'none';
      $form_display_5 = 'none';
      $form_use = $form;
    }elseif($sf_context->getActionName() == 'step5_2'){
      $class1= 'first-checked';
      $class2= 'active';
      $class3= '';
      $class3= '';
      $class3= '';
      $form_display_1= 'none';
      $form_display_2= 'block';
      $form_display_3= 'none';
      $form_display_4= 'none';
      $form_display_5= 'none';
      $form_use = $form;
    }elseif($sf_context->getActionName() == 'step5_3'){
      $class1= 'first-checked';
      $class2= 'checked';
      $class3= 'active';
      $class4= '';
      $class5= '';
      $form_display_1 = 'none';
      $form_display_2 = 'none';
      $form_display_3 = 'block';
      $form_display_4 = 'none';
      $form_display_5 = 'none';
      $form_use = $form;
    }elseif($sf_context->getActionName() == 'step5_4'){
      $class1= 'first-checked';
      $class2= 'checked';
      $class3= 'checked';
      $class4= 'last-active';
      $class5= '';
      $form_display_1 = 'none';
      $form_display_2 = 'none';
      $form_display_3 = 'none';
      $form_display_4 = 'block';
      $form_display_5 = 'none';
      $form_use = $form;
    }elseif($sf_context->getActionName() == 'step5_5'){
      $class1= 'first-checked';
      $class2= 'checked';
      $class3= 'checked';
      $class4= 'last-active';
      $class5= 'last-active';
      $form_display_1 = 'none';
      $form_display_2 = 'none';
      $form_display_3 = 'none';
      $form_display_4 = 'none';
      $form_display_5 = 'block';
      $form_use = $form;
    }
    ?>
    
<div class="steps-area>">
    <div class="step-list">
              <ul>
                    <li class="<?php echo $class1?>" style="display:list-item;" id="li_step1">
                    <a href="#" class="first"><strong>Step 1</strong><span class="right-c"></span></a>
                    </li>
                    <li class="<?php echo $class2?>" style="display:list-item;" id="li_step2">
                    <a href="#" class="second">Step 2</a>
                    </li>
                    <li class="<?php echo $class3?>" style="display:list-item;" id="li_step3">
                    <a href="#" class="third">Step 3</a>
                    </li>
                    <li class="<?php echo $class4?>" style="display:list-item;" id="li_step4">
                    <a href="#" class="fifth">Step 4</a>
                    </li>
                    <li class="<?php echo $class5?>" style="display:list-item;" id="li_step5">
                    <a href="#" class="fifth">Step 5</a>
                    </li>
              </ul>
              <strong class="complete">All steps complete</strong>
    </div>
                    <?php if (isset($error_msg)){?>
                      <span style="color:red;"><?php echo $error_msg?></span>
                    <?php }?>
                    <?php foreach ($form_use->getGlobalErrors() as $name => $error): ?> 
	                      <li><?php echo $name.': '.$error ?></li>
	                 <?php endforeach; ?>
    <div class="steps-holder">  
            <div class="step" style="display:<?php echo $form_display_1?>;" id="step1">
             <div class="passenger-form">
             <?php if($sf_context->getActionName() == 'stepped5'):?>
              <form id="form1" action="" method="post">
                   <?php echo $form_use['_csrf_token'] ?>
                   <fieldset>
                    <div class="box">
                       <div class="wrap">
                        <?php echo $form_use['title']->renderLabel()?>
                        <?php echo $form_use['title']->renderError(); ?>
                        <?php echo $form_use['title']->render(); ?>
                      </div>
                      <div class="wrap">
                        <?php echo $form_use['first_name']->renderLabel(); ?>
                        <?php echo $form_use['first_name']->renderError(); ?>
                        <?php echo $form_use['first_name']->render(); ?>
                      </div>
                      <div class="wrap">
                        <?php echo $form_use['middle_name']->renderLabel(); ?>
                        <?php echo $form_use['middle_name']->renderError(); ?>
                        <?php echo $form_use['middle_name']->render(); ?>
                      </div>
                      <div class="wrap">
                        <?php echo $form_use['last_name']->renderLabel(); ?>
                        <?php echo $form_use['last_name']->renderError(); ?>
                        <?php echo $form_use['last_name']->render(); ?>
                      </div>
                      <div class="wrap">
                        <?php echo $form_use['suffix']->renderLabel(); ?>
                        <?php echo $form_use['suffix']->renderError(); ?>
                        <?php echo $form_use['suffix']->render(); ?>
                      </div>
                      <div class="wrap">
                        <?php echo $form_use['nickname']->renderLabel(); ?>
                        <?php echo $form_use['nickname']->renderError(); ?>
                        <?php echo $form_use['nickname']->render(); ?>
                      </div>
                      <div class="wrap">
                        <?php echo $form_use['gender']->renderLabel(); ?>
                        <?php echo $form_use['gender']->renderError(); ?>
                        <?php echo $form_use['gender']->render(); ?>
                      </div>
                      <div class="wrap">
                        <?php echo $form_use['address1']->renderLabel(); ?>
                        <div class="wrap">
                          <?php echo $form_use['address1']->renderError(); ?>
                          <?php echo $form_use['address1']->render(); ?>
                          <?php echo $form_use['address2']->renderError(); ?>
                          <?php echo $form_use['address2']->render(); ?>
                        </div>
                      </div>
                      <div class="wrap">
                        <?php echo $form_use['city']->renderLabel(); ?>
                        <?php echo $form_use['city']->renderError(); ?>
                        <?php echo $form_use['city']->render(); ?>
                      </div>
                      <div class="wrap">
                        <?php echo $form_use['county']->renderLabel(); ?>
                        <?php echo $form_use['county']->renderError(); ?>
                        <?php echo $form_use['county']->render(); ?>
                      </div>
                      <div class="wrap">
                        <?php echo $form_use['state']->renderLabel(); ?>
                        <?php echo $form_use['state']->renderError(); ?>
                        <?php echo $form_use['state']->render(); ?>
                      </div>
                      <div class="wrap">
                        <?php echo $form_use['zipcode']->renderLabel(); ?>
                        <?php echo $form_use['zipcode']->renderError(); ?>
                        <?php echo $form_use['zipcode']->render(); ?>
                      </div>
                      <div class="wrap">
                        <?php echo $form_use['country']->renderLabel(); ?>
                        <?php echo $form_use['country']->renderError(); ?>
                        <?php echo $form_use['country']->render(); ?>
                      </div>
                    </div>
                    
                    <div class="box alt">
                      <div class="passenger-form-heading">
                        <strong>Phone Number</strong>
                        <strong>Comment</strong>
                      </div>
                      <div class="wrap">
                        <?php echo $form_use['day_phone']->renderLabel(); ?>
                        <?php echo $form_use['day_phone']->renderError(); ?>
                        <?php echo $form_use['day_phone']->render(); ?>
                        <?php echo $form_use['day_comment']->renderError(); ?>
                        <?php echo $form_use['day_comment']->render(); ?>
                      </div>
                      <div class="wrap">
                				<?php echo $form_use['evening_phone']->renderLabel(); ?>
                        <?php echo $form_use['evening_phone']->renderError(); ?>
                				<?php echo $form_use['evening_phone']->render(); ?>
                        <?php echo $form_use['evening_comment']->renderError(); ?>
                				<?php echo $form_use['evening_comment']->render(); ?>
                      </div>
                      <div class="wrap">
                        <?php echo $form_use['mobile_phone']->renderLabel(); ?>
                        <?php echo $form_use['mobile_phone']->renderError(); ?>
                        <?php echo $form_use['mobile_phone']->render(); ?>
                        <?php echo $form_use['mobile_comment']->renderError(); ?>
                        <?php echo $form_use['mobile_comment']->render(); ?>
                      </div>
                      <div class="wrap">
                        <?php echo $form_use['pager_phone']->renderLabel(); ?>
                        <?php echo $form_use['pager_phone']->renderError(); ?>
                        <?php echo $form_use['pager_phone']->render(); ?>
                        <?php echo $form_use['pager_comment']->renderError(); ?>
                        <?php echo $form_use['pager_comment']->render(); ?>
                      </div>
                      <div class="wrap">
              					<?php echo $form_use['pager_email']->renderLabel(); ?>
                        <?php echo $form_use['pager_email']->renderError(); ?>
              					<?php echo $form_use['pager_email']->render(); ?>
                      </div>
                      <div class="wrap">
                        <?php echo $form_use['other_phone']->renderLabel(); ?>
                        <?php echo $form_use['other_phone']->renderError(); ?>
                        <?php echo $form_use['other_phone']->render(); ?>
                        <?php echo $form_use['other_comment']->renderError(); ?>
                        <?php echo $form_use['other_comment']->render(); ?>
                      </div>
                      <div class="wrap">
                        <?php echo $form_use['fax_phone1']->renderLabel(); ?>
                        <div class="wrap">
                          <div class="wrap">
                            <?php echo $form_use['fax_phone1']->renderError(); ?>
                            <?php echo $form_use['fax_phone1']->render(); ?>
                            <?php echo $form_use['fax_comment1']->renderError(); ?>
                            <?php echo $form_use['fax_comment1']->render(); ?>
                          </div>
                          <div class="fax-choice">
                            <?php echo $form_use['auto_fax']->renderError(); ?>
                            <?php echo $form_use['auto_fax']->render(); ?>
                            <?php echo $form_use['auto_fax']->renderLabel(); ?>
                          </div>
                        </div>
                      </div>
                      <div class="wrap">
                        <?php echo $form_use['fax_phone2']->renderLabel(); ?>
                        <?php echo $form_use['fax_phone2']->render(); ?>
                        <?php echo $form_use['fax_phone2']->renderError(); ?>
                        <?php echo $form_use['fax_comment2']->render(); ?>
                        <?php echo $form_use['fax_comment2']->renderError(); ?>
                      </div>
                    </div>
                    
                    <div class="box full">
                      <div class="wrap">
                        <?php echo $form_use['block_mailings']->renderLabel(); ?>
                        <?php echo $form_use['block_mailings']->renderError(); ?>
                        <?php echo $form_use['block_mailings']->render(); ?>
                        <label class="raw" for="<?php echo $form_use->getName().'_block_mailings'?>">Yes</label>
                      </div>
                      <div class="wrap">
                        <?php echo $form_use['newsletter']->renderLabel(); ?>
                        <?php echo $form_use['newsletter']->renderError(); ?>
                        <?php echo $form_use['newsletter']->render(); ?>
                        <label class="raw" for="<?php echo $form_use->getName().'_newsletter'?>">Yes</label>
                      </div>
                      <div class="wrap">
                        <?php echo $form_use['email']->renderLabel(); ?>
                        <?php echo $form_use['email']->renderError(); ?>
                        <?php echo $form_use['email']->render(); ?>
                      </div>
                      <div class="wrap">
                        <?php echo $form_use['secondary_email']->renderLabel(); ?>
                        <?php echo $form_use['secondary_email']->renderError(); ?>
                        <?php echo $form_use['secondary_email']->render(); ?>
                      </div>
                      <div class="wrap">
                        <?php echo $form_use['email_blocked']->renderLabel(); ?>
                        <?php echo $form_use['email_blocked']->renderError(); ?>
                        <?php echo $form_use['email_blocked']->render(); ?>
                        <label class="raw" for="<?php echo $form_use->getName().'_email_blocked'?>">Yes</label>
                      </div>
                      <div class="wrap">
                        <?php echo $form_use['email_text_only']->renderLabel(); ?>
                        <?php echo $form_use['email_text_only']->renderError(); ?>
                        <?php echo $form_use['email_text_only']->render(); ?>
                        <label class="raw" for="<?php echo $form_use->getName().'_email_text_only'?>">Yes</label>
                      </div>
                      <div class="wrap">
                        <?php echo $form_use['comment']->renderLabel(); ?>
                        <?php echo $form_use['comment']->renderError(); ?>
                        <?php echo $form_use['comment']->render(); ?>
                      </div>
                      <div class="wrap">
                        <?php echo $form_use['veteran']->renderLabel(); ?>
                        <?php echo $form_use['veteran']->renderError(); ?>
                        <?php echo $form_use['veteran']->render(); ?>
                        <label class="raw" for="<?php echo $form_use->getName().'_veteran'?>">Yes</label>
                      </div>
                      <div class="wrap">
                        <div class="wrap">
                        <?php echo $form_use['deceased']->renderLabel(); ?>
                        <?php echo $form_use['deceased']->renderError(); ?>
                        <?php echo $form_use['deceased']->render(); ?>
                        <label class="raw" for="<?php echo $form_use->getName().'_deceased'?>">Yes</label>
                          <span class="deceased">
                            <?php echo $form_use['deceased_date']->renderLabel(); ?>
                            <?php echo $form_use['deceased_date']->renderError(); ?>
                            <?php echo $form_use['deceased_date']->render(); ?>
                          </span>
                        </div>
                      </div>
                      <div class="wrap">
                        <?php echo $form_use['deceased_comment']->renderLabel(); ?>
                        <?php echo $form_use['deceased_comment']->renderError(); ?>
                        <?php echo $form_use['deceased_comment']->render(); ?>
                      </div>
                      <div class="form-submit">
                        <a href="validateStep1()" onclick="$('#form1').submit();return false;" class="btn-action"><span>Save and Continue >></span><strong>&nbsp;</strong></a>
                        <a class="cancel" href="<?php echo url_for('passenger/index')?>">Cancel</a>
                      </div>
                    </div>
                  </fieldset>
                  </form>
                   <?php endif;?>
                  </div>   
            </div>
            <div class="step" style="display:<?php echo $form_display_2?>;" id="step2">
                 <div class="passenger-form">
                 <?php if($sf_context->getActionName() == 'step5_2'):?>  
                 <form id="form2" action="" method="post">
                     <?php echo $form_use['_csrf_token'] ?>
                        <fieldset>
                          <div class="box">
                                <div class="wrap">
                                        <?php echo $form['passenger_type_id']->renderLabel(); ?>
                                        <?php echo $form['passenger_type_id']->renderError(); ?>
                                        <?php echo $form['passenger_type_id']->render(); ?>
                                </div>
                                 <div class="wrap">
                                        <?php echo $form['parent']->renderLabel(); ?>
                                        <?php echo $form['parent']->renderError(); ?>
                                        <?php echo $form['parent']->render(); ?>
                                </div>
                                 <div class="wrap">
                                        <?php echo $form['date_of_birth']->renderLabel(); ?>
                                        <?php echo $form['date_of_birth']->renderError(); ?>
                                        <?php echo $form['date_of_birth']->render(); ?>
                                </div>
                                 <div class="wrap">
                                        <?php echo $form['illness']->renderLabel(); ?>
                                        <?php echo $form['illness']->renderError(); ?>
                                        <?php echo $form['illness']->render(); ?>
                                </div>
                                 <div class="wrap">
                                        <?php echo $form['passenger_illness_category_id']->renderLabel(); ?>
                                        <?php echo $form['passenger_illness_category_id']->renderError(); ?>
                                        <?php echo $form['passenger_illness_category_id']->render(); ?>
                                </div>
                                 <div class="wrap">
                                        <?php echo $form['language_spoken']->renderLabel(); ?>
                                        <?php echo $form['language_spoken']->renderError(); ?>
                                        <?php echo $form['language_spoken']->render(); ?>
                                </div>
                                 <div class="wrap">
                                        <?php echo $form['best_contact_method']->renderLabel(); ?>
                                        <?php echo $form['best_contact_method']->renderError(); ?>
                                        <?php echo $form['best_contact_method']->render(); ?>
                                </div>
                                 <div class="wrap">
                                        <?php echo $form['financial']->renderLabel(); ?>
                                        <?php echo $form['financial']->renderError(); ?>
                                        <?php echo $form['financial']->render(); ?>
                                </div>
                                 <div class="wrap">
                                        <?php echo $form['public_considerations']->renderLabel(); ?>
                                        <?php echo $form['public_considerations']->renderError(); ?>
                                        <?php echo $form['public_considerations']->render(); ?>
                                </div>
                                 <div class="wrap">
                                        <?php echo $form['private_considerations']->renderLabel(); ?>
                                        <?php echo $form['private_considerations']->renderError(); ?>
                                        <?php echo $form['private_considerations']->render(); ?>
                                </div>
                                <div class="form-submit">
                                  <a href="validateStep2()" onclick="$('#form2').submit();return false;" class="btn-action"><span>Save and Continue >></span><strong>&nbsp;</strong></a>
                                  <a class="cancel" href="<?php echo url_for('passenger/index')?>">Cancel</a>
                                </div>
                          </div>
                        </fieldset>
                  </form>
                  <?php endif;?>
                </div>
           </div>
           <div class="step" style="display:<?php echo $form_display_3?>;" id="step3">
                <div class="passenger-form">
                     <?php if($sf_context->getActionName() == 'step5_3'):?>  
                      <form id="form3" action="" method="post">
                              <?php echo $form_use['_csrf_token'] ?>
                          <fieldset>
                            <div class="box">
                              <div class="wrap">
                                        <?php echo $form['releasing_physician']->renderLabel(); ?>
                                        <?php echo $form['releasing_physician']->renderError(); ?>
                                        <?php echo $form['releasing_physician']->render(); ?>
                              </div>
                               <div class="wrap">
                                        <?php echo $form['releasing_phone']->renderLabel(); ?>
                                        <?php echo $form['releasing_phone']->renderError(); ?>
                                        <?php echo $form['releasing_phone']->render(); ?>
                              </div>
                               <div class="wrap">
                                        <?php echo $form['releasing_fax1']->renderLabel(); ?>
                                        <?php echo $form['releasing_fax1']->renderError(); ?>
                                        <?php echo $form['releasing_fax1']->render(); ?>
                              </div>
                               <div class="wrap">
                                        <?php echo $form['releasing_fax1_comment']->renderLabel(); ?>
                                        <?php echo $form['releasing_fax1_comment']->renderError(); ?>
                                        <?php echo $form['releasing_fax1_comment']->render(); ?>
                              </div>
                               <div class="wrap">
                                        <?php echo $form['releasing_email']->renderLabel(); ?>
                                        <?php echo $form['releasing_email']->renderError(); ?>
                                        <?php echo $form['releasing_email']->render(); ?>
                              </div>
                               <div class="wrap">
                                        <?php echo $form['medical_release_requested']->renderLabel(); ?>
                                        <?php echo $form['medical_release_requested']->renderError(); ?>
                                        <?php echo $form['medical_release_requested']->render(); ?>
                              </div>
                               <div class="wrap">
                                        <?php echo $form['medical_release_received']->renderLabel(); ?>
                                        <?php echo $form['medical_release_received']->renderError(); ?>
                                        <?php echo $form['medical_release_received']->render(); ?>
                              </div>
                               <div class="wrap">
                                        <?php echo $form['treating_physician']->renderLabel(); ?>
                                        <?php echo $form['treating_physician']->renderError(); ?>
                                        <?php echo $form['treating_physician']->render(); ?>
                              </div>
                               <div class="wrap">
                                        <?php echo $form['treating_phone']->renderLabel(); ?>
                                        <?php echo $form['treating_phone']->renderError(); ?>
                                        <?php echo $form['treating_phone']->render(); ?>
                              </div>
                               <div class="form-submit">
                                  <a href="validateStep3()" onclick="$('#form3').submit();return false;" class="btn-action"><span>Save and Continue >></span><strong>&nbsp;</strong></a>
                                  <a class="cancel" href="<?php echo url_for('passenger/index')?>">Cancel</a>
                               </div>
                            </div>
                          </fieldset>
                       </form>
                  <?php endif;?>
                </div>
           </div>
           <div class="step" style="display:<?php echo $form_display_4?>;" id="step4">
                <div class="passenger-form">
                    <?php if($sf_context->getActionName() == 'step5_4'):?>  
                      <form id="form4" action="" method="post">
                          <fieldset>
                              <?php echo $form_use?>
                              <?php echo $form_use['_csrf_token'] ?>
                          </fieldset>
                          <br/>
                          <a href="<?php echo url_for('passenger/index') ?>">Cancel</a>
                          <input type="submit" id="submit4" onclick="validateStep4()" value="Save and Continue >"/>
                       </form>
                  <?php endif;?>
                </div>
           </div>
           <div class="step" style="display:<?php echo $form_display_5?>;" id="step5">
                <div class="passenger-form">
                    <?php if($sf_context->getActionName() == 'step5_5'):?>  
                      <form id="form5" action="" method="post">
                          <table>
                              <?php echo $form_use?>
                              <?php echo $form_use['_csrf_token'] ?>
                          </table>
                          <br/>
                          <a href="<?php echo url_for('passenger/index') ?>">Cancel</a>
                          <input type="submit" id="submit5" onclick="validateStep5()" value="Save and Add >"/>
                       </form>
                   <?php endif;?>
                </div>
           </div>
      </div>
 </div>
  <script type="text/javascript">
  //<![CDATA[
  $(function() {
    $("#pass1_date_of_birth").datepicker();
    $("#pass5_2_date_of_birth").datepicker();
  });
  //]]>
  </script>