<?php use_helper('Javascript');?>
<?php use_stylesheets_for_form($form);?>
<?php use_javascripts_for_form($form);?>

<div class="passenger-form">
<div class="person-view"> 
<h2><?php echo $title ?></h2>
  <form action="<?php echo url_for('@airport_create') ?>" method="post" id="airport_form">
    <input type="hidden" id="id" name="id" value="<?php echo $airport->getId()?>"/>
    <?php if(isset($leg_id)):?><input type="hidden" id="leg_id" name="leg_id" value="<?php echo $leg_id?>"/><?php endif?>
    <?php echo $form->renderHiddenFields() ?>
    <input type="hidden" name="referer" value="<?php echo $referer ?>" />
    <?php if(isset($can_edit)):?><input type="hidden" id="can_edit" value="<?php echo $can_edit ?>" /><?php endif;?>
    <div class="box">
    <div class="wrap">
    <?php echo $form['ident']->renderLabel();?>
    <?php echo $form['ident']->render();?>
    <?php echo $form['ident']->renderError();?>
    <span id="ident_warring" style="color:red"></span>
    </div>
    <div class="wrap">
    <?php echo $form['name']->renderLabel();?>
    <?php echo $form['name']->render();?>
    <?php echo $form['name']->renderError();?>
    </div>
    <div class="wrap">
    <?php echo $form['city']->renderLabel();?>
    <?php echo $form['city']->render();?>
    <?php echo $form['city']->renderError();?>
    </div>
    <div class="wrap">
    <?php echo $form['state']->renderLabel();?>
    <?php echo $form['state']->render();?>
    <?php echo $form['state']->renderError();?>
    </div>
    <div class="wrap">
    <?php echo $form['latitude']->renderLabel();?>
    <?php echo $form['latitude']->render();?>
    <?php echo $form['latitude']->renderError();?>
    </div>
    <div class="wrap">
    <?php echo $form['longitude']->renderLabel();?>
    <?php echo $form['longitude']->render();?>
    <?php echo $form['longitude']->renderError();?>
    </div>
    <div class="wrap">
    <?php echo $form['runway_length']->renderLabel();?>
    <?php echo $form['runway_length']->render();?>
    <?php echo $form['runway_length']->renderError();?>
    </div>
    <div class="wrap">
    <?php echo $form['wing_id']->renderLabel();?>
    <?php echo $form['wing_id']->render();?>
    <?php echo $form['wing_id']->renderError();?>
    </div>
    <div class="wrap">
    <?php echo $form['gmt_offset']->renderLabel();?>
    <?php echo $form['gmt_offset']->render();?>
    <?php echo $form['gmt_offset']->renderError();?>
    </div>
    <div class="wrap">
    <?php echo $form['dst_offset']->renderLabel();?>
    <?php echo $form['dst_offset']->render();?>
    <?php echo $form['dst_offset']->renderError();?>
    </div>
    <div class="wrap">
    <?php echo $form['zipcode']->renderLabel();?>
    <?php echo $form['zipcode']->render();?>
    <?php echo $form['zipcode']->renderError();?>
    </div>
    <div class="wrap">
    <?php echo $form['closed']->renderLabel();?>
    <?php echo $form['closed']->render();?>
    <?php echo $form['closed']->renderError();?>
    </div>
    <input type="hidden" value="<?php echo $referer?>" id="back" name="back"/>
     <div class="form-submit">
              <a href="#" onclick="$('#airport_form').submit(); return false;" class="btn-action"><span>Save</span><strong>&nbsp;</strong></a>
              <a href="<?php echo url_for($referer) ?>" class="cancel">Cancel</a>
     </div>
         </div>
  </form>

<?php if(count($fbos)>0):?>
<div>
    <table class="mission-request-table" style="width: 400px">
      <thead>
        <tr>
          <td>Airport</td>
          <td>Name</td>
          <td>Fuel Discount</td>
          <td>Action</td>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($fbos as $fbo): ?>
        <?php $airport_id = $fbo->getAirportId()?>

        <?php if($airport_id):?>
            <?php $airport = AirportPeer::retrieveByPK($airport_id)?>
        <?php endif;?>

        <tr>
          <td class="cell-1">
              <?php if(isset($airport)):?><?php echo $airport->getIdent()?><?php endif;?>
          </td>
          <td class="cell-1">
              <?php if($fbo->getName()):?><?php echo $fbo->getName()?><?php endif;?>
          </td>
          <td class="cell-1">
              <?php if($fbo->getFuelDiscount()):?>
                  <?php echo number_format($fbo->getFuelDiscount(),2)?>
              <?php endif;?>
          <td class="cell-1">
           <?php if ($sf_user->hasCredential(array('Administrator','Staff','Coordinator','Volunteer'), false)):?>
              <a class="link-edit" href="<?php echo url_for('@fbo_edit?id='.$fbo->getId())?>">edit</a>
            <?php endif;?>           
          </td>
        </tr>
        <?php endforeach;?>
      </tbody>
      </table>
  </div>
<?php endif;?>
</div>
</div>

<script type="text/javascript"> 
//<![CDATA[
$(document).ready(function() {

  <?php
  $idents = array();
  $count = 0;
  $airpots = AirportPeer::doSelect(new Criteria());

  $size = sizeof($airpots);

  for($ii = 0; $ii < $size; $ii ++ )
  {
    $idents[] = "{$count} : '{$airpots[$ii]->getIdent()}'";
    $count++;
  }
  ?>

  var sizeOf = <?php echo sizeof($idents) ?>;
  var idents = {<?php echo join(',',$idents)?>};

  $("#airp_ident").blur(function () {
    if($('#can_edit').val() != 1){
      for(i = 0; i< sizeOf; i++ ){
        if($("#airp_ident").get(0).value != ''){
          if(idents[i] == $("#airp_ident").get(0).value){
            $('<div style="color:red">This Ident Name has Already Used !</div>')
            .insertAfter( $(this) )
            .fadeIn('slow')
            .animate({opacity: 1.0}, 3000)
            .fadeOut('slow', function() {
              $(this).remove();
            });
          }
        }
      }
    }
  });
});
//]]>
</script>
