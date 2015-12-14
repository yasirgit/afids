<div class="step" style="display: block;">
  <div class="passenger-form">
    Complete the fields below as the data appears on the pilot application.
    <form action="<?php echo url_for('renewal/step1Check'.(!$form->getObject()->isNew() ? '?id='.$form->getObject()->getId() : '')) ?>" method="post" <?php $form->isMultipart() and print 'enctype="multipart/form-data" ' ?>>
      <?php echo $form->renderHiddenFields() ?>
      <div class="box">
        <div class="wrap">
          <?php echo $form['title']->renderLabel() ?>
          <?php echo $form['title'] ?>
          <?php echo $form['title']->renderError() ?>
        </div>
        <div class="wrap">
          <?php echo $form['first_name']->renderLabel() ?>
          <?php echo $form['first_name'] ?>
          <?php echo $form['first_name']->renderError() ?>
        </div>
        <div class="wrap">
          <?php echo $form['middle_name']->renderLabel() ?>
          <?php echo $form['middle_name'] ?>
          <?php echo $form['middle_name']->renderError() ?>
        </div>
        <div class="wrap">
          <?php echo $form['last_name']->renderLabel() ?>
          <?php echo $form['last_name'] ?>
          <?php echo $form['last_name']->renderError() ?>
        </div>
        <div class="wrap">
          <?php echo $form['suffix']->renderLabel() ?>
          <?php echo $form['suffix'] ?>
          <?php echo $form['suffix']->renderError() ?>
        </div>
        <div class="wrap">
          <?php echo $form['nickname']->renderLabel() ?>
          <?php echo $form['nickname'] ?>
          <?php echo $form['nickname']->renderError() ?>
        </div>
        <div class="wrap">
          <?php echo $form['address1']->renderLabel() ?>
          <div class="wrap">
            <?php echo $form['address1'] ?>
            <?php echo $form['address1']->renderError() ?>
            <?php echo $form['address2'] ?>
            <?php echo $form['address2']->renderError() ?>
          </div>
        </div>
        <div class="wrap">
          One of city, state or zipcode is required *
        </div>
        <div class="wrap">
          <?php echo $form['city']->renderLabel() ?>
            <?php echo $form['city'] ?>
            <?php echo $form['city']->renderError() ?>
        </div>
        <div class="wrap">
          <?php echo $form['state']->renderLabel() ?>
          <?php echo $form['state'] ?>
          <?php echo $form['state']->renderError() ?>
        </div>
        <div class="wrap">
          <?php echo $form['zipcode']->renderLabel() ?>
          <?php echo $form['zipcode'] ?>
          <?php echo $form['zipcode']->renderError() ?>
        </div>
        <div class="wrap">
          <?php echo $form['country']->renderLabel() ?>
          <?php echo $form['country'] ?>
          <?php echo $form['country']->renderError() ?>
        </div>
      </div>
      <div class="box alt">
        <div class="wrap">
          <?php echo $form['email']->renderLabel() ?>
          <?php echo $form['email'] ?>
          <?php echo $form['email']->renderError() ?>
        </div>
        <div class="wrap">
          <?php echo $form['secondary_email']->renderLabel() ?>
          <?php echo $form['secondary_email'] ?>
          <?php echo $form['secondary_email']->renderError() ?>
        </div>
        <div class="wrap">
          <?php echo $form['day_phone']->renderLabel() ?>
          <?php echo $form['day_phone'] ?>
          <?php echo $form['day_comment'] ?>
          <?php echo $form['day_comment']->renderError() ?>
          <?php echo $form['day_phone']->renderError() ?>
        </div>
        <div class="wrap">
          <?php echo $form['eve_phone']->renderLabel() ?>
          <?php echo $form['eve_phone'] ?>
          <?php echo $form['eve_phone']->renderError() ?>
          <?php echo $form['eve_comment'] ?>
          <?php echo $form['eve_comment']->renderError() ?>
        </div>
        <div class="wrap">
          <?php echo $form['mobile_phone']->renderLabel() ?>
          <?php echo $form['mobile_phone'] ?>
          <?php echo $form['mobile_phone']->renderError() ?>
          <?php echo $form['mobile_comment'] ?>
          <?php echo $form['mobile_comment']->renderError() ?>
        </div>
        <div class="wrap">
          <?php echo $form['pager_phone']->renderLabel() ?>
          <?php echo $form['pager_phone'] ?>
          <?php echo $form['pager_phone']->renderError() ?>
          <?php echo $form['pager_comment'] ?>
          <?php echo $form['pager_comment']->renderError() ?>
        </div>
        <div class="wrap">
          <?php echo $form['fax_phone1']->renderLabel() ?>
          <?php echo $form['fax_phone1'] ?>
          <?php echo $form['fax_phone1']->renderError() ?>
          <?php echo $form['fax_comment1'] ?>
          <?php echo $form['fax_comment1']->renderError() ?>
        </div>
        <div class="wrap">
          <?php echo $form['fax_phone2']->renderLabel() ?>
          <?php echo $form['fax_phone2'] ?>
          <?php echo $form['fax_phone2']->renderError() ?>
          <?php echo $form['fax_comment2'] ?>
          <?php echo $form['fax_comment2']->renderError() ?>
        </div>
        <div class="wrap">
          <?php echo $form['other_phone']->renderLabel() ?>
          <?php echo $form['other_phone'] ?>
          <?php echo $form['other_phone']->renderError() ?>
          <?php echo $form['other_comment'] ?>
          <?php echo $form['other_comment']->renderError() ?>
        </div>
        <div class="wrap">
          <?php echo $form['pager_email']->renderLabel() ?>
          <?php echo $form['pager_email'] ?>
          <?php echo $form['pager_email']->renderError() ?>
        </div>
        <div class="wrap">
          <label><?php echo $form['gender']->renderLabelName() ?></label>
          <?php echo $form['gender'] ?>
          <?php echo $form['gender']->renderError() ?>
        </div>
        <div class="wrap">
          <label><?php echo $form['veteran']->renderLabelName() ?></label>
          <?php echo $form['veteran'] ?>
          <?php echo $form['veteran']->renderError() ?>
        </div>
        <div class="wrap">
          <label><?php echo $form['applicant_pilot']->renderLabelName() ?></label>
          <div class="wrap">
            <?php echo $form['applicant_pilot'] ?>
            <?php echo $form['applicant_pilot']->renderError() ?>
            <?php echo $form['applicant_pilot']->renderHelp() ?>
          </div>
        </div>
        <div class="form-submit">
          <a class="btn-action" href="#" onclick="$('#step1_submit').click(); return false;"><span>Save and Continue »</span><strong> </strong></a>
          <a class="cancel" href="#">Cancel</a>
          <input type="submit" id="step1_submit" value="submit" class="hide"/>
        </div>
      </div>
    </form>
  </div>
</div>
