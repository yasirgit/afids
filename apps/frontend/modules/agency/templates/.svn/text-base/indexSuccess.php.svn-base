<?php use_helper('Form');?>

<h2>Agency List</h2>
<?php if ($sf_user->hasCredential(array('Administrator','Staff','Coordinator','Volunteer'), false)) {?>
    <a href="<?php echo url_for('agency/update') ?>">Add Agency</a>
<?php } ?>
<div class="missions-available">
  <form id="filter_form" method="post" action="<?php echo url_for('@default_index?module=agency')?>">
    <input type="hidden" name="filter" value="1"/>
    <div class="missions-available-filter">
      <div class="bg">
        <div class="characteristic_clean">
          <div class="holder">
            <div>
              <label for="ff_name">Name</label>
              <input type="text" class="text" value="<?php echo $name?>" id="ff_name" name="name"/>
              <br clear="left"/>
              <label for="ff_city">City</label>
              <input type="text" class="text" value="<?php echo $city?>" id="ff_city" name="city"/>
            </div>
             <div>
              <label for="ff_state">State</label>
              <input type="text" class="text" value="<?php echo $state?>" id="ff_state" name="state"/>
              <br clear="left"/>
              <label for="ff_coutry">Country</label>
              <?php echo select_tag('country', options_for_select($countries, $country, array('include_custom' => '- any -')), array('id' => 'ff_coutry','class'=>'text narrow'))?>
            </div>
          </div>
          <input type="submit" value="Find"/>
          <?php echo link_to('reset', '@default_index?module=agency&filter=1')?>
        </div>
        <input type="submit" class="hide" value="submit"/>
      </div>
    </div>
  </form>
</div>
  
  <?php if (isset($pager) && $pager->getNbResults()) {?>
<div class="pager">
  Agency per page:
  <?php foreach ($max_array as $i => $v) {
    if ($i) echo ' | ';
    echo link_to_if($max != $v, $v, '@default_index?module=agency&max='.$v);
  }?>
  <div>
    <form action="<?php echo url_for('@default_index?module=agency')?>">
      <?php echo link_to('Previous', '@default_index?module=agency&page='.$pager->getPreviousPage(), array('class' => 'btn-pager-prev'))?>
      <input type="text" name="page" class="active-page" value="<?php echo $pager->getPage()?>"/>
      <strong>of <?php echo link_to($pager->getLastPage(), '@default_index?module=agency&page='.$pager->getLastPage())?></strong>
      <?php echo link_to('Next', '@default_index?module=agency&page='.$pager->getNextPage(), array('class' => 'btn-pager-next'))?>
      <input type="submit" class="hide"/>
    </form>
  </div>
</div>
<br/>


<table class="mission-request-table">
<thead>
  <tr>
    <td>Name</td>
    <td>Address</td>
    <td>Location</td>
    <td>Contact</td>
    <td>Action</td>
  </tr>
</thead>
<tbody>
  <?php foreach ($agencies as $agency): ?>
  <tr>
    <td class="cell-1">
        <?php if($agency->getName()):?><?php echo $agency->getName()?><?php endif;?>
    </td>
    <td class="cell-2">
        <?php if($agency->getAddress1() || $agency->getAddress2()):?><?php echo $agency->getAddress1() .' '.$agency->getAddress2() ?><?php endif;?>
    </td>
    <td class="cell-3">
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
    </td>
     <td class="cell-4">
      <div class="name-list">
        <dl>
          <?php if ($agency->getPhone().$agency->getComment()) {?>
          <dt>Phone:</dt>
          <dd><?php echo $agency->getPhone().' <i>'.$agency->getComment().'</i>'?></dd>
          <?php }?>
          <?php if ($agency->getFaxPhone().$agency->getFaxComment()) {?>
          <dt>Fax Phone:</dt>
          <dd><?php echo $agency->getFaxPhone().' <i>'.$agency->getFaxComment().'</i>'?></dd>
          <?php }?>
          <dt></dt>
        </dl>
        <?php if ($agency->getEmail()) echo mail_to($agency->getEmail())?>
      </div>
    </td>
    <td class="cell-5">
     <ul class="action-list">
      <?php if ($sf_user->hasCredential(array('Administrator','Staff','Coordinator','Volunteer'), false)):?><li><a class="action-edit" href="<?php echo url_for('@agency_edit?id='.$agency->getId())?>">Edit</a></li><?php endif;?>
      <?php if ($sf_user->hasCredential(array('Administrator','Staff'), false)):?><li><a class="action-remove" href="<?php echo url_for('@agency_delete?id='.$agency->getId(),array('post' => true, 'confirm' => 'You need to delete Camp in first place!')); ?>">Remove</a></li><?php endif;?>
     </ul>
    </td>
  </tr>
  <?php endforeach;?>
</tbody>
</table>

<div class="pager">
  Agency per page:
  <?php foreach ($max_array as $i => $v) {
    if ($i) echo ' | ';
    echo link_to_if($max != $v, $v, '@default_index?module=agency&max='.$v);
  }?>
  <div>
    <form action="<?php echo url_for('@default_index?module=agency')?>">
      <?php echo link_to('Previous', '@default_index?module=agency&page='.$pager->getPreviousPage(), array('class' => 'btn-pager-prev'))?>
      <input type="text" name="page" class="active-page" value="<?php echo $pager->getPage()?>"/>
      <strong>of <?php echo link_to($pager->getLastPage(), '@default_index?module=agency&page='.$pager->getLastPage())?></strong>
      <?php echo link_to('Next', '@default_index?module=agency&page='.$pager->getNextPage(), array('class' => 'btn-pager-next'))?>
      <input type="submit" class="hide"/>
    </form>
  </div>
</div>
<?php }?>
