<?php use_stylesheets_for_form($form5);?>
<?php use_javascripts_for_form($form5);?>
<?php use_helper('Javascript', 'Form') ?>
<?php use_helper('jQuery', 'Form') ?>
                     <h3>Add New Passenger</h3>
                      <div class="step-list">
                      <ul>
                            <li class="first-checked" style="display:list-item;" id="s1">
                            <a href="javascript:void(0)" class="first" ><strong>Step 1</strong><span class="right-c"></span></a>
                            </li>
                            <li class="checked" style="display:list-item;" id="s2">
                            <a href="javascript:void(0)" class="second" >Step 2</a>
                            </li>
                            <li class="checked" style="display:list-item;" id="s3">
                            <a href="javascript:void(0)" class="third" >Step 3</a>
                            </li>
                            <li class="checked" style="display:list-item;" id="s3">
                            <a href="javascript:void(0)" class="forth" >Step 4</a>
                            </li>
                            <li class="last-active" style="display:list-item;" id="s3">
                            <a href="javascript:void(0)" class="fifth" >Step 5</a>
                            </li>
                      </ul>
                        <?php
                     $errors = $form5->getErrorSchema()->getErrors();
                     if (count($errors) > 0)
                     {
                       foreach ($errors as $name => $error)
                       {
                         echo $name .':'.$error ;
                       }
                     }
                    ?>
                      </div>
            <div class="passenger-form">
                        <?php 
                        echo jq_form_remote_tag(array(
                        'update'  => 'passenger_form',
                        'url'     => 'passenger/update5Ajax',
                        'method'  => 'post',
                        'loading'  => "jQuery('#loading-lightbox-overlay-image').center();Element.show('loading-lightbox-overlay');",
                        'complete' => "Element.hide('loading-lightbox-overlay');"
                        ), array(
                        'id'    => 'form_passenger1',
                        'style' => 'display:block;'
                        ));
                        ?> 
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
                                             <a class="cancel" href="#" onclick="jQuery('#lightbox-overlay').click();">Cancel</a>
                                        </div>
                              </div>
                            </fieldset>
                            <br/>
                      </form>
                    </div>