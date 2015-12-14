<?php use_stylesheets_for_form($form);?>
<?php use_javascripts_for_form($form);?>

<div class="passenger-form"> 
<div class="person-view"> 
<h2><?php echo $title ?></h2>
  <form action="<?php echo url_for('passenger/updateIllness') ?>" method="post" id="ill_form">
    <input type="hidden" name="id" value="<?php echo $ill->getId() ?>" />
    <input type="hidden" name="referer" value="<?php echo $referer ?>" />
      <div class="box">
          <div class="wrap">
          <?php echo $form['category_description']->renderLabel();?>
          <?php echo $form['category_description']->render();?>
          <?php echo $form['category_description']->renderError();?>
          <?php echo $form['_csrf_token'] ?>
          </div>
           <div class="wrap">
          <?php echo $form['super_category_description']->renderLabel();?>
          <?php echo $form['super_category_description']->render();?>
          <?php echo $form['super_category_description']->renderError();?>
          </div>
    <div class="form-submit">
      <a href="" onclick="$('#ill_form').submit();return false;" class="btn-action"><span>Save</span><strong>&nbsp;</strong></a>
      <a href="<?php echo url_for('pill') ?>" class="cancel">Cancel</a>
    </div>
    </div>
  </form>
</div>
</div>