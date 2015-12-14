<div class="step" style="display: block;">   
<script type="text/javascript">
	jQuery(document).ready( function() {
                jQuery("#application_total_hours").bind('keyup',function(event){

                    var getVlue = jQuery("#application_total_hours").val();
                    if(!(/^\d+$/.test(getVlue))){
                        var len1 = getVlue.length;
                        var text = getVlue.substring( 0 , len1-1 );
        	        jQuery('#application_total_hours').val(text)  ;
                    }
                    else if( getVlue.length > 5 ){
                       alert("Input can not be grater than 5 digits!");
                       var text = getVlue.substring(0,5);
        	       jQuery('#application_total_hours').val(text)  ;
                    }
                });               
	});
</script>
<div class="passenger-form">
<form
	action="<?php echo url_for('pending_member/step2Check?id='.$form->getObject()->getId()) ?>"
	method="post"
	<?php $form->isMultipart() and print 'enctype="multipart/form-data" ' ?>>
	<?php echo $form->renderHiddenFields() ?>
<div class="box full">
<div class="wrap"><label><?php echo $form['spouse_pilot']->renderLabelName() ?></label>
<?php echo $form['spouse_pilot'] ?> <?php echo $form['spouse_pilot']->renderError() ?>
</div>
<div class="wrap"><?php echo $form['spouse_first_name']->renderLabel() ?>
<?php echo $form['spouse_first_name'] ?> <?php echo $form['spouse_first_name']->renderError() ?>
<?php echo $form['spouse_last_name'] ?> <?php echo $form['spouse_last_name']->renderError() ?>
</div>
<div class="wrap"><?php echo $form['emergency_contact_name']->renderLabel() ?>
<?php echo $form['emergency_contact_name'] ?> <?php echo $form['emergency_contact_name']->renderError() ?>
</div>
<div class="wrap"><?php echo $form['emergency_contact_phone']->renderLabel() ?>
<?php echo $form['emergency_contact_phone'] ?> <?php echo $form['emergency_contact_phone']->renderError() ?>
</div>
<div class="wrap"><label><?php echo $form['applicant_copilot']->renderLabelName() ?></label>
<?php echo $form['applicant_copilot'] ?> <?php echo $form['applicant_copilot']->renderError() ?>
</div>
<div class="wrap"><?php echo $form['languages_spoken']->renderLabel() ?>
<?php echo $form['languages_spoken'] ?> <?php echo $form['languages_spoken']->renderError() ?>
</div>
<div class="wrap"><?php echo $form['date_of_birth']->renderLabel() ?> <?php echo $form['date_of_birth'] ?>
<?php echo $form['date_of_birth']->renderHelp() ?> <?php echo $form['date_of_birth']->renderError() ?>
</div>
<?php if ($form->getOption('pilot')) {?>
<div class="wrap"><label
	for="<?php echo $form['drivers_license_state']->renderId()?>">Drivers
License</label>
<div class="wrap"><?php echo $form['drivers_license_state']->renderHelp() ?>
<br clear="all" />
<?php echo $form['drivers_license_state']->renderLabel() ?> <?php echo $form['drivers_license_state'] ?>
<?php echo $form['drivers_license_state']->renderError() ?> <br
	clear="all" />
<?php echo $form['drivers_license_number']->renderLabel() ?> <?php echo $form['drivers_license_number'] ?>
<?php echo $form['drivers_license_number']->renderError() ?></div>
</div>
<div class="wrap"><?php echo $form['height']->renderLabel() ?> <?php echo $form['height'] ?>
inches <?php echo $form['height']->renderError() ?></div>
<div class="wrap"><?php echo $form['weight']->renderLabel() ?> <?php echo $form['weight'] ?>
pounds <?php echo $form['weight']->renderError() ?></div>
<div class="wrap"><?php echo $form['home_base']->renderHelp() ?> <?php echo $form['home_base']->renderLabel() ?>
<?php echo $form['home_base'] ?> <?php echo $form['home_base']->renderError() ?>
</div>
<div class="wrap"><?php echo $form['fbo_name']->renderLabel() ?> <?php echo $form['fbo_name'] ?>
<?php echo $form['fbo_name']->renderError() ?></div>
<div class="wrap"><?php echo $form['pilot_certificate']->renderLabel() ?>
<?php echo $form['pilot_certificate'] ?> <?php echo $form['pilot_certificate']->renderError() ?>
</div>
<div class="wrap"><label><?php echo $form['ratings']->renderLabelName() ?></label>
<?php echo $form['ratings'] ?> <?php echo $form['ratings']->renderError() ?>
</div>
<div class="wrap"><label><?php echo $form['medical_class']->renderLabelName() ?></label>
<?php echo $form['medical_class'] ?> <?php echo $form['medical_class']->renderError() ?>
</div>
<div class="wrap"><?php echo $form['total_hours']->renderLabel() ?> <?php echo $form['total_hours'] ?>
<?php echo $form['total_hours']->renderError() ?></div>
<div class="wrap"><?php echo $form['ifr_hours']->renderLabel() ?> <?php echo $form['ifr_hours'] ?>
<?php echo $form['ifr_hours']->renderError() ?></div>
<div class="wrap"><?php echo $form['multi_hours']->renderLabel() ?> <?php echo $form['multi_hours'] ?>
<?php echo $form['multi_hours']->renderError() ?></div>
<?php }?>
<div class="form-submit"><a class="btn-action" href="#"
	onclick="$('#step2_submit').click(); return false;"><span>Save and
Continue »</span><strong> </strong></a> 
   <a class="cancel" href="<?php echo "/pending_member/step1/id/".$sf_request->getParameter("id")?>" onclick="$('.first').click();">&laquo; Back</a> <input type="submit"
	id="step2_submit" value="submit" class="hide" /></div>
</div>
</form>
</div>
</div>
