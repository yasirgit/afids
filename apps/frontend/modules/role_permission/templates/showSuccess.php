<?php use_helper('jQuery')?>

<?php echo jq_form_remote_tag(array(
  'url' => 'role_permission/save',
  'loading' => "$('#indicator').show();",
  'before' => "sfDoubleList.submit(document.getElementById('rr_form'), 'double_list_select');",
  'success' => "$('#indicator').hide(); $('#notification').html(data).effect('highlight', '', 3000);",
  'dataType'=> "text",
), array('id' => 'rr_form'))?>
  <input type="hidden" name="id" value="<?php echo $role->getId()?>"/>
  <?php echo $sf_data->getRaw('widget')->render('permissions', $sf_data->getRaw('assoc_perms')); ?>
  
  <a class="btn-action" href="#" onclick="$('#rr_form_submit').click(); return false;"><span>Save</span><strong> </strong></a>
  <input type="submit" id="rr_form_submit" class="hide"/>
</form>

