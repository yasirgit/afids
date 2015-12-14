<?php
use_helper('Form','Javascript');
/*$date_widget = $sf_data->getRaw('date_widget');
use_javascripts_for_form($date_widget);
use_stylesheets_for_form($date_widget);*/
?>

<h2>Bulk Email: Queued</h2>
<?php if(!empty($queued_email_lists)):?>
<?php if ($pager->getNbResults()) {?>
<div class="pager">
  Queued email per page:
  <?php foreach ($max_array as $i => $v) {
    if ($i) echo ' | ';
    echo link_to_if($max != $v, $v, 'email/listEditBulkQueuedEmail?max='.$v);
  }?>
  <div>
    <form action="<?php echo url_for('email/listEditBulkQueuedEmail')?>">
      <?php echo link_to('Previous', 'email/listEditBulkQueuedEmail?page='.$pager->getPreviousPage(), array('class' => 'btn-pager-prev'))?>
      <input type="text" name="page" class="active-page" value="<?php echo $pager->getPage()?>"/>
      <strong>of <?php echo link_to($pager->getLastPage(), 'email/listEditBulkQueuedEmail?page='.$pager->getLastPage())?></strong>
      <?php echo link_to('Next', 'email/listEditBulkQueuedEmail?page='.$pager->getNextPage(), array('class' => 'btn-pager-next'))?>
      <input type="submit" class="hide"/>
    </form>
  </div>
</div>
<style type="text/css">
	.mission-request-table p{
		margin:0;
	}
	.mission-request-table tbody td{
		padding:10px;
		vertical-align: middle;
	}
</style>
<table class="mission-request-table">
<thead>
  <tr>
    <td>Sender Name</td>
    <td>Sender Email</td>
    <td>Body</td>
    <td>Recipients</td>
    <td>Exist Attached File(s)?</td>
  </tr>
</thead>
<tbody>
  <?php foreach ($queued_email_lists as $queued_list): ?>  
  <tr>
    <td align="center" class="cell-1">
      <?php echo $queued_list['sender_name']?>
    </td>
    <td align="center" class="cell-1"><?php echo $queued_list['sender_email']?></td>
    <td align="center"><?php echo $queued_list['body']?></td>
    
    <td align="center"><?php if(is_array($queued_list['recipients'])):?>
    	<?php foreach($queued_list['recipients'] as $recepient):?>
    	<?php if(!is_array($recepient)):echo $recepient.'<br />'?>
    	<?php endif;?>
    	<?php endforeach;?>
    	<?php else:?>
    		<?php if(!empty($queued_list['recipients'])):?>
    			<?php echo $queued_list['recipients']?>
    		<?php else: ?>    	
    			<?php echo '---';?>
    		<?php endif;?>
    	<?php endif;?>
    </td>
    <td align="center">
    	<?php if (!empty($queued_list['attach_file_path'])):?>
    	yes
    	<?php else:?>
    	no
    	<?php endif;?>
    </td>
  </tr>
  <?php endforeach;?>
</tbody>
</table>

<div class="pager">
  Queued email per page:
  <?php foreach ($max_array as $i => $v) {
    if ($i) echo ' | ';
    echo link_to_if($max != $v, $v, 'email/listEditBulkQueuedEmail?max='.$v);
  }?>
  <div>
    <form action="<?php echo url_for('email/listEditBulkQueuedEmail')?>">
      <?php echo link_to('Previous', 'email/listEditBulkQueuedEmail?page='.$pager->getPreviousPage(), array('class' => 'btn-pager-prev'))?>
      <input type="text" name="page" class="active-page" value="<?php echo $pager->getPage()?>"/>
      <strong>of <?php echo link_to($pager->getLastPage(), 'email/listEditBulkQueuedEmail?page='.$pager->getLastPage())?></strong>
      <?php echo link_to('Next', 'email/listEditBulkQueuedEmail?page='.$pager->getNextPage(), array('class' => 'btn-pager-next'))?>
      <input type="submit" class="hide"/>
    </form>
  </div>
</div>
<?php }?>
<?php else:?>
<h2>There is no bulk queued email</h2>
<?php endif;?>
