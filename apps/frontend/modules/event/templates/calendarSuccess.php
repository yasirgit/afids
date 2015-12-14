<?php use_helper('Form');?>
<h2>Calendar List</h2>
  <div class="missions-available">
    <form id="filter_form" method="post" action="/event/calendar">
      <input type="hidden" name="filter" value="1"/>
      <div class="missions-available-filter">
        <div class="bg">
          <div class="characteristic_clean">
            <div class="holder">
              <div>
                <label for="ff_wing_name">Wing Name</label>
                <?php echo select_tag('wing_name', options_for_select($wings, $wingname , array('include_custom' => 'All')), array('id' => 'ff_wing_name','class'=>'text narrow'))?>
              </div>             
            </div>
            <input type="submit" value="Find"/>            
            <?php echo link_to('reset', '/event/calendar?reset=yes')?>
          </div>
          <input type="submit" class="hide" value="submit"/>
        </div>
      </div>
    </form>
  </div>
<?php if( $total == 0 ) echo "<h3>There are currently no events in the calendar. Please check back again.</h3>"; ?>
<?php //echo "wing id = ".$wing_id." ; page =   ".$page." ; max =   ".$max ;?>
<?php if ($pager->getNbResults()) {?>
<div class="pager">
  Event per page:
  <?php foreach ($max_array as $i => $v) {
    if ($i) echo ' | ';
    echo link_to_if($max != $v, $v, '/event/calendar?max='.$v);
  }?>
  <div>
    <form action="/event/calendar">
      <?php echo link_to('Previous', '/event/calendar?page='.$pager->getPreviousPage(), array('class' => 'btn-pager-prev'))?>
      <input type="text" name="page" class="active-page" value="<?php echo $pager->getPage()?>"/>
      <strong>of <?php echo link_to($pager->getLastPage(), '/event/calendar?page='.$pager->getLastPage())?></strong>
      <?php echo link_to('Next', '/event/calendar?page='.$pager->getNextPage(), array('class' => 'btn-pager-next'))?>
      <input type="submit" class="hide"/>
    </form>
  </div>
</div>
<br/>
<table class="mission-request-table">
<thead>
  <tr>
      <td>Event name</td>
      <td>Event date</td>
      <td>Event time</td>
      <td>Location</td>
      <td>Online reservation</td>
      <td>Action</td>
  </tr>
</thead>
<tbody>
  <?php foreach ($events as $event): ?>
  <tr>
    <td class="cell-1">
        <?php if($event->getEventName()):?><?php echo $event->getEventName()?><?php endif;?>
    </td>
    <td class="cell-2">
        <?php if($event->getEventDate()):?><?php echo date('m-d-Y',strtotime($event->getEventDate('m/d/Y')))?><?php endif;?>
    </td>
    <td class="cell-3">
        <center>
            <?php if($event->getEventTime()):?><?php echo $event->getEventTime()?><?php endif;?>
        </center>
    </td>
    <td class="cell-4">
        <center>
            <?php if($event->getLocation()):?><?php echo $event->getLocation()?><?php endif;?>
        </center>
    </td>
    <td class="cell-4">
        <center>
            <?php  if($event->getOnsiteSignupOk() && $event->getOnlineReservation()){  ?>
                    <?php
                        //total seat seserved at system
                        $totalperson = $event->getMaxPersons();

                        //Sighup deadline date find out
                        $lastsignupdate = date('mdY',strtotime($event->getSignupDeadline()));
                        $signupdeadline = intval($lastsignupdate);

                        //find out todays date
                        $todaysdate = date('mdY');
                        $today = intval($todaysdate);
                    ?>
                    <?php if( $totalperson > 0 && $signupdeadline >= $today ){?>
                            <ul class="status-list"> <li><a href="/eventReservation/eventSignup?id=<?php echo $event->getId(); ?>">Available</a></li></ul>
                    <?php } else { ?>
                            Not available
                    <?php } ?>
                        
            <?php  } else { ?>                
                       Not available
            <?php } ?>
        </center>
    </td>
    <td char="cell-1">
      <ul class="action-list">
          <center>
            <ul>
                <li>
                    <a href="/event/calendarDetails?id=<?php echo $event->getId();?>" class="action-view">Event details</a>
                </li>
             </ul>
          </center>
      </ul>
    </td>
  </tr>
  <?php endforeach;?>
</tbody>
</table>

    <div class="pager">
        Event per page:
        <?php foreach ($max_array as $i => $v) {
            if ($i) echo ' | ';
            echo link_to_if($max != $v, $v, '/event/calendar?max='.$v);
        }?>
    <div>
    <form action="/event/calendar">
      <?php echo link_to('Previous', '/event/calendar?page='.$pager->getPreviousPage(), array('class' => 'btn-pager-prev'))?>
      <input type="text" name="page" class="active-page" value="<?php echo $pager->getPage()?>"/>
      <strong>of <?php echo link_to($pager->getLastPage(), '/event/calendar?page='.$pager->getLastPage())?></strong>
      <?php echo link_to('Next', '/event/calendar?page='.$pager->getNextPage(), array('class' => 'btn-pager-next'))?>
      <input type="submit" class="hide"/>
    </form>
  </div>
</div>
<?php }?>