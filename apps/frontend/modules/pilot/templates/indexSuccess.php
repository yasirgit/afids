<?php use_helper('Form', 'Javascript');
?>

<h2>Pilot Find</h2>
<br/>

<div class="missions-available">
  <form id="filter_form" method="post" action="<?php echo url_for('@default_index?module=pilot')?>">
    <input type="hidden" name="filter" value="1"/>
    <fieldset>
      <div class="missions-available-filter">
        <div class="bg">
          <div class="characteristic_clean">
            <div class="holder">
              <div>
                <label for="ff_firstname">First Name</label>
                <!--<input type="text" class="text" value="<?php //echo $firstname?>" id="ff_firstname" name="firstname"/>-->
                <?php echo input_auto_complete_tag('firstname', $firstname == '*' ? '' : $firstname,
                                      'pilot/autoCompleteFirst',
                                      array('autocomplete' => 'off', 'class'=>'text narrow','style'=>'200px'),
                                      array(
                                      'use_style'    => true,
                                      'indicator'    =>'person_indicator',
                                      )
                                       ); ?>
                                        <span id="person_indicator" style="display:none"><?php echo image_tag('/images/loading.gif')?></span>

                <br clear="left"/>
                <label for="ff_lastname">Last Name</label>
                <!--<input type="text" class="text" value="<?php //echo $lastname?>" id="ff_lastname" name="lastname"/>-->
                <?php echo input_auto_complete_tag('lastname', $lastname == '*' ? '' : $lastname,
                                      'pilot/autoCompleteLast',
                                      array('autocomplete' => 'off', 'class'=>'text narrow','style'=>'200px'),
                                      array(
                                      'use_style'    => true,
                                      'indicator'    =>'person_indicator1',
                                      )
                                       ); ?>
                                        <span id="person_indicator1" style="display:none"><?php echo image_tag('/images/loading.gif')?></span>
                <br clear="left"/>
                <label for="ff_city">City</label>
                <input type="text" class="text" value="<?php echo $city?>" id="ff_city" name="city"/>
                <br clear="left"/>
                <label for="ff_state">State</label>
                <input type="text" class="text" value="<?php echo $state?>" id="ff_state" name="state"/>
              </div>
              <div>
                <!--<label for="ff_wing_name">Wing Name</label>
                <input type="text" class="text" value="<?php //echo $wing_name?>" id="ff_wing_name" name="wing_name"/>
                <br clear="left"/>-->
                <label for="ff_wing_name">Wing Name</label>
                  <?php echo select_tag('wing_name', options_for_select($wings, $wing_name, array('include_custom' => '- any -')), array('id' => 'ff_wing_name','class'=>'text narrow'))?>
                <br clear="left"/>
                <!--<label for="ff_flight_status">Flight Status</label>
                  <input type="text" class="text" value="<?php echo $flight_status?>" id="ff_flight_status" name="flight_status"/>-->
                <label for="ff_flight_status">Flight Status</label>
                  <?php echo select_tag('flight_status', options_for_select($flight_statuses, $flight_status, array('include_custom' => '- any -')), array('id' => 'ff_flight_status','class'=>'text narrow'))?>
                <br clear="left"/>
                <label for="ff_available">Available</label>
                <input type="checkbox" id="ff_available" value="1" <?php if ($available) echo 'checked="checked"'?> name="available"/>
                <br clear="left"/>
                <label for="ff_identifier">Identifier</label>
                <input type="text" class="text" value="<?php echo $identifier?>" id="ff_identifier" name="identifier"/>
              </div>
              <div>
                <label for="ff_ifr_rated">IFR Rated</label>
                <input type="checkbox" id="ff_ifr_rated" value="1" <?php if ($ifr_rated) echo 'checked="checked"'?> name="ifr_rated"/>
                <br clear="left"/>
                <label for="ff_n_number">AirCraft Tail Number</label>
                <input type="text" class="text" value="<?php echo $n_number?>" id="ff_n_number" name="n_number"/>
                <br clear="left"/>
               <label for="ff_make">AirCraft Make</label>
                <!--<input type="text" class="text" value="<?php //echo $make?>" id="ff_make" name="make"/>-->
                <?php echo select_tag('make', options_for_select($makes, $make, array('include_custom' => '- any -')), array('id' => 'ff_make','class'=>'text narrow'))?>
               <img src="/images/loading.gif" id="template_loading" style="display:none;"/>

               <?php echo observe_field('ff_make', array(
                'update'   => 'modelContainer',
                'url'      => 'pilot/findModel',
                'with'     => "'name=' + value",
                'loading'  => "Element.show('template_loading')",
                'complete' => "Element.hide('template_loading')",
              )) ?>
               
              </div>
                 <div>
                <label for="ff_model">AirCraft Model</label>
               <!--<input type="text" class="text" value="<?php //echo $model?>" id="ff_model" name="model"/>-->
                <span id="modelContainer">
                  <?php echo select_tag('model', options_for_select($models, $model, array('include_custom' => '- any -')), array('id' => 'ff_model','class'=>'text narrow'))?>
                </span>
               <br clear="left"/>
                <label for="ff_hseat_status">HSEATS Status</label>
                <input type="text" class="text" value="<?php echo $hseat_status?>" id="ff_hseat_status" name="hseat_status"/>
                <br clear="left">
                <label for="ff_transplant">Transplant Status</label>
                <input type="checkbox" id="ff_transplant" value="1" <?php if ($transplant) echo 'checked="checked"'?> name="transplant"/>
              </div>
            </div>
            <input type="submit" value="Find"/>
            <?php echo link_to('reset', '@default_index?module=pilot&filter=1')?>
          </div>
          <input type="submit" class="hide" value="submit"/>
        </div>
      </div>
    </fieldset>
  </form>
</div>

<?php if ( isset($pager) && $pager->getNbResults()) {?>
<div class="pager">
  Pilot per page:
  <?php foreach ($max_array as $i => $v) {
    if ($i) echo ' | ';
    echo link_to_if($max != $v, $v, '@default_index?module=pilot&max='.$v);
  }?>
  <div>
    <form action="<?php echo url_for('@default_index?module=pilot')?>">
      <?php echo link_to('Previous', '@default_index?module=pilot&page='.$pager->getPreviousPage(), array('class' => 'btn-pager-prev'))?>
      <input type="text" name="page" class="active-page" value="<?php echo $pager->getPage()?>"/>
      <strong>of <?php echo link_to($pager->getLastPage(), '@default_index?module=pilot&page='.$pager->getLastPage())?></strong>
      <?php echo link_to('Next', '@default_index?module=pilot&page='.$pager->getNextPage(), array('class' => 'btn-pager-next'))?>
      <input type="submit" class="hide"/>
    </form>
  </div>
</div>

<table class="mission-request-table">
<thead>
  <tr>
    <td>Name</td>
    <td>Primary Airport Details</td>
    <td>Pilot Details</td>
    <td>Action</td>
  </tr>
</thead>
<tbody>
  <?php foreach ($pilots as $pilot): ?>
  <?php if( $pilot->getMemberId()):?>
  <?php 
  $mem_id = $pilot->getMemberId();
  $member = MemberPeer::retrieveByPK($mem_id);
  $person = PersonPeer::retrieveByPK($member->getPersonId());
  ?>
  <?php endif;?>
  <?php 
  if($pilot->getPrimaryAirportId()){
    $airport = AirportPeer::retrieveByPK($pilot->getPrimaryAirportId());
  }
  ?>
  <tr>
    <td class="cell-1">
    <?php if(isset($person)):?>
      <?php echo $person->getFirstName() .' '.$person->getLastName(); ?>
    <?php endif;?>
    </td>
    <td class="cell-1">
    <?php if(isset($airport)):?>
      <div class="name-list">
        <dl>
          <?php if ($airport->getIdent()) {?>
          <dt>Ident:</dt>
          <dd><?php echo $airport->getIdent()?></dd>
          <?php }?>
          <?php if ($airport->getName()) {?>
          <dt>Name:</dt>
          <dd><?php echo $airport->getName()?></dd>
          <?php }?>
          <?php if ($airport->getCity().$airport->getZipcode()) {?>
          <dt>City/Zip code:</dt>
          <dd><?php echo $airport->getCity().' <i>'.$airport->getZipcode().'</i>'?></dd>
          <?php }?>
          <dt></dt>
        </dl>
      </div>
    <?php endif;?>
    </td>
     <td class="cell-1">
      <div class="name-list">
        <dl>
          <?php if ($pilot->getTotalHours()) {?>
          <dt>Totol Hours:</dt>
          <dd><?php echo $pilot->getTotalHours()?></dd>
          <?php }?>
          <?php if ($pilot->getLicenseType()) {?>
          <dt>License Type/ IFR Rated :</dt>
          <dd><?php echo $pilot->getLicenseType().' '.$pilot->getIfr()?></dd>
          <?php }?>
          <?php if ($pilot->getMultiEngine().$pilot->getSeInstructor()) {?>
          <dt>Multi Engine/Se instructor:</dt>
          <dd><?php echo $pilot->getMultiEngine().' <i>'.$pilot->getSeInstructor().'</i>'?></dd>
          <?php }?>
          <dt></dt>
        </dl>
      </div>
    </td>
    <td class="cell-1">
      <ul class="action-list">          
          <?php if ($sf_user->hasCredential(array('Administrator','Staff','Pilot','Coordinator','Volunteer'), false)):?>
            <?php echo link_to('view', '@pilot_view?id='.$pilot->getId(), array('class' => 'action-view'))?><br />
          <?php endif;?>
          <?php if ($sf_user->hasCredential(array('Administrator','Staff','Pilot','Coordinator','Volunteer'), false)):?>
            <a class="link-edit" href="<?php echo url_for('@pilot_edit?id='.$pilot->getId())?>">edit</a><br /><?php endif;?>                
           <?php if ($sf_user->hasCredential(array('Administrator','Staff','Pilot','Coordinator','Volunteer'), false)){?>
           <br /><?php echo link_to('missions assigned to this pilot', 'missionLeg/index?sml=1&p_id='.$pilot->getId())?>
          <?php }?>
      </ul>
    </td>
  </tr>
  <?php endforeach;?>
</tbody>
</table>

<div class="pager">
  Pilot per page:
  <?php foreach ($max_array as $i => $v) {
    if ($i) echo ' | ';
    echo link_to_if($max != $v, $v, '@default_index?module=pilot&max='.$v);
  }?>
  <div>
    <form action="<?php echo url_for('@default_index?module=pilot')?>">
      <?php echo link_to('Previous', '@default_index?module=pilot&page='.$pager->getPreviousPage(), array('class' => 'btn-pager-prev'))?>
      <input type="text" name="page" class="active-page" value="<?php echo $pager->getPage()?>"/>
      <strong>of <?php echo link_to($pager->getLastPage(), '@default_index?module=pilot&page='.$pager->getLastPage())?></strong>
      <?php echo link_to('Next', '@default_index?module=pilot&page='.$pager->getNextPage(), array('class' => 'btn-pager-next'))?>
      <input type="submit" class="hide"/>
    </form>
  </div>
</div>
<?php }?>

<?php /* didn't know why this js was needed
<script type="text/javascript">
//<![CDATA[
$(document).ready(function() {
  $('#ff_firstname').val('');
  $('#ff_lastname').val('');
  $('#ff_city').val('');
  $('#ff_state').val('');
  $('#ff_wing_name').val('');
  $('#ff_flight_status').val('');
  $('#ff_available').val('');
  $('#ff_identifier').val('');
  $('#ff_ifr_rated').val('');
  $('#ff_n_number').val('');
  $('#ff_make').val('');
  $('#ff_model').val('');
  $('#ff_hseat_status').val('');
  $('#ff_transplant').val('');
});
//]]>
</script>
*/?>

<script type="text/javascript">
function loadModel(el)
{
  var v = $(el).val();
  if (v) {
    $('#template_loading').show();
    $.ajax({
      url: '<?php echo url_for('email_template/ajaxGetTemplate')?>',
      data: { id: v },
      dataType: 'json',
      success: function (json){
        
        $('#template_loading').hide();
      }
    });
  }
}

</script>
