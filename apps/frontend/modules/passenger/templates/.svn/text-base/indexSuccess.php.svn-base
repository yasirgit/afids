<?php use_helper('Form');?>
<?php /* @var $person Person */?>
<?php use_helper('Javascript', 'Form') ?>
<h2>Passenger Find</h2>

<div class="missions-available">
  <form id="filter_form" method="post" action="<?php echo url_for('@default_index?module=passenger')?>">
    <input type="hidden" name="filter" value="1"/>
    <fieldset>
      <div class="missions-available-filter">
        <div class="bg">
          <div class="characteristic_clean">
            <div class="holder">
              <div>
                <label for="ff_firstname">First Name</label>
                <!--<input type="text" class="text" value="<?php //echo $firstname?>" id="ff_firstname" name="firstname"/>-->
                <?php echo input_auto_complete_tag('firstname', $firstname == '*' ? '' : $firstname,
                                      'passenger/autoCompleteFirst',
                                      array('autocomplete' => 'off', 'class'=>'text narrow','style'=>'200px'),
                                      array(
                                      'use_style'    => true,
                                      'indicator'    =>'person_indicator',
                                      )
                                       ); ?>
                                        <span id="person_indicator" style="display:none"><?php echo image_tag('/images/loading.gif')?></span>

<?php /*echo observe_field('firstname', array(
  'update' => 'firstname',
  'url' => 'passenger/autoCompleteFirst',
  'with' => "'firstname=' + value + '&type=passenger'",
  "script" => true,
)) */?>
                                        
                <br clear="left"/>
                <label for="ff_lastname">Last Name</label>
                <!--<input type="text" class="text" value="<?php //echo $lastname?>" id="ff_lastname" name="lastname"/>-->
                <?php echo input_auto_complete_tag('lastname', $lastname == '*' ? '' : $lastname,
                                      'passenger/autoCompleteLast',
                                      array('autocomplete' => 'off', 'class'=>'text narrow','style'=>'200px'),
                                      array(
                                      'use_style'    => true,
                                      'indicator'    =>'person_indicator1',
                                      )
                                       ); ?>
                                        <span id="person_indicator1" style="display:none"><?php echo image_tag('/images/loading.gif')?></span>
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
                <?php echo select_tag('country', options_for_select($countries, $country, array('include_custom' => '- any -')), array('id' => 'ff_country','class'=>'text narrow'))?>
                <br clear="left"/>
                <br clear="left"/>
		            <input type="submit" value="Find"/>
		            <?php echo link_to('reset', '@default_index?module=passenger&filter=1')?>
              </div>
            </div>

          </div>
          <input type="submit" class="hide" value="submit"/>
        </div>
      </div>
    </fieldset>
  </form>
</div>

<?php if (isset($pager) && $pager->getNbResults()) {?>
  <?php if (isset($mission_for)) include_partial('passenger/passenger_for', array('mission_for' => $mission_for, 'cancel_route' => '@default_index?module=passenger'))?>
<div class="pager">
  Passengers per page:
  <?php foreach ($max_array as $i => $v) {
    if ($i) echo ' | ';
    $url = '@default_index?module=passenger&max='.$v;
    if (isset($mission_for)) $url .= '&mission_for='.$mission_for->getId();
    echo link_to_if($max != $v, $v, $url);
  }?>
  <div>
    <form action="<?php echo url_for('@default_index?module=passenger')?>">
      <?php if (isset($mission_for)){
        $url_add = '&mission_for='.$mission_for->getId()?>
        <input type="hidden" name="mission_for" value="<?php echo $mission_for->getId()?>"/>
      <?php }else $url_add = ''?>
      <?php echo link_to('Previous', '@default_index?module=passenger&page='.$pager->getPreviousPage().$url_add, array('class' => 'btn-pager-prev'))?>
      <input type="text" name="page" class="active-page" value="<?php echo $pager->getPage()?>"/>
      <strong>of <?php echo link_to($pager->getLastPage(), '@default_index?module=passenger&page='.$pager->getLastPage().$url_add)?></strong>
      <?php echo link_to('Next', '@default_index?module=passenger&page='.$pager->getNextPage().$url_add, array('class' => 'btn-pager-next'))?>
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
  <?php foreach ($passengers as $passenger):?>
  <?php $person = $passenger->getPerson();?>
  <tr>
    <td class="cell-1">
      <?php if(isset($person)):?><?php echo $person->getName()?><?php endif; ?>
    </td>
    <td class="cell-1">
      <?php echo $person->getAddress1() ? $person->getAddress1().', '  : ''?> 
      <?php echo $person->getCity() ? $person->getCity().', '  : ''?>  
      <?php echo $person->getState()?> 
   </td>
    <td>
    <?php if(isset($person)):?>
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
      <?php endif; ?>
    </td>
    <td>
      <ul class="action-list">
        
        <li>
            <?php if ($sf_user->hasCredential(array('Administrator','Staff','Pilot','Coordinator','Volunteer'), false)) { ?>
                <a class="action-edit" href="<?php echo url_for('@passenger_edit?id='.$passenger->getId())?>">Edit</a>
            <?php } ?>         
        </li>
        <li>
          <?php if ($sf_user->hasCredential(array('Administrator','Staff','Pilot','Coordinator','Volunteer'), false)) {
            $url = '@passenger_view?id='.$passenger->getId();
            if (isset($mission_for)) $url .= '&mission_for='.$mission_for->getId();
            echo link_to('view', $url, array('class' => 'link-view'));
         }?>
        </li>
        <li>
            
            <?php if(isset($can_use) && $can_use == 1 && $mission_for):?>
                   <?php if ($sf_user->hasCredential(array('Administrator','Staff','Pilot','Coordinator','Volunteer'), false)):?>
                        <?php echo link_to('Use this passenger ', '@default?module=passenger&action=change&for='.$mission_for->getId().'&id='.$passenger->getId(), array('class' => 'link-add'));?>
                   <?php endif;?>
            <?php endif;?>
            
        </li>
      </ul>
    </td>
  </tr>
  <?php endforeach;?>
</tbody>
</table>

<div class="pager">
  Passengers per page:
  <?php foreach ($max_array as $i => $v) {
    if ($i) echo ' | ';
    $url = '@default_index?module=passenger&max='.$v;
    if (isset($mission_for)) $url .= '&mission_for='.$mission_for->getId();
    echo link_to_if($max != $v, $v, $url);
  }?>
  <div>
    <form action="<?php echo url_for('@default_index?module=passenger')?>">
      <?php if (isset($mission_for)){
        $url_add = '&mission_for='.$mission_for->getId()?>
        <input type="hidden" name="mission_for" value="<?php echo $mission_for->getId()?>"/>
      <?php }else $url_add = ''?>
      <?php echo link_to('Previous', '@default_index?module=passenger&page='.$pager->getPreviousPage().$url_add, array('class' => 'btn-pager-prev'))?>
      <input type="text" name="page" class="active-page" value="<?php echo $pager->getPage()?>"/>
      <strong>of <?php echo link_to($pager->getLastPage(), '@default_index?module=passenger&page='.$pager->getLastPage().$url_add)?></strong>
      <?php echo link_to('Next', '@default_index?module=passenger&page='.$pager->getNextPage().$url_add, array('class' => 'btn-pager-next'))?>
      <input type="submit" class="hide"/>
    </form>
  </div>
</div>
<?php }?>
