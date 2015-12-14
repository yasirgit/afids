<?php use_helper('Form');
$date_widget = $sf_data->getRaw('date_widget');
use_javascripts_for_form($date_widget);
use_stylesheets_for_form($date_widget);
?>

<?php use_helper('Javascript', 'Form') ?>
<?php use_helper('jQuery', 'Form') ?>
<div id="body_part">
<?php if(isset($missions)):?>
<table class="mission-request-table">
<thead>
  <tr>
    <td class="cell-1">Mission Date</td>
    <td class="cell-2">Mission #</td>
    <td class="cell-3">Passenger</td>
    <td class="cell-4">Need Release?</td>
    <td class="cell-5">Date Recieved</td>
  </tr>
</thead>
<tbody>
  <?php foreach ($missions as $mission): ?>
  <tr>
    <td class="cell-1">
        <?php if($mission->getMissionDate()):?><?php echo date('m/d/y',strtotime($mission->getMissionDate()))?><?php endif;?>
    </td>
    <td class="cell-2">
        <?php echo $mission->getId()?>
    </td>
    <td class="cell-3">
    <?php 
    if($mission->getPassengerId()){
      $pass = $mission->getPassenger();
      $person = $pass->getPerson();
      if(isset($person)){
        echo $person->getLastName().' '.$person->getFirstName();
      }
    }
    ?>
    </td>
   <td class="cell-4">
           <?php if($pass->getNeedMedicalRelease() == 1):?>
              <div id="<?php echo 'edit_need'.$mission->getId()?>" onclick="get(<?php echo $mission->getId()?>)">Yes</div>
            <?php else:?>
              <div id="<?php echo 'edit_need'.$mission->getId()?>" onclick="get(<?php echo $mission->getId()?>)">No</div>
            <?php endif?>
            
            <?php echo input_in_place_editor_tag('edit_need'.$mission->getId(), 'mission/editNeedMedicalRelease?id='.$pass->getId(),array('save_text'=>'Save')) ?>    
            <div id="<?php echo 'need_select'.$mission->getId()?>" style="display:none">
               <?php echo select_tag('need_select'.$mission->getId(), options_for_select(array(
               'Yes',
               'No',
                ),0))?>
            </div>
    </td>
     <td>
     <form id="<?php echo 'medDateForm'.$mission->getId()?>">
     <input type="hidden" id="miss_id" name="miss_id" value="<?php echo $mission->getId()?>"/>
     <input type="hidden" id="pass_id" name="pass_id"/>
     <input type="hidden" id="<?php echo 'passenger_id'.$mission->getId()?>" value="<?php echo $pass->getId()?>" name="<?php echo 'passenger_id'.$mission->getId()?>"/>
     <input type="hidden" id="date" name="date"/>
     
      <?php if($pass->getMedicalReleaseReceived()):?>
       <div id="<?php echo 'is_medical'.$mission->getId()?>" onclick="showDateEditor(<?php echo $mission->getId()?>)"><?php echo date('m/d/y',strtotime($pass->getMedicalReleaseReceived()))?></div>
       <input type="text" id="<?php echo 'medicalDate'.$mission->getId()?>" name="<?php echo 'medicalDate'.$mission->getId()?>" style="display:none" value="<?php echo date('m/d/y',strtotime($pass->getMedicalReleaseReceived()))?>" onchange="passDate(<?php echo $mission->getId()?>)"/>
     <?php else:?>
       <div id="<?php echo 'is_medical'.$mission->getId()?>" onclick="showDateEditor(<?php echo $mission->getId()?>)">--</div>
       <input type="text" id="<?php echo 'medicalDate'.$mission->getId()?>" name="<?php echo 'medicalDate'.$mission->getId()?>" style="display:none" value="" onchange="passDate(<?php echo $mission->getId()?>)"/>
     <?php endif?>
      </form>
    </td>
  </tr>
  <?php endforeach;?>
</tbody>
</table>
<?php else:?>
Nothing found.
<?php endif?>
</div>

<!--
<script type="text/javascript">
//<![CDATA[
function filterForm()
{
  jQuery('#body_part').css('opacity', 0.6);
  jQuery.ajax({
    url : '/mission/filter',
    type: 'POST',
    data: jQuery("#form_filter").serialize(),
    success: function(data){
      jQuery('#body_part').css('opacity', 1).html(data);
    }
  });
}
function setMedDate(id){
  jQuery('#medDateForm'+id).css('opacity', 0.6);
  jQuery.ajax({
    url : '/mission/editMedicalDate',
    type: 'POST',
    data: jQuery('#medDateForm'+id).serialize(),
    success: function(data){
      jQuery('is_medical'+id).html(data);
      jQuery('#medDateForm'+id).css('opacity', 1);
//      window.location.reload();
    }
  });
}
function timeout_init() {
  timeout = setTimeout('filterForm()', 3000);
}
jQuery('#form_filter input:text').bind('click', function(){
  filterForm();
  timeout_init();
});
jQuery('#form_filter input:checkbox').bind('click', function(){
  filterForm();
});

function showDateEditor(id)
{
  if(jQuery('#medicalDate'+id).css('display') == 'none'){

    jQuery('#is_medical'+id).css('display','none');
    jQuery('#medicalDate'+id).css('display','block');
    jQuery('#medicalDate'+id).datepicker();
  }
};

function passDate(id){
  jQuery('#date').val(jQuery('#medicalDate'+id).val());
  jQuery('#pass_id').val(jQuery('#passenger_id'+id).val());
  if(jQuery('#date').val()){
    setMedDate(id);
  }
}

//]]>
</script>
-->