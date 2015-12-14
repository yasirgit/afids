<div class="priority-list">
  <h2>Your recent notification</h2>
  <div class="frame">
        <?php if ($sf_user->hasCredential(array('Administrator','Staff','Coordinator','Volunteer'), false)){ ?>
            <?php if($mid==5) { ?>
            <h3>Newest Person</h3>
             <ul>
                    <?php
                    $i=0;
                    foreach($newperson as $key=>$not)
                    {
                             if($i%2==0)
                            {
                            ?>
                                    <li>
                                    <img alt="ico" src="/images/ico-priority-list-1.png">
                                    <a href="<?php echo '/person/view/'.$not->getId();?>" target="_blank"><?php echo $not->getFirstName()." ".$not->getLastName();?></a></li>
                            <?php
                            }
                            else
                            {?>
                                    <li class="alt">
                                    <img alt="ico" src="/images/ico-priority-list-2.png">
                                    <a href="<?php echo '/person/view/'.$not->getId();?>" target="_blank"><?php echo $not->getFirstName()." ".$not->getLastName();?></a></li>
                            <?php
                            }

                            $i++;
                    }
                    ?>

             </ul>
            <?php } ?>
       <?php } ?>
       <?php if ($sf_user->hasCredential(array('Pilot'), false)){ ?>
            <ul>           
                <li>
                    <img alt="ico" src="/images/ico-priority-list-2.png">
                    <p>You have total  <a href="/dashboard/pilotRequestAcceptedView" ><?php echo $totalAccepted; ?> accepted</a>  mission. </p>
                </li>
                <li>
                    <img alt="ico" src="/images/ico-priority-list-2.png">
                    <p>You have total  <a href="/dashboard/pilotRequestDeclinedView" ><?php echo $totaldeclined; ?> not accepted</a> mission. </p>
                </li>            
                <li>
                    <img alt="ico" src="/images/ico-priority-list-2.png">
                    <p>You have total  <a href="/dashboard/pilotMissionLegCancellationView" ><?php echo $totalMissionCancellation; ?> mission</a> cancellation. </p>
                </li>
                <li>
                    <img alt="ico" src="/images/ico-priority-list-2.png">
                    <p>You signed up total  <a href="/dashboard/pilotSignupEventDetail" ><?php echo $totalSignupEvents; ?> Upcoming </a> events. </p>
                </li>
            </ul>
       <?php } ?>
            
  </div>
</div>
