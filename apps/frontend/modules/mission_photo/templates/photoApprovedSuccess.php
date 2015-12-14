<?php use_helper("jQuery")?>
<h2>Mission photo</h2>
The following mission photos were found:

<?php echo jq_javascript_tag()?>
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
<?php jq_end_javascript_tag()?>

<div class="missions-photo">
    <form id="filter_form" method="post" action="/mission_photo/approved_photo">
      <input type="hidden" name="filter" value="1"/>
      <div class="missions-available-filter">
        <div class="bg">
          <div class="characteristic_clean">
            <div class="holder">
                <table>
                    <tr>
                        <td align="left" width="40%">
                            Sort By
                        </td>
                        <td align="left" width="30%">
                            Pilot Name
                        </td>
                        <td align="left" width="25%">
                            Pass Name
                        </td>
                    </tr>
                    <tr>
                        <td align="left" width="40%">
                            <select size="1" name="sort_by">
                                <option value="">-- Select --</option>
                                <option value="submission_date">Submission Date</option>
                                <option value="mission_date">Mission Date</option>
                                <option value="pilot_name">Pilot Name</option>
                                <option value="passenger_name">Passenger Name</option>
                                <option value="photo_quality">Quality</option>
                            </select>
                        </td>
                        <td align="left" width="30%">
                            <input type="text" size="20" value="" name="pilot_name">
                        </td>
                        <td align="left" width="25%">
                            <input type="text" size="20" value="" name="passenger_name">
                        </td>
                    </tr>
                </table>
             </div>
              <input type="submit" value="Find" style="float: right"/>
          </div>
        </div>
      </div>
    </form>
  </div>

<table class="mission-request-table">
  <thead>
    <tr>
      <td>Photo</td>
      <td>Mission date<br>Submission Date</td>
      <td>Passenger</td>
      <td>Pilot</td>
      <td>Quality</td>
     </tr>
  </thead>
  <tbody style="text-align:center;">
    <?php foreach ($mission_photo_approved as $mission_photo): ?>
      <tr>
      <td style="padding:4px 0; vertical-align:middle;">
          <a href="#pht" class="open-popup">
            <img src="/uploads/mission_photo/thumbnails/<?php echo $mission_photo->getPhotoFilename() ?>" />
          </a>
      </td>
      <td style="padding:4px 0; vertical-align:middle;"><?php echo date('m/d/Y', strtotime($mission_photo->getMissionDate())) ?><br><?php echo date('m/d/Y', strtotime($mission_photo->getSubmissionDate())) ?></td>
      <td style="padding:4px 0; vertical-align:middle;"><?php echo $mission_photo->getPassengerName() ?></td>
      <td style="padding:4px 0; vertical-align:middle;"><?php echo $mission_photo->getPilotName() ?></td>
      <td style="padding:4px 0; vertical-align:middle;">
              <?php
                if($mission_photo->getPhotoQuality() == 1){
                    echo 'Excellent';
                }
                else if($mission_photo->getPhotoQuality() == 2){
                    echo 'Good';
                }
                else if($mission_photo->getPhotoQuality() ==  3){
                    echo 'Fair';
                }
                else if($mission_photo->getPhotoQuality() ==  4){
                    echo 'Poor';
                }
                else if($mission_photo->getPhotoQuality() == 5){
                    echo 'Not Usable';
                }
               ?>
      </td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>
<?php if ($pager->getNbResults()) { ?>
<div class="pager">
  Photos per page:
  <?php
  foreach ($max_array as $i => $v) {
    if ($i) echo ' | ';
    echo link_to_if($max != $v, $v, '/mission_photo/approved_photo?max='.$v);
  }
  ?>
  <div>
    <form action="<?php echo url_for('/mission_photo/approved_photo')?>">
      <?php echo link_to('Previous', '/mission_photo/approved_photo?page='.$pager->getPreviousPage(), array('class' => 'btn-pager-prev'))?>
      <input type="text" name="page" class="active-page" value="<?php echo $pager->getPage()?>"/>
      <strong>of <?php echo link_to($pager->getLastPage(), '/mission_photo/approved_photo?page='.$pager->getLastPage())?></strong>
      <?php echo link_to('Next', '/mission_photo/approved_photo?page='.$pager->getNextPage(), array('class' => 'btn-pager-next'))?>
      <input type="submit" class="hide"/>
    </form>
  </div>
</div>
<?php }?>
<div id="action-approve" style="display:none">
    Are you sure want to approve this photo?
</div>
<div id="gallery-image_pop_up" style="text-align:center; display: none">
   <img id="gallery-image" width="500" src="">
</div>