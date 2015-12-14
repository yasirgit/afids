<?php use_stylesheets_for_form($form4);?>
<?php use_javascripts_for_form($form4);?>
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
                            <li class="checked" style="display:list-item;" id="s3">
                            <a href="javascript:void(0)" class="third" >Step 3</a>
                            </li>
                            <li class="active" style="display:list-item;" id="s3">
                            <a href="javascript:void(0)" class="forth" >Step 4</a>
                            </li>
                            <li class="" style="display:list-item;" id="s3">
                            <a href="javascript:void(0)" class="fifth" >Step 5</a>
                            </li>
                      </ul>
                        <?php
                     $errors = $form4->getErrorSchema()->getErrors();
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
                        'url'     => 'passenger/update4Ajax',
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
                              </div>
                              <div class="box full">
                                <div class="wrap">
                                        <?php echo $form4['facility_city']->renderLabel(); ?>
                                        <?php echo $form4['facility_city']->render(); ?>
                                        <?php echo $form4['facility_city']->renderError(); ?>
                                </div>
                                <div class="wrap">
                                        <?php echo $form4['facility_state']->renderLabel(); ?>
                                        <?php echo $form4['facility_state']->render(); ?>
                                        <?php echo $form4['facility_state']->renderError(); ?>
                                </div>

                                <div class="form-submit2" align="right">
                                              <br/>
                                              <br/>
                                              <a href="#" onclick="jQuery('#pass4_form_submit').click(); return false;" class="btn-action"><span>Save and Continue >></span><strong>&nbsp;</strong></a>
                                             <input type="submit" class="hide" id="pass4_form_submit"/>
                                             <a href="<?php echo url_for($referer) ?>" class="cancel">Cancel</a>
                                        </div>
                                </div>
                            </fieldset>
                            <br/>
                      </form>
                    </div>
              