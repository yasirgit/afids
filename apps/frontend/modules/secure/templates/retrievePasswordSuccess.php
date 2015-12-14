<div class="pop-up-heading">
  <a href="#" class="btn-help">Help</a>

  <h3>AFIDS CREATE PASSWORD</h3>
</div>
<div class="pop-up-content">
  <?php if (isset($error_msg)){?>
  <p style="color:red;"><?php echo $error_msg?></p>
  <?php }else{?>
  <p>Please fill in all of the fields below and click submit.</p>
  <?php }?>
  <?php include_partial('global/message')?>
  <form id="create_password" method="post" action="<?php echo url_for('secure/checkIdentity')?>">
    <?php echo $sf_data->getRaw('csrf_tag')?>
    <fieldset>
      <div class="login-wrap">
        <div class="wrap">
          <label for="member_id2" style="float: left;width:150px;">Member External ID:</label>
          <div class="pop-up-input" style="float: left;width:205px; border-right: 1px solid #86a2bd; "><input type="text" id="member_id2" width="195px" name="member_id2" value="<?php echo $sf_params->get('member_id2')?>"/></div>
        </div>
        <div class="wrap">
          <label for="lastname">Last Name:</label>
          <div class="pop-up-input"><input type="text" id="lastname" name="lastname" value="<?php echo $sf_params->get('lastname')?>"/></div>
        </div>
        <div class="wrap">

          <label for="zipcode">Zip Code:</label>
          <div class="pop-up-input"><input type="text" id="zipcode" name="zipcode" value="<?php echo $sf_params->get('zipcode')?>"/></div>
        </div>
        <a href="#" onclick="$('#create_password').submit(); return false;" class="btn-action"><span>SUBMIT</span><strong>&nbsp;</strong></a>
      </div>
      <input type="submit" class="hide" value="submit" />
    </fieldset>
  </form>

</div>
