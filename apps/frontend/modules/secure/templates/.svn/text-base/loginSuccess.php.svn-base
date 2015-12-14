<?php use_helper('jQuery')?>

<div class="pop-up-heading">
  <!--a href="#" class="btn-help">Help</a -->

  <h3>AFIDS LOGIN</h3>
</div>
<div class="pop-up-content">
    <script type="text/javascript">
        jQuery(document).ready(function(){
            jQuery('#login_form').keypress(function(e){
                if(e.which == 13){
                    $('#login_form').submit();
                }
            });
        });
    </script>

  <?php if (isset($error_msg)){?>
  <p style="color:#F00;"><?php echo $error_msg?></p>
  <?php }else{?>
  <p>Please enter your username and password and click login.</p>
  <?php }?>
  <?php //include_partial('global/message')?>
  <form id="login_form" action="<?php echo url_for('secure/signIn')?>">
    <input type="hidden" name="referer" value="<?php echo $referer?>"/>
    <?php echo $sf_data->getRaw('csrf_tag')?>
      <div class="login-wrap">
        <div class="wrap">
          <label for="lf_username">Username:</label>
          <div class="pop-up-input"><input type="text" id="lf_username" name="username" value="<?php if (isset($username)) echo $username?>"/></div>
        </div>
        <div class="wrap">
          <label for="lf_password">Password:</label>
          <div class="pop-up-input"><input type="password" id="lf_password" name="password"/></div>
        </div>
        <ul class="login-questions">
          <li>
            <a href="#" onclick="$('#login_form').submit(); return false;" class="btn-action"><span>LOGIN</span><strong>&nbsp;</strong></a>
            
            <em>Forgot your password? <?php echo link_to('Click here.', 'secure/forgotPassword')?></em>
          </li>
          <li>
            <em>Are you a member and would like to create password? <?php echo link_to('Click here', 'secure/retrievePassword')?></em>
          </li>
        </ul>
      </div>
      <input type="submit" class="hide" value="submit" />
  </form>
</div>

<?php javascript_tag()?>
$(window).load(function () {
  $('#lf_username').focus();
});
<?php end_javascript_tag()?>