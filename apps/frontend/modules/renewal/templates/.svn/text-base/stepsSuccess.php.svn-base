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

<div class="steps-area">
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
  <?php include_partial('steps_header', array('current' => $sf_context->getActionName()))?>
  
  <div class="steps-holder">     
    <?php include_partial('step1', array('form' => $form1))?>

    <?php if (isset($form2)){ ?>					
		<?php include_partial('step2', array('form' => $form2))?>
	<?php }?>
    <?php if (isset($form3)) include_partial('step3', array('form' => $form3))?>
    <?php if (isset($form4_widget)){?>
      <?php if (!isset($form3)) {?>
        <div class="step" style="display: none;">
          <!-- for step 3 -->
        </div>
      <?php }?>
      <?php echo include_partial('step4', array('widget' => $form4_widget, 'application_temp' => $form1->getObject()))?>
    <?php }?>
      <?php //,'memberclass' =>$memberclass?>
    <?php if (isset($form5)) include_partial('step5', array('form' => $form5,'memberclass' => $memberclass,'total_amount' => $total_amount,'donation_amount' => $donation_amount,'exp' =>$exp))?>
  </div><!-- steps-holder -->
</div>