<ul>
<?php foreach ($persons as $person):?>
  <li id="<?php echo 'person_'.$person->getId()?>"><?php echo str_ireplace($keyword,'<b>'.$keyword.'</b>', $person->getLastName())?></li>
  <!--<input type="hidden" name="person_id" value="<?php //echo $person->getId()?>"/>-->
<?php endforeach;?>
</ul>