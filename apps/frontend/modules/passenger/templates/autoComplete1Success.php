<ul>
  <?php foreach ($passengers as $passenger):?>
  <li id="<?php echo 'passenger_'.$passenger->getId()?>">
          <?php echo str_replace("'","\"",str_ireplace($name,'<b>'.$name.'</b>', $passenger->getPerson()->getName() ));?>
  </li>
  <?php endforeach;?>
</ul>