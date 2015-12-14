<?php use_helper("jQuery")?>
<?php
use_helper('Form');
$date_widget = $sf_data->getRaw('date_widget');
use_javascripts_for_form($date_widget);
use_stylesheets_for_form($date_widget);
?>
<?php use_helper('Javascript', 'Form') ?>

<?php echo jq_javascript_tag() ?>
      jQuery(document).ready(
         function(){
            jQuery(".open-popup").click(
               function(index){
                  var img_src = jQuery(this).children(":nth-child(1)").attr('src');
                  img_src = img_src.split("/");
                  img_src = img_src[img_src.length -1];
                  jQuery("#gallery-image").attr("src", "/uploads/mission_photo/display/" + img_src);
                  jQuery('#gallery-image_pop_up').dialog({
                       buttons: {
                           "Close": function() {
                             jQuery(this).dialog("close");
                           }
                       },
                       title: "Big Image",
                       width: 550,
                       hide: "slide",
                       modal: true,
                       show: 'slide'
                  });
                  jQuery('#gallery-image_pop_up').dialog("open");
               }
            );
         });
<?php jq_end_javascript_tag() ?>
         
<h2>
    Mission photo
<span class="form-submit" style="padding:5px 194px 0 0; font-size: 12px;">
  <a href="/mission_photo/new" class="btn-action"><span>Add Photo</span><strong>&nbsp;</strong></a>
</span>
</h2>
<a href="/mission_photo/gallery"><span>Photo Gallery</span></a>

<div class="missions-photo">
    <form id="filter_form" method="post" action="<?php echo url_for('@default_index?module=mission_photo')?>">
      <input type="hidden" name="filter" value="1"/>
      <div class="missions-available-filter">
        <div class="bg">
          <div class="characteristic_clean">
            <div class="holder">
              <div>
                <label for="ff_miss_photo_id">Mission Photo ID</label>
                <input type="text" class="text" value="<?php echo $miss_photo_id ?>" id="ff_miss_photo_id" name="miss_photo_id"/>
                <br clear="left"/>
                <label for="ff_pilot_name">Pilot Name</label>
                <input type="text" class="text" value="<?php echo $pilot_name ?>" id="ff_pilot_name" name="pilot_name"/>
              </div>
               <div>
                <label for="ff_submission_date">Submission Date</label>
                <?php echo $date_widget->render('submission_date', $submission_date);?>
                <br clear="left"/>
                <label for="ff_mission_date">Mission Date</label>
                <?php echo $date_widget->render('mission_date', $mission_date);?>
              </div>
             </div>
            <input type="submit" value="Find"/>
            <?php echo link_to('reset', '@default_index?module=mission_photo&filter=1')?>
          </div>          
        </div>
      </div>
    </form>
  </div>

<?php if (isset($pager )&& $pager->getNbResults()) { ?>
<div class="pager">
  Photos per page:
  <?php foreach ($max_array as $i => $v) {
    if ($i) echo ' | ';
    echo link_to_if($max != $v, $v, '@default_index?module=mission_photo&max='.$v);
  }?>
  <div>
    <form action="<?php echo url_for('@default_index?module=mission_photo')?>">
      <?php echo link_to('Previous', '@default_index?module=mission_photo&page='.$pager->getPreviousPage(), array('class' => 'btn-pager-prev'))?>
      <input type="text" name="page" class="active-page" value="<?php echo $pager->getPage()?>"/>
      <strong>of <?php echo link_to($pager->getLastPage(), '@default_index?module=mission_photo&page='.$pager->getLastPage())?></strong>
      <?php echo link_to('Next', '@default_index?module=mission_photo&page='.$pager->getNextPage(), array('class' => 'btn-pager-next'))?>
      <input type="submit" class="hide"/>
    </form>
  </div>
</div>
<table class="mission-request-table">
  <thead>
    <tr>
      <td>Photo</td>
      <td>Upload Date</td>
      <td>Event/Mission date</td>
      <td>Passenger(s)</td>
      <td>Pilot</td>
      <?php if ($sf_user->hasCredential(array('Administrator','Staff'), false)){ ?>
      <td>Route</td>
      <td>Action</td>
      <?php } ?>
    </tr>
  </thead>
  <tbody style="text-align:center;">
    <?php foreach ($mission_photo_list as $mission_photo): ?>
      <tr>
      <td style="padding:4px 0; vertical-align:middle;">
           <a href="#pht" class="open-popup">
            <img src="/uploads/mission_photo/thumbnails/<?php echo $mission_photo->getPhotoFilename() ?>" />
          </a>
      </td>
      <td style="padding:4px 0;">
        <a href="<?php echo url_for('mission_photo/show?id='.$mission_photo->getId())?>">
            <?php echo date('m/d/Y', strtotime($mission_photo->getSubmissionDate())) ?>
        </a>
      </td>
      <td style="padding:4px 0; vertical-align:middle;"><?php if(!is_null($mission_photo->getMissionDate())) echo date('m/d/Y', strtotime($mission_photo->getMissionDate())); else echo "---" ?></td>
      <td style="padding:4px 0; vertical-align:middle;"><?php echo $mission_photo->getPassengerName() ?></td>
      <td style="padding:4px 0; vertical-align:middle;"><?php echo $mission_photo->getPilotName() ?></td>
      <?php if ($sf_user->hasCredential(array('Administrator','Staff'), false)) { ?>
      <td style="padding:4px 0; vertical-align:middle;"><?php echo $mission_photo->getOrigin() ?> / <?php echo $mission_photo->getDestination()?></td>
      <td style="padding:4px 0; vertical-align:middle;">
      <?php echo link_to('view', 'mission_photo/show?id='.$mission_photo->getId(), array('class'=>'link-view'))?><br />
           <a class="link-edit" href="<?php echo url_for('mission_photo/edit?id='.$mission_photo->getId())?>">edit</a><br />
      <?php echo link_to('remove', 'mission_photo/delete?id='.$mission_photo->getId(), array('method' => 'delete', 'confirm' => 'Are you sure?', 'class' => 'action-remove')); ?><br>
      <?php if($mission_photo->getApproved() == 1){?>
          <font color="green">Approved</font>
      <?php }else{ ?>
          <a href="javascript:void(0)" missionPhotoid="<?php echo $mission_photo->getId();?>" class="action-approve">Approve</a>
      <?php } ?>
        </td>
      <?php } ?>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>
<div class="pager">
  Photos per page:
  <?php
  foreach ($max_array as $i => $v) {
    if ($i) echo ' | ';
    echo link_to_if($max != $v, $v, '@default_index?module=mission_photo&max='.$v);
  }
  ?>
  <div>
    <form action="<?php echo url_for('@default_index?module=mission_photo')?>">
      <?php echo link_to('Previous', '@default_index?module=mission_photo&page='.$pager->getPreviousPage(), array('class' => 'btn-pager-prev'))?>
      <input type="text" name="page" class="active-page" value="<?php echo $pager->getPage()?>"/>
      <strong>of <?php echo link_to($pager->getLastPage(), '@default_index?module=mission_photo&page='.$pager->getLastPage())?></strong>
      <?php echo link_to('Next', '@default_index?module=mission_photo&page='.$pager->getNextPage(), array('class' => 'btn-pager-next'))?>
      <input type="submit" class="hide"/>
    </form>
  </div>
</div>
<?php }?>
<div id="action-approve" style="display:none">
    Are you sure want to approve this photo?
</div>
<script type="text/javascript">
jQuery('.action-approve').click(function(){
   var missionPhotoid = jQuery(this).attr("missionPhotoid");
   jQuery('#action-approve').dialog({
       buttons: {
           "Close": function() {
             jQuery(this).dialog("close");
           },
           "Ok" : function(){
              window.location.href =  "<?php echo url_for('mission_photo/approved?id=')?>" + missionPhotoid;
           }
       },
       title: "Approve Mission Photo",
       width: 350,
       hide: "slide",
       modal: true,
       show: 'slide'
  });
  jQuery('#action-approve').dialog("open");
});
</script>
<div id="gallery-image_pop_up" style="text-align:center; display: none">
   <img id="gallery-image" width="500" src="">
</div>