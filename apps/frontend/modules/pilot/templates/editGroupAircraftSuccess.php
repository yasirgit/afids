<?php if(count($ids)):?>
<h2>Edit Pilot Aircraft</h2>

<div class="passenger-form">
<div class="box">
  <form action="<?php echo url_for('@edit_group_aircraft') ?>" method="post" id="form_air">
   <table>
   <thead>
    <tr>
      <th>Aircraft ID</th>
      <th>Pilot A/ID</th>
      <th>Number</th>
      <th>Make</th>
      <th>Model</th>
      <th>Primary</th>
      <th>Tail Number</th>
      <th>Own</th>
      <th>Seats</th>
      <th>Known Ice</th>
    </tr>
   </thead>  
   <tbody>
   <?php foreach ($ids as $id):?>
    <tr>
    <?php $pilot_air = PilotAircraftPeer::retrieveByPK($id);?>
    <?php if(isset($pilot_air) && $pilot_air instanceof PilotAircraft ):?><?php $air = AircraftPeer::retrieveByPK($pilot_air->getAircraftId())?><?php endif?>
     <td>
      <?php echo $air->getId()?>
      </td>
    <td>
      <?php echo $id?>
      <input type="hidden" id="all_pilot_ids" name="all_pilot_ids[]" value="<?php echo $pilot_air->getId()?>"/>
      <input type="hidden" id="all_air_ids" name="all_air_ids[]" value="<?php echo $air->getId()?>"/>
      </td>
     <td>
      <input type="text" class="text narrowest" id="<?php echo 'tail'.$air->getId()?>" name="<?php echo 'tail'.$air->getId()?>" value="<?php echo $air->getTail()?>"/>
      </td>  
      <td>
      <input type="text" class="text narrow" id="<?php echo 'make'.$air->getId()?>" name="<?php echo 'make'.$air->getId()?>" value="<?php echo $air->getMake()?>"/>
      </td>  
      <td>
      <input type="text" class="text narrow" id="<?php echo 'model'.$air->getId()?>" name="<?php echo 'model'.$air->getId()?>" value="<?php echo $air->getModel()?>"/>
      </td> 
      <td>
      <input type="radio" id="<?php echo 'primary'.$pilot_air->getId()?>" name="primary" value="<?php echo $pilot_air->getId()?>" onclick="getPrimaryId(<?php echo $pilot_air->getId()?>)" <?php if($pilot_air->getPrimary() == 1):?> checked="checked" <?php endif?>/>
      </td> 
      <td>
        <input type="text" class="text narrowest" id="<?php echo 'n_number'.$pilot_air->getId()?>" name="<?php echo 'n_number'.$pilot_air->getId()?>" value="<?php if($pilot_air->getNNumber()):?><?php echo $pilot_air->getNNumber()?><?php endif?>"/>
      </td>
      <td>
        <input type="checkbox" id="<?php echo 'own'.$pilot_air->getId()?>" name="<?php echo 'own'.$pilot_air->getId()?>" <?php if($pilot_air->getOwn() == 1):?> checked="checked" <?php endif?>/>
      </td>
       <td>
        <input type="text" class="text narrowest" id="<?php echo 'seats'.$pilot_air->getId()?>" name="<?php echo 'seats'.$pilot_air->getId()?>" value="<?php if($pilot_air->getSeats()):?><?php echo $pilot_air->getSeats()?><?php endif?>"/>
      </td>
       <td>
        <input type="checkbox" id="<?php echo 'known'.$pilot_air->getId()?>" name="<?php echo 'known'.$pilot_air->getId()?>" <?php if($pilot_air->getKnownIce() == 1):?> checked="checked" <?php endif?>/>
      </td>
    </tr>
   <?php endforeach;?>
    </tbody>
   </table>
   <div class="form-submit">
       <a class="btn-action" onclick="$('#form_air').submit(); return false;" href="#">
        <span>Save</span>
        <strong> </strong>
        </a>
        <a class="cancel" href="<?php echo url_for('account_pilot')?>">Cancel</a>
    </div>
    <input type="hidden" id="is_primary" name="is_primary"/>
  </form>
</div>
</div>
<?php endif;?>

<script type="text/javascript">
//<![CDATA[
$(document).ready(function() {
  
});
function getPrimaryId(id){
  if($('#primary'+id).val()){
    $('#is_primary').val($('#primary'+id).val());
  }
}
//]]>
</script>

