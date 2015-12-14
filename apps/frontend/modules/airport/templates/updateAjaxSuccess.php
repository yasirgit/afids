<?php use_helper('Javascript');?>
<?php use_stylesheets_for_form($form);?>
<?php use_javascripts_for_form($form);?>
<?php use_helper('Javascript', 'Form') ?>
<?php use_helper('jQuery', 'Form') ?>
<?php if(isset($formValid)):?>
    <?php echo jq_javascript_tag()?>
        jQuery(document).ready(
            function (){
                jQuery("#airport_name").val('<?php echo $airportName?>');
                jQuery(".airport-new").val("");
                jQuery("#lightbox-overlay").click();
            }
        );
    <?php echo jq_end_javascript_tag()?>
<?php endif;?>
    <div id="airport_form">
            <?php 
            echo jq_form_remote_tag(array(
            'update'  => 'airport_form',
            'url'     => 'airport/updateAjax',
            'method'  => 'post',
            ), array(
            'id'    => 'form_airport',
            'style' => 'display:block;'
            ));
        	  ?> 
        	  <h3>Add New Airport</h3>
        	   <div class="passenger-form">
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
                      </div>
                      <div class="box alt">
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
                            <?php echo $form['_csrf_token'] ?>
                            </div>
                            <input type="hidden" id="back" name="back" value="<?php echo $back?>"/>
                            <div class="form-submit">
                                 <a href="#" onclick="$('#airport_form_submit').click(); return false;" class="btn-action"><span>Save</span><strong>&nbsp;</strong></a>
                                 <input type="submit" class="hide" id="airport_form_submit"/>
                                <a href="<?php echo url_for($back) ?>" class="cancel">Cancel</a>
                            </div>
                        </div><!--box alt-->
            </form>
      </div><!--airport_form-->

      
<script type="text/javascript"> 
//<![CDATA[
jQuery(document).ready(function() {
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

  $('#airport_form_submit').click(function(){
    if($('#airp_ident').val() == null){
      alert('You must confirm Airport Ident to creat new!');
    }
  });

  $("#airp_ident").blur(function () {
    for(i = 0; i< sizeOf; i++ ){
      if($("#airp_ident").get(0).value != null){
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
  });
});
//]]>
</script>
