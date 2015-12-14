<h2>Copy Itinerary</h2>
<br/>
<form method="post" action="<?php echo url_for('@itinerary_copy?id='.$sf_request->getParameter('id').'&type=copy')?>">
<?php
$i = 1;
foreach ($missions as $mission): 
?>
    <div>
        <table border="1" cellspacing="2" width="100%">
    <tbody>
    <tr><th>Mission <?php echo $mission->getId();?></th></tr>
    <tr>
        <th><label for="mission_date">Mission Date</label></th>
        <td>
          <input type="text" id="mission_date_<?php echo $i;?>" class="mission_date" name="mission_date[]">
        </td>
    </tr>
    <tr>
        <th><label for="date_requested">Request Date</label></th>
        <td>
          <input type="text" id="date_requested_<?php echo $i;?>" class="date_requested" name="date_requested[]" value="<?php echo $mission->getDateRequested(); ?>">
        </td>
    </tr>
    <tr>
        <th><label for="appt_date">Appointment Date</label></th>
        <td>
          <input type="text" id="appt_date_<?php echo $i;?>" class="appt_date" name="appt_date[]">
        </td>
    </tr>
    <tr>
        <th><label for="flight_time">Flight Time</label></th>
        <td>
          <input type="text" id="flight_time" name="flight_time[]">
        </td>
    </tr>
    <tr>
        <th><label for="mission_specific_comments">Mission Specific Comments</label></th>
        <td>
          <input type="text" id="mission_specific_comments" name="mission_specific_comments[]">
        </td>
    </tr>
    </tbody>
    </table>
    </div>
<?php $i++; endforeach; ?>
    <?php $passengers = PassengerPeer::retrieveByPK($missions[0]->getPassengerId()); ?>
    <table border="1" cellspacing="2" width="100%">
            <tr>
                <th><label for="lodging">Lodging</label></th>
                <td>
                    Name: &nbsp;<input type="text" id="lodging_name" name="lodging_name" value="<?php if($passengers->getLodgingName()){ echo $passengers->getLodgingName(); } else { echo 'n/a';}?>">
                    <br>Phone: &nbsp;<input type="text" id="lodging_phone" name="lodging_phone" value="<?php echo $passengers->getLodgingPhone()?>">
                    <br>Phone Comment: &nbsp;<input type="text" id="lodging_phone_comment" name="lodging_phone_comment" value="<?php echo $passengers->getLodgingPhoneComment()?>">
                </td>
            </tr>
            <tr>
                <th><label for="releasing_physician">Releasing Physician</label></th>
                <td>
                    Name: &nbsp;<input type="text" id="releasing_physician" name="releasing_physician" value="<?php echo $passengers->getReleasingPhysician();?>">
                    <br>Phone: <input type="text" id="releasing_phone" name="releasing_phone" value="<?php echo $passengers->getReleasingPhone();?>">
                </td>
            </tr>
            <tr>
                <th><label for="facility">Facility</label></th>
                <td>
                    Name: &nbsp;<input type="text" id="facility_name" name="facility_name" value="<?php echo $passengers->getFacilityName()?>">
                    <br>Phone: &nbsp;<input type="text" id="facility_phone" name="facility_phone" value="<?php echo $passengers->getFacilityPhone()?>">
                    <br>Phone Comment: &nbsp;<input type="text" id="facility_phone_comment" name="facility_phone_comment" value="<?php echo $passengers->getFacilityPhoneComment()?>">
                </td>
            </tr>
            <tr>
                <th><label for="include_companions">Include Companions</label></th>
                <td>
                    <?php
                        $companions = CompanionPeer::getByPassId($passengers->getId());
                        if($companions != NULL){
                        foreach ($companions as $companion):
                    ?>
                        <input type="checkbox" checked="checked" value="<?php echo $companion->getId();?>" name="companion_id">&nbsp;<?php echo $companion->getName().'&nbsp;('.$companion->getRelationship().')<br>';?>
                    <?php
                        endforeach;
                        }
                        else
                        {
                            echo 'No Companions';
                        }
                    ?>
                </td>
            </tr>
        </table>
    <input type="submit" value="Copy This Itinerary" />
</form>
<script type="text/javascript">
//<![CDATA[
jQuery(document).ready(function() {
  jQuery(function() {
    jQuery(".mission_date").datepicker({ dateFormat: 'yy-mm-dd', changeYear: true, changeMonth: true });
    jQuery(".date_requested").datepicker({ dateFormat: 'yy-mm-dd', changeYear: true, changeMonth: true });
    jQuery(".appt_date").datepicker({ dateFormat: 'yy-mm-dd', changeYear: true, changeMonth: true });
   5});
});
// ]]>
</script>
