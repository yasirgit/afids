<xsl:stylesheet version="1.0" xmlns:xsl="http://www.w3.org/1999/XSL/Transform">
<xsl:include href="settings.xsl"/>
<xsl:output method="html"/>
<xsl:template match="/">
<div align="left" valign="top">
<table border="0" cellpadding="0" width="760" cellspacing="0">
  <tr>
    <td><div align="left"><table border="0" cellpadding="2" width="760" cellspacing="0">
	<tr>
        	<td width="325" valign="top" align="center"><p style='font-size:10.0pt; font-family:"Bookman";'>
			<img xsl:use-attribute-sets="organizationLogo"/>
			<br/><xsl:value-of select="$organizationAddress1"/>
			<br/>Office Phone <xsl:value-of select="$organizationPhone"/> Fax: <xsl:value-of select="$organizationFax"/></p>
		<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text></td>
        	<td width="325" valign="top" align="center">
			<p style='font-size:14.0pt; font-family:"Bookman";'><strong>MEMBERSHIP APPLICATION</strong></p>
		<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text></td>
	</tr>
    </table>
	<table border="0" cellpadding="0" width="760" cellspacing="0">
	<tr>
        	<td width="760" colspan="2" valign="top" align="center">
			<table border="2" cellpadding="0" width="760" cellspacing="0">
				<tr>
					<td align="center"><span style='font-size:12.0pt; font-family:"Bookman";font-weight:bold;'>SECTION 1: PILOTS AND NON-PILOTS</span></td>
				</tr>
			</table>
		<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text></td>
	</tr>
    </table>
    </div><div align="left">
    <table border="1" cellpadding="2" width="760" cellspacing="0" bordercolor="gray">
      <tr>
        <td width="100" valign="top" align="right"><small><strong>Name:</strong></small><xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text></td>
        <td width="225" valign="top" align="left"><small><xsl:value-of select=".//firstName"/><xsl:text> </xsl:text><xsl:value-of select=".//lastName"/></small><xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text></td>
        <td width="100" valign="top" align="right"><small><strong>Date:</strong></small><xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text></td>
        <td width="225" valign="top" align="left"><small><xsl:value-of select=".//applicationDate"/></small><xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text></td>
      </tr>
      <tr>
        <td width="100" valign="top" align="right"><small><strong>MemberID:</strong></small><xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text></td>
        <td width="550" colspan="3" valign="top" align="left"><small><xsl:value-of select=".//externalID"/></small><xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text></td>
      </tr>
      <tr>
       	<td width="100" valign="top" align="right"><strong><small>Address:</small></strong><xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text></td>
	<td width="225" valign="top" align="left"><small><xsl:value-of select=".//address1"/>
	      <xsl:choose>
	     	<xsl:when test=".//address2">
			<br/><xsl:value-of select=".//address2"/>
		</xsl:when>
	      </xsl:choose>
	      <br/><xsl:value-of select=".//city"/>,<xsl:text></xsl:text> <xsl:value-of select=".//state"/><xsl:text> </xsl:text><xsl:value-of select=".//zipcode"/></small>
	<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text></td>
       	<td width="100" valign="top" align="right"><small><strong>Phone(s):</strong></small><xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text></td>
        <td width="225" valign="top" align="left"><small>
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
		</small><xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text></td>
	</tr>
      <tr>
        <td width="100" valign="top" align="right"><small><strong>Email:</strong></small><xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text></td>
        <td width="550" colspan="3" valign="top" align="left"><small>
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
	</small><xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text></td>
      </tr>
      <tr>
        <td width="100" valign="top" align="right"><small><strong>Company Name:</strong></small><xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text></td>
        <td width="225" valign="top" align="left"><small>
		<xsl:value-of select=".//companyName"/>
		<xsl:choose>
	     		<xsl:when test=".//companyPosition">
				<br/>Title: <xsl:text> </xsl:text><xsl:value-of select=".//companyPosition"/>
			</xsl:when>
		</xsl:choose>
	</small><xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text></td>
        <td width="100" valign="top" align="right"><small><strong>Company match funds?:</strong></small><xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text></td>
        <td width="225" valign="top" align="left"><small><xsl:value-of select=".//companyMatchFunds"/></small><xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text></td>
      </tr>
      <tr>
        <td width="100" valign="top" align="right"><small><strong>Spouse Name:</strong></small><xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text></td>
        <td width="550" colspan="3" valign="top" align="left"><small><xsl:value-of select=".//spouseFirstName"/><xsl:text> </xsl:text><xsl:value-of select=".//spouseLastName"/></small><xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text></td>
      </tr>
      <tr>
        <td width="100" valign="top" align="right"><small><strong>Other languages:</strong></small><xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text></td>
        <td width="550" colspan="3" valign="top" align="left"><small><xsl:value-of select=".//languages"/></small><xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text></td>
      </tr>
      <tr>
        <td width="100" valign="top" align="right"><small><strong>Applicant pilot:</strong></small><xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text></td>
        <td width="225" valign="top" align="left"><small><xsl:value-of select=".//applicantPilot"/></small><xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text></td>
        <td width="100" valign="top" align="right"><small><strong>Spouse pilot:</strong></small><xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text></td>
        <td width="225" valign="top" align="left"><small><xsl:value-of select=".//spousePilot"/></small><xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text></td>
      </tr>
      <tr>
        <td width="100" valign="top" align="right"><small><strong>Referral:</strong></small><xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text></td>
        <td width="225" valign="top" align="left"><small><xsl:value-of select=".//referralSource"/></small><xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text></td>
        <td width="100" valign="top" align="right"><small><xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text></small></td>
        <td width="225" valign="top" align="left"><small><xsl:value-of select=".//referralSourceOther"/></small><xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text></td>
      </tr>
      <tr>
        <td width="550" colspan="3" valign="top" align="right"><small><strong>If a non-pilot, would you like to fly as a mission assistant:</strong></small><xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text></td>
        <td width="100" valign="top" align="left"><small><xsl:value-of select=".//applicantCopilot"/></small><xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text></td>
      </tr>
	</table>
	<table border="2" cellpadding="0" width="760" cellspacing="0">
	<tr>
    <td width="760" colspan="4" valign="top" align="center">
			<span style='font-size:12.0pt; font-family:"Bookman";font-weight:bold;'>SECTION 2: PILOTS ONLY</span>
		</td>
	</tr>
	</table>
      <table border="2" cellpadding="2" width="760" cellspacing="0">
      <tr>
        <td width="100" valign="top" align="right"><small><strong>Home Base:</strong></small><xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text></td>
        <td width="225" valign="top" align="left"><small><xsl:value-of select=".//homeBase"/></small><xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text></td>
        <td width="100" valign="top" align="right"><small><strong>FBO(s):</strong></small><xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text></td>
        <td width="225" valign="top" align="left"><small><xsl:value-of select=".//fboName"/></small><xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text></td>
      </tr>
      <tr>
        <td width="100" valign="top" align="right"><small><strong>Height:</strong></small><xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text></td>
        <td width="225" valign="top" align="left"><small><xsl:value-of select=".//height"/></small><xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text></td>
        <td width="100" valign="top" align="right"><small><strong>Weight:</strong></small><xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text></td>
        <td width="225" valign="top" align="left"><small><xsl:value-of select=".//weight"/></small><xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text></td>
      </tr>
      <tr>
        <td width="100" valign="top" align="right"><small><strong>Insurance Agreed:</strong></small><xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text></td>
        <td width="550" colspan="3" valign="top" align="left"><small><xsl:value-of select=".//insuranceAgreed"/></small><xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text></td>
      </tr>
      <tr>
        <td width="100" valign="top" align="right"><small><strong>Pilot certificate:</strong></small><xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text><xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text></td>
        <td width="225" valign="top" align="left"><small><xsl:value-of select=".//pilotCertificate"/></small><xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text><xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text></td>
        <td width="100" valign="top" align="right"><small><strong>Total hours:</strong></small><xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text><xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text></td>
        <td width="225" valign="top" align="left"><small><xsl:value-of select=".//totalHours"/></small><xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text><xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text></td>
      </tr>
      <tr>
        <td width="100" valign="top" align="right"><small><strong>Date of Birth:</strong></small><xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text><xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text></td>
        <td width="225" valign="top" align="left"><small><xsl:value-of select=".//dateOfBirth"/></small><xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text><xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text></td>
        <td width="100" valign="top" align="right"><small><strong>Other hours:</strong></small><xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text><xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text></td>
        <td width="225" valign="top" align="left"><small>
	IFR: <xsl:value-of select=".//ifrHours"/>
	Multi: <xsl:value-of select=".//multiHours"/>
	<xsl:choose>
	   <xsl:when test=".//otherHours">
		Other: <xsl:value-of select=".//otherHours"/>
	   </xsl:when>
	</xsl:choose>
	</small><xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text><xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text></td>
      </tr>
	<tr>
        	<td width="100" valign="top" align="right"><small><strong>Rating(s):</strong></small><xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text></td>
        	<td width="550" colspan="3" valign="top" align="left"><small><xsl:value-of select=".//ratings"/></small><xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text></td>
	</tr>
	<tr>
        	<td width="760" colspan="4" valign="top" align="center">
			<table border="1" cellpadding="2" width="639" cellspacing="0">
				<tr>
					<td colspan="6" align="left"><small><strong>Aircraft</strong></small><xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text></td>
				</tr>
				<tr>
					<td><small><strong>Make/Model</strong></small><xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text></td>
					<td><small><strong>Own</strong></small><xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text></td>
					<td><small><strong>Seats</strong></small><xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text></td>
					<td><small><strong>Icing</strong></small><xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text></td>
					<td><small><strong>Seats</strong></small><xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text></td>
					<td><small><strong>Tail #</strong></small><xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text></td>
				</tr>
				<tr>
					<td><small><xsl:value-of select=".//apMake"/><xsl:text> </xsl:text><xsl:value-of select=".//apModel"/></small><xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text></td>
					<td><small><xsl:value-of select=".//aircraftPrimaryOwn"/></small><xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text></td>
					<td><small><xsl:value-of select=".//aircraftPrimarySeats"/></small><xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text></td>
					<td><small><xsl:value-of select=".//aircraftPrimaryIce"/></small><xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text></td>
					<td><small><xsl:value-of select=".//aircraftPrimarySeats"/></small><xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text></td>
					<td><small><xsl:value-of select=".//aircraftPrimaryNNumber"/></small><xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text></td>
				</tr>
				<tr>
					<td><small><xsl:value-of select=".//asMake"/><xsl:text> </xsl:text><xsl:value-of select=".//asModel"/></small><xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text></td>
					<td><small><xsl:value-of select=".//aircraftSecondaryOwn"/></small><xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text></td>
					<td><small><xsl:value-of select=".//aircraftSecondarySeats"/></small><xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text></td>
					<td><small><xsl:value-of select=".//aircraftSecondaryIce"/></small><xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text></td>
					<td><small><xsl:value-of select=".//aircraftSecondarySeats"/></small><xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text></td>
					<td><small><xsl:value-of select=".//aircraftSecondaryNNumber"/></small><xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text></td>
				</tr>
				<tr>
					<td><small><xsl:value-of select=".//atMake"/><xsl:text> </xsl:text><xsl:value-of select=".//asModel"/></small><xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text></td>
					<td><small><xsl:value-of select=".//aircraftThirdOwn"/></small><xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text></td>
					<td><small><xsl:value-of select=".//aircraftThirdSeats"/></small><xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text></td>
					<td><small><xsl:value-of select=".//aircraftThirdIce"/></small><xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text></td>
					<td><small><xsl:value-of select=".//aircraftThirdSeats"/></small><xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text></td>
					<td><small><xsl:value-of select=".//aircraftThirdNNumber"/></small><xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text></td>
				</tr>
			</table>
		<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text></td>
	</tr>
	<tr>
        	<td width="760" colspan="4" valign="top" align="center">
			<table border="1" cellpadding="0" width="639" cellspacing="0">
				<tr>
					<td width="618" colspan="6" align="left" valign="top"><small><strong>Availability</strong></small><xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text></td>
				</tr>
				<tr>
					<td width="103" align="left" valign="top"><small><strong>Weekdays</strong></small><xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text></td>
					<td width="103" align="left" valign="top"><small><strong>Weeknights</strong></small><xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text></td>
					<td width="103" align="left" valign="top"><small><strong>Weekends</strong></small><xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text></td>
					<td width="103" align="left" valign="top"><small><strong>With Notice</strong></small><xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text></td>
					<td width="103" align="left" valign="top"><small><strong>Last Minute</strong></small><xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text></td>
					<td width="103" align="left" valign="top"><small><strong>Copilot</strong></small><xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text></td>
				</tr>
				<tr>
					<td width="103" align="left" valign="top"><small><xsl:value-of select=".//availabilityWeekdays"/></small><xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text></td>
					<td width="103" align="left" valign="top"><small><xsl:value-of select=".//availabilityWeeknights"/></small><xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text></td>
					<td width="103" align="left" valign="top"><small><xsl:value-of select=".//availabilityWeekends"/></small><xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text></td>
					<td width="103" align="left" valign="top"><small><xsl:value-of select=".//availabilityNotice"/></small><xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text></td>
					<td width="103" align="left" valign="top"><small><xsl:value-of select=".//availabilityLastMinute"/></small><xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text></td>
					<td width="103" align="left" valign="top"><small><xsl:value-of select=".//availabilityCopilot"/></small><xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text></td>
				</tr>
			</table>
		<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text></td>
	</tr>
	</table>
	<table border="2" cellpadding="0" width="760" cellspacing="0">
	<tr>
     <td width="760" colspan="4" valign="top" align="center">
			<span style='font-size:12.0pt; font-family:"Bookman";font-weight:bold'>SECTION 3: OTHER INFORMATION</span>
		 </td>
	</tr>
	</table>
	<table border="2" cellpadding="2" width="760" cellspacing="2">
	<tr>
        	<td width="760" colspan="4" valign="top" align="center">
			<table border="1" cellpadding="0" width="636" cellspacing="0">
				<tr>
					<td width="639" colspan="6" align="left" valign="top"><small><strong>Interests</strong></small><xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text></td>
				</tr>
				<tr>
					<td width="215" align="left" valign="top"><small>
						Mission orientation:<xsl:text> </xsl:text><xsl:value-of select=".//missionOrientation"/>
						<br/>Mission coordination:<xsl:text> </xsl:text><xsl:value-of select=".//missionCoordination"/>
						<br/>Pilot recruitment:<xsl:text> </xsl:text><xsl:value-of select=".//pilotRecruitment"/>
						<br/>Fund raising:<xsl:text> </xsl:text><xsl:value-of select=".//fundRaising"/>
						<br/>Celebrities:<xsl:text> </xsl:text><xsl:value-of select=".//celebrityContacts"/>
						<br/>Hospital outreach:<xsl:text> </xsl:text><xsl:value-of select=".//hospitalOutreach"/>
						<br/>Media relations:<xsl:text> </xsl:text><xsl:value-of select=".//mediaRelations"/>
					</small><xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text></td>
					<td width="215" align="left" valign="top"><small>
						Telephone:<xsl:text> </xsl:text><xsl:value-of select=".//telephoneWork"/>
						<br/>Computers:<xsl:text> </xsl:text><xsl:value-of select=".//computers"/>
						<br/>Clerical:<xsl:text> </xsl:text><xsl:value-of select=".//clerical"/>
						<br/>Publicity:<xsl:text> </xsl:text><xsl:value-of select=".//publicity"/>
						<br/>Writing:<xsl:text> </xsl:text><xsl:value-of select=".//writing"/>
						<br/>Speakers bureau:<xsl:text> </xsl:text><xsl:value-of select=".//speakersBureau"/>
						<br/>Wing Team:<xsl:text> </xsl:text><xsl:value-of select=".//wingTeam"/>
					</small><xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text></td>
					<td width="215" align="left" valign="top"><small>
						Graphic arts:<xsl:text> </xsl:text><xsl:value-of select=".//graphicArts"/>
						<br/>Event planning:<xsl:text> </xsl:text><xsl:value-of select=".//eventPlanning"/>
						<br/>Web/Internet:<xsl:text> </xsl:text><xsl:value-of select=".//webInternet"/>
						<br/>Foundations:<xsl:text> </xsl:text><xsl:value-of select=".//foundationContacts"/>
						<br/>Aviation Contacts:<xsl:text> </xsl:text><xsl:value-of select=".//aviationContacts"/>
						<br/>Printing:<xsl:text> </xsl:text><xsl:value-of select=".//printing"/>
					</small><xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text></td>
				</tr>
			</table>
		<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text></td>
	</tr>
      <tr>
        <td width="200" valign="top" align="right"><small><strong>
		Member AOPA:
		<br/>Member Kiwanis:
		<br/>Member 99s:
	</strong></small><xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text></td>
        <td width="125" valign="top" align="left"><small>
		<xsl:value-of select=".//memberAOPA"/>
		<br/><xsl:value-of select=".//memberKiwanis"/>
		<br/><xsl:value-of select=".//memberNinetyNines"/>
	</small><xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text></td>
        <td width="200" valign="top" align="right"><small><strong>
		Member Rotary:
		<br/>Member Lions:
		<br/>Member WIA:
	</strong></small><xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text></td>
        <td width="125" valign="top" align="left"><small>
		<xsl:value-of select=".//memberRotary"/>
		<br/><xsl:value-of select=".//memberLions"/>
		<br/><xsl:value-of select=".//memberWIA"/>
	</small><xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text></td>
      </tr>
      <tr>
        <td width="200" valign="top" align="right"><small><strong>Disaster Response Interest:</strong></small><xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text></td>
        <td width="450" colspan="3" valign="top" align="left"><small><xsl:value-of select=".//hseatsInterest"/></small><xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text></td>
      </tr>
      <tr>
        <td width="200" valign="top" align="right"><small><strong>Premium Choice:</strong></small><xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text></td>
        <td width="125" valign="top" align="left"><small><xsl:value-of select=".//premiumChoice"/></small><xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text></td>
        <td width="200" valign="top" align="right"><small><strong>Premium Size:</strong></small><xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text></td>
        <td width="125" valign="top" align="left"><small><xsl:value-of select=".//premiumSize"/></small><xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text></td>
      </tr>
      <tr>
        <td width="200" valign="top" align="right"><small><strong>Dues Amt:</strong></small><xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text></td>
        <td width="125" valign="top" align="left"><small><xsl:value-of select=".//duesAmountPaid"/></small><xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text></td>
        <td width="200" valign="top" align="right"><small><strong>Method of Payment:</strong></small><xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text></td>
        <td width="125" valign="top" align="left"><small><xsl:value-of select=".//methodOfPayment"/></small><xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text></td>
      </tr>
      <tr>
        <td width="200" valign="top" align="right"><small><strong>Date Processed:</strong></small><xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text></td>
        <td width="125" valign="top" align="left"><small><xsl:value-of select=".//processedDate"/></small><xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text></td>
        <td width="200" valign="top" align="right"><small><strong>Novapointe ID:</strong></small><xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text></td>
        <td width="125" valign="top" align="left"><small><xsl:value-of select=".//novapointeID"/></small><xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text></td>
      </tr>
      <tr>
        <td width="200" valign="top" align="right"><small><strong>Premium ship date:</strong></small><xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text></td>
        <td width="125" valign="top" align="left"><small><xsl:value-of select=".//premiumShipDate"/></small><xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text></td>
        <td width="200" valign="top" align="right"><small><strong>Ship method:</strong></small><xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text></td>
        <td width="125" valign="top" align="left"><small><xsl:value-of select=".//premiumShipMethod"/></small><xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text></td>
      </tr>
      <tr>
        <td width="200" valign="top" align="right"><small><strong>Tracking #:</strong></small><xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text></td>
        <td width="450" colspan="3" valign="top" align="left"><small><xsl:value-of select=".//premiumShipTrackingNumber"/></small><xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text></td>
      </tr>
      <tr>
        <td width="200" valign="top" align="right"><small><strong>Member book sent:</strong></small><xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text></td>
        <td width="125" valign="top" align="left"><small><xsl:value-of select=".//notebookSent"/></small><xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text></td>
        <td width="200" valign="top" align="right"><small><strong>Member badge sent:</strong></small><xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text></td>
        <td width="125" valign="top" align="left"><small><xsl:value-of select=".//badgeMade"/></small><xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text></td>
      </tr>
      <tr>
        <td width="200" valign="top" align="right"><small><strong>Wing Leader email sent:</strong></small><xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text></td>
        <td width="125" valign="top" align="left"><small><xsl:value-of select=".//WNewMemberNotify"/></small><xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text></td>
        <td width="200" valign="top" align="right"><small><strong>ED email sent:</strong></small><xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text></td>
        <td width="125" valign="top" align="left"><small><xsl:value-of select=".//EDNewMemberNotify"/></small><xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text></td>
      </tr>
    </table>
    </div>
<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text></td>
</tr>
</table>
</div>

</xsl:template>
</xsl:stylesheet>
