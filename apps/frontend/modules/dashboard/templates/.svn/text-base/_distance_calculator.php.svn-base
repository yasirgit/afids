<?php $sf_response->addJavascript('/js/jquery-ui.custom.min.js')?>
<?php $sf_response->addStylesheet('/css/jquery-ui.custom.css')?>

<form action="#" onsubmit="calculateDistance(this);return false;">
  <fieldset>
    <div class="search">
      <div class="search-input"><input type="text" name="origin" title="origin" /></div>
      <div class="search-input"><input type="text" name="destination" title="destination" /></div>

      <a href="#" onclick="jQuery('#distance_calculator_submit').click();return false;" class="btn-go">GO</a>
      city, state, zip<br/>
      OR identifier

      <input type="submit" class="hide" value="submit" id="distance_calculator_submit"/>
    </div>
  </fieldset>
</form>

<div id="distance_result" title="Distance Calculation" style="display:none;"></div>

<script type="text/javascript">
    jQuery().ready(function(){
        jQuery('#distance_result').dialog({
              autoOpen: false,
              width: 350,
              buttons: {
                  "Cancel": function() {
                    jQuery(this).dialog("close");
                  }
                },
               title: "Distance Calculation",
               hide: "slide",
               modal: true,
               show: 'slide'
            });
    });
  function calculateDistance(form)
  {
    jQuery.ajax({
         url: '<?php echo url_for('dashboard/calculateDistance')?>',
         data: jQuery(form).serialize(),
         dataType: 'html',
         success: function (html) {
           jQuery('#distance_result').html(html).dialog('open');
         }
         
    });
  }

  jQuery(function() {
    jQuery('#distance_result').dialog({ autoOpen: false });
  });
</script>