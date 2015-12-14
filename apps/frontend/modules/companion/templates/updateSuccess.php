<?php use_stylesheets_for_form($form);?>
<?php use_javascripts_for_form($form);?>

<?php $person = $passenger->getPerson(); ?>

<h2><?php echo $form->isNew() ? 'Add New Companion':'Edit Companion' ?></h2>
<div class="preferences" style="width:325px;">
  <div class="frame">
    <div class="bg">
      <div class="holder">
        <h4>Passenger
          <?php if ($sf_user->hasCredential(array('Administrator','Staff','Pilot','Coordinator','Volunteer'), false)) {
            echo link_to('view', '@default?module=passenger&action=view&id='.$passenger->getId(), array('class' => 'action-view'));
          }?>
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
    <form action="<?php echo url_for('@default?module=companion&action=update&passenger_id='.$passenger->getId().(!$form->getObject()->isNew()?'&id='.$form->getObject()->getId():'')) ?>" method="post">
      <?php echo $form->renderHiddenFields()?>
      <input type="hidden" name="referer" value="<?php echo $referer ?>" />
      <?php //if(isset($back)):?><!--<input type="hidden" id="back" name="back" value="<?php echo $back?>"/>--><?php //endif;?>
      <?php echo $form->renderGlobalErrors()?>
      <div class="box">
        <div class="wrap">
                <?php echo $form['name']->renderLabel(); ?>
                <?php echo $form['name']->render(); ?>
                <?php echo $form['name']->renderError(); ?>
        </div>
         <div class="wrap">
                <?php echo $form['relationship']->renderLabel(); ?>
                <?php echo $form['relationship']->render(); ?>
                <?php echo $form['relationship']->renderError(); ?>
        </div>
         <div class="wrap">
                <?php echo $form['date_of_birth']->renderLabel(); ?>
                <?php echo $form['date_of_birth']->render(); ?>
                <?php echo $form['date_of_birth']->renderError(); ?>
        </div>
         <div class="wrap">
                <?php echo $form['weight']->renderLabel(); ?>
                <?php echo $form['weight']->render(); ?>
                <?php echo $form['weight']->renderError(); ?>
        </div>
         <div class="wrap">
                <?php echo $form['companion_phone']->renderLabel(); ?>
                <?php echo $form['companion_phone']->render(); ?>
                <?php echo $form['companion_phone']->renderError(); ?>
        </div>
         <div class="wrap">
                <?php echo $form['companion_phone_comment']->renderLabel(); ?>
                <?php echo $form['companion_phone_comment']->render(); ?>
                <?php echo $form['companion_phone_comment']->renderError(); ?>
        </div>
        <div class="form-submit">
          <input type="submit" class="hide" id="comp_form_submit"/>
          <a href="#" onclick="$('#comp_form_submit').click(); return false;" class="btn-action"><span>Save</span><strong>&nbsp;</strong></a>
          <a href="<?php echo $referer ?>" class="cancel">Cancel</a>
        </div>
      </div>
    </form>
  </div>
</div>