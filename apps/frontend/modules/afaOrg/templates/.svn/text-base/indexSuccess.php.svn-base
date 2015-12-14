<h2>Linking Organization List</h2>
<?php if ($sf_user->hasCredential(array('Administrator'), false)) { ?>
    <a href="<?php echo url_for('afaOrg/update') ?>">Add Linking Organization</a>
<?php } ?>

<div class="missions-available">
  <form id="filter_form" method="post" action="<?php echo url_for('@default_index?module=afaOrg')?>">
    <input type="hidden" name="filter" value="1"/>
    <div class="missions-available-filter">
      <div class="bg">
        <div class="characteristic_clean">
          <div class="holder">
            <div>
              <label for="ff_name">Name</label>
              <input type="text" class="text" value="<?php echo $name?>" id="ff_name" name="name"/>
              <br clear="left"/>
              <label for="ff_phone">Phone</label>
              <input type="text" class="text" value="<?php echo $phone?>" id="ff_phone" name="phone"/>
            </div>
            <div>
              <label for="ff_fax">Fax Phone</label>
              <input type="text" class="text" value="<?php echo $fax ?>" id="ff_fax" name="fax"/>
            </div>
          </div>
          <input type="submit" value="Find"/>
          <?php echo link_to('reset', '@default_index?module=afaorg&filter=1')?>
        </div>
      </div>
    </div>
  </form>
</div>
  
<?php if ( isset($pager) && $pager->getNbResults()) {?>
<div class="pager">
  Afa Org per page:
  <?php foreach ($max_array as $i => $v) {
    if ($i) echo ' | ';
    echo link_to_if($max != $v, $v, '@default_index?module=afaOrg&max='.$v);
  }?>
  <div>
    <form action="<?php echo url_for('@default_index?module=afaOrg')?>">
      <?php echo link_to('Previous', '@default_index?module=afaOrg&page='.$pager->getPreviousPage(), array('class' => 'btn-pager-prev'))?>
      <input type="text" name="page" class="active-page" value="<?php echo $pager->getPage()?>"/>
      <strong>of <?php echo link_to($pager->getLastPage(), '@default_index?module=afaOrg&page='.$pager->getLastPage())?></strong>
      <?php echo link_to('Next', '@default_index?module=afaOrg&page='.$pager->getNextPage(), array('class' => 'btn-pager-next'))?>
      <input type="submit" class="hide"/>
    </form>
  </div>
</div>
<br/>


<table class="mission-request-table">
<thead>
  <tr>
    <td>Name</td>
    <td>Org phone</td>
    <td>Org fax</td>
    <td>Action</td>
  </tr>
</thead>
<tbody>
  <?php foreach ($afaorgs as $afaorg): ?>
  <tr>
    <td class="cell-1">
        <?php if($afaorg->getName()):?><?php echo $afaorg->getName()?><?php endif;?>
    </td>
    <td class="cell-1">
        <?php if($afaorg->getOrgPhone()):?><?php echo $afaorg->getOrgPhone()?><?php endif;?>
    </td>
    <td class="cell-1">
        <?php if($afaorg->getOrgFax()):?><?php echo $afaorg->getOrgFax()?><?php endif;?>
    </td>
    <td class="cell-1">
        <?php if ($sf_user->hasCredential(array('Administrator'), false)) {?><a class="link-edit" href="<?php echo url_for('@afaOrg_edit?id='.$afaorg->getId())?>">edit</a><?php } ?>      
     
    </td>
  </tr>
  <?php endforeach;?>
</tbody>
</table>

<div class="pager">
  Afa Org per page:
  <?php foreach ($max_array as $i => $v) {
    if ($i) echo ' | ';
    echo link_to_if($max != $v, $v, '@default_index?module=afaOrg&max='.$v);
  }?>
  <div>
    <form action="<?php echo url_for('@default_index?module=afaOrg')?>">
      <?php echo link_to('Previous', '@default_index?module=afaOrg&page='.$pager->getPreviousPage(), array('class' => 'btn-pager-prev'))?>
      <input type="text" name="page" class="active-page" value="<?php echo $pager->getPage()?>"/>
      <strong>of <?php echo link_to($pager->getLastPage(), '@default_index?module=afaOrg&page='.$pager->getLastPage())?></strong>
      <?php echo link_to('Next', '@default_index?module=afaOrg&page='.$pager->getNextPage(), array('class' => 'btn-pager-next'))?>
      <input type="submit" class="hide"/>
    </form>
  </div>
</div>
<?php }?>