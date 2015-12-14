<div class="passenger-form">
<div class="person-view"> 
<h2><?php echo $title ?></h2>
  <form action="<?php echo url_for('@gift_create') ?>" method="post" id="gift_form">
    <input type="hidden" name="id" value="<?php echo $gift_type->getId() ?>" />
    <input type="hidden" name="referer" value="<?php echo $referer ?>" />
      <?php if (isset($error_msg)){?>
          <span style="color:red;"><?php echo $error_msg?></span>
      <?php }?> 
      <br/>
      <fieldset>
        <div class="box">
          <div class="wrap">
          <?php echo $form;?>
          <?php echo $form['_csrf_token'] ?>
          <input type="hidden" value="<?php echo $referer?>" id="back" name="back"/>
          </div>
               <div class="form-submit">
              <a href="#" onclick="$('#gift_form').submit(); return false;" class="btn-action"><span>Save</span><strong>&nbsp;</strong></a>
              <a href="<?php echo url_for($referer) ?>" class="cancel">Cancel</a>
          </div>
        </div>
      </fieldset>
  </form>
  </div>
</div>
