<?php use_helper('Form');?>

<h2>Camp List</h2>
<?php if ($sf_user->hasCredential(array('Administrator','Staff','Coordinator'), false)) { ?>
    <a href="<?php echo url_for('camp/update') ?>">Add Camp</a>
<?php } ?>
  <div class="missions-available">
    <form id="filter_form" method="post" action="<?php echo url_for('@default_index?module=camp')?>">
      <input type="hidden" name="filter" value="1"/>
      <div class="missions-available-filter">
        <div class="bg">
          <div class="characteristic_clean">
            <div class="holder">
              <div>
                <label for="ff_camp_name">Camp Name</label>
                <input type="text" class="text" value="<?php echo $camp_name?>" id="ff_camp_name" name="camp_name"/>
                <br clear="left"/>
                <label for="ff_agency_name">Agency Name</label>
                <input type="text" class="text" value="<?php echo $agency_name?>" id="ff_agency_name" name="agency_name"/>
              </div>
               <div>
                <label for="ff_agency_city">Agency City</label>
                <input type="text" class="text" value="<?php echo $agency_city?>" id="ff_agency_city" name="agency_city"/>
                <br clear="left"/>
                <label for="ff_agency_state">Agency State</label>
                 <input type="text" class="text" value="<?php echo $agency_state?>" id="ff_agency_state" name="agency_state"/>
              </div>
               <div>
                <label for="ff_agency_country">Agency Country</label>
                 <?php echo select_tag('agency_country', options_for_select($countries, $agency_country, array('include_custom' => '- any -')), array('id' => 'ff_agency_country','class'=>'text narrow'))?>
                <br clear="left"/>
                <label for="ff_airport_ident">Airport Ident</label>
                <input type="text" class="text" value="<?php echo $airport_ident?>" id="ff_airport_ident" name="airport_ident"/>
              </div>
               <div>
                <label for="ff_airport_city">Airport City</label>
                <input type="text" class="text" value="<?php echo $airport_city?>" id="ff_airport_city" name="airport_city"/>
                <br clear="left"/>
                <label for="ff_airport_state">Airport State</label>
                <input type="text" class="text" value="<?php echo $airport_state?>" id="ff_airport_state" name="airport_state"/>
              </div>
            </div>
            <input type="submit" value="Find"/>
            <?php echo link_to('reset', '@default_index?module=camp&filter=1')?>
          </div>
          <input type="submit" class="hide" value="submit"/>
        </div>
      </div>
    </form>
  </div>
  
  
    <?php if ( isset($pager) && $pager->getNbResults()) {?>
<div class="pager">
  Camp per page:
  <?php foreach ($max_array as $i => $v) {
    if ($i) echo ' | ';
    echo link_to_if($max != $v, $v, '@default_index?module=camp&max='.$v);
  }?>
  <div>
    <form action="<?php echo url_for('@default_index?module=camp')?>">
      <?php echo link_to('Previous', '@default_index?module=camp&page='.$pager->getPreviousPage(), array('class' => 'btn-pager-prev'))?>
      <input type="text" name="page" class="active-page" value="<?php echo $pager->getPage()?>"/>
      <strong>of <?php echo link_to($pager->getLastPage(), '@default_index?module=camp&page='.$pager->getLastPage())?></strong>
      <?php echo link_to('Next', '@default_index?module=camp&page='.$pager->getNextPage(), array('class' => 'btn-pager-next'))?>
      <input type="submit" class="hide"/>
    </form>
  </div>
</div>
<br/>


<table class="mission-request-table">
<thead>
  <tr>
    <td>Camp name</td>
    <td>Agency</td>
    <td>Agency Location</td>
    <td>Airport Ident</td>
    <td>Airport Location</td>
    <td>Arrival date</td>
    <td>Departure date</td>
    <td>Action</td>
  </tr>
</thead>
<tbody>
  <?php foreach ($camps as $camp): ?>
  
  <?php $agency_id = $camp->getAgencyId();?>
  <?php if($agency_id):?>
      <?php $agency = AgencyPeer::retrieveByPK($agency_id) ?>
  <?php endif;?>
  
  <?php $airport_id = $camp->getAirportId();?>
  <?php if($airport_id):?>
      <?php $airport =AirportPeer::retrieveByPK($airport_id) ?>
  <?php endif;?>
  
  <tr>
    <td class="cell-1">
        <?php if($camp->getCampName()):?><?php echo $camp->getCampName()?><?php endif;?>
    </td>
    <td class="cell-2">
        <?php if(isset($agency)):?><?php echo $agency->getName()?><?php endif;?>
    </td>
    <td class="cell-3">
    <?php if(isset($agency)):?>
     <div class="name-list">
        <dl>
          <?php if ($agency->getCity()) {?>
          <dt>City:</dt>
          <dd><?php echo $agency->getCity()?></dd>
          <?php }?>
          <?php if ($agency->getState()) {?>
          <dt>State:</dt>
          <dd><?php echo $agency->getState()?></dd>
          <?php }?>
          <?php if ($agency->getCountry()) {?>
          <dt>Country:</dt>
          <dd><?php echo $agency->getCountry()?></dd>
          <?php }?>
          <dt></dt>
        </dl>
      </div>
      <?php endif;?>
    </td>
   <td class="cell-4">
        <?php if(isset($airport)):?><?php echo $airport->getIdent()?><?php endif;?>
    </td>
     <td>
      <?php if(isset($airport)):?>
      <div class="name-list">
        <dl>
          <?php if ($airport->getCity()) {?>
          <dt>City:</dt>
          <dd><?php echo $airport->getCity()?></dd>
          <?php }?>
          <?php if ($airport->getState()) {?>
          <dt>State:</dt>
          <dd><?php echo $airport->getState()?></dd>
          <?php }?>
          <dt></dt>
        </dl>
      </div>
     <?php endif;?>
    </td>
    <td class="cell-1">
        <?php if($camp->getArrivalDate()):?><?php echo $camp->getArrivalDate()?><?php endif;?>
    </td>
    <td class="cell-1">
        <?php if($camp->getDepartureDate()):?><?php echo $camp->getDepartureDate()?><?php endif;?>
    </td>
    <td class="cell-1">
        <?php if ($sf_user->hasCredential(array('Administrator','Staff','Pilot','Coordinator','Volunteer'), false)):?><a class="link-view" href="<?php echo url_for('camp/view?id='.$camp->getId())?>">view</a><?php endif?>
        <?php  if ($sf_user->hasCredential(array('Administrator','Staff','Coordinator'), false)):?><a class="link-edit" href="<?php echo url_for('@camp_edit?id='.$camp->getId())?>">edit</a><?php endif;?>
        <?php if ($sf_user->hasCredential(array('Administrator','Staff'), false)):?><?php echo link_to('remove', '@camp_delete?id='.$camp->getId(), array('method' => 'delete', 'confirm' => 'Are you sure to remove '.$camp->getCampName().' and related information?', 'class' => 'action-remove'));?><?php endif;?>
        <?php if ($sf_user->hasCredential(array('Administrator','Staff','Coordinator'), false)):?><a class="link-view" href="<?php echo url_for('@camp_pilot_match?id='.$camp->getId())?>">match</a><?php endif;?>
    </td>
  </tr>
  <?php endforeach;?>
</tbody>
</table>

<div class="pager">
  Camp per page:
  <?php foreach ($max_array as $i => $v) {
    if ($i) echo ' | ';
    echo link_to_if($max != $v, $v, '@default_index?module=camp&max='.$v);
  }?>
  <div>
    <form action="<?php echo url_for('@default_index?module=camp')?>">
      <?php echo link_to('Previous', '@default_index?module=camp&page='.$pager->getPreviousPage(), array('class' => 'btn-pager-prev'))?>
      <input type="text" name="page" class="active-page" value="<?php echo $pager->getPage()?>"/>
      <strong>of <?php echo link_to($pager->getLastPage(), '@default_index?module=camp&page='.$pager->getLastPage())?></strong>
      <?php echo link_to('Next', '@default_index?module=camp&page='.$pager->getNextPage(), array('class' => 'btn-pager-next'))?>
      <input type="submit" class="hide"/>
    </form>
  </div>
</div>
<?php }?>

  