<div class="pop-up-heading">
  <a href="#" class="btn-help">Help</a>

  <h3>AFIDS FORGOT PASSWORD</h3>
</div>
<div class="pop-up-content">
  <p>Enter either of the two items below, your username if you can remember it,
  or your Angel Flight West Member ID. You'll be able to reset your password, following a link we sent.</p>
  <?php if (isset($error_msg)){?>
  <p style="color:#F00;"><?php echo $error_msg?></p>
  <?php }?>
  <?php include_partial('global/message')?>
  <form id="retrieval_form" method="post" action="<?php echo url_for('secure/sendPassword')?>">
    <?php echo $sf_data->getRaw('csrf_tag')?>
    <fieldset>
      <div class="login-wrap">
        <div class="wrap">
          <label for="rf_username">Username:</label>
          <div class="pop-up-input"><input type="text" id="rf_username" name="username"/></div>
        </div>
        <div class="wrap">
          <label>OR</label>
        </div>
        <div class="wrap">
          <label for="rf_member_id">Member ID:</label>
          <div class="pop-up-input"><input type="text" id="rf_member_id" name="member_id"/></div>
        </div>
        <ul class="login-questions">
          <li>
            <a href="#" onclick="$('#retrieval_form').submit(); return false;" class="btn-action"><span>SUBMIT</span><strong>&nbsp;</strong></a>
            <em><?php echo link_to('&lt;&lt; back to login', 'secure/login');?></em>
          </li>
        </ul>
      </div>
    </fieldset>
    <input type="submit" class="hide"/>
  </form>
</div>
