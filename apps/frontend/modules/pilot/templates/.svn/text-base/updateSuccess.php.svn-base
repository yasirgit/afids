<?php use_stylesheets_for_form($form);?>
<?php use_javascripts_for_form($form);?>
<?php use_helper('Javascript', 'Form') ?>
<?php use_helper('jQuery', 'Form') ?>

<?php use_helper('jQuery'); ?>
<?php if(isset($member)):?>
<div class="preferences" style="width:325px;">
  <div class="frame">
    <div class="bg">
      <div class="holder">
        <h4>Member Record 
        <?php if ($sf_user->hasCredential(array('Administrator','Staff','Pilot','Member','Coordinator','Volunteer'), false)) {?>
          <a class="action-view" href="<?php echo url_for('@member_view?id='.$member->getId())?>">View</a>
        <?php }?>
        </h4>
        <?php if($member->getPersonId()):?>
        <?php $person = PersonPeer::retrieveByPK($member->getPersonId())?>
        <?php endif;?>
        <?php if(isset($person)):?>
        <?php echo ($person->getTitle()?$person->getTitle().'. ':'').$person->getName()?><br/>
        <?php echo ($person->getCity()?$person->getCity().', ':'').$person->getState()?><br/>
        <?php echo $person->getCountry()?>
        <?php endif;?>
      </div>
    </div>
  </div>
</div>
<?php endif;?>

<div class="passenger-form">
<div class="person-view">  
<h2><?php echo $title ?></h2>
<?php if(isset($member)):?>
  <form action="<?php echo url_for('@pilot_create?member_id='.$member->getId()) ?>" method="post" id="pilot_form">
<?php else:?>
  <form action="<?php echo url_for('@pilot_create?') ?>" method="post" id="pilot_form">
<?php endif;?>
    <input type="hidden" name="id" value="<?php echo $pilot->getId() ?>" />
    <input type="hidden" name="member_id" value="<?php echo $member->getId() ?>" />
    <input type="hidden" name="referer" value="<?php echo $referer ?>" />
    <?php if(isset($leg_id)):?><input type="hidden" name="leg_id" value="<?php echo $leg_id?>"/><?php endif?>
    <?php if(isset($backup)):?><input type="hidden" name="backup" value="<?php echo $backup?>"/><?php endif?>
    <?php if(isset($backup_co)):?><input type="hidden" name="backup_co" value="<?php echo $backup_co?>"/><?php endif?>
    <?php if(isset($airport_id)):?><input type="hidden" id="airport_id" value="<?php echo $airport_id?>"/><?php endif?>
      <?php echo $form['_csrf_token'] ?>
         <?php foreach ($form->getGlobalErrors() as $name => $error): ?> 
	              <li><?php echo $name.': '.$error ?></li>
	     <?php endforeach; ?>
      <fieldset>
        <div class="box">
          <div class="wrap">
                <label>Airport Identifier</label>
                <?php echo input_auto_complete_tag('airport', $airport == '*' ? '' : $airport, 
                'airport/autoComplete',
                array('autocomplete' => 'off', 'class'=>'text','style'=>'200px'),
                array(
                'use_style'    => true,
                'indicator'    =>'airport_indicator',
                )
               ); ?>
                <span id="airport_indicator" style="display:none"><?php echo image_tag('/images/loading.gif')?></span>
          </div>
            <div class="wrap">
                <?php echo $form['secondary_home_bases']->renderLabel();?>
                <?php echo $form['secondary_home_bases']->render();?>
                <?php echo $form['secondary_home_bases']->renderError();?>
          </div>
            <div class="wrap">
                <?php echo $form['total_hours']->renderLabel();?>
                <?php echo $form['total_hours']->render();?>
                <?php echo $form['total_hours']->renderError();?>
          </div>
            <div class="wrap">
                <?php echo $form['license_type']->renderLabel();?>
                <?php echo $form['license_type']->render();?>
                <?php echo $form['license_type']->renderError();?>
          </div>
            <div class="wrap">
                <?php echo $form['ifr']->renderLabel();?>
                <?php echo $form['ifr']->render();?>
                <?php echo $form['ifr']->renderError();?>
          </div>
            <div class="wrap">
                <?php echo $form['multi_engine']->renderLabel();?>
                <?php echo $form['multi_engine']->render();?>
                <?php echo $form['multi_engine']->renderError();?>
          </div>
          <div class="wrap">
                <?php echo $form['oriented_date']->renderLabel();?>
                <?php echo $form['oriented_date']->render();?>
                <?php echo $form['oriented_date']->renderError();?>
          </div>
          <div class="wrap">
                <?php echo $form['se_instructor']->renderLabel();?>
                <?php echo $form['se_instructor']->render();?>
                <?php echo $form['se_instructor']->renderError();?>
          </div>
            <div class="wrap">
                <?php echo $form['me_instructor']->renderLabel();?>
                <?php echo $form['me_instructor']->render();?>
                <?php echo $form['me_instructor']->renderError();?>
          </div>
            <div class="wrap">
                <?php echo $form['other_ratings']->renderLabel();?>
                <?php echo $form['other_ratings']->render();?>
                <?php echo $form['other_ratings']->renderError();?>
          </div>
            <div class="wrap">
                <?php echo $form['insurance_received']->renderLabel();?>
                <?php echo $form['insurance_received']->render();?>
                <?php echo $form['insurance_received']->renderError();?>
          </div>
           <div class="wrap">
                <?php echo $form['hseats']->renderLabel();?>
                <?php echo $form['hseats']->render();?>
                <?php echo $form['hseats']->renderError();?>
          </div>
           <div class="wrap">
                <?php echo $form['transplant']->renderLabel();?>
                <?php echo $form['transplant']->render();?>
                <?php echo $form['transplant']->renderError();?>
          </div>
          <div class="wrap">
                <?php echo $form['mop_oriented_date']->renderLabel();?>
                <?php echo $form['mop_oriented_date']->render();?>
                <?php echo $form['mop_oriented_date']->renderError();?>
          </div>          
          <div class="wrap">
                 <label>Region Served</label>
                  <?php echo input_auto_complete_tag('mop_regions_served',$current_region ? $current_region :'',
                      'pilot/autoCompleteRegion',
                      array('autocomplete' => 'off', 'class'=>'text narrow','style'=>'200px'),
                      array(
                      'use_style'    => true,
                      'indicator'    =>'regions_served',
                      )
                     );
                   ?>
                   <span id="regions_served" style="display:none"><?php echo image_tag('/images/loading.gif')?></span><br /> <br />
          </div>
          <div class="wrap">
             <label>MOP Served by</label>
              <?php echo input_auto_complete_tag('pilot_name',$mopservedby ? $mopservedby :'',
                  'missionLeg/autoCompletePilotSearch',
                  array('autocomplete' => 'off', 'class'=>'text narrow','style'=>'200px'),
                  array(
                  'use_style'    => true,
                  'indicator'    =>'pilot_indicator',
                  //'after_update_element' => 'setPilotId'
                  )
                   );
               ?>
               <span id="pilot_indicator" style="display:none"><?php echo image_tag('/images/loading.gif')?></span><br /> <br />
          </div>
          <input type="hidden" id="back" name="back" value="<?php echo $back?>"/>          
          <div class="form-submit">
                <a class="btn-action" href="#" onclick="jQuery('#pilot_form').submit();return false;"><span>Save&raquo;</span><strong> </strong></a>
                <a class="cancel" href="<?php echo url_for($referer)?>">Cancel</a>
          </div>
        </div>
      </fieldset>
  </form>
</div>
</div>
<script type="text/javascript">
//<![CDATA[
<?php
$idents = array();
  foreach ($airports as $airport)
  {
    if($airport->getIdent()){
      $idents[] = "{$airport->getId()} : '{$airport->getIdent()}'";
    }
  }
  ?>
  var idents = {<?php echo join(',',$idents)?>};

jQuery(document).ready(function() {
  jQuery(function() {
    jQuery("#pilo_insurance_received").datepicker();
  }); 
  jQuery(function() {
    jQuery("#pilo_mop_oriented_date").datepicker();
  });
  jQuery(function() {
    jQuery("#pilo_oriented_date").datepicker();
  });

  if(jQuery('#airport_id').val()){
    if(idents[jQuery('#airport_id').val()]){
      jQuery('#airport').val(idents[jQuery('#airport_id').val()]);
    }
  }
});

// ]]>
</script>
