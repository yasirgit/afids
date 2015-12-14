<?php
use_stylesheets_for_form($form1);
use_javascripts_for_form($form1);
if (isset($form2)) {
	use_javascripts_for_form($form2);
	use_stylesheets_for_form($form2);
}
if (isset($form3)) {
	use_javascripts_for_form($form3);
	use_stylesheets_for_form($form3);
}
if (isset($form5)) {
	use_javascripts_for_form($form5);
	use_stylesheets_for_form($form5);
}
?>

<h2>Member Application</h2>

<div class="steps-area"><?php include_partial('steps_header', array('current' => $sf_context->getActionName()))?>

<div class="steps-holder"><?php include_partial('step1', array('form' => $form1))?>

<?php if (isset($form2)) include_partial('step2', array('form' => $form2))?>
<?php if (isset($form3)) include_partial('step3', array('form' => $form3))?>
<?php if (isset($form4_widget)){?> <?php if (!isset($form3)) {?>
<div class="step" style="display: none;"><!-- for step 3 --></div>
<?php }?> <?php echo include_partial('step4', array('widget' => $form4_widget, 'application_temp' => $form1->getObject()))?>
<?php }?> <?php if (isset($form5)) include_partial('step5', array('form' => $form5))?>
</div>
<!-- steps-holder --></div>
<?php slot('public_pages_hidden_fields') ?>   
 <input type="hidden" id="_csrf_token" value="<?php echo $csrf_tag;?>" name="_csrf_token">  
<?php end_slot() ?>