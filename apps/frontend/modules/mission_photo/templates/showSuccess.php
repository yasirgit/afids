<?php 
use_helper('Form');
$date_widget = $sf_data->getRaw('date_widget');
use_javascripts_for_form($date_widget);
use_stylesheets_for_form($date_widget);
$c = new Criteria();
$c->add(MissionPhotoPeer::ID, $mission_photo->getId());
$pht = MissionPhotoPeer::doSelect($c);
?>
<style type="text/css">
.mission-photo-table{
  width:100%;
  border-collapse:collapse;
  margin:5px 0 0;
}
.mission-photo-table td{
  margin:0;
  padding:0;
  border:1px solid #bcbcbe;
  height:20px;
}
.mission-photo-table thead td{
  background:#cfe1fc;
  border-color:#a6bee0;
  color:#153f7a;
  font-weight:bold;
  text-align:center;
}
.mission-photo-table tbody td{
  padding:5px 15px;
  font-size:11px;
  vertical-align:top;
}
</style>

<h2>Mission photo review</h2>
<table>
  <tr>
    <td>
        <table class="mission-photo-table">
          <tr>
            <td><b>Matching:</b></td>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <td>Passenger</td>
            <td><?php echo $mission_photo->getPassengerName() ?></td>
          </tr>
          <tr>
            <td>Pilot</td>
            <td><?php echo $mission_photo->getPilotName() ?></td>
          </tr>
          <tr>
            <td>Date</td>
            <td><?php echo date('m/d/Y', strtotime($mission_photo->getMissionDate())) ?></td>
          </tr>
          <tr>
            <td>Origin</td>
            <td><?php echo $mission_photo->getOrigin() ?></td>
          </tr>
          <tr>
            <td>Destination</td>
            <td><?php echo $mission_photo->getDestination()?></td>
          </tr>
        </table>
    </td>
    <td>
        <a href="#" onclick="popupMissionPhotoShow('<?php echo url_for('mission_photo/showPhoto?id='.$mission_photo->getId()) ?>');">
          <img src="/uploads/mission_photo/display/<?php echo $mission_photo->getPhotoFilename() ?>" style="height: 150px;" />
        </a>
    </td>
    <td style="vertical-align:top;">
      <div class="form-submit" style="padding-top: 10px;">
        <?php if($pht[0]->getPhotoFilename() != ''):?>
        <a href="<?php echo url_for('mission_photo/removePhoto?id='.$mission_photo->getId())?>" class="btn-action btn-show"><span>Remove photo</span><strong>&nbsp;</strong></a><br />
        <?php endif; ?>
        <a href="<?php echo url_for('mission_photo/useMission?id='.$mission_photo->getId())?>" class="btn-action btn-show"><span>Approve photo without matching</span><strong>&nbsp;</strong></a>
      </div>
    </td>
  </tr>
</table>

  <div class="missions-available">
    <form id="filter_form" method="post" action="<?php echo url_for('mission_photo/show')?>">
    <input type="hidden" value="<?php echo $mission_photo->getId()?>" name="id">
      <input type="hidden" name="filter" value="1"/>
      <div class="missions-available-filter">
        <div class="bg">
          <div class="characteristic_clean">
            <div class="holder">
              <div>
                <label for="ff_miss_id">Mission ID</label>
                <input type="text" class="text" value="<?php echo $miss_id?>" id="ff_miss_id" name="miss_id"/>
                <br clear="left"/>
                <label for="ff_mission_type">Mission Type</label>
                <?php echo select_tag('miss_type', options_for_select($types, $miss_type, array('include_custom' => '- any -')), array('id' => 'ff_mission_type','class'=>'text'))?>
              </div>
               <div>
                <label for="ff_miss_date1">Start Date</label>
                <?php echo $date_widget->render('miss_date1', $miss_date1);?>
                <br clear="left"/>
                <label for="ff_miss_date2">End Date</label>
                <?php echo $date_widget->render('miss_date2', $miss_date2);?>
              </div>
               <div>
                <label for="ff_pass_fname">Passenger First Name</label>
                <input type="text" class="text" value="<?php echo $pass_fname?>" id="ff_pass_fname" name="pass_fname"/>
                <br clear="left"/>
                <label for="ff_pass_lname">Passenger Last Name</label>
                <input type="text" class="text" value="<?php echo $pass_lname?>" id="ff_pass_lname" name="pass_lname"/>
              </div>
               <div>
                <label for="ff_mreq_fname">Requester First Name</label>
                <input type="text" class="text" value="<?php echo $mreq_fname?>" id="ff_mreq_fname" name="mreq_fname"/>
                <br clear="left"/>
                <label for="ff_mreq_lname">Requester Last Name</label>
                <input type="text" class="text" value="<?php echo $mreq_lname?>" id="ff_mreq_lname" name="mreq_lname"/>
              </div>
            </div>
            <input type="submit" value="Find"/>
            <?php echo link_to('reset', 'mission_photo/show?filter=1&id='.$mission_photo->getId())?>
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
    echo link_to_if($max != $v, $v, 'mission_photo/show?max='.$v.'&id='.$mission_photo->getId());
  }?>
  <div>
    <form action="<?php echo url_for('mission_photo/show')?>">
    <input type="hidden" value="<?php echo $mission_photo->getId()?>" name="id">
      <?php echo link_to('Previous', 'mission_photo/show?page='.$pager->getPreviousPage().'&id='.$mission_photo->getId(), array('class' => 'btn-pager-prev'))?>
      <input type="text" name="page" class="active-page" value="<?php echo $pager->getPage()?>"/>
      <strong>of <?php echo link_to($pager->getLastPage(), 'mission_photo/show?page='.$pager->getLastPage().'&id='.$mission_photo->getId())?></strong>
      <?php echo link_to('Next', 'mission_photo/show?page='.$pager->getNextPage().'&id='.$mission_photo->getId(), array('class' => 'btn-pager-next'))?>
      <input type="submit" class="hide"/>
    </form>
  </div>
</div>
<br/>
<table class="mission-request-table">
<thead>
  <tr>
    <td>Appt Date</td>
    <td>Mission Type</td>
    <td>Requester</td>
    <td>Passenger</td>
    <td>Action</td>
  </tr>
</thead>
<tbody>
<?php foreach ($mission_list as $miss):?>
  <tr>
        <td class="cell-1">
        <?php if($miss->getApptDate()):?><?php echo $miss->getApptDate('m/d/y')?><?php endif;?>
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
             echo $person->getTitle().' . '.$person->getFirstName().' '.$person->getLastName();
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
             echo $person->getTitle().' . '.$person->getFirstName().' '.$person->getLastName();
           }
           ?>
        <?php endif;?>
        <?php endif;?>
        </td>
        <td class="cell-1">
        <!--/ CHECK SECURITY-->
        <ul class="action-list">
          <!-- <li>
          <?php if ($sf_user->hasCredential(array('Administrator','Staff'), false)){?>
            <?php if($mission_photo->getMissionId() == $miss->getId()):?>
              <span style="color:green;">Now mission</span><br />
              
              <a style="color:blue;" href="<?php echo url_for('mission_photo/useMission?mission_id='.$miss->getId().'&photo_id='.$mission_photo->getId().'&disuse=1')?>" class="link-view">Disuse this mission</a>
              
              <a style="color:blue;" href="<?php echo url_for('mission_photo/edit?id='.$mission_photo->getId())?>" class="link-view">Disuse this mission</a>
             
             <?php else:?>
              <a style="color:blue;" href="<?php echo url_for('mission_photo/useMission?mission_id='.$miss->getId().'&photo_id='.$mission_photo->getId())?>" class="link-view">Use this mission</a>
            <?php endif;?>
           <?php } ?>
          </li>-->
          <li>
              <a style="color:blue;" href="<?php echo url_for('mission_photo/useMission?id='.$mission_photo->getId())?>" class="link-view">Use this mission</a>
          </li>
        </ul>
        </td>
  </tr>
</tbody>
<?php endforeach;?>
</table>
<span><a href="/mission_photo">Back</a></span>
<div class="pager">
  Mission per page:
  <?php foreach ($max_array as $i => $v) {
    if ($i) echo ' | ';
    echo link_to_if($max != $v, $v, 'mission_photo/show?max='.$v.'&id='.$mission_photo->getId());
  }?>
  <div>
    <form action="<?php echo url_for('mission_photo/show')?>">
      <input type="hidden" value="<?php echo $mission_photo->getId()?>" name="id">
      <?php echo link_to('Previous', 'mission_photo/show?page='.$pager->getPreviousPage().'&id='.$mission_photo->getId(), array('class' => 'btn-pager-prev'))?>
      <input type="text" name="page" class="active-page" value="<?php echo $pager->getPage()?>"/>
      <strong>of <?php echo link_to($pager->getLastPage(), 'mission_photo/show?page='.$pager->getLastPage().'&id='.$mission_photo->getId())?></strong>
      <?php echo link_to('Next', 'mission_photo/show?page='.$pager->getNextPage().'&id='.$mission_photo->getId(), array('class' => 'btn-pager-next'))?>
      <input type="submit" class="hide"/>
    </form>
  </div>
</div>
<br/>
<?php }?>

<?php $info = getimagesize(sfConfig::get('sf_upload_dir').'/mission_photo/'.$mission_photo->getPhotoFilename())?>
<?php $width   = $info[0];?>
<?php $height  = $info[1];?>

<script type="text/javascript">
function popupMissionPhotoShow(url) {
 win = window.open(url,"Logo","menubar=no,toolbar=no,titlebar=no,location=no,resizable=no,width=<?php echo $width?>,height=<?php echo $height?>,screenX=350,screenY=250");
 win.focus()
} 
</script>