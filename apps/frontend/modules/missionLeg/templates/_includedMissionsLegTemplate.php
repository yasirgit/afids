<?php
use_helper('jQuery');
/* @var $mission_leg MissionLeg */
$mission = $mission_leg->getMission();
$passenger = $mission->getPassenger();
// Camp information 
if($mission->getCampId()) {
 $camp = CampPeer::retrieveByPK($mission->getCampId());
}

// Passenger Information
$pass_person=PersonPeer::retrieveByPK($passenger->getPersonId());
//Requester
$requester = RequesterPeer::retrieveByPK($mission->getRequesterId());
$req_person=PersonPeer::retrieveByPK($requester->getPersonId());
$req_passenger= PassengerPeer::getByPersonId($requester->getPersonId());

//Coordinator
if($mission_leg->getCoordinatorId()){
    $coordinator = CoordinatorPeer::retrieveByPK($mission_leg->getCoordinatorId());
    if($coordinator->getMemberId()){
      $coordiPerson = PersonPeer::retrieveByPK($coordinator->getMember()->getPersonId());
    }
}

//Mission Fbo Information
/*echo "<pre>";
print_r($mission_leg);
die();
*/
if($mission_leg->getFboId()) {
   $fbo = FboPeer::retrieveByPK($mission_leg->getFboId());
   if($fbo->getAirportId()){
        $fbo_airport = AirportPeer::retrieveByPK($fbo->getAirportId());
   }
}

//Pilot
if($mission_leg->getPilotId()){
    $pilot =  PilotPeer::retrieveByPK($mission_leg->getPilotId());
    $pilotMember = $pilot->getMember();
    $pilot_person= PersonPeer::retrieveByPK($pilotMember->getPersonId());
    $pilot_aircrafts = PilotAircraftPeer::getByMemberId($pilot->getMemberId());
}
// Mission Assistant
if($mission_leg->getMissAssisId()){    
    $mission_assistant = MemberPeer::retrieveByPK($mission_leg->getMissAssisId());
    $miss_assi_persopn = PersonPeer::retrieveByPK($mission_assistant->getPersonId());
 }

// Backup Pilot
if($mission_leg->getBackupPilotId()){
    $backupPilot =  PilotPeer::retrieveByPK($mission_leg->getBackupPilotId());
    $backupPilotMember = $pilot->getMember();
    $backupPilot_person = PersonPeer::retrieveByPK($backupPilotMember->getPersonId());
}

/*
echo "<pre>";
print_r($pilotMember);
die();
//*/
//Companions information
$companions = CompanionPeer::getByPassId($passenger->getId());        
if ($passenger) $passenger_type = $passenger->getPassengerType();
$is_air = $mission_leg->getTransportation() == 'air_mission';
if ($is_air) {
    $to_airport = $mission_leg->getAirportRelatedByToAirportId();
    $from_airport = $mission_leg->getAirportRelatedByFromAirportId();
}
?>
<html>
<head><title>Angel Flight West Mission Information Form</title>
<base href="afids.angelflight.org"/></head>
<body bgcolor="#FFFFFF" topmargin="1" leftmargin="1">
    <table border="1" cellpadding="0" width="654" cellspacing="0">
	<tr><td bgcolor="black" align="center"><font color="white"><h3>COVER NOTE</h3></font></td></tr>
	<tr><td><?php echo $cover_note;?></td></tr>
    </table>
<div align="left">
<table border="1" cellpadding="0" width="650" cellspacing="0">
  <tr>
    <td><div align="left"><table border="0" cellpadding="2" width="650" cellspacing="0">
      <tr>
        <td width="150"><img src="http://69.50.211.150/images/bg-footer-logo.gif" width="120" height="55" alt="AFWest"/></td>
        <td width="549"><h3>Angel Flight West<br/>Mission Information Form
	<br/><font size="2">3161 Donald Douglas Loop South * Santa Monica, CA 90405 * (310) 390-2958</font></h3>
        </td>
      </tr>
    </table>
    </div><div align="left"><table border="0" cellpadding="2" width="650" cellspacing="0">
      <tr>
          <td><p align="right"><small>Report date: <?php echo date('d-m-Y');?></small></p></td>
      </tr></table>
	</div><div align="left"><table border="1" cellpadding="2" width="650" cellspacing="0">
      <tr>
        <td><strong>Mission Information</strong></td>
      </tr>
    </table>
    </div>
    <div align="left">
      <table border="0" cellpadding="2" width="650" cellspacing="0">
      <tr>
        <td width="125" valign="top" align="right"><small><strong>Mission #: </strong></small></td>
        <td width="200" valign="top" align="left"><small><?php echo $mission->getExternalID();?> - <?php echo $mission_leg->getLegNumber();?></small></td>
        <td width="125" valign="top" align="right">&nabla;</td>
        <td width="200" valign="top" align="left"></td>
        <td width="125" valign="top" align="right"><small><strong>Appt Date:</strong></small></td>
        <td width="200" valign="top" align="left"><small><?php if($mission->getApptDate('m/d/Y')) echo $mission->getApptDate('m/d/Y'); else "---";?></small></td>
      </tr>
      <tr>
        <td width="125" valign="top" align="right"><small><strong>Mission Date:</strong></small></td>
        <td width="200" valign="top" align="left"><small><?php if($mission->getMissionDate('m/d/Y')) echo $mission->getMissionDate('m/d/Y'); else echo "---";?></small></td>
        <td width="125" valign="top" align="right"></td>
        <td width="200" valign="top" align="left"></td>
        <td width="125" valign="top" align="right"><small><strong>Mission Date:</strong></small></td>
        <td width="200" valign="top" align="left"><small><?php if($mission->getMissionDate('m/d/Y')) echo $mission->getMissionDate('m/d/Y'); else echo "---";?></small></td>
        <td width="125" valign="top" align="right"><small><strong>Flight Time:</strong></small></td>
        <td width="200" valign="top" align="left"><small></small><?php echo $mission->getFlightTime();?></td>
      </tr>      
      <tr>
        <td width="125" valign="top" align="right"><small><strong>Origin:</strong></small></td>
        <td width="200" valign="top" align="left"><small><?php if ($is_air) echo $from_airport->getIdent().' ('.$from_airport->getCity().', '.$from_airport->getState().')';?>
		<br/>
                <?php if($from_airport->getGmtOffset()==-8){?>
		(Pacific Time) GMT <?php echo $from_airport->getGmtOffset();?>
                <?php } ?>
                <?php if($from_airport->getGmtOffset()==-7){?>
		(Mountain Time) GMT <?php echo $from_airport->getGmtOffset();?>
                <?php } ?>
                <?php if($from_airport->getGmtOffset()==-6){?>
		(Central Time) GMT <?php echo $from_airport->getGmtOffset();?>
                <?php } ?>
                <?php if($from_airport->getGmtOffset()==-5){?>
		(Eastern Time) GMT <?php echo $from_airport->getGmtOffset();?>
                <?php } ?>        
                
                <?php if ($mission_leg->getFboId()) { ?>
                    <br/><strong>FBO: <?php echo  $fbo->getName();?> </strong>
                    <?php if($fbo->getFuelDiscount()==1) {?>
                    <br/><strong>Ask About Fuel Discount</strong>
                    <?php } ?>
                    <?php if($fbo->getVoicePhone()) {?>
                    <br/>Phone: <?php echo  $fbo->getVoicePhone();?>
                 <?php
                  }
                 }
                 ?>
		</small>
	</td>
        <td width="125" valign="top" align="right"><small><strong>Destination:</strong></small></td>
        <td width="200" valign="top" align="left"><small><?php if ($is_air) echo $to_airport->getIdent().' ('.$to_airport->getCity().', '.$to_airport->getState().')';?>
		<br/>
                <?php if($to_airport->getGmtOffset()==-8){?>
		(Pacific Time) GMT <?php echo $to_airport->getGmtOffset();?>
                <?php } ?>
                <?php if($to_airport->getGmtOffset()==-7){?>
		(Mountain Time) GMT <?php echo $to_airport->getGmtOffset();?>
                <?php } ?>
                <?php if($to_airport->getGmtOffset()==-6){?>
		(Central Time) GMT <?php echo $to_airport->getGmtOffset();?>
                <?php } ?>
                <?php if($to_airport->getGmtOffset()==-5){?>
		(Eastern Time) GMT <?php echo $to_airport->getGmtOffset();?>
                <?php } ?> 		
	</small></td>
      </tr>
    </table>
    </div><div align="left"><table border="1" cellpadding="2" width="650" cellspacing="0">
      <tr>
        <td><strong>Passenger</strong></td>
      </tr>
    </table>
    </div><div align="left"><table border="0" cellpadding="2" width="650" cellspacing="0">
      <tr>
        <td width="100" valign="top" align="right"><small><strong>Name:</strong></small></td>
        <td width="225" valign="top" align="left"><small><?php if($pass_person->getFirstName()) echo $pass_person->getTitle().'&nbsp;'.$pass_person->getFirstName().' '.$pass_person->getLastName(); else echo "---";?></small></td>
        <td width="100" valign="top" align="right"><small><strong>City/St/Co:</strong></small></td>
        <td width="225" valign="top" align="left"><small><?php if($pass_person->getCity()) echo $pass_person->getCity(); else echo "---";?>/<?php if($pass_person->getState()) echo $pass_person->getState(); else echo "---";?>/<?php if($pass_person->getCounty()) echo $pass_person->getCounty(); else echo "---";?></small></td>
      </tr>
	<tr>
        	<td width="100" valign="top" align="right"><strong><small>Address:</small></strong></td>
                <td width="550" valign="top" align="left" colspan="3"><small><?php if($pass_person->getAddress1()) echo $pass_person->getAddress1(); else echo "---";?>
				<br/><?php echo $pass_person->getAddress2();?>
		</small></td>
	</tr>

      <tr>
        <td width="100" valign="top" align="right"><small><strong>Prim. Phone:</strong></small></td>
        <td width="225" valign="top" align="left"><small>
	Day: <?php if($pass_person->getDayPhone()) echo $pass_person->getDayPhone(); else echo "---";?>
        <br/>Eve: <?php if($pass_person->getEveningPhone()) echo $pass_person->getEveningPhone(); else echo "---";?>
	</small></td>
        <td width="100" valign="top" align="right"><small><strong>Other:</strong></small></td>
        <td width="225" valign="top" align="left"><small>
                Pager: <?php if($pass_person->getPagerPhone()) echo $pass_person->getPagerPhone(); else echo "---";?>
                Cell: <?php if($pass_person->getMobilePhone()) echo $pass_person->getMobilePhone(); else echo "---";?>
                Other: <?php if($pass_person->getOtherPhone()) echo $pass_person->getOtherPhone(); else echo "---";?>
                Fax: <?php if($pass_person->getFaxPhone1()) echo $pass_person->getFaxPhone1(); else echo "---";?>
            <br/>
            Email: <?php if($pass_person->getEmail()) echo $pass_person->getEmail(); else echo "---";?>
	</small></td>
      </tr>
      <tr>
        <td width="100" valign="top" align="right"><small><strong>Parent:</strong></small></td>
        <td width="550" valign="top" align="left" colspan="3"><small><?php if($passenger->getParent()) echo $passenger->getParent(); else echo "---";?></small></td>
      </tr>
      <tr>
        <td width="100" valign="top" align="right"><strong><small>Age:</small></strong></td>
        <td width="225" valign="top" align="left"><small><?php 
            $today = strtotime("NOW");
            $myBirthDate = strtotime($passenger->getDateOfBirth());
            $totalTime=round(abs($today-$myBirthDate));
            $days=($totalTime/86400);
            $ages=round($days/365);
            //echo $ages;

            if($ages) echo $ages; else echo "---";

        ?></small></td>
        <td width="100" valign="top" align="right"><small><strong>Weight:</strong></small></td>
        <td width="225" valign="top" align="left"><small><?php if($passenger->getWeight()) echo $passenger->getWeight(); else echo "---";?></small></td>
      </tr>
      <tr>
        <td width="100" valign="top" align="right"><strong><small>Best Contact:</small></strong></td>
        <td width="225" valign="top" align="left"><small><?php if($passenger->getBestContactMethod()) echo $passenger->getBestContactMethod(); else echo "---";?></small></td>
        <td width="100" valign="top" align="right"><small><strong>Language:</strong></small></td>
        <td width="225" valign="top" align="left"><small><?php if($passenger->getLanguageSpoken()) echo $passenger->getLanguageSpoken(); else echo "---";?></small></td>
      </tr>
      <tr>
        <td width="100" valign="top" align="right"><small><strong>Illness:</strong></small></td>
        <td width="550" valign="top" align="left" colspan="3"><small><?php if($passenger->getIllness()) echo $passenger->getIllness(); else echo "---";?></small></td>
      </tr>
      <tr>
        <td width="100" valign="top" align="right"><small><strong>Physician:</strong></small></td>
        <td width="225" valign="top" align="left"><small><?php if($passenger->getReleasingPhysician()) echo $passenger->getReleasingPhysician(); else "---";?><br/>Email:<?php if($passenger->getReleasingEmail()) echo $passenger->getReleasingEmail(); else echo "---";?></small></td>
        <td width="100" valign="top" align="right"><small><strong>Phone:</strong></small></td>
        <td width="225" valign="top" align="left"><small><?php if($passenger->getReleasingPhone()) echo $passenger->getReleasingPhone(); else echo "---";?><br/>Fax: <?php if($passenger->getReleasingFax1()) echo $passenger->getReleasingFax1(); else echo "---";?></small></td>
      </tr>
      <tr>
        <td width="100" valign="top" align="right"><small><strong>Treat. Physician:</strong></small></td>
        <td width="225" valign="top" align="left"><small><?php if($passenger->getTreatingPhysician()) echo $passenger->getTreatingPhysician(); else echo "---";?><br/>Email: <?php if($passenger->getTreatingEmail()) echo $passenger->getTreatingEmail(); else echo "---";?></small></td>
        <td width="100" valign="top" align="right"><small><strong>Phone:</strong> <?php if($passenger->getTreatingPhone()) echo $passenger->getTreatingPhone(); else echo "---";?></small></td>
        <td width="225" valign="top" align="left"><small><br/>Fax: <?php if($passenger->getTreatingFax1())  echo $passenger->getTreatingFax1(); else echo "---";?></small></td>
      </tr>
      <tr>
        <td width="100" valign="top" align="right"><small><strong>Emergency Cont:</strong></small></td>
        <td width="225" valign="top" align="left"><small><?php if($passenger->getEmergencyContactName()) echo $passenger->getEmergencyContactName(); else echo "---";?></small></td>
        <td width="100" valign="top" align="right"><small><strong>Phone:</strong></small></td>
        <td width="225" valign="top" align="left"><small><?php if($passenger->getEmergencyContactPrimaryPhone()) echo $passenger->getEmergencyContactPrimaryPhone(); else echo "---";?><br/><?php if($passenger->getEmergencyContactPrimaryComment()) echo $passenger->getEmergencyContactPrimaryComment(); else echo "---";?></small></td>
      </tr>      
      <tr>
        <td width="650" colspan="4" valign="top" align="left"><strong>Destination Information:</strong></td>
      </tr>
      <tr>
        <td width="125" valign="top" align="right"><small><strong>Lodging:</strong></small></td>
        <td width="200" valign="top" align="left"><small><?php if($passenger->getLodgingName()) echo $passenger->getLodgingName(); else echo "---";?></small></td>
        <td width="125" valign="top" align="right"><small><strong>Phone:</strong></small></td>
        <td width="200" valign="top" align="left"><small><?php if($passenger->getLodgingPhone()) echo $passenger->getLodgingPhone(); else echo "---";?></small></td>
      </tr>
      <tr>
        <td width="125" valign="top" align="right"><small><strong>Facility:</strong></small></td>
        <td width="200" valign="top" align="left"><small><?php if($passenger->getFacilityName()) echo $passenger->getFacilityName(); else echo "---";?></small></td>
        <td width="125" valign="top" align="right"><small><strong>Phone:</strong></small></td>
        <td width="200" valign="top" align="left"><small><?php if($passenger->getFacilityPhone()) echo $passenger->getFacilityPhone(); else echo "---";?></small></td>
      </tr>
      <tr>
        <td width="125" valign="top" align="right"><small><strong>Bag. weight:</strong></small></td>
        <td width="200" valign="top" align="left"><small><?php if($passenger->getWeight()) echo $passenger->getWeight(); else echo "---";?></small></td>
        <td width="125" valign="top" align="right"><small><strong>&nbsp;</strong></small></td>
        <td width="200" valign="top" align="left"><small>&nbsp;</small></td>
      </tr>
    </table>
    </div>
    <div align="left">
    <table border="1" cellpadding="2" width="650" cellspacing="0">
      <tr>
        <td><strong>Companions</strong></td>
      </tr>
    </table>
    </div>
   <div align="left">
   <table border="1" cellpadding="2" width="650" cellspacing="0">
      <tr>
        <td width="200" valign="top" align="left"><strong><small>Name</small></strong></td>
        <td width="75" valign="top" align="right"><strong><small>Age</small></strong></td>
        <td width="150" valign="top" align="left"><strong><small>Relationship</small></strong></td>
        <td width="75" valign="top" align="right"><strong><small>Weight</small></strong></td>
        <td width="150" valign="top" align="left"><strong><small>Phone</small></strong></td>
      </tr>
      <?php $totalWeight=0; foreach ($companions as $companion) { $totalWeight+=$companion->getWeight();?>
      <tr>
        <td width="200" valign="top" align="left"><small><?php if($companion->getName()) echo $companion->getName(); else echo "---";?></small></td>
        <td width="75" valign="top" align="right"><small><?php
        if($companion->getDateOfBirth()){                
            $today = strtotime("NOW");
            $myBirthDate = strtotime($companion->getDateOfBirth());
            $totalTime=round(abs($today-$myBirthDate));
            $days=($totalTime/86400);
            $ages=round($days/365);
            echo $ages;            
        }else{
            echo "---";
        }
        ?></small></td>
        <td width="150" valign="top" align="left"><small><?php if($companion->getRelationship()) echo $companion->getRelationship(); else echo "---";?></small></td>
        <td width="75" valign="top" align="right"><small><?php if($companion->getWeight()) echo $companion->getWeight(); else echo "---";?></small></td>
        <td width="150" valign="top" align="left"><small><?php if($companion->getCompanionPhone()) echo $companion->getCompanionPhone(); else echo "---";?></small></td>
      </tr>
      <?php } ?>
      <tr>
        <td colspan="3" width="425" valign="top" align="right"><small><strong>Total Mission Leg Weight (incl. baggage):</strong></small></td>
        <td width="75" valign="top" align="right"><small><?php echo $totalWeight;?></small></td>
        <td width="150" valign="top" align="left"><small>Lbs.</small></td>
      </tr>
    </table>
    </div>
    <div align="left">
     <table border="1" cellpadding="2" width="650" cellspacing="0">
      <tr>
        <td width="650" valign="top" align="left"><strong>Other Information</strong></td>
      </tr>
     </table>
    </div>
    <div align="left">
      <table border="0" cellpadding="2" width="650" cellspacing="0">
      <tr>
        <td width="125" valign="top" align="right"><small><strong>Pub. Cons.:</strong></small></td>
        <td valign="top" align="left" width="75%"><small><?php if($passenger->getPublicConsiderations()) echo $passenger->getPublicConsiderations(); else echo "--";?></small></td>
      </tr>
      <tr>
        <td width="125" valign="top" align="right"><small><strong>Priv. Cons.:</strong></small></td>
        <td valign="top" align="left" width="75%"><small><?php if($passenger->getPrivateConsiderations()) echo $passenger->getPrivateConsiderations(); else echo "---";?></small></td>
      </tr>
      <tr>
        <td width="125" valign="top" align="right"><small><strong>Comments:</strong></small></td>
        <td valign="top" align="left" width="75%"><small><?php if($mission_leg->getPublicCNote()) echo  $mission_leg->getPublicCNote(); else echo "---";?></small></td>
      </tr>      
    </table>
    </div>
    <?php if($mission->getCampId()) { ?>
    <div align="left">
        <table border="1" cellpadding="2" width="650" cellspacing="0">
          <tr>
            <td><strong>Camp Information</strong></td>
          </tr>
        </table>
    </div>
    <div align="left">
        <table border="0" cellpadding="2" width="650" cellspacing="0">
          <tr>
            <td width="125" valign="top" align="right"><small><strong>Camp name : </strong></small></td>
            <td width="525" colspan="3" valign="top" align="left"><small><?php if($camp->getCampName()) echo $camp->getCampName(); else echo "---";?></small></td>
          </tr>
          <tr>
            <td width="125" valign="top" align="right"><small><strong>Flight Info:</strong></small></td>
            <td width="525" colspan="3" valign="top" align="left"><small><?php if($camp->getFlightIinformation()) echo $camp->getFlightIinformation(); else "---";?></small></td>
          </tr>
          <tr>
            <td width="325" colspan="2" valign="top" align="center"><small><strong>Camp Contact:</strong><?php if($camp->getCampName()) echo $camp->getCampName(); else "---";?></small></td>
            <td width="325" colspan="2" valign="top" align="center"><small><strong>Add'l Camp Contacts :</strong><?php if($camp->getCampName()) echo $camp->getCampName(); else "---";?></small></td>
          </tr>
          <tr>
            <td width="125" valign="top" align="right"><small><strong>Camp phone :</strong></small></td>
            <td width="200" valign="top" align="left"><small><?php if($camp->getCampPhone()) echo $camp->getCampPhone(); else "---";?></small></td>
            <td width="125" valign="top" align="right"><small><strong>Contact info:</strong></small></td>
            <td width="200" valign="top" align="left"><small><?php if($camp->getCampName()) echo $camp->getCampName(); else "---";?></small></td>
          </tr>
          <tr>
            <td width="125" valign="top" align="right"><small><strong>(description:)</strong></small></td>
            <td width="200" valign="top" align="left"><small><?php if($camp->getLodgingPhoneComment()) echo $camp->getLodgingPhoneComment(); else echo "---";?></small></td>
            <td width="125" valign="top" align="right"><small><strong>Add'l phone:</strong></small></td>
            <td width="200" valign="top" align="left"><small><?php if($camp->getCampPhone()) echo $camp->getCampPhone(); else echo "---";?><br />
                <?php if($camp->getCampPhoneComment()) echo $camp->getCampPhoneComment(); else echo "---";?>
                </small></td>
          </tr>
          <tr>
            <td width="125" valign="top" align="right"><strong><small>Comment:</small></strong></td>
            <td width="525" colspan="3" valign="top" align="left"><small><?php if($camp->getComment()) echo $camp->getComment(); else echo "---";?></small></td>
          </tr>
        </table>
      </div>
      <?php } ?>
      <div align="left">
      <table border="1" cellpadding="2" width="650" cellspacing="0">
      <tr>
        <td><strong>Requester</strong></td>
      </tr>
      </table>
      </div>
     <div align="left">
     <table border="0" cellpadding="2" width="650" cellspacing="0">
      <tr>
        <td width="125" valign="top" align="right"><small><strong>Name:</strong></small></td>
        <td width="200" valign="top" align="left"><small><?php if( $req_person->getFirstName()) echo $req_person->getTitle().'&nbsp;'.$req_person->getFirstName().'&nbsp;'.$req_person->getLastName();  else echo "---";?></small></td>
        <td width="125" valign="top" align="right"><small><strong>Pager:</strong></small></td>
        <td width="200" valign="top" align="left"><small><?php if($req_person->getPagerPhone()) echo $req_person->getPagerPhone();  else echo "---";?></small></td>
      </tr>
      <tr>
        <td width="125" valign="top" align="right"><small><strong>Phone:</strong></small></td>
        <td width="200" valign="top" align="left"><small><?php if($req_person->getDayPhone()) echo $req_person->getDayPhone(); else echo "---";?></small></td>
        <td width="125" valign="top" align="right"><small><strong>Mobile Phone:</strong></small></td>
        <td width="200" valign="top" align="left"><small><?php if($req_person->getMobilePhone()) echo $req_person->getMobilePhone(); else echo "---";?></small></td>
      </tr>
      <tr>
        <td width="125" valign="top" align="right"><strong><small>Requester Fax:</small></strong></td>
        <td width="200" valign="top" align="left"><small><?php if($req_person->getFaxPhone1()) echo $req_person->getFaxPhone1(); else echo "---";?></small></td>
        <td width="125" valign="top" align="right"><small><strong>Email:</strong></small></td>
        <td width="200" valign="top" align="left"><small><?php if($req_person->getEmail()) echo $req_person->getEmail(); else echo "---";?></small></td>
      </tr>
      <?php if($req_passenger){?>
      <tr>
        <td width="125" valign="top" align="right"><small><strong>Releasing Phy:</strong></small></td>
        <td width="200" valign="top" align="left"><small><?php if($req_passenger->getReleasingPhysician()) echo $req_passenger->getReleasingPhysician(); else echo "---";?></small></td>
        <td width="125" valign="top" align="right"><small><strong>Phone:</strong></small></td>
        <td width="200" valign="top" align="left"><small><?php if($req_passenger->getReleasingPhone()) echo $req_passenger->getReleasingPhone(); else echo "---";?></small></td>
      </tr>
      <?php } ?>
    </table>
    </div>
    <div align="left">
      <table border="1" cellpadding="2" width="650" cellspacing="0">
        <tr>
            <td><strong>Coordinator</strong></td>
        </tr>
      </table>
    </div>
    <div align="left">
      <?php if($mission_leg->getCoordinatorId()  && $coordinator->getMemberId()){?>
      <table border="0" cellpadding="2" width="650" cellspacing="0">
          <tr>
            <td width="125" valign="top" align="right"><small><strong>Name:</strong></small></td>
            <td width="200" valign="top" align="left"><small><?php if($coordiPerson->getFirstName()) echo $coordiPerson->getFirstName().' '.$coordiPerson->getLastName(); else echo "---";?></small></td>
            <td width="125" valign="top" align="right"><small><strong>Email:</strong></small></td>
            <td width="200" valign="top" align="left"><small><?php if($coordiPerson->getEmail()) echo $coordiPerson->getEmail(); else echo "---";?></small></td>
          </tr>
          <tr>
            <td width="125" valign="top" align="right"><small><strong>Day Phone:</strong></small></td>
            <td width="200" valign="top" align="left"><small><?php if($coordiPerson->getDayPhone()) echo $coordiPerson->getDayPhone(); else echo "---";?></small></td>
            <td width="125" valign="top" align="right"><small><strong>Eve Phone:</strong></small></td>
            <td width="200" valign="top" align="left"><small><?php if($coordiPerson->getEveningPhone()) echo $coordiPerson->getEveningPhone(); else echo "---";?></small></td>
          </tr>
          <tr>
            <td width="125" valign="top" align="right"><strong><small>Mobile Phone:</small></strong></td>
            <td width="200" valign="top" align="left"><small><?php if($coordiPerson->getMobilePhone()) echo $coordiPerson->getMobilePhone(); else echo "---";?></small></td>
            <td width="125" valign="top" align="right"><small><strong>Pager:</strong></small></td>
            <td width="200" valign="top" align="left"><small><?php if($coordiPerson->getPagerPhone()) echo $coordiPerson->getPagerPhone(); else echo "---";?></small></td>
          </tr>
          <tr>
            <td width="125" valign="top" align="right"><strong><small>Fax:</small></strong></td>
            <td width="200" valign="top" align="left"><small><?php if($coordiPerson->getFaxPhone1()) echo $coordiPerson->getFaxPhone1(); else echo "---";?></small></td>
            <td width="125" valign="top" align="right"><small><strong>Other:</strong></small></td>
            <td width="200" valign="top" align="left"><small><?php if($coordiPerson->getOtherPhone()) echo $coordiPerson->getOtherPhone(); else echo "---";?></small></td>
          </tr>
        </table>
        <?php } else {?>
        <table border="0" cellpadding="2" width="650" cellspacing="0">
          <tr>
            <td width="125" clospan="4" valign="top" align="left"><small><strong>Not assigned</strong></small></td>
          </tr>
        </table>
          <?php } ?>
      </div>
      <div align="left">
      <table border="1" cellpadding="2" width="650" cellspacing="0">
          <tr>
            <td><strong>Pilot</strong></td>
          </tr>
      </table>
      </div>
      <div align="left">
       <?php if($mission_leg->getPilotId()){?>
      <table border="0" cellpadding="2" width="650" cellspacing="0">
      <tr>
        <td width="125" valign="top" align="right"><small><strong>Name:</strong></small></td>
        <td width="200" valign="top" align="left"><small><?php if($pilot_person->getFirstName()) echo $pilot_person->getTitle().'&nbsp;'.$pilot_person->getFirstName().'&nbsp;'.$pilot_person->getLastName(); else echo "---";?></small></td>
        <td width="125" valign="top" align="right"><small><strong>Email:</strong></small></td>
        <td width="200" valign="top" align="left"><small><?php if($pilot_person->getEmail()) echo $pilot_person->getEmail(); else echo "---";?></small></td>
      </tr>
      <tr>
        <td width="125" valign="top" align="right"><small><strong>Day phone:</strong></small></td>
        <td width="200" valign="top" align="left"><small><?php if($pilot_person->getDayPhone()) echo $pilot_person->getDayPhone(); else echo "---";?></small></td>
        <td width="125" valign="top" align="right"><small><strong>Eve phone:</strong></small></td>
        <td width="200" valign="top" align="left"><small><?php if($pilot_person->getEveningPhone()) echo $pilot_person->getEveningPhone(); else echo "---";?></small></td>
      </tr>
      <tr>
        <td width="125" valign="top" align="right"><small><strong>Fax:</strong></small></td>
        <td width="200" valign="top" align="left"><small><?php if($pilot_person->getFaxPhone1()) echo $pilot_person->getFaxPhone1(); else echo "---";?></small></td>
        <td width="125" valign="top" align="right"><small><strong>Mobile phone:</strong></small></td>
        <td width="200" valign="top" align="left"><small><?php if($pilot_person->getMobilePhone()) echo $pilot_person->getMobilePhone(); else echo "---";?></small></td>
      </tr>
      <tr>
        <td width="125" valign="top" align="right"><small><strong>Pager phone:</strong></small></td>
        <td width="200" valign="top" align="left"><small><?php if($pilot_person->getPagerPhone()) echo $pilot_person->getPagerPhone(); else echo "---";?></small></td>
        <td width="125" valign="top" align="right"><small><strong>Other phone:</strong></small></td>
        <td width="200" valign="top" align="left"><small><?php if($pilot_person->getOtherPhone()) echo $pilot_person->getOtherPhone(); else echo "---";?></small></td>
      </tr>	
      <tr>
        <td width="125" valign="top" align="right"><small><strong>Pilot's Aircraft:</strong></small></td>
        <td width="525" colspan="3" valign="top" align="left">
            <small>
            <?php
            foreach ($pilot_aircrafts as $pilot_aircraft) {
              echo "Tail Number :".$pilot_aircraft->getNNumber()."<br />";
            }
            ?> 
            </small>
        </td>
      </tr>
    </table>
     <?php } else {?>
        <table border="0" cellpadding="2" width="650" cellspacing="0">
          <tr>
            <td width="125" clospan="4" valign="top" align="left"><small><strong>Not assigned</strong></small></td>
          </tr>
        </table>
        <?php } ?>
    </div>
    <div align="left">
       <table border="1" cellpadding="2" width="650" cellspacing="0">
            <tr>
            <td><strong>Mission Assistant</strong></td>
          </tr>
        </table>
    </div>
    <div align="left">
        <?php if($mission_leg->getMissAssisId()){?>
        <table border="0" cellpadding="2" width="650" cellspacing="0">
          <tr>
            <td width="125" valign="top" align="right"><small><strong>Name:</strong></small></td>
            <td width="200" valign="top" align="left"><small><?php if($miss_assi_persopn->getFirstName()) echo $miss_assi_persopn->getTitle().'&nbsp;'.$miss_assi_persopn->getFirstName().'&nbsp;'.$miss_assi_persopn->getLastName(); else echo "---";?></small></td>
            <td width="125" valign="top" align="right"><small><strong>Email:</strong></small></td>
            <td width="200" valign="top" align="left"><small><?php if($miss_assi_persopn->getEmail()) echo $miss_assi_persopn->getEmail(); else echo "---";?></small></td>
          </tr>
          <tr>
            <td width="125" valign="top" align="right"><small><strong>Day Phone:</strong></small></td>
            <td width="200" valign="top" align="left"><small><?php if($miss_assi_persopn->getDayPhone()) echo $miss_assi_persopn->getDayPhone(); else echo "---";?></small></td>
            <td width="125" valign="top" align="right"><small><strong>Evening Phone:</strong></small></td>
            <td width="200" valign="top" align="left"><small><?php if($miss_assi_persopn->getEveningPhone()) echo $miss_assi_persopn->getEveningPhone(); else echo "---";?></small></td>
          </tr>
          <tr>
            <td width="125" valign="top" align="right"><strong><small>Fax:</small></strong></td>
            <td width="200" valign="top" align="left"><?php if($miss_assi_persopn->getFaxPhone1()) echo $miss_assi_persopn->getFaxPhone1(); echo "---";?></small></td>
            <td width="125" valign="top" align="right"><small><strong>Mobile:</strong></small></td>
            <td width="200" valign="top" align="left"><small><?php if($miss_assi_persopn->getMobilePhone()) echo $miss_assi_persopn->getMobilePhone(); echo "---";?></small></td>
          </tr>
          <tr>
            <td width="125" valign="top" align="right"><strong><small>Pager:</small></strong></td>
            <td width="200" valign="top" align="left"><small><?php if($miss_assi_persopn->getPagerPhone()) echo $miss_assi_persopn->getPagerPhone(); else echo "---";?></small></td>
            <td width="125" valign="top" align="right"><small><strong>Other:</strong></small></td>
            <td width="200" valign="top" align="left"><small><?php if($miss_assi_persopn->getOtherPhone()) echo $miss_assi_persopn->getOtherPhone(); else echo "---";?></small></td>
          </tr>
        </table>
        <?php } else {?>
        <table border="0" cellpadding="2" width="650" cellspacing="0">
          <tr>
            <td width="125" clospan="4" valign="top" align="left"><small><strong>Not assigned</strong></small></td>
          </tr>
        </table>
        <?php } ?>
        </div>
	<div align="left">
            <table border="1" cellpadding="2" width="650" cellspacing="0">
                <tr>
                <td><strong>Backup Pilot</strong></td>
              </tr>
            </table>
        </div>
        <div align="left">
            <?php if($mission_leg->getBackupPilotId()){?>
            <table border="0" cellpadding="2" width="650" cellspacing="0">
              <tr>
                <td width="125" valign="top" align="right"><small><strong>Name:</strong></small></td>
                <td width="200" valign="top" align="left"><small><?php if($backupPilot_person->getFirstName()) echo $backupPilot_person->getTitle().'&nbsp;'.$backupPilot_person->getFirstName().'&nbsp;'.$backupPilot_person->getLastName(); else echo "---";?></small></td>
                <td width="125" valign="top" align="right"><small><strong>Email:</strong></small></td>
                <td width="200" valign="top" align="left"><small><?php if($backupPilot_person->getEmail()) echo $backupPilot_person->getEmail(); else echo "---";?></small></td>
              </tr>
              <tr>
                <td width="125" valign="top" align="right"><small><strong>Day Phone:</strong></small></td>
                <td width="200" valign="top" align="left"><small><?php if($backupPilot_person->getDayPhone()) echo $backupPilot_person->getDayPhone(); else echo "---";?></small></td>
                <td width="125" valign="top" align="right"><small><strong>Evening Phone:</strong></small></td>
                <td width="200" valign="top" align="left"><small><?php if($backupPilot_person->getEveningPhone()) echo $backupPilot_person->getEveningPhone(); else echo "---";?></small></td>
              </tr>
              <tr>
                <td width="125" valign="top" align="right"><strong><small>Fax:</small></strong></td>
                <td width="200" valign="top" align="left"><small><?php if($backupPilot_person->getFaxPhone1()) echo $backupPilot_person->getFaxPhone1(); else echo "---";?></small></td>
                <td width="125" valign="top" align="right"><small><strong>Mobile:</strong></small></td>
                <td width="200" valign="top" align="left"><small><?php if($backupPilot_person->getMobilePhone()) echo $backupPilot_person->getMobilePhone(); else echo "---";?></small></td>
              </tr>
              <tr>
                <td width="125" valign="top" align="right"><strong><small>Pager:</small></strong></td>
                <td width="200" valign="top" align="left"><small><?php if($backupPilot_person->getPagerPhone()) echo $backupPilot_person->getPagerPhone(); else echo "---";?></small></td>
                <td width="125" valign="top" align="right"><small><strong>Other:</strong></small></td>
                <td width="200" valign="top" align="left"><small><?php if($backupPilot_person->getOtherPhone()) echo $backupPilot_person->getOtherPhone(); else echo "---";?></small></td>
              </tr>
            </table>
            <?php } else {?>
            <table border="0" cellpadding="2" width="650" cellspacing="0">
              <tr>
                <td width="125" clospan="4" valign="top" align="left"><small><strong>Not assigned</strong></small></td>
              </tr>
            </table>
            <?php } ?>
    </div>
    </td>
  </tr>
</table>
   <p><em><small>For more information, contact the coordinator or log on to the web site.</small></em></p>
</div>
</body>
</html>