<?php use_helper('Javascript');?>
<?php use_stylesheets_for_form($form);?>
<?php use_javascripts_for_form($form);?>

<div class="preferences">
  <div class="frame">
    <div class="bg">
      <div class="holder">
        <h4>Member Record 
        <?php if ($sf_user->hasCredential(array('Administrator','Staff','Pilot','Member','Coordinator','Volunteer'), false)) {?>
          <?php if(isset($member)):?><a class="action-view" href="<?php echo url_for('@member_view?id='.$member->getId())?>">View</a><?php endif;?>
        <?php }?>
        <?php
        if(isset($member)){
          $person = PersonPeer::retrieveByPK($member->getPersonId());
        }
         ?>
        </h4>
        <?php if(isset($person)):?>
        <?php echo ($person->getTitle()?$person->getTitle().'. ':'').$person->getName()?><br/>
        <?php endif;?>
      </div>
      <div class="holder">
        <h4>Lead Coordinator</h4>
        <?php $is_lead = CoordinatorPeer::retrieveByPK($coor->getId())?>
        <?php if($is_lead):?>
        <?php $leader = CoordinatorPeer::retrieveByPK($coor->getId())?>
        <?php if(isset($leader));?>
        <?php 
        $member = MemberPeer::retrieveByPK($leader->getMemberId());
        ?>
         <?php $p = $member->getPerson();?>
        <?php if(isset($member)):?><?php $person = $member->getPerson();?>
           <?php if(isset($person)):?><?php echo $person->getTitle().' '.$person->getFirstName().' '.$person->getLastName()?><?php endif;?>
        <?php endif;?>
        <?php else:?>
        None
        <?php endif;?>
      </div>
    </div>
  </div>
</div>

<div class="passenger-form"> 
<div class="person-view"> 
<h2><?php echo $title ?></h2>
  <form action="<?php echo url_for('@coordinator_create') ?>" method="post" id="coor_form">
    <input type="hidden" name="id" value="<?php echo $coor->getId() ?>" />
    <input type="hidden" name="member_id" value="<?php echo $member->getId() ?>" />
    <input type="hidden" name="referer" value="<?php echo $referer ?>" />
    <?php if(isset($leg_id)):?><input type="hidden" name="leg_id" value="<?php echo $leg_id?>" /><?php endif?>
	     <?php if (isset($error_msg)){?>
          <span style="color:red;"><?php echo $error_msg?></span>
      <?php }?>
      <br/>
          <div class="box">
             <div class="wrap">
                    <?php echo $form['coor_of_the_week']->renderLabel(); ?>
                    <?php echo $form['coor_of_the_week']->render(); ?>
                    <?php echo $form['coor_of_the_week']->renderError(); ?>
             </div>
             <div class="wrap">
                    <?php echo $form['coor_week_date']->renderLabel(); ?>
                    <?php echo $form['coor_week_date']->render(); ?>
                    <?php echo $form['coor_week_date']->renderError(); ?>
             </div>
             <div class="wrap">
                    <?php echo $form['initial_contact']->renderLabel(); ?>
                    <?php echo $form['initial_contact']->render(); ?>
                    <?php echo $form['initial_contact']->renderError(); ?>
                    <?php echo $form['_csrf_token'] ?>
            </div>
            <input type="hidden" id="back" name="back" value="<?php echo $back?>"/>
            <div class="form-submit">
              <a href="#" onclick="$('#coor_form').submit(); return false;" class="btn-action"><span>Save</span><strong>&nbsp;</strong></a>
              <a href="<?php echo url_for($referer) ?>" class="cancel">Cancel</a>
            </div>
          </div>
  </form>
 </div>
 </div>