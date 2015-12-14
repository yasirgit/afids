<div class="intro_box">
<?php $member = $coor_for->getMember();?>
<?php if(isset($member)):?><?php $person = PersonPeer::retrieveByPK($member->getPersonId())?><?php endif;?>
  How to specify the Lead Coordinator for "<?php if(isset($person)):?><?php echo $person->getName()?><?php endif;?>"
  OR <?php echo link_to('click here', $cancel_route)?> to cancel specifying
  <ol>
    <li>Search for a coordinator</li>
    <li>View detailed coordinator information</li>
    <li>Click "Make this record a lead Coordinator" link</li>
  </ol>
</div>