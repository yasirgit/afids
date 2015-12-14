<ul id="test">
<?php foreach ($passengers as $passenger):?>
  <?php if(isset($passenger)):?>
    <?php $person = PersonPeer::retrieveByPK($passenger->getPersonId());?>
    <?php if(isset($fname) && isset($person) && $person instanceof Person):?>
        <li id="<?php echo $person->getId()?>" value="<?php echo $person->getId()?>"><?php echo str_replace($fname_keyword,'<b>'.$fname_keyword.'</b>', $person->getFirstName())?></li>
        <?php if($passenger->getPersonId()):?><input type="hidden" value="<?php echo $passenger->getPersonId() ?>" id="fname" name="fname"/><?php endif?>
    <?php elseif(isset($lname) && isset($person) && $person instanceof Person):?>
        <li id="<?php echo $person->getId()?>" value="<?php echo $person->getId()?>"><?php echo str_replace($lname_keyword,'<b>'.$lname_keyword.'</b>', $person->getLastName())?></li>
        <?php if($passenger->getPersonId()):?><input type="hidden" value="<?php echo $passenger->getPersonId() ?>" id="lname" name="lname"/><?php endif?>
    <?php elseif(isset($pass) && isset($person) && $person instanceof Person):?>
      <li id="<?php echo $person->getLastName()?>" value="<?php echo $person->getId()?>"><?php echo str_replace($lname_keyword,'<b>'.$lname_keyword.'</b>', $person->getLastName().','.$person->getFirstName().','.$person->getState().','.$person->getZipcode())?></li>
    <?php endif?>
  <?php endif?>
<?php endforeach;?>
</ul>

