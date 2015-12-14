<?php use_helper('Form', 'Object','Javascript');
$date_widget = $sf_data->getRaw('date_widget');
use_javascripts_for_form($date_widget);
use_stylesheets_for_form($date_widget);
$can_view = $sf_user->hasRights('contact_index');
/* @var $contact Contact */
?>

<h2>Contact Find</h2>
<div class="missions-available">
  <form id="filter_form" method="post" action="<?php echo url_for('@default_index?module=contact')?>">
    <input type="hidden" name="filter" value="1"/>
    <fieldset>
      <div class="missions-available-filter">
        <div class="bg">
          <div class="characteristic_clean">
            <div class="holder">
                <div class="div-contact">
                <br clear="left"/>
                <label for="ff_firstname">First Name</label>
                <!--<input type="text" class="text" value="<?php //echo $firstname?>" id="ff_firstname" name="firstname"/>-->
                <?php echo input_auto_complete_tag('firstname', $firstname == '*' ? '' : $firstname,
                                      'contact/autoCompleteFirst',
                                      array('autocomplete' => 'off', 'class'=>'text narrow','style'=>'200px'),
                                      array(
                                      'use_style'    => true,
                                      'indicator'    =>'person_indicator',
                                      )
                                       ); ?>
                                        <span id="person_indicator" style="display:none"><?php echo image_tag('/images/loading.gif')?></span>

                <br clear="left"/>
                <label for="ff_lastname">Last Name</label>
                <!--<input type="text" class="text" value="<?php //echo $lastname?>" id="ff_lastname" name="lastname"/>-->
                <?php echo input_auto_complete_tag('lastname', $lastname == '*' ? '' : $lastname,
                                      'contact/autoCompleteLast',
                                      array('autocomplete' => 'off', 'class'=>'text narrow','style'=>'200px'),
                                      array(
                                      'use_style'    => true,
                                      'indicator'    =>'person_indicator1',
                                      )
                                       ); ?>
                                        <span id="person_indicator1" style="display:none"><?php echo image_tag('/images/loading.gif')?></span>
                <br clear="left"/>
              </div>
              <div class="div-contact">
                <br clear="left"/>
                <label for="ff_city">City</label>
                <input type="text" class="text" value="<?php echo $city?>" id="ff_city" name="city"/>
                <br clear="left"/>
                <label for="ff_state">State</label>
                <input type="text" class="text" value="<?php echo $state?>" id="ff_state" name="state"/>
              </div>
              <div class="div-contact">
                <br clear="left"/>
                <label for="deceased_until">Date Added</label>
                <?php echo $date_widget->render('added_date1', $added_date1);?>
                <label for="deceased_after">&nbsp;To</label>
                <?php echo $date_widget->render('added_date2', $added_date2);?>
              </div>
              <div class="div-contact">
                <br clear="left"/>
                <label for="ff_city">Ref Source</label>
                <?php echo select_tag('ref_source', objects_for_select($ref_sources, 'getId', 'getSourceName', $ref_source, array('include_custom' => '- any -')), array('class' => 'text'))?>
                <br clear="left"/>
                <label for="ff_country">Contact Type</label>
                <?php echo select_tag('contact_type', objects_for_select($contact_types, 'getId', '__toString', $contact_type, array('include_custom' => '- any -')), array('class' => 'text'))?>
              </div>
              <div class="div-contact">
                <br clear="left"/>
                <br clear="left"/>
                <br clear="left"/>
                <input type="submit" value="Find"/>
                <?php echo link_to('reset', '@default_index?module=contact&filter=1')?>
              </div>
            </div>
          </div>
          <input type="submit" class="hide" value="submit"/>
        </div>
      </div>
    </fieldset>
  </form>
</div>

<?php if ( isset($pager) && $pager->getNbResults()) {?>
<div class="pager">
  Contact per page:
  <?php foreach ($max_array as $i => $v) {
    if ($i) echo ' | ';
    echo link_to_if($max != $v, $v, '@default_index?module=contact&max='.$v);
  }?>
  <div>
    <form action="<?php echo url_for('@default_index?module=contact')?>">
      <?php echo link_to('Previous', '@default_index?module=contact&page='.$pager->getPreviousPage(), array('class' => 'btn-pager-prev'))?>
      <input type="text" name="page" class="active-page" value="<?php echo $pager->getPage()?>"/>
      <strong>of <?php echo link_to($pager->getLastPage(), '@default_index?module=contact&page='.$pager->getLastPage())?></strong>
      <?php echo link_to('Next', '@default_index?module=contact&page='.$pager->getNextPage(), array('class' => 'btn-pager-next'))?>
      <input type="submit" class="hide"/>
    </form>
  </div>
</div>

<table class="mission-request-table">
<thead>
  <tr>
    <td>Name</td>
    <td>Address</td>
    <td>Ref source</td>
    <td>Comment</td>
    <td>Date Added</td>
    <td>Action</td>
  </tr>
</thead>
<tbody>
  <?php
  foreach ($contact_list as $contact):
      $person = $contact->getPerson();
  ?>
  <tr>
    <td class="cell-2">
      <?php echo $person->getName()?>
    </td>
    <td class="cell-5">
      <?php echo $person->getAddress1() ? $person->getAddress1().', ' : ''?>
      <?php echo $person->getCity() ? $person->getCity().', ' : ''?>
      <?php echo $person->getState()?>
    </td>
    <td class="cell-6">
      <?php echo $contact->getRefSource()?>
    </td>
    <td class="cell-5">
      <?php echo $contact->getComment()?>
    </td>
    <td class="cell-2">
      <?php echo $contact->getDateAdded('m/d/Y')?>
    </td>
    <td>
      <ul class="action-list">
        <li><?php if ($sf_user->hasCredential(array('Administrator','Staff','Volunteer'), false)):?><a class="action-view" href="<?php echo url_for('@contact_view?id='.$contact->getId())?>">View</a><?php endif;?></li>
      </ul>
    </td>
  </tr>
  <?php endforeach;?>
</tbody>
</table>

<div class="pager">
  Contact per page:
  <?php foreach ($max_array as $i => $v) {
    if ($i) echo ' | ';
    echo link_to_if($max != $v, $v, '@default_index?module=contact&max='.$v);
  }?>
  <div>
    <form action="<?php echo url_for('@default_index?module=contact')?>">
      <?php echo link_to('Previous', '@default_index?module=contact&page='.$pager->getPreviousPage(), array('class' => 'btn-pager-prev'))?>
      <input type="text" name="page" class="active-page" value="<?php echo $pager->getPage()?>"/>
      <strong>of <?php echo link_to($pager->getLastPage(), '@default_index?module=contact&page='.$pager->getLastPage())?></strong>
      <?php echo link_to('Next', '@default_index?module=contact&page='.$pager->getNextPage(), array('class' => 'btn-pager-next'))?>
      <input type="submit" class="hide"/>
    </form>
  </div>
</div>
<?php }?>


<?php /*
<div class="person-view">
<h2>Contact List</h2>

<table>
  <thead>
    <tr>
      <th>Id</th>
      <th>Person</th>
      <th>Ref source</th>
      <th>Send app format</th>
      <th>Comment</th>
      <th>Letter sent</th>
      <th>Contact type</th>
      <th>Company name</th>
      <th>Action</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($contact_list as $contact): ?>
    <tr>
      <td><a href="<?php echo url_for('contact/show?id='.$contact->getId()) ?>"><?php echo $contact->getId() ?></a></td>
      <td><?php echo $contact->getPersonId() ?></td>
      <td><?php echo $contact->getRefSourceId() ?></td>
      <td><?php echo $contact->getSendAppFormat() ?></td>
      <td><?php echo $contact->getComment() ?></td>
      <td><?php echo $contact->getLetterSent() ?></td>
      <td><?php echo $contact->getContactTypeId() ?></td>
      <td><?php echo $contact->getCompanyName() ?></td>
      <td>
          <?php if($sf_user->hasRights('contact_create')):?><a class="link-edit" href="<?php echo url_for('@contact_edit?id='.$contact->getId())?>">edit</a><?php endif;?>
          <?php if($sf_user->hasRights('contact_delete')):?><?php echo link_to('remove', '@contact_delete?id='.$contact->getId(), array('method' => 'delete', 'confirm' => 'Are you sure to delete ? ', 'class' => 'action-remove'));?><?php endif; ?>
      </td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>
</div>
 *
 */
?>