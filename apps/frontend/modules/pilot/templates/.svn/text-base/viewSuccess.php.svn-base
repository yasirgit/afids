<?php use_helper('jQuery');?>
<?php /* @var $pilot Pilot */
$can_edit = $sf_user->hasCredential(array('Administrator'), false);
?>

<h2>Pilot View</h2>
<div class="person-view">
  <h3>Member
  <?php if ($sf_user->hasCredential(array('Administrator','Staff','Pilot','Member','Coordinator','Volunteer'), false)) {?>
  <a class="action-view" href="<?php echo url_for('@member_view?id='.$member->getId())?>">View</a>
  <?php }?>
  </h3>
  <?php if(isset($member)):?>
  <?php $person = PersonPeer::retrieveByPK($member->getPersonId())?>
  <?php endif;?>
  <div class="person-info">
    <dl class="person-data">
    <?php if(isset($person)):?>
      <dt>Name:</dt>
      <dd><?php echo ($person->getTitle()?$person->getTitle().'. ':'').$person->getName()?></dd>

      <dt>Location:</dt>
      <dd>
        <?php if ($person->getCity().$person->getState()){?>
          <?php echo ($person->getCity()?$person->getCity().', ':'').$person->getState()?>
        <?php }else echo "--";?>
      </dd>

      <dt>Country:</dt>
      <dd><?php echo $person->getCountry()?$person->getCountry():'--'?></dd>
     <?php endif?>
    </dl>
    <div class="preferences" style="width:325px; float:left;">
      <div class="frame">
        <div class="bg">
          <div class="holder">
            <h4>Airport</h4>
            <?php if($pilot->getPrimaryAirportId()):?><?php $airport = AirportPeer::retrieveByPK($pilot->getPrimaryAirportId())?><?php endif;?>
            <?php if(isset($airport)):?>
               <dt>Identifier:</dt><?php echo $airport->getIdent()?>
               <br/>
               <dt>Name:</dt><?php echo $airport->getName()?>
               <br/>
            <?php endif;?>
            <?php if(!isset($airport)):?>
               <?php if ($can_edit) echo link_to('specify', '@default?module=airport&action=changeAirport&for='.$pilot->getId(), array('class' => 'link-add'));?>
            <?php else:?>
               <?php if ($can_edit) echo link_to('change', '@default?module=airport&action=changeAirport&for='.$pilot->getId(), array('class' => 'link-add'));?>
               <?php if ($can_edit) echo link_to('unlink', '@default?module=airport&action=unlinkAirport&id='.$pilot->getId(), array('class' => 'action-remove', 'confirm' => 'Are you sure to unlink from this Airport?'));?><br/>
            <?php endif;?>
          </div>
        </div>
      </div>
    </div>
  </div>
  <h3>Pilot Information</h3>
  <?php if ($sf_user->hasCredential(array('Administrator','Staff','Pilot','Coordinator','Volunteer'), false)):?><a href="<?php echo url_for('@pilot_edit?id='.$pilot->getId())?>" class="link-edit">edit pilot info</a><?php endif;?>

  
  <div class="person-info">
    <dl class="person-data">
      <dt>License Type:</dt>
      <dd>
      <?php if($can_edit):?>
         <form action="#" onsubmit="$('#license_type').click();return false;">
            <span class="passenger-form">
              <?php echo $form['license_type']->render(array('id' => 'license_type_edit', 'style' => 'display:none;', 'class' => 'text narrow revertable revertval'))?>
            </span>
          </form>
          <span id="license_type" class="revertable revertval in-place"><?php echo $pilot->getLicenseType() ? $pilot->getLicenseType() : '--' ;?></span>
          <?php echo jq_link_to_function('edit', "changeValue('license_type', this.id, 'license_type_edit', 'license_type_callback');", array('id' => 'license_type', 'class' => 'hide'))?>
          <br clear="all"/>
       <?php else:?>
          <?php echo $pilot->getLicenseType() ? $pilot->getLicenseType() : '--' ;?>
      </dd>
      <?php endif?>
      <dt>IFR Rated:</dt>
      <dd><?php echo ($pilot->getIfr()?'Yes':'No')?></dd>

      <dt>Total Flight Hours:</dt>
      <dd>
      <?php if($can_edit):?>
          <form action="#" onsubmit="$('#total').click();return false;">
            <span class="passenger-form">
              <?php echo $form['license_type']->render(array('id' => 'total_edit', 'style' => 'display:none;', 'class' => 'text narrow revertable revertval'))?>
            </span>
          </form>
          <span id="license_type" class="revertable revertval in-place"><?php echo $pilot->getTotalHours() ? $pilot->getTotalHours() : '--' ;?></span>
          <?php echo jq_link_to_function('edit', "changeValue('license_type', this.id, 'total_edit', 'total_callbeack');", array('id' => 'license_type', 'class' => 'hide'))?>
          <br clear="all"/>
      <?php else:?>
          <?php echo $pilot->getTotalHours()?$pilot->getTotalHours():'--'?>
      <?php endif?>
      </dd>
      
      <dt>Date Oriented:</dt>
      <dd><?php echo $pilot->getOrientedDate()?$pilot->getOrientedDate():'--'?></dd>
      
      <dt>Single-engine Instructor:</dt>
      <dd><?php echo $pilot->getSeInstructor()? $pilot->getSeInstructor():'No'?></dd>
      
      <dt>Multi-engine Instructor:</dt>
      <dd><?php echo $pilot->getMeInstructor()? $pilot->getMeInstructor() :'No'?></dd>
      
      <dt>Insurance Expiration:</dt>
      <dd><?php echo $pilot->getInsuranceReceived()?$pilot->getInsuranceReceived():'--'?></dd>
      <br>
      
      <dt>HSEATS Status:</dt>
      <dd><?php echo $pilot->getHseats()?$pilot->getHseats():'--'?></dd>
      <br>
      
      <dt>Transplant Pilot:</dt>
      <dd><?php echo $pilot->getTransplant()?'Yes':'No'?></dd>
      <br>
      
      <dt>Date Oriented as MOP:</dt>
      <dd><?php echo $pilot->getMopOrientedDate()?$pilot->getMopOrientedDate():'--'?></dd>
      <br>

      <dt>MOP served by:</dt>
      <dd><?php echo $pilot->getMopServedBy() ? $pilot->getMopServedBy() :'--'?></dd>
      <br>
      
      <dt>Regions Served:</dt>
      <dd><?php echo $pilot->getMopRegionsServed()?$pilot->getMopRegionsServed():'--'?></dd>
      <br>
    </dl>
  </div>
  <?php $ids = array()?>
  <?php $count = 0;?>
  <?php if($member->getId()):?>
    <?php $has_pilot_aircrafts = PilotAircraftPeer::getByMemberId($member->getId());?>
    <?php if(isset($has_pilot_aircrafts)):?>
      <?php foreach ($has_pilot_aircrafts as $airc):?>
        <?php $ids[$count] = $airc->getId();
        $count++;
        ?>
      <?php endforeach;?>
    <?php endif;?>
  <?php endif;?>
     <h3>Pilot's Aircraft</h3>
  <?php if(sizeof($ids) !=0):?>
  <?php for($i =0;$i<sizeof($ids);$i++):?>
  <?php $pilot_airc = PilotAircraftPeer::retrieveByPK($ids[$i]);?>
  <?php if(isset($pilot_airc)):?>
  <?php $aircraft = AircraftPeer::retrieveByPK($pilot_airc->getAircraftId())?>
  <?php endif;?>
  <div class="person-info">
    <dl class="person-data">
      <?php if ($sf_user->hasCredential(array('Administrator','Staff'), false)):?><a href="<?php echo url_for('@paircraft_edit?id='.$ids[$i])?>" class="action-edit">edit</a><?php endif?>
      <?php if ($sf_user->hasCredential(array('Administrator'), false)):?>
      <?php echo link_to('remove', '@paircraft_delete?id='.$ids[$i], array('post' => true, 'confirm' => 'Are you sure to remove this aircraft ?', 'class' => 'action-remove'));?>
      <?php endif?>
      <br/>
      <dt>Registration:</dt>
      <dd><?php echo ($aircraft->getName()?$aircraft->getName().'. ':'--')?></dd>

      <dt>Make:</dt>
      <dd><?php echo ($aircraft->getMake()?$aircraft->getMake().'. ':'--')?></dd>

      <dt>Model:</dt>
      <dd><?php echo $aircraft->getModel()?$aircraft->getModel():'--'?></dd>
    </dl>
  </div>
  <?php endfor;?>
    <?php if ($sf_user->hasCredential(array('Administrator','Staff','Pilot','Coordinator','Volunteer'), false)):?><a href="<?php echo url_for('@paircraft_create?member='.$member->getId())?>" class="link-add">Add New</a><?php endif;?>
  <?php else:?>
    <?php if ($sf_user->hasCredential(array('Administrator','Staff','Pilot','Coordinator','Volunteer'), false)):?><a href="<?php echo url_for('@paircraft_create?member='.$member->getId())?>" class="link-add">Add New</a><?php endif;?>
  <?php endif;?>
  
  </div>
  
<?php if ($can_edit) :?>
<?php
$original_values = array(
  "'license_type':'".$pilot->getLicenseType()."'",
  "'total':'".$pilot->getTotalHours()."'",
);
?>
  
<?php jq_javascript_tag()?>
var changes = {};
var original = {<?php echo implode(', ', $original_values)?>};
var revert = {};
var revert_val = {};

function toggle(v, yes_el, no_el, name)
{
  if (v) {
    $('#' + yes_el).show(); $('#' + no_el).hide();
  }else{
    $('#' + yes_el).hide(); $('#' + no_el).show();
  }
  if (original[name] == v) removeChanges(name); else changesMade(name, v);
}

function total_callback(str)
{
  str += '';
  var f = str.charAt(0).toUpperCase();
  return f + str.substr(1);
}

function changeValue(update, save_change, edit, name, save_callback)
{
  var $save_change = $('#' + save_change);
  var $edit = $('#' + edit);
  var $update = $('#' + update);
  var text = $save_change.html();
  var old_text = $save_change.data('text');
  
  if (typeof(old_text) == 'undefined') old_text = text;
  
  if (text == old_text) {
    $save_change.data('text', $save_change.html());
    $save_change.html('save');
    $update.hide();
    var v = $update.html();
    $edit.show().val(v=='--'?'':v).focus();
  }else{
    var v = $edit.val();
    $save_change.data('text', old_text);
    $save_change.html(old_text).addClass('hide');
    $edit.hide();
    if (typeof(save_callback) == 'function') {
      v = save_callback(v);
      $update.show().html(v==''?'--':v);
    }else{
      $update.show().html(v==''?'--':v);
    }
    if (original[name] == v) removeChanges(name); else changesMade(name, v);
  }
}


function revertChanges()
{
  // revert visibility
  for(var id in revert) {
    if (revert[id]) $('#' + id).show(); else $('#' + id).hide(); 
  }
  
  // revert value/content
  for(var id in revert_val) {
    var $el = $('#' + id);
    if ($el.is('input')) $el.val(revert_val[id]); else $el.html(revert_val[id]);
  }
  
  <?php if ($sf_user->hasCredential(array('Administrator'), false)){?>
  // roles
  $('#roles option').each(function (i, el) { el.selected = true; });
  $('.btn-left').click();
  $('#unassociated_roles option').each(function (i, el) { el.selected = ($.inArray(parseInt(el.value), original['roles'])!=-1); });
  $('.btn-right').click();
  <?php }?>

  // cleanup
  for (var i in changes) delete changes[i];
  $('#data_changes').hide();
}

function changesMade(name, value)
{
  changes[name] = value;
  $('#data_changes').show();
}

function removeChanges(name)
{
  if (typeof(changes[name]) != 'undefined') delete changes[name];
  for (var i in changes) return;
  $('#data_changes').hide();
}

function serializeForParam(obj, prefix, level)
{
  var str = '', i = 0;
  if (typeof(level) === 'undefined') level = 0;
  if (typeof(prefix) === 'undefined') prefix = '';
  for(var v in obj)
  {
    if (typeof(obj[v]) === 'object') {
      if (i !== 0) str += '&';
      str += serializeForParam(obj[v], prefix + (level?'[':'') + v + (level?']':''), level + 1);
      i++;
    }else if (typeof(obj[v]) === 'number' || typeof(obj[v]) === 'string' || typeof(obj[v]) === 'boolean') {
      if (i !== 0) str += '&';
      str += prefix + (level?'[':'') + v + (level?']':'') + '=' + obj[v];
      i++;
    }
  }
  return str;
}

function applyChanges()
{
  var params = changes;
  params['person_id'] = <?php echo $person->getId()?>;
  $.ajax({
    url: '<?php echo url_for('@default?module=person&action=save')?>',
    dataType: 'html',
    data: serializeForParam(params),
    success: function (html) {
      $('#notification').html(html).effect('highlight', '', 3000);
      $('#data_changes').hide();
      if (typeof(changes['person_id']) != 'undefined') delete changes['person_id'];
    }
  });
}

function checkUnsaved()
{
  for (var i in changes) return "You have unsaved changes on this page!\n Okay will LOSE CHANGES";
}

$(function () {
  $('.btn-right, .btn-left').click(roleChanged);
  
  $('.revertable').each(function (i, el) { if (el.id) revert[el.id] = $(el).is(':visible'); });
  $('.revertval').each(function (i, el) { if (el.id) { if ($(el).is('input')) revert_val[el.id] = $(el).val(); else revert_val[el.id] = $(el).html(); }});

  $('.in-place')
    .bind('mouseenter', function () { $(this).addClass('hover-edit'); })
    .bind('mouseleave', function () { $(this).removeClass('hover-edit'); });
  $('.in-place').bind('click', function () { $('#'+this.id+'_change').removeClass('hide').click(); });

  window.onbeforeunload = checkUnsaved;
});
<?php jq_end_javascript_tag()?> 

<?php endif?>
