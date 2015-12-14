<?php use_helper('Form');
$date_widget = $sf_data->getRaw('date_widget');
use_javascripts_for_form($date_widget);
use_stylesheets_for_form($date_widget);
?>
<?php use_helper('Javascript', 'Form') ?>

<h2>Email Queue List</h2>

  <div class="missions-available">
    <form id="filter_form" method="post" action="<?php echo url_for('email/emailQueueList')?>">
      <input type="hidden" name="filter" value="1"/>
      <div class="missions-available-filter">
        <div class="bg">
          <div class="characteristic_clean">
            <div class="holder">
              <div>
                <label for="subject">Subject</label>
                <input type="text" class="text" value="<?php echo $subject?>" id="subject" name="subject"/>
                <br clear="left"/>
                <label for="priority">Priority</label>
                <?php echo select_tag('priority', options_for_select(array('None','Low','Medium','High'), $priority)) ?>
              </div>
               <div>
                <label for="request_date">Request date</label>
                <?php echo $date_widget->render('request_date', $request_date);?>
                <br clear="left"/>
                <label for="send_date">Send date</label>
                <?php echo $date_widget->render('send_date', $send_date);?>
              </div>
            </div>
            <input type="submit" value="Find"/>
            <?php echo link_to('reset', 'email/emailQueueList?filter=1')?>
          </div>
          <input type="submit" class="hide" value="submit"/>
        </div>
      </div>
    </form>
  </div>
   
<?php if ($pager->getNbResults()) {?>
<div class="pager">
  Mission per page:
  <?php foreach ($max_array as $i => $v) {
    if ($i) echo ' | ';
    echo link_to_if($max != $v, $v, 'email/emailQueueList?max='.$v);
  }?>
  <div>
    <form action="<?php echo url_for('email/emailQueueList')?>">
      <?php echo link_to('Previous', 'email/emailQueueList?page='.$pager->getPreviousPage(), array('class' => 'btn-pager-prev'))?>
      <input type="text" name="page" class="active-page" value="<?php echo $pager->getPage()?>"/>
      <strong>of <?php echo link_to($pager->getLastPage(), 'email/emailQueueList?page='.$pager->getLastPage())?></strong>
      <?php echo link_to('Next', 'email/emailQueueList?page='.$pager->getNextPage(), array('class' => 'btn-pager-next'))?>
      <input type="submit" class="hide"/>
    </form>
  </div>
</div>
<br/>
  

<table class="mission-request-table">
<thead>
  <tr>
    <td>Subject</td>
    <td>Sender Name</td>
    <td>Request Date</td>
    <td>Send Date</td>
    <td>Priority</td>
    <td>Status</td>
 </tr>
</thead>
<tbody>
<?php foreach ($queueEmails as $queueEmail):?>
  <tr>
        <td class="cell-1">
        <?php if($queueEmail->get):?><?php echo $miss->getApptDate('m/d/y')?><?php endif;?>
        </td>
        <td class="cell-2">
        <?php if($miss->getMissionTypeId()):?>
            <?php 
            $type = MissionTypePeer::retrieveByPK($miss->getMissionTypeId());
            if($type){
              echo $type->getName();
            }
            ?>
        <?php endif;?>
        </td>
        <td class="cell-1">
        <?php if($miss->getRequesterId()):?>
        <?php $requester = RequesterPeer::retrieveByPK($miss->getRequesterId())?>
        <?php if($requester):?>
           <?php 
           $person = PersonPeer::retrieveByPK($requester->getPersonId());
           if($person){
             echo ($person->getTitle()? $person->getTitle().' . ':"").$person->getFirstName().' '.$person->getLastName();
           }
           ?>
        <?php endif;?>
        <?php endif;?>
        </td>
        <td class="cell-2">
        <?php if($miss->getPassengerId()):?>
        <?php $passenger = PassengerPeer::retrieveByPK($miss->getPassengerId())?>
        <?php if($passenger):?>
           <?php 
           $person = PersonPeer::retrieveByPK($passenger->getPersonId());
           if($person){
             echo ($person->getTitle()? $person->getTitle().' . ':"").$person->getFirstName().' '.$person->getLastName();
           }
           ?>
        <?php endif;?>
        <?php endif;?>
        </td>
        <td class="cell-1">
        <!--/ CHECK SECURITY-->
        <ul class="action-list">
          <li><?php if ($sf_user->hasCredential(array('Administrator','Staff','Pilot','Coordinator','Volunteer'), false)):?><a href="<?php echo url_for('@mission_view?id='.$miss->getId())?>" class="link-view">view</a><?php endif?></li>
          <li><?php if ($sf_user->hasCredential(array('Administrator','Staff','Coordinator'), false)):?><a href="<?php echo url_for('@mission_edit?id='.$miss->getId())?>" class="action-edit">edit</a><?php endif?></li>
          <li><a href="<?php echo url_for('@mission_copy?id='.$miss->getId().'&type=copy')?>" class="action-copy">copy</a></li>
          <li><a href="<?php echo url_for('@mission_copy?id='.$miss->getId().'&type=reverse')?>" class="action-copy">reverse</a></li>
        </ul>
        </td>
  </tr>
</tbody>
<?php endforeach;?>
</table>
<div class="pager">
  Mission per page:
  <?php foreach ($max_array as $i => $v) {
    if ($i) echo ' | ';
    echo link_to_if($max != $v, $v, '@default_index?module=mission&max='.$v);
  }?>
  <div>
    <form action="<?php echo url_for('@default_index?module=mission')?>">
      <?php echo link_to('Previous', '@default_index?module=mission&page='.$pager->getPreviousPage(), array('class' => 'btn-pager-prev'))?>
      <input type="text" name="page" class="active-page" value="<?php echo $pager->getPage()?>"/>
      <strong>of <?php echo link_to($pager->getLastPage(), '@default_index?module=mission&page='.$pager->getLastPage())?></strong>
      <?php echo link_to('Next', '@default_index?module=mission&page='.$pager->getNextPage(), array('class' => 'btn-pager-next'))?>
      <input type="submit" class="hide"/>
    </form>
  </div>
</div>
<br/>
<?php }?>