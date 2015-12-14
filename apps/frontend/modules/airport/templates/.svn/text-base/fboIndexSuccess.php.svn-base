<?php use_helper('Form');?>

<div class="person-view"> 
<h2>FBO List</h2>
<br/>
<?php if ($sf_user->hasCredential(array('Administrator','Staff','Coordinator','Volunteer'), false)){?>
  <a href="<?php echo url_for('fbo/create') ?>">Add fbo</a>
<?php }?>
  <!--  Search companion-->

    <form id="filter_form" method="post" action="<?php echo url_for('@default_index?module=fbo')?>">
    <input type="hidden" name="filter" value="1"/>
    <fieldset>
      <div class="missions-available-filter">
        <div class="bg">
          <div class="characteristic_clean">
            <div class="holder">
              <div>
                <label for="ff_fbo_name">FBO Name</label>
                <input type="text" class="text" value="<?php echo $fbo_name?>" id="ff_fbo_name" name="fbo_name"/>
                <br clear="left"/>
                <label for="ff_discount">Fuel Discount</label>
                <input type="text" class="text" value="<?php echo $discount?>" id="ff_discount" name="discount"/>
              </div>
               <div>
                <label for="ff_ident">Identifier</label>
                <input type="text" class="text" value="<?php echo $ident?>" id="ff_ident" name="ident"/>
                <br clear="left"/>
                <label for="ff_name">Name</label>
                  <input type="text" class="text" value="<?php echo $name?>" id="ff_name" name="name"/>
              </div>
                <div>
                <label for="ff_city">City</label>
                  <input type="text" class="text" value="<?php echo $city?>" id="ff_city" name="city"/>
                <br clear="left"/>
                <label for="ff_state">State</label>
                  <input type="text" class="text" value="<?php echo $state?>" id="ff_state" name="state"/>
              </div>
            </div>
            <input type="submit" value="Find"/>
            <?php echo link_to('reset', '@default_index?module=fbo&filter=1')?>
          </div>
          <input type="submit" class="hide" value="submit"/>
        </div>
      </div>
    </fieldset>
  </form>
</div>

  <?php if ( isset($pager) && $pager->getNbResults()) {?>
<div class="pager">
  FBO per page:
  <?php foreach ($max_array as $i => $v) {
    if ($i) echo ' | ';
    echo link_to_if($max != $v, $v, '@default_index?module=fbo&max='.$v);
  }?>
  <div>
    <form action="<?php echo url_for('@default_index?module=fbo')?>">
      <?php echo link_to('Previous', '@default_index?module=fbo&page='.$pager->getPreviousPage(), array('class' => 'btn-pager-prev'))?>
      <input type="text" name="page" class="active-page" value="<?php echo $pager->getPage()?>"/>
      <strong>of <?php echo link_to($pager->getLastPage(), '@default_index?module=fbo&page='.$pager->getLastPage())?></strong>
      <?php echo link_to('Next', '@default_index?module=fbo&page='.$pager->getNextPage(), array('class' => 'btn-pager-next'))?>
      <input type="submit" class="hide"/>
    </form>
  </div>
</div>
<br/>


<table class="mission-request-table">
<thead>
  <tr>
    <td>Airport</td>
    <td>Name</td>
    <td>Address</td>
    <td>Voice Phone</td>
    <td>Fax phone</td>
    <td>Fuel Discount</td>
    <td>Action</td>
  </tr>
</thead>
<tbody>
  <?php foreach ($fbos as $fbo): ?>
  <?php $airport_id = $fbo->getAirportId()?>
  
  <?php if($airport_id):?>
      <?php $airport = AirportPeer::retrieveByPK($airport_id)?>
  <?php endif;?>
  
  <tr>
    <td class="cell-1">
        <?php if(isset($airport)):?><?php echo $airport->getIdent()?><?php endif;?>
    </td>
    <td class="cell-1">
        <?php if($fbo->getName()):?><?php echo $fbo->getName()?><?php endif;?>
    </td>
    <td class="cell-1">
        <?php if($fbo->getAddress()):?><?php echo $fbo->getAddress()?><?php endif;?>
    </td>
     <td class="cell-1">
        <?php if($fbo->getVoicePhone()):?><?php echo $fbo->getVoicePhone()?><?php endif;?>
    </td>
    <td class="cell-1">
        <?php if($fbo->getFaxPhone()):?><?php echo $fbo->getFaxPhone()?><?php endif;?>
    </td>
    <td class="cell-1">
        <?php if($fbo->getFuelDiscount()):?>
            <?php echo number_format($fbo->getFuelDiscount(),2)?>
        <?php endif;?>
    <td class="cell-1">
     <?php if ($sf_user->hasCredential(array('Administrator','Staff','Coordinator','Volunteer'), false)):?>
        <a class="link-edit" href="<?php echo url_for('@fbo_edit?id='.$fbo->getId())?>">edit</a>
      <?php endif;?>
      <?php if ($sf_user->hasCredential(array('Administrator','Staff'), false)):?>
        <?php echo link_to('remove', '@fbo_delete?id='.$fbo->getId(), array('method' => 'delete', 'confirm' => 'Are you sure to remove '.$airport->getName().' and related information?', 'class' => 'action-remove'));?>
      <?php endif;?>
    </td>
  </tr>
  <?php endforeach;?>
</tbody>
</table>

<div class="pager">
  FBO per page:
  <?php foreach ($max_array as $i => $v) {
    if ($i) echo ' | ';
    echo link_to_if($max != $v, $v, '@default_index?module=fbo&max='.$v);
  }?>
  <div>
    <form action="<?php echo url_for('@default_index?module=fbo')?>">
      <?php echo link_to('Previous', '@default_index?module=fbo&page='.$pager->getPreviousPage(), array('class' => 'btn-pager-prev'))?>
      <input type="text" name="page" class="active-page" value="<?php echo $pager->getPage()?>"/>
      <strong>of <?php echo link_to($pager->getLastPage(), '@default_index?module=fbo&page='.$pager->getLastPage())?></strong>
      <?php echo link_to('Next', '@default_index?module=fbo&page='.$pager->getNextPage(), array('class' => 'btn-pager-next'))?>
      <input type="submit" class="hide"/>
    </form>
  </div>
</div>
<?php }?>

