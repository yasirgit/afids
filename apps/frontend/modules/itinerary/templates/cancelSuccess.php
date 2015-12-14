<div id="action-cancel">
    <form id="persons_emails_form" method="post" action="<?php //echo url_for('missionLeg/sendLegEmail')?>">
        <input type="hidden" name="id" value="<?php echo $itinerary->getId();?>">
      <?php
            //echo input_hidden_tag('leg_id', $mission_leg->getId());           
           if($itinerary->getPassengerId()) $passenger = PassengerPeer::retrieveByPK($itinerary->getPassengerId());
           if($itinerary->getRequesterId()) $requester = RequesterPeer::retrieveByPK($itinerary->getRequesterId());
           if($itinerary->getAgencyId()) $agency = AgencyPeer::retrieveByPK($itinerary->getAgencyId());
       ?>
        <div class="passenger-form">
    <div class="box full">
        <div id="show-alert" style="display: none; color: red">please select emails checkbox for sending mail</div>
      <div class="wrap">
          <h1>Send To:</h1>
      </div>
      <div class="wrap">
          <div class="legemail_box">
              <div class="heading">Passenger : <?php if($itinerary->getPassengerId()) echo $passenger->getPerson()->getFirstName();?> <?php if($itinerary->getPassengerId()) echo $passenger->getPerson()->getLastName();?> </div>
              <div class="chbox">&nbsp;&nbsp;
                <input type="checkbox" <?php if(isset($passenger) && $passenger->getPerson() && $passenger->getPerson()->getEmail()): ?> value="<?php echo $passenger->getPerson()->getEmail();?>" class="mailable" <?php else: ?> disabled="disabled" <?php endif;?> name="passenger_mail" />
              </div>
              <div class="leglabel">Email: </div>
              <div class="leg_filed">
                  <?php if($itinerary->getPassengerId()) echo $passenger->getPerson()->getEmail();?>
              </div>
          </div>
          <div class="legemail_box">
              <div class="heading">Requester : <?php if($itinerary->getRequesterId()) echo $requester->getPerson()->getFirstName();?> <?php if($itinerary->getRequesterId()) echo $requester->getPerson()->getLastName();?> </div>
              <div class="chbox">
                  <input type="checkbox" <?php if($requester && $requester->getPerson() && $requester->getPerson()->getEmail()): ?> value="<?php echo $requester->getPerson()->getEmail();?>" class="mailable" <?php else: ?> disabled="disabled" <?php endif;?> name="requester_mail" />
              </div>
              <div class="leglabel">Email: </div>
              <div class="leg_filed">
                  <?php if($itinerary->getRequesterId()) echo $requester->getPerson()->getEmail(); ?>
              </div>
          </div>
          <div class="legemail_box">
              <div class="heading">Agency : <?php if($itinerary->getAgencyId()) echo $agency->getName(); ?> </div>
              <div class="chbox">
                  <input type="checkbox" <?php if(isset($agency) && $agency->getEmail()): ?> value="<?php if($itinerary->getAgencyId()) echo $agency->getEmail(); ?>" class="mailable" <?php else: ?> disabled="disabled" <?php endif;?> name="agency_mail" />
              </div>
              <div class="leglabel">Email: </div>
              <div class="leg_filed">
                  <?php if($itinerary->getAgencyId()) echo $agency->getEmail(); ?>
              </div>
          </div>
          <?php
          if($itinerary->getId()) $mission = MissionPeer::getAllMissionByItineraryId($itinerary->getId());
            foreach($mission as $mission_list):
               if($mission_list->getCoordinatorId()) $coordinator = CoordinatorPeer::retrieveByPK($mission_list->getCoordinatorId());
                if($coordinator):
          ?>
          <div class="legemail_box">
              <div class="heading">Coordinator for Mission <?php $mission_list->getId(); ?>: <?php if($coordinator->getMember()) echo $coordinator->getMember()->getPerson()->getFirstName(); ?> <?php if($coordinator->getMember()) echo $coordinator->getMember()->getPerson()->getLastName(); ?></div>
              <div class="chbox">
                  <input type="checkbox" <?php if(isset($coordinator) && $coordinator->getMember()): ?> value="<?php echo $coordinator->getMember()->getPerson()->getEmail(); ?>" class="mailable" <?php else: ?> disabled="disabled" <?php endif;?> name="coordinator_mail[]" />
              </div>
              <div class="leglabel">Email: </div>
              <div class="leg_filed">
                  <?php if($coordinator->getMember())  echo $coordinator->getMember()->getPerson()->getEmail(); ?>
              </div>
          </div>
          <?php
                    endif;
               $other_requester_id = RequesterPeer::retrieveByPK($mission_list->getOtherRequesterId());
               if($other_requester_id):
          ?>
          <div class="legemail_box">
              <div class="heading">Requester : <?php echo $other_requester_id->getPerson()->getFirstName();?> <?php echo $requester->getPerson()->getLastName();?> </div>
              <div class="chbox">
                  <input type="checkbox" <?php if(isset($other_requester_id) && $other_requester_id->getPerson() && $other_requester_id->getPerson()->getEmail() ): ?> value="<?php echo $other_requester_id->getPerson()->getEmail(); ?>" class="mailable" <?php else: ?> disabled="disabled" <?php endif;?> name="other_requester_mail[]" />
              </div>
              <div class="leglabel">Email: </div>
              <div class="leg_filed">
                  <?php echo $other_requester_id->getPerson()->getEmail(); ?>
              </div>
          </div>
          <?php
                endif;
                $mission_leg = MissionLegPeer::getAllMissionLegByMissionId($mission_list->getId());
                foreach ($mission_leg as $miss_leg):
                    $pilot_id = PilotPeer::retrieveByPK($miss_leg->getPilotId());
                    if($pilot_id):
          ?>
           <div class="legemail_box">
               <div class="heading">Pilot : <?php echo $pilot_id->getMember()->getPerson()->getFirstName(); ?> <?php echo $pilot_id->getMember()->getPerson()->getLastName();?> </div>
              <div class="chbox">
                  <input type="checkbox" <?php if($pilot_id->getMember() && $pilot_id->getMember()->getPerson() && $pilot_id->getMember()->getPerson()->getEmail()): ?> value="<?php echo $pilot_id->getMember()->getPerson()->getEmail()?>" class="mailable" <?php else: ?> disabled="disabled" <?php endif;?> name="pilot_mail[]" />
              </div>
              <div class="leglabel">Email: </div>
              <div class="leg_filed">
                  <?php echo $pilot_id->getMember()->getPerson()->getEmail(); ?>
              </div>
          </div>
          <?php
                    endif;
                    $copilot_id = MemberPeer::retrieveByPK($miss_leg->getCopilotId());
                    if($copilot_id):
          ?>
           <div class="legemail_box">
               <div class="heading">Co Pilot : <?php echo $copilot_id->getPerson()->getFirstName(); ?> <?php echo $copilot_id->getPerson()->getLastName();?> </div>
              <div class="chbox">
                  <input type="checkbox" <?php if(isset($copilot_id) && $copilot_id->getPerson() && $copilot_id->getPerson()->getEmail() ): ?> value="<?php echo $copilot_id->getPerson()->getEmail(); ?>" class="mailable" <?php else: ?> disabled="disabled" <?php endif;?> name="copilot_mail[]" />
              </div>
              <div class="leglabel">Email: </div>
              <div class="leg_filed">
                  <?php echo $copilot_id->getPerson()->getEmail(); ?>
              </div>
          </div>
          <?php
                    endif;
                    $miss_assis_id = MemberPeer::retrieveByPK($miss_leg->getMissAssisId());
                    if($miss_assis_id):
          ?>
           <div class="legemail_box">
               <div class="heading">Mission Assistant : <?php echo $miss_assis_id->getPerson()->getFirstName(); ?> <?php echo $miss_assis_id->getPerson()->getLastName();?> </div>
              <div class="chbox">
                  <input type="checkbox" <?php if(isset($miss_assis_id) && $miss_assis_id->getPerson() && $miss_assis_id->getPerson()->getEmail()): ?> value="<?php echo $miss_assis_id->getPerson()->getEmail(); ?>" class="mailable" <?php else: ?> disabled="disabled" <?php endif;?> name="miss_assis_mail[]" />
              </div>
              <div class="leglabel">Email: </div>
              <div class="leg_filed">
                  <?php echo $miss_assis_id->getPerson()->getEmail(); ?>
              </div>
          </div>
          <?php
                    endif;
                    $backup_pilot_id = PilotPeer::retrieveByPK($miss_leg->getBackupPilotId());
                    if($backup_pilot_id):
          ?>
           <div class="legemail_box">
               <div class="heading">Backup Pilot: <?php echo $backup_pilot_id->getMember()->getPerson()->getFirstName(); ?> <?php echo $backup_pilot_id->getMember()->getPerson()->getLastName();?> </div>
              <div class="chbox">
                  <input type="checkbox" <?php if(isset($backup_pilot_id) && $backup_pilot_id->getMember() && $backup_pilot_id->getMember()->getPerson() && $backup_pilot_id->getMember()->getPerson()->getEmail()): ?> value="<?php echo $backup_pilot_id->getMember()->getPerson()->getEmail(); ?>" class="mailable" <?php else: ?> disabled="disabled" <?php endif;?> name="backup_pilot_mail[]" />
              </div>
              <div class="leglabel">Email: </div>
              <div class="leg_filed">
                  <?php echo $backup_pilot_id->getMember()->getPerson()->getEmail(); ?>
              </div>
          </div>
          <?php
                    endif;
                     $backup_copilot_id = MemberPeer::retrieveByPK($miss_leg->getBackupCopilotId());
                    if($backup_copilot_id):
          ?>
           <div class="legemail_box">
               <div class="heading">Backup Co Pilot: <?php echo $backup_copilot_id->getPerson()->getFirstName(); ?> <?php echo $backup_copilot_id->getPerson()->getLastName();?> </div>
              <div class="chbox">
                  <input type="checkbox" <?php if($backup_copilot_id->getPerson() && $backup_copilot_id->getPerson()->getEmail()): ?> value="<?php echo $backup_copilot_id->getPerson()->getEmail(); ?>" class="mailable" <?php else: ?> disabled="disabled" <?php endif;?> name="backup_copilot_mail[]" />
              </div>
              <div class="leglabel">Email: </div>
              <div class="leg_filed">
                  <?php echo $backup_copilot_id->getPerson()->getEmail(); ?>
              </div>
          </div>
          <?php
                    endif;
                    $backup_miss_assis_id = MemberPeer::retrieveByPK($miss_leg->getBackupMissAssisId());
                    if($backup_miss_assis_id):
          ?>
           <div class="legemail_box">
               <div class="heading">Backup Co Pilot: <?php echo $backup_miss_assis_id->getPerson()->getFirstName(); ?> <?php echo $backup_miss_assis_id->getPerson()->getLastName();?> </div>
              <div class="chbox">
                  <input type="checkbox" <?php if($backup_miss_assis_id->getPerson() && $backup_miss_assis_id->getPerson()->getEmail()): ?> value="<?php echo $backup_miss_assis_id->getPerson()->getEmail(); ?>" class="mailable" <?php else: ?> disabled="disabled" <?php endif;?> name="backup_miss_assis_mail[]" />
              </div>
              <div class="leglabel">Email: </div>
              <div class="leg_filed">
                  <?php echo $backup_miss_assis_id->getPerson()->getEmail(); ?>
              </div>
          </div>
          <?php
                    endif;
                    $pilot_aircraft_id = PilotAircraftPeer::retrieveByPK($miss_leg->getPilotAircraftId());
                    if($pilot_aircraft_id):
          ?>
           <div class="legemail_box">
               <div class="heading">Pilot Aircraft: <?php echo $pilot_aircraft_id->getPerson()->getFirstName(); ?> <?php echo $pilot_aircraft_id->getPerson()->getLastName();?> </div>
              <div class="chbox">
                  <input type="checkbox" <?php if($pilot_aircraft_id->getPerson() && $pilot_aircraft_id->getPerson()->getEmail() ): ?> value="<?php echo $pilot_aircraft_id->getPerson()->getEmail(); ?>" class="mailable" <?php else: ?> disabled="disabled" <?php endif;?> name="pilot_aircraft_mail[]" />
              </div>
              <div class="leglabel">Email: </div>
              <div class="leg_filed">
                  <?php echo $pilot_aircraft_id->getPerson()->getEmail(); ?>
              </div>
          </div>
          <?php
                    endif;
                    $afa_org = AfaOrgPeer::retrieveByPK($miss_leg->getShareAfaOrgId());
                    if($afa_org):
          ?>
           <div class="legemail_box">
               <div class="heading">Afa Org: <?php echo $afa_org->getName(); ?> </div>
              <div class="chbox">
                  <input type="checkbox" <?php if($afa_org && $afa_org->getRefContactEmail()): ?> value="<?php echo $afa_org->getRefContactEmail(); ?>" class="mailable" <?php else: ?> disabled="disabled" <?php endif;?> name="ref_contact_mail[]" />
              </div>
              <div class="leglabel">Email: </div>
              <div class="leg_filed">
                  <?php echo $afa_org->getRefContactEmail(); ?>
              </div>
          </div>
          <?php
                    endif;
                endforeach;
            endforeach;
          ?>
          </div>
      </div>
    </div>
    </form>
</div>
<div id="loading-lightbox-overlay" style="display:none;opacity: 0.55; background-color: rgb(0, 0, 0); position: absolute; overflow: hidden; top: 0px; left: 0px; z-index: 100000; width: 976px; height: auto;">
  <span>
         <img id="loading-lightbox-overlay-image" src="/images/ajax-loader.gif">
    </span>
</div>