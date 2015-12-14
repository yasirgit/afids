<h2>Event Details</h2>
<div class="person-view">
    <div class="person-info">
        <h3>Event information</h3>
        <dl class="person-data" style="width:700px">
          <dt>Event name: </dt>
          <dd><?php echo $event->getEventName(); ?></dd>
          <dt>Date:</dt>
          <dd><?php echo date('m-d-Y',strtotime($event->getEventDate('m/d/Y'))) ?></dd>
          <dt>Location:</dt>
          <dd><?php echo $event->getLocation(); ?></dd>
          <dt>Time:</dt>
          <dd><?php echo $event->getEventTime(); ?></dd>
          <dt>Contact:</dt>
          <dd><?php echo $event->getContactInfo(); ?></dd>
        </dl>
    </div>
</div>
<div class="person-view">
    <div class="person-info">
        <h3>Event description</h3>
        <dl class="person-data">
          <dd style="width:700px"><?php echo $event->getEventName(); ?></dd>
          <dd style="width:700px"><?php echo $event->getLongDesc(); ?></dd>
        </dl>
    </div>
</div>
<div class="person-view">
    <div class="person-info">
        <h3>Event reservation information</h3>
        <dl class="person-data">
         <?php
                //total seat seserved at system
                $totalperson = $event->getMaxPersons();

                //Sighup deadline date find out
                $lastsignupdate = date('mdY',strtotime($event->getSignupDeadline()));
                $signupdeadline = intval($lastsignupdate);

                //find out todays date
                $todaysdate = date('mdY');
                $today = intval($todaysdate);
          ?>
          <?php  if( $event->getOnsiteSignupOk() && $event->getOnlineReservation() ){  ?>
                <?php if( $totalperson > 0 && $signupdeadline >= $today ){?>
                  <dt>Online reservation: </dt>
                  <dd><?php echo "Available." ; ?></dd>

                  <dt>Signup deadline:</dt>
                  <dd><?php echo date('m-d-Y',strtotime($event->getSignupDeadline('m/d/Y'))); ?></dd>

            <?php } else { ?>
                         <dt>Online reservation: </dt>
                         <dd><?php echo "Not available." ; ?></dd>
            <?php } ?>  
         <?php } else { ?>
              <dt>Online reservation: </dt>
              <dd><?php echo "Not available." ; ?></dd>
         <?php } ?>

          <dt>Adults price :</dt>
          <dd><?php echo "$".$event->getAdultCost()." (adults) ." ;?></dd>

          <dt>Children price :</dt>
          <dd><?php echo "$".$event->getChildCost()."  (children)."; ?></dd>

          <dt>Adults price at door:</dt>
          <dd><?php echo "$".$event->getAdultDoorCost()."   (adults)."; ?></dd>

          <dt>Children price at door:</dt>
          <dd><?php echo "$".$event->getChildDoorCost()."  (children)."; ?></dd>
          

          <?php  if($event->getOnsiteSignupOk() && $event->getOnlineReservation()){  ?>                   
                    <?php if( $totalperson > 0 && $signupdeadline >= $today ){?>
          
                          <dt>Reservation available:</dt>
                          <dd><?php echo "Only "; echo $event->getMaxPersons() ? $event->getMaxPersons() : ' 0 ' ;echo " available."; ?></dd>

                          <dt>Event Signup :</dt>
                          <dd><ul class="status-list"> <li><a href="/eventReservation/eventSignup?id=<?php echo $event->getId(); ?>">Signup now</a></li></ul></dd>

                 <?php } else { ?>
                            <dt>Event Signup :</dt>
                            <dd>
                                <?php if( $totalperson <= 0 && $signupdeadline < $today ){?>
                                      Seats filled & deadline over .
                                <?php } elseif( $totalperson <= 0 && $signupdeadline > $today ) { ?>
                                      Seats filled .
                                <?php } elseif( $totalperson > 0 && $signupdeadline < $today ) { ?>
                                      Deadline over .
                                <?php } ?>
                            </dd>
                        </dl>
                 <?php } ?>
          <?php } else { ?>
                <dl>
                    <dt></dt>
                    <dd style="width:700px"><?php echo "If you are interested in attending - please notify  <b>".$event->getContactInfo()."</b>"; ?></dd>
                </dl>
         <?php } ?>        
    </div>
</div>