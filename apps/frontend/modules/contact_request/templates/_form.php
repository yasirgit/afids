<?php include_stylesheets_for_form($form) ?>
<?php include_javascripts_for_form($form) ?>
<?php $sf_response->addJavascript('/js/jquery.validate.js') ?>

<form action="<?php echo url_for('contact_request/create')?>" method="post" id="contact_request_form">
<?php if (!$form->getObject()->isNew()): ?>
<input type="hidden" name="sf_method" value="put" />
<?php endif; ?>
<table id="contact_request_table">
    <tfoot>
      <tr>
        <td colspan="2">
          <?php echo $form->renderHiddenFields() ?>
          <input type="submit" value="Save" />
        </td>
      </tr>
    </tfoot>
    <tbody>
      <?php echo $form->renderGlobalErrors() ?>
      <tr>
          <th><?php echo $form['title']->renderLabel() ?><font color="red">*</font></th>
        <td>
          <?php echo $form['title']->renderError() ?>
          <select id="contact_request_title" name="contact_request[title]">
            <option value="">--Select Title--</option>
            <option value="Ms.">Ms.</option>
            <option value="Mrs.">Mrs.</option>
            <option value="Mr.">Mr.</option>
            <option value="Dr.">Dr.</option>
          </select>
        </td>
      </tr> 
      <tr>
        <th><?php echo $form['first_name']->renderLabel() ?><font color="red">*</font></th>
        <td>
          <?php echo $form['first_name']->renderError() ?>
          <?php echo $form['first_name'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['last_name']->renderLabel() ?><font color="red">*</font></th>
        <td>
          <?php echo $form['last_name']->renderError() ?>
          <?php echo $form['last_name'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['address1']->renderLabel() ?></th>
        <td>
          <?php echo $form['address1']->renderError() ?>
          <?php echo $form['address1'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['address2']->renderLabel() ?></th>
        <td>
          <?php echo $form['address2']->renderError() ?>
          <?php echo $form['address2'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['city']->renderLabel() ?></th>
        <td>
          <?php echo $form['city']->renderError() ?>
          <?php echo $form['city'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['state']->renderLabel() ?></th>
        <td>
          <?php echo $form['state']->renderError() ?>
          <?php echo $form['state'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['zipcode']->renderLabel() ?></th>
        <td>
          <?php echo $form['zipcode']->renderError() ?>
          <?php echo $form['zipcode'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['country']->renderLabel() ?></th>
        <td>
          <?php echo $form['country']->renderError() ?>
          <?php echo $form['country'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['day_phone']->renderLabel() ?></th>
        <td>
          <?php echo $form['day_phone']->renderError() ?>
          <?php echo $form['day_phone'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['eve_phone']->renderLabel() ?></th>
        <td>
          <?php echo $form['eve_phone']->renderError() ?>
          <?php echo $form['eve_phone'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['fax_phone']->renderLabel() ?></th>
        <td>
          <?php echo $form['fax_phone']->renderError() ?>
          <?php echo $form['fax_phone'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['mobile_phone']->renderLabel() ?></th>
        <td>
          <?php echo $form['mobile_phone']->renderError() ?>
          <?php echo $form['mobile_phone'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['email']->renderLabel() ?></th>
        <td>
          <?php echo $form['email']->renderError() ?>
          <?php echo $form['email'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo 'Referral Source:'; ?></th>
        <td>
          <?php echo $form['ref_source_id']->renderError() ?>
          <?php //echo $form['ref_source_id'] ?>
          <select id="contact_request_ref_source_id" name="contact_request[ref_source_id]">
              <option value="0">--Please Select--</option>
              <?php
                $ref = new Criteria();
                $refs = RefSourcePeer::doSelect($ref);
                foreach($refs as $ref_list):
              ?>
              <option value="<?php echo $ref_list->getId();?>"><?php echo $ref_list->getSourceName();?></option>
          <?php endforeach;?>
          </select>
        </td>
      </tr>
      <tr>
        <th><?php echo 'Send Info by:'; ?></th>
        <td>
        <?php echo $form['send_app_format']->renderError() ?>
        <select id="contact_request_send_app_format" name="contact_request[send_app_format]">
            <option selected="" value="">--Please Select--</option>
            <option value="mail">By Mail</option>
            <option value="email">Email</option>
            <option value="fax">Fax</option>
        </select>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['comment']->renderLabel() ?></th>
        <td>
          <?php echo $form['comment']->renderError() ?>
          <textarea id="contact_request_comment" name="contact_request[comment]"></textarea>
        </td>
      </tr>
    </tbody>
  </table>
</form>
<script type="text/javascript">
jQuery(document).ready(function() {
     jQuery("#contact_request_title, #contact_request_first_name, #contact_request_last_name").addClass("required");
     jQuery("#contact_request_email").addClass("email"); 
});
jQuery(document).ready(function(){
   jQuery("#contact_request_form").validate();
});
</script>