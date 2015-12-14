<?php use_helper('Form');?>

<div class="person-view"> 
<h2>Airport List</h2>
<br/>
<?php if ($sf_user->hasCredential(array('Administrator'), false)) { ?>
  <a href="<?php echo url_for('airport/update') ?>">Add airport</a>
<?php }?>
  <!--  Search companion-->
    <form id="filter_form" method="post" action="<?php echo url_for('@default_index?module=airport')?>">
    <input type="hidden" name="filter" value="1"/>
    <?php if (isset($pilot_for)){?><input type="hidden" name="change_id" value="<?php echo $pilot_for->getId()?>"/><?php }?>
    <fieldset>
      <div class="missions-available-filter">
        <div class="bg">
          <div class="characteristic_clean">
            <div class="holder">
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
                <div>
                <label for="ff_wing_name">Wing Name</label>
                  <?php echo select_tag('wing_name', options_for_select($wings, $wing_name, array('include_custom' => '- any -')), array('id' => 'ff_wing_name','class'=>'text narrow'))?>
                <br clear="left"/>
                <label for="ff_closed">Include Closed</label>
                  <input type="checkbox" id="ff_closed" value="1" <?php if ($closed) echo 'checked="checked"'?> name="closed"/>
              </div>
            </div>
            <input type="submit" value="Find"/>
            <?php echo link_to('reset', '@default_index?module=airport&filter=1')?>
          </div>
          <input type="submit" class="hide" value="submit"/>
        </div>
      </div>
    </fieldset>
  </form>
</div>
  <?php if ( isset($pager) && $pager->getNbResults()) {?>
    <?php if (isset($pilot_for)) include_partial('airport/change_for', array('pilot_for' => $pilot_for, 'cancel_route' => '@default_index?module=airport'))?>
<div class="pager">
  Airport per page:
  <?php foreach ($max_array as $i => $v) {
    if ($i) echo ' | ';
    echo link_to_if($max != $v, $v, '@default_index?module=airport&max='.$v);
  }?>
  <div>
    <form action="<?php echo url_for('@default_index?module=airport')?>">
      <?php if (isset($pilot_for)){
        $url_add = '&pilot_for='.$pilot_for->getId()?>
        <input type="hidden" name="pilot_for" value="<?php echo $pilot_for->getId()?>"/>
      <?php }else $url_add = ''?>
      
      <?php echo link_to('Previous', '@default_index?module=airport&page='.$pager->getPreviousPage().$url_add, array('class' => 'btn-pager-prev'))?>
      <input type="text" name="page" class="active-page" value="<?php echo $pager->getPage()?>"/>
      <strong>of <?php echo link_to($pager->getLastPage(), '@default_index?module=airport&page='.$pager->getLastPage().$url_add)?></strong>
      <?php echo link_to('Next', '@default_index?module=airport&page='.$pager->getNextPage().$url_add, array('class' => 'btn-pager-next'))?>
      <input type="submit" class="hide"/>
    </form>
  </div>
</div>
<br/>

<table class="mission-request-table">
<thead>
  <tr>
    <td>Ident</td>
    <td>Name</td>
    <td>City</td>
    <td>State</td>
    <td>Wing</td>
    <td>Closed</td>
    <td>FBO</td>   
    <td>Action</td>
   
  </tr>
</thead>
<tbody>
  <?php foreach ($airports as $airport): ?>
  <?php $wing_id = $airport->getWingId()?>
  
  <?php if($wing_id):?>
      <?php $wing = WingPeer::retrieveByPK($wing_id)?>
  <?php endif;?>
  
  <tr>
    <td class="cell-1">
        <?php if($airport->getIdent()):?><?php echo $airport->getIdent()?><?php endif;?>
    </td>
    <td class="cell-1">
        <?php if($airport->getName()):?><?php echo $airport->getName()?><?php endif;?>
    </td>
     <td class="cell-1">
        <?php if($airport->getCity()):?><?php echo $airport->getCity()?><?php endif;?>
    </td>
    <td class="cell-1">
        <?php if($airport->getState()):?><?php echo $airport->getState()?><?php endif;?>
    </td>
    <td class="cell-1">
        <?php if(isset($wing)):?><?php echo $wing->getName()?><?php endif;?>
    </td>
    <td class="cell-1">
        <?php if($airport->getClosed()):?>
            <?php if($airport->getClosed() == 1):?>
            yes
            <?php else:?>
            no
            <?php endif;?>
        <?php endif;?>
    </td>
    <td class="cell-1">
       <?php if(count($airport->getFbos())>0):?>
       <?php echo link_to(count($airport->getFbos()), '@fbo?aport='.$airport->getIdent());?>
       <?php else:?>
        0
       <?php endif;?>
    </td>
   
    <td class="cell-1">
     <?php if ($sf_user->hasCredential(array('Administrator'), false)) { ?>
        <a class="link-edit" href="<?php echo url_for('@airport_edit?id='.$airport->getId())?>">edit</a>
      <?php } ?>
     
      <?php if(isset($can_use)):?>
        <?php if($can_use == '1' && $pilot_for):?>
               <?php if ($sf_user->hasCredential(array('Administrator'), false)){?>
            <?php echo link_to('Use this airport ', '@default?module=airport&action=changeAirport&for='.$pilot_for->getId().'&use_id='.$airport->getId(), array('class' => 'link-add'));?>
                  <?php } ?>
        <?php endif;?>
      <?php endif;?>
    </td>    
  </tr>
  <?php endforeach;?>
</tbody>
</table>

<div class="pager">
  Airport per page:
  <?php foreach ($max_array as $i => $v) {
    if ($i) echo ' | ';
    echo link_to_if($max != $v, $v, '@default_index?module=airport&max='.$v);
  }?>
  <div>
    <form action="<?php echo url_for('@default_index?module=airport')?>">
      <?php if (isset($pilot_for)){
        $url_add = '&pilot_for='.$pilot_for->getId()?>
        <input type="hidden" name="pilot_for" value="<?php echo $pilot_for->getId()?>"/>
      <?php }else $url_add = ''?>

      <?php echo link_to('Previous', '@default_index?module=airport&page='.$pager->getPreviousPage().$url_add, array('class' => 'btn-pager-prev'))?>
      <input type="text" name="page" class="active-page" value="<?php echo $pager->getPage()?>"/>
      <strong>of <?php echo link_to($pager->getLastPage(), '@default_index?module=airport&page='.$pager->getLastPage().$url_add)?></strong>
      <?php echo link_to('Next', '@default_index?module=airport&page='.$pager->getNextPage().$url_add, array('class' => 'btn-pager-next'))?>
      <input type="submit" class="hide"/>
    </form>
  </div>
</div>
<?php }?>

