<?php use_stylesheets_for_form($form);?>
<?php use_javascripts_for_form($form);?>

<h2><?php echo $title ?></h2>
<div class="passenger-form">
  <form action="<?php echo url_for('person/update') ?>" method="post" id="person_form">
    <input type="hidden" name="id" value="<?php echo $person->getId() ?>" />
    <input type="hidden" name="referer" value="<?php echo $referer ?>" />
    <input type="hidden" name="key" value="<?php echo $key ?>" />
    <?php echo $form['_csrf_token'] ?>
      <?php if (isset($error_msg)){?>
        <span style="color:red;"><?php echo $error_msg?></span>
      <?php }?>
      <div class="box">
        <div class="wrap">
          <?php echo $form['title']->renderLabel()?>
          <?php echo $form['title']->render(); ?>
          <?php echo $form['title']->renderError(); ?>
        </div>
        <div class="wrap">
          <?php echo $form['first_name']->renderLabel(); ?>
          <?php echo $form['first_name']->render(); ?>
          <?php echo $form['first_name']->renderError(); ?>
        </div>
        <div class="wrap">
          <?php echo $form['middle_name']->renderLabel(); ?>
          <?php echo $form['middle_name']->render(); ?>
          <?php echo $form['middle_name']->renderError(); ?>
        </div>
        <div class="wrap">
          <?php echo $form['last_name']->renderLabel(); ?>
          <?php echo $form['last_name']->render(); ?>
          <?php echo $form['last_name']->renderError(); ?>
        </div>
        <div class="wrap">
          <?php echo $form['suffix']->renderLabel(); ?>
          <?php echo $form['suffix']->render(); ?>
          <?php echo $form['suffix']->renderError(); ?>
        </div>	
        <div class="wrap">
          <?php echo $form['nickname']->renderLabel(); ?>
          <?php echo $form['nickname']->render(); ?>
          <?php echo $form['nickname']->renderError(); ?>
        </div>
        <div class="wrap">
          <?php echo $form['gender']->renderLabel(); ?>
          <?php echo $form['gender']->render(); ?>
          <?php echo $form['gender']->renderError(); ?>
        </div>
        <div class="wrap">
          <?php echo $form['address1']->renderLabel(); ?>
          <div class="wrap">
            <?php echo $form['address1']->render(); ?>
            <?php echo $form['address1']->renderError(); ?>
            <?php echo $form['address2']->render(); ?>
            <?php echo $form['address2']->renderError(); ?>
          </div>
        </div>
        <div class="wrap">
          <?php echo $form['city']->renderLabel(); ?>
          <?php echo $form['city']->render(); ?>
          <?php echo $form['city']->renderError(); ?>
        </div>
        <div class="wrap">
          <?php echo $form['county']->renderLabel(); ?>
          <?php echo $form['county']->render(); ?>
          <?php echo $form['county']->renderError(); ?>
        </div>
        <div class="wrap">
          <?php echo $form['state']->renderLabel(); ?>
          <?php echo $form['state']->render(); ?>
          <?php echo $form['state']->renderError(); ?>
        </div>
        <div class="wrap">
          <?php echo $form['zipcode']->renderLabel(); ?>
          <?php echo $form['zipcode']->render(); ?>
          <?php echo $form['zipcode']->renderError(); ?>
        </div>
        <div class="wrap">
          <?php echo $form['country']->renderLabel(); ?>
          <?php echo $form['country']->render(); ?>
          <?php echo $form['country']->renderError(); ?>
        </div>
      </div>
      
      <div class="box alt">
        <div class="passenger-form-heading">
          <strong>Phone Number</strong>
          <strong>Comment</strong>
        </div>
        <div class="wrap">
          <?php echo $form['day_phone']->renderLabel(); ?>
          <?php echo $form['day_phone']->render(); ?>
          <?php echo $form['day_phone']->renderError(); ?>
          <?php echo $form['day_comment']->render(); ?>
          <?php echo $form['day_comment']->renderError(); ?>
        </div>
        <div class="wrap">
  				<?php echo $form['evening_phone']->renderLabel(); ?>
  				<?php echo $form['evening_phone']->render(); ?>
          <?php echo $form['evening_phone']->renderError(); ?>
  				<?php echo $form['evening_comment']->render(); ?>
          <?php echo $form['evening_comment']->renderError(); ?>
        </div>
        <div class="wrap">
          <?php echo $form['mobile_phone']->renderLabel(); ?>
          <?php echo $form['mobile_phone']->render(); ?>
          <?php echo $form['mobile_phone']->renderError(); ?>
          <?php echo $form['mobile_comment']->render(); ?>
          <?php echo $form['mobile_comment']->renderError(); ?>
        </div>
        <div class="wrap">
          <?php echo $form['pager_phone']->renderLabel(); ?>
          <?php echo $form['pager_phone']->render(); ?>
          <?php echo $form['pager_phone']->renderError(); ?>
          <?php echo $form['pager_comment']->render(); ?>
          <?php echo $form['pager_comment']->renderError(); ?>
        </div>
        <div class="wrap">
					<?php echo $form['pager_email']->renderLabel(); ?>
					<?php echo $form['pager_email']->render(); ?>
          <?php echo $form['pager_email']->renderError(); ?>
        </div>
        <div class="wrap">
          <?php echo $form['other_phone']->renderLabel(); ?>
          <?php echo $form['other_phone']->render(); ?>
          <?php echo $form['other_phone']->renderError(); ?>
          <?php echo $form['other_comment']->render(); ?>
          <?php echo $form['other_comment']->renderError(); ?>
        </div>
        <div class="wrap">
          <?php echo $form['fax_phone1']->renderLabel(); ?>
          <div class="wrap">
            <div class="wrap">
              <?php echo $form['fax_phone1']->render(); ?>
              <?php echo $form['fax_phone1']->renderError(); ?>
              <?php echo $form['fax_comment1']->render(); ?>
              <?php echo $form['fax_comment1']->renderError(); ?>
            </div>
            <div class="fax-choice">
              <?php echo $form['auto_fax']->render(); ?>
              <?php echo $form['auto_fax']->renderLabel(); ?>
              <?php echo $form['auto_fax']->renderError(); ?>
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
          <?php echo $form['block_mailings']->render(); ?>
          <label class="raw" for="<?php echo $form->getName().'_block_mailings'?>">Yes</label>
          <?php echo $form['block_mailings']->renderError(); ?>
        </div>
        <div class="wrap">
          <?php echo $form['newsletter']->renderLabel(); ?>
          <?php echo $form['newsletter']->render(); ?>
          <label class="raw" for="<?php echo $form->getName().'_newsletter'?>">Yes</label>
          <?php echo $form['newsletter']->renderError(); ?>
        </div>
        <div class="wrap">
          <?php echo $form['email']->renderLabel(); ?>
          <?php echo $form['email']->render(); ?>
          <?php echo $form['email']->renderError(); ?>
        </div>
        <div class="wrap">
          <?php echo $form['secondary_email']->renderLabel(); ?>
          <?php echo $form['secondary_email']->render(); ?>
          <?php echo $form['secondary_email']->renderError(); ?>
        </div>
        <div class="wrap">
          <?php echo $form['email_blocked']->renderLabel(); ?>
          <?php echo $form['email_blocked']->render(); ?>
          <label class="raw" for="<?php echo $form->getName().'_email_blocked'?>">Yes</label>
          <?php echo $form['email_blocked']->renderError(); ?>
        </div>
        <div class="wrap">
          <?php echo $form['email_text_only']->renderLabel(); ?>
          <?php echo $form['email_text_only']->render(); ?>
          <label class="raw" for="<?php echo $form->getName().'_email_text_only'?>">Yes</label>
          <?php echo $form['email_text_only']->renderError(); ?>
        </div>
        <div class="wrap">
          <?php echo $form['comment']->renderLabel(); ?>
          <?php echo $form['comment']->render(); ?>
          <?php echo $form['comment']->renderError(); ?>
        </div>
        <div class="wrap">
          <?php echo $form['veteran']->renderLabel(); ?>
          <?php echo $form['veteran']->render(); ?>
          <label class="raw" for="<?php echo $form->getName().'_veteran'?>">Yes</label>
          <?php echo $form['veteran']->renderError(); ?>
        </div>
        <div class="wrap">
          <div class="wrap">
          <?php echo $form['deceased']->renderLabel(); ?>
          <?php echo $form['deceased']->render(); ?>
          <label class="raw" for="<?php echo $form->getName().'_deceased'?>">Yes</label>
          <?php echo $form['deceased']->renderError(); ?>
          <span class="deceased">
            <?php echo $form['deceased_date']->renderLabel(); ?>
            <?php echo $form['deceased_date']->render(); ?>
            <?php echo $form['deceased_date']->renderError(); ?>
          </span>
          </div>
        </div>
        <div class="wrap">
          <?php echo $form['deceased_comment']->renderLabel(); ?>
          <?php echo $form['deceased_comment']->render(); ?>
          <?php echo $form['deceased_comment']->renderError(); ?>
        </div>
        <input type="hidden" id="back" name="back" value="<?php echo $back?>"/>
        <?php if(isset($stepped)):?><input type="hidden" id="has" name="has" value="<?php echo $stepped?>"/><?php endif;?>
        <?php if(isset($camp_id)):?><input type="hidden" id="camp_id" name="camp_id" value="<?php echo $camp_id?>"/><?php endif;?>
        <?php if(isset($itine)):?><input type="hidden" id="iti" name="iti" value="<?php echo $itine?>"/><?php endif;?>
        <?php if(isset($contact)):?><input type="hidden" id="contact" name="contact" value="<?php echo $contact?>"/><?php endif;?>
        <div class="form-submit">
          <a class="btn-action" href="#" onclick="$('#person_form').submit();return false;"><span>Save and Continue &raquo;</span><strong> </strong></a>
          <a class="cancel" href="<?php echo url_for($referer)?>">Cancel</a>
          <input type="submit" class="hide" />
        </div>
      </div>
  </form>
</div>

