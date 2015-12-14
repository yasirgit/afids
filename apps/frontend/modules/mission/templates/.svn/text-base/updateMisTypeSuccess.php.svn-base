<div class="passenger-form"> 
<div class="person-view"> 
<h2><?php echo $title ?></h2>
  <form action="<?php echo url_for('@mis_type_create') ?>" method="post" id="mtype_form">
    <input type="hidden" name="id" value="<?php echo $mtype->getId() ?>" />
    <input type="hidden" name="referer" value="<?php echo $referer ?>" />
      <br/>
        <div class="box">
            <div class="wrap">
              <?php echo $form['name']->renderLabel(); ?>
              <?php echo $form['name']->render(); ?>
              <?php echo $form['_csrf_token'] ?>
            </div>
            <div class="wrap">
              <?php echo $form['stat_count']->renderLabel(); ?>
              <?php echo $form['stat_count']->render(); ?>
              <?php echo $form['_csrf_token'] ?>
            </div>
            <input type="hidden" value="<?php echo $referer?>" id="back" name="back"/>
            <div class="form-submit">
                  <a href="#" onclick="$('#mtype_form').submit(); return false;" class="btn-action"><span>Save</span><strong>&nbsp;</strong></a>
                  <a href="<?php echo url_for($referer) ?>" class="cancel">Cancel</a>
          </div>
        </div>
  </form>
</div>
</div>
