<?php use_helper('Form')?>
<?php /* @var $person Person */?>

<div class="step" style="display: block;">
  <div class="passenger-form">
    <form action="<?php echo url_for('contact/processStep1'.(!$form->getObject()->isNew() ? '?id='.$form->getObject()->getId() : '').($form->getObject()->getPersonId() ? '&person_id='.$form->getObject()->getPersonId() : '')) ?>" method="post" >
      <?php echo $form->renderHiddenFields() ?>
      <div class="box">
        <div class="wrap">
          <?php echo $form['title']->renderLabel() ?>
          <?php echo $form['title'] ?>
          <?php echo $form['title']->renderError() ?>
          <?php if ($person) echo content_tag('div', $person->getTitle(), array('class' => 'field_help'))?>
        </div>
        <div class="wrap">
          <?php echo $form['first_name']->renderLabel() ?>
          <?php echo $form['first_name'] ?>
          <?php echo $form['first_name']->renderError() ?>
          <?php if ($person) echo content_tag('div', $person->getFirstName(), array('class' => 'field_help'))?>
        </div>
        <div class="wrap">
          <?php echo $form['last_name']->renderLabel() ?>
          <?php echo $form['last_name'] ?>
          <?php echo $form['last_name']->renderError() ?>
          <?php if ($person) echo content_tag('div', $person->getLastName(), array('class' => 'field_help'))?>
        </div>
        <div class="wrap">
          <?php echo $form['address1']->renderLabel() ?>
          <div class="wrap">
            <?php echo $form['address1'] ?>
            <?php echo $form['address1']->renderError() ?>
            <?php if ($person) echo content_tag('div', $person->getAddress1(), array('class' => 'field_help', 'style' => 'padding:0;'))?>
            <?php echo $form['address2'] ?>
            <?php echo $form['address2']->renderError() ?>
            <?php if ($person) echo content_tag('div', $person->getAddress2(), array('class' => 'field_help', 'style' => 'padding:0;'))?>
          </div>
        </div>
        <div class="wrap">
          One of city, state or zipcode is required *
        </div>
        <div class="wrap">
          <?php echo $form['city']->renderLabel() ?>
          <?php echo $form['city'] ?>
          <?php echo $form['city']->renderError() ?>
          <?php if ($person) echo content_tag('div', $person->getCity(), array('class' => 'field_help'))?>
        </div>
        <div class="wrap">
          <?php echo $form['state']->renderLabel() ?>
          <?php echo $form['state'] ?>
          <?php echo $form['state']->renderError() ?>
          <?php if ($person) echo content_tag('div', $person->getState(), array('class' => 'field_help'))?>
        </div>
        <div class="wrap">
          <?php echo $form['zipcode']->renderLabel() ?>
          <?php echo $form['zipcode'] ?>
          <?php echo $form['zipcode']->renderError() ?>
          <?php if ($person) echo content_tag('div', $person->getZipcode(), array('class' => 'field_help'))?>
        </div>
        <div class="wrap">
          <?php echo $form['country']->renderLabel() ?>
          <?php echo $form['country'] ?>
          <?php echo $form['country']->renderError() ?>
          <?php if ($person) echo content_tag('div', $person->getCountry(), array('class' => 'field_help'))?>
        </div>
      </div>
      <div class="box alt">
        <div class="wrap">
          <?php echo $form['email']->renderLabel() ?>
          <?php echo $form['email'] ?>
          <?php echo $form['email']->renderError() ?>
          <?php if ($person) echo content_tag('div', $person->getEmail(), array('class' => 'field_help'))?>
        </div>
        <div class="wrap">
          <?php echo $form['day_phone']->renderLabel() ?>
          <?php echo $form['day_phone'] ?>
          <?php echo $form['day_comment'] ?>
          <?php echo $form['day_comment']->renderError() ?>
          <?php echo $form['day_phone']->renderError() ?>
          <?php if ($person) echo content_tag('div', $person->getDayPhone(), array('class' => 'field_help'))?>
        </div>
        <div class="wrap">
          <?php echo $form['eve_phone']->renderLabel() ?>
          <?php echo $form['eve_phone'] ?>
          <?php echo $form['eve_phone']->renderError() ?>
          <?php echo $form['eve_comment'] ?>
          <?php echo $form['eve_comment']->renderError() ?>
          <?php if ($person) echo content_tag('div', $person->getEveningPhone(), array('class' => 'field_help'))?>
        </div>
        <div class="wrap">
          <?php echo $form['mobile_phone']->renderLabel() ?>
          <?php echo $form['mobile_phone'] ?>
          <?php echo $form['mobile_phone']->renderError() ?>
          <?php echo $form['mobile_comment'] ?>
          <?php echo $form['mobile_comment']->renderError() ?>
          <?php if ($person) echo content_tag('div', $person->getMobilePhone(), array('class' => 'field_help'))?>
        </div>
        <div class="wrap">
          <?php echo $form['pager_phone']->renderLabel() ?>
          <?php echo $form['pager_phone'] ?>
          <?php echo $form['pager_phone']->renderError() ?>
          <?php echo $form['pager_comment'] ?>
          <?php echo $form['pager_comment']->renderError() ?>
          <?php if ($person) echo content_tag('div', $person->getPagerPhone(), array('class' => 'field_help'))?>
        </div>
        <div class="wrap">
          <?php echo $form['fax_phone']->renderLabel() ?>
          <?php echo $form['fax_phone'] ?>
          <?php echo $form['fax_phone']->renderError() ?>
          <?php echo $form['fax_comment'] ?>
          <?php echo $form['fax_comment']->renderError() ?>
          <?php if ($person) echo content_tag('div', $person->getFaxPhone1(), array('class' => 'field_help'))?>
        </div>
        <div class="form-submit">
          <a class="btn-action" href="#" onclick="$('#step1_submit').click(); return false;"><span>Save and Continue »</span><strong> </strong></a>
          <a class="cancel" href="<?php echo url_for('contact/listRequest')?>">Cancel</a>
          <input type="submit" id="step1_submit" value="submit" class="hide"/>
        </div>
      </div>
    </form>
  </div>
</div>
