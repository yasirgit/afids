<?php
use_helper('jQuery');
$errors = $sf_data->getRaw('errors');
$saved_values = $sf_data->getRaw('saved_values');
?>

Your changes have been successfully saved!
<?php if (count($errors)) { ?>
  But following error(s) appeared:<br/>
  <span style="color:red;"><?php echo implode('<br/>', $errors)?></span> <br/>
<?php }?>

<?php
jq_javascript_tag();
foreach ($saved_values as $key => $value) {
  if (is_numeric($value)) {
    echo "original['$key'] = ".$value.';';
    echo "revert_val['$key'] = ".$value.';';
  }elseif (is_array($value)){
    echo "original['$key'] = [".implode(',', $value)."];";
    echo "revert_val['$key'] = [".implode(',', $value)."];";
  }else{
    echo "original['$key'] = '".$value."';";
    echo "revert_val['$key'] = '".$value."';";
  }
  echo "removeChanges('$key');";
}
jq_end_javascript_tag();
?>