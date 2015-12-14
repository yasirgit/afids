<div class="passenger-form">
<div class="person-view"> 
<h2>Change Password</h2> 
<form action="<?php echo url_for('account/updatePassword') ?>" method="post" id="change_pass">
   <?php if (isset($error_msg)){?>
      <span style="color:red;"><?php echo $error_msg?></span>
    <?php }?>
     <div class="wrap">
      <label>Old Password </label>
      <input class="text" type="password" id="old_pass" name="old_pass" value=""/>
      </div>
     <div class="wrap">
      <label>New Password </label>
      <input class="text" type="password" id="new_pass" name="new_pass"/>
      </div>
     <div class="wrap">
      <label>Confirm New Password </label>
      <input class="text" type="password" id="confirm_pass" name="confirm_pass"/>
     </div>
     <div class="form-submit">
       <a href="#" onclick="$('#change_pass').submit(); return false;" class="btn-action"><span>Save</span><strong>&nbsp;</strong></a>
       <a href="<?php echo url_for('account') ?>" class="cancel">Cancel</a>
      </div>
  </form>
</div>
</div>


