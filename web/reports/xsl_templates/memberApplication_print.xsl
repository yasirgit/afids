<xsl:stylesheet version="1.0" xmlns:xsl="http://www.w3.org/1999/XSL/Transform">
<xsl:include href="settings.xsl"/>
<xsl:output method="html"/>
<xsl:template match="/">

<table border="1" cellpadding="2" width="525" cellspacing="0">
	<tr>
		<td style="background-color: rgb(200, 200, 200)" width="524" valign="top" align="center">
			<span style='font-weight:bold;color: rgb(232, 53, 66)'>SECTION 1 PILOTS AND NON-PILOTS</span>
		</td>
	</tr>
</table>
<table border="1" cellpadding="2" width="525" cellspacing="0" bordercolor="gray">
	<tr>
  	<td style="background-color: rgb(240, 240, 240)" width="75" valign="top" align="right"><span style="font-weight:bold;color: rgb(52, 121, 190);">Name:</span></td>
    <td width="187" valign="top" align="left"><xsl:value-of select=".//firstName"/><xsl:text> </xsl:text><xsl:value-of select=".//lastName"/><xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text></td>
    <td width="75" valign="top" align="right">Date:</td>
    <td width="187" valign="top" align="left"><xsl:value-of select=".//applicationDate"/><xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text></td>
	</tr>
  <tr>
  	<td width="75" valign="top" align="right">MemberID:</td>
    <td width="449" colspan="3" valign="top" align="left"><xsl:value-of select=".//externalID"/><xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text></td>
  </tr>
  <tr>
  	<td width="75" valign="top" align="right">Address:</td>
		<td width="187" valign="top" align="left">
			<xsl:value-of select=".//address1"/>
	  	<xsl:choose>
	     	<xsl:when test=".//address2">
					<br/><xsl:value-of select=".//address2"/>
				</xsl:when>
	    </xsl:choose>
	    <br/><xsl:value-of select=".//city"/>,<xsl:text></xsl:text> <xsl:value-of select=".//state"/><xsl:text> </xsl:text><xsl:value-of select=".//zipcode"/>
			<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text>
		</td>
    <td width="75" valign="top" align="right">Phone(s):</td>
    <td width="187" valign="top" align="left">
			<xsl:choose>
     		<xsl:when test=".//dayPhone">
					Day:<xsl:text> </xsl:text><xsl:value-of select=".//dayPhone"/><xsl:text> </xsl:text><xsl:value-of select=".//dayComment"/>
				</xsl:when>
			</xsl:choose>
			<xsl:choose>
     		<xsl:when test=".//evePhone">
					<br/>Eve:<xsl:text> </xsl:text><xsl:value-of select=".//evePhone"/><xsl:text> </xsl:text><xsl:value-of select=".//eveComment"/>
				</xsl:when>
			</xsl:choose>
			<xsl:choose>
	    	<xsl:when test=".//pagerPhone">
					<br/>Pager:<xsl:text> </xsl:text><xsl:value-of select=".//pagerPhone"/><xsl:text> </xsl:text><xsl:value-of select=".//pagerComment"/>
				</xsl:when>
			</xsl:choose>
			<xsl:choose>
	    	<xsl:when test=".//mobilePhone">
					<br/>Cell:<xsl:text> </xsl:text><xsl:value-of select=".//mobilePhone"/><xsl:text> </xsl:text><xsl:value-of select=".//mobileComment"/>
				</xsl:when>
			</xsl:choose>
			<xsl:choose>
	    	<xsl:when test=".//otherPhone">
					<br/>Other:<xsl:text> </xsl:text><xsl:value-of select=".//otherPhone"/><xsl:text> </xsl:text><xsl:value-of select=".//otherComment"/>
				</xsl:when>
			</xsl:choose>
			<xsl:choose>
	    	<xsl:when test=".//faxPhone1">
					<br/>Fax:<xsl:text> </xsl:text><xsl:value-of select=".//faxPhone1"/><xsl:text> </xsl:text><xsl:value-of select=".//faxComment1"/>
				</xsl:when>
			</xsl:choose>
			<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text>
		</td>
	</tr>
	<tr>
  	<td width="75" valign="top" align="right">Email:</td>
    <td width="449" colspan="3" valign="top" align="left">
			<xsl:value-of select=".//email"/>
			<xsl:choose>
	    	<xsl:when test=".//secondaryEmail">
					<br/>Alt: <xsl:text> </xsl:text><xsl:value-of select=".//secondaryEmail"/>
				</xsl:when>
			</xsl:choose>
			<xsl:choose>
	    	<xsl:when test=".//pagerEmail">
					<br/>Mobile: <xsl:text> </xsl:text><xsl:value-of select=".//pagerEmail"/>
				</xsl:when>
			</xsl:choose>
			<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text>
		</td>
  </tr>
  <tr>
  	<td width="75" valign="top" align="right">Company Name:</td>
    <td width="187" valign="top" align="left">
			<xsl:value-of select=".//companyName"/>
			<xsl:choose>
	     	<xsl:when test=".//companyPosition">
					<br/>Title: <xsl:text> </xsl:text><xsl:value-of select=".//companyPosition"/>
				</xsl:when>
			</xsl:choose>
			<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text>
		</td>
    <td width="75" valign="top" align="right">Company match funds?:</td>
    <td width="187" valign="top" align="left"><xsl:value-of select=".//companyMatchFunds"/><xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text></td>
	</tr>
  <tr>
  	<td width="75" valign="top" align="right">Spouse Name:</td>
    <td width="449" colspan="3" valign="top" align="left"><xsl:value-of select=".//spouseFirstName"/><xsl:text> </xsl:text><xsl:value-of select=".//spouseLastName"/><xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text></td>
	</tr>
  <tr>
  	<td width="75" valign="top" align="right">Other languages:</td>
    <td width="449" colspan="3" valign="top" align="left"><xsl:value-of select=".//languages"/><xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text></td>
  </tr>
  <tr>
  	<td width="75" valign="top" align="right">Applicant pilot:</td>
    <td width="187" valign="top" align="left"><xsl:value-of select=".//applicantPilot"/><xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text></td>
    <td width="75" valign="top" align="right">Spouse pilot:</td>
    <td width="187" valign="top" align="left"><xsl:value-of select=".//spousePilot"/><xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text></td>
	</tr>
  <tr>
		<td width="75" valign="top" align="right">Referral:</td>
    <td width="187" valign="top" align="left"><xsl:value-of select=".//referralSource"/><xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text></td>
    <td width="75" valign="top" align="right"><xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text></td>
    <td width="187" valign="top" align="left"><xsl:value-of select=".//referralSourceOther"/><xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text></td>
  </tr>
  <tr>
  	<td width="75" colspan="3" valign="top" align="right">If a non-pilot, would you like to fly as a mission assistant:</td>
    <td width="449" valign="top" align="left"><xsl:value-of select=".//applicantCopilot"/><xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text></td>
  </tr>
</table>
<table border="1" cellpadding="2" width="525" cellspacing="0">
	<tr>
		<td style="background-color: rgb(200, 200, 200)" width="524" valign="top" align="center">
			<span style='font-weight:bold;color: rgb(232, 53, 66)'>SECTION 2 PILOTS ONLY</span>
		</td>
	</tr>
	</table>
<table border="2" cellpadding="2" width="525" cellspacing="0">
	<tr>
  	<td width="75" valign="top" align="right">Home Base:<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text></td>
    <td width="187" valign="top" align="left"><xsl:value-of select=".//homeBase"/><xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text></td>
    <td width="75" valign="top" align="right">FBO(s):<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text></td>
    <td width="187" valign="top" align="left"><xsl:value-of select=".//fboName"/><xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text></td>
	</tr>
  <tr>
  	<td width="75" valign="top" align="right">Height:<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text></td>
    <td width="187" valign="top" align="left"><xsl:value-of select=".//height"/><xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text></td>
    <td width="75" valign="top" align="right">Weight:<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text></td>
    <td width="187" valign="top" align="left"><xsl:value-of select=".//weight"/><xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text></td>
  </tr>
  <tr>
  	<td width="75" valign="top" align="right">Insurance Agreed:<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text></td>
    <td width="449" colspan="3" valign="top" align="left"><xsl:value-of select=".//insuranceAgreed"/><xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text></td>
  </tr>
  <tr>
  	<td width="75" valign="top" align="right">Pilot certificate:<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text><xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text></td>
    <td width="187" valign="top" align="left"><xsl:value-of select=".//pilotCertificate"/><xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text><xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text></td>
    <td width="75" valign="top" align="right">Total hours:<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text><xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text></td>
    <td width="187" valign="top" align="left"><xsl:value-of select=".//totalHours"/><xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text><xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text></td>
	</tr>
	<tr>
  	<td width="75" valign="top" align="right">Date of Birth:</td>
    <td width="187" valign="top" align="left"><xsl:value-of select=".//dateOfBirth"/><xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text><xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text></td>
    <td width="75" valign="top" align="right">Other hours:</td>
    <td width="187" valign="top" align="left">
			IFR: <xsl:value-of select=".//ifrHours"/>
			Multi: <xsl:value-of select=".//multiHours"/>
			<xsl:choose>
	   		<xsl:when test=".//otherHours">
					Other: <xsl:value-of select=".//otherHours"/>
	   		</xsl:when>
			</xsl:choose>
		</td>
	</tr>
	<tr>
		<td width="75" valign="top" align="right">Rating(s):</td>
    <td width="449" colspan="3" valign="top" align="left"><xsl:value-of select=".//ratings"/><xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text></td>
	</tr>
	<tr>
    <td width="524" colspan="4" valign="top" align="center">
			<table border="1" cellpadding="2" width="516" cellspacing="0">
				<tr>
					<td colspan="6" align="center">Aircraft</td>
				</tr>
				<tr>
					<td>Make/Model</td>
					<td>Own</td>
					<td>Seats</td>
					<td>Icing</td>
					<td>Seats</td>
					<td>Tail #</td>
				</tr>
				<tr>
					<td><xsl:value-of select=".//apMake"/><xsl:text> </xsl:text><xsl:value-of select=".//apModel"/><xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text></td>
					<td><xsl:value-of select=".//aircraftPrimaryOwn"/><xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text></td>
					<td><xsl:value-of select=".//aircraftPrimarySeats"/><xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text></td>
					<td><xsl:value-of select=".//aircraftPrimaryIce"/><xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text></td>
					<td><xsl:value-of select=".//aircraftPrimarySeats"/><xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text></td>
					<td><xsl:value-of select=".//aircraftPrimaryNNumber"/><xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text></td>
				</tr>
				<tr>
					<td><xsl:value-of select=".//asMake"/><xsl:text> </xsl:text><xsl:value-of select=".//asModel"/><xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text></td>
					<td><xsl:value-of select=".//aircraftSecondaryOwn"/><xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text></td>
					<td><xsl:value-of select=".//aircraftSecondarySeats"/><xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text></td>
					<td><xsl:value-of select=".//aircraftSecondaryIce"/><xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text></td>
					<td><xsl:value-of select=".//aircraftSecondarySeats"/><xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text></td>
					<td><xsl:value-of select=".//aircraftSecondaryNNumber"/><xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text></td>
				</tr>
				<tr>
					<td><xsl:value-of select=".//atMake"/><xsl:text> </xsl:text><xsl:value-of select=".//asModel"/><xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text></td>
					<td><xsl:value-of select=".//aircraftThirdOwn"/><xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text></td>
					<td><xsl:value-of select=".//aircraftThirdSeats"/><xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text></td>
					<td><xsl:value-of select=".//aircraftThirdIce"/><xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text></td>
					<td><xsl:value-of select=".//aircraftThirdSeats"/><xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text></td>
					<td><xsl:value-of select=".//aircraftThirdNNumber"/><xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text></td>
				</tr>
			</table>
		</td>
	</tr>
	<tr>
    <td width="524" colspan="4" valign="top" align="center">
			<table border="1" cellpadding="2" width="516" cellspacing="0">
				<tr>
					<td width="516" colspan="6" align="center" valign="top">Availability</td>
				</tr>
				<tr>
					<td width="86" align="left" valign="top">Weekdays</td>
					<td width="86" align="left" valign="top">Weeknights</td>
					<td width="86" align="left" valign="top">Weekends</td>
					<td width="86" align="left" valign="top">With Notice</td>
					<td width="86" align="left" valign="top">Last Minute</td>
					<td width="86" align="left" valign="top">Copilot</td>
				</tr>
				<tr>
					<td width="86" align="left" valign="top"><xsl:value-of select=".//availabilityWeekdays"/><xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text></td>
					<td width="86" align="left" valign="top"><xsl:value-of select=".//availabilityWeeknights"/><xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text></td>
					<td width="86" align="left" valign="top"><xsl:value-of select=".//availabilityWeekends"/><xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text></td>
					<td width="86" align="left" valign="top"><xsl:value-of select=".//availabilityNotice"/><xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text></td>
					<td width="86" align="left" valign="top"><xsl:value-of select=".//availabilityLastMinute"/><xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text></td>
					<td width="86" align="left" valign="top"><xsl:value-of select=".//availabilityCopilot"/><xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text></td>
				</tr>
			</table>
		</td>
	</tr>
</table>
<p style='page-break-after:always'>Continued on Page 2</p>
<table border="2" cellpadding="0" width="525" cellspacing="0">
	<tr>
    <td style="background-color: rgb(200, 200, 200)" width="524" valign="top" align="center">
			<span style='font-weight:bold;color: rgb(232, 53, 66)'>SECTION 3 OTHER INFORMATION</span>
		</td>
	</tr>
</table>
<table border="2" cellpadding="2" width="525" cellspacing="0">
	<tr>
  	<td width="524" colspan="4" valign="top" align="center">
			<table border="1" cellpadding="0" width="516" cellspacing="0">
				<tr>
					<td width="516" colspan="6" align="center" valign="top">Interests</td>
				</tr>
				<tr>
					<td width="172" align="left" valign="top">
						Mission orientation:<xsl:text> </xsl:text><xsl:value-of select=".//missionOrientation"/>
						<br/>Mission coordination:<xsl:text> </xsl:text><xsl:value-of select=".//missionCoordination"/>
						<br/>Pilot recruitment:<xsl:text> </xsl:text><xsl:value-of select=".//pilotRecruitment"/>
						<br/>Fund raising:<xsl:text> </xsl:text><xsl:value-of select=".//fundRaising"/>
						<br/>Celebrities:<xsl:text> </xsl:text><xsl:value-of select=".//celebrityContacts"/>
						<br/>Hospital outreach:<xsl:text> </xsl:text><xsl:value-of select=".//hospitalOutreach"/>
						<br/>Media relations:<xsl:text> </xsl:text><xsl:value-of select=".//mediaRelations"/>
					<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text></td>
					<td width="172" align="left" valign="top">
						Telephone:<xsl:text> </xsl:text><xsl:value-of select=".//telephoneWork"/>
						<br/>Computers:<xsl:text> </xsl:text><xsl:value-of select=".//computers"/>
						<br/>Clerical:<xsl:text> </xsl:text><xsl:value-of select=".//clerical"/>
						<br/>Publicity:<xsl:text> </xsl:text><xsl:value-of select=".//publicity"/>
						<br/>Writing:<xsl:text> </xsl:text><xsl:value-of select=".//writing"/>
						<br/>Speakers bureau:<xsl:text> </xsl:text><xsl:value-of select=".//speakersBureau"/>
						<br/>Wing Team:<xsl:text> </xsl:text><xsl:value-of select=".//wingTeam"/>
					<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text></td>
					<td width="172" align="left" valign="top">
						Graphic arts:<xsl:text> </xsl:text><xsl:value-of select=".//graphicArts"/>
						<br/>Event planning:<xsl:text> </xsl:text><xsl:value-of select=".//eventPlanning"/>
						<br/>Web/Internet:<xsl:text> </xsl:text><xsl:value-of select=".//webInternet"/>
						<br/>Foundations:<xsl:text> </xsl:text><xsl:value-of select=".//foundationContacts"/>
						<br/>Aviation Contacts:<xsl:text> </xsl:text><xsl:value-of select=".//aviationContacts"/>
						<br/>Printing:<xsl:text> </xsl:text><xsl:value-of select=".//printing"/>
					<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text></td>
				</tr>
			</table>
		</td>
	</tr>
  <tr>
  	<td width="100" valign="top" align="right">
			Member AOPA:
			<br/>Member Kiwanis:
			<br/>Member 99s:
		</td>
    <td width="162" valign="top" align="left">
			<xsl:value-of select=".//memberAOPA"/>
			<br/><xsl:value-of select=".//memberKiwanis"/>
			<br/><xsl:value-of select=".//memberNinetyNines"/>
			<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text>
		</td>
    <td width="100" valign="top" align="right">
			Member Rotary:
			<br/>Member Lions:
			<br/>Member WIA:
			<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text>
		</td>
    <td width="162" valign="top" align="left">
			<xsl:value-of select=".//memberRotary"/>
			<br/><xsl:value-of select=".//memberLions"/>
			<br/><xsl:value-of select=".//memberWIA"/>
			<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text>
		</td>
	</tr>
  <tr>
  	<td width="100" valign="top" align="right">Disaster Response Interest:<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text></td>
    <td width="424" colspan="3" valign="top" align="left"><xsl:value-of select=".//hseatsInterest"/><xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text></td>
  </tr>
  <tr>
  	<td width="100" valign="top" align="right">Premium Choice:<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text></td>
    <td width="162" valign="top" align="left"><xsl:value-of select=".//premiumChoice"/><xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text></td>
    <td width="100" valign="top" align="right">Premium Size:<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text></td>
    <td width="162" valign="top" align="left"><xsl:value-of select=".//premiumSize"/><xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text></td>
	</tr>
  <tr>
  	<td width="100" valign="top" align="right">Dues Amt:<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text></td>
    <td width="162" valign="top" align="left"><xsl:value-of select=".//duesAmountPaid"/><xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text></td>
    <td width="100" valign="top" align="right">Method of Payment:<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text></td>
    <td width="162" valign="top" align="left"><xsl:value-of select=".//methodOfPayment"/><xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text></td>
  </tr>
  <tr>
  	<td width="100" valign="top" align="right">Date Processed:<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text></td>
    <td width="162" valign="top" align="left"><xsl:value-of select=".//processedDate"/><xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text></td>
    <td width="100" valign="top" align="right">Novapointe ID:<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text></td>
    <td width="162" valign="top" align="left"><xsl:value-of select=".//novapointeID"/><xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text></td>
  </tr>
  <tr>
  	<td width="100" valign="top" align="right">Premium ship date:<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text></td>
    <td width="162" valign="top" align="left"><xsl:value-of select=".//premiumShipDate"/><xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text></td>
    <td width="100" valign="top" align="right">Ship method:<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text></td>
    <td width="162" valign="top" align="left"><xsl:value-of select=".//premiumShipMethod"/><xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text></td>
  </tr>
	<tr>
  	<td width="100" valign="top" align="right">Tracking #:<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text></td>
    <td width="424" colspan="3" valign="top" align="left"><xsl:value-of select=".//premiumShipTrackingNumber"/><xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text></td>
  </tr>
  <tr>
  	<td width="100" valign="top" align="right">Member book sent:<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text></td>
    <td width="162" valign="top" align="left"><xsl:value-of select=".//notebookSent"/><xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text></td>
    <td width="100" valign="top" align="right">Member badge sent:<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text></td>
    <td width="162" valign="top" align="left"><xsl:value-of select=".//badgeMade"/><xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text></td>
  </tr>
  <tr>
  	<td width="100" valign="top" align="right">Wing Leader email sent:<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text></td>
    <td width="162" valign="top" align="left"><xsl:value-of select=".//WNewMemberNotify"/><xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text></td>
    <td width="100" valign="top" align="right">ED email sent:<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text></td>
    <td width="162" valign="top" align="left"><xsl:value-of select=".//EDNewMemberNotify"/><xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text></td>
  </tr>
</table>

</xsl:template>
</xsl:stylesheet>
