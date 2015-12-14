<?php use_javascripts_for_form($form)?>
<?php use_stylesheets_for_form($form)?>

<div class="passenger-form">
  <?php echo $form->renderGlobalErrors() ?>
  <form action="<?php echo url_for('availability/updateOwn?id='.$form->getObject()->getId()) ?>" method="post" <?php $form->isMultipart() and print 'enctype="multipart/form-data" ' ?>>
    <?php if (!$form->getObject()->isNew()): ?>
      <input type="hidden" name="sf_method" value="put" />
    <?php endif; ?>
    <?php echo $form->renderHiddenFields() ?>
    <div class="box full">
      If you are permanently or indefinitely <u>NOT</u> available for flights, check "Not Available".
      <div class="wrap">
        <?php echo $form['not_available']->renderLabel() ?>
        <?php echo $form['not_available']?>
        <label for="<?php echo $form['not_available']->renderId()?>" class="raw">Not Available</label>
        <?php echo $form['not_available']->renderError() ?>
      </div>
      If you are generally available for flights, but will be unavailable for
      a specified period, for example, due to travel or aircraft maintenance,
      please enter a start and end date for that period below. If you will be
      unavailable indefinitely starting at a particular date, you may leave the
      end date blank. You may also add a brief comment if you believe it would
      be helpful for the coordinators.
      <div class="wrap">
        <?php echo $form['first_date']->renderLabel() ?>
        <?php echo $form['first_date']?>
        <?php echo $form['first_date']->renderError() ?>
      </div>
      <div class="wrap">
        <?php echo $form['last_date']->renderLabel() ?>
        <?php echo $form['last_date']?>
        <?php echo $form['last_date']->renderError() ?>
      </div>
      <div class="wrap">
        <?php echo $form['availability_comment']->renderLabel() ?>
        <?php echo $form['availability_comment']?>
        <?php echo $form['availability_comment']->renderError() ?>
      </div>
      Please specify your general availability during the periods indicated
      below. Check the box if you are <u>NOT</u> available during these periods.
      <div class="wrap">
        <?php echo $form['no_weekday']->renderLabel() ?>
        <?php echo $form['no_weekday']?>
        <label for="<?php echo $form['no_weekday']->renderId()?>" class="raw">Not Available Weekdays</label>
        <?php echo $form['no_weekday']->renderError() ?>
      </div>
      <div class="wrap">
        <?php echo $form['no_night']->renderLabel() ?>
        <?php echo $form['no_night']?>
        <label for="<?php echo $form['no_night']->renderId()?>" class="raw">Not Available Nights</label>
        <?php echo $form['no_night']->renderError() ?>
      </div>
      <div class="wrap">
        <?php echo $form['no_weekend']->renderLabel() ?>
        <?php echo $form['no_weekend']?>
        <label for="<?php echo $form['no_weekend']->renderId()?>" class="raw">Not Available Weekends</label>
        <?php echo $form['no_weekend']->renderError() ?>
      </div>
      Please specify your general availability for last minute flights. You will
      always be given notice where possible, and of course, will never be
      obligated to take a last minute flight.
      <div class="wrap">
        <?php echo $form['last_minute']->renderLabel() ?>
        <?php echo $form['last_minute']?>
        <label for="<?php echo $form['last_minute']->renderId()?>" class="raw">Available for Last Minute</label>
        <?php echo $form['last_minute']->renderError() ?>
      </div>
      If you wish to fly as a mission assistant, please indicate below.
      <div class="wrap">
        <?php echo $form['as_mission_mssistant']->renderLabel() ?>
        <?php echo $form['as_mission_mssistant']?>
        <label for="<?php echo $form['as_mission_mssistant']->renderId()?>" class="raw">Available As Mission Assistant</label>
        <?php echo $form['as_mission_mssistant']->renderError() ?>
      </div>
      <div class="form-submit">
        <a onclick="$('#availability_form_submit').click();return false;" href="#" class="btn-action"><span>Save and Continue »</span><strong> </strong></a>
        <a href="<?php echo url_for('account/index')?>" class="cancel">Cancel</a>
        <input type="submit" id="availability_form_submit" class="hide"/>
      </div>
    </div>
  </form>
</div>
