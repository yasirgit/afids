<?php include_stylesheets_for_form($form) ?>
<?php include_javascripts_for_form($form) ?>

<form action="<?php echo url_for('eventReservation/'.($form->getObject()->isNew() ? 'create' : 'update').(!$form->getObject()->isNew() ? '?id='.$form->getObject()->getId() : '')) ?>" method="post" <?php $form->isMultipart() and print 'enctype="multipart/form-data" ' ?>>
<?php if (!$form->getObject()->isNew()): ?>
<input type="hidden" name="sf_method" value="put" />
<?php endif; ?>
  <table>
    <tfoot>
      <tr>
        <td colspan="2">
          <?php echo $form->renderHiddenFields() ?>
          &nbsp;<a href="<?php echo url_for('eventReservation/index') ?>">Cancel</a>
          <?php if (!$form->getObject()->isNew()): ?>
            &nbsp;<?php echo link_to('Delete', 'eventReservation/delete?id='.$form->getObject()->getId(), array('method' => 'delete', 'confirm' => 'Are you sure?')) ?>
          <?php endif; ?>
          <input type="submit" value="Save" />
        </td>
      </tr>
    </tfoot>
    <tbody>
      <?php echo $form->renderGlobalErrors() ?>
      <tr>
        <th><?php echo $form['event_id']->renderLabel() ?></th>
        <td>
          <?php echo $form['event_id']->renderError() ?>
          <?php echo $form['event_id'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['member_id']->renderLabel() ?></th>
        <td>
          <?php echo $form['member_id']->renderError() ?>
          <?php echo $form['member_id'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['reservation_date']->renderLabel() ?></th>
        <td>
          <?php echo $form['reservation_date']->renderError() ?>
          <?php echo $form['reservation_date'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['first_name']->renderLabel() ?></th>
        <td>
          <?php echo $form['first_name']->renderError() ?>
          <?php echo $form['first_name'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['last_name']->renderLabel() ?></th>
        <td>
          <?php echo $form['last_name']->renderError() ?>
          <?php echo $form['last_name'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['address']->renderLabel() ?></th>
        <td>
          <?php echo $form['address']->renderError() ?>
          <?php echo $form['address'] ?>
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
        <th><?php echo $form['phone']->renderLabel() ?></th>
        <td>
          <?php echo $form['phone']->renderError() ?>
          <?php echo $form['phone'] ?>
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
        <th><?php echo $form['adult_guests']->renderLabel() ?></th>
        <td>
          <?php echo $form['adult_guests']->renderError() ?>
          <?php echo $form['adult_guests'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['child_guests']->renderLabel() ?></th>
        <td>
          <?php echo $form['child_guests']->renderError() ?>
          <?php echo $form['child_guests'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['guest_names']->renderLabel() ?></th>
        <td>
          <?php echo $form['guest_names']->renderError() ?>
          <?php echo $form['guest_names'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['amt_paid']->renderLabel() ?></th>
        <td>
          <?php echo $form['amt_paid']->renderError() ?>
          <?php echo $form['amt_paid'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['method_of_payment']->renderLabel() ?></th>
        <td>
          <?php echo $form['method_of_payment']->renderError() ?>
          <?php echo $form['method_of_payment'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['payment_date']->renderLabel() ?></th>
        <td>
          <?php echo $form['payment_date']->renderError() ?>
          <?php echo $form['payment_date'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['auth_number']->renderLabel() ?></th>
        <td>
          <?php echo $form['auth_number']->renderError() ?>
          <?php echo $form['auth_number'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['status']->renderLabel() ?></th>
        <td>
          <?php echo $form['status']->renderError() ?>
          <?php echo $form['status'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['comments']->renderLabel() ?></th>
        <td>
          <?php echo $form['comments']->renderError() ?>
          <?php echo $form['comments'] ?>
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
        <th><?php echo $form['novapointe_trans_id']->renderLabel() ?></th>
        <td>
          <?php echo $form['novapointe_trans_id']->renderError() ?>
          <?php echo $form['novapointe_trans_id'] ?>
        </td>
      </tr>
    </tbody>
  </table>
</form>
