<?php use_helper('Form');?>
<h2>Event List</h2>
 <?php if ($sf_user->hasCredential(array('Administrator','Staff'), false)){?>
    <a href="<?php echo url_for('event/new') ?>">Add Event</a>
<?php } ?>
  <div class="missions-available">
    <form id="filter_form" method="post" action="<?php echo url_for('@default_index?module=event')?>">
      <input type="hidden" name="filter" value="1"/>
      <div class="missions-available-filter">
        <div class="bg">
          <div class="characteristic_clean">
            <div class="holder">
              <div>
                <label for="ff_event_name">Event Name</label>
                <input type="text" class="text" value="<?php echo $event_name?>" id="ff_event_name" name="event_name"/>
                <br clear="left"/>
                <label for="ff_event_date">Event Date</label>
                <input type="text" class="text" value="<?php echo $event_date?>" id="ff_event_date" name="event_date"/>
              </div>
               <div>
                <label for="ff_event_time">Event Time</label>
                <input type="text" class="text" value="<?php echo $event_time?>" id="ff_event_time" name="event_time"/>
                <br clear="left"/>
                <label for="ff_location">Location</label>
                 <input type="text" class="text" value="<?php echo $location?>" id="ff_location" name="location"/>
              </div>
            </div>
            <input type="submit" value="Find"/>
            <?php echo link_to('reset', '@default_index?module=event&filter=1')?>
          </div>
          <input type="submit" class="hide" value="submit"/>
        </div>
      </div>
    </form>
  </div>
<script type="text/javascript">
//<![CDATA[
jQuery(document).ready(function() {
  jQuery(function() {
    jQuery("#ff_event_date").datepicker({ dateFormat: 'yy/mm/dd', changeYear: true, changeMonth: true });
   5});
});
// ]]>
</script>
<?php if ($pager->getNbResults()) {?>
<div class="pager">
  Event per page:
  <?php foreach ($max_array as $i => $v) {
    if ($i) echo ' | ';
    echo link_to_if($max != $v, $v, '@default_index?module=event&max='.$v);
  }?>
  <div>
    <form action="<?php echo url_for('@default_index?module=event')?>">
      <?php echo link_to('Previous', '@default_index?module=event&page='.$pager->getPreviousPage(), array('class' => 'btn-pager-prev'))?>
      <input type="text" name="page" class="active-page" value="<?php echo $pager->getPage()?>"/>
      <strong>of <?php echo link_to($pager->getLastPage(), '@default_index?module=event&page='.$pager->getLastPage())?></strong>
      <?php echo link_to('Next', '@default_index?module=event&page='.$pager->getNextPage(), array('class' => 'btn-pager-next'))?>
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
        <?php if($event->getEventDate()):?><?php echo $event->getEventDate()?><?php endif;?>
    </td>
    <td class="cell-3">
        <?php if($event->getEventTime()):?><?php echo $event->getEventTime()?><?php endif;?>
    </td>
    <td class="cell-4">
        <?php if($event->getLocation()):?><?php echo $event->getLocation()?><?php endif;?>
    </td>
    <td char="cell-1">
      <ul class="action-list">
         <?php if ($sf_user->hasCredential(array('Administrator','Staff','Volunteer'), false)){?>
             <li><?php if($event->getEventName()):?><a href="<?php echo url_for('event/edit?id='.$event->getId()) ?>">Edit</a><?php endif;?></li>
             <li><?php echo link_to('Delete', 'event/delete?id='.$event->getId(), array('method' => 'delete', 'confirm' => 'Are you sure?')) ?></li>
        <?php } ?>
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
    echo link_to_if($max != $v, $v, '@default_index?module=event&max='.$v);
  }?>
  <div>
    <form action="<?php echo url_for('@default_index?module=event')?>">
      <?php echo link_to('Previous', '@default_index?module=event&page='.$pager->getPreviousPage(), array('class' => 'btn-pager-prev'))?>
      <input type="text" name="page" class="active-page" value="<?php echo $pager->getPage()?>"/>
      <strong>of <?php echo link_to($pager->getLastPage(), '@default_index?module=event&page='.$pager->getLastPage())?></strong>
      <?php echo link_to('Next', '@default_index?module=event&page='.$pager->getNextPage(), array('class' => 'btn-pager-next'))?>
      <input type="submit" class="hide"/>
    </form>
  </div>
</div>
<?php }?>