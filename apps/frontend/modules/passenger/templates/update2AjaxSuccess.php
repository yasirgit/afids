<?php use_stylesheets_for_form($form2);?>
<?php use_javascripts_for_form($form2);?>
<?php use_helper('Javascript', 'Form') ?>
<?php use_helper('jQuery', 'Form') ?>
                     <h3>Add New Passenger</h3>
                      <div class="step-list">
                      <ul>
                            <li class="first-checked" style="display:list-item;" id="s1">
                            <a href="javascript:void(0)" class="first" ><strong>Step 1</strong><span class="right-c"></span></a>
                            </li>
                            <li class="active" style="display:list-item;" id="s2">
                            <a href="javascript:void(0)" class="second" >Step 2</a>
                            </li>
                            <li class="" style="display:list-item;" id="s3">
                            <a href="javascript:void(0)" class="third" >Step 3</a>
                            </li>
                            <li class="" style="display:list-item;" id="s3">
                            <a href="javascript:void(0)" class="forth" >Step 4</a>
                            </li>
                            <li class="" style="display:list-item;" id="s3">
                            <a href="javascript:void(0)" class="fifth">Step 5</a>
                            </li>
                      </ul>
                      </div>
            <div class="passenger-form">
                        <?php 
                        echo jq_form_remote_tag(array(
                        'update'  => 'passenger_form',
                        'url'     => 'passenger/update2Ajax',
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
              