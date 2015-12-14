<?php
$max_array = array(5, 10, 20, 30);
use_helper('Form', 'jQuery');
$date_widget = $sf_data->getRaw('date_widget');
use_javascripts_for_form($date_widget);
use_stylesheets_for_form($date_widget);
/* @var $report MissionReport */
?>

<?php if($miss){ ?>
<h2>Mission Reports Outstanding</h2>
<?php }else{ ?>
<h2>Mission Report Review</h2>
<?php } ?>
<div class="missions-available">
  <form method="post" action="<?php echo url_for('mission_report/review')?>">
    <input type="hidden" name="filter" value="1"/>
    <div class="missions-available-filter">
      <div class="bg">
        <div class="date-range">
          <label for="from_date">Date Range:</label>
          <?php echo $date_widget->render('from_date', $from_date);?>
          <strong class="to">to</strong>
          <?php echo $date_widget->render('to_date', $to_date);?>
        </div>
        <div class="characteristic_clean" style="display:inline;">
          <div class="holder">
            <div>
              <label for="pilot_name">Pilot Name</label>
              <?php echo input_tag('pilot_name', $pilot_name, array('class' => 'text'))?>
            </div>
            <div>
              <label for="passenger_name">Passenger Name</label>
              <?php echo input_tag('passenger_name', $passenger_name, array('class' => 'text'))?>
            </div>
          </div>
        </div>
        <div class="location-as">
          <ul>
            <li>
              <?php echo checkbox_tag('not_approved', $not_approved ? $not_approved : 1, $not_approved ? true : false)?>
              <?php echo label_for('not_approved', 'Not Approved')?>
            </li>
            <li>
              <?php echo checkbox_tag('approved', $approved ? $approved : 1, $approved ? true : false)?>
              <?php echo label_for('approved', 'Approved')?>
            </li>
            <li>
              <?php echo checkbox_tag('missing', $missing ? $missing : 1, $missing ? true : false)?>
              <?php echo label_for('missing', 'Missing')?>
            </li>
          </ul>
        </div>
        <input type="submit" value="Find"/>
        <?php echo link_to('reset', 'mission_report/review?filter=1')?>
      </div>
    </div>
  </form>
</div>

<?php if($miss){ ?>
  <?php //echo count($mission_legs);?>
  <?php  $url_add = '&missing=1'?>
<div class="pager">
  Members per page:
  <?php foreach ($max_array as $i => $v) {
    if ($i) echo ' | ';
    $url = 'mission_report/review?max='.$v.$url_add;
    echo link_to_if($max != $v, $v, $url);
  }?>
  <div>
    <form action="<?php echo url_for('mission_report/review')?>">
      <?php  $url_add = '&missing=1'?>
      <?php echo link_to('Previous', 'mission_report/review?page='.$pagers->getPreviousPage().$url_add, array('class' => 'btn-pager-prev'))?>
      <input type="text" name="page" class="active-page" value="<?php echo $pagers->getPage()?>"/>
      <strong>of <?php echo link_to($pagers->getLastPage(), 'mission_report/review?page='.$pagers->getLastPage().$url_add)?></strong>
      <?php echo link_to('Next', 'mission_report/review?page='.$pagers->getNextPage().$url_add, array('class' => 'btn-pager-next'))?>
      <input type="submit" class="hide"/>
    </form>
  </div>
</div>
  <table class="mission-request-table">
    <thead>
      <tr>
        <td>Mission Date</td>
        <td>Origin</td>
        <td>Destination</td>
        <td>Passenger</td>
        <td></td>
      </tr>
    </thead>
    <tbody>
      <?php foreach ($mission_legs as $mission_leg) {?>
      <?php
        /* @var $mission_leg MissionLeg */
        $from_airport = $mission_leg->getAirportRelatedByFromAirportId();
        $to_airport = $mission_leg->getAirportRelatedByToAirportId();
        $passenger = $mission_leg->getMission()->getPassenger();
      ?>
      <tr>
        <td><?php echo $mission_leg->getMission()->getMissionDate('m/d/Y');?></td>
        <td><?php echo $from_airport->getIdent()?></td>
        <td><?php echo $to_airport->getIdent()?></td>
        <td><?php echo $passenger->getPerson()->getName()?></td>
        <td>
          <?php if ($sf_user->hasCredential(array('Administrator','Staff','Coordinator'), false)){?>
          <?php if ($mission_leg->getMissionReportId()) {
            echo 'reported<br/>'.link_to('Edit Report', 'mission_report/edit?leg_id='.$mission_leg->getId());
          }else{
            echo link_to('File Report', 'mission_report/new?leg_id='.$mission_leg->getId());
          }?>
          <?php } ?>
        </td>
      </tr>
      <?php }?>
    </tbody>
  </table>

<div class="pager">
  Members per page:
  <?php foreach ($max_array as $i => $v) {
    if ($i) echo ' | ';
    $url = 'mission_report/review?max='.$v.$url_add;
    echo link_to_if($max != $v, $v, $url);
  }?>
  <div>
    <form action="<?php echo url_for('mission_report/review')?>">
      <?php  $url_add = '&missing=1'?>
      <?php echo link_to('Previous', 'mission_report/review?page='.$pagers->getPreviousPage().$url_add, array('class' => 'btn-pager-prev'))?>
      <input type="text" name="page" class="active-page" value="<?php echo $pagers->getPage()?>"/>
      <strong>of <?php echo link_to($pagers->getLastPage(), 'mission_report/review?page='.$pagers->getLastPage().$url_add)?></strong>
      <?php echo link_to('Next', 'mission_report/review?page='.$pagers->getNextPage().$url_add, array('class' => 'btn-pager-next'))?>
      <input type="submit" class="hide"/>
    </form>
  </div>
</div>
<?php }else{?>
<?php if ( isset($pager) && $pager->getNbResults()) {?>
<div class="pager">
  Members per page:
  <?php foreach ($max_array as $i => $v) {
    if ($i) echo ' | ';
    $url = 'mission_report/review?max='.$v;
    echo link_to_if($max != $v, $v, $url);
  }?>
  <div>
    <form action="<?php echo url_for('mission_report/review')?>">
      <?php  $url_add = ''?>
      <?php echo link_to('Previous', 'mission_report/review?page='.$pager->getPreviousPage().$url_add, array('class' => 'btn-pager-prev'))?>
      <input type="text" name="page" class="active-page" value="<?php echo $pager->getPage()?>"/>
      <strong>of <?php echo link_to($pager->getLastPage(), 'mission_report/review?page='.$pager->getLastPage().$url_add)?></strong>
      <?php echo link_to('Next', 'mission_report/review?page='.$pager->getNextPage().$url_add, array('class' => 'btn-pager-next'))?>
      <input type="submit" class="hide"/>
    </form>
  </div>
</div>

<table class="mission-request-table">
<thead>
  <tr>
    <td>Mission Info</td>
    <td>Mission Report</td>
    <td>Status/Action</td>
  </tr>
</thead>
<tbody>
  <?php foreach ($reports as $report): ?>
   <?php
      $mission_leg = MissionLegPeer::getMissionLegByReportId($report->getId());
   ?>
  <tr>
    <td style="padding-left:30px;">
      Mission Date: <?php echo date('m/d/Y', strtotime($report->getMissionDate()))?> <br />
			Passenger: <?php echo $report->getPassengerNames()?> <br />
			Route: <?php echo $report->getPickupAirportIdent()?> to <?php echo $report->getDropoffAirportIdent()?><br />
			Pilot: <?php echo $report->getCopilotName()?><br />
   </td>
   <td style="padding-left:30px;">
			Report Filed: <?php echo date('m/d/Y', strtotime($report->getReportDate()))?> <br />
			Mission Date: <?php echo date('m/d/Y', strtotime($report->getMissionDate()))?> <br />
			Assistant: <?php echo $report->getMemberCopilot()?> <br />
			Aircraft: <?php echo $report->getAircraftId() ? $report->getAircraft()->getName() : $report->getNNumber().' '.$report->getMakemodel()?> <br />
			Hobbs:    <?php echo $report->getHobbsTime()?><br />
    </td>
    <td class="cell-1">
      <span id="mreport_indicator_<?php echo $report->getId()?>" style="display:none;">Loading...</span> <br />
      <span id="success_show_<?php echo $report->getId()?>" style="display:none;color:green;"> Approved</span>
      
      <?php if($report->getApproved() == 1):?>
        <span style="color:green;"> approved </span>    
      <?php else:?>
        <a id="success_hide_<?php echo $report->getId()?>" href="#" onclick="approve(<?php echo $report->getId()?>)">Approve</a>
      <?php endif;?>
      
      <?php if($mission_leg): ?>
       <?php if ($sf_user->hasCredential(array('Administrator','Staff','Coordinator'), false)){?>
        <br /><?php echo link_to('Edit', 'mission_report/edit?leg_id='.$mission_leg->getId())?>
       <?php } ?>
      <?php endif; ?>
    </td>
  </tr>
  <?php endforeach; ?>
</tbody>
</table>

<div class="pager">
  Members per page:
  <?php foreach ($max_array as $i => $v) {
    if ($i) echo ' | ';
    $url = 'mission_report/review?max='.$v;
    echo link_to_if($max != $v, $v, $url);
  }?>
  <div>
    <form action="<?php echo url_for('mission_report/review')?>">
      <?php  $url_add = ''?>
      <?php echo link_to('Previous', 'mission_report/review?page='.$pager->getPreviousPage().$url_add, array('class' => 'btn-pager-prev'))?>
      <input type="text" name="page" class="active-page" value="<?php echo $pager->getPage()?>"/>
      <strong>of <?php echo link_to($pager->getLastPage(), 'mission_report/review?page='.$pager->getLastPage().$url_add)?></strong>
      <?php echo link_to('Next', 'mission_report/review?page='.$pager->getNextPage().$url_add, array('class' => 'btn-pager-next'))?>
      <input type="submit" class="hide"/>
    </form>
  </div>
</div>
<?php }?>


<script type="text/javascript">
function approve(value)
{
  jQuery.ajax({
    url: "/mission_report/approve",
    data: 'report_id='+value,
    beforeSend: function (){
      jQuery("#mreport_indicator_" + value).show();
    },
    success: function(html){
      jQuery("#mreport_indicator_" + value).hide();
      jQuery("#success_hide_" + value).hide();
      jQuery("#success_show_" + value).show();
    }
  });
}
</script>
<?php } ?>