<?php
$objs = $sf_data->getRaw('objs');
$date_widget = $sf_data->getRaw('date_widget');
use_javascripts_for_form($date_widget);
use_stylesheets_for_form($date_widget);
?>

<h2>Missions Flown</h2>

<form action="<?php echo url_for('mission/yearReport')?>" method="get">
<div class="air-mission-info">
  <div class="holder">
    <div class="wrap">
      <label for="start_date">Start Date</label>
      <?php echo $date_widget->render('start_date', $sf_params->get('start_date'), array('id' => 'start_date'));?>
    </div>
  </div>
  
  <div class="holder" style="margin-right: 5px;">
    <div class="wrap">
      <label for="end_date">End Date</label>
      <?php echo $date_widget->render('end_date', $sf_params->get('end_date'), array('id' => 'end_date'));?>
    </div>
  </div>
  <input type="submit" value="Update" style="float:left; margin-top: 14px;"/>
</div>
</form>

<?php if (count($objs)) {?>
  <?php $rs = $objs[0];?>
  <p align="left"><font face="Verdana" size="2">Member Information:</font></p>
  <p align="left" style="margin-left: 25px;">
    <font face="Verdana" size="2">
      ID: <?php echo $rs->external_id?><br>
      <b><font color="#0000FF"><?php echo $rs->first_name.' '.$rs->last_name?></font></b><br/>
      <?php echo $rs->address1.' '.$rs->address2?><br/>
      <?php echo $rs->city.', '.$rs->state.' '.$rs->zipcode?>
    </font>
  </p>

  <table border="1" cellpadding="2" cellspacing="2" style="border-collapse: collapse" bordercolor="#111111" width="75%">
    <tr>
      <td width="50%"><b><font face="Verdana" size="2">Mission Date</font></b></td>
      <td width="25%" align="right"><b><font face="Verdana" size="2"># Legs</font></b></td>
      <td width="25%" align="right"><b><font face="Verdana" size="2">Hours</font></b></td>
    </tr>
    <?php
    $total_hours = 0;
    $commercial_ticket_cost = 0;
    $legs = 0;
    foreach ($objs as $obj) {
      if ($obj->hobbs_time != null) { $t = explode(':', $obj->hobbs_time); $total_hours += $t[0] + $t[1] / 60; }
      if ($obj->commercial_ticket_cost != null) $commercial_ticket_cost += $obj->commercial_ticket_cost;
      $legs += (int)($obj->leg_count);
    ?>
    <tr>
      <td width="50%"><font face="Verdana" size="2"><?php echo date('m/d/Y', strtotime($obj->mission_date))?></font></td>
      <td width="25%" align="right"><?php echo $obj->leg_count?></td>
      <td width="25%" align="right">
        <?php if ($obj->hobbs_time != null) {
          $t = explode(':', $obj->hobbs_time);
          echo sprintf('%.1f', $t[0] + $t[1] / 60);
        }elseif ($obj->commercial_ticket_cost == null){
           echo '$0.00';
        }else{
          echo '$'.sprintf('%.2f', $obj->commercial_ticket_cost);
        }?>
      </td>
    </tr>
    <?php }?>
    <tr>
      <td width="50%"><b><font face="Verdana" size="2" color="#0000FF">Total Hours for period:</font></b></td>
      <td width="25%" align="right"><b><font face="Verdana" size="2" color="#0000FF"><?php echo $legs?></font></b></td>
      <td width="25%" align="right"><b><font face="Verdana" size="2" color="#0000FF"><?php echo sprintf('%.1f', $total_hours)?></font></b></td>
    </tr>
    <?php if ($commercial_ticket_cost > 0) {?>
    <tr>
      <td width="73%"><b><font face="Verdana" size="2" color="#0000FF">*Unreimbursed donation commercial airline ticket(s):</font></b></td>
      <td></td>
      <td width="27%" align="right">
        <b><font face="Verdana" size="2" color="#0000FF">$<?php echo sprintf('%.2f', $commercial_ticket_cost)?></font></b>
      </td>
    </tr>
    <?php }?>
  </table>

<?php }else{?>
  We have no record of any missions flown during this period.
<?php }?>