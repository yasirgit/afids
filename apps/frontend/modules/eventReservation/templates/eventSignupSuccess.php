<?php use_helper('Form');
$date_widget = $sf_data->getRaw('date_widget');
use_javascripts_for_form($date_widget);
use_stylesheets_for_form($date_widget);
$sf_response->addJavascript('/js/jquery.meio.mask.min.js');
?>


<h2>Event Reservation</h2>
<br/>
<h1><?php echo $event->getEventName();?></h1>
<?php echo "Date: ".date('m-d-Y',  strtotime($event->getEventDate()));?>
<br/>For more information: <?php echo "  <b>".$event->getContactInfo()."</b>"; ?><br/>

<!-- Step start to process event reservation  -->

<div class="steps-area">
    <?php
        if($sf_context->getActionName() == 'eventSignup'){
                $class1= 'first-active';
                $class2= '';
                $class3= '';
        }elseif($sf_context->getActionName() == 'step2'){
                $class1= 'first-checked';
                $class2= 'active';
                $class3= '';
        }elseif($sf_context->getActionName() == 'step3'){
                $class1= 'first-checked';
                $class2= 'checked';
                $class3= 'active';
        }
    ?>
    <div class="step-list">
        <script type="text/javascript">
            jQuery(document).ready(function() {
                jQuery('.first').click(function() { return false; });
                jQuery('.second').click(function() { return false; });
                jQuery('.fifth').click(function() { return false; });
            });
        </script>
        <ul>
            <li class="<?php echo $class1?>" style="display: list-item;" id="s1">
                <a  href="#" class="first" ><strong>Step 1</strong><span   class="right-c"></span></a>
            </li>
            <li class="<?php echo $class2?>" style="display: list-item;" id="s2">
                <a href="#" class="second" >Step 2</a>
            </li>
            <li class="<?php echo $class3?>" style="display: list-item;" id="s3">
                <a href="#" class="fifth" >Step 3</a>
            </li>
        </ul>
    </div>

    <div class="steps-holder">
        <!-- Step 1 start-->
        
        <div class="step" style="display: none;" id="step1">
            <div class="passenger-form">                
                <form id="form1" action="" method="post">
                    <input type="hidden" name="event_id"  value="<?php echo $event->getId();?>"/>
                    <?php echo $form1['_csrf_token'];?>
                    <h3>Personal Information</h3>                    
                    <fieldset>
                        <div class="box">
                            <div class="wrap">
                                <?php echo $form1['first_name']->renderLabel(); ?>
                                <?php echo $form1['first_name']->render(); ?>
                                <?php echo $form1['first_name']->renderError(); ?>
                            </div>
                            <div class="wrap">
                                <?php echo $form1['last_name']->renderLabel(); ?>
                                <?php echo $form1['last_name']->render(); ?>
                                <?php echo $form1['last_name']->renderError(); ?>
                            </div>
                             <div class="wrap">
                                <?php echo $form1['address']->renderLabel(); ?>
                                <?php echo $form1['address']->render(); ?>
                                <?php echo $form1['address']->renderError(); ?>
                            </div>                            
                            <div class="wrap">
                                <?php echo $form1['city']->renderLabel(); ?>
                                <?php echo $form1['city']->render(); ?>
                                <?php echo $form1['city']->renderError(); ?>
                            </div>
                            <div class="wrap">
                                <label>State</label>
                                        <select name="state">                                            
                                            <option value="AL">Alabama</option>
                                            <option value="AK">Alaska</option>
                                            <option value="AZ">Arizona</option>
                                            <option value="AR">Arkansas</option>
                                            <option value="CA">California</option>
                                            <option value="CO">Colorado</option>
                                            <option value="CT">Connecticut</option>
                                            <option value="DE">Delaware</option>
                                            <option value="DC">District of Columbia</option>
                                            <option value="FL">Florida</option>
                                            <option value="GA">Georgia</option>
                                            <option value="HI">Hawaii</option>
                                            <option value="ID">Idaho</option>
                                            <option value="IL">Illinois</option>
                                            <option value="IN">Indiana</option>
                                            <option value="IA">Iowa</option>
                                            <option value="KS">Kansas</option>
                                            <option value="KY">Kentucky</option>
                                            <option value="LA">Louisiana</option>
                                            <option value="ME">Maine</option>
                                            <option value="MD">Maryland</option>
                                            <option value="MA">Massachusetts</option>
                                            <option value="MI">Michigan</option>
                                            <option value="MN">Minnesota</option>
                                            <option value="MS">Mississippi</option>
                                            <option value="MO">Missouri</option>
                                            <option value="MT">Montana</option>
                                            <option value="NE">Nebraska</option>
                                            <option value="NV">Nevada</option>
                                            <option value="NH">New Hampshire</option>
                                            <option value="NJ">New Jersey</option>
                                            <option value="NM">New Mexico</option>
                                            <option value="NY">New York</option>
                                            <option value="NC">North Carolina</option>
                                            <option value="ND">North Dakota</option>
                                            <option value="OH">Ohio</option>
                                            <option value="OK">Oklahoma</option>
                                            <option value="OR">Oregon</option>
                                            <option value="PA">Pennsylvania</option>
                                            <option value="PR">Puerto Rico</option>
                                            <option value="RI">Rhode Island</option>
                                            <option value="SC">South Carolina</option>
                                            <option value="SD">South Dakota</option>
                                            <option value="TN">Tennessee</option>
                                            <option value="TX">Texas</option>
                                            <option value="UT">Utah</option>
                                            <option value="VT">Vermont</option>
                                            <option value="VA">Virginia</option>
                                            <option value="WA">Washington</option>
                                            <option value="WV">West Virginia</option>
                                            <option value="WI">Wisconsin</option>
                                            <option value="WY">Wyoming</option>
                                        </select>
                            </div>
                            <div class="wrap">
                                <label>Country</label>
                                    <select name="country" >
                                        <option value="United States">United States</option>
                                        <option value="Canada">Canada</option>
                                        <option value="Mexico">Mexico</option>
                                    </select>
                            </div>
                            
                            <div class="wrap">
                                <?php echo $form1['zipcode']->renderLabel(); ?>
                                <?php echo $form1['zipcode']->render(); ?>
                                <?php echo $form1['zipcode']->renderError(); ?>
                            </div>
                            <div class="wrap">
                                <?php echo $form1['phone']->renderLabel(); ?>
                                <?php echo $form1['phone']->render(); ?>
                                <?php echo $form1['phone']->renderError(); ?>
                            </div>
                             <div class="wrap">
                                <?php echo $form1['email']->renderLabel(); ?>
                                <?php echo $form1['email']->render(); ?>
                                <?php echo $form1['email']->renderError(); ?>
                            </div>
                            <div class="wrap">
                                <?php echo $form1['adult_guests']->renderLabel(); ?>
                                <?php echo $form1['adult_guests']->render(); ?>
                                <?php echo $form1['adult_guests']->renderError(); ?>
                                <?php if(isset($adult_rate)) echo $adult_rate." per person."?>
                            </div>
                            <div class="wrap">
                                <?php echo $form1['child_guests']->renderLabel(); ?>
                                <?php echo $form1['child_guests']->render(); ?>
                                <?php echo $form1['child_guests']->renderError(); ?>
                                 <?php if(isset($child_reate)) echo $child_reate." per person."?>
                            </div>                            
                            <div class="form-submit">
                               <a href="#" style="margin-right:10px; float:left;" onclick="$('#form1').submit();return false;" class="btn-action"><span>Save and Continue &gt;&gt;</span><strong>&nbsp;</strong></a>
                               <a style="float:left; display: block;" href="/calendar" class="cancel">Cancel</a>
                            </div>
                        </div>
                    </fieldset>
                </form>
            </div>
        </div>

        <!-- Step 1 END-->

        <!-- Step 2 start-->

        <div class="step" style="display: none" id="step2">
            <div class="passenger-form">
                <form id="form2" action="/eventReservation/step2" method="post">
                    <?php if( isset($total_guests) && $total_guests < 1 ){ ?>
                        <h3>Please press save button to continue to next step</h3>
                    <?php } else { ?>
                        <h3>Please provide the names of your guests</h3>
                    <?php } ?>
                    <br />
                    <fieldset>
                        <div class="box">
                            <?php if(isset($total_guests)){?>                              
                                <table border="2">
                                    <tr>
                                       <td>
                                           1
                                       </td>
                                       <td>
                                           <input type="text"  disabled="disabled" value="<?php echo $yourname ?>" />
                                           <input type="hidden" name="guest[1]"  value="<?php echo $yourname ?>"  />
                                       </td>
                                   </tr>
                                   <?php for($i = 1 ; $i <= $total_guests ; $i++ ){?>
                                        <tr>
                                            <td>
                                                <?php echo $i+1; ?>
                                            </td>
                                            <td>                                               
                                                <input type="text" name="guest[<?php echo $i+1; ?>]" value="" />
                                            </td>
                                       </tr>
                                  <?php } ?>                                  
                               </table>
                                <table>
                                    <tr>
                                        <td>
                                          <div class="form-submit">
                                            <a href="#" style="margin-right:10px; float:left;" onclick="$('#form2').submit();return false;" class="btn-action"><span>Save and Continue &gt;&gt;</span><strong>&nbsp;</strong></a>
                                            <a style="float:left; display: block;" href="/eventReservation/eventSignup?id=<?php echo $event->getId();?>" class="cancel">Back</a>
                                          </div>
                                        </td>  
                                  </tr>
                                </table>
                           <?php } ?>
                        </div>
                    </fieldset>
                </form>
            </div>
        </div>

        <!-- Step 2 END-->

        <!-- Step 3 start-->

        <div class="step" style="display: none;" id="step3">
            
            <div class="passenger-form">
                <form id="form3" action="#" method="post">
                    <h3>Payment Information</h3>
                    <div id="info" style="display: block">
                        <p>Please enter your credit card information below. This information will be sent via secure connection to our credit card processor. This transaction is safe and secure. We accept MasterCard, Visa, and Discover.</p>
                    </div>
                    <div>
                        <h1>Your total amount to be paid : <?php if(isset($total))echo "$".$total; ?></h1>
                    </div>
                    <br/>
                    <fieldset>
                        <div class="box" style="width:700px">
                            <script type="text/javascript">
                              jQuery(document).ready(function() {
                                jQuery(function() {
                                 jQuery('#application_ccard_number').setMask({ autoTab: false, mask: '9999-9999-9999-9999', onValid: function () { $('#application_ccard_number_mask_ok').html($('#application_ccard_number').val().length == 19 ? 'ok' : ''); }, onInvalid: function () { $('#application_ccard_number_mask_ok').html('invalid'); } });
                               });
                               });
                            </script>
                             <table border="2">
                                    <tr>
                                        <td><b>Credit Card Number: &nbsp&nbsp </b></td>
                                       <td>                                           
                                           <input type="text" name="credit_card_no"  size="20" maxlength="19" id="application_ccard_number" autocomplete="off"/>
                                           &nbsp&nbsp (Visa/MasterCard/Discover)
                                       </td>
                                       <td><span class="field_ok" id="application_ccard_number_mask_ok"></span></td>
                                       
                                   </tr>
                                   <tr><td>&nbsp</td><td>&nbsp</td></tr>
                                    <tr>
                                        <td><b>Expiration:</b></td>
                                       <td>
                                           <select style="margin-right:10px;" name="expir_month">
                                                <option value="01">Jan</option>
                                                <option value="02">Feb</option>
                                                <option value="03">Mar</option>
                                                <option value="04">Apr</option>
                                                <option value="05">May</option>
                                                <option value="06">Jun</option>
                                                <option value="07">Jul</option>
                                                <option value="08">Aug</option>
                                                <option value="09">Sep</option>
                                                <option value="10">Oct</option>
                                                <option value="11">Nov</option>
                                                <option value="12">Dec</option>
                                           </select>
                                           <?php if(isset($currentYear)){ ?>
                                               <select name="expir_year">
                                                   <?php for($i = $currentYear ; $i <= $currentYear+10 ; $i++ ){?>
                                                        <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                                                   <?php } ?>
                                               </select>
                                           <?php } ?>
                                           <?php //echo $date_widget->render('expiration');?>
                                       </td>
                                   </tr>
                                    <tr><td>&nbsp</td><td>&nbsp</td></tr>
                                    <tr>
                                        <td><b>Security Code: &nbsp&nbsp </b></td>
                                       <td>
                                           <input type="text" name="security_code"   size="4" maxlength="4" autocomplete="off" />
                                           &nbsp&nbsp (3-4 character code found on the card)
                                       </td>                                      
                                   </tr>
                             </table>
                             <table>
                                <tr>
                                    <td>
                                      <div class="form-submit">
                                        <a href="#" style="margin-right:10px; float:left;" onclick="$('#form3').submit();return false;" class="btn-action"><span>Save and Continue &gt;&gt;</span><strong>&nbsp;</strong></a>
                                        <a style="float:left; display: block;" href="/calendar" class="cancel">Cancel</a>
                                      </div>
                                    </td>
                                </tr>
                             </table>
                        </div>
                    </fieldset>
                </form>
            </div>
        </div>

        <!-- Step 3 END-->

    </div>
</div>

<!-- Step End of event reservation -->


