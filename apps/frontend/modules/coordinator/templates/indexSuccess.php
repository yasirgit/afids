<?php use_helper('Form');?>

<h2>Coordinator List</h2>

<form id="filter_form" method="post" action="<?php echo url_for('@default_index?module=coordinator')?>">
  <input type="hidden" name="filter" value="1"/>
  <?php if ($coor_for){?><input type="hidden" name="coor_for" value="<?php echo $coor_for->getId()?>"/><?php }?>
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
            <label for="ff_coor_of_week">Coor of the week</label>
            <input type="checkbox" id="ff_coor_of_week" value="1" <?php if ($coor_of_week) echo 'checked="checked"'?> name="ff_coor_of_week"/>
          </div>
        </div>
        <input type="submit" value="Find"/>
        <?php echo link_to('reset', '@default_index?module=coordinator&filter=1')?>
      </div>
    </div>
  </div>
</form>
  
<?php if ($pager->getNbResults()) {?>
  <?php if ($coor_for) include_partial('coordinator/lead_for', array('coor_for' => $coor_for, 'cancel_route' => '@default_index?module=coordinator'))?>
<div class="pager">
  Coodinator per page:
  <?php foreach ($max_array as $i => $v) {
    if ($i) echo ' | ';
    echo link_to_if($max != $v, $v, '@default_index?module=coordinator&max='.$v);
  }?>
  <div>
    <form action="<?php echo url_for('@default_index?module=coordinator')?>">
      <?php if ($coor_for){
        $url_add = '&coor_for='.$coor_for->getId()?>
        <input type="hidden" name="coor_for" value="<?php echo $coor_for->getId()?>"/>
      <?php }else $url_add = ''?>
      <?php echo link_to('Previous', '@default_index?module=coordinator&page='.$pager->getPreviousPage().$url_add, array('class' => 'btn-pager-prev'))?>
      <input type="text" name="page" class="active-page" value="<?php echo $pager->getPage()?>"/>
      <strong>of <?php echo link_to($pager->getLastPage(), '@default_index?module=coordinator&page='.$pager->getLastPage().$url_add)?></strong>
      <?php echo link_to('Next', '@default_index?module=coordinator&page='.$pager->getNextPage().$url_add, array('class' => 'btn-pager-next'))?>
      <input type="submit" class="hide"/>
    </form>
  </div>
</div>
<br/>

<table class="mission-request-table">
<thead>
  <tr>
    <td>Name</td>
    <td>Coor of the week</td>
    <td>Coor week date</td>
    <td>Initial contact</td>
    <td>Action</td>
  </tr>
</thead>
<tbody>
  <?php foreach ($coordinators as $coordinator): ?>
  <?php $mem_id = $coordinator->getMemberId()?>
  <?php if($mem_id):?>
        <?php $person_id = MemberPeer::retrieveByPK($mem_id)->getPersonId();?>
        <?php $person  = PersonPeer::retrieveByPK($person_id);?>
  <?php endif;?>
  <tr>
    <td class="cell-1">
        <?php if(isset($person)):?><?php echo $person->getFirstName().' '.$person->getLastName()?><?php endif;?>
    </td>
    <td class="cell-1"><?php if($coordinator->getCoorOfTheWeek()):?>
    <?php if($coordinator->getCoorOfTheWeek() == 1): ?>
        Yes
    <?php else:?>
        No
    <?php endif;?>
    <?php endif;?>
    </td>
    <td class="cell-1">
    <?php if($coordinator->getCoorWeekDate()):?>
          <?php echo $coordinator->getCoorWeekDate();?>
    <?php endif;?>
    </td>
     <td class="cell-1">
    <?php if($coordinator->getInitialContact()):?>
          <?php echo $coordinator->getInitialContact();?>
    <?php endif;?>
    </td>
    <td class="cell-1">
         <?php if ($sf_user->hasCredential(array('Administrator','Staff','Pilot','Coordinator','Volunteer'), false)) {
           $url = '@coordinator_view?id='.$coordinator->getId();
           if ($coor_for) $url .= '&coor_for='.$coor_for->getId();
           echo link_to('view', $url, array('class' => 'link-view'));
        }?>
        <?php if ($sf_user->hasCredential(array('Administrator','Staff'), false)):?><a class="link-edit" href="<?php echo url_for('@coordinator_edit?id='.$coordinator->getId())?>">edit</a><?php endif;?>
        <?php if ($sf_user->hasCredential(array('Administrator','Staff'), false)):?><?php echo link_to('remove', '@coordinator_delete?id='.$coordinator->getId(), array('method' => 'delete', 'confirm' => 'Are you sure to remove and related information?', 'class' => 'action-remove'));?><?php endif;?>
        
       <?php if ($sf_user->hasCredential(array('Administrator','Staff'), false)):?>
        <?php if($can_use == '1' && $change_id):?>
            <?php echo link_to('Use coordinator', '@default?module=coordinator&action=changeLead&for='.$change_id.'&use_id='.$coordinator->getId(), array('class' => 'link-add'));?>
        <?php endif;?>
       <?php endif;?>
    </td>
  </tr>
  <?php endforeach;?>
</tbody>
</table>

<div class="pager">
  Coodinator per page:
  <?php foreach ($max_array as $i => $v) {
    if ($i) echo ' | ';
    echo link_to_if($max != $v, $v, '@default_index?module=coordinator&max='.$v);
  }?>
  <div>
    <form action="<?php echo url_for('@default_index?module=coordinator')?>">
      <?php if ($coor_for){
        $url_add = '&coor_for='.$coor_for->getId()?>
        <input type="hidden" name="coor_for" value="<?php echo $coor_for->getId()?>"/>
      <?php }else $url_add = ''?>
      <?php echo link_to('Previous', '@default_index?module=coordinator&page='.$pager->getPreviousPage().$url_add, array('class' => 'btn-pager-prev'))?>
      <input type="text" name="page" class="active-page" value="<?php echo $pager->getPage()?>"/>
      <strong>of <?php echo link_to($pager->getLastPage(), '@default_index?module=coordinator&page='.$pager->getLastPage().$url_add)?></strong>
      <?php echo link_to('Next', '@default_index?module=coordinator&page='.$pager->getNextPage().$url_add, array('class' => 'btn-pager-next'))?>
      <input type="submit" class="hide"/>
    </form>
  </div>
</div>
<?php }?>

