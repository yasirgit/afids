<?php use_helper('Javascript', 'Form') ?>
<?php use_helper('jQuery', 'Form') ?>
<?php use_helper('jQuery'); ?>
<?php for ($i=1;$i<20;$i++):?>
<tr>
        <td><?php echo $i+1?></td>
        <td>
          <?php echo input_auto_complete_tag('passenger_fname', $passenger_fname == '*' ? '' : $passenger_fname, 
          'passenger/autoComplete',
          array('autocomplete' => 'off', 'class'=>'text narrow','style'=>'200px','id'=>'passenger_fname'.$i,'onchange'     =>"getFchange2($i)"),
          array(
          'use_style'    => true,
          'indicator'    =>'indicator',
          )
         );?>
        </td>
        <td>
          <?php echo input_auto_complete_tag('passenger_lname', $passenger_lname == '*' ? '' : $passenger_lname, 
          'passenger/autoComplete',
          array('autocomplete' => 'off', 'class'=>'text narrow','style'=>'200px','id'=>'passenger_lname'.$i,'onchange'=>"getLchange2($i)"),
          array(
          'use_style'    => true,
          'indicator'    =>'indicator',
          )
          );
         ?>
        </td>
        <td><input id="<?php echo 'location'.$i?>" type="text" readonly="true" class="text narrow" readonly=true/></td>
        <td><input type="text" id="<?php echo 'notes'.$i?>" name="notes" class="text narrow"/></td>
        <td>
<!--          <a class="btn-action" href="#" onclick="jQuery('#add_leg').click();return false;">-->
          <form  action="<?php echo url_for('mission_create')?>" id="mission_form" method="post">
            <?php if(isset($campid)):?><input type="hidden" id="camp_id" name="camp_id" value="<?php echo $campid?>"/><?php endif?>
            <input id="main_id" name="main_id" value="" type="hidden"/>
            <input id="row_id" name="row_id" value="" type="hidden"/>
            <input type="hidden" id="<?php echo 'pass_fname'.$i?>" name="<?php echo 'pass_fname'.$i?>"/>
            <input type="hidden" id="<?php echo 'pass_lname'.$i?>" name="<?php echo 'pass_lname'.$i?>"/>
            <input type="hidden" id="<?php echo 'pass_loc'.$i?>" name="<?php echo 'pass_loc'.$i?>"/>
            <input type="hidden" id="<?php echo 'pass_note'.$i?>" name="<?php echo 'pass_note'.$i?>"/>
            <input type="hidden" id="<?php echo 'pass_link'.$i?>" name="<?php echo 'pass_link'.$i?>"/>
            
            <input type="hidden" id="pass_fname" name="pass_fname"/>
            <input type="hidden" id="pass_lname" name="pass_lname"/>
            <input type="hidden" id="pass_loc" name="pass_loc"/>
            <input type="hidden" id="pass_note" name="pass_note"/>
            <input type="hidden" id="pass_link" name="pass_link"/>
            
            <a href="#" style="display:none" id="<?php echo 'add_leg'.$i?>" onclick="getData(<?php echo $i?>)" class="btn-action"><span>+leg</span><strong>&nbsp;</strong></a>
            <input type="submit" class="hide" id="submit"/>
          </form>
        </td>
        <td>
        <select id="<?php echo 'link'.$i?>" name="link" class="text narrower2">
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
        <input type="hidden" id="i" value="<?php echo $i?>">
 </tr>
<?php endfor; ?>
<input type="hidden" id="all_numbers" value="<?php echo $i?>"/>
<script type="text/javascript">
//<![CDATA[
<?php
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

var cities2 = {<?php echo join(',',$cities)?>};
var states2 = {<?php echo join(',',$states)?>};

var f_id2;
var l_id2;
var city2;
var state2;
var id2;

jQuery(document).ready(function() {
  //  var f_id2 =0;
  //  var l_id2 =0;
  //  var city2 = 0;
  //  var state2 = 0;
  //  var id2 = 0;

  //  jQuery('#passenger_fname'+id).val('');
  //  jQuery('#passenger_lname'+id).val('');
  //  jQuery('#location'+id).val('');
  //  jQuery('#notes'+id).val('');
  //  jQuery('#link'+id).val('');
});


var timerId1 = null, timerId2 = null;
function getFchange2(id){
  if (timerId1 != null){
    clearTimeout(timerId1);
  }
  timerId1 = setTimeout('getFname2('+id+')', 1500);
}

function getLchange2(id){
  if (timerId2 != null){
    clearTimeout(timerId2);
  }
  timerId2 = setTimeout('getLname2('+id+')', 1500);
}

function getFname2(id2){
  f_id2 = jQuery('#passenger_fname'+id2).next().find('[class=selected]').attr('id')
  if(cities2[f_id2]){
    city2 = cities2[f_id2];
  }
  jQuery('#res').html(f_id2+city2);
}

function getLname2(id2){
  l_id2 = jQuery('#passenger_lname'+id2).next().find('[class=selected]').attr('id')
  if(states2[l_id2]){
    state2= states2[l_id2];
  }

  if(f_id2 == l_id2){
    if(city2 && state2){
      jQuery('#location'+id2).val('');
      jQuery('#location'+id2).val(city2+', '+state2);
      jQuery('#add_leg'+id2).css('display','block');
    }else if(!city2 && state2){
      jQuery('#location'+id2).val('');
      jQuery('#location'+id2).val(' '+', '+state2);
      jQuery('#add_leg'+id2).css('display','block');
    }else if(city2 && !state2){
      jQuery('#location'+id2).val('');
      jQuery('#location'+id2).val(city2+', '+' ');
      jQuery('#add_leg'+id2).css('display','block');
    }else if(!city2 && !state2){
      jQuery('#location'+id2).val('');
      jQuery('#add_leg'+id2).css('display','block');
    }else{
      alert('nothing found!');
    }

    jQuery('#row_id').val(id2);

    if(f_id2){
      jQuery('#main_id').val(f_id2);
    }
    if(jQuery('#passenger_fname'+id2).val()){
      jQuery('#pass_fname'+id2).val(jQuery('#passenger_fname'+id2).val());
    }
    if(jQuery('#passenger_lname'+id2).val()){
      jQuery('#pass_lname'+id2).val(jQuery('#passenger_lname'+id2).val());
    }
    if(jQuery('#location'+id2).val()){
      jQuery('#pass_loc'+id2).val(jQuery('#location'+id2).val());
    }
    if(jQuery('#notes'+id2).val()){
      jQuery('#pass_note'+id2).val(jQuery('#notes'+id2).val());
    }
    if(jQuery('#link'+id2).val()){
      jQuery('#pass_link'+id2).val(jQuery('#link'+id2).val());
    }

    //    For first one
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

    f_id2 = 0;
    l_id2 = 0;
    id2 = 0;
    city2 = '';
    state2 = '';
  }
}

function getData(id){
  jQuery('#submit').click();
}
if(jQuery('#all_numbers').val() != 0){

  var myOptions = {
    var1 : 1,
    var2 : 2,
    var3 : 3,
    var4 : 4,
    var5 : 5,
    var6 : 6,
    var7 : 7,
    var8 : 8,
    var9 : 9,
    var10 : 10,
    var11 : 11,
    var12 : 12,
    var13 : 13,
    var14 : 14,
    var15 : 15,
    var16 : 16,
    var17 : 17,
    var18 : 18,
    var19 : 19,
    var20 : 20,
  };

  jQuery.each(myOptions, function(val, text) {
    jQuery('#link').append(
    jQuery('<option></option>').val(val).html(text)
    );
  });

  for(i=1;i<22;i++){
    jQuery.each(myOptions, function(val, text) {
      jQuery('#link'+i).append(
      jQuery('<option></option>').val(val).html(text)
      );
    });
  }
}
// ]]>
</script>

