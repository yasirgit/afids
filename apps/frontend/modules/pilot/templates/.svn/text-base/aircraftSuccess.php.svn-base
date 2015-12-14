<?php use_stylesheets_for_form($form);?>
<?php use_javascripts_for_form($form);?>

<h2><?php echo $title ?></h2>
<div class="passenger-form">
  <form action="<?php echo url_for('@paircraft_create') ?>" method="post" id="aircraft_submit">
    <input type="hidden" name="id" value="<?php echo $aircraft->getId() ?>" />
    <input type="hidden" name="member_id" value="<?php echo $member->getId() ?>" />
    <input type="hidden" name="referer" value="<?php echo $referer ?>" />
    <?php if(isset($req_id)):?><input type="hidden" name="req_id" value="<?php echo $req_id ?>" /><?php endif;?>
    <?php if(isset($camp_id)):?><input type="hidden" name="camp_id" value="<?php echo $camp ?>" /><?php endif;?>
    <?php if(isset($leg_id)):?><input type="hidden" name="leg_id" value="<?php echo $leg_id ?>" /><?php endif;?>
    <?php if(isset($account)):?><input type="hidden" name="account" value="<?php echo $account ?>" /><?php endif;?>
    <div class="box">
      <div class="wrap">
        <?php foreach ($form->getGlobalErrors() as $name => $error): ?>
          <?php echo $name.': '.$error ?>
        <?php endforeach; ?>
        <?php echo $form['aircraft_id']->renderLabel()?>
        <?php echo $form['aircraft_id']->render(); ?>
        <?php echo $form['aircraft_id']->renderError(); ?>
        <?php echo $form['_csrf_token'] ?>
        <?php if(isset($has_error)):?><label style="color:red">Please choice Aircraft !</label><?php endif;?>
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
        <a href="#" onclick="document.forms['aircraft_submit'].submit(); return false;" class="btn-action"><span>Save</span><strong>&nbsp;</strong></a>
        <a href="<?php echo url_for($referer) ?>" class="cancel">Cancel</a>
      </div>
    </div>
  </form>
</div>
