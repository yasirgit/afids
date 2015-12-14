<xsl:stylesheet version="1.0" xmlns:xsl="http://www.w3.org/1999/XSL/Transform">
<xsl:output method="html" />
<xsl:strip-space elements="*"/>

<xsl:template match="/">

<xsl:choose>
	<xsl:when test=".//campName!=''">
		<h3><xsl:value-of select=".//campName"/>
		<br/><xsl:value-of select=".//campPhone"/></h3>
	</xsl:when>
</xsl:choose>

<p>
	<xsl:choose>
	 <xsl:when test=".//reqName!=''"><b>Requester:<xsl:text> </xsl:text><xsl:value-of select=".//reqName"/></b></xsl:when>
  </xsl:choose>
	<xsl:choose>
	   <xsl:when test=".//reqDayPhone!=''">
			<br/>Day:<xsl:text> </xsl:text><xsl:value-of select=".//reqDayPhone"/><xsl:text> </xsl:text><xsl:value-of select="reqDayComment"/>
	   </xsl:when>
  </xsl:choose>
	<xsl:choose>
	   <xsl:when test=".//reqEvePhone!=''">
				<br/>Eve:<xsl:text> </xsl:text><xsl:value-of select=".//reqEvePhone"/><xsl:text> </xsl:text><xsl:value-of select=".//reqEveComment"/>
	   </xsl:when>
  </xsl:choose>
	<xsl:choose>
	   <xsl:when test=".//reqMobilePhone!=''">
				<br/>Mobile:<xsl:text> </xsl:text><xsl:value-of select=".//reqMobilePhone"/><xsl:text> </xsl:text><xsl:value-of select=".//reqMobileComment"/>
	   </xsl:when>
  </xsl:choose>
	<xsl:choose>
	   <xsl:when test=".//reqPagerPhone!=''">
				<br/>Pager:<xsl:text> </xsl:text><xsl:value-of select=".//reqPagerPhone"/><xsl:text> </xsl:text><xsl:value-of select=".//reqPagerComment"/>
	   </xsl:when>
  </xsl:choose>
	<xsl:choose>
	   <xsl:when test=".//reqOtherPhone!=''">
			<br/>Other:<xsl:text> </xsl:text><xsl:value-of select=".//reqOtherPhone"/><xsl:text> </xsl:text><xsl:value-of select=".//reqOtherComment"/>
	   </xsl:when>
  </xsl:choose>
	<xsl:choose>
	   <xsl:when test=".//reqFaxPhone!=''">
			<br/>Fax:<xsl:text> </xsl:text><xsl:value-of select=".//reqFaxPhone"/><xsl:text> </xsl:text><xsl:value-of select=".//reqFaxComment"/>
	   </xsl:when>
  </xsl:choose>
</p>

<table style="width:760px; border-collapse:collapse; margin:8px 0 0;" border="1" cellpadding="2" bordercolor="#a6bee0" width="760">
 <thead>
	<tr nobr="true">
		<th style="color:#153f7a;font-weight:bold;height:24px" bgcolor="#cfe1fc" align="left" width="180"><b>Passenger</b></th>
		<th style="color:#153f7a;font-weight:bold;height:24px" bgcolor="#cfe1fc" align="left" width="180"><b>Mission</b></th>
		<th style="color:#153f7a;font-weight:bold;height:24px" bgcolor="#cfe1fc" align="left" width="250"><b>Pilot</b></th>
		<th style="color:#153f7a;font-weight:bold;height:24px" bgcolor="#cfe1fc" align="left" width="150"><b>Releases</b></th>
	</tr>
	</thead>
	<tbody>
	<xsl:for-each select=".//record">
    <tr nobr="true">
		<td style="height:24px" width="180" align="left" valign="top">
			<b><xsl:value-of select="passName"/></b>
			<br/>Weight:<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text><xsl:value-of select="weight"/> lbs
			<br/>DOB/Age:<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text><xsl:value-of select="passDOB"/><xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text>(<xsl:value-of select="passAge"/>)
			<xsl:if test="passDayPhone!=''">
				<br/>Day:<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text><xsl:value-of select="passDayPhone"/>
			</xsl:if>
			<xsl:if test="passEvePhone!=''">
				<br/>Eve:<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text><xsl:value-of select="passEvePhone"/>
			</xsl:if>
			<xsl:if test="passPagerPhone!=''">
				<br/>Pager:<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text><xsl:value-of select="passPagerPhone"/>
			</xsl:if>
			<xsl:if test="passMobilePhone!=''">
				<br/>Cell:<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text><xsl:value-of select="passMobilePhone"/>
			</xsl:if>
			<xsl:if test="passOtherPhone!=''">
				<br/>Other:<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text><xsl:value-of select="passOtherPhone"/>
			</xsl:if>
			<xsl:if test="passFaxPhone!=''">
				<br/>Fax:<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text><xsl:value-of select="passFaxPhone"/>
			</xsl:if>
			<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text>
		</td>
		<td style="height:24px" width="180" align="left" valign="top">
			<b>Mission#:<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text><xsl:value-of select="missionID"/></b>
			<br/>Date:<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text><xsl:value-of select="missionDate"/>
			<br/>From:<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text><xsl:value-of select="fromAirportIdent"/>
			<br/>To:<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text><xsl:value-of select="toAirportIdent"/>
			<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text>
		</td>
		<td style="height:24px" width="250" align="left" valign="top">
			<b><xsl:value-of select="pilotName"/></b>
			<xsl:if test="pilotDayPhone!=''">
				<br/>Day:<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text><xsl:value-of select="pilotDayPhone"/>
			</xsl:if>
			<xsl:if test="pilotEvePhone!=''">
				<br/>Eve:<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text><xsl:value-of select="pilotEvePhone"/>
			</xsl:if>
			<xsl:if test="pilotPagerPhone!=''">
				<br/>Pager:<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text><xsl:value-of select="pilotPagerPhone"/>
			</xsl:if>
			<xsl:if test="pilotMobilePhone!=''">
				<br/>Cell:<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text><xsl:value-of select="pilotMobilePhone"/>
			</xsl:if>
			<xsl:if test="pilotOtherPhone!=''">
				<br/>Other:<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text><xsl:value-of select="pilotOtherPhone"/>
			</xsl:if>
			<xsl:if test="pilotFaxPhone!=''">
				<br/>Fax:<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text><xsl:value-of select="pilotFaxPhone"/>
			</xsl:if>
			<xsl:if test="pilotEmail!=''">
				<br/>Email:<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text><xsl:value-of select="pilotEmail"/>
			</xsl:if>
			<xsl:if test="pilotName!=''">
				<br/>IFR:<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text>
				<xsl:if test="ifr='1'">Yes</xsl:if>
			</xsl:if>
			<xsl:if test="privateCNote!=''">
				<br/><xsl:value-of select="privateCNote"/>
			</xsl:if>
			<xsl:if test="homeBase!=''">
				<br/>Home Base:<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text><xsl:value-of select="homeBase"/>
			</xsl:if>
			<xsl:if test="make!=''">
				<br/>(<xsl:value-of select="make"/><xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text><xsl:value-of select="model"/><xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text><xsl:value-of select="nnumber"/>)
			</xsl:if>
			<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text>
		</td>
		<td style="height:24px" width="150" align="left" valign="top">
			Release:<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text><xsl:value-of select="medicalReleaseReceived"/>
			<br/>Waiver:<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text><xsl:value-of select="waiverReceived"/>
			<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text>
		</td>
   </tr>
	</xsl:for-each>
	</tbody>
	</table>
</xsl:template>
</xsl:stylesheet>
