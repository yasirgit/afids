<?php use_stylesheets_for_form($agency_form);?>
<?php use_javascripts_for_form($agency_form);?>
<?php use_helper('jQuery')?>
<?php if(isset($new_requester_agency_id)):?>
   <script type="text/javascript">       
      jQuery("#agency").val("<?php echo $new_requester_agency_name ?>");
      jQuery("#agency_id").val("<?php echo $new_requester_agency_id ?>");
      var $inputs = jQuery("#requester_agency_form input[type='text']");
      jQuery("#requester_agency_form textarea").val('');
      $inputs.each(function() {
           jQuery(this).val('');
      });
      jQuery("#lightbox-overlay_").click();
   </script>
<?php endif;?>
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
              <a class="cancel" href="javascript:void(0)" onclick="jQuery('#lightbox-overlay_').click();">Cancel</a>
          </div>
      </div>
    </form>
  </div>