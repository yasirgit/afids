<div class="add-mission">
  <div class="add-mission-entry">
    <h2>Add Mission</h2>
  </div>
  <div class="itinerary">
    <fieldset>
      <div class="holder">
        <h3>New Itinerary</h3>
        <?php if ($sf_user->hasCredential(array('Administrator','Staff','Coordinator'), false)){ ?>
          <a href="<?php echo url_for('itinerary/create')?>" class="btn-action">
            <span>Click to create a new itinerary</span>
            <strong></strong>
          </a>
        <?php } ?>
      </div>
      <div class="holder">
        <h3>Existing Itinerary</h3>
        <div class="itinerary-info">
          <form action="<?php echo url_for('itinerary/index')?>" method="post">
            <input type="hidden" name="filter" value="1"/>
            <div class="wrap">
              <label for="form-item-1">Itinerary ID:</label>
              <input id="form-item-1" class="text" type="text" name="id"/>
            </div>
            <div class="wrap">
              <label for="form-item-2">Passenger Name:</label>
              <input id="form-item-2" class="text" type="text" name="pass_name"/>
            </div>
            <a href="#" onclick="$('#form_submit').click();return false;" class="btn-action">
              <span>Find</span>
              <strong></strong>
            </a>
            <input class="hide" type="submit" value="submit" id="form_submit"/>
          </form>
        </div>
      </div>
    </fieldset>
  </div>
</div>