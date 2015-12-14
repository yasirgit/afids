<?php use_helper('Javascript', 'Form') ?>
<?php use_helper('jQuery', 'Form') ?>
<?php use_helper('jQuery'); ?>

<div class="person-view">
  <div class="passenger-form">
    <h2>Add Passengers to Camp</h2>
    <table id="pass_table">
    <thead>
    <tr>
        <td>Number</td>
        <td>First Name</td>
        <td>Last Name</td>
        <td>Location</td>
        <td>Notes</td>
        <td></td>
        <td>Link</td>
        <td></td>
        <td></td>
    </tr>
    </thead>
    <tbody>
    <input type="hidden" id="link_id" name="link_id" value="1"/>
    <input type="hidden" id="is_added" name="is_added" value="0"/>
      <tr id="blankrow">
        <td>1</td>
        <td>
          <?php echo input_auto_complete_tag('passenger_fname', $passenger_fname == '*' ? '' : $passenger_fname, 
          'passenger/autoComplete',
          array('autocomplete' => 'off', 'class'=>'text narrow','style'=>'200px'),
          array(
          'use_style'    => true,
          'indicator'    =>'indicator',
          )
         );?>
        </td>
        <td>
          <?php echo input_auto_complete_tag('passenger_lname', $passenger_lname == '*' ? '' : $passenger_lname, 
          'passenger/autoComplete',
          array('autocomplete' => 'off', 'class'=>'text narrow','style'=>'200px'),
          array(
          'use_style'    => true,
          'indicator'    =>'indicator',
          )
          );
         ?>
        </td>
        <td><input id="location" type="text" readonly="true" class="text narrow" readonly=true/></td>
        <td><input type="text" id="notes" name="notes" class="text narrow"/></td>
        <td>
<!--          <a class="btn-action" href="#" onclick="jQuery('#add_leg').click();return false;">-->
          <form  action="<?php echo url_for('mission_create')?>" id="mission_form" method="post">
            <?php if(isset($campid)):?><input type="hidden" id="camp_id" name="camp_id" value="<?php echo $campid?>"/><?php endif?>
            <input type="hidden" id="person_id" name="person_id"/>
            <input type="hidden" id="pass_fname" name="pass_fname"/>
            <input type="hidden" id="pass_lname" name="pass_lname"/>
            <input type="hidden" id="pass_loc" name="pass_loc"/>
            <input type="hidden" id="pass_note" name="pass_note"/>
            <input type="hidden" id="pass_link" name="pass_link"/>
            <a href="#" style="display:none" id="add_leg" onclick="jQuery('#mission_form').submit(); return false;" class="btn-action"><span>+leg</span><strong>&nbsp;</strong></a>
          </form>
        </td>
        <td>
        <select id="link" name="link" class="text narrower2">
          <option></option>
        </select>
        </td>
        <td>
          <a href="" class="link-edit">
          <span></span>
            <strong> </strong></a>
        </td>
        <td>
          <a href="" class="action-remove">
          <span></span>
            <strong> </strong></a>
        </td>
      </tr>
      <div id="include"></div>
    </tbody>
    </table>
    <a class="btn-action" href="#" id="add_row" style="display:block">
            <span>+</span>
            <strong> </strong>
    </a>
    <span id="indicator" style="display:none"><?php echo image_tag('/images/loading.gif')?></span>
  </div>
</div>
<?php if(isset($camp_id)):?><input type="hidden" id="id" value="<?php echo $camp_id?>"><?php endif?>

<script type="text/javascript">
//<![CDATA[
<?php
$cities = array();
$cities = array();
$states = array();

foreach ($persons as $person)
{
  if($person->getCity() != null){
    $cities[] = "{$person->getId()} : '{$person->getCity()}'";
  }
  if($person->getState() != null){
    $states[] = "{$person->getId()} : '{$person->getState()}'";
  }
}
//getFirstName
//getLastName
?>

var cities = {<?php echo join(',',$cities)?>};
var states = {<?php echo join(',',$states)?>};

jQuery(document).ready(function() {

  jQuery('#addleg-popup').css('display','none');
  var f_id ='';
  var l_id ='';
  var city = '';
  var state = '';

  jQuery('#pass_fname').val('');
  jQuery('#pass_lname').val('');
  jQuery('#pass_loc').val('');
  jQuery('#pass_note').val('');
  jQuery('#pass_link').val('');
  jQuery('#id').val(1);

  jQuery('#passenger_fname').val('');
  jQuery('#passenger_lname').val('');
  jQuery('#location').val('');
  jQuery('#notes').val('');
  jQuery('#link').val('');

});

var f_id;
var l_id;
var city;
var state;

jQuery('#passenger_fname').change(function()
{
  setTimeout(getFname, 1500);
});
jQuery('#passenger_lname').change(function()
{
  setTimeout(getLname, 1500);
});

function getFname(){
  f_id = jQuery('#fname').val();

  if(cities[f_id]){
    city = cities[f_id];
  }
  setTimeout(getFname, 1500);
}
function getLname(){
  l_id = jQuery('#lname').val();
  if(states[l_id]){
    state= states[l_id];
  }
  setTimeout(getLname, 1500);

  if(f_id == l_id){
    jQuery('#location').val('');
    if(city && state){
      jQuery('#location').val('');
      jQuery('#location').val(city+', '+state);
      jQuery('#add_leg').css('display','block');
    }else if(!city && state){
      jQuery('#location').val('');
      jQuery('#location').val(' '+', '+state);
      jQuery('#add_leg').css('display','block');
    }else if(city && !state){
      jQuery('#location').val('');
      jQuery('#location').val(city+', '+' ');
      jQuery('#add_leg').css('display','block');
    }else if(!city && !state){
      jQuery('#location').val();
    }else{
      jQuery('#location').val();
    }
    if(f_id){
      jQuery('#person_id').val(f_id);
    }
    if(jQuery('#passenger_fname').val()){
      jQuery('#pass_fname').val(jQuery('#passenger_fname').val());
    }
    if(jQuery('#passenger_lname').val()){
      jQuery('#pass_lname').val(jQuery('#passenger_lname').val());
    }
    if(jQuery('#location').val()){
      jQuery('#pass_loc').val(jQuery('#location').val());
    }
    if(jQuery('#notes').val()){
      jQuery('#pass_note').val(jQuery('#notes').val());
    }
    if(jQuery('#link').val()){
      jQuery('#pass_link').val(jQuery('#link').val());
    }
  }
}

var count =0;

jQuery('#add_row').click(function()
{
  //  jQuery("#blankrow").clone().prependTo("#pass_table tbody").slideDown(500);
  //  html = '<td><input type="text" name="pass_fnames[]" value="" class="text narrow"/>'+'</td>';
  //  html += '<td><input type="text" name="pass_lnames[]" value="" class="text narrow"/>'+'</td>';
  //  html += '<td><input type="text" name="pass_locs[]" value="" class="text narrow"/>'+'</td>';
  //  html += '<td><input type="text" name="pass_notes[]" value="" class="text narrow"/>'+'</td>';
  //  html += '<td><a href="#" id="add_leg" onclick="jQuery("#mission_form").submit(); return false;" class="btn-action"><span>+leg</span><strong>&nbsp;</strong></a>'+'</td>';
  //  html += '<td><select id="link" name="link" class="text narrowest"><option></option></select>'+'</td>';
  //  html += '<td><a class="link-edit" href="#"></a>'+'</td>';
  //  html += '<td><a class="action-remove" href="#" onclick="jQuery(this).parent().parent().remove();return false;"></a></td>';
  //  jQuery('#pass_table').append('<tr>'+html+'</tr>');

  var link_id = jQuery("#link_id").val();
  var targetDiv = jQuery("#pass_table");

  if(count == 0){
    jQuery.ajax({
      type: "POST", url: '<?php echo url_for('camp/addPassengerAjax')?>', data: "link_id="+link_id,
      complete: function(data){
        jQuery('#is_addded').val(1);
        jQuery('#add_row').css('display','none');
        //targetDiv.append('<tr>'+data.responseText+'</tr>');
        targetDiv.append(data.responseText);
        //targetDiv.html(data.responseText);
        count++;
      }
    });
  }
  return false;
});
// ]]>
</script>

