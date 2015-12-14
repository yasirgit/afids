<?php use_stylesheets_for_form($form);?>
<?php use_javascripts_for_form($form);?>

<div class="passenger-form">
<div class="person-view"> 
<h2><?php echo $title ?></h2>
  <form action="<?php echo url_for('@donation_create') ?>" method="post" id="dona_form">
    <input type="hidden" name="id" value="<?php echo $dona->getId() ?>" />
    <input type="hidden" name="referer" value="<?php echo $referer ?>" />
      <?php if (isset($error_msg)){?>
          <span style="color:red;"><?php echo $error_msg?></span>
      <?php }?>
      <fieldset>
      <div class="box">
          <div class="wrap">   
          <?php echo $form['donor_id']->renderLabel(); ?>
          <?php echo $form['donor_id']->render(); ?>
          <a href="<?php echo url_for('donor/update') ?>">Add New</a>
          <?php echo $form['donor_id']->renderError(); ?>
          </div>
          <div class="wrap">   
          <?php echo $form['gift_date']->renderLabel(); ?>
          <?php echo $form['gift_date']->render(); ?>
          <?php echo $form['gift_date']->renderError(); ?>
          </div>
          <div class="wrap">   
          <?php echo $form['gift_amount']->renderLabel(); ?>
          <?php echo $form['gift_amount']->render(); ?>
          <?php echo $form['gift_amount']->renderError(); ?>
          </div>
          <div class="wrap">   
          <?php echo $form['deductible_amount']->renderLabel(); ?>
          <?php echo $form['deductible_amount']->render(); ?>
          <?php echo $form['deductible_amount']->renderError(); ?>
          </div>
          <div class="wrap">   
          <?php echo $form['gift_type']->renderLabel(); ?>
          <?php echo $form['gift_type']->render(); ?>
          <a href="<?php echo url_for('gift/create') ?>">Add New</a>
          <?php echo $form['gift_type']->renderError(); ?>
          </div>
          <div class="wrap">   
          <?php echo $form['check_number']->renderLabel(); ?>
          <?php echo $form['check_number']->render(); ?>
          <?php echo $form['check_number']->renderError(); ?>
          </div>
          <div class="wrap">   
          <?php echo $form['campain_id']->renderLabel(); ?>
          <?php echo $form['campain_id']->render(); ?>
          <a href="<?php echo url_for('campaign/update') ?>">Add New</a>
          <?php echo $form['campain_id']->renderError(); ?>
          </div>
          <div class="wrap">   
          <?php echo $form['fund_id']->renderLabel(); ?>
          <?php echo $form['fund_id']->render(); ?>
          <a href="<?php echo url_for('fund/update') ?>">Add New</a>
          <?php echo $form['fund_id']->renderError(); ?>
          </div>
          <div class="wrap">   
          <?php echo $form['gift_note']->renderLabel(); ?>
          <?php echo $form['gift_note']->render(); ?>
          <?php echo $form['gift_note']->renderError(); ?>
          </div>
          <div class="wrap">   
          <?php echo $form['printed_note']->renderLabel(); ?>
          <?php echo $form['printed_note']->render(); ?>
          <?php echo $form['printed_note']->renderError(); ?>
          </div>
          <div class="wrap">   
          <?php echo $form['receipt_generated_date']->renderLabel(); ?>
          <?php echo $form['receipt_generated_date']->render(); ?>
          <?php echo $form['receipt_generated_date']->renderError(); ?>
          </div>
          <div class="wrap">   
          <?php echo $form['follow_up']->renderLabel(); ?>
          <?php echo $form['follow_up']->render(); ?>
          <?php echo $form['follow_up']->renderError(); ?>
          </div>
          <div class="wrap">   
          <?php echo $form['premium_order_date']->renderLabel(); ?>
          <?php echo $form['premium_order_date']->render(); ?>
          <?php echo $form['premium_order_date']->renderError(); ?>
          </div>
          <?php echo $form['_csrf_token'] ?>
          <div class="form-submit">
                  <a href="#" onclick="$('#dona_form').submit(); return false;" class="btn-action"><span>Save</span><strong>&nbsp;</strong></a>
                  <a href="<?php echo url_for('donation') ?>" class="cancel">Cancel</a>
          </div>
      </div>
      </fieldset>
  </form>
  </div>
</div>

  <script type="text/javascript">
  //<![CDATA[
  $(function() {
		$("#dona_gift_date").datepicker();
		$("#dona_receipt_generated_date").datepicker();
		$("#dona_premium_order_date").datepicker();
	});
  //]]>
  </script>