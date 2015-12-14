<?php use_helper('Form')?>
<?php if ($person) $person_id = $person->getId(); else $person_id = null?>

<div class="step" style="display: block;">
  <div class="passenger-form">
    <form action="<?php echo url_for('contact/processStep2?id='.$form->getObject()->getId().($person_id ? '&person_id='.$person_id : '')) ?>" method="post">
      <?php echo $form->renderHiddenFields() ?>
      <div class="box">
        <div class="wrap">
          <?php echo $form['ref_source_id']->renderLabel() ?>
          <?php echo $form['ref_source_id'] ?>
          <?php echo $form['ref_source_id']->renderError() ?>
        </div>
        <div class="wrap">
          <?php echo $form['send_app_format']->renderLabel() ?>
          <?php echo $form['send_app_format'] ?>
          <?php echo $form['send_app_format']->renderError() ?>
        </div>
        <div class="wrap">
          <?php echo $form['comment']->renderLabel() ?>
          <?php echo $form['comment'] ?>
          <?php echo $form['comment']->renderError() ?>
        </div>
        <div class="wrap">
          <?php echo $form['contact_type_id']->renderLabel() ?>
          <?php echo $form['contact_type_id'] ?>
          <?php echo $form['contact_type_id']->renderError() ?>
        </div>
        <div class="wrap">
          <?php echo $form['letter_sent_date']->renderLabel() ?>
          <?php echo $form['letter_sent_date'] ?>
          <?php echo $form['letter_sent_date']->renderError() ?>
        </div>
        <div class="form-submit">
          <a class="btn-action" href="#" onclick="$('#step2_submit').click(); return false;"><span>Save</span><strong> </strong></a>
          <a class="cancel" href="#" onclick="$('.first').click();">&laquo; Back</a>
          <input type="submit" id="step2_submit" value="submit" class="hide"/>
        </div>
      </div>
    </form>
  </div>
</div>