<?php
use_helper('Form','Javascript');
/*$date_widget = $sf_data->getRaw('date_widget');
use_javascripts_for_form($date_widget);
use_stylesheets_for_form($date_widget);*/
?>

<h2>Bulk Email: Sent</h2>
<?php if(!empty($sent_email_lists)):?>
<?php if ($pager->getNbResults()) {?>
<div class="pager">
  Sent email per page:
  <?php foreach ($max_array as $i => $v) {
    if ($i) echo ' | ';
    echo link_to_if($max != $v, $v, 'email/listEditBulkSentEmail?max='.$v);
  }?>
  <div>
    <form action="<?php echo url_for('email/listEditBulkSentEmail')?>">
      <?php echo link_to('Previous', 'email/listEditBulkSentEmail?page='.$pager->getPreviousPage(), array('class' => 'btn-pager-prev'))?>
      <input type="text" name="page" class="active-page" value="<?php echo $pager->getPage()?>"/>
      <strong>of <?php echo link_to($pager->getLastPage(), 'email/listEditBulkSentEmail?page='.$pager->getLastPage())?></strong>
      <?php echo link_to('Next', 'email/listEditBulkSentEmail?page='.$pager->getNextPage(), array('class' => 'btn-pager-next'))?>
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
  <?php foreach ($sent_email_lists as $sent_list): ?>  
  <tr>
    <td valign="top" class="cell-1">
      <?php echo $sent_list['sender_name']?>
    </td>
    <td valign="top" class="cell-1"><?php echo $sent_list['sender_email']?></td>
    <td valign="top"><?php echo $sent_list['body']?></td>
    
    <td valign="top"><?php if(is_array($sent_list['recipients'])):?>
    	<?php foreach($sent_list['recipients'] as $recepient):?>
    	<?php if(!is_array($recepient)):echo $recepient.'<br />'?>
    	<?php endif;?>
    	<?php endforeach;?>
    	<?php else:?>
    		<?php if(!empty($sent_list['recipients'])):?>
    			<?php echo $sent_list['recipients']?>
    		<?php else: ?>    	
    			<?php echo '---';?>
    		<?php endif;?>
    	<?php endif;?>
    </td>
    <td valign="top">
    	<?php if (!empty($sent_list['attach_file_path'])):?>
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
  Sent email per page:
  <?php foreach ($max_array as $i => $v) {
    if ($i) echo ' | ';
    echo link_to_if($max != $v, $v, 'email/listEditBulkSentEmail?max='.$v);
  }?>
  <div>
    <form action="<?php echo url_for('email/listEditBulkSentEmail')?>">
      <?php echo link_to('Previous', 'email/listEditBulkSentEmail?page='.$pager->getPreviousPage(), array('class' => 'btn-pager-prev'))?>
      <input type="text" name="page" class="active-page" value="<?php echo $pager->getPage()?>"/>
      <strong>of <?php echo link_to($pager->getLastPage(), 'email/listEditBulkSentEmail?page='.$pager->getLastPage())?></strong>
      <?php echo link_to('Next', 'email/listEditBulkSentEmail?page='.$pager->getNextPage(), array('class' => 'btn-pager-next'))?>
      <input type="submit" class="hide"/>
    </form>
  </div>
</div>
<?php }?>
<?php else:?>
<h2>There is no bulk sent email</h2>
<?php endif;?>
