<?php if($sf_user->hasFlash('new_agency')):?>
<script type="text/javascript">
    window.onload = function(){        
         jQuery("#agency").val('<?php echo $sf_user->getFlash('new_agency')?>');         
    }
</script>
<?php endif;?>
<?php use_stylesheets_for_form($form_a);?>
<?php use_javascripts_for_form($form_a);?>
<?php use_helper('Javascript', 'Form') ?>
<?php use_helper('jQuery', 'Form') ?>

<?php if($person):?>
<div class="preferences" style="width:325px;">
  <div class="frame">
    <div class="bg">
      <div class="holder">
        <h4>Person Record 
        <?php if ($sf_user->hasCredential(array('Administrator','Staff','Pilot','Coordinator','Volunteer'), false)){?>
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
<?php endif;?>

<div class="passenger-form">
<h2><?php echo $title ?></h2>
 <?php if(isset($f_back)):?> <form action="<?php echo url_for('requester/create?last='.$f_back) ?>" method="post" id="req_form">
 <?php else:?>
 <form action="<?php echo url_for('requester/create') ?>" method="post" id="req_form">
 <?php endif;?>
    <input type="hidden" name="id" value="<?php echo $requester->getId() ?>" />
    <input type="hidden" name="person_id" value="<?php echo $person->getId() ?>" />
    <input type="hidden" name="referer" value="<?php echo $referer ?>" />
      <div class="box full">
    <?php if(isset($f_back)):?><input type="hidden" name="f_back" value="<?php echo $f_back ?>" /><?php endif;?>
      <?php if (isset($error_msg)){?>
          <span style="color:red;"><?php echo $error_msg?></span>
      <?php }?>
      <a href="#addagency-popup" id="add_new_agency" class="open-popup"></a>
      <div class="wrap">      
      <label>Agency</label>
      <?php echo input_auto_complete_tag('agency', $agency == '*' ? '' : $agency, 
      'agency/autoComplete',
      array('autocomplete' => 'off', 'class'=>'text','style'=>'200px'),
      array(
      'use_style'    => true,
      'indicator'    =>'indicator',
      )
     ); ?>
      <span id="indicator" style="display:none"><?php echo image_tag('/images/loading.gif')?></span>
      <?php if(isset($agency_id)):?><input type="hidden" id="pre_agency_id" value="<?php echo $agency_id?>"/><?php endif;?>
      <a href="#" onclick="jQuery('#add_new_agency').click();return false;">Add New</a>
      </div>
      <div class="wrap">
      <?php echo $form['title']->renderLabel(); ?>
      <?php echo $form['title']->render(); ?>
      <?php echo $form['title']->renderError(); ?>
      </div>      
      <div class="wrap">
      <?php echo $form['how_find_af']->renderLabel(); ?>
      <?php echo $form['how_find_af']->render(); ?>
      <?php echo $form['how_find_af']->renderError(); ?>
      <input type="hidden" id="back" name="back" value="<?php echo $back ?>"/>
      </div>
      <?php echo $form['_csrf_token'] ?>
       <div class="form-submit">
          <a class="btn-action" href="#" onclick="jQuery('#req_form').submit();return false;"><span>Save</span><strong> </strong></a>
          <a class="cancel" href="<?php echo url_for($referer)?>">Cancel</a>
          <input type="submit" class="hide" />
        </div>
        </div>
  </form>
  </div>
  
<input type="hidden" id="req_agency_id"/>
  
   <?php slot('popup') ?>
   <div class="add-passenger" id="addagency-popup" style="display:none; z-index: 1001; position: absolute; left: 400px; top: 145px; ">
     <div class="holder">
        <div class="bg">
          <div id="agency_form">              
            <?php 
            echo jq_form_remote_tag(array(
            'update'  => 'agency_form',
            'url'     => 'agency/updateAjax?req=1&person_id='.$person->getId()."'",
            'method'  => 'post',
            //'complete'  => 'jQuery(\'#addagency-popup\').hide()'
            ), array(
            'id'    => 'form',
            'style' => 'display:block;'
            ));
            ?> 
              <h3>Add New Agency</h3>
              <div class="passenger-form">
                <fieldset>
                  <div class="box">
                    <div class="wrap">
                      <?php echo $form_a['name']->renderLabel()?>
                      <?php echo $form_a['name']->render(); ?>
                      <?php echo $form_a['name']->renderError(); ?>
                      <?php echo $form_a['_csrf_token'] ?>
                    </div>
                    <div class="wrap">
                      <?php echo $form_a['address1']->renderLabel()?>                     
                      <?php echo $form_a['address1']->render(); ?>
                      <?php echo $form_a['address1']->renderError(); ?>
                    </div>
                    <div class="wrap">
                      <?php echo $form_a['address2']->renderLabel()?>                     
                      <?php echo $form_a['address2']->render(); ?>
                      <?php echo $form_a['address2']->renderError(); ?>
                    </div>
                    <div class="wrap">
                      <?php echo $form_a['city']->renderLabel()?>                      
                      <?php echo $form_a['city']->render(); ?>
                      <?php echo $form_a['city']->renderError(); ?>
                    </div>
                    <div class="wrap">
                      <?php echo $form_a['county']->renderLabel()?>                      
                      <?php echo $form_a['county']->render(); ?>
                      <?php echo $form_a['county']->renderError(); ?>
                    </div>
                    <div class="wrap">
                      <?php echo $form_a['state']->renderLabel()?>                      
                      <?php echo $form_a['state']->render(); ?>
                      <?php echo $form_a['state']->renderError(); ?>
                    </div>
                    <div class="wrap">
                      <?php echo $form_a['country']->renderLabel()?>                      
                      <?php echo $form_a['country']->render(); ?>
                      <?php echo $form_a['country']->renderError(); ?>
                    </div>
                    <div class="wrap">
                      <?php echo $form_a['zipcode']->renderLabel()?>                      
                      <?php echo $form_a['zipcode']->render(); ?>
                      <?php echo $form_a['zipcode']->renderError(); ?>
                    </div>
                  </div><!--box-->
                       
                  <div class="box alt">     
                    <div class="wrap">
                      <?php echo $form_a['phone']->renderLabel()?>                      
                      <?php echo $form_a['phone']->render(); ?>
                      <?php echo $form_a['phone']->renderError(); ?>
                    </div>
                    <div class="wrap">
                      <?php echo $form_a['comment']->renderLabel()?>                     
                      <?php echo $form_a['comment']->render(); ?>
                      <?php echo $form_a['comment']->renderError(); ?>
                    </div>
                    <div class="wrap">
                      <?php echo $form_a['fax_phone']->renderLabel()?>                      
                      <?php echo $form_a['fax_phone']->render(); ?>
                      <?php echo $form_a['fax_phone']->renderError(); ?>
                    </div>
                    <div class="wrap">
                      <?php echo $form_a['fax_comment']->renderLabel()?>                      
                      <?php echo $form_a['fax_comment']->render(); ?>
                      <?php echo $form_a['fax_comment']->renderError(); ?>
                    </div>
                    <div class="wrap">
                      <?php echo $form_a['email']->renderLabel()?>                     
                      <?php echo $form_a['email']->render(); ?>
                      <?php echo $form_a['email']->renderError(); ?>
                    </div>
                    <div class="form-submit">
                        <a href="#" onclick="jQuery('#agency_form_submit').click(); return false;" class="btn-action"><span>Save</span><strong>&nbsp;</strong></a>
              <input type="submit" class="hide" id="agency_form_submit"/>
              <a href="<?php echo url_for('requester/create?person_id='.$person->getId())?>" class="cancel">Cancel</a>
              </div>
              </div><!--box alt-->
              </fieldset>
              </div><!--passenger form-->
              </form>
              </div><!--agency_form-->
              </div><!--bg-->
              </div><!--holder-->
              </div><!--addagency-popup-->
<?php end_slot() ?>

<script type="text/javascript">
//<![CDATA[    
jQuery(document).ready(function() {
  <?php
  $names = array();
  $count = 0;
  $agencies = AgencyPeer::getNames();

  foreach ($agencies as $id => $name)
  {
    $names[$id] = $name;
  }
  ?> 
  var names = <?php echo json_encode($names)?>;  
  jQuery('#addagency-popup').hide();
  if(jQuery('#pre_agency_id').val()){
    jQuery('#agency').val(names[jQuery('#pre_agency_id').val()]);
  }

  if(jQuery('#req_agency_id').val()){
    jQuery('#agency').val(names[jQuery('#req_agency_id').val()]);
  }
});
//]]>
</script>