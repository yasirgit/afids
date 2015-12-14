<?php use_helper('Javascript', 'Form') ?>
<div class="person-view">
<h2>Requester List</h2>
<!--  <a href="<?php //echo url_for('requester/update') ?>">Add Requester</a>-->
  <!--  Search companion-->
    <form id="filter_form" method="post" action="<?php echo url_for('@default_index?module=requester')?>">
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
                                      'requester/autoCompleteFirst',
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
                                      'requester/autoCompleteLast',
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
                <label for="ff_agency_name">Agency Name</label>
                <input type="text" class="text" value="<?php echo $agency_name?>" id="ff_agency_name" name="agency_name"/>
                <br clear="left"/>                
              </div>
            </div>
            <input type="submit" value="Find"/>
             <?php echo link_to('reset', '@default_index?module=requester&filter=1')?>
          </div>
          <input type="submit" class="hide" value="submit"/>
        </div>
      </div>
    </fieldset>
  </form>
</div>

<?php if (isset($pager) && $pager->getNbResults()) {?>
    <?php if (isset($mission_for)) include_partial('requester/requester_for', array('mission_for' => $mission_for, 'cancel_route' => '@default_index?module=requester'))?>
<div class="pager">
  Requester per page:
  <?php foreach ($max_array as $i => $v) {
    if ($i) echo ' | ';
    echo link_to_if($max != $v, $v, '@default_index?module=requester&max='.$v);
  }?>
  <div>
    <form action="<?php echo url_for('@default_index?module=requester')?>">
      <?php if (isset($mission_for)){
        $url_add = '&mission_for='.$mission_for->getId()?>
        <input type="hidden" name="mission_for" value="<?php echo $mission_for->getId()?>"/>
      <?php }else $url_add = ''?>
      
      <?php echo link_to('Previous', '@default_index?module=requester&page='.$pager->getPreviousPage().$url_add, array('class' => 'btn-pager-prev'))?>
      <input type="text" name="page" class="active-page" value="<?php echo $pager->getPage()?>"/>
      <strong>of <?php echo link_to($pager->getLastPage(), '@default_index?module=requester&page='.$pager->getLastPage().$url_add)?></strong>
      <?php echo link_to('Next', '@default_index?module=requester&page='.$pager->getNextPage().$url_add, array('class' => 'btn-pager-next'))?>
      <input type="submit" class="hide"/>
    </form>
  </div>
</div>
<br/>


<table class="mission-request-table">
<thead>
  <tr>
    <td>Name</td>
    <td>Agency</td>
    <td>Title</td>   
    <td>How find af</td>
    <td>Action</td>
  </tr>
</thead>
<tbody>
  <?php foreach ($requesters as $requester): ?>
  <?php if($requester->getPersonId()):?>
    <?php $person_id = $requester->getPersonId()?>
  <?php endif;?>
  <?php if($person_id):?>
        <?php $person  = PersonPeer::retrieveByPK($person_id);?>
  <?php endif;?>
  <?php $agency = AgencyPeer::retrieveByPK($requester->getAgencyId())?>
  <?php if(isset($agency)):?>
        <?php $a_name = $agency->getName();?>
  <?php endif;?>
  <tr>
    <td class="cell-1">
        <?php if(isset($person)):?><?php echo $person->getFirstName().' '.$person->getLastName()?><?php endif;?>
    </td>
    
    <td class="cell-1">
    <?php if(isset($a_name)):?>
          <?php echo $a_name?>
    <?php else:?>
    --
    <?php endif;?>
    </td>
    
    <td class="cell-1">
     <?php if($requester->getTitle()):?>
          <?php echo $requester->getTitle();?>
    <?php else:?>
     --
    <?php endif;?>
    </td> 
    
    
    <td class="cell-1">
     <?php if($requester->getHowFindAF()):?>
          <?php echo $requester->getHowFindAF();?>
     <?php endif;?>
    </td>
    <td class="cell-1">
        <?php if ($sf_user->hasCredential(array('Administrator','Staff','Coordinator'), false)):?><a class="link-edit" href="<?php echo url_for('@requester_edit?id='.$requester->getId())?>">edit</a><?php endif;?>
        <?php if ($sf_user->hasCredential(array('Administrator','Staff'), false)):?><?php echo link_to('remove', '@requester_delete?id='.$requester->getId(), array('method' => 'delete', 'confirm' => 'Are you sure to remove and related information?', 'class' => 'action-remove'));?><?php endif;?>
        <br/>
        <?php if(isset($can_use)):?>
            <?php if($can_use == 1 && $mission_for):?>
                   <?php if ($sf_user->hasCredential(array('Administrator','Staff','Coordinator'), false)):?>
                <?php echo link_to('Use this requester ', '@default?module=requester&action=change&for='.$mission_for->getId().'&use_id='.$requester->getId(), array('class' => 'link-add'));?>
                      <?php endif;?>
            <?php endif;?>
        <?php endif;?>
    </td>
  </tr>
  <?php endforeach;?>
</tbody>
</table>

<div class="pager">
  Requester per page:
  <?php foreach ($max_array as $i => $v) {
    if ($i) echo ' | ';
    echo link_to_if($max != $v, $v, '@default_index?module=requester&max='.$v);
  }?>
  <div>
    <form action="<?php echo url_for('@default_index?module=requester')?>">
      <?php if (isset($mission_for)){
        $url_add = '&mission_for='.$mission_for->getId()?>
        <input type="hidden" name="mission_for" value="<?php echo $mission_for->getId()?>"/>
      <?php }else $url_add = ''?>

      <?php echo link_to('Previous', '@default_index?module=requester&page='.$pager->getPreviousPage().$url_add, array('class' => 'btn-pager-prev'))?>
      <input type="text" name="page" class="active-page" value="<?php echo $pager->getPage()?>"/>
      <strong>of <?php echo link_to($pager->getLastPage(), '@default_index?module=requester&page='.$pager->getLastPage().$url_add)?></strong>
      <?php echo link_to('Next', '@default_index?module=requester&page='.$pager->getNextPage().$url_add, array('class' => 'btn-pager-next'))?>
      <input type="submit" class="hide"/>
    </form>
  </div>
</div>
<?php }?>
