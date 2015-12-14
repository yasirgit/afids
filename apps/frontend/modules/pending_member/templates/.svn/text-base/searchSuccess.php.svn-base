<?php $date_widget = $sf_data->getRaw('date_widget');?>
<h2>Search Member Applications</h2>

<div class="missions-available">
<form id="filter_form" method="post"
	action="<?php echo url_for('pending_member/search')?>"><input
	type="hidden" name="filter" value="1" />
<fieldset>
<div class="missions-available-filter">
<div class="bg">
<div class="characteristic_clean">
<div class="holder">
<div><label for="deceased_until">Date</label> <br clear="left" />
<?php echo $date_widget->render('deceased_until', $deceased_until);?></div>
<div><label for="name">Name</label> <br clear="left" />
<input type="text" class="text" value="<?php echo $name?>" id="name"
	name="name" /></div>
<div><label for="ff_country">Email</label> <br clear="left" />
<input type="text" class="text" value="<?php echo $email?>" id="email"
	name="email" /></div>
<div><br clear="left" />
<br clear="left" />
<input type="submit" value="Find" /> <?php echo link_to('reset', 'pending_member/search?filter=1')?>
</div>
</div>

</div>
<input type="submit" class="hide" value="submit" /></div>
</div>
</fieldset>
</form>
</div>

<?php if ($pager->getNbResults()) {?>
<div class="pager">Application per page: <?php foreach ($max_array as $i => $v) {
	if ($i) echo ' | ';
	echo link_to_if($max != $v, $v, 'pending_member/search?max='.$v);
}?>
<div>
<form action="<?php echo url_for('pending_member/search')?>"><?php echo link_to('Previous', 'pending_member/search?page='.$pager->getPreviousPage(), array('class' => 'btn-pager-prev'))?>
<input type="text" name="page" class="active-page"
	value="<?php echo $pager->getPage()?>" /> <strong>of <?php echo link_to($pager->getLastPage(), 'pending_member/search?page='.$pager->getLastPage())?></strong>
<?php echo link_to('Next', 'pending_member/search?page='.$pager->getNextPage(), array('class' => 'btn-pager-next'))?>
<input type="submit" class="hide" /></form>
</div>
</div>
<a
	href="#addpassenger-popup" id="add_new_passenger" class="open-popup"></a>
<table class="mission-request-table">
	<thead>
		<tr>
			<td>Date</td>
			<td>Name</td>
			<td>Email</td>
			<td>Action</td>
		</tr>
	</thead>
	<tbody>
	<?php foreach ($application_temp_list as $application_temp): ?>
		<tr>
			<td><?php echo $application_temp->getApplicationDate('n/j/Y g:i a') ?></td>
			<td><strong> <?php echo $application_temp->getFirstName() ?> <?php echo $application_temp->getLastName() ?>
			</strong> <br />
			<?php echo $application_temp->getApplicantPilot() ? 'Pilot' : 'Non-pilot'?>
			<br />
			<?php if ($application_temp->getSpousePilot()) echo 'Spouse: Pilot'?>
			</td>
			<td><?php
			if($application_temp->getIsComplete() > 0){
				echo $application_temp->getEmail();
			}else{ ?> <a href="#"
				onclick="jQuery('#add_new_passenger').click();
                        jQuery('input[name=to]').val('<?php echo $application_temp->getEmail()?>');
                        jQuery('input[name=id]').val('<?php echo $application_temp->getId()?>');
                        return false;"> <?php echo $application_temp->getEmail() ?>
			</a> <?php } ?></td>
			<td><?php if ($application_temp->getIsComplete() > 0) {?> <?php echo link_to('Process', 'pending_member/process?id='.$application_temp->getId(), array('class' => 'action-edit'))?>
			<?php }else{?> Incomplete <?php }?> <?php echo link_to('View', 'pending_member/show?id='.$application_temp->getId(), array('class' => 'action-view'))?>
			<?php echo link_to('Remove', 'pending_member/delete?id='.$application_temp->getId(), array('class' => 'action-remove', 'method' => 'delete', 'confirm' => 'Are you sure?'))?>
			</td>
		</tr>
		<?php endforeach; ?>
	</tbody>
</table>

<div class="pager">Application per page: <?php foreach ($max_array as $i => $v) {
	if ($i) echo ' | ';
	echo link_to_if($max != $v, $v, 'pending_member/search?max='.$v);
}?>
<div>
<form action="<?php echo url_for('pending_member/search')?>"><?php echo link_to('Previous', 'pending_member/search?page='.$pager->getPreviousPage(), array('class' => 'btn-pager-prev'))?>
<input type="text" name="page" class="active-page"
	value="<?php echo $pager->getPage()?>" /> <strong>of <?php echo link_to($pager->getLastPage(), 'pending_member/search?page='.$pager->getLastPage())?></strong>
<?php echo link_to('Next', 'pending_member/search?page='.$pager->getNextPage(), array('class' => 'btn-pager-next'))?>
<input type="submit" class="hide" /></form>
</div>
</div>
<?php }?>


<?php slot('popup') ?>
<div class="add-passenger" id="addpassenger-popup"
	style="display: none; z-index: 1001; position: absolute; left: 400px; top: 145px;">
<div class="holder">
<div class="bg">
<div id="passenger_form">
<h3>Email Applicant and Remove from List</h3>
<br>
<form action="<?php echo url_for('renewal/sendMail') ?>" method="post"
	id="mail_form"><input name="id" type="hidden" value="" size="70" />
<table width="100%" cellpadding="5">
	<tr>
		<td width="15%">To:</td>
		<td><input name="to" disabled value="" size="70" /></td>
	</tr>
	<tr>
		<td>Subject:</td>
		<td><input type="text" name="subject" value="Incomplete Application"
			size="70" /></td>
	</tr>
	<tr>
		<td>Note:</td>
		<td><textarea name="body" cols="70" rows="5">
Your application was not completed.We are going to close this application and you will need to start a new one.

Regards,
Angel Flight West</textarea></td>
	</tr>
	<tr>
		<td></td>
		<td>
		<div class="form-submit"><a href="#"
			onclick="jQuery('#mail_form').submit(); return false;"
			class="btn-action"><span>Send</span><strong>&nbsp;</strong></a> <a
			href="<?php echo url_for($referer) ?>" class="cancel">Cancel</a></div>
		</td>
	</tr>
</table>
</form>
</div>
</div>
</div>
</div>
<?php end_slot() ?>