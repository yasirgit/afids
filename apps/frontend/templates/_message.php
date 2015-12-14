<?php if ($sf_user->hasFlash('success')){?>
<div class="success"><?php echo $sf_user->getFlash('success')?></div>
<?php }?>
<?php if ($sf_user->hasFlash('warning')){?>
<div  class="warning"><?php echo $sf_user->getFlash('warning')?></div>
<?php }?>

<?php if ($sf_user->hasFlash('info')){?>
<div  class="info"><?php echo $sf_user->getFlash('info')?></div>
<?php }?>

<?php if ($sf_user->hasFlash('error')){?>
<div  class="error"><?php echo $sf_user->getFlash('error')?></div>
<?php }?>
