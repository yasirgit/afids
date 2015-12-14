<ul>
<?php foreach ($requesters as $requester):?>
  <?php if(isset($requester)):?>
      <?php $person = $requester->getPerson();?>
  <?php endif?>
  <li id="<?php echo $person->getLastName()?>" value="<?php echo $person->getId()?>"><?php echo str_replace($keyword,'<b>'.$keyword.'</b>', $person->getLastName().','.$person->getFirstName().','.$person->getState().','.$person->getZipcode())?></li>
<?php endforeach;?>
</ul>