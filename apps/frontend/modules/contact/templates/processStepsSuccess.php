<?php
use_stylesheets_for_form($form1);
use_javascripts_for_form($form1);

if (isset($form2)) {
  use_stylesheets_for_form($form2);
  use_javascripts_for_form($form2);
}
$current = $sf_context->getActionName();
?>

<h2>Process Contact Request</h2>

<div class="steps-area">
  <?php include_partial('process_steps_header', array('current' => $current))?>

  <div class="steps-holder">
    <?php include_partial('process_step1', array('form' => $form1, 'person' => $person))?>

    <?php if ($current == 'processStep2') include_partial('process_step2', array('person' => $person, 'form' => $form2)); ?>
  </div><!-- steps-holder -->
</div>