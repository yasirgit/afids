<?php use_stylesheets_for_form($form);?>
<?php use_javascripts_for_form($form);?>

<div class="passenger-form">
  <form action="<?php echo url_for('account/'.($form->isNew() ? 'newPersonalFlight' : 'editPersonalFlight?id='.$form->getObject()->getId())) ?>" method="post">
    <?php echo $form->renderHiddenFields()?>
    <div class="box">
      <div class="wrap">
        <?php echo $form['name']->renderLabel()?>
        <?php echo $form['name']->render(); ?>
        <?php echo $form['name']->renderError(); ?>
      </div>
      <div class="wrap">
        <?php echo $form['departure_date']->renderLabel()?>
        <?php echo $form['departure_date']->render(); ?>
        <?php echo $form['departure_date']->renderError(); ?>        
      </div>
      <div class="wrap">
        <?php echo $form['return_date']->renderLabel()?>
        <?php echo $form['return_date']->render(); ?>
        <?php echo $form['return_date']->renderError(); ?>       
      </div>
      By specifying city or zipcode we are able to match available flights for
      you more specific
      <div class="wrap">
        <?php echo $form['origin_city']->renderLabel()?>
        <?php echo $form['origin_city']->render(); ?>
        <?php echo $form['origin_city']->renderError(); ?>
      </div>
      <div class="wrap">
        <?php echo $form['origin_zipcode']->renderLabel()?>
        <?php echo $form['origin_zipcode']->render(); ?>
        <?php echo $form['origin_zipcode']->renderError(); ?>
      </div>
      <div class="wrap">
        <?php echo $form['destination_city']->renderLabel()?>
        <?php echo $form['destination_city']->render(); ?>
        <?php echo $form['destination_city']->renderError(); ?>
      </div>
      <div class="wrap">
        <?php echo $form['destination_zipcode']->renderLabel()?>
        <?php echo $form['destination_zipcode']->render(); ?>
        <?php echo $form['destination_zipcode']->renderError(); ?>
      </div>
      <div class="form-submit">
        <a href="#" onclick="$('#personal_flight_form_submit').click(); return false;" class="btn-action"><span>Save</span><strong>&nbsp;</strong></a>
        <a href="<?php echo url_for('account/index')?>" class="cancel">Cancel</a>
        <input type="submit" id="personal_flight_form_submit" class="hide" />
      </div>
    </div>
  </form>
</div>
