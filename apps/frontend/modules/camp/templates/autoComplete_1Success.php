<ul>
<?php foreach ($camps as $camp):?>
  <li id="<?php echo 'camp_'.$camp->getId()?>"><?php echo $camp->getCampName();?></li>
  <input type="hidden" name="camp_id" value="<?php echo $camp->getId()?>"/>
<?php endforeach;?>
</ul>