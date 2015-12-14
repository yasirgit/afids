<div class="pop-up-heading">
  <a href="#" class="btn-help">Help</a>
  <h3>AFIDS CREATE PASSWORD</h3>
</div>
<div class="pop-up-content">
  <?php if (isset($error_msg)){?>
  <p style="color:#F00;"><?php echo $error_msg?></p>
  <?php }else{?>
  <p>Please enter your new username and password to submit and login.</p>
  <?php }?>
  <?php include_partial('global/message')?>
  <form id="new_password_form" method="post" action="<?php echo url_for('secure/newPassword')?>">
    <input type="hidden" value="<?php echo $sf_params->get('member_id2') ?>" name="member_id2"/>
    <input type="hidden" value="<?php echo $sf_params->get('lastname') ?>" name="lastname"/>
    <input type="hidden" value="<?php echo $sf_params->get('zipcode') ?>" name="zipcode"/>
    <?php echo $sf_data->getRaw('csrf_tag')?>
    <fieldset>
      <div class="wrap">
        <label for="usernamee">Username:</label>
        <div class="pop-up-input"><input type="text" id="usernamee" name="usernamee"/></div>
      </div>
      <div class="wrap">
        <label for="passwordd">Password:</label>
        <div class="pop-up-input"><input type="password" id="passwordd" name="passwordd"/></div>
      </div>
      <div class="wrap">
        <label for="corfirm_passwordd">Confirm Password:</label>
        <div class="pop-up-input"><input type="password" id="corfirm_passwordd" name="corfirm_passwordd"/></div>
      </div>
      <ul class="login-questions">
        <li>
          <a href="#" onclick="$('#new_password_form').submit(); return false;" class="btn-action"><span>SUBMIT &amp; LOGIN</span><strong>&nbsp;</strong></a>
        </li>
      </ul>
      <input type="submit" class="hide" value="submit" />
    </fieldset>
  </form>
</div>