<?php include_stylesheets_for_form($form) ?>
<?php include_javascripts_for_form($form) ?>
<?php 
   if($form->getObject()->getId() != ''){
        $c = new Criteria();
        $c->add(EventWingsPeer::EVENT_ID, $form->getObject()->getId());
        $ch = EventWingsPeer::doSelect($c);
    }
?>
<form action="<?php echo url_for('event/'.($form->getObject()->isNew() ? 'create' : 'update').(!$form->getObject()->isNew() ? '?id='.$form->getObject()->getId() : '')) ?>" method="post" <?php $form->isMultipart() and print 'enctype="multipart/form-data" ' ?>>
<?php if (!$form->getObject()->isNew()): ?>
<input type="hidden" name="sf_method" value="put" />
<?php endif; ?>
  <table>
    <tfoot>
      <tr>
        <td colspan="2">
          <?php echo $form->renderHiddenFields() ?>           
          &nbsp;<a href="<?php echo url_for('event/index') ?>">Cancel</a>
          <input type="submit" value="Save" />
        </td>
      </tr>
    </tfoot>
    <tbody>
      <?php echo $form->renderGlobalErrors() ?>
      <tr>
        <th><?php echo $form['event_name']->renderLabel() ?></th>
        <td>          
          <?php echo $form['event_name'] ?>
           <?php echo $form['event_name']->renderError() ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['event_date']->renderLabel() ?></th>
        <td>
          <?php echo $form['event_date']->renderError() ?>
          <?php echo $form['event_date'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['event_time']->renderLabel() ?></th>
        <td>
          <?php echo $form['event_time']->renderError() ?>
          <?php echo $form['event_time'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['location']->renderLabel() ?></th>
        <td>
          <?php echo $form['location']->renderError() ?>
          <?php echo $form['location'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['short_desc']->renderLabel() ?></th>
        <td>
          <?php echo $form['short_desc']->renderError() ?>
          <?php echo $form['short_desc'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['long_desc']->renderLabel() ?></th>
        <td>
          <?php echo $form['long_desc']->renderError() ?>
          <?php echo $form['long_desc'] ?>
        </td>
      </tr>
      <tr>         
        <th><?php echo "Participating Wings";//echo $form['wing_id']?></th>
        <td>
          <ul class="checkbox_list">
              <?php 
                $wing = new Criteria();
                $wings = WingPeer::doSelect($wing);
                foreach($wings as $wing_list):
              ?>
              <li>
                  <input type="checkbox" <?php if($form->getObject()->getId() != ''){ foreach($ch as $ch_list){ if($ch_list->getWingId() == $wing_list->getId()){ echo 'checked="checked"';} } }?> id="event_wing_id_<?php echo $wing_list->getId();?>" value="<?php echo $wing_list->getId();?>" name="event[wing_id][]">&nbsp;
                  <label for="event_wing_id_<?php echo $wing_list->getId();?>"><?php echo $wing_list->getName();?></label>
              </li>
              <?php endforeach;?>
          </ul>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['contact_info']->renderLabel() ?></th>
        <td>
          <?php echo $form['contact_info']->renderError() ?>
          <?php echo $form['contact_info'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['email_sent_date']->renderLabel() ?></th>
        <td>
          <?php echo $form['email_sent_date']->renderError() ?>
          <?php echo $form['email_sent_date'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['online_reservation']->renderLabel() ?></th>
        <td>
          <?php echo $form['online_reservation']->renderError() ?>
          <?php echo $form['online_reservation'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['adult_cost']->renderLabel() ?></th>
        <td>
          <?php echo $form['adult_cost']->renderError() ?>
          <?php echo $form['adult_cost'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['child_cost']->renderLabel() ?></th>
        <td>
          <?php echo $form['child_cost']->renderError() ?>
          <?php echo $form['child_cost'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['adult_door_cost']->renderLabel() ?></th>
        <td>
          <?php echo $form['adult_door_cost']->renderError() ?>
          <?php echo $form['adult_door_cost'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['child_door_cost']->renderLabel() ?></th>
        <td>
          <?php echo $form['child_door_cost']->renderError() ?>
          <?php echo $form['child_door_cost'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['signup_deadline']->renderLabel() ?></th>
        <td>
          <?php echo $form['signup_deadline']->renderError() ?>
          <?php echo $form['signup_deadline'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['onsite_signup_ok']->renderLabel() ?></th>
        <td>
          <?php echo $form['onsite_signup_ok']->renderError() ?>
          <?php echo $form['onsite_signup_ok'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['max_persons']->renderLabel() ?></th>
        <td>
          <?php echo $form['max_persons']->renderError() ?>
          <?php echo $form['max_persons'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['collect_secure_info']->renderLabel() ?></th>
        <td>
          <?php echo $form['collect_secure_info']->renderError() ?>
          <?php echo $form['collect_secure_info'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['addl_info_fields']->renderLabel() ?></th>
        <td>
          <?php echo $form['addl_info_fields']->renderError() ?>
          <?php echo $form['addl_info_fields'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['addl_info_fields_help']->renderLabel() ?></th>
        <td>
          <?php echo $form['addl_info_fields_help']->renderError() ?>
          <?php echo $form['addl_info_fields_help'] ?>
        </td>
      </tr>
    </tbody>
  </table>
</form>

<script type="text/javascript">
//<![CDATA[
jQuery(document).ready(function() {
  jQuery(function() {
    jQuery("#event_event_date").datepicker({ dateFormat: 'yy/mm/dd', changeYear: true, changeMonth: true });
    jQuery("#event_email_sent_date").datepicker({ dateFormat: 'yy/mm/dd', changeYear: true, changeMonth: true });
    jQuery("#event_signup_deadline").datepicker({ dateFormat: 'yy/mm/dd', changeYear: true, changeMonth: true });
   5});
});
// ]]>
</script>