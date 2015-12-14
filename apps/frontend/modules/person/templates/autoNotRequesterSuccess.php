<ul>
  <?php foreach ($persons as $person):?>
  <li id="<?php echo 'person_'.$person->getId()?>">
    <?php echo str_replace($keyword, '<b>'.$keyword.'</b>', $person->getName())?>
  </li>
  <?php endforeach;?>
</ul>