<?php use_stylesheets_for_form($form);?>
<?php use_javascripts_for_form($form);?>

<div class="passenger-form"> 
<div class="person-view"> 
<h2><?php echo $title ?></h2>
  <form action="<?php echo url_for('@wing_create') ?>" method="post" id="wing_form">
    <input type="hidden" name="id" value="<?php echo $wing->getId() ?>" />
    <input type="hidden" name="referer" value="<?php echo $referer ?>" />
      <br/>
        <div class="box">
            <div class="wrap">
              <?php echo $form['name']->renderLabel(); ?>
              <?php echo $form['name']->render(); ?>
              <?php echo $form['name']->renderError(); ?>
              <?php echo $form['_csrf_token'] ?>
            </div>
            <div class="wrap">
              <?php echo $form['newsletter_abbreviation']->renderLabel(); ?>
              <?php echo $form['newsletter_abbreviation']->render(); ?>
              <?php echo $form['newsletter_abbreviation']->renderError(); ?>
              <?php echo $form['_csrf_token'] ?>
            </div>
            <div class="wrap">
              <?php echo $form['display_name']->renderLabel(); ?>
              <?php echo $form['display_name']->render(); ?>
              <?php echo $form['display_name']->renderError(); ?>
              <?php echo $form['_csrf_token'] ?>
            </div>
            <div class="wrap">
              <?php echo $form['state']->renderLabel(); ?>
              <?php echo $form['state']->render(); ?>
              <?php echo $form['state']->renderError(); ?>
              <?php echo $form['_csrf_token'] ?>
            </div>
            <input type="hidden" value="<?php echo $referer?>" id="back" name="back"/>
            <div class="form-submit">
                  <a href="#" onclick="$('#wing_form').submit(); return false;" class="btn-action"><span>Save</span><strong>&nbsp;</strong></a>
                  <a href="<?php echo url_for($referer) ?>" class="cancel">Cancel</a>
          </div>
        </div>
  </form>
</div>
</div>
