<?php use_helper('Form','Javascript');
/* @var $master_for Member */?>

<h2>Member List</h2>
<div class="missions-available">
  <form id="filter_form" method="post" action="<?php echo url_for('@default_index?module=member')?>">
    <input type="hidden" name="filter" value="1"/>
    <?php if ($master_for){?><input type="hidden" name="master_for" value="<?php echo $master_for->getId()?>"/><?php }?>
    <div class="missions-available-filter">
      <div class="bg">
        <div class="characteristic_clean">
          <div class="holder">
            <div>
              <label for="ff_member_id">Member External ID</label>
              <input type="text" class="text" value="<?php if(isset($member_id))echo $member_id?>" id="ff_member_id" name="member_Ex_id"/>
              <br clear="left"/>
              <label for="ff_flight_status">Flight Status</label>
              <?php echo select_tag('flight_status', options_for_select($flight_statuses, $flight_status, array('include_custom' => '- any -')), array('id' => 'ff_flight_status','class'=>'text narrow'))?>
            </div>
             <div>
              <label for="ff_firstname">First Name</label>
                <!--<input type="text" class="text" value="<?php //echo $firstname?>" id="ff_firstname" name="firstname"/>-->
                <?php echo input_auto_complete_tag('firstname', $firstname == '*' ? '' : $firstname,
                                      'member/autoCompleteFirst',
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
                                      'member/autoCompleteLast',
                                      array('autocomplete' => 'off', 'class'=>'text narrow','style'=>'200px'),
                                      array(
                                      'use_style'    => true,
                                      'indicator'    =>'person_indicator1',
                                      )
                                       ); ?>
                                        <span id="person_indicator1" style="display:none"><?php echo image_tag('/images/loading.gif')?></span>
                <br clear="left"/>
            </div>
            <div>
              <label for="ff_state">State</label>
              <input type="text" class="text" value="<?php echo $state?>" id="ff_state" name="state"/>
              <br clear="left"/>
              <label for="ff_country">Country</label>
               <?php echo select_tag('country', options_for_select($countries, $country, array('include_custom' => '- any -')), array('id' => 'ff_country','class'=>'text narrow'))?>
            </div>
            <div>
              <label for="ff_city">City</label>
              <input type="text" class="text" value="<?php echo $city?>" id="ff_city" name="city"/>
              <br clear="left"/>
              <label for="ff_wing_name">Wing Name</label>
                  <?php echo select_tag('wing_name', options_for_select($wings, $wing_name, array('include_custom' => '- any -')), array('id' => 'ff_wing_name','class'=>'text narrow'))?>
              <br clear="left"/>
              <div class="location-as">
                <ul>
                  <li>
                    <input type="checkbox" id="ff_active" value="1" <?php if ($active){ echo 'checked="checked"';}else{if($is_active){echo 'checked="checked"';}}?> name="active"/>
                    <label for="ff_active">Active Members Only</label>
                  </li>
                </ul>
              </div>
            </div>
          </div>
          <input type="submit" value="Find"/>
           <?php echo link_to('reset', '@default_index?module=member&filter=1')?>
        </div>
      </div>
    </div>
  </form>
</div>
<br/>
<?php if ( isset($pager) && $pager->getNbResults()) {?>
<div>Found <?php echo $pager->getNbResults();?> Members</div>

  <?php if ($master_for) include_partial('member/master_for', array('master_for' => $master_for, 'cancel_route' => '@default_index?module=member'))?>


<div class="pager">
  Members per page:
  <?php foreach ($max_array as $i => $v) {
    if ($i) echo ' | ';
    $url = '@default_index?module=member&max='.$v;
    if ($master_for) $url .= '&master_for='.$master_for->getId();
    echo link_to_if($max != $v, $v, $url);
  }?>
  <div>
    <form action="<?php echo url_for('@default_index?module=member')?>">
      <?php if ($master_for){
        $url_add = '&master_for='.$master_for->getId()?>
        <input type="hidden" name="master_for" value="<?php echo $master_for->getId()?>"/>
      <?php }else $url_add = ''?>
      <?php echo link_to('Previous', '@default_index?module=member&page='.$pager->getPreviousPage().$url_add, array('class' => 'btn-pager-prev'))?>
      <input type="text" name="page" class="active-page" value="<?php echo $pager->getPage()?>"/>
      <strong>of <?php echo link_to($pager->getLastPage(), '@default_index?module=member&page='.$pager->getLastPage().$url_add)?></strong>
      <?php echo link_to('Next', '@default_index?module=member&page='.$pager->getNextPage().$url_add, array('class' => 'btn-pager-next'))?>
      <input type="submit" class="hide"/>
    </form>
  </div>
</div>


<table class="mission-request-table">
<thead>
  <tr>
    <td>Member External ID</td>
    <td>Name</td>
    <td>Location</td>
    <td>Wing Name</td>
    <td>Active</td>
    <td>Flight Status</td>
    <td>Action</td>
  </tr>
</thead>
<tbody>
  <?php foreach ($members as $member): ?>
  <?php $person_id = $member->getPersonId();?>
  <?php if($person_id):?>
      <?php $person = PersonPeer::retrieveByPK($person_id) ?>
  <?php endif;?>
  
  <?php $wing_id = $member->getWingId();?>
  <?php if($wing_id):?>
      <?php $wing =WingPeer::retrieveByPK($wing_id) ?>
  <?php endif;?>
  
  <tr>
    <td class="cell-1">
        <?php if(isset($member)):?><?php echo $member->getExternalId()?><?php endif;?>
    </td>
    <td class="cell-1">
        <?php if(isset($person)):?>
          <?php if($person->getFirstName() || $person->getLastName()):?>
          <?php echo $person->getFirstName().' '.$person->getLastName()?>
          <?php endif;?>
        <?php endif;?>
    </td>
    <td class="cell-1">
    <?php if(isset($person)):?>
     <div class="name-list">
        <dl>
          <?php if ($person->getCity()) {?>
          <dt>City:</dt>
          <dd><?php echo $person->getCity()?></dd>
          <?php }?>
          <?php if ($person->getState()) {?>
          <dt>State:</dt>
          <dd><?php echo $person->getState()?></dd>
          <?php }?>
          <?php if ($person->getCountry()) {?>
          <dt>Country:</dt>
          <dd><?php echo $person->getCountry()?></dd>
          <?php }?>
          <dt></dt>
        </dl>
      </div>
      <?php endif;?>
    </td>
   <td class="cell-1">
        <?php if(isset($wing)):?><?php echo $wing->getName()?><?php endif;?>
    </td>
    <td class="cell-1">
        <?php if($member->getActive()):?>
            <?php if($member->getActive() == 1):?>
                   Yes
              <?php else:?>
                   No
            <?php endif;?>
        <?php endif;?>
    </td>
    <td class="cell-1">
        <?php if(isset($member)):?><?php echo $member->getFlightStatus()?><?php endif;?>
    </td>
    <td class="cell-1">
      <?php if ($sf_user->hasCredential(array('Administrator','Staff','Pilot','Member','Coordinator','Volunteer'), false)) {
          $url = '@member_view?id='.$member->getId();
          if ($master_for) $url .= '&master_for='.$master_for->getId();
          echo link_to('view', $url, array('class' => 'link-view'));
      }?>
      <?php  $cur_user_member_id = $sf_user->getMemberId();?>
      <?php if (($sf_user->hasCredential(array('Administrator','Staff'), false)) || $member->getId() == $cur_user_member_id ) echo link_to('edit','@member_edit?id='.$member->getId(), array('class' => 'link-edit'));?>
      
    </td>
  </tr>
  <?php endforeach;?>
</tbody>
</table>

<div class="pager">
  Members per page:
  <?php foreach ($max_array as $i => $v) {
    if ($i) echo ' | ';
    $url = '@default_index?module=member&max='.$v;
    if ($master_for) $url .= '&master_for='.$master_for->getId();
    echo link_to_if($max != $v, $v, $url);
  }?>
  <div>
    <form action="<?php echo url_for('@default_index?module=member')?>">
      <?php if ($master_for){
        $url_add = '&master_for='.$master_for->getId()?>
        <input type="hidden" name="master_for" value="<?php echo $master_for->getId()?>"/>
      <?php }else $url_add = ''?>
      <?php echo link_to('Previous', '@default_index?module=member&page='.$pager->getPreviousPage().$url_add, array('class' => 'btn-pager-prev'))?>
      <input type="text" name="page" class="active-page" value="<?php echo $pager->getPage()?>"/>
      <strong>of <?php echo link_to($pager->getLastPage(), '@default_index?module=member&page='.$pager->getLastPage().$url_add)?></strong>
      <?php echo link_to('Next', '@default_index?module=member&page='.$pager->getNextPage().$url_add, array('class' => 'btn-pager-next'))?>
      <input type="submit" class="hide"/>
    </form>
  </div>
</div>
<?php }?>

  