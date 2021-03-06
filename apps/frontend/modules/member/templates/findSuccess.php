<?php use_helper('Form','Javascript');
$date_widget = $sf_data->getRaw('date_widget');
use_javascripts_for_form($date_widget);
use_stylesheets_for_form($date_widget);
?>

<h2>Person Find :: Member Add</h2>
<div class="missions-available">
  <form id="filter_form" method="post" action="<?php echo url_for('@member_find')?>">
    <input type="hidden" name="filter" value="1"/>
    <fieldset>
      <div class="missions-available-filter">
        <div class="bg">
          <div class="characteristic_clean">
            <div class="holder">
              <div>
                <label for="ff_firstname">First Name</label>
                <?php echo input_auto_complete_tag('firstname', $firstname == '*' ? '' : $firstname,
                                      'member/autoCompleteFirstNotMember',
                                      array('autocomplete' => 'off', 'class'=>'text narrow','style'=>'200px'),
                                      array(
                                      'use_style'    => true,
                                      'indicator'    =>'person_indicator',
                                      )
                                       ); ?>
                                        <span id="person_indicator" style="display:none"><?php echo image_tag('/images/loading.gif')?></span>


                <br clear="left"/>
                
                <label for="ff_lastname">Last Name</label>
                <?php echo input_auto_complete_tag('lastname', $lastname == '*' ? '' : $lastname,
                                      'member/autoCompleteLastNotMember',
                                      array('autocomplete' => 'off', 'class'=>'text narrow','style'=>'200px'),
                                      array(
                                      'use_style'    => true,
                                      'indicator'    =>'person_indicator1',
                                      )
                                       ); ?>
                                        <span id="person_indicator1" style="display:none"><?php echo image_tag('/images/loading.gif')?></span>
              
                <br clear="left"/>
                <label for="ff_gender">Gender</label>
                <?php echo select_tag('gender', options_for_select($genders, $gender, array('include_custom' => '- any -')), array('id' => 'ff_gender'))?>
              </div>
              <div>
                <label for="ff_city">City</label>
                <input type="text" class="text" value="<?php echo $city?>" id="ff_city" name="city"/>
                <br clear="left"/>
                <label for="ff_state">State</label>
                <input type="text" class="text" value="<?php echo $state?>" id="ff_state" name="state"/>
              </div>
              <div>
                <label for="ff_country">Country</label>
                <?php echo select_tag('country', options_for_select($countries, $country, array('include_custom' => '- any -')), array('id' => 'ff_country'))?>
                <br clear="left"/>
                <label for="ff_county">County</label>
                <input type="text" class="text" value="<?php echo $county?>" id="ff_county" name="county"/>
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
            </div>
            <input type="submit" value="Find"/>
           <?php echo link_to('reset', 'member/find?filter=1')?>
          </div>
          <input type="submit" class="hide" value="submit"/>
        </div>
      </div>
    </fieldset>
  </form>
</div>

<?php if ($pager->getNbResults()) {?>
<div class="pager">
  People per page:
  <?php foreach ($max_array as $i => $v) {
    if ($i) echo ' | ';
    echo link_to_if($max != $v, $v, '@member_find?module=member&max='.$v);
  }?>
  <div>
    <form action="<?php echo url_for('@member_find?module=member')?>">
      <?php echo link_to('Previous', '@member_find?module=member&page='.$pager->getPreviousPage(), array('class' => 'btn-pager-prev'))?>
      <input type="text" name="page" class="active-page" value="<?php echo $pager->getPage()?>"/>
      <strong>of <?php echo link_to($pager->getLastPage(), '@member_find?module=member&page='.$pager->getLastPage())?></strong>
      <?php echo link_to('Next', '@member_find?module=member&page='.$pager->getNextPage(), array('class' => 'btn-pager-next'))?>
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
    <td class="cell-1"><?php echo $person->getAddress1()?></td>
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
          <dt></dt>
        </dl>
        <?php if ($person->getEmail()) echo mail_to($person->getEmail())?>
      </div>
    </td>
    <td>
      <ul class="action-list">
        <?php if ($sf_user->hasCredential(array('Administrator','Staff','Pilot','Coordinator','Volunteer'), false)) {?>
          <li><a class="action-view" href="<?php echo url_for('@person_view?id='.$person->getId())?>">View</a></li>
        <?php } ?>
      </ul>
    </td>
  </tr>
  <?php endforeach;?>
</tbody>
</table>

<div class="pager">
  People per page:
  <?php foreach ($max_array as $i => $v) {
    if ($i) echo ' | ';
    echo link_to_if($max != $v, $v, '@member_find?module=member&max='.$v);
  }?>
  <div>
    <form action="<?php echo url_for('@member_find?module=member')?>">
      <?php echo link_to('Previous', '@member_find?module=member&page='.$pager->getPreviousPage(), array('class' => 'btn-pager-prev'))?>
      <input type="text" name="page" class="active-page" value="<?php echo $pager->getPage()?>"/>
      <strong>of <?php echo link_to($pager->getLastPage(), '@member_find?module=member&page='.$pager->getLastPage())?></strong>
      <?php echo link_to('Next', '@member_find?module=member&page='.$pager->getNextPage(), array('class' => 'btn-pager-next'))?>
      <input type="submit" class="hide"/>
    </form>
  </div>
</div>
<?php }?>
