<?php use_stylesheets_for_form($form);?>
<?php use_javascripts_for_form($form);?>
<div class="passenger-form">
<div class="person-view"> 
<div class="preferences" style="width:325px;">
  <div class="frame">
    <div class="bg">
      <div class="holder">
        <h4>Person Record 
        <?php if ($sf_user->hasCredential(array('Administrator','Staff','Pilot','Coordinator','Volunteer'), false)) {?>
          <a class="action-view" href="<?php echo url_for('@person_view?id='.$person->getId())?>">View</a>
        <?php }?>
        </h4>
        <?php echo ($person->getTitle()?$person->getTitle().'. ':'').$person->getName()?><br/>
        <?php echo ($person->getCity()?$person->getCity().', ':'').$person->getState()?><br/>
        <?php echo $person->getCountry()?>
      </div>
    </div>
  </div>
</div>
<h2><?php echo $title ?></h2>
<form action="<?php echo url_for('@contact_create') ?>" method="post" id="contact_form">
    <input type="hidden" name="id" value="<?php echo $contact->getId() ?>" />
    <input type="hidden" name="person_id" value="<?php echo $person->getId() ?>" />
    <input type="hidden" name="referer" value="<?php echo $referer ?>" />
       <?php foreach ($form->getGlobalErrors() as $name => $error): ?> 
	              <li><?php echo $name.': '.$error ?></li>
	     <?php endforeach; ?>
      <br/>
      <fieldset>
      <div class="box">
      <div class="wrap">
              <?php echo $form['ref_source_id']->renderLabel(); ?>
              <?php echo $form['ref_source_id']->render(); ?>
              <?php echo $form['ref_source_id']->renderError(); ?>
              <input type="hidden" id="back" name="back" value="<?php echo $back?>"/>
      </div>
      <div class="wrap">
              <?php echo $form['send_app_format']->renderLabel(); ?>
              <?php echo $form['send_app_format']->render(); ?>
              <?php echo $form['send_app_format']->renderError(); ?>
      </div>
      <div class="wrap">
              <?php echo $form['comment']->renderLabel(); ?>
              <?php echo $form['comment']->render(); ?>
              <?php echo $form['comment']->renderError(); ?>
      </div>
      <div class="wrap">
              <?php echo $form['letter_sent']->renderLabel(); ?>
              <?php echo $form['letter_sent']->render(); ?>
              <?php echo $form['letter_sent']->renderError(); ?>
      </div>
          <div class="wrap">
              <?php echo $form['contact_type_id']->renderLabel(); ?>
              <?php echo $form['contact_type_id']->render(); ?>
              <?php echo $form['contact_type_id']->renderError(); ?>
      </div>
      <div class="wrap">
              <?php echo $form['company_name']->renderLabel(); ?>
              <?php echo $form['company_name']->render(); ?>
              <?php echo $form['company_name']->renderError(); ?>
              <?php echo $form['_csrf_token'] ?>
      </div>
      <input type="hidden" value="<?php echo $referer?>" id="back" name="back"/>
      <div class="form-submit">
              <a href="#" onclick="$('#contact_form').submit(); return false;" class="btn-action"><span>Save</span><strong>&nbsp;</strong></a>
              <a href="<?php echo url_for($referer) ?>" class="cancel">Cancel</a>
      </div>
       </div>
      </fieldset>
  </form>
  </div>
  </div>