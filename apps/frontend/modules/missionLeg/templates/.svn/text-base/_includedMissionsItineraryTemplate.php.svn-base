<?php
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

//Mission Coordinator
if($mission->getCoordinatorId()){
   
    $misscoordinator = CoordinatorPeer::retrieveByPK($mission->getCoordinatorId());
    if($misscoordinator->getMemberId()){
      $missCoordiPerson = PersonPeer::retrieveByPK($misscoordinator->getMember()->getPersonId());
    }
}

//Coordinator
if($mission_leg->getCoordinatorId()){
    $coordinator = CoordinatorPeer::retrieveByPK($mission_leg->getCoordinatorId());
    if($coordinator->getMemberId()){
      $coordiPerson = PersonPeer::retrieveByPK($coordinator->getMember()->getPersonId());
    }
}

$baggageWeight=$mission_leg->getBaggageWeight();
$baggageDesc=$mission_leg->getBaggageDesc();


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
<html xmlns:s="uuid:BDC6E3F0-6DA3-11d1-A2A3-00AA00C14882" xmlns:dt="uuid:C2F41010-65B3-11d1-A29F-00AA00C14882" xmlns:rs="urn:schemas-microsoft-com:rowset" xmlns:z="#RowsetSchema">
<head>
<META http-equiv="Content-Type" content="text/html; charset=UTF-16">
<title>Air Charity Network&trade; Mission Itinerary Form</title>
<style>
html {
  margin: 0;
}
body {
	background-color: #FFFFFF;
	font-size: 9.0pt;
	font-family: "Times New Roman";
	margin: 0;
	}
p{
	font: 10pt Times New Roman;
	color: #000000;
	margin-top: 0px;
	text-align: left;
	text-indent: 0;
	margin-bottom: 6pt;
	page-break-inside: avoid;
	}
p.Form {
	font-family:"Times New Roman";
	font-weight:bold;
	font-size:10.0pt;
	color: #000000;
	margin-top: 4px;
	margin-bottom: 4px;
	text-align: left;
	text-indent: 0;
	}
div.Indent {
	text-indent: .5in;
	font-size:9.0pt;
	font-family:"Times New Roman";
	}

div.FooterWaiver {
	float:left;
	width:33%;
	text-align:center;
	font-family:"Times New Roman";
	font-weight:900;
	font-size:12.0pt;
	}

div.FooterWaiverContainer {
	padding-top:.5in;
	padding-bottom:.25in;
	page-break-before:always;
	}
</style>
</head>
<body bgcolor="#FFFFFF" topmargin="1" leftmargin="1">
<table border="1" cellpadding="0" width="650" cellspacing="0">
<tr>
<td><table border="0" cellpadding="2" width="650" cellspacing="0">
<tr>
<td width="650" colspan="3" align="center"><b>Angel Flight West</b><br><small>24-hour Hotline: (888) 4-AN-ANGEL Office: (310) 390-2958 Fax: (310) 397-9636</small></td>

</tr>
<tr>
<td width="150"><small><strong>Mission #: </strong><?php echo $mission->getExternalID();?></small></td>
<td width="350" align="center"><b><u>Mission Itinerary</u></b></td>
<td width="150"><small><strong>Date: </strong><?php if($mission->getApptDate('m/d/Y')) echo $mission->getApptDate('m/d/Y'); else "---";?></small></td>
</tr>
<tr>
<td width="650" colspan="3" align="center"><small><strong>Primary Coordinator: </strong><?php if($mission_leg->getCoordinatorId() && $coordinator->getMemberId()) echo $coordiPerson->getTitle().'&nbsp;'.$coordiPerson->getFirstName().' '.$coordiPerson->getLastName(); else echo "Not assigned";?></small></td>
</tr>
</table>

<table border="0" cellpadding="2" width="650" cellspacing="0">
<tr>
<td width="325" align="left"><small><strong>MISSION DATE: </strong><?php if($mission->getMissionDate('m/d/Y')) echo $mission->getMissionDate('m/d/Y'); else echo "---";?></small></td>
<td width="325" align="right"><small><strong>Appointment Date/Time: </strong><?php if($mission->getApptDate('m/d/Y')) echo $mission->getApptDate('m/d/Y'); else "---";?></small></td>
</tr>
</table>
<hr>
<table border="0" cellpadding="2" width="650" cellspacing="0">
<tr>
<td align="left"><strong><small>PATIENT INFO</small></strong></td>
</tr>
</table>

<table border="0" cellpadding="2" width="650" cellspacing="0">
<tr>
<td width="100" valign="top" align="right"><small><strong>Name:</strong></small></td>
<td width="225" valign="top" align="left"><small><?php if($pass_person->getFirstName()) echo $pass_person->getTitle().'&nbsp;'.$pass_person->getFirstName().' '.$pass_person->getLastName(); else echo "---";?>
        <br>DOB/Age: <?php if($passenger->getDateOfBirth('m/d/Y')) echo $passenger->getDateOfBirth('m/d/Y'); else echo "---";?>
        <?php
            $today = strtotime("NOW");
            $myBirthDate = strtotime($passenger->getDateOfBirth());
            $totalTime=round(abs($today-$myBirthDate));
            $days=($totalTime/86400);
            $ages=round($days/365);
            //echo $ages;
            if($ages) echo "($ages)"; else echo "---";
            ?>

        <br>Weight: <?php if($passenger->getWeight()) echo $passenger->getWeight();  else echo "---";?></small></td>
<td width="100" valign="top" align="right"><small><strong>Address:</strong></small></td>
<td width="225" valign="top" align="left"><small><?php if($pass_person->getAddress1()) echo $pass_person->getAddress1(); else echo "---";?>
				<br/><?php echo $pass_person->getAddress2();?><br /> <?php if($pass_person->getCity()) echo $pass_person->getCity(); else echo "---";?> ,<?php if($pass_person->getState()) echo $pass_person->getState(); else echo "---";?> </small></td>
</tr>
<tr>
<td width="100" valign="top" align="right"><strong><small>Contact:</small></strong></td>

<td width="550" valign="top" align="left" colspan="3"><small><strong>Language:</strong> <?php if($passenger->getLanguageSpoken()) echo $passenger->getLanguageSpoken(); else echo "---";?><br><strong>Best Contact:</strong><?php if($passenger->getBestContactMethod()) echo $passenger->getBestContactMethod(); else echo "---";?> </small></td>
</tr>
<tr>
<td width="100" valign="top" align="right"><small><strong>Prim. Phone: </strong></small></td>
<td width="225" valign="top" align="left"><small>
            Day: <?php if($pass_person->getDayPhone()) echo $pass_person->getDayPhone(); else echo "---";?>
            <br/>Eve: <?php if($pass_person->getEveningPhone()) echo $pass_person->getEveningPhone(); else echo "---";?> </small></td>
<td width="100" valign="top" align="right"><small><strong>Other:</strong></small></td>
<td width="225" valign="top" align="left"><small>

            Other: <?php if($pass_person->getOtherPhone()) echo $pass_person->getOtherPhone(); else echo "---";?>
	        Email: <?php if($pass_person->getEmail()) echo $pass_person->getEmail(); else echo "---";?></small></td>
</tr>
<tr>
<td width="100" valign="top" align="right"><small><strong>Parent:</strong></small></td>
<td width="550" valign="top" align="left" colspan="3"><small><?php if($passenger->getParent()) echo $passenger->getParent(); else echo "n/a";?></small></td>
</tr>
<tr>
<td width="100" valign="top" align="right"><small><strong>Illness:</strong></small></td>
<td width="550" valign="top" align="left" colspan="3"><small><?php if($passenger->getIllness()) echo $passenger->getIllness(); else echo "---";?></small></td>
</tr>
<tr>

<td width="100" valign="top" align="right"><small><strong>Lodging:</strong></small></td>
<td width="225" valign="top" align="left"><small><?php if($passenger->getLodgingName()) echo $passenger->getLodgingName(); else echo "---";?>&nbsp;&nbsp; <?php if($passenger->getLodgingPhone()) echo $passenger->getLodgingPhone(); else echo "---";?> </small></td>
<td width="100" valign="top" align="right"><small><strong>Treating Physician:</strong></small></td>
<td width="225" valign="top" align="left"><small><?php if($passenger->getTreatingPhysician()) echo $passenger->getTreatingPhysician(); else echo "---";?><br/>Email: <?php if($passenger->getTreatingEmail()) echo $passenger->getTreatingEmail(); else echo "---";?>
        		   Phone:  <?php if($passenger->getTreatingPhone()) echo $passenger->getTreatingPhone(); else echo "---";?></small></td>
</tr>
<tr>
<td width="100" valign="top" align="right"><small><strong>Destination:</strong></small></td>
<td width="225" valign="top" align="left"><small>Seattle Cancer Wellness (425) 204-7480 </small></td>
<td width="100" valign="top" align="right"><small><strong>Releasing Physician:</strong></small></td>
<td width="225" valign="top" align="left"><small><?php if($passenger->getReleasingPhysician()) echo $passenger->getReleasingPhysician(); else "---";?>
         Phone:  <?php if($passenger->getReleasingPhone()) echo $passenger->getReleasingPhone(); else echo "---";?> </small></td>

</tr>
<tr>
<td width="100" valign="top" align="right"><small><strong>Social Wkr: </strong></small></td>
<td width="225" valign="top" align="left"><small><?php if( $req_person->getFirstName()) echo $req_person->getTitle().'&nbsp;'.$req_person->getFirstName().'&nbsp;'.$req_person->getLastName();  else echo "---";?><br><?php if($req_person->getDayPhone()) echo $req_person->getDayPhone(); else echo "---";?> <br><?php if($req_person->getEmail()) echo $req_person->getEmail(); else echo "---";?></small></td>
<td width="100" valign="top" align="right"><small><strong>Phone: </strong></small></td>
<td width="225" valign="top" align="left"><small>
                Work: <?php if($req_person->getMobilePhone()) echo $req_person->getMobilePhone(); else echo "---";?>  </small></td>
</tr>
</table>
<table border="0" cellpadding="2" width="650" cellspacing="0">
</table>
<?php if ($mission_legs) {
  $index = 0;
  $totabaggage=0;
  foreach ($mission_legs as $mleg) {

    $totabaggage+=$mleg->getBaggageWeight();

    if($mleg->getPilotId()) {
       $pilot_info= PilotPeer::retrieveByPK($mleg->getPilotId());
       $pilot_person = $pilot_info->getMember()->getPerson();
       $pilot_aircrafts = PilotAircraftPeer::getByMemberId($pilot_info->getMember()->getId());
    }
    if($mleg->getMissAssisId())
    {
        $memberMiss = MemberPeer::retrieveByPK($mleg->getMissAssisId());
        $miss_assi_persopn = $memberMiss->getPerson();
    }

    if($mleg->getBackupPilotId())
    {
        $backup_pilot_info = PilotPeer::retrieveByPK($mleg->getPilotId());
        $backupPilot_person = $backup_pilot_info->getMember()->getPerson();
    }
    if($mleg->getCoordinatorId())
    {
        $coordinator = CoordinatorPeer::retrieveByPK($mleg->getCoordinatorId());
        if($coordinator->getMemberId())
        {
           $coordiPerson = $coordinator->getMember()->getPerson();
        }
    }

    if($mleg->getMissAssisId())
    {
        $memberMiss = MemberPeer::retrieveByPK($mleg->getMissAssisId());
        $miss_assi_persopn = $memberMiss->getPerson();
    }
    if($mleg->getMissAssisId())
    {
        $memberMiss = MemberPeer::retrieveByPK($mleg->getMissAssisId());
        $miss_assi_persopn = $memberMiss->getPerson();
    }

   if($mleg->getFboId()) {
      $fbo = FboPeer::retrieveByPK($mleg->getFboId());
      if($fbo->getAirportId()){
        $fbo_airport = AirportPeer::retrieveByPK($fbo->getAirportId());
      }
   }
    $is_air = $mleg->getTransportation() == 'air_mission';
    if ($is_air) {
        $to_airport = $mleg->getAirportRelatedByToAirportId();
        $from_airport = $mleg->getAirportRelatedByFromAirportId();
    }
    
    //// FBO information 
    if($mleg->getFboId()){
        $fromFbo=FboPeer::retrieveByPK($mleg->getFboId());
    }
    if($mleg->getFboDestId()){
        $destFbo=FboPeer::retrieveByPK($mleg->getFboDestId());
    }
    //ETD and ETA information
    $afaLeg=AfaLegPeer::retrieveByPK($mleg->getId());
    

  ?>
<table border="0" cellpadding="2" width="650" cellspacing="0">
<tr>
<td colspan="3" bgcolor="#2000BF"><font color="#FFFFFF"><strong>Leg <?php echo $mleg->getLegNumber();?>:
    Angel Flight West -- (310) 390-2958</strong></font></td>
</tr>
<tr>
   <td width="215" valign="top" align="left"><small><strong>FROM: </strong><?php if ($is_air) echo $from_airport->getIdent().' ('.$from_airport->getCity().', '.$from_airport->getState().')';?>
                <?php if($from_airport->getGmtOffset()==-8){?>
		GMT <?php echo $from_airport->getGmtOffset();?>
                <?php } ?>
                <?php if($from_airport->getGmtOffset()==-7){?>
		GMT <?php echo $from_airport->getGmtOffset();?>
                <?php } ?>
                <?php if($from_airport->getGmtOffset()==-6){?>
		GMT <?php echo $from_airport->getGmtOffset();?>
                <?php } ?>
                <?php if($from_airport->getGmtOffset()==-5){?>
		GMT <?php echo $from_airport->getGmtOffset();?>
                <?php } ?> 
       </small></td>
   <td width="215" valign="top" align="left"><small><strong>Airport Name: </strong><?php echo $from_airport->getName();?></small></td>
   <td width="215" valign="top" align="left"><small><strong>City/St: </strong><?php echo $from_airport->getCity();?>, <?php echo $from_airport->getState();?></small></td>
</tr>


<tr>
 <td width="215" valign="top" align="left"><small><strong>--&gt; ETD :  <?php if($afaLeg) { echo $afaLeg->getEtd(); } else { if($mission->getFlightTime())  echo $mission->getFlightTime(); else echo "---"; }?></strong></small></td>
 <td width="215" valign="top" align="left"><small><strong>FBO : <?php if($mleg->getFboId()) echo  $fromFbo->getName(); else echo "---";?> </strong></small></td>
 <td width="215" valign="top" align="left"><small><strong>FBO Phone:  <?php if($mleg->getFboId())  echo $fromFbo->getVoicePhone(); else echo "---";?>
 </strong></small></td>
</tr>
<tr>
<td width="215" valign="top" align="left"><small><strong>TO: </strong><?php if ($is_air) echo $to_airport->getIdent().' ('.$to_airport->getCity().', '.$to_airport->getState().')';?>
    <?php if($to_airport->getGmtOffset()==-8){?>
    GMT <?php echo $to_airport->getGmtOffset();?>
    <?php } ?>
    <?php if($to_airport->getGmtOffset()==-7){?>
    GMT <?php echo $to_airport->getGmtOffset();?>
    <?php } ?>
    <?php if($to_airport->getGmtOffset()==-6){?>
    GMT <?php echo $to_airport->getGmtOffset();?>
    <?php } ?>
    <?php if($to_airport->getGmtOffset()==-5){?>
    GMT <?php echo $to_airport->getGmtOffset();?>
    <?php } ?> </small>
</td>

<td width="215" valign="top" align="left"><small><strong>Airport Name: </strong><?php echo $to_airport->getName();?></small></td>
<td width="215" valign="top" align="left"><small><strong>City/St: </strong><?php echo $to_airport->getCity();?>, <?php echo $to_airport->getState();?></small></td>
</tr>
<tr>
 <td width="215" valign="top" align="left"><small><strong>--&gt; ETA : <?php if($afaLeg) { echo $afaLeg->getEta(); } else { if($mission->getFlightTime())  echo $mission->getFlightTime(); else echo "---"; }?> </strong></small></td>
 <td width="215" valign="top" align="left"><small><strong>FBO : <?php if($mleg->getFboDestId())  echo $destFbo->getVoicePhone(); else echo "---";?> </strong></small></td>
 <td width="215" valign="top" align="left"><small><strong>FBO Phone:  <?php if($mleg->getFboDestId())  echo $destFbo->getVoicePhone(); else echo "---";?>
 </strong></small></td>
</tr>
    <?php if($afaLeg) {
        $afaAirCraft=$afaLeg->getAircraft();
       ?>
         <tr>
          <td width="215" valign="top" align="left"><small><strong>Pilot: </strong><?php if($afaLeg->pilot_name()) echo $afaLeg->pilot_name(); else echo "---";?></small></td>
          <td width="530" colspan="2" valign="top" align="left"><small><strong>Phone: </strong> Work: <?php if($afaLeg->getDayPhone()) echo $afaLeg->getDayPhone(); else echo "---";?>  Home: <?php if($afaLeg->getNightPhone()) echo $afaLeg->getNightPhone(); else echo "---";?>  Fax: <?php if($afaLeg->getFaxPhone()) echo $afaLeg->getFaxPhone(); else echo "---";?>  Cell: <?php if($afaLeg->getPilotMobilePhone()) echo $afaLeg->getPilotMobilePhone(); else echo "---";?>  </small></td>
        </tr>
         <tr>
            <td width="215" valign="top" align="left"><small><strong>--&gt;Aircraft: </strong><?php if($afaAirCraft->getName()) echo $afaAirCraft->getName(); else echo "---";?></small></td>
            <td width="215" valign="top" align="left"><small><strong>N Number: </strong><?php if($afaLeg->getNNumber()) echo $afaLeg->getNNumber(); else echo "---";?></small></td>
            <td width="215" valign="top" align="left"><small>&nbsp;</small></td>
        </tr>
    <?php } else { ?>

    <?php if($mleg->getPilotId()){?>
    <tr>
      <td width="215" valign="top" align="left"><small><strong>Pilot: </strong><?php if($pilot_person->getFirstName()) echo $pilot_person->getTitle().'&nbsp;'.$pilot_person->getFirstName().'&nbsp;'.$pilot_person->getLastName(); else echo "---";?></small></td>
      <td width="530" colspan="2" valign="top" align="left"><small><strong>Phone: </strong> Work: <?php if($pilot_person->getDayPhone()) echo $pilot_person->getDayPhone(); else echo "---";?>  Home: <?php if($pilot_person->getEveningPhone()) echo $pilot_person->getEveningPhone(); else echo "---";?>  Fax: <?php if($pilot_person->getFaxPhone1()) echo $pilot_person->getFaxPhone1(); else echo "---";?>  Cell: <?php if($pilot_person->getMobilePhone()) echo $pilot_person->getMobilePhone(); else echo "---";?>  Email: <?php if($pilot_person->getEmail()) echo $pilot_person->getEmail(); else echo "---";?></small></td>
    </tr>
    <?php
    foreach ($pilot_aircrafts as $pilot_aircraft) {
        $aircraft=$pilot_aircraft->getAircraft();
     ?>
    <tr>
        <td width="215" valign="top" align="left"><small><strong>--&gt;Aircraft: </strong><?php if($aircraft->getName()) echo $aircraft->getName(); else echo "---";?></small></td>
        <td width="215" valign="top" align="left"><small><strong>N Number: </strong><?php if($pilot_aircraft->getNNumber()) echo $pilot_aircraft->getNNumber(); else echo "---";?></small></td>
        <td width="215" valign="top" align="left"><small> Seats: <?php if($pilot_aircraft->getSeats()) echo $pilot_aircraft->getSeats(); else echo "---";?> Ice <strong> No </strong> <?php if($pilot_aircraft->getKnownIce()) echo $pilot_aircraft->getKnownIce(); else echo "---";?></small></td>

    </tr>
    <?php } ?>
    <?php } else {?>
        <td colspan="3"><small><strong>Pilot : Not assigned</strong></small></td>
    <?php
        }
    }
    ?>

<tr>
<td colspan="3"><hr></td>
</tr>
</table>
<?php
         }
    }
  ?>
<table border="1" cellpadding="4" width="650" cellspacing="0">
<tr>
<td colspan="5"><strong><small>COMPANIONS AND MISSION WEIGHT</small></strong></td>
</tr>
<tr>
<td width="200" valign="top" align="left"><small><strong>Companion name</strong></small></td>
<td width="200" valign="top" align="left"><small><strong>Relationship</strong></small></td>
<td width="75" valign="top" align="left"><small><strong>DOB</strong></small></td>
<td width="75" valign="top" align="left"><small><strong>Weight</strong></small></td>
<td width="100" valign="top" align="left"><small><strong>Phone</strong></small></td>
</tr>
<?php $totalWeight=0; foreach ($companions as $companion) { $totalWeight+=$companion->getWeight();?>
<tr>
<td width="200" valign="top" align="left"><small><?php if($companion->getName()) echo $companion->getName(); else echo "---";?></small></td>
<td width="200" valign="top" align="left"><small><?php if($companion->getRelationship()) echo $companion->getRelationship(); else echo "---";?></small></td>
<td width="75" valign="top" align="left"><small><?php if($companion->getDateOfBirth('m/d/Y')) echo $companion->getDateOfBirth('m/d/Y'); else echo "---";?></small></td>
<td width="75" valign="top" align="left"><small><?php if($companion->getWeight()) echo $companion->getWeight(); else echo "---";?></small></td>
<td width="100" valign="top" align="left"><small><?php if($companion->getCompanionPhone()) echo $companion->getCompanionPhone(); else echo "---";?></small></td>
</tr>
<?php } ?>
<tr>
<td width="475" colspan="3" valign="top" align="left"><small><strong>Baggage: </strong><?php echo $baggageDesc;?></small></td>
<td width="75" valign="top" align="left"><small><?php echo number_format($baggageWeight); //echo $totabaggage; //Total lage baggage weight?></small></td>
<td width="100"><small>&nbsp;</small></td>
</tr>
<tr>
<td colspan="3" valign="top" align="right"><small><strong>Total Mission Weight (passenger, companion(s), baggage): </strong></small></td>
<td width="75" valign="top" align="left"><small><?php echo number_format($totalWeight+$totabaggage+$passenger->getWeight());?></small></td>
<td width="100"><small>&nbsp;</small></td>
</tr>
</table>
<table border="0" cellpadding="2" width="650" cellspacing="0">
<tr><td colspan="4"><hr></td></tr>
<tr>
<td width="100%" valign="top" align="left" colspan="2"><strong>COMMENTS AND OTHER INFORMATION</strong></td>
</tr>
<tr>
<td width="125" valign="top" align="right"><small><strong>Pub. Cons.:</strong></small></td>

<td valign="top" align="left" width="75%"><small><?php if($passenger->getPublicConsiderations()) echo $passenger->getPublicConsiderations(); else echo "--";?></small></td>
</tr>
<tr>
<td width="125" valign="top" align="right"><small><strong>Mission Comments:</strong></small></td>
<td valign="top" align="left" width="75%"><small><?php if($mission->getMissionSpecificComments()) echo $mission->getMissionSpecificComments(); else echo "---";?></small></td>
</tr>
</table>
</td>
</tr>
</table>
    <p style="page-break-after:always"><em><small>For more information, contact the coordinator or log on to the web site.</small></em></p>
</body>
</html>