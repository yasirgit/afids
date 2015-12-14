<?php use_helper('jQuery', 'Form', 'Object');
$date_widget = $sf_data->getRaw('date_widget');
use_javascripts_for_form($date_widget);
use_stylesheets_for_form($date_widget);
?>
  <div class="mission-requests-content">
    <h2>Missing Waiver(s) Report</h2>
  <div class="filtering">
  <form action="<?php echo url_for('@missing_waivers')?>" method="post" id="form_filter">
    <input type="hidden" name="filter" value="1"/>
    <fieldset>
        <div class="holder">
        <label for="form-item-2">Mission Date Range</label>
        <?php echo $date_widget->render('mission_date1', $mission_date1);?>
        <strong class="to">to</strong>
        <?php echo $date_widget->render('mission_date2', $mission_date2);?>
      </div>
      <div class="holder1">
        <label>Wing</label>
                    <?php
                    if(!isset($wing)) $wing = null;
                    echo select_tag('wing',
                            objects_for_select($wings, 'getId', 'getName', $wing,
                                    array('include_custom' => 'All')), array('id' => 'wing_list', 'class' => 'text'));
                    ?>
      </div>
        <div class="holder2">
        <label>Passenger</label>
        <input name="pass_name" type="text" class="text1" value="<?php echo isset($pass_name)?$pass_name:'';?>"/>
      </div>
        <div class="holder2">
        <label>Pilot</label>
        <input name="pilot_name" type="text" class="text1" value="<?php echo isset($pilot_name)?$pilot_name:'';?>"/>
      </div>
        <div class="holder3">
	    <input type="submit" value="Find"/>
	    <?php echo link_to('reset', '@missing_waivers')?>
        </div>
    </fieldset>
  </form>
  </div>
</div>

 <?php if ($pager->getNbResults()) {?>
<div class="pager">
  Mission Request per page:
  <?php foreach ($max_array as $i => $v) {
    if ($i) echo ' | ';
    echo link_to_if($max != $v, $v, '@missing_waivers?max='.$v);
  }?>
  <div>
    <form action="<?php echo url_for('@missing_waivers')?>">
      <?php echo link_to('Previous', '@missing_waivers?page='.$pager->getPreviousPage(), array('class' => 'btn-pager-prev'))?>
      <input type="text" name="page" class="active-page" value="<?php echo $pager->getPage()?>"/>
      <strong>of <?php echo link_to($pager->getLastPage(), '@missing_waivers?page='.$pager->getLastPage())?></strong>
      <?php echo link_to('Next', '@missing_waivers?page='.$pager->getNextPage(), array('class' => 'btn-pager-next'))?>
      <input type="submit" class="hide"/>
    </form>
  </div>
</div>
<br/>

<div id="body_part">
    <div>
    <a class="all-select" href="#" id="select_all">select all</a>
    </div><br/>
<form name="update_waiver" action="<?php echo url_for('@missing_waivers_update')?>" method="post">
<table class="mission-request-table">
<thead>
  <tr>
    <td class="cell-1">Mission Date</td>
    <td class="cell-2">Passenger Name</td>
    <td class="cell-3">Pilot Name</td>
    <td class="cell-4">Date Received</td>
  </tr>
</thead>
<tbody>
  <?php $line = 0; ?>
  <?php foreach ($leg_list as $leg): ?>
  <tr>
      <?php $mission = MissionPeer::retrieveByPK($leg->getMissionId())?>
    <td>
     <div class="date-list">
                <?php echo $mission->getMissionDate('m/d/Y');?><br/>
                <?php echo $mission->getExternalId();?>
      </div>
    </td>
    <td class="cell-3">
     <div class="s-list">
      <?php if(isset($mission)): ?>
          <?php $pass = PassengerPeer::retrieveByPK($mission->getPassengerId());?>
          <?php if(isset($pass)):?><?php $per = PersonPeer::retrieveByPK($pass->getPersonId());?>
                <?php if($per):?>
                    <?php echo $per->getTitle().$per->getFirstName() .' '.$per->getLastName()?>
                <?php endif;?>
          <?php endif;?>
      <?php endif;?>
      </div>
    </td>
    <td class="cell-4">
     <div class="s-list">
      <?php if($leg->getPilotId()):?>
          <?php $pilot = PilotPeer::retrieveByPK($leg->getPilotId())?>
          <?php if(isset($pilot)):?>
              <?php $member = MemberPeer::retrieveByPK($pilot->getMemberId())?>
              <?php if(isset($member)): ?>
                  <?php $person = PersonPeer::retrieveByPK($member->getPersonId())?>
                  <?php if(isset($person)):?>
                       <?php echo $person->getTitle().$person->getFirstName() .' '.$person->getLastName().'<br/>'?>
                       <?php if ($person->getEmail()) echo mail_to($person->getEmail())?>
                  <?php endif;?>
              <?php endif;?>
          <?php endif;?>
      <?php endif;?>
     </div>
     </td>
     <td>
     <div class="name-list">
         <?php echo $date_widget->render($line);?>
         <input type="hidden" name="id<?php echo $line?>" value="<?php echo $leg->getId()?>"/>
         <?php 
         if($line==0){
            echo '<a id="paste" title="Click to copy this field value to all checked field(s) below" href="#">'.image_tag('ico-action-copy.gif', 'align=absmiddle').'</a>';
         }else {
            echo '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
         }
         ?>
         <input type="checkbox" name="set[]" value="<?php echo $line?>"/>
         <br>
         <a class="waiver-clear" href="#" id="today" onclick="javascript:setDate(<?php echo $line?>)">Today</a>&nbsp;|&nbsp;
         <a class="waiver-clear" href="#" onclick="javascript:clearDate(<?php echo $line?>)">Clear</a>
     </div>
    </td>
  </tr>
  <?php $line++;?>
  <?php endforeach;?>
</tbody>
</table><br/>
    <div align="right">
    <input type="submit" value="Update"/>
  </div>
</form>
</div>
 <?php if ($pager->getNbResults()) {?>
<div class="pager">
  Mission Request per page:
  <?php foreach ($max_array as $i => $v) {
    if ($i) echo ' | ';
    echo link_to_if($max != $v, $v, '@missing_waivers?max='.$v);
  }?>
  <div>
    <form action="<?php echo url_for('@missing_waivers')?>">
      <?php echo link_to('Previous', '@missing_waivers?page='.$pager->getPreviousPage(), array('class' => 'btn-pager-prev'))?>
      <input type="text" name="page" class="active-page" value="<?php echo $pager->getPage()?>"/>
      <strong>of <?php echo link_to($pager->getLastPage(), '@missing_waivers?page='.$pager->getLastPage())?></strong>
      <?php echo link_to('Next', '@missing_waivers?page='.$pager->getNextPage(), array('class' => 'btn-pager-next'))?>
      <input type="submit" class="hide"/>
    </form>
  </div>
</div>
<br/>
<?php }?>
<?php }?>
<script type="text/javascript">
//<![CDATA[
function setDate(v){
    var date = new Date();
    jQuery('input[name="'+v+'"]').val(formatDate(date));
};
 function formatDate(date) {
     var day = date.getDate();
     var month = date.getMonth() + 1;
     var year = date.getFullYear();
     return (month < 10 ? '0' : '') + month + '/' + (day < 10 ? '0' : '') + day + '/' + year;
 }
function clearDate(v){
    jQuery('input[name="'+v+'"]').val('');
};
//]]>
jQuery ('#paste').click(function(){
    //alert('in funct.');
    var  field = jQuery('input[name="set[]"]');
    for (i = 0; i < field.length; i++) {
        //alert(field[i].checked);
        if(field[i].checked == true){
            //alert(jQuery(field[i]).val());
            jQuery('input[name="'+jQuery(field[i]).val()+'"]').val(jQuery('input[name="'+jQuery(field[0]).val()+'"]').val());
        }
    }
});

jQuery ('#select_all').click(function(){
    var  field = jQuery('input[name="set[]"]');
    //alert(field.length);
    for (i = 0; i < field.length; i++) {
        field[i].checked = true;
      }
});

</script>