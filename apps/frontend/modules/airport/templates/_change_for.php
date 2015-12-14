<div class="intro_box">
<?php  $member = $pilot_for->getMember()?>
  How to specify the Airport for "<?php echo $member->getPerson()->getName()?>"
  OR <?php echo link_to('click here', $cancel_route)?> to cancel specifying
  <ol>
    <li>Search for a airport</li>
    <li>Click "Use this Airport" link</li>
  </ol>
</div>