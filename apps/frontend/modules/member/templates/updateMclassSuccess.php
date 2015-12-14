<?php use_stylesheets_for_form($form);?>
<?php use_javascripts_for_form($form);?>

<div class="passenger-form">
<div class="person-view"> 
<h2><?php echo $title ?></h2>
  <form action="<?php echo url_for('@mclass_create') ?>" method="post" id="mclass_form">
    <input type="hidden" name="id" value="<?php echo $mclass->getId() ?>" />
    <input type="hidden" name="referer" value="<?php echo $referer ?>" />
      <br/>
      <?php //if (isset($error_msg)){?>
          <!--<span style="color:red;"><?php //echo $error_msg?></span>-->
      <?php //}?>
      <?php echo $form->renderGlobalErrors()?>
        <div class="box">
          <div class="wrap">
            <?php echo $form['name']->renderLabel(); ?>
            <?php echo $form['name']->render(); ?>
            <?php echo $form['name']->renderError(); ?>
            <?php echo $form['_csrf_token'] ?>
          </div>
           <div class="wrap">
            <?php echo $form['initial_fee']->renderLabel(); ?>
            <?php echo $form['initial_fee']->render(); ?>
            <?php echo $form['initial_fee']->renderError(); ?>
          </div>
           <div class="wrap">
            <?php echo $form['renewal_fee']->renderLabel(); ?>
            <?php echo $form['renewal_fee']->render(); ?>
            <?php echo $form['renewal_fee']->renderError(); ?>
          </div>
           <div class="wrap">
            <?php echo $form['sub_initial_fee']->renderLabel(); ?>
            <?php echo $form['sub_initial_fee']->render(); ?>
            <?php echo $form['sub_initial_fee']->renderError(); ?>
            <?php echo $form['_csrf_token'] ?>
          </div>
           <div class="wrap">
            <?php echo $form['sub_renewal_fee']->renderLabel(); ?>
            <?php echo $form['sub_renewal_fee']->render(); ?>
            <?php echo $form['sub_renewal_fee']->renderError(); ?>
          </div>
           <div class="wrap">
            <?php echo $form['renewal_period']->renderLabel(); ?>
            <?php echo $form['renewal_period']->render(); ?>
            <?php echo $form['renewal_period']->renderError(); ?>
          </div>
           <div class="wrap">
            <?php echo $form['fly_missions']->renderLabel(); ?>
            <?php echo $form['fly_missions']->render(); ?>
            <?php echo $form['fly_missions']->renderError(); ?>
          </div>
             <div class="wrap">
            <?php echo $form['newsletters']->renderLabel(); ?>
            <?php echo $form['newsletters']->render(); ?>
            <?php echo $form['newsletters']->renderError(); ?>
          </div>
             <div class="wrap">
            <?php echo $form['sub_newsletters']->renderLabel(); ?>
            <?php echo $form['sub_newsletters']->render(); ?>
            <?php echo $form['sub_newsletters']->renderError(); ?>
          </div>
          <input type="hidden" value="<?php echo $referer?>" id="back" name="back"/>
          <div class="form-submit">
                  <a href="#" onclick="$('#mclass_form').submit(); return false;" class="btn-action"><span>Save</span><strong>&nbsp;</strong></a>
                  <a href="<?php echo url_for('@mclass') ?>" class="cancel">Cancel</a>
          </div>
        </div>
  </form>
</div>
</div>
