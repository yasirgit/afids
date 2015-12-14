<?php use_helper('jQuery') ?>
<?php if(isset($companion_saved)){ ?>
    <script type="text/javascript">        
        var html = '<tr>'+
                        '<td class="cell-1">'+
                            '<input type="checkbox" value="<?php echo $companion_id?>" id="companion_<?php echo $companion_id?>" name="companions[]">' +
                            '<label for="companion_<?php echo $companion_id?>"><?php echo $companion_saved?></label>' +
                        '</td>' +
                        '<td class="cell-2"><?php echo $relationship?></td>' +
                    '</tr>';
        //jQuery("#companions:nth-child(2)").append(html); # does not work in ie
        jQuery("#companion-table-companions-tbody").append(html);
        jQuery('#form_passenger_companion input[type="text"], #form_passenger_companion textarea').val('');
        jQuery("#addcompanionbutton").click();
        jQuery("#lightbox-overlay").click();
    </script>
<?php } ?>
<div class="holder">
        <div class="bg">
            <h2>Add New Companion</h2>
            <div class="passenger-form">
            <div class="person-view">
            <!-- form action="<?php //echo url_for('itinerary/updateAjaxCompanion?itId='.$itine->getId()) ?>" id="new_companion_form" method="post" -->
                <?php
                echo jq_form_remote_tag(array(
                'update'  => 'addcompanion-popup',
                'url'     => 'itinerary/updateAjaxCompanion?itId='.$itId.'&time=' . urlencode(date('d-m-y-h-i-s')),
                'loading'  => "jQuery('#loading-lightbox-overlay-image').center();Element.show('loading-lightbox-overlay');",
                'complete' => "Element.hide('loading-lightbox-overlay');",
                'method'  => 'post',
                ), array(
                'id'    => 'form_passenger_companion',
                'style' => 'display:block;'
                ));
                        ?>
              <?php echo $form_a->renderHiddenFields()?>
              <?php echo $form_a->renderGlobalErrors()?>
              <div class="box">
                <div class="wrap">
                        <?php echo $form_a['name']->renderLabel(); ?>
                        <?php echo $form_a['name']->render(); ?>
                        <?php echo $form_a['name']->renderError(); ?>
                </div>
                 <div class="wrap">
                        <?php echo $form_a['relationship']->renderLabel(); ?>
                        <?php echo $form_a['relationship']->render(); ?>
                        <?php echo $form_a['relationship']->renderError(); ?>
                </div>
                 <div class="wrap">
                        <?php echo $form_a['date_of_birth']->renderLabel(); ?>
                        <?php echo $form_a['date_of_birth']->render(); ?>
                        <?php echo $form_a['date_of_birth']->renderError(); ?>
                </div>
                 <div class="wrap">
                        <?php echo $form_a['weight']->renderLabel(); ?>
                        <?php echo $form_a['weight']->render(); ?>
                        <?php echo $form_a['weight']->renderError(); ?>
                </div>
                 <div class="wrap">
                        <?php echo $form_a['companion_phone']->renderLabel(); ?>
                        <?php echo $form_a['companion_phone']->render(); ?>
                        <?php echo $form_a['companion_phone']->renderError(); ?>
                </div>
                 <div class="wrap">
                        <?php echo $form_a['companion_phone_comment']->renderLabel(); ?>
                        <?php echo $form_a['companion_phone_comment']->render(); ?>
                        <?php echo $form_a['companion_phone_comment']->renderError(); ?>
                </div>
                  <input type="hidden" name="itId" value="<?php if(isset($itine)) echo $itine->getId()?>" />
                <div class="form-submit">
                  <input type="submit" class="hide" id="comp_form_submit"/>
                  <a href="javascript:void(0)" onclick="jQuery('#comp_form_submit').click(); return false;" class="btn-action"><span>Save</span><strong>&nbsp;</strong></a>
                  <a href="javascript:void(0)<?php //echo $referer ?>" onclick="jQuery('#lightbox-overlay').click();" class="cancel">Cancel</a>
                </div>
              </div>
            </form>
          </div>
        </div>
        </div>
    </div>