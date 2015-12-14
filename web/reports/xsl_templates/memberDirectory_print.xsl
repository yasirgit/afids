<xsl:stylesheet version="1.0" xmlns:xsl="http://www.w3.org/1999/XSL/Transform">
<xsl:output method="html" />
<xsl:strip-space elements="*"/>

<xsl:template match="/">
<table style="width:525px; border-collapse:collapse; margin:8px 0 0;" border="1" cellpadding="2" bordercolor="#a6bee0" width="525">
	<thead>
	<tr>
		<th width="175" align="left"><b>Member Name</b></th>
		<th width="175" align="left"><b>Contact Info</b></th>
		<th width="175" align="left"><b>Pilot Info</b></th>
	</tr>
  </thead>
  <tbody>
	<xsl:for-each select=".//record">
	<xsl:if test="not(preceding-sibling::node()[personID = current()/personID])">
   <tr nobr="true">
		<td width="175" align="left" valign="top">
			<b><xsl:value-of select="firstName"/><xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text><xsl:value-of select="lastName"/></b>
			<xsl:if test="addressone!=''"><br/><xsl:value-of select="addressone"/></xsl:if>
			<xsl:if test="addresstwo!=''"><br/><xsl:value-of select="addresstwo"/></xsl:if>
			<xsl:if test="city!='' or state!='' or zipcode!=''">
				<br/><xsl:value-of select="city"/>,<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text><xsl:value-of select="state"/><xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text><xsl:value-of select="zipcode"/>
			</xsl:if>
			<xsl:if test="dateofbirth!=''"><br/>DOB:<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text><xsl:value-of select="dateofbirth"/></xsl:if>
			<xsl:if test="dayPhone!=''"><br/><xsl:value-of select="dayPhone"/> <xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text>Work</xsl:if>
			<xsl:if test="evePhone!=''"><br/><xsl:value-of select="evePhone"/> <xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text>Home</xsl:if>
			<xsl:if test="mobilePhone!=''"><br/><xsl:value-of select="mobilePhone"/> <xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text>Mobile</xsl:if>
			<xsl:if test="pagerPhone!=''"><br/><xsl:value-of select="pagerPhone"/> <xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text>Pager</xsl:if>
			<xsl:if test="faxPhone1!=''"><br/><xsl:value-of select="faxPhone"/> <xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text>Fax</xsl:if>
			<xsl:if test="faxPhone2!=''"><br/><xsl:value-of select="faxPhone2"/> <xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text>Fax Alt</xsl:if>
			<xsl:if test="otherPhone!=''"><br/><xsl:value-of select="otherPhone"/> <xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text>Other</xsl:if>
			<xsl:if test="email!=''"><br/>
				<xsl:value-of select="email"/>
			</xsl:if>
			<br/>Wing: <xsl:value-of select="wingName"/>
			<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text>
		</td>
		<td width="175" align="left" valign="top">
			<xsl:value-of select="flightstatus"/>
			<br/>Member status:<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text>
				<xsl:choose>
					<xsl:when test="active=0">Inactive</xsl:when>
					<xsl:when test="active=1">Active</xsl:when>
				</xsl:choose>
			<br/>Renewal Date: <xsl:value-of select="renewaldate"/>
			<xsl:if test="wingJob!=''"><br/><xsl:value-of select="wingJob"/></xsl:if>
			<xsl:if test="boardMember=1"><br/>Board Member</xsl:if>
			<xsl:if test="Coordinator=1"><br/>Coordinator</xsl:if>

			<xsl:if test="flightstatus='Command Pilot'">
				<br/>Disaster Response: <xsl:if test="hseats=1">Yes</xsl:if><xsl:if test="hseats!=1">No</xsl:if>
				<br/>License: <xsl:value-of select="licensetype"/>
				<br/>IFR: <xsl:if test="ifr=1">Yes</xsl:if><xsl:if test="ifr=0">No</xsl:if>, Multi: <xsl:if test="multiEngine=1">Yes</xsl:if><xsl:if test="multiEngine=0">No</xsl:if>
				<br/>Instructor: SEI: <xsl:value-of select="seinstructor"/>, MEI: <xsl:value-of select="meinstructor"/>
				<br/>Availability: <xsl:if test="notAvailable=0">Available</xsl:if><xsl:if test="notAvailable=1">Not Available</xsl:if>
				<xsl:if test="noWeekday=0 or noWeekend=0 or noNight=0 or lastMinute=1">
					<br/><xsl:if test="noWeekday=0">Weekdays, </xsl:if>
					<xsl:if test="noWeekend=0">Weekends, </xsl:if>
					<xsl:if test="noNight=0">Nights, </xsl:if>
					<xsl:if test="lastMinute=1">Last Minute</xsl:if>
				</xsl:if>
			</xsl:if>		
			<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text>
		</td>
		<td width="175" align="left" valign="top">
			<xsl:if test="aircraftOwner!=''">
				Own: <xsl:if test="aircraftOwner=1">Yes</xsl:if><xsl:if test="aircraftOwner=0">No</xsl:if>
				<br/>Speed: <xsl:value-of select="fastestAircraft"/>
				<br/>Range: <xsl:value-of select="longestRangeAircraft"/>
				<br/>Seats: <xsl:value-of select="mostSeatsAircraft"/>
				<br/>Load: <xsl:value-of select="maxLoadAircraft"/>
				<br/>
			</xsl:if>
			Missions YTD: <xsl:value-of select="missionCountThisYear"/>
			<br/>Missions total: <xsl:value-of select="missionCountTotal"/>
			<br/>Last mission: <xsl:value-of select="lastMissionFlown"/>
			<br/>Next mission: <xsl:value-of select="nextPendingMission"/>
			<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text>
		</td>
   </tr>
	</xsl:if>
	</xsl:for-each>
	</tbody>
</table>
</xsl:template>
</xsl:stylesheet>
