<?php use_helper('Javascript', 'Form', 'jQuery', 'Object', 'Global') ?>

<!-- sort and pagination-->
<?php if ($pager->getNbResults()) {?>
<?php $action ='/dashboard/'.$url; ?>
<fieldset>
  <div class="sort">    
    <div class="pager">
      <form action="<?php echo url_for($action)?>">
        <input type="hidden" name="filter" value="true">
        <?php echo link_to('Previous', $action.'/page/'.$pager->getPreviousPage().'/filter/true', array('class' => 'btn-pager-prev'))?>
        <input type="text" name="page" class="active-page" value="<?php echo $pager->getPage()?>"/>
        <strong>of <?php echo link_to($pager->getLastPage(), $action.'/page/'.$pager->getLastPage().'/filter/true')?></strong>
        <?php echo link_to('Next', $action.'/page/'.$pager->getNextPage().'/filter/true', array('class' => 'btn-pager-next'))?>
        <input type="submit" class="hide"/>
      </form>      
    </div>
  </div>
  <input class="hide" type="submit" value="submit"/>
</fieldset>
<?php }?>