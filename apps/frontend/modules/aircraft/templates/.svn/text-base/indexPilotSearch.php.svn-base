<?php use_helper('Form');?>

<h2>Pilots List</h2><br />
<div><?php echo link_to('Back to Aircraft Find', '@default_index?module=aircraft')?></div>
<?php if (count($pagers)) {?>
<div class="pager">Pilots per page: <?php foreach ($max_array as $i => $v) {
	if ($i) echo ' | ';
	echo link_to_if($max != $v, $v, '@default_index?module=aircraft&name='.$selectedAircraft.'&search=pilots&max='.$v);
}?>
<div>
<form action="<?php echo url_for('@default_index?module=aircraft')?>">
<input type="hidden" name="name" value="<?php echo $selectedAircraft?>" />
<input type="hidden" name="search" value="pilots" />
<input type="hidden" name="max" value="<?php echo $max?>" />
<?php echo link_to('Previous', '@default_index?module=aircraft&max='.$max.'&name='.$selectedAircraft.'&search=pilots&page='.$previousPage, array('class' => 'btn-pager-prev'))?>
<input type="text" name="page" class="active-page"	value="<?php echo $currentPage?>" /> 
	<strong>of <?php echo link_to($last_page, '@default_index?module=aircraft&name='.$selectedAircraft.'&search=pilots&max='.$max.'&page='.$last_page)?></strong>
<?php echo link_to('Next', '@default_index?module=aircraft&max='.$max.'&name='.$selectedAircraft.'&search=pilots&page='.$nextPage, array('class' => 'btn-pager-next'))?>
<input type="submit" class="hide" /></form>
</div>
</div>
<br />


<table class="mission-request-table">
	<thead>
		<tr>
			<td>Air Craft</td>
			<td>Pilot Name ( times )</td>
			<td>Day Phone</td>
			<td>Night Phone</td>
		</tr>
	</thead>
	<tbody>
	<?php foreach ($pagers as $pager): ?>
		<tr>
			<td class="cell-1">
				<?php if($selectedAircraft):?>
					<?php echo $selectedAircraft?>
				<?php endif;?>
			</td>
			<td class="cell-1">
				<?php if(!empty($pager['pilot_name'])):?>
					<?php echo $pager['pilot_name']." ( ".$pager['total_times']." )"?>
				<?php endif;?>
			</td>
			<td class="cell-1">
				<?php if(!empty($pager['day_phone'])):?>
					<?php echo $pager['day_phone']?>
				<?php endif;?>
			</td>
			<td class="cell-1">			
				<?php if(!empty($pager['night_phone'])):?>										
					<?php echo $pager['night_phone']?>					
				<?php endif;?>			
			</td>		
			
		</tr>
		<?php endforeach;?>
	</tbody>
</table>

<div class="pager">Pilots per page: <?php foreach ($max_array as $i => $v) {
	if ($i) echo ' | ';
	echo link_to_if($max != $v, $v, '@default_index?module=aircraft&name='.$selectedAircraft.'&search=pilots&max='.$v);
}?>
<div>
<form action="<?php echo url_for('@default_index?module=aircraft')?>">
<input type="hidden" name="name" value="<?php echo $selectedAircraft?>" />
<input type="hidden" name="search" value="pilots" />
<input type="hidden" name="max" value="<?php echo $max?>" />
<?php echo link_to('Previous', '@default_index?module=aircraft&max='.$max.'&name='.$selectedAircraft.'&search=pilots&page='.$previousPage, array('class' => 'btn-pager-prev'))?>
<input type="text" name="page" class="active-page"	value="<?php echo $currentPage?>" /> 
	<strong>of <?php echo link_to($last_page, '@default_index?module=aircraft&name='.$selectedAircraft.'&search=pilots&max='.$max.'&page='.$last_page)?></strong>
<?php echo link_to('Next', '@default_index?module=aircraft&max='.$max.'&name='.$selectedAircraft.'&search=pilots&page='.$nextPage, array('class' => 'btn-pager-next'))?>
<input type="submit" class="hide" /></form>
</div>
</div>
<br />
<div><?php echo link_to('Back to Aircraft Find', '@default_index?module=aircraft')?></div>
<?php }?>
