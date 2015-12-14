<?php use_stylesheets_for_form($form);?>
<?php use_javascripts_for_form($form);?>

<div class="passenger-form">
<div class="person-view"> 
<h2><?php echo $title ?></h2>
  <form action="<?php echo url_for('@donor_create') ?>" method="post" id="donor_form">
    <input type="hidden" name="id" value="<?php echo $donor->getId() ?>" />
    <input type="hidden" name="referer" value="<?php echo $referer ?>" />
      <br/>
     <?php if (isset($error_msg)){?>
          <span style="color:red;"><?php echo $error_msg?></span>
      <?php }?>
        <div class="box">
          <div class="wrap">
            <?php echo $form['co_donor_id']->renderLabel(); ?>
            <?php echo $form['co_donor_id']->render(); ?>
            <?php echo $form['co_donor_id']->renderError(); ?>
            <?php echo $form['_csrf_token'] ?>
          </div>
           <div class="wrap">
            <?php echo $form['affiliation_id']->renderLabel(); ?>
            <?php echo $form['affiliation_id']->render(); ?>
            <?php echo $form['affiliation_id']->renderError(); ?>
          </div>
           <div class="wrap">
            <?php echo $form['block_mailings']->renderLabel(); ?>
            <?php echo $form['block_mailings']->render(); ?>
            <?php echo $form['block_mailings']->renderError(); ?>
          </div>
           <div class="wrap">
            <?php echo $form['prospect_comment']->renderLabel(); ?>
            <?php echo $form['prospect_comment']->render(); ?>
            <?php echo $form['prospect_comment']->renderError(); ?>
            <?php echo $form['_csrf_token'] ?>
          </div>
           <div class="wrap">
            <?php echo $form['salutation']->renderLabel(); ?>
            <?php echo $form['salutation']->render(); ?>
            <?php echo $form['salutation']->renderError(); ?>
          </div>
           <div class="wrap">
            <?php echo $form['company_id']->renderLabel(); ?>
            <?php echo $form['company_id']->render(); ?>
            <?php echo $form['company_id']->renderError(); ?>
          </div>
           <div class="wrap">
            <?php echo $form['position']->renderLabel(); ?>
            <?php echo $form['position']->render(); ?>
            <?php echo $form['position']->renderError(); ?>
          </div>
             <div class="wrap">
            <?php echo $form['donor_potential']->renderLabel(); ?>
            <?php echo $form['donor_potential']->render(); ?>
            <?php echo $form['donor_potential']->renderError(); ?>
          </div>
             <div class="wrap">
            <?php echo $form['person_id']->renderLabel(); ?>
            <?php echo $form['person_id']->render(); ?>
            <?php echo $form['person_id']->renderError(); ?>
          </div>
          <input type="hidden" value="<?php echo $referer?>" id="back" name="back"/>
          <div class="form-submit">
                  <a href="#" onclick="$('#donor_form').submit(); return false;" class="btn-action"><span>Save</span><strong>&nbsp;</strong></a>
                  <a href="<?php echo url_for($referer) ?>" class="cancel">Cancel</a>
          </div>
        </div>
  </form>
</div>
</div>
<script type="text/javascript">
//<![CDATA[
$(function() {
  $("#donor_date_added").datepicker();
  $("#donor_date_updated").datepicker();
});
//]]>
</script>
