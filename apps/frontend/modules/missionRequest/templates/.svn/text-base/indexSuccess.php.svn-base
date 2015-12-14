<?php use_helper('jQuery'); ?>
<?php use_helper('Form');
$date_widget = $sf_data->getRaw('date_widget');
use_javascripts_for_form($date_widget);
use_stylesheets_for_form($date_widget);
?>
<div class="mission-requests-content">
<h2>Mission Requests</h2>
<div class="filtering">
<form action="<?php echo url_for('@default_index?module=missionRequest')?>"
	method="post" id="form_filter"><input type="hidden" name="filter"
	value="1" />
<fieldset>
<div class="holder"><label for="form-item-1">Request Date Range</label>
<?php echo $date_widget->render('request_date1', $request_date1);?> <strong
	class="to">to</strong> <?php echo $date_widget->render('request_date2', $request_date2);?>
</div>
<div class="holder"><label for="form-item-2">Mission Date Range</label>
<?php echo $date_widget->render('mission_date1', $mission_date1);?> <strong
	class="to">to</strong> <?php echo $date_widget->render('mission_date2', $mission_date2);?>
</div>
<div class="holder"><label>Show:</label>
<ul class="display-choice">
	<li><input type="checkbox" id="form-item-3" value="1"
	<?php if ($standart) echo 'checked="checked"'?> name="standart" /> <label
		for="form-item-3">Standard</label></li>
	<li><input type="checkbox" id="form-item-4" value="1"
	<?php if ($referrals) echo 'checked="checked"'?> name="referrals" /> <label
		for="form-item-4">Referrals</label></li>
</ul>
</div>
<input type="submit" value="Find" /> <?php echo link_to('reset', '@default_index?module=missionRequest')?>
<input class="hide" type="submit" value="submit" /></fieldset>
</form>
</div>
</div>

	<?php if ($pager->getNbResults()) {?>
<div class="pager">Mission Request per page: <?php foreach ($max_array as $i => $v) {
	if ($i) echo ' | ';
	echo link_to_if($max != $v, $v, '@default_index?module=missionRequest&max='.$v);
}?>
<div>
<form
	action="<?php echo url_for('@default_index?module=missionRequest')?>">
<?php echo link_to('Previous', '@default_index?module=missionRequest&page='.$pager->getPreviousPage(), array('class' => 'btn-pager-prev'))?>
<input type="text" name="page" class="active-page"
	value="<?php echo $pager->getPage()?>" /> <strong>of <?php echo link_to($pager->getLastPage(), '@default_index?module=missionRequest&page='.$pager->getLastPage())?></strong>
<?php echo link_to('Next', '@default_index?module=missionRequest&page='.$pager->getNextPage(), array('class' => 'btn-pager-next'))?>
<input type="submit" class="hide" /></form>
</div>
</div>
<br />

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
			<td class="cell-1"><?php if($req->getRequesterDate()):?><?php echo $req->getRequesterDate('m/d/Y')?><?php endif;?>
			</td>
			<td class="cell-2"><?php if($req->getApptDate()):?><?php echo $req->getApptDate('m/d/Y')?><?php endif;?>
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
				<dd><?php echo $req->getOrginCity().','.$req->getOrginState()?> <!--
              <?php if($req->getOrginIdent()):?>
                  <?php echo '( '.$req->getOrginIdent().' )'?>
              <?php else:?>
              
              <?php endif?>--></dd>
				<dt>Dest:</dt>
				<dd><?php echo $req->getDestCity().','.$req->getDestState()?> <!--<?php if($req->getDestIdent()):?>
                  <?php echo '( '.$req->getDestIdent().' )'?>
              <?php else:?>
              <?php endif?>--></dd>
			</dl>
			</td>
			<td>
			<ul class="action-list">
				<li><?php if ($sf_user->hasCredential(array('Administrator'), false)):?> <?php echo link_to('remove', '@um_request_delete?id='.$req->getId(), array('method' => 'delete', 'confirm' => 'Are you sure to remove?', 'class' => 'action-remove'));?>
				<?php endif;?></li>
				<li><?php if ($sf_user->hasCredential(array('Administrator','Staff','Coordinator'), false)):?> <a
					class="link-edit"
					href="<?php echo url_for('@um_request_edit?id='.$req->getId())?>">edit</a>
					<?php endif;?></li>
				<li><?php if ($sf_user->hasCredential(array('Administrator','Staff','Pilot','Coordinator','Volunteer'), false)) {
					echo link_to('view', '@um_request_view?id='.$req->getId(), array('class' => 'link-view'));
				}?></li>
			</ul>
			<ul class="event-list">
                        <?php //if($req->getMissionDate() == null): ?>
				<li><a href="#"
					onclick="popupReject('<?php echo url_for('missionRequest/reject?id='.$req->getId()) ?>');">Reject</a></li>
					<?php //endif;?>
				<li><a href="#" class="event-reject"
					onclick="popupReject('<?php echo url_for('missionRequest/refer?id='.$req->getId()) ?>');">REFER</a></li>
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
		<?php if ($pager->getNbResults()) {?>
<div class="pager">Mission Request per page: <?php foreach ($max_array as $i => $v) {
	if ($i) echo ' | ';
	echo link_to_if($max != $v, $v, '@default_index?module=missionRequest&max='.$v);
}?>
<div>
<form
	action="<?php echo url_for('@default_index?module=missionRequest')?>">
<?php echo link_to('Previous', '@default_index?module=missionRequest&page='.$pager->getPreviousPage(), array('class' => 'btn-pager-prev'))?>
<input type="text" name="page" class="active-page"
	value="<?php echo $pager->getPage()?>" /> <strong>of <?php echo link_to($pager->getLastPage(), '@default_index?module=missionRequest&page='.$pager->getLastPage())?></strong>
<?php echo link_to('Next', '@default_index?module=missionRequest&page='.$pager->getNextPage(), array('class' => 'btn-pager-next'))?>
<input type="submit" class="hide" /></form>
</div>
</div>
<br />
<?php }?>
<?php }?>

<script type="text/javascript">
//<![CDATA[
$(document).ready(function() {
  $(function() {
    $("#ff_request_date1").datepicker();
  });
});
/*
function filterForm()
{
  $('#body_part').css('opacity', 0.6);
  jQuery.ajax({
    url : '/missionRequest/filter',
    type: 'POST',
    data: $("#form_filter").serialize(),
    success: function(data){
      $('#body_part').css('opacity', 1).html(data);
    }
  });
}
function timeout_init() {
  timeout = setTimeout('filterForm()', 3000);
}

$('#form_filter input:checkbox').bind('click', function(){
  filterForm();
});

$('#form_filter input:text').bind('click', function(){
  filterForm();
  timeout_init()
});
*/
function popupReject(url) {
 win = window.open(url,"Logo","menubar=no,toolbar=no,titlebar=no,location=no,resizable=no,width=500,height=450,screenX=200,screenY=200");
 win.focus()
} 

//  ]]>
</script>
