
<div id="body_part">
<table class="mission-request-table">
	<thead>
		<tr>
			<td class="cell-1">Request Date</td>
			<td class="cell-2">Appt. Date</td>
			<td class="cell-3">Names</td>
			<td class="cell-4">Route</td>
			<td>Action</td>
		</tr>
	</thead>
	<tbody>
	<?php foreach ($mission_reqs as $req): ?>
		<tr>
			<td class="cell-1"><?php if($req->getRequesterDate()):?><?php echo $req->getRequesterDate()?><?php endif;?>
			</td>
			<td class="cell-2"><?php if($req->getApptDate()):?><?php echo $req->getApptDate()?><?php endif;?>
			</td>
			<td class="cell-3"><?php if(isset($req)):?>
			<div class="name-list">
			<dl>
			<?php if ($req->getPassFirstName()) {?>
				<dt>Pass:</dt>
				<dd><?php echo $req->getPassFirstName()?></dd>
				<?php }?>
				<?php if ($req->getFollowUpContactName()) {?>
				<dt>Follow Up Contact:</dt>
				<dd><?php echo $req->getFollowUpContactName()?></dd>
				<?php }?>
				<?php if ($req->getFollowUpContactPhone()) {?>
				<dt>Phone:</dt>
				<dd><?php echo $req->getFollowUpContactPhone()?></dd>
				<?php }?>
			</dl>
			<a
				href="<?php if($req->getFollowUpEmail()):?><?php echo $req->getFollowUpEmail()?><?php endif;?>"><?php if($req->getFollowUpEmail()):?><?php echo $req->getFollowUpEmail()?><?php endif;?></a>
			</div>
			<?php endif;?></td>
			<td class="cell-4">
			<dl class="route-list">
				<dt>Origin:</dt>
				<dd><?php if($req->getOrginIdent()):?> <?php echo '( '.$req->getOrginIdent().' )'?>
				<?php else:?> -- <?php endif?></dd>
				<dt>Dest:</dt>
				<dd><?php if($req->getDestIdent()):?> <?php echo '( '.$req->getDestIdent().' )'?>
				<?php else:?> -- <?php endif?></dd>
			</dl>
			</td>
			<td>
			<ul class="action-list">
				<li><?php if ($sf_user->hasCredential(array('Administrator'), false)) :?> <?php echo link_to('remove', '@um_request_delete?id='.$req->getId(), array('method' => 'delete', 'confirm' => 'Are you sure to remove?', 'class' => 'action-remove'));?>
				<?php endif;?></li>
				<li><?php if ($sf_user->hasCredential(array('Administrator','Staff','Coordinator'), false)):?> <a
					class="link-edit"
					href="<?php echo url_for('@um_request_edit?id='.$req->getId())?>">edit</a>
					<?php endif;?></li>
				<li><?php if ($sf_user->hasCredential(array('Administrator','Staff','Pilot','Coordinator','Volunteer'), false)){
					echo link_to('view', '@um_request_view?id='.$req->getId(), array('class' => 'link-view'));
				}?></li>
			</ul>
			<ul class="event-list">
				<li><a href="#">Reject</a></li>
				<li><a href="#" class="event-reject">REFER</a></li>
				<li><?php if ($sf_user->hasCredential(array('Administrator','Staff','Coordinator'), false)):?> <a
					href="<?php echo url_for('@miss_req_edit?id='.$req->getId()) ?>"
					class="event-process">PROCESS</a> <?php endif;?></li>
			</ul>
			</td>
		</tr>
		<?php endforeach;?>
	</tbody>
</table>
</div>
