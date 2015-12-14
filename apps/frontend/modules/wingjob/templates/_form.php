<?php include_stylesheets_for_form($form) ?>
<?php include_javascripts_for_form($form) ?>
<?php use_helper("Form")?>
<div class="preferences" style="width:325px;">
  <div class="frame">
    <div class="bg">
      <div class="holder">
        <h4>Person Record
        <?php if ($sf_user->hasCredential(array('Administrator','Staff','Pilot','Coordinator','Volunteer'), false)) {?>
          <a class="action-view" href="<?php echo url_for('@person_view?id='.$person->getId())?>">View</a>
        <?php }?>
        </h4>
        <?php echo ($person->getTitle()?$person->getTitle().'. ':'').$person->getName()?><br/>
        <?php echo ($person->getCity()?$person->getCity().', ':'').$person->getState()?><br/>
        <?php echo $person->getCountry()?>
      </div>
    </div>
  </div>
</div>
<form action="<?php echo url_for('wingjob/'.($form->getObject()->isNew() ? 'create' : 'update').(!$form->getObject()->isNew() ? '?id='.$form->getObject()->getId() : '')) ?>" method="post" <?php $form->isMultipart() and print 'enctype="multipart/form-data" ' ?>>

<?php if (!$form->getObject()->isNew()): ?>
<input type="hidden" name="sf_method" value="put" />

<?php endif; ?>
  <table>
    <tfoot>
      <tr>
        <td colspan="2">
          <?php echo $form->renderHiddenFields() ?>
          &nbsp;<a href="<?php echo url_for('person/view?id='.$person->getId()) ?>">Cancel</a>
          <?php echo input_hidden_tag("person_id", $person->getId())?>
          <input type="submit" value="Save" />

        </td>
      </tr>
    </tfoot>
    <tbody>
      <tr>
        <th><?php echo $form['name']->renderLabel() ?></th>
        <td>
          <?php echo $form['name'] ?>
          <?php echo $form['name']->renderError() ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['short_name']->renderLabel() ?></th>
        <td>
          <?php echo $form['short_name'] ?>
          <?php echo $form['short_name']->renderError() ?>
        </td>
      </tr>
    </tbody>
  </table>
</form>