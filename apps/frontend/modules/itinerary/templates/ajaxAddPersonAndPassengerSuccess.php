<?php
    //@include("/opt/httpd-builtin-5.0.0.1/afids/web/krumo/class.krumo.php");
    //krumo($person_form__);
?>
<?php include_stylesheets_for_form($person_form) ?>
<?php include_javascripts_for_form($person_form) ?>
<?php use_helper('Javascript', 'Form') ?>
<?php use_helper('jQuery', 'Form') ?>
<?php use_helper('jQuery') ?>
<?php if(isset($personpass_id)):?>
   <script type="text/javascript">
      <?php if(isset($action_from)):?>
            <?php if($action_from == 'from_requester'):?>
               jQuery("#person_a_req").val("<?php echo $personpass_last_name?>");
               jQuery("#person_id").val("<?php echo $personpass_id ?>");               
            <?php else:?>
               jQuery("#person_a").val("<?php echo $personpass_last_name?>");
               jQuery("#personpass_id").val("<?php echo $personpass_id ?>");
               jQuery('#campnn_passenger_id').val("<?php echo $_passenger->getId()?>");
            <?php endif;?>

      <?php endif;?>
      jQuery("#person_form select option:selected").removeAttr('selected');
      jQuery("#person_form textarea").val('');
      jQuery("#person_form input:checkbox").removeAttr('checked');
      var $inputs = jQuery("#person_form input[type='text']");
      $inputs.each(function() {
           jQuery(this).val('');
      });            
      jQuery("#lightbox-overlay_").click();
   </script>
<?php endif;?>
<h2><?php echo $person_title ?></h2>
<div class="passenger-form">
<?php
 echo jq_form_remote_tag(array(
	 'update'  => 'addpersonandpassanger_form',
	 'url'     => 'itinerary/ajaxAddPersonAndPassenger',
	 'method'  => 'post',
 	 'loading'  => "jQuery('#loading-lightbox-overlay-image').center();Element.show('loading-lightbox-overlay');",
     'complete' => "Element.hide('loading-lightbox-overlay');"
	 ), array(
 			'id'    => 'person_form',
 			'style' => 'display:block;'
 		)
 	);

 ?>
 <!--form action="" method="post" id="person_form" onsubmit="return personAddPassenger(this)" -->
 <input type="hidden" name="id" value="<?php echo $person->getId() ?>" />
 <input type="hidden" name="referer" value="<?php echo $person_referer ?>" />
 <input type="hidden" id="action_from_passenger_or_requester" name="action_from_passenger_or_requester" value="<?php if(isset($action_from)): echo $action_from;endif;?>" />
 <input type="hidden" name="key" value="<?php echo $key ?>" />
 <input type="hidden" id="personpass_id_ajax" name="personpass_id_ajax" value="<?php if(isset($person_pass_id)) echo $person_pass_id; ?>" />
  <?php echo $person_form['_csrf_token'] ?>
  <?php if (isset($error_msg)){?>
  	 <span style="color: red;"><?php echo $error_msg?></span>
  <?php }?>
<div class="box">
	<div class="wrap">
		<?php echo $person_form['title']->renderLabel()?>
		<?php echo $person_form['title']->render(); ?>
		<?php //echo $person_form['title']->renderError(); ?>
        <?php if(isset($titleError)):?>
          <ul class="error_list">
             <li>Please select person title</li>
          </ul>
       <?php endif;?>
	</div>
	<div class="wrap">
		<?php echo $person_form['first_name']->renderLabel(); ?>
		<?php echo $person_form['first_name']->render(); ?>
		<?php //echo $person_form['first_name']->renderError(); ?>       
       <?php if(isset($first_name_error)):?>
          <ul class="error_list">
             <li>Please give person first name</li>
          </ul>
       <?php endif;?>
	</div>
	<div class="wrap">
		<?php echo $person_form['middle_name']->renderLabel(); ?>
		<?php echo $person_form['middle_name']->render(); ?>
		<?php echo $person_form['middle_name']->renderError(); ?>
	</div>
	<div class="wrap">
		<?php echo $person_form['last_name']->renderLabel(); ?>
		<?php echo $person_form['last_name']->render(); ?>
		<?php //echo $person_form['last_name']->renderError(); ?>
        <?php if(isset($last_name_error)):?>
          <ul class="error_list">
             <li>Please give person last name</li>
          </ul>
       <?php endif;?>
	</div>
	<div class="wrap">
		<?php echo $person_form['suffix']->renderLabel(); ?>
		<?php echo $person_form['suffix']->render(); ?>
		<?php echo $person_form['suffix']->renderError(); ?>
	</div>
	<div class="wrap">
		<?php echo $person_form['nickname']->renderLabel(); ?>
		<?php echo $person_form['nickname']->render(); ?>
		<?php echo $person_form['nickname']->renderError(); ?>
	</div>
	<div class="wrap">
		<?php echo $person_form['gender']->renderLabel(); ?>
		<?php echo $person_form['gender']->render(); ?>
		<?php echo $person_form['gender']->renderError(); ?>
	</div>
	<div class="wrap">
		<?php echo $person_form['address1']->renderLabel(); ?>
		<div class="wrap">
			<?php echo $person_form['address1']->render(); ?>
			<?php echo $person_form['address1']->renderError(); ?>
			<?php echo $person_form['address2']->render(); ?>
			<?php echo $person_form['address2']->renderError(); ?>
		</div>
	</div>
	<div class="wrap">
		<?php echo $person_form['city']->renderLabel(); ?>
		<?php echo $person_form['city']->render(); ?>
		<?php echo $person_form['city']->renderError(); ?>
	</div>
	<div class="wrap">
		<?php echo $person_form['county']->renderLabel(); ?>
		<?php echo $person_form['county']->render(); ?>
		<?php echo $person_form['county']->renderError(); ?>
	</div>
	<div class="wrap">
		<?php echo $person_form['state']->renderLabel(); ?>
		<?php echo $person_form['state']->render(); ?>
		<?php echo $person_form['state']->renderError(); ?>
	</div>
	<div class="wrap">
		<?php echo $person_form['zipcode']->renderLabel(); ?>
		<?php echo $person_form['zipcode']->render(); ?>
		<?php echo $person_form['zipcode']->renderError(); ?>
	</div>
	<div class="wrap">
		<?php echo $person_form['country']->renderLabel(); ?>
		<?php echo $person_form['country']->render(); ?>
		<?php echo $person_form['country']->renderError(); ?>
	</div>
</div>

	<div class="box alt">
		<div class="passenger-form-heading">
			<strong>Phone Number</strong> <strong>Comment</strong>
		</div>
	<div class="wrap">
		<?php echo $person_form['day_phone']->renderLabel(); ?>
		<?php echo $person_form['day_phone']->render(); ?>
		<?php echo $person_form['day_phone']->renderError(); ?>
		<?php echo $person_form['day_comment']->render(); ?>
		<?php echo $person_form['day_comment']->renderError(); ?>
	</div>
	<div class="wrap"><?php echo $person_form['evening_phone']->renderLabel(); ?>
		<?php echo $person_form['evening_phone']->render(); ?>
		<?php echo $person_form['evening_phone']->renderError(); ?>
		<?php echo $person_form['evening_comment']->render(); ?>
		<?php echo $person_form['evening_comment']->renderError(); ?>
	</div>
	<div class="wrap">
		<?php echo $person_form['mobile_phone']->renderLabel(); ?>
		<?php echo $person_form['mobile_phone']->render(); ?>
		<?php echo $person_form['mobile_phone']->renderError(); ?>
		<?php echo $person_form['mobile_comment']->render(); ?>
		<?php echo $person_form['mobile_comment']->renderError(); ?>
	</div>
	<div class="wrap">
		<?php echo $person_form['pager_phone']->renderLabel(); ?>
		<?php echo $person_form['pager_phone']->render(); ?>
		<?php echo $person_form['pager_phone']->renderError(); ?>
		<?php echo $person_form['pager_comment']->render(); ?>
		<?php echo $person_form['pager_comment']->renderError(); ?>
	</div>
	<div class="wrap">
		<?php echo $person_form['pager_email']->renderLabel(); ?>
		<?php echo $person_form['pager_email']->render(); ?>
		<?php echo $person_form['pager_email']->renderError(); ?>
	</div>
	<div class="wrap">
		<?php echo $person_form['other_phone']->renderLabel(); ?>
		<?php echo $person_form['other_phone']->render(); ?>
		<?php echo $person_form['other_phone']->renderError(); ?>
		<?php echo $person_form['other_comment']->render(); ?>
		<?php echo $person_form['other_comment']->renderError(); ?>
	</div>
	<div class="wrap">
		<?php echo $person_form['fax_phone1']->renderLabel(); ?>
		<div class="wrap">
			<div class="wrap">
				<?php echo $person_form['fax_phone1']->render(); ?>
				<?php echo $person_form['fax_phone1']->renderError(); ?>
				<?php echo $person_form['fax_comment1']->render(); ?>
				<?php echo $person_form['fax_comment1']->renderError(); ?>
			</div>
			<div class="fax-choice">
				<?php echo $person_form['auto_fax']->render(); ?>
				<?php echo $person_form['auto_fax']->renderLabel(); ?>
				<?php echo $person_form['auto_fax']->renderError(); ?>
			</div>
		</div>
	</div>
	<div class="wrap">
		<?php echo $person_form['fax_phone2']->renderLabel(); ?> 
		<?php echo $person_form['fax_phone2']->render(); ?>
		<?php echo $person_form['fax_phone2']->renderError(); ?> 
		<?php echo $person_form['fax_comment2']->render(); ?>
		<?php echo $person_form['fax_comment2']->renderError(); ?>
	</div>
</div>

	<div class="box full">
		<div class="wrap">
			<?php echo $person_form['block_mailings']->renderLabel(); ?>
			<?php echo $person_form['block_mailings']->render(); ?>
			<label class="raw" for="<?php echo $person_form->getName().'_block_mailings'?>">Yes</label>
			<?php echo $person_form['block_mailings']->renderError(); ?>
		</div>
	<div class="wrap">
		<?php echo $person_form['newsletter']->renderLabel(); ?> 
		<?php echo $person_form['newsletter']->render(); ?>
		<label class="raw" for="<?php echo $person_form->getName().'_newsletter'?>">Yes</label>
		<?php echo $person_form['newsletter']->renderError(); ?>
	</div>
	<div class="wrap">
		<?php echo $person_form['email']->renderLabel(); ?> 
		<?php echo $person_form['email']->render(); ?>
		<?php echo $person_form['email']->renderError(); ?>
	</div>
	<div class="wrap">
		<?php echo $person_form['secondary_email']->renderLabel(); ?>
		<?php echo $person_form['secondary_email']->render(); ?> 
		<?php echo $person_form['secondary_email']->renderError(); ?>
	</div>
	<div class="wrap">
		<?php echo $person_form['email_blocked']->renderLabel(); ?> 
		<?php echo $person_form['email_blocked']->render(); ?>
		<label class="raw" for="<?php echo $person_form->getName().'_email_blocked'?>">Yes</label>
		<?php echo $person_form['email_blocked']->renderError(); ?>
	</div>
	<div class="wrap">
		<?php echo $person_form['email_text_only']->renderLabel(); ?>
		<?php echo $person_form['email_text_only']->render(); ?> 
		<label class="raw" for="<?php echo $person_form->getName().'_email_text_only'?>">Yes</label> 
		<?php echo $person_form['email_text_only']->renderError(); ?>
	</div>
	<div class="wrap">
		<?php echo $person_form['comment']->renderLabel(); ?> 
		<?php echo $person_form['comment']->render(); ?>
		<?php echo $person_form['comment']->renderError(); ?>
	</div>
	<div class="wrap">
		<?php echo $person_form['veteran']->renderLabel(); ?> 
		<?php echo $person_form['veteran']->render(); ?>
		<label class="raw" for="<?php echo $person_form->getName().'_veteran'?>">Yes</label>
		<?php echo $person_form['veteran']->renderError(); ?>
	</div>
	<div class="wrap">
		<div class="wrap">
			<?php echo $person_form['deceased']->renderLabel(); ?> 
			<?php echo $person_form['deceased']->render(); ?>
			<label class="raw" for="<?php echo $person_form->getName().'_deceased'?>">Yes</label>
			<?php echo $person_form['deceased']->renderError(); ?> <span class="deceased">
			<?php echo $person_form['deceased_date']->renderLabel(); ?> 
			<?php echo $person_form['deceased_date']->render(); ?>
			<?php echo $person_form['deceased_date']->renderError(); ?> </span>
		</div>
	</div>
	<div class="wrap">
		<?php echo $person_form['deceased_comment']->renderLabel(); ?>
		<?php echo $person_form['deceased_comment']->render(); ?> 
		<?php echo $person_form['deceased_comment']->renderError(); ?>
	</div>
	<input type="hidden" id="back" name="back" value="<?php echo $back?>" />
	<?php if(isset($stepped)):?>
		<input type="hidden" id="has" name="has" value="<?php echo $stepped?>" />
	<?php endif;?> 
	<?php if(isset($camp_id)):?>
		<input type="hidden" id="camp_id" name="camp_id" value="<?php echo $camp_id?>" />
	<?php endif;?>
	<?php if(isset($person_itine)):?>
		<input type="hidden" id="iti" name="iti" value="<?php echo $person_itine; ?>" />
	<?php endif;?> 
	<?php if(isset($contact)):?>
		<input type="hidden" id="contact" name="contact" value="<?php echo $contact?>" />
	<?php endif;?>
	<div class="form-submit">
		<a class="btn-action" href="#"	onclick="jQuery('#person_form_button').click();return false;"><span>Save and
	Continue &raquo;</span><strong> </strong></a> 
		<a class="cancel" href="#" onclick="jQuery('#lightbox-overlay_').click();">Cancel</a> 
		<input type="submit" class="hide" id="person_form_button" />
	</div>
</div>
</form>
</div>
