<?php use_helper('Form');?>
<h2>Upcoming events you signed up </h2>
<br/>
<?php if( $total == 0 ) echo "<h1>You have not signed up any event yet.</h1>"; ?>
<?php if ($pager->getNbResults()) {?>
<div class="pager">
  Event per page:
  <?php foreach ($max_array as $i => $v) {
    if ($i) echo ' | ';
    echo link_to_if($max != $v, $v, '/dashboard/pilotSignupEventDetail?max='.$v);
  }?>
  <div>
    <form action="/dashboard/pilotSignupEventDetail">
      <?php echo link_to('Previous', '/dashboard/pilotSignupEventDetail?page='.$pager->getPreviousPage(), array('class' => 'btn-pager-prev'))?>
      <input type="text" name="page" class="active-page" value="<?php echo $pager->getPage()?>"/>
      <strong>of <?php echo link_to($pager->getLastPage(), '/dashboard/pilotSignupEventDetail?page='.$pager->getLastPage())?></strong>
      <?php echo link_to('Next', '/dashboard/pilotSignupEventDetail?page='.$pager->getNextPage(), array('class' => 'btn-pager-next'))?>
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
        <?php if($event->getEventDate()):?><?php echo $event->getEventDate('m/d/Y')?><?php endif;?>
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
    <td char="cell-1">
      <ul class="action-list">
          <center>
            <ul>
                <li>
                    <a href="/dashboard/signupSingleEventDetail?id=<?php echo $event->getId();?>" class="action-view">Event details</a>
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
    echo link_to_if($max != $v, $v, '/dashboard/pilotSignupEventDetail?max='.$v);
  }?>
  <div>
    <form action="/dashboard/pilotSignupEventDetail">
      <?php echo link_to('Previous', '/dashboard/pilotSignupEventDetail?page='.$pager->getPreviousPage(), array('class' => 'btn-pager-prev'))?>
      <input type="text" name="page" class="active-page" value="<?php echo $pager->getPage()?>"/>
      <strong>of <?php echo link_to($pager->getLastPage(), '/dashboard/pilotSignupEventDetail?page='.$pager->getLastPage())?></strong>
      <?php echo link_to('Next', '/dashboard/pilotSignupEventDetail?page='.$pager->getNextPage(), array('class' => 'btn-pager-next'))?>
      <input type="submit" class="hide"/>
    </form>
  </div>
</div>
<?php }?>