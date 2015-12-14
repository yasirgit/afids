<div class="step" style="display: block;">
<div class="passenger-form">Please tell us about the aircraft you would
most likely fly on Angel Flight West missions. Please note that our
aircraft database is organized to group aircraft mainly by their general
type and capability. Pleas try to find the closest match for your
airplane in our database. If you cannot find a suitable match, please
leave the aircraft selection blank, and we will fill this data in at the
time of your orientation. If you are a renter, let us know what types of
aircraft you typically fly.<br />
<br />
It is important that we have the tail number of your aircraft so that we
can identify you to our passengers. If you are a renter or otherwise
don't know the tail number in advance, leave that field blank.
<form
	action="<?php echo url_for('pending_member/step3Check?id='.$form->getObject()->getId()) ?>"
	method="post"
	<?php $form->isMultipart() and print 'enctype="multipart/form-data" ' ?>>
	<?php echo $form->renderHiddenFields() ?>
<div class="box full">
<table>
	<tr>
		<th>Make/Model</th>
		<th>Own/Rent</th>
		<th># Seats</th>
		<th>Icing?</th>
		<th>Tail Number</th>
	</tr>
	<tr>
		<td><?php echo $form['aircraft_primary_id']?> <?php echo $form['aircraft_primary_id']->renderError()?>
		</td>
		<td><?php echo $form['aircraft_primary_own']?> <?php echo $form['aircraft_primary_own']->renderError()?>
		</td>
		<td><?php echo $form['aircraft_primary_seats']?> <?php echo $form['aircraft_primary_seats']->renderError()?>
		</td>
		<td><?php echo $form['aircraft_primary_ice']?> <?php echo $form['aircraft_primary_ice']->renderError()?>
		</td>
		<td><?php echo $form['aircraft_primary_n_number']?> <?php echo $form['aircraft_primary_n_number']->renderError()?>
		</td>
	</tr>
	<tr>
		<td><?php echo $form['aircraft_secondary_id']?> <?php echo $form['aircraft_secondary_id']->renderError()?>
		</td>
		<td><?php echo $form['aircraft_secondary_own']?> <?php echo $form['aircraft_secondary_own']->renderError()?>
		</td>
		<td><?php echo $form['aircraft_secondary_seats']?> <?php echo $form['aircraft_secondary_seats']->renderError()?>
		</td>
		<td><?php echo $form['aircraft_secondary_ice']?> <?php echo $form['aircraft_secondary_ice']->renderError()?>
		</td>
		<td><?php echo $form['aircraft_secondary_n_number']?> <?php echo $form['aircraft_secondary_n_number']->renderError()?>
		</td>
	</tr>
	<tr>
		<td><?php echo $form['aircraft_third_id']?> <?php echo $form['aircraft_third_id']->renderError()?>
		</td>
		<td><?php echo $form['aircraft_third_own']?> <?php echo $form['aircraft_third_own']->renderError()?>
		</td>
		<td><?php echo $form['aircraft_third_seats']?> <?php echo $form['aircraft_third_seats']->renderError()?>
		</td>
		<td><?php echo $form['aircraft_third_ice']?> <?php echo $form['aircraft_third_ice']->renderError()?>
		</td>
		<td><?php echo $form['aircraft_third_n_number']?> <?php echo $form['aircraft_third_n_number']->renderError()?>
		</td>
	</tr>
</table>

Please tell us about your availability to fly missions (check all that
apply):
<div class="wrap"><?php echo $form['availability_weekdays']->renderLabel()?>
<?php echo $form['availability_weekdays']?> <?php echo $form['availability_weekdays']->renderError()?>
</div>
<div class="wrap"><?php echo $form['availability_weeknights']->renderLabel()?>
<?php echo $form['availability_weeknights']?> <?php echo $form['availability_weeknights']->renderError()?>
</div>
<div class="wrap"><?php echo $form['availability_weekends']->renderLabel()?>
<?php echo $form['availability_weekends']?> <?php echo $form['availability_weekends']->renderError()?>
</div>
<div class="wrap"><?php echo $form['availability_notice']->renderLabel()?>
<?php echo $form['availability_notice']?> <?php echo $form['availability_notice']->renderError()?>
</div>
<div class="wrap"><?php echo $form['availability_last_minute']->renderLabel()?>
<?php echo $form['availability_last_minute']?> <?php echo $form['availability_last_minute']->renderError()?>
</div>
<div class="wrap"><?php echo $form['availability_copilot']->renderLabel()?>
<?php echo $form['availability_copilot']?> <?php echo $form['availability_copilot']->renderError()?>
</div>

<div class="form-submit"><a class="btn-action" href="#"
	onclick="$('#step3_submit').click(); return false;"><span>Save and
         Continue »</span><strong> </strong></a> <?php link_to("&laquo; Back", "pending_member/step2/id/".$sf_request->getParameter("id"), array("class" => "cancel"))?>
   <a class="cancel" href="<?php echo "/pending_member/step2/id/".$sf_request->getParameter("id")?>">&laquo; Back</a> <input type="submit"
	id="step3_submit" value="submit" class="hide" /></div>
</div>
</form>
</div>
</div>
