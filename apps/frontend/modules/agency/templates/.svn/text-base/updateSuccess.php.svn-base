<?php use_stylesheets_for_form($form);?>
<?php use_javascripts_for_form($form);?>
<div class="passenger-form">
  <div class="person-view">
    <h2><?php echo $title ?></h2>
    <form action="<?php echo url_for('agency/update') ?>" method="post" id="agency_form">
      <input type="hidden" name="id" value="<?php echo $agency->getId() ?>" />
      <input type="hidden" name="referer" value="<?php echo $referer ?>" />
      <div class="box">
          <div class="wrap">
            <?php echo $form['name']->renderLabel()?>
            <?php echo $form['name']->render(); ?>
            <?php echo $form['name']->renderError(); ?>
            <?php echo $form['_csrf_token'] ?>
          </div>
          <div class="wrap">
            <?php echo $form['address1']->renderLabel()?>
            <?php echo $form['address1']->render(); ?>
            <?php echo $form['address1']->renderError(); ?>
          </div>
          <div class="wrap">
            <?php echo $form['address2']->renderLabel()?>
            <?php echo $form['address2']->render(); ?>
            <?php echo $form['address2']->renderError(); ?>
          </div>
          <div class="wrap">
            <?php echo $form['city']->renderLabel()?>
            <?php echo $form['city']->render(); ?>
            <?php echo $form['city']->renderError(); ?>
          </div>
          <div class="wrap">
            <?php echo $form['county']->renderLabel()?>
            <?php echo $form['county']->render(); ?>
            <?php echo $form['county']->renderError(); ?>
          </div>
          <div class="wrap">
            <?php echo $form['state']->renderLabel()?>
            <?php echo $form['state']->render(); ?>
            <?php echo $form['state']->renderError(); ?>
          </div>
          <div class="wrap">
            <?php echo $form['country']->renderLabel()?>
            <?php echo $form['country']->render(); ?>
            <?php echo $form['country']->renderError(); ?>
          </div>
          <div class="wrap">
            <label><?php echo $form['zipcode']->renderLabelName()?></label>
            <?php echo $form['zipcode']->render(); ?>
            <?php echo $form['zipcode']->renderError(); ?>
          </div>
          <div class="wrap">
            <?php echo $form['phone']->renderLabel()?>
            <?php echo $form['phone']->render(); ?>
            <?php echo $form['phone']->renderError(); ?>
          </div>
          <div class="wrap">
            <?php echo $form['comment']->renderLabel()?>
            <?php echo $form['comment']->render(); ?>
            <?php echo $form['comment']->renderError(); ?>
          </div>
          <div class="wrap">
            <?php echo $form['fax_phone']->renderLabel()?>
            <?php echo $form['fax_phone']->render(); ?>
            <?php echo $form['fax_phone']->renderError(); ?>
          </div>
          <div class="wrap">
            <?php echo $form['fax_comment']->renderLabel()?>
            <?php echo $form['fax_comment']->render(); ?>
            <?php echo $form['fax_comment']->renderError(); ?>
          </div>
          <div class="wrap">
            <?php echo $form['email']->renderLabel()?>
            <?php echo $form['email']->render(); ?>
            <?php echo $form['email']->renderError(); ?>
          </div>
          <input type="hidden" value="<?php echo $referer?>" id="back" name="back"/>
          <div class="form-submit">
              <a href="#" onclick="$('#agency_form').submit(); return false;" class="btn-action"><span>Save</span><strong>&nbsp;</strong></a>
              <a href="<?php echo url_for($referer) ?>" class="cancel">Cancel</a>
          </div>
      </div>
    </form>
  </div>
</div>

<?php if($requesters):?>
<br clear="all"/>
<br>
<h2>Requester</h2>
<table class="mission-request-table">
<thead>
  <tr>
    <td>Name</td>
    <td>Title</td>    
    <td>How find af</td>
    <td>Action</td>
  </tr>
</thead>
<tbody>
  <?php foreach ($requesters as $requester): ?>
  <?php if($requester->getPersonId()):?>
    <?php $person_id = $requester->getPersonId()?>
  <?php endif;?>
  <?php if($person_id):?>
        <?php $person  = PersonPeer::retrieveByPK($person_id);?>
  <?php endif;?>
  <?php $agency = AgencyPeer::retrieveByPK($requester->getAgencyId())?>
  <?php if(isset($agency)):?>
        <?php $a_name = $agency->getName();?>
  <?php endif;?>
  <tr>
    <td class="cell-1">
        <?php if(isset($person)):?><?php echo $person->getFirstName().' '.$person->getLastName()?><?php endif;?>
    </td>

    <td class="cell-1">
     <?php if($requester->getTitle()):?>
          <?php echo $requester->getTitle();?>
    <?php else:?>
     --
    <?php endif;?>
    </td>   

    <td class="cell-1">
     <?php if($requester->getHowFindAF()):?>
          <?php echo $requester->getHowFindAF();?>
     <?php endif;?>
    </td>
    <td class="cell-1">
        <?php if ($sf_user->hasCredential(array('Administrator','Staff','Coordinator'), false)):?><a class="link-edit" href="<?php echo url_for('@requester_edit?id='.$requester->getId())?>">edit</a><?php endif;?>
    </td>
  </tr>
  <?php endforeach;?>
</tbody>
</table>

<?php endif;?>
