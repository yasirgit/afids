<xsl:stylesheet version="1.0" xmlns:xsl="http://www.w3.org/1999/XSL/Transform">
<xsl:output method="html" />
<xsl:strip-space elements="*"/>

<xsl:template match="/">
<table style="width:750px; border-collapse:collapse; margin:8px 0 0;" border="1" cellpadding="2" bordercolor="#a6bee0" width="750">
	<thead>
	<tr>
		<th style="color:#153f7a;font-weight:bold;height:24px" bgcolor="#cfe1fc" width="250" align="left"><b>Member Name</b></th>
		<th style="color:#153f7a;font-weight:bold;height:24px" bgcolor="#cfe1fc" width="250" align="left"><b>Contact Info</b></th>
		<th style="color:#153f7a;font-weight:bold;height:24px" bgcolor="#cfe1fc" width="250" align="left"><b>Pilot Info</b></th>
	</tr>
  </thead>
  <tbody>
	<xsl:for-each select=".//record">
	<xsl:if test="not(preceding-sibling::node()[personID = current()/personID])">
   <tr nobr="true">
		<td style="height:24px" width="250" align="left" valign="top">
			<b><xsl:value-of select="firstName"/><xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text><xsl:value-of select="lastName"/></b>
			<br/>Date: <xsl:value-of select="applicationDate"/>
			<br/><xsl:value-of select="address"/>
			<br/><xsl:value-of select="city"/>,<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text><xsl:value-of select="state"/><xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text><xsl:value-of select="zipcode"/>
			<br/>Status: <xsl:if test="active='1'">Active</xsl:if><xsl:if test="active='0'">Inactive</xsl:if>
			<br/>Disaster Response Interest: <xsl:if test="disasterResponseInterest='1'">Yes</xsl:if><xsl:if test="disasterResponseInterest='0'">No</xsl:if>
			<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text>
		</td>
		<td style="height:24px" width="250" align="left" valign="top">
			<xsl:if test="dayPhone!=''"><xsl:value-of select="dayPhone"/> <xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text>Work</xsl:if>
			<xsl:if test="evePhone!=''"><br/><xsl:value-of select="evePhone"/> <xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text>Home</xsl:if>
			<xsl:if test="mobilePhone!=''"><br/><xsl:value-of select="mobilePhone"/> <xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text>Mobile</xsl:if>
			<xsl:if test="pagerPhone!=''"><br/><xsl:value-of select="pagerPhone"/> <xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text>Pager</xsl:if>
			<xsl:if test="otherPhone!=''"><br/><xsl:value-of select="otherPhone"/> <xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text>Other</xsl:if>
			<br/><xsl:value-of select="email"/>		
			<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text>
		</td>
		<td style="height:24px" width="250" align="left" valign="top">
			Spouse Pilot?: <xsl:if test="spousePilot = 1">Yes</xsl:if><xsl:if test="spousePilot = 0">No</xsl:if>
			<br/>Company Name: <xsl:value-of select="companyName"/>
			<br/>Position: <xsl:value-of select="companyPosition"/>
			<br/>Referral Source: <xsl:value-of select="refSourceName"/>
			<xsl:if test="memberAOPA=1"><br/>AOPA member</xsl:if>
			<xsl:if test="memberKiwanis=1"><br/>Kiwanis member</xsl:if>
			<xsl:if test="memberRotary=1"><br/>Rotary member</xsl:if>
			<xsl:if test="memberLions=1"><br/>Lions member</xsl:if>
			<xsl:if test="member99s=1"><br/>99's member</xsl:if>
			<xsl:if test="memberWIA=1"><br/>WIA member</xsl:if>
			<xsl:if test="missionOrientation = 1"><br/>Mission Orientation</xsl:if>
			<xsl:if test="missionCoordination = 1"><br/>Mission Coordination</xsl:if>
			<xsl:if test="pilotRecruitment = 1"><br/>Pilot Recruitment</xsl:if>
			<xsl:if test="fundRaising = 1"><br/>Fund Raising</xsl:if>
			<xsl:if test="celebrityContacts = 1"><br/>Celebrity Contacts</xsl:if>
			<xsl:if test="graphicArts = 1"><br/>Graphic Arts</xsl:if>
			<xsl:if test="hospitalOutreach = 1"><br/>Hospital Outreach</xsl:if>
			<xsl:if test="eventPlanning = 1"><br/>Event Planning</xsl:if>
			<xsl:if test="mediaRelations = 1"><br/>Media Relations</xsl:if>
			<xsl:if test="telephoneWork = 1"><br/>Telephone Work</xsl:if>
			<xsl:if test="computers = 1"><br/>Computers</xsl:if>
			<xsl:if test="clerical = 1"><br/>Clerical</xsl:if>
			<xsl:if test="printing = 1"><br/>Printing</xsl:if>
			<xsl:if test="writing = 1"><br/>Writing</xsl:if>
			<xsl:if test="speakersBureau = 1"><br/>Speakers Bureau</xsl:if>
			<xsl:if test="wingTeam = 1"><br/>Wing Team</xsl:if>
			<xsl:if test="webInternet = 1"><br/>Web/Internet</xsl:if>
			<xsl:if test="foundationContacts = 1"><br/>Foundation Contacts</xsl:if>
			<xsl:if test="aviationContacts = 1"><br/>Aviation Contacts</xsl:if>
			<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text>
		</td>
   </tr>
	</xsl:if>
	</xsl:for-each>
	</tbody>
	</table>
</xsl:template>
</xsl:stylesheet>
