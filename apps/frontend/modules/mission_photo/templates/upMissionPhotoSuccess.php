<?php include_stylesheets_for_form($form) ?>
<?php include_javascripts_for_form($form) ?>
<div>
<b>Mission Photos</b><br />
  Use this convenient system to submit mission photos to the Angel Flight West Archives. We use these photos in the newsletter, and on our web site.
</div>
<form action="<?php echo url_for('mission_photo/upMissionPhoto') ?>" method="post" enctype="multipart/form-data" id="up_mission_photo_form">
  <table>
    <tbody>
      <?php //echo $form->renderGlobalErrors() ?>
      <tr>
        <th><?php echo $form['first_name']->renderLabel() ?></th>
        <td>
          <?php echo $form['first_name']->renderError() ?>
          <?php echo $form['first_name'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['last_name']->renderLabel() ?></th>
        <td>
          <?php echo $form['last_name']->renderError() ?>
          <?php echo $form['last_name'] ?>
        </td>
      </tr>
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
      <input type="hidden" name="mission_photo[pilot_name]" value="Pilot" />
    </tbody>

    <tfoot>
      <tr>
        <td colspan="2">
         <div class="form-submit" style="padding:23px 194px 0 0; ">
          <?php echo $form->renderHiddenFields() ?>
           <a href="#" onclick="$('#up_mission_photo_form').submit(); return false;" class="btn-action"><span>Save</span><strong>&nbsp;</strong></a>
         </div>
        </td>
      </tr>
    </tfoot>
  </table>
</form>
