<?php use_helper('Form');
$date_widget = $sf_data->getRaw('date_widget');
use_javascripts_for_form($date_widget);
use_stylesheets_for_form($date_widget);
$can_view = $sf_user->hasCredential(array('Administrator','Staff','Pilot','Coordinator','Volunteer'), false);
/* @var $person Person */
?>
<?php use_helper('Javascript', 'Form') ?>

<h2>Person Find</h2>

<?php if($add_cont ==1){ ?>
    <?php if ($sf_user->hasCredential(array('Administrator','Staff'), false)): ?>
    <a href="<?php echo url_for('person/update?add_cont='.'yes') ?>" id="add_per_pass" name="add_per_pass">Add Person and Contact</a>
    <?php endif;?>
<?php } ?>

<div class="missions-available">
  <form id="filter_form" method="post" action="<?php echo url_for('@default_index?module=person')?>">
    <input type="hidden" name="filter" value="1"/>
    <fieldset>
      <div class="missions-available-filter">
        <div class="bg">
          <div class="characteristic_clean">
            <div class="holder">
              <div>
                <br clear="left"/>
                <label for="ff_firstname">First Name</label>
                <!--<input type="text" class="text" value="<?php //echo $firstname?>" id="ff_firstname" name="firstname"/>-->
                <?php
                echo input_auto_complete_tag('firstname', $firstname == '*' ? '' : $firstname,
                                      'person/autoCompleteFirst',
                                      array('autocomplete' => 'off', 'class'=>'text narrow','style'=>'200px'),
                                      array(
                                      'use_style'    => true,
                                      'indicator'    =>'person_indicator',
                                      )
                                       );
                ?>
                <span id="person_indicator" style="display:none"><?php echo image_tag('/images/loading.gif')?></span>
                <br clear="left"/>
                <label for="ff_lastname">Last Name</label>
                <!--<input type="text" class="text" value="<?php //echo $lastname?>" id="ff_lastname" name="lastname"/>-->
                <?php echo input_auto_complete_tag('lastname', $lastname == '*' ? '' : $lastname,
                                      'person/autoCompleteLast',
                                      array('autocomplete' => 'off', 'class'=>'text narrow','style'=>'200px'),
                                      array(
                                      'use_style'    => true,
                                      'indicator'    =>'person_indicator1',
                                      )
                                       ); ?>
                                        <span id="person_indicator1" style="display:none"><?php echo image_tag('/images/loading.gif')?></span>
              </div>
              <div>
                <br clear="left"/>
                <label for="ff_city">City</label>
                <input type="text" class="text" value="<?php echo $city?>" id="ff_city" name="city"/>
                <br clear="left"/>
                <label for="ff_state">State</label>
                <input type="text" class="text" value="<?php echo $state?>" id="ff_state" name="state"/>
              </div>
              <div>
                <div class="location-as">
                  <ul>
                    <li>
                      <input type="checkbox" id="ff_deceased" value="1" <?php if ($deceased) echo 'checked="checked"'?> name="deceased"/>
                      <label for="ff_deceased">Deceased?</label>
                    </li>
                  </ul>
                </div>
                <label for="deceased_until">Deceased Prior To</label>
                <?php echo $date_widget->render('deceased_until', $deceased_until);?>
                <label for="deceased_after">Deceased After</label>
                <?php echo $date_widget->render('deceased_after', $deceased_after);?>
              </div>
              <div>
                <br clear="left"/>
                <br clear="left"/>
                <label for="ff_country">Country</label>
                <?php echo select_tag('country', options_for_select($countries, $country, array('include_custom' => '- any -')), array('id' => 'ff_country'))?>
                <br clear="left"/>
                <label for="ff_gender">Gender</label>
                <?php echo select_tag('gender', options_for_select($genders, $gender, array('include_custom' => '- any -')), array('id' => 'ff_gender', 'style'=>'width: 103px;'))?>
              </div>
            </div>
            <input type="submit" value="Find"/>
            <?php echo link_to('reset', '@default_index?module=person&filter=1')?>
          </div>
          <input type="submit" class="hide" value="submit"/>
        </div>
      </div>
    </fieldset>
  </form>
</div>

<?php if (isset($pager) && $pager->getNbResults()) {?>
<div class="pager">
  People per page:
  <?php foreach ($max_array as $i => $v) {
    if ($i) echo ' | ';
    echo link_to_if($max != $v, $v, '@default_index?module=person&max='.$v);
  }?>
  <div>
    <form action="<?php echo url_for('@default_index?module=person')?>">
      <?php echo link_to('Previous', '@default_index?module=person&page='.$pager->getPreviousPage(), array('class' => 'btn-pager-prev'))?>
      <input type="text" name="page" class="active-page" value="<?php echo $pager->getPage()?>"/>
      <strong>of <?php echo link_to($pager->getLastPage(), '@default_index?module=person&page='.$pager->getLastPage())?></strong>
      <?php echo link_to('Next', '@default_index?module=person&page='.$pager->getNextPage(), array('class' => 'btn-pager-next'))?>
      <input type="submit" class="hide"/>
    </form>
  </div>
</div>

<table class="mission-request-table">
<thead>
  <tr>
    <td>Name</td>
    <td>Address</td>
    <td>Contact</td>
    <td>Action</td>
  </tr>
</thead>
<tbody>
  <?php foreach ($persons as $person): ?>
  <tr>
    <td class="cell-1">
      <?php echo $person->getName()?>
    </td>
    <td class="cell-1">
      <?php echo $person->getAddress1() ? $person->getAddress1().', ' : ''?>
      <?php echo $person->getCity() ? $person->getCity().', ' : ''?>
      <?php echo $person->getState()?>
    </td>
    <td>
      <div class="name-list">
        <dl>
          <?php if ($person->getDayPhone().$person->getDayComment()) {?>
          <dt>Work:</dt>
          <dd><?php echo $person->getDayPhone().' <i>'.$person->getDayComment().'</i>'?></dd>
          <?php }?>
          <?php if ($person->getEveningPhone().$person->getEveningComment()) {?>
          <dt>Home:</dt>
          <dd><?php echo $person->getEveningPhone().' <i>'.$person->getEveningComment().'</i>'?></dd>
          <?php }?>
          <?php if ($person->getMobilePhone().$person->getMobileComment()) {?>
          <dt>Cell:</dt>
          <dd><?php echo $person->getMobilePhone().' <i>'.$person->getMobileComment().'</i>'?></dd>
          <?php }?>
        </dl>
        <?php if ($person->getEmail()) echo mail_to($person->getEmail())?>
      </div>
    </td>
    <td>
      <?php if ($can_view){?>
      <ul class="action-list">
        <li>
          <?php if ($sf_user->hasCredential(array('Administrator','Staff','Pilot','Coordinator','Volunteer'), false)):?>
            <a class="action-view" href="<?php echo url_for('@person_view?id='.$person->getId())?>">View</a>
          <?php endif;?>
        </li>
      </ul>
      <?php }?>
    </td>
  </tr>
  <?php endforeach;?>
</tbody>
</table>

<div class="pager">
  People per page:
  <?php foreach ($max_array as $i => $v) {
    if ($i) echo ' | ';
    echo link_to_if($max != $v, $v, '@default_index?module=person&max='.$v);
  }?>
  <div>
    <form action="<?php echo url_for('@default_index?module=person')?>">
      <?php echo link_to('Previous', '@default_index?module=person&page='.$pager->getPreviousPage(), array('class' => 'btn-pager-prev'))?>
      <input type="text" name="page" class="active-page" value="<?php echo $pager->getPage()?>"/>
      <strong>of <?php echo link_to($pager->getLastPage(), '@default_index?module=person&page='.$pager->getLastPage())?></strong>
      <?php echo link_to('Next', '@default_index?module=person&page='.$pager->getNextPage(), array('class' => 'btn-pager-next'))?>
      <input type="submit" class="hide"/>
    </form>
  </div>
</div>
<?php }?>
