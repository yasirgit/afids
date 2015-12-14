<?php use_helper('Form');
$date_widget = $sf_data->getRaw('date_widget');
use_javascripts_for_form($date_widget);
use_stylesheets_for_form($date_widget);
$can_view = $sf_user->hasCredential(array('Administrator','Staff','Pilot','Coordinator','Volunteer'), false);
?>

<h2>Subscribe Person to <?php echo $email_list->getDescription()?></h2>
<div class="missions-available">
  <form id="filter_form" method="post" action="<?php echo url_for('person/subscribe?id='.$email_list->getId())?>">
    <input type="hidden" name="filter" value="1"/>
    <fieldset>
      <div class="missions-available-filter">
        <div class="bg">
          <div class="characteristic_clean">
            <div class="holder">
              <div>
                <label for="ff_firstname">First Name</label>
                <input type="text" class="text" value="<?php echo $firstname?>" id="ff_firstname" name="firstname"/>
                <br clear="left"/>
                <label for="ff_lastname">Last Name</label>
                <input type="text" class="text" value="<?php echo $lastname?>" id="ff_lastname" name="lastname"/>
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
            <?php echo link_to('reset', 'person/subscribe?id='.$email_list->getId().'&filter=1')?>
          </div>
          <input type="submit" class="hide" value="submit"/>
        </div>
      </div>
    </fieldset>
  </form>
</div>

<p style="color:orange;">
  Subscribed people are ommited!
</p>

<?php if ($pager->getNbResults()) {?>
<div class="pager">
  People per page:
  <?php foreach ($max_array as $i => $v) {
    if ($i) echo ' | ';
    echo link_to_if($max != $v, $v, 'person/subscribe?id='.$email_list->getId().'&max='.$v);
  }?>
  <div>
    <form action="<?php echo url_for('person/subscribe?id='.$email_list->getId())?>">
      <?php echo link_to('Previous', 'person/subscribe?id='.$email_list->getId().'&page='.$pager->getPreviousPage(), array('class' => 'btn-pager-prev'))?>
      <input type="text" name="page" class="active-page" value="<?php echo $pager->getPage()?>"/>
      <strong>of <?php echo link_to($pager->getLastPage(), 'person/subscribe?id='.$email_list->getId().'&page='.$pager->getLastPage())?></strong>
      <?php echo link_to('Next', 'person/subscribe?id='.$email_list->getId().'&page='.$pager->getNextPage(), array('class' => 'btn-pager-next'))?>
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
        </dl>
        <?php if ($person->getEmail()) echo mail_to($person->getEmail())?>
      </div>
    </td>
    <td>
      <?php if($can_view):?><a class="action-view" href="<?php echo url_for('@person_view?id='.$person->getId())?>">View</a><?php endif;?>
      <ul class="status-list" id="<?php echo 'subscribe_'.$person->getId()?>">
        <li><a class="status-process" href="#" onclick="subscribe(<?php echo $person->getId()?>); return false;">Subscribe</a></li>
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
    echo link_to_if($max != $v, $v, 'person/subscribe?id='.$email_list->getId().'&max='.$v);
  }?>
  <div>
    <form action="<?php echo url_for('person/subscribe?id='.$email_list->getId())?>">
      <?php echo link_to('Previous', 'person/subscribe?id='.$email_list->getId().'&page='.$pager->getPreviousPage(), array('class' => 'btn-pager-prev'))?>
      <input type="text" name="page" class="active-page" value="<?php echo $pager->getPage()?>"/>
      <strong>of <?php echo link_to($pager->getLastPage(), 'person/subscribe?id='.$email_list->getId().'&page='.$pager->getLastPage())?></strong>
      <?php echo link_to('Next', 'person/subscribe?id='.$email_list->getId().'&page='.$pager->getNextPage(), array('class' => 'btn-pager-next'))?>
      <input type="submit" class="hide"/>
    </form>
  </div>
</div>
<script type="text/javascript">
  //<![CDATA[
  function subscribe(id)
  {
    $.ajax({
      url: '<?php echo url_for('email_list/ajaxSubscribe?list_id='.$email_list->getId())?>',
      dataType: 'html',
      data: { id: id },
      success: function (html) {
        $('#subscribe_'+parseInt(html)).remove();
      }
    });
  }
  //]]>
</script>

<?php }else{?>
  There is no matching person record
<?php }?>
