<?php use_stylesheets_for_form($form);?>
<?php use_javascripts_for_form($form);?>
<?php use_helper('Javascript', 'Form') ?>
<?php use_helper('jQuery', 'Form') ?>

          <h3>Add New Agency</h3>

        <div id="agency_form">
            <?php 
            echo jq_form_remote_tag(array(
            'update'  => 'agency_form',
            'url'     => 'agency/updateAjax',
            'method'  => 'post',
            //'complete'  => 'jQuery(\'#addagency-popup\').hide()'
            ), array(
            'id'    => 'form',
            'style' => 'display:block;'
            ));
            ?> 
              <div class="passenger-form">
                <fieldset>
                  <div class="box">
                    <div class="wrap">
                      <?php echo $form['name']->renderLabel()?>
                      <?php echo $form['name']->render(); ?>
                      <?php echo $form['name']->renderError(); ?>
                      <?php echo $form['_csrf_token'] ?>
                    </div>
                    <div class="wrap">
                      <?php echo $form['address1']->renderLabel()?>                      
                      <?php echo $form['address1']->render(); ?>
                      <?php echo $form['address1']->renderError(); ?>
                    </div>
                    <div class="wrap">
                      <?php echo $form['address2']->renderLabel()?>
                      <?php echo $form['address2']->render(); ?>
                      <?php echo $form['address2']->renderError(); ?>
                    </div>
                    <div class="wrap">
                      <?php echo $form['city']->renderLabel()?>                      
                      <?php echo $form['city']->render(); ?>
                      <?php echo $form['city']->renderError(); ?>
                    </div>
                    <div class="wrap">
                      <?php echo $form['county']->renderLabel()?>                      
                      <?php echo $form['county']->render(); ?>
                      <?php echo $form['county']->renderError(); ?>
                    </div>
                    <div class="wrap">
                      <?php echo $form['state']->renderLabel()?>                      
                      <?php echo $form['state']->render(); ?>
                      <?php echo $form['state']->renderError(); ?>
                    </div>
                    <div class="wrap">
                      <?php echo $form['country']->renderLabel()?>                      
                      <?php echo $form['country']->render(); ?>
                      <?php echo $form['country']->renderError(); ?>
                    </div>
                    <div class="wrap">
                      <?php echo $form['zipcode']->renderLabel()?>                      
                      <?php echo $form['zipcode']->render(); ?>
                      <?php echo $form['zipcode']->renderError(); ?>
                    </div>
                  </div><!--box-->
                       
                  <div class="box alt">     
                    <div class="wrap">
                      <?php echo $form['phone']->renderLabel()?>                      
                      <?php echo $form['phone']->render(); ?>
                      <?php echo $form['phone']->renderError(); ?>
                    </div>
                    <div class="wrap">
                      <?php echo $form['comment']->renderLabel()?>                      
                      <?php echo $form['comment']->render(); ?>
                      <?php echo $form['comment']->renderError(); ?>
                    </div>
                    <div class="wrap">
                      <?php echo $form['fax_phone']->renderLabel()?>                      
                      <?php echo $form['fax_phone']->render(); ?>
                      <?php echo $form['fax_phone']->renderError(); ?>
                    </div>
                    <div class="wrap">
                      <?php echo $form['fax_comment']->renderLabel()?>                      
                      <?php echo $form['fax_comment']->render(); ?>
                      <?php echo $form['fax_comment']->renderError(); ?>
                    </div>
                    <div class="wrap">
                      <?php echo $form['email']->renderLabel()?>                      
                      <?php echo $form['email']->render(); ?>
                      <?php echo $form['email']->renderError(); ?>
                    </div>
                    <div class="form-submit">
                        <a href="#" onclick="jQuery('#agency_form_submit').click(); return false;" class="btn-action"><span>Save</span><strong>&nbsp;</strong></a>
              <input type="submit" class="hide" id="agency_form_submit"/>
              <input type="hidden" name="backurl" value="<?php echo $backurl?>"/>
              <?php if($is_camp==1){ ?>
              <a href="<?php echo url_for('camp/create') ?>" class="cancel">Cancel</a>
              <?php }else{ ?>
                <a href="<?php echo url_for('requester/create?person_id='.$person_ids)?>" class="cancel">Cancel</a>
              <?php }?>
              </div>
              </div><!--box alt-->
              </fieldset>
              </div><!--passenger form-->
              </form>
              </div><!--agency_form-->


