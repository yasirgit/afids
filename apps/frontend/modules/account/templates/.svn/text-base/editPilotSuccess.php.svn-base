<?php use_helper('Form')?>

<h2>Edit Pilot Information</h2>

<div class="passenger-form">
  <form method="post" action="<?php echo url_for('account/updatePilot')?>">
    <div class="box">
      <div class="wrap">
        <label for="flight_status">Flight Status</label>
        <?php echo select_tag('flight_status', options_for_select($flight_statuses, $flight_status), array('class' => 'text narrow'))?>
      </div>
      <div class="wrap">
        <label for="co_pilot">Co-Pilot</label>
        <?php echo checkbox_tag('co_pilot', 1, $co_pilot == 1)?>
      </div>
      <div class="wrap">
        <label for="license_type">License Type</label>
        <?php echo select_tag('license_type', options_for_select($license_types, $license_type), array('class' => 'text narrow'))?>
      </div>
      <div class="wrap">
        <label for="wing_id">Wing</label>
        <?php echo select_tag('wing_id', options_for_select($wings, $wing_id), array('class' => 'text narrow'))?>
      </div>
      <div style="color:#C10212; display:none;" id="wing_id_warning">
        Please note that when you change your Wing affiliation, all flights from
        this point forward will be assigned to the wing you select. All
        previously flown flights will still be assigned to the wing you were
        affiliated with when the flight was flown.
      </div>
      <div class="wrap">
        <label for="primary_airport_id">Home Airport</label>
        <input type="hidden" id="primary_airport_id" value="<?php echo $primary_airport_id?>"/>
      </div>
      <div class="wrap">
        <label for="secondary_airport_id">Secondary Home Airport</label>
        <input type="hidden" id="secondary_airport_id" value="<?php echo $secondary_airport_id?>"/>
      </div>
      <div class="form-submit">
        <a href="#" onclick="$('#form_submit').click(); return false;" class="btn-action"><span>Save</span><strong>&nbsp;</strong></a>
        <a href="<?php echo url_for('account/index') ?>" class="cancel">Cancel</a>
        <input type="submit" id="form_submit" class="hide"/>
      </div>
    </div>
  </form>
</div>

<script type="text/javascript">
  function loadAirports()
  {
    var wing_id = $('#wing_id').val();
    $.ajax({
      url: '<?php echo url_for('account/ajaxAirport')?>',
      dataType: 'html',
      data: { wing_id: wing_id },
      success: function (html) {
        var id1 = $('#primary_airport_id').val();
        var id2 = $('#secondary_airport_id').val();
        $('#primary_airport_id').after(html.replace('<select', '<select id="primary_airport_id" name="primary_airport_id"')).remove();
        $('#primary_airport_id').val(id1);
        $('#secondary_airport_id').after(html.replace('<select', '<select id="secondary_airport_id" name="secondary_airport_id"')).remove();
        $('#secondary_airport_id').val(id2);
      }
    });
  }

  $(function () {
    $('#wing_id').change(function () { $('#wing_id_warning').show(); loadAirports(); });
    loadAirports();
  });
</script>