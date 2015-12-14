<?php use_stylesheets_for_form($form3);?>
<?php use_javascripts_for_form($form3);?>
<?php use_helper('Javascript', 'Form') ?>
<?php use_helper('jQuery', 'Form') ?>
                     <h3>Add New Passenger</h3>
                      <div class="step-list">
                      <ul>
                            <li class="first-checked" style="display:list-item;" id="s1">
                            <a href="javascript:void(0)" class="first"><strong>Step 1</strong><span class="right-c"></span></a>
                            </li>
                            <li class="checked" style="display:list-item;" id="s2">
                            <a href="javascript:void(0)" class="second" >Step 2</a>
                            </li>
                            <li class="active" style="display:list-item;" id="s3">
                            <a href="javascript:void(0)" class="third" >Step 3</a>
                            </li>
                            <li class="" style="display:list-item;" id="s3">
                            <a href="javascript:void(0)" class="forth" >Step 4</a>
                            </li>
                            <li class="" style="display:list-item;" id="s3">
                            <a href="javascript:void(0)" class="fifth">Step 5</a>
                            </li>
                      </ul>
                       <?php
                     $errors = $form3->getErrorSchema()->getErrors();
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
                        'url'     => 'passenger/update3Ajax',
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
                                              <a href="#" onclick="jQuery('#pass2_form_submit').click(); return false;" class="btn-action"><span>Save and Continue >></span><strong>&nbsp;</strong></a>
                                             <input type="submit" class="hide" id="pass2_form_submit"/>
                                             <a href="<?php echo url_for($referer) ?>" class="cancel">Cancel</a>
                                        </div>
                                  </div>
                            </fieldset>
                            <br/>
                      </form>
                    </div>
              