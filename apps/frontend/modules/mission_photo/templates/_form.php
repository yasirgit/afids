<?php include_stylesheets_for_form($form) ?>
<?php include_javascripts_for_form($form) ?>

<form action="<?php echo url_for('mission_photo/'.($form->getObject()->isNew() ? 'create' : 'update').(!$form->getObject()->isNew() ? '?id='.$form->getObject()->getId() : '')) ?>" method="post" <?php $form->isMultipart() and print 'enctype="multipart/form-data" ' ?> id="mission_photo_form">
<?php if(!$form->getObject()->isNew()): ?>
<input type="hidden" name="sf_method" value="put" />
<?php endif; ?>
<input type="hidden" name="first_name" value="<?php echo $sf_user->getFirstName();?>" />
<input type="hidden" name="last_name" value="<?php echo $sf_user->getLastName();?>" />
<?php if(!$form->getObject()->isNew()): ?>
<?php if($sf_user->hasCredential(array('Administrator','Staff'), false)) {?>
<table>
  <tr>
    <td style="width: 30%;">
      <b>Mission photo review</b><br />
      Make any edits to the caption or comment as necessary. This text may appear on a publicly available web site if yiou approve this photo for publication. Remember that we do not allow passengers last names to appear on publicly available material.
    </td>
    <td>
      <a href="#" onclick="popupMissionPhotoShow('<?php echo url_for('mission_photo/showPhoto?id='.$form->getObject()->getId()) ?>');">
        <img src="/uploads/mission_photo/display/<?php echo $form->getObject()->getPhotoFilename() ?>" style="height: 150px;" />
      </a>
    </td>
  </tr>
</table>
<?php } ?>
<?php endif; ?>
  <table>
    <tbody>
      <?php echo $form->renderGlobalErrors() ?>
      <tr>
        <th><?php echo $form['mission_date']->renderLabel() ?></th>
        <td>
          <?php echo $form['mission_date']->renderError() ?>
          <?php echo $form['mission_date'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['passenger_name']->renderLabel() ?></th>
        <td>
          <?php echo $form['passenger_name']->renderError() ?>
          <?php echo $form['passenger_name'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['pilot_name']->renderLabel() ?></th>
        <td>
          <?php echo $form['pilot_name']->renderError() ?>
          <?php echo $form['pilot_name'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['origin']->renderLabel() ?></th>
        <td>
          <?php echo $form['origin']->renderError() ?>
          <?php echo $form['origin'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['destination']->renderLabel() ?></th>
        <td>
          <?php echo $form['destination']->renderError() ?>
          <?php echo $form['destination'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['caption']->renderLabel() ?></th>
        <td>
          <?php echo $form['caption']->renderError() ?>
          <?php echo $form['caption'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['comment']->renderLabel() ?></th>
        <td>
          <?php echo $form['comment']->renderError() ?>
          <?php echo $form['comment'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['photo_filename']->renderLabel() ?></th>
        <td>
          <?php echo $form['photo_filename']->renderError() ?>
          <?php echo $form['photo_filename'] ?>
          <br />photo file on your computer. Please limit file sizes to less than 1 MB. 
        </td>
      </tr>
      <?php if ($sf_user->hasCredential(array('Administrator','Staff'), false)) { ?>
      <input type="hidden" name="admin_staff" value="1" />
      <tr>
        <th>Photo quality</th>
        <td>
            <select name="photo_quality">
              <option value="1" <?php if ($form->getObject()->getPhotoQuality() == 1) echo 'selected="selected"'?>>Excellent</option>
              <option value="2" <?php if ($form->getObject()->getPhotoQuality() == 2) echo 'selected="selected"'?>>Good</option>
              <option value="3" <?php if ($form->getObject()->getPhotoQuality() == 3) echo 'selected="selected"'?>>Fair</option>
              <option value="4" <?php if ($form->getObject()->getPhotoQuality() == 4) echo 'selected="selected"'?>>Poor</option>
              <option value="5" <?php if ($form->getObject()->getPhotoQuality() == 5) echo 'selected="selected"'?>>Not Usable</option>
            </select>
        </td>
      </tr>
      <tr>
        <th>Photo type</th>
        <td>
          <select name="photo_type" onchange="showEvent(this)">
            <option <?php if ($form->getObject()->getCategory() == 'Mission Photo') echo 'selected="selected"'?> value="Mission Photo">Mission Photo</option>
            <option <?php if ($form->getObject()->getCategory() == 'Event') echo 'selected="selected"'?> value="Event">Event</option>
            <option <?php if ($form->getObject()->getCategory() == 'Newsletter') echo 'selected="selected"'?> value="Newsletter">Newsletter</option>
            <option <?php if ($form->getObject()->getCategory() == 'Other') echo 'selected="selected"'?> value="Other">Other</option>
          </select>
        </td>
      </tr>
      <tr id="txtHint">
          <?php if($allEvents){ ?>
                <?php echo $allEvents; ?>
          <?php } ?>
      </tr>
      <tr>
        <th>Photo use</th>
        <td>
          <select name="photo_use">
            <option value="Front Page" <?php if ($form->getObject()->getPhotoUse() == 'Front Page') echo 'selected="selected"'?>>Front Page</option>
            <option value="Right Seat" <?php if ($form->getObject()->getPhotoUse() == 'Right Seat') echo 'selected="selected"'?>>Right Seat</option>
          </select>
        </td>
      </tr>
      <tr>
        <th>Approved</th>
        <td>
          <input type="checkbox" name="approved" value="1" id="approved" <?php if ($form->getObject()->getApproved() == 1) echo "checked"?>><label for="approved_yes">Yes</label><br>
        </td>
      </tr>
      <?php }?>
    </tbody>
    
    <tfoot>
      <tr>
        <td colspan="2">
         <div class="form-submit" style="padding:23px 194px 0 0; ">
          
          <?php echo $form->renderHiddenFields() ?>
          &nbsp;<a href="<?php echo url_for('mission_photo/index') ?>" class="cancel" style="padding-left:5px;">Cancel</a>
          <?php if (!$form->getObject()->isNew()): ?>
            &nbsp;<?php echo link_to('Delete', 'mission_photo/delete?id='.$form->getObject()->getId(), array('method' => 'delete', 'confirm' => 'Are you sure?', 'class'=>'cancel', 'style'=>'padding-left:5px;')) ?>
          <?php endif; ?>
           <a href="#" onclick="$('#mission_photo_form').submit(); return false;" class="btn-action"><span>Save</span><strong>&nbsp;</strong></a>
         </div>
        </td>
      </tr>
    </tfoot>
  </table>
</form>
<script type="text/javascript">
  function showEvent(select)
  { 
    if(select.value.toLowerCase() != "event") {
     jQuery("#txtHint").hide();
     return;
    }
    jQuery("#txtHint").show();
    jQuery.ajax({
     url: '/mission_photo/getEvent',
     data: {eventName: 'Event'},
     dataType: 'html',
     success: function(html) {
       jQuery('#txtHint').html(html);
       //console.log(html);
     }    
    });
  }
</script>