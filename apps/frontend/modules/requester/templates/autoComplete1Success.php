<ul>
<?php foreach ($requesters as $requester):?>
  <?php
  $person = $requester->getPerson();
  $agency = $requester->getAgency();
  $str = $person->getName();
  if ($agency->getName()) $str .= ', '.$agency->getName();
  if ($requester->getTitle()) $str .= ', '.$requester->getTitle();
  ?>
  <li id="<?php echo 'requester_'.$requester->getId()?>">
    <?php echo str_ireplace($name, '<b>'.$name.'</b>', $str)?>
  </li>
<?php endforeach;?>
</ul>