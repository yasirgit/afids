<?php use_stylesheets_for_form($form);?>
<?php use_javascripts_for_form($form);?>
<div class="passenger-form">
<div class="person-view"> 
<h2><?php echo $title ?></h2>
<form action="<?php echo url_for('@ctype_create') ?>" method="post" id="ctype_form">
    <input type="hidden" name="id" value="<?php echo $contact_type->getId() ?>" />
    <input type="hidden" name="referer" value="<?php echo $referer ?>" />
      <br/>
      <div class="box">
      <div class="wrap">
              <?php echo $form['contact_type_desc']->renderLabel(); ?>
              <?php echo $form['contact_type_desc']->render(); ?>
              <?php echo $form['contact_type_desc']->renderError(); ?>
              <?php echo $form['_csrf_token'] ?>
      </div>
      <input type="hidden" value="<?php echo $referer?>" id="back" name="back"/>
      <div class="form-submit">
              <a href="#" onclick="$('#ctype_form').submit(); return false;" class="btn-action"><span>Save</span><strong>&nbsp;</strong></a>
              <a href="<?php echo url_for($referer) ?>" class="cancel">Cancel</a>
      </div>
       </div>
  </form>
  </div>
  </div>