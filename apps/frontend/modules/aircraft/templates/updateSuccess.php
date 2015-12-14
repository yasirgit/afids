<?php use_stylesheets_for_form($form);?>
<?php use_javascripts_for_form($form);?>

<h2><?php echo $title ?></h2>

<div class="passenger-form">
  <form action="<?php echo url_for('@aircraft_create') ?>" method="post">
    <input type="hidden" name="id" value="<?php echo $aircraft->getId() ?>" />
    <input type="hidden" name="referer" value="<?php echo $referer ?>" />
    <?php if(isset($leg_id)):?><input type="hidden" name="leg_id" value="<?php echo $leg_id ?>" /><?php endif;?>
    <div class="box">
       <div class="wrap">
           <?php echo $form['make']->renderLabel()?>
           <?php echo $form['make']->render(); ?>
           <?php echo $form['make']->renderError(); ?>
           <?php echo $form['_csrf_token'] ?>
       </div>
       <div class="wrap">
           <?php echo $form['model']->renderLabel()?>
           <?php echo $form['model']->render(); ?>
           <?php echo $form['model']->renderError(); ?>
       </div>
       <div class="wrap">
           <?php echo $form['name']->renderLabel()?>
           <?php echo $form['name']->render(); ?>
           <?php echo $form['name']->renderError(); ?>
       </div>
       <div class="wrap">
           <?php echo $form['faa']->renderLabel()?>
           <?php echo $form['faa']->render(); ?>
           <?php echo $form['faa']->renderError(); ?>
       </div>
       <div class="wrap">
           <?php echo $form['engines']->renderLabel()?>
           <?php echo $form['engines']->render(); ?>
           <?php echo $form['engines']->renderError(); ?>
       </div>
       <div class="wrap">
           <?php echo $form['def_seats']->renderLabel()?>
           <?php echo $form['def_seats']->render(); ?>
           <?php echo $form['def_seats']->renderError(); ?>
       </div>
       <div class="wrap">
           <?php echo $form['speed']->renderLabel()?>
           <?php echo $form['speed']->render(); ?>
           <?php echo $form['speed']->renderError(); ?>
       </div>
       <div class="wrap">
           <?php echo $form['pressurized']->renderLabel()?>
           <?php echo $form['pressurized']->render(); ?>
           <?php echo $form['pressurized']->renderError(); ?>
       </div>
       <div class="wrap">
           <?php echo $form['cost']->renderLabel()?>
           <?php echo $form['cost']->render(); ?>
           <?php echo $form['cost']->renderError(); ?>
       </div>
       <div class="wrap">
           <?php echo $form['range']->renderLabel()?>
           <?php echo $form['range']->render(); ?>
           <?php echo $form['range']->renderError(); ?>
       </div>
       <div class="wrap">
           <?php echo $form['ac_load']->renderLabel()?>
           <?php echo $form['ac_load']->render(); ?>
           <?php echo $form['ac_load']->renderError(); ?>
       </div>
       <div class="form-submit">
         <a href="#" onclick="$('#aircraft_submit').click(); return false;" class="btn-action"><span>Save</span><strong>&nbsp;</strong></a>
         <a href="<?php echo url_for($referer) ?>" class="cancel">Cancel</a>
         <input type="submit" id="aircraft_submit" class="hide" />
       </div>
    </div>
  </form>
</div>
