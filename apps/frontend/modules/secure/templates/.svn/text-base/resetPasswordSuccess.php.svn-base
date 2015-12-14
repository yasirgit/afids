<div class="pop-up-heading">
  <a href="#" class="btn-help">Help</a>

  <h3>AFIDS FORGOT PASSWORD</h3>
</div>
<div class="pop-up-content">
  <?php if (isset($error_msg)){?>
  <p style="color:#F00;"><?php echo $error_msg?></p>
  <?php }else{?>
  <p>Please type in your new password</p>
  <?php }?>
  <?php include_partial('global/message')?>
  <form id="fp_form" method="post" action="<?php echo url_for('secure/resetPassword')?>">
    <?php echo $sf_data->getRaw('csrf_tag')?>
    <input type="hidden" value="<?php echo $password_request->getEmail()?>" name="email"/>
    <input type="hidden" value="<?php echo $password_request->getToken()?>" name="token"/>
    <fieldset>
      <div class="wrap">
        <label for="lf_username">Password:</label>
        <div class="pop-up-input"><input type="password" id="lf_password" name="password"/></div>
      </div>
      <div class="wrap">
        <label for="lf_password">Confirm Password:</label>
        <div class="pop-up-input"><input type="password" id="lf_confirm" name="confirm"/></div>
      </div>
      <ul class="login-questions">
        <li>
          <a href="#" onclick="$('#fp_form').submit(); return false;" class="btn-action"><span>SUBMIT</span><strong>&nbsp;</strong></a>
        </li>
      </ul>
      <input type="submit" class="hide" value="submit" />
    </fieldset>
  </form>
</div>
