<?php use_stylesheets_for_form($form);?>
<?php use_javascripts_for_form($form);?>

<h2><?php echo $title ?></h2>

<div class="passenger-form">
  <form action="<?php echo url_for('account/update') ?>" method="post">
    <input type="hidden" name="id" value="<?php echo $account->getId() ?>" />
    <input type="hidden" name="referer" value="<?php echo $referer ?>" />
    <?php if (isset($error_msg)){?>
      <span style="color:red;"><?php echo $error_msg?></span>
    <?php }?>
       <?php foreach ($form->getGlobalErrors() as $name => $error): ?> 
	              <li><?php echo $name.': '.$error ?></li>
	     <?php endforeach; ?>
    <div class="box">
      <div class="wrap">
        <?php echo $form['_csrf_token'] ?>
        <?php echo $form['title']->renderLabel()?>
        <?php echo $form['title']->renderError(); ?>
        <?php echo $form['title']->render(); ?>
      </div>
      <div class="wrap">
        <?php echo $form['first_name']->renderLabel(); ?>
        <?php echo $form['first_name']->render(); ?>
        <?php echo $form['first_name']->renderError(); ?>
      </div>
      <div class="wrap">
        <?php echo $form['middle_name']->renderLabel(); ?>
        <?php echo $form['middle_name']->renderError(); ?>
        <?php echo $form['middle_name']->render(); ?>
      </div>
      <div class="wrap">
        <?php echo $form['last_name']->renderLabel(); ?>
        <?php echo $form['last_name']->render(); ?>
        <?php echo $form['last_name']->renderError(); ?>
      </div>
      <div class="wrap">
        <?php echo $form['suffix']->renderLabel(); ?>
        <?php echo $form['suffix']->renderError(); ?>
        <?php echo $form['suffix']->render(); ?>
      </div>
      <div class="wrap">
        <?php echo $form['nickname']->renderLabel(); ?>
        <?php echo $form['nickname']->renderError(); ?>
        <?php echo $form['nickname']->render(); ?>
      </div>
      <div class="wrap">
        <?php echo $form['gender']->renderLabel(); ?>
        <?php echo $form['gender']->renderError(); ?>
        <?php echo $form['gender']->render(); ?>
      </div>
      <div class="wrap">
        <?php echo $form['address1']->renderLabel(); ?>
        <div class="wrap">
          <?php echo $form['address1']->renderError(); ?>
          <?php echo $form['address1']->render(); ?>
          <?php echo $form['address2']->renderError(); ?>
          <?php echo $form['address2']->render(); ?>
        </div>
      </div>
      <div class="wrap">
        <?php echo $form['city']->renderLabel(); ?>
        <?php echo $form['city']->renderError(); ?>
        <?php echo $form['city']->render(); ?>
      </div>
      <div class="wrap">
        <?php echo $form['county']->renderLabel(); ?>
        <?php echo $form['county']->renderError(); ?>
        <?php echo $form['county']->render(); ?>
      </div>
      <div class="wrap">
        <?php echo $form['state']->renderLabel(); ?>
        <?php echo $form['state']->renderError(); ?>
        <?php echo $form['state']->render(); ?>
      </div>
      <div class="wrap">
        <label><?php echo $form['zipcode']->renderLabelName(); ?></label>
        <?php echo $form['zipcode']->renderError(); ?>
        <?php echo $form['zipcode']->render(); ?>
      </div>
      <div class="wrap">
        <?php echo $form['country']->renderLabel(); ?>
        <?php echo $form['country']->renderError(); ?>
        <?php echo $form['country']->render(); ?>
      </div>
    </div>

    <div class="box alt">
      <div class="passenger-form-heading">
        <strong>Phone Number</strong>
        <strong>Comment</strong>
      </div>
      <div class="wrap">
        <?php echo $form['day_phone']->renderLabel(); ?>
        <?php echo $form['day_phone']->renderError(); ?>
        <?php echo $form['day_phone']->render(); ?>
        <?php echo $form['day_comment']->renderError(); ?>
        <?php echo $form['day_comment']->render(); ?>
      </div>
      <div class="wrap">
        <?php echo $form['evening_phone']->renderLabel(); ?>
        <?php echo $form['evening_phone']->renderError(); ?>
        <?php echo $form['evening_phone']->render(); ?>
        <?php echo $form['evening_comment']->renderError(); ?>
        <?php echo $form['evening_comment']->render(); ?>
      </div>
      <div class="wrap">
        <?php echo $form['mobile_phone']->renderLabel(); ?>
        <?php echo $form['mobile_phone']->renderError(); ?>
        <?php echo $form['mobile_phone']->render(); ?>
        <?php echo $form['mobile_comment']->renderError(); ?>
        <?php echo $form['mobile_comment']->render(); ?>
      </div>
      <div class="wrap">
        <?php echo $form['pager_phone']->renderLabel(); ?>
        <?php echo $form['pager_phone']->renderError(); ?>
        <?php echo $form['pager_phone']->render(); ?>
        <?php echo $form['pager_comment']->renderError(); ?>
        <?php echo $form['pager_comment']->render(); ?>
      </div>
      <div class="wrap">
        <?php echo $form['pager_email']->renderLabel(); ?>
        <?php echo $form['pager_email']->renderError(); ?>
        <?php echo $form['pager_email']->render(); ?>
      </div>
      <div class="wrap">
        <?php echo $form['other_phone']->renderLabel(); ?>
        <?php echo $form['other_phone']->renderError(); ?>
        <?php echo $form['other_phone']->render(); ?>
        <?php echo $form['other_comment']->renderError(); ?>
        <?php echo $form['other_comment']->render(); ?>
      </div>
      <div class="wrap">
        <?php echo $form['fax_phone1']->renderLabel(); ?>
        <div class="wrap">
          <div class="wrap">
            <?php echo $form['fax_phone1']->renderError(); ?>
            <?php echo $form['fax_phone1']->render(); ?>
            <?php echo $form['fax_comment1']->renderError(); ?>
            <?php echo $form['fax_comment1']->render(); ?>
          </div>
          <div class="fax-choice">
            <?php echo $form['auto_fax']->renderError(); ?>
            <?php echo $form['auto_fax']->render(); ?>
            <?php echo $form['auto_fax']->renderLabel(); ?>
          </div>
        </div>
      </div>
      <div class="wrap">
        <?php echo $form['fax_phone2']->renderLabel(); ?>
        <?php echo $form['fax_phone2']->render(); ?>
        <?php echo $form['fax_phone2']->renderError(); ?>
        <?php echo $form['fax_comment2']->render(); ?>
        <?php echo $form['fax_comment2']->renderError(); ?>
      </div>
    </div>

    <div class="box full">
      <div class="wrap">
        <?php echo $form['block_mailings']->renderLabel(); ?>
        <?php echo $form['block_mailings']->renderError(); ?>
        <?php echo $form['block_mailings']->render(); ?>
        <label class="raw" for="<?php echo $form->getName().'_block_mailings'?>">Yes</label>
      </div>
      <div class="wrap">
        <?php echo $form['newsletter']->renderLabel(); ?>
        <?php echo $form['newsletter']->renderError(); ?>
        <?php echo $form['newsletter']->render(); ?>
        <label class="raw" for="<?php echo $form->getName().'_newsletter'?>">Yes</label>
      </div>
      <div class="wrap">
        <?php echo $form['email']->renderLabel(); ?>
        <?php echo $form['email']->renderError(); ?>
        <?php echo $form['email']->render(); ?>
      </div>
      <div class="wrap">
        <?php echo $form['secondary_email']->renderLabel(); ?>
        <?php echo $form['secondary_email']->renderError(); ?>
        <?php echo $form['secondary_email']->render(); ?>
      </div>
      <div class="wrap">
        <?php echo $form['email_blocked']->renderLabel(); ?>
        <?php echo $form['email_blocked']->renderError(); ?>
        <?php echo $form['email_blocked']->render(); ?>
        <label class="raw" for="<?php echo $form->getName().'_email_blocked'?>">Yes</label>
      </div>
      <div class="wrap">
        <?php echo $form['email_text_only']->renderLabel(); ?>
        <?php echo $form['email_text_only']->renderError(); ?>
        <?php echo $form['email_text_only']->render(); ?>
        <label class="raw" for="<?php echo $form->getName().'_email_text_only'?>">Yes</label>
      </div>
      <div class="wrap">
        <?php echo $form['comment']->renderLabel(); ?>
        <?php echo $form['comment']->renderError(); ?>
        <?php echo $form['comment']->render(); ?>
      </div>
      <div class="wrap">
        <?php echo $form['veteran']->renderLabel(); ?>
        <?php echo $form['veteran']->renderError(); ?>
        <?php echo $form['veteran']->render(); ?>
        <label class="raw" for="<?php echo $form->getName().'_veteran'?>">Yes</label>
      </div>
      <input type="hidden" id="back" name="back" value="<?php echo $back?>"/>
      <div class="form-submit">
        <a href="#" onclick="$('#account_form_submit').click(); return false;" class="btn-action"><span>Save</span><strong>&nbsp;</strong></a>
        <a href="<?php echo url_for('account') ?>" class="cancel">Cancel</a>
        <input type="submit" id="account_form_submit" class="hide"/>
      </div>
    </div>
  </form>
</div>


