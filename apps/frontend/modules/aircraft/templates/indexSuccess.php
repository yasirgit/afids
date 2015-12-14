<?php use_helper('Form');?>

<div class="person-view">
<h2>Aircraft List</h2>
<?php if ($sf_user->hasCredential(array('Administrator'), false)) { ?>
<a href="<?php echo url_for('aircraft/update') ?>">Add Aircraft</a>
<?php }?>
<div class="missions-available">
<form id="filter_form" method="post"
	action="<?php echo url_for('@default_index?module=aircraft')?>"><input
	type="hidden" name="filter" value="1" />
<fieldset>
<div class="missions-available-filter">
<div class="bg">
<div class="characteristic_clean">
<div class="holder">
<div><label for="ff_make">Make</label> <input type="text" class="text"
	value="<?php echo $make?>" id="ff_make" name="make" /> <br clear="left" />
<label for="ff_model">Model</label> <input type="text" class="text"
	value="<?php echo $model?>" id="ff_model" name="model" /></div>
<div><label for="ff_name">Name</label> <input type="text" class="text"
	value="<?php echo $name?>" id="ff_name" name="name" /></div>
</div>
</div>
<input type="submit" value="Find" /> <?php echo link_to('reset', '@default_index?module=aircraft&filter=1')?>
</div>
<input type="submit" class="hide" value="submit" /></div>

</div>
</form>
</div>

<?php if ( isset($pager) && $pager->getNbResults()) {?>
<div class="pager">Aircraft per page: <?php foreach ($max_array as $i => $v) {
	if ($i) echo ' | ';
	echo link_to_if($max != $v, $v, '@default_index?module=aircraft&max='.$v);
}?>
<div>
<form action="<?php echo url_for('@default_index?module=aircraft')?>"><?php echo link_to('Previous', '@default_index?module=aircraft&page='.$pager->getPreviousPage(), array('class' => 'btn-pager-prev'))?>
<input type="text" name="page" class="active-page"
	value="<?php echo $pager->getPage()?>" /> <strong>of <?php echo link_to($pager->getLastPage(), '@default_index?module=aircraft&page='.$pager->getLastPage())?></strong>
<?php echo link_to('Next', '@default_index?module=aircraft&page='.$pager->getNextPage(), array('class' => 'btn-pager-next'))?>
<input type="submit" class="hide" /></form>
</div>
</div>
<br />


<table class="mission-request-table">
	<thead>
		<tr>
			<td>Make</td>
			<td>Model</td>
			<td>Name</td>
			<td>Details</td>
			<td>Cost</td>
			<td>Range</td>
			<td>Ac Load</td>
			<!--<td>Action</td>-->
		</tr>
	</thead>
	<tbody>
	<?php foreach ($aircrafts as $aircraft): ?>
		<tr>
			<td class="cell-1"><?php if($aircraft->getMake()):?><?php echo $aircraft->getMake()?><?php endif;?>
			</td>
			<td class="cell-1"><?php if($aircraft->getModel()):?><?php echo $aircraft->getModel()?><?php endif;?>
			</td>
			<td class="cell-1">
			
				<?php if($aircraft->getName()):?>										
					<span><?php echo $aircraft->getName()?></span><br />
					<span><?php echo link_to('Pilots that fly this aircraft', '@default_index?module=aircraft&name='.$aircraft->getName().'&search=pilots')?></span>
				<?php endif;?>
			
			</td>
			<td>
			<div class="name-list">
			<dl>
			<?php if ($aircraft->getFaa()) {?>
				<dt>Faa:</dt>
				<dd><?php echo $aircraft->getFaa()?></dd>
				<?php }?>
				<?php if ($aircraft->getEngines()) {?>
				<dt>Engines:</dt>
				<dd><?php echo $aircraft->getEngines()?></dd>
				<?php }?>
				<?php if ($aircraft->getDefSeats()) {?>
				<dt>Def Seats:</dt>
				<dd><?php echo $aircraft->getDefSeats()?></dd>
				<?php }?>
				<?php if ($aircraft->getSpeed()) {?>
				<dt>Speed:</dt>
				<dd><?php echo $aircraft->getSpeed()?></dd>
				<?php }?>
				<?php if ($aircraft->getPressurized()) {?>
				<dt>Pressurized:</dt>
				<dd><?php echo $aircraft->getPressurized()?></dd>
				<?php }?>
				<dt></dt>
			</dl>
			</div>
			</td>

			<td class="cell-1"><?php if($aircraft->getCost()):?><?php echo $aircraft->getCost()?><?php endif;?>
			</td>
			<td class="cell-1"><?php if($aircraft->getRange()):?><?php echo $aircraft->getRange()?><?php endif;?>
			</td>
			<td class="cell-1"><?php if($aircraft->getAcLoad()):?><?php echo $aircraft->getAcLoad()?><?php endif;?>
			</td>
			<!--<td class="cell-1">        
    </td>-->
		</tr>
		<?php endforeach;?>
	</tbody>
</table>

<div class="pager">Aircraft per page: <?php foreach ($max_array as $i => $v) {
	if ($i) echo ' | ';
	echo link_to_if($max != $v, $v, '@default_index?module=aircraft&max='.$v);
}?>
<div>
<form action="<?php echo url_for('@default_index?module=aircraft')?>"><?php echo link_to('Previous', '@default_index?module=aircraft&page='.$pager->getPreviousPage(), array('class' => 'btn-pager-prev'))?>
<input type="text" name="page" class="active-page"
	value="<?php echo $pager->getPage()?>" /> <strong>of <?php echo link_to($pager->getLastPage(), '@default_index?module=aircraft&page='.$pager->getLastPage())?></strong>
<?php echo link_to('Next', '@default_index?module=aircraft&page='.$pager->getNextPage(), array('class' => 'btn-pager-next'))?>
<input type="submit" class="hide" /></form>
</div>
</div>
<?php }?>
