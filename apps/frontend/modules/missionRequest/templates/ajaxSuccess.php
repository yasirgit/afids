<?php use_helper('Javascript', 'Form') ?>
<?php use_helper('jQuery', 'Form') ?>

<?php
echo jq_form_remote_tag(array(
  'update'  => 'result_div',
  'url'     => 'missionRequest/ajax',
  'method'  => 'post',
), array(
  'id'    => 'form',
  'style' => 'display:block;'
  ));
  ?>
<input
	type="hidden" value="" id="start_date" name="start_date" />
<input
	type="hidden" value="" id="end_date" name="end_date" />
<input type="submit"
	class="hide" id="form_submit" />
</form>
