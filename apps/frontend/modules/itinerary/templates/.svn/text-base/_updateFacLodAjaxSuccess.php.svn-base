<?php use_stylesheets_for_form($form6);?>
<?php use_javascripts_for_form($form6);?>
<?php use_helper('Javascript', 'Form') ?>
<?php use_helper('jQuery', 'Form') ?>

          <div id="addfacandlod_form">
            <form method="post" action="<?php echo url_for('itinerary/updateFacLodAjax')?>" onsubmit="jQuery.ajax({type:'POST',dataType:'json',data:jQuery(this).serialize(),success:function(data, textStatus){
              if (data.html == true){
                jQuery('#addfacandlod_form').html(data.content);
              } else {
                jQuery('#addfacandlod_form').hide();
                var haha = data.content;
                console.log(haha);
              }
            },
            url:'/itinerary/updateFacLodAjax'}); return false;" style="display: block;" id="form_requester">
            <input type="hidden" name="faclodpassid" id="faclodpassid" value="<?php echo $passid?>"/>
              <h3>Add New Facility and Lodging for <?php echo $passenger->getPerson()->getName();?></h3>
              <div class="passenger-form">
                <div class="box">
                            <div class="innerbox">
                                       <h3 align="center">Destination Lodging</h3>
                                        <div class="wrap">
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
