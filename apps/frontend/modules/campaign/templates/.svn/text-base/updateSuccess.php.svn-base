<h2><?php echo $title ?></h2>

<div class="passenger-form">
  <form action="<?php echo url_for('@campaign_create') ?>" method="post" id="campa_form">
    <input type="hidden" name="id" value="<?php echo $campaign->getId() ?>" />
    <input type="hidden" name="referer" value="<?php echo $referer ?>" />
    <div class="box">
      <div class="wrap">
        <?php echo $form['campaign_decs']->renderLabel(); ?>
        <?php echo $form['campaign_decs']->render(); ?>
        <?php echo $form['campaign_decs']->renderError(); ?>
        <?php echo $form['_csrf_token'] ?>
      </div>
      <div class="wrap">
        <?php echo $form['premium_sku']->renderLabel(); ?>
        <?php echo $form['premium_sku']->render(); ?>
        <?php echo $form['premium_sku']->renderError(); ?>
      </div>
      <div class="wrap">
        <?php echo $form['premium_min']->renderLabel(); ?>
        <?php echo $form['premium_min']->render(); ?>
        <?php echo $form['premium_min']->renderError(); ?>
      </div>
      <input type="hidden" value="<?php echo $referer?>" id="back" name="back"/>
      <div class="form-submit">
        <a href="#" onclick="$('#campa_form').submit(); return false;" class="btn-action"><span>Save</span><strong>&nbsp;</strong></a>
        <a href="<?php echo url_for($referer) ?>" class="cancel">Cancel</a>
      </div>
    </div>
  </form>
</div>