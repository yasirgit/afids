
<ul>
    <?php foreach ($passengers as $passenger):?>
  <li passengerid="<?php echo $passenger->getId();?>" firstname="<?php echo $passenger->getPerson ()->getFirstName ()?>" lastname="<?php echo $passenger->getPerson ()->getLastName()?>">
       <?php echo $passenger->getPerson ()->getFirstName ()?>
  </li>
    <?php endforeach;?>
</ul>