
<?php use_stylesheets_for_form($form1); ?>
<?php use_javascripts_for_form($form1); ?>
<?php use_helper('Javascript', 'Form') ?>
<?php use_helper('jQuery', 'Form') ?>
    <h3>Add New Passenger</h3>
    <div class="steps-area">
        <div class="step-list">
            <ul>
                <li class="first-active" style="display:list-item;" id="s1">
                    <a href="javascript:void(0)" class="first"><strong>Step 1</strong><span class="right-c"></span></a>
                </li>
                <li class="" style="display:list-item;" id="s2">
                    <a href="javascript:void(0)" class="second">Step 2</a>
                </li>
                <li class="" style="display:list-item;" id="s3">
                    <a href="javascript:void(0)" class="third" >Step 3</a>
                </li>
                <li class="" style="display:list-item;" id="s4">
                    <a href="javascript:void(0)" class="forth" >Step 4</a>
                </li>
                <li class="" style="display:list-item;" id="s5">
                    <a href="javascript:void(0)" class="fifth" >Step 5</a>
                </li>
            </ul>
        </div>
    <?php jq_javascript_tag(); ?>
    jQuery(window).load(function () {    
    <?php
    $has = 0;
    if (strstr($sf_context->getActionName(), 'step3')) {
        $has = 1;
    }
    ?>
    var is_step3 = <?php echo $has ?>;
    if(is_step3 == 1){
    jQuery('.fifth').click();
    }
    
    });
    <?php jq_end_javascript_tag(); ?>
    <div class="steps-holder">
        <div class="step" id="step1">
            <div class="passenger-form">
                <?php
                echo jq_form_remote_tag(array(
                    'update' => 'passenger_form',
                    'url' => 'passenger/update1Ajax',
                    'method' => 'post',
                    'loading'  => "jQuery('#loading-lightbox-overlay-image').center();Element.show('loading-lightbox-overlay');",
                    'complete' => "Element.hide('loading-lightbox-overlay');"
                        ), array(
                    'id' => 'form_passenger',
                    'style' => 'display:block;'
                ));
                ?>
                <input type="hidden" name="referer" value="<?php echo $referer ?>" />
                <input type="hidden" id="back" name="back" value="<?php echo $back ?>"/>
                <?php if (isset($f_back)): ?><input type="hidden" name="f_back" value="<?php echo $f_back ?>" /><?php endif; ?>
                    <fieldset>
                        <div class="box">
                            <div class="wrap">
                                <label>Person</label>
                            <?php
                            echo input_auto_complete_tag('person_a', $person_a == '*' ? '' : $person_a,
                                    'person/autoNotPassenger',
                                    array('autocomplete' => 'off', 'class' => 'text narrow', 'style' => '200px'),
                                    array(
                                        'use_style' => true,
                                        'indicator' => 'person_indicator',
                                        'after_update_element' => 'setSelectionId'
                                    )
                            );
                            ?>
                            <input type="hidden" id="personpass_id" name="personpass_id" value="" />
<?php //echo input_hidden_tag('personpass_id') ?>

                            <span id="person_indicator" style="display:none"><?php echo image_tag('/images/loading.gif') ?></span>
<?php echo isset($form1['_csrf_token']) ? $form1['_csrf_token'] : "" ?>
                            <?php if (isset($person_need)): ?>
                                <label style="color:red;">Required!</label>
                        <?php endif; ?>
                                </div>
<?php if ($sf_user->hasCredential(array('Administrator','Staff'), false)): ?>
                                            <!-- a href="<?php echo url_for('person/update?add_pass_iti=' . 'yes') ?>" id="add_per_pass" name="add_per_pass">Add Person and Passenger</a -->
                                    <a onclick="jQuery('#add_new_person_passenger').click();jQuery('#action_from_passenger_or_requester').val('from_passenger');return false;" href="javascript:void(0)" id="add_per_pass" name="add_per_pass">Add Person and Passenger</a>
                            <?php endif; ?>
                                <div class="wrap">
                            <?php echo $form1['passenger_type_id']->renderLabel(); ?>
<?php echo $form1['passenger_type_id']->render(); ?>
<?php echo $form1['passenger_type_id']->renderError(); ?>

                                </div>
                                <div class="wrap">
                            <?php echo $form1['parent']->renderLabel(); ?>
<?php echo $form1['parent']->render(); ?>
<?php echo $form1['parent']->renderError(); ?>
                                </div>
                                <div class="wrap">
                            <?php echo $form1['date_of_birth']->renderLabel(); ?>
<?php echo $form1['date_of_birth']->render(); ?>
<?php echo $form1['date_of_birth']->renderError(); ?>
                                </div>
                                <div class="wrap">
                            <?php echo $form1['weight']->renderLabel(); ?>
<?php echo $form1['weight']->render(); ?>
<?php echo $form1['weight']->renderError(); ?>
                                </div>
                                <div class="wrap">
                            <?php echo $form1['language_spoken']->renderLabel(); ?>
<?php echo $form1['language_spoken']->render(); ?>
<?php echo $form1['language_spoken']->renderError(); ?>
                                </div>
                            </div>
                            <div class="box alt">
                                <div class="wrap">
                            <?php echo $form1['passenger_illness_category_id']->renderLabel(); ?>
<?php echo $form1['passenger_illness_category_id']->render(); ?>
<?php echo $form1['passenger_illness_category_id']->renderError(); ?>
                                </div>
                                <div class="wrap">
                            <?php echo $form1['illness']->renderLabel(); ?>
<?php echo $form1['illness']->render(); ?>
<?php echo $form1['illness']->renderError(); ?>
                                </div>
                                <div class="wrap">
                            <?php echo $form1['best_contact_method']->renderLabel(); ?>
<?php echo $form1['best_contact_method']->render(); ?>
<?php echo $form1['best_contact_method']->renderError(); ?>
                        </div>
                        <div class="form-submit">
                            <a href="javascript:void(0)" onclick="jQuery('#pass1_form_submit').click(); return false;" class="btn-action"><span>Save and Continue >></span><strong>&nbsp;</strong></a>
                            <a href="/person" class="cancel">Cancel</a>
                            <input type="submit" class="hide" id="pass1_form_submit" />
                        </div>
                    </div>
                </fieldset>
                </form>
            </div>
        </div>
    </div>
</div>



