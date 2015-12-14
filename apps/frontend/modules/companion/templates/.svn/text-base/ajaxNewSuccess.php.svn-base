<h2><?php echo $form->isNew()?'Add New Companion':'Edit Companion' ?></h2>

<div class="passenger-form">
  <div class="person-view">
    <form onsubmit="submitNewCompanion(this); return false;" action="<?php echo url_for('companion/ajaxCreate'.(!$form->getObject()->isNew()?'&id='.$form->getObject()->getId():'')) ?>" method="post">
      <?php echo $form->renderHiddenFields()?>
      <input type="hidden" name="el_id" value="<?php echo $el_id ?>" />
      <?php echo $form->renderGlobalErrors()?>
      <div class="box">
        <div class="wrap">
          <?php echo $form['name']->renderLabel(); ?>
          <?php echo $form['name']->render(); ?>
          <?php echo $form['name']->renderError(); ?>
        </div>
        <div class="wrap">
          <?php echo $form['relationship']->renderLabel(); ?>
          <?php echo $form['relationship']->render(); ?>
          <?php echo $form['relationship']->renderError(); ?>
        </div>
        <div class="wrap">
          <?php echo $form['date_of_birth']->renderLabel(); ?>
          <?php echo $form['date_of_birth']->render(); ?>
          <?php echo $form['date_of_birth']->renderError(); ?>
        </div>
        <div class="wrap">
          <?php echo $form['weight']->renderLabel(); ?>
          <?php echo $form['weight']->render(); ?>
          <?php echo $form['weight']->renderError(); ?>
        </div>
        <div class="wrap">
          <?php echo $form['companion_phone']->renderLabel(); ?>
          <?php echo $form['companion_phone']->render(); ?>
          <?php echo $form['companion_phone']->renderError(); ?>
        </div>
        <div class="wrap">
          <?php echo $form['companion_phone_comment']->renderLabel(); ?>
          <?php echo $form['companion_phone_comment']->render(); ?>
          <?php echo $form['companion_phone_comment']->renderError(); ?>
        </div>
        <div class="form-submit">
          <input type="submit" class="hide" id="comp_form_submit"/>
          <a href="#" onclick="$('#comp_form_submit').click(); return false;" class="btn-action"><span>Save</span><strong>&nbsp;</strong></a>
          <a href="#" class="cancel" onclick="$('#<?php echo $el_id ?>').html(''); return false;">Cancel</a>
        </div>
      </div>
    </form>
  </div>
</div>

<script type="text/javascript">
function submitNewCompanion(form)
{
  $.ajax({
    url: '<?php echo url_for('companion/ajaxCreate')?>',
    dataType: 'html',
    data: $(form).serialize(),
    success: function (html) {
      $('#<?php echo $el_id?>').html(html);
    }
  });
}
</script>