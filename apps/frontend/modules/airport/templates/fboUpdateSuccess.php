<script type="text/javascript">
    jQuery(document).ready(function(){
      jQuery("#fbo_discount_amount_0").removeAttr("checked");
      jQuery("#fbo_discount_amount_0").change( function(){
          jQuery("#fbo_fuel_discount").attr("disabled", "true");
      });    
    jQuery("#fbo_discount_amount_1").change( function(){
        jQuery("#fbo_fuel_discount").removeAttr("disabled");       
    })});

</script>

<?php use_stylesheets_for_form($form);?>
<?php use_javascripts_for_form($form);?>
<?php use_stylesheets_for_form($form_airport);?>
<?php use_javascripts_for_form($form_airport);?>
<?php use_helper('Javascript', 'Form') ?>
<?php use_helper('jQuery', 'Form') ?>

<?php use_helper('jQuery'); ?>
<div class="passenger-form">
<div class="person-view"> 
<h2><?php echo $title ?></h2>
  <form action="<?php echo url_for('@fbo_create') ?>" method="post" id="fbo_form">
    <input type="hidden" name="id" value="<?php echo $fbo->getId() ?>" />
    <input type="hidden" name="referer" value="<?php echo $referer ?>" />
    <?php if(isset($leg_id)):?><input type="hidden" name="leg_id" value="<?php echo $leg_id ?>" /><?php endif?>
    <?php if(isset($airport_id)):?><input type="hidden" id="airport_id" value="<?php echo $airport_id?>"/><?php endif?>
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
      <?php if(isset($errairport)):  ?>
      <ul class="error_list">
        <li>Please confirm an airport name!</li>
      </ul>
      <?php endif;?>
      
    </div>
    <a href="#addairport-popup" id="add_new_airport" class="open-popup"></a>
    <div class="wrap">
    <?php echo $form['name']->renderLabel();?>
    <?php echo $form['name']->render();?>
    <?php echo $form['name']->renderError();?>
    </div>
    <div class="wrap">
    <?php echo $form['address']->renderLabel();?>
    <?php echo $form['address']->render();?>
    <?php echo $form['address']->renderError();?>
    </div>
    <div class="wrap">
    <?php echo $form['voice_phone']->renderLabel();?>
    <?php echo $form['voice_phone']->render();?>
    <?php echo $form['voice_phone']->renderError();?>
    </div>
    <div class="wrap">
    <?php echo $form['fax_phone']->renderLabel();?>
    <?php echo $form['fax_phone']->render();?>
    <?php echo $form['fax_phone']->renderError();?>
    </div>
    <div class="wrap">
    <?php echo $form['discount_amount']->renderLabel();?>
    <?php echo $form['discount_amount']->render();?>
    <?php echo $form['discount_amount']->renderError();?>
    </div>
    <div class="wrap">
    <?php echo $form['fuel_discount']->renderLabel();?>
    <?php echo $form['fuel_discount']->render();?>
    <?php echo $form['fuel_discount']->renderError();?>
    </div>
    <?php echo $form['_csrf_token'] ?>
     <div class="form-submit">
              <a href="#" onclick="jQuery('#fbo_form').submit(); return false;" class="btn-action"><span>Save</span><strong>&nbsp;</strong></a>
              <a href="<?php echo url_for('fbo') ?>" class="cancel">Cancel</a>
     </div>
   </div>
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
  if(jQuery('#airport_id').val()){
    if(idents[jQuery('#airport_id').val()]){
      jQuery('#airport').val(idents[jQuery('#airport_id').val()]);
    }
  }
});
//]]>
</script>
