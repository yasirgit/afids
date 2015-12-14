<ul>
<?php foreach ($persons as $person):?>
  <li id="<?php echo 'personpass_'.$person->getId()?>">
          <?php echo str_ireplace($keyword,'<b>'.$keyword.'</b>', $person->getLastName())?>
  </li>
  <input type="hidden" name="personid" value="<?php echo $person->getId()?>"/>
<?php endforeach;?>
</ul>