<?php use_stylesheets_for_form($form);?>
<?php use_javascripts_for_form($form);?>

<div class="passenger-form">
  <form action="<?php echo url_for('account/'.($form->isNew() ? 'newAircraft' : 'editAircraft?id='.$form->getObject()->getId())) ?>" method="post">
    <?php echo $form->renderHiddenFields()?>
      <?php if($leg_id){?>
      <input type="hidden" value="<?php echo $leg_id;?>"  name="pilot_aircraft_leg_id">
      <?php } ?>
    <div class="box">
       <div class="wrap">
         <?php echo $form['aircraft_id']->renderLabel()?>
         <?php echo $form['aircraft_id']->render(); ?>
         <?php echo $form['aircraft_id']->renderError(); ?>
       </div>
       <div class="wrap">
         <?php echo $form['n_number']->renderLabel()?>
         <?php echo $form['n_number']->render(); ?>
         <?php echo $form['n_number']->renderError(); ?>
       </div>
       <div class="wrap">
         <?php echo $form['own']->renderLabel()?>
         <?php echo $form['own']->render(); ?>
         <?php echo $form['own']->renderError(); ?>
       </div>
       <div class="wrap">
         <?php echo $form['seats']->renderLabel()?>
         <?php echo $form['seats']->render(); ?>
         <?php echo $form['seats']->renderError(); ?>
       </div>
       <div class="wrap">
         <?php echo $form['known_ice']->renderLabel()?>
         <?php echo $form['known_ice']->render(); ?>
         <?php echo $form['known_ice']->renderError(); ?>
       </div>
       <div class="form-submit">
         <a href="#" onclick="$('#aircraft_form_submit').click(); return false;" class="btn-action"><span>Save</span><strong>&nbsp;</strong></a>
         <a href="<?php echo url_for('account/index')?>" class="cancel">Cancel</a>
         <input type="submit" id="aircraft_form_submit" class="hide" />
       </div>
    </div>
  </form>
</div>
