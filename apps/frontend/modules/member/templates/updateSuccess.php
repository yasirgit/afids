<?php use_stylesheets_for_form($form);?>
<?php use_javascripts_for_form($form);?>

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
<div class="passenger-form">
  <?php if(isset($f_back)):?>
  <form action="<?php echo url_for('member/update?last='.$f_back) ?>" method="post" id="member_form">
  <?php else:?>
  <form action="<?php echo url_for('member/update') ?>" method="post" id="member_form">
  <?php endif;?>
    <input type="hidden" name="id" value="<?php echo $member->getId() ?>" />
    <input type="hidden" name="person_id" value="<?php echo $person->getId() ?>" />
    <input type="hidden" name="referer" value="<?php echo $referer ?>" />
    <?php if(isset($f_back)): ?><input type="hidden" name="f_back" value="<?php echo $f_back ?>" /><?php endif;?>
    
    <?php echo $form->renderGlobalErrors();?>
    <?php echo $form['_csrf_token'] ?>
    <div class="box">
      <div class="title">Personal Information</div>
      <div class="wrap">
        <?php echo $form['date_of_birth']->renderLabel(); ?>
        <?php echo $form['date_of_birth']->render(); ?>
        <?php echo $form['date_of_birth']->renderError(); ?>
      </div>
      <div class="wrap">
        <?php echo $form['weight']->renderLabel(); ?>
        <?php echo $form['weight']->render(); ?> lbs.
        <?php echo $form['weight']->renderError(); ?>
      </div>
      <div class="wrap">
        <?php echo $form['languages']->renderLabel(); ?>
        <?php echo $form['languages']->render(); ?>
        <?php echo $form['languages']->renderError(); ?>
      </div>
    </div>
    <div class="box alt">
      <div class="wrap">
        <?php echo $form['spouse_name']->renderLabel(); ?>
        <?php echo $form['spouse_name']->render(); ?>
        <?php echo $form['spouse_name']->renderError(); ?>
      </div>
      <div class="wrap">
        <?php echo $form['coordinator_notes']->renderLabel(); ?>
        <?php echo $form['coordinator_notes']->render(); ?>
        <?php echo $form['coordinator_notes']->renderError(); ?>
      </div>
    </div>
    <div class="box">
      <div class="title">Membership Information</div>
      <div class="wrap">
        <?php echo $form['wing_id']->renderLabel(); ?>
        <?php echo $form['wing_id']->render(); ?>
        <?php echo $form['wing_id']->renderError(); ?>
      </div>
      <div class="wrap">
        <?php echo $form['secondary_wing_id']->renderLabel(); ?>
        <?php echo $form['secondary_wing_id']->render(); ?>
        <?php echo $form['secondary_wing_id']->renderError(); ?>
      </div>
      <div class="wrap">
        <?php echo $form['join_date']->renderLabel(); ?>
        <?php echo $form['join_date']->render(); ?>
        <?php echo $form['join_date']->renderError(); ?>
      </div>
      <div class="wrap">
        <?php echo $form['member_class_id']->renderLabel(); ?>
        <?php echo $form['member_class_id']->render(); ?>
        <?php echo $form['member_class_id']->renderError(); ?>
      </div>
    </div>
    
    <div class="box alt">
      <div class="title">Pilot Information</div>
      <div class="wrap">
              <?php echo $form['flight_status']->renderLabel(); ?>
              <?php echo $form['flight_status']->render(); ?>
              <?php echo $form['flight_status']->renderError(); ?>
      </div>
      <div class="wrap">
              <?php echo $form['co_pilot']->renderLabel(); ?>
              <?php echo $form['co_pilot']->render(); ?>
              <?php echo $form['co_pilot']->renderError(); ?>
      </div>
      <input type="hidden" id="back" name="back" value="<?php echo $back?>"/>
      <div class="form-submit">
        <a href="#" onclick="$('#member_form').submit(); return false;" class="btn-action"><span>Save</span><strong>&nbsp;</strong></a>
        <a href="<?php echo url_for($referer) ?>" class="cancel">Cancel</a>
      </div>
    </div>
    
    <!--<div class="box">
      <div class="title">Positions</div>
      <?php //$wing_jobs     =  WingJobPeer::doSelect(new Criteria());?>
      <?php //$now_wj_ids = array();?>
      
      <?php //if($member->getId() > 0):?>
        <?php //$now_wing_jobs =  MemberWingJobPeer::getWingJob($member->getId());?>
        <?php //foreach ($now_wing_jobs as $now_wing_job):?>
          <?php //$now_wj_ids[] = $now_wing_job->getWingJobId()?>
        <?php// endforeach;?>
      <?php //endif;?>
      <ul>
       <?php //foreach ($wing_jobs as $wing_job):?>
           <li style="height: 30px;">
           <input
           <?php 
           //if (in_array($wing_job->getId(), $now_wj_ids)) {
             //echo 'checked="checked"';
          // }
           ?>
            id="<?php //echo $wing_job->getName()?>" type="checkbox" name="wing_job1[]" value="<?php //echo $wing_job->getId()?>" />
           <label style="width: 200px;" for="<?php //echo $wing_job->getName()?>"><?php //echo $wing_job->getName()?></label>
           </li>
       <?php //endforeach;?>
       </ul>
    </div>-->
</form>
</div>



