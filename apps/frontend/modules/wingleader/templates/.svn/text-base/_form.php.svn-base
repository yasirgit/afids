<?php include_stylesheets_for_form($form) ?>
<?php include_javascripts_for_form($form) ?>
<?php use_helper("Form")?>
<div class="preferences" style="width:325px;">
  <div class="frame">
    <div class="bg">
      <div class="holder">
        <h4>Person Record
        <?php if ($sf_user->hasCredential(array('Administrator','Staff','Pilot','Coordinator','Volunteer'), false)) { ?>
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
<div class="passenger-form">
<div class="person-view">
<form action="<?php echo url_for('wingleader/'.($form->getObject()->isNew() ? 'create' : 'update').(!$form->getObject()->isNew() ? '?id='.$form->getObject()->getId() : '')) ?>" method="post" <?php $form->isMultipart() and print 'enctype="multipart/form-data" ' ?>>
   <?php if(isset($wing_leader_id)):?>
      <?php echo input_hidden_tag("wing_leader_id", $wing_leader_id)?>
   <?php endif;?>
  <?php echo input_hidden_tag("person_id", $sf_request->getParameter("person_id"))?>
<?php if (!$form->getObject()->isNew()): ?>
<input type="hidden" name="sf_method" value="put" />
<?php endif; ?>            
    <fieldset>
      <div class="box">
        <?php echo $form['_csrf_token'] ?>
        <?php echo $form->renderGlobalErrors() ?>
        <?php echo $form['startyear']->renderLabel() ?>        
        <?php echo $form['startyear'] ?>
        <?php echo $form['startyear']->renderError() ?>
      </div>
   </fieldset>
<div class="form-submit">
 <?php echo $form->renderHiddenFields() ?>                    
 <input type="submit" class="hide" id="comp_form_submit" />
 <a href="#" onclick="$('#comp_form_submit').click(); return false;" class="btn-action"><span>Save</span><strong>&nbsp;</strong></a>
 <a class="cancel" href="<?php echo url_for('person/view?id='.$person->getId()) ?>">Cancel</a>
</div>
</form>
</div>
</div>
