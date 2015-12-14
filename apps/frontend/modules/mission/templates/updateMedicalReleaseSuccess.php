<?php use_helper('Form');
$date_widget = $sf_data->getRaw('date_widget');
use_javascripts_for_form($date_widget);
use_stylesheets_for_form($date_widget);
?>
<?php use_helper('Javascript', 'Form') ?>
<?php use_helper('jQuery', 'Form') ?>

<div class="pilot-requests">
  <h2>Missions Medical Release Status</h2>
  <div class="filtering">
    <form action="" id="form_filter">
      <fieldset>
      <div class="holder">
           <label for="form-item-2">Mission Date Range</label>
           <?php echo $date_widget->render('miss_date1', $miss_date1);?>
           <strong class="to">to</strong>
           <?php echo $date_widget->render('miss_date2', $miss_date2);?>
      </div>
        <div class="holder">
           <label for="form-item-2">Passenger</label>
           <?php //echo select_tag('wing_name', options_for_select($wings, $wing_name, array('include_custom' => '- any -')), array('id' => 'ff_wing_name','class'=>'text narrower'))?>
           <strong class="to"></strong>
           <input type="text" name="passenger" id="passenger" value="<?php echo $passenger?>" class="text"/>
        </div>
       <div class="holder alt">
        <label>Show:</label>
        <ul class="display-choice">
            <li>
              <input type="checkbox" id="form-item-3" value="1" <?php if ($out_off_date) echo 'checked="checked"'?> name="out_off_date"/>
              <label for="form-item-3">Out off date</label><b></b>
            </li>
            <li>
              <input type="checkbox" id="form-item-4" value="1" <?php if ($current) echo 'checked="checked"'?> name="current"/>
              <label for="form-item-4">Current</label>
            </li>
            <li>
              <input type="checkbox" id="form-item-5" value="1" <?php if ($campers) echo 'checked="checked"'?> name="campers"/>
              <label for="form-item-5">Campers</label>
            </li>
          </ul>
        </div>
        <input type="submit" value="Find"/>
            <?php echo link_to('reset', '@update_medical_release?filter=1')?>
        <input class="hide" type="submit" value="submit"/>
      </fieldset>
    </form>
  </div>
  
<?php if ($pager->getNbResults()) {?>
<div class="pager">
  Mission per page:
  <?php foreach ($max_array as $i => $v) {
    if ($i) echo ' | ';
    echo link_to_if($max != $v, $v, '@update_medical_release?max='.$v);
  }?>
  <div>
    <form action="<?php echo url_for('@update_medical_release')?>">
      <?php echo link_to('Previous', '@update_medical_release?page='.$pager->getPreviousPage(), array('class' => 'btn-pager-prev'))?>
      <input type="text" name="page" class="active-page" value="<?php echo $pager->getPage()?>"/>
      <strong>of <?php echo link_to($pager->getLastPage(), '@update_medical_release?page='.$pager->getLastPage())?></strong>
      <?php echo link_to('Next', '@update_medical_release?page='.$pager->getNextPage(), array('class' => 'btn-pager-next'))?>
      <input type="submit" class="hide"/>
    </form>
  </div>
</div>
<br/>

<div id="body_part">
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
        <a href="/mission/view/<?php echo $mission->getId()?>"><?php echo $mission->getId()?></a>
    </td>
    <td class="cell-3">
        <a href="/passenger/view/<?php echo $mission->getPassengerId()?>">
        <?php
        if($mission->getPassengerId()){
          $pass = $mission->getPassenger();
          $person = $pass->getPerson();
          if(isset($person)){
            echo $person->getFirstName().' '.$person->getLastName();
          }
        }
        ?>
        </a>
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

</div>

<div class="pager">
  Mission per page:
  <?php foreach ($max_array as $i => $v) {
    if ($i) echo ' | ';
    echo link_to_if($max != $v, $v, '@update_medical_release?max='.$v);
  }?>
  <div>
    <form action="<?php echo url_for('@update_medical_release')?>">
      <?php echo link_to('Previous', '@update_medical_release?page='.$pager->getPreviousPage(), array('class' => 'btn-pager-prev'))?>
      <input type="text" name="page" class="active-page" value="<?php echo $pager->getPage()?>"/>
      <strong>of <?php echo link_to($pager->getLastPage(), '@update_medical_release?page='.$pager->getLastPage())?></strong>
      <?php echo link_to('Next', '@update_medical_release?page='.$pager->getNextPage(), array('class' => 'btn-pager-next'))?>
      <input type="submit" class="hide"/>
    </form>
  </div>
</div>
<?php }?>
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
    data: jQuery("#medDateForm"+id).serialize(),
    success: function(data){
      jQuery('is_medical'+id).html(data);
      jQuery('#medDateForm'+id).css('opacity', 1);
      window.location.reload();
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

jQuery('#miss_date1').datepicker();
jQuery('#miss_date2').datepicker();
//]]>
</script>-->

<script type="text/javascript">
//<![CDATA[

function setMedDate(id){
  jQuery('#medDateForm'+id).css('opacity', 0.6);
  jQuery.ajax({
    url : '/mission/editMedicalDate',
    type: 'POST',
    data: jQuery("#medDateForm"+id).serialize(),
    success: function(data){
      jQuery('is_medical'+id).html(data);
      jQuery('#medDateForm'+id).css('opacity', 1);
      window.location.reload();
    }
  });
}

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