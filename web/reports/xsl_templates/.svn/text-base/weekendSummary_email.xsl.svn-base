<xsl:stylesheet version="1.0" xmlns:xsl="http://www.w3.org/1999/XSL/Transform">
<xsl:output method="html" />
<xsl:strip-space elements="*"/>

<xsl:template match="/">
<table style="width:760px; border-collapse:collapse; margin:8px 0 0;" border="1" cellpadding="2" bordercolor="#a6bee0" width="760">
	<thead>
	<tr>
		<th style="color:#153f7a;font-weight:bold;height:24px" bgcolor="#cfe1fc" align="left" width="190">Passenger</th>
		<th style="color:#153f7a;font-weight:bold;height:24px" bgcolor="#cfe1fc" align="left" width="190">Mission</th>
		<th style="color:#153f7a;font-weight:bold;height:24px" bgcolor="#cfe1fc" align="left" width="190">Pilot</th>
		<th style="color:#153f7a;font-weight:bold;height:24px" bgcolor="#cfe1fc" align="left" width="190">Requester</th>
	</tr>
	</thead>
	<tbody>
	<xsl:for-each select=".//record">
    <tr nobr="true">
		<td width="190" align="left" valign="top">
			<span style="font-weight:bold"><xsl:value-of select="passName"/></span>
			<br/>Weight:<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text><xsl:value-of select="weight"/> lbs
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
		<td width="190" align="left" valign="top">
			<span style="font-weight:bold">Mission#:<xsl:value-of select="missionID"/></span>
			<br/>Type:<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text><xsl:value-of select="missionType"/>
			<br/>Date:<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text><xsl:value-of select="missionDisplayDate"/>
			<br/>From:<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text><xsl:value-of select="fromAirportIdent"/>
			<br/>To:<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text><xsl:value-of select="toAirportIdent"/>
			<xsl:if test="cancelled!=''">
				<br/>Cancelled:<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text><xsl:value-of select="cancelled"/>
			</xsl:if>
			<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text>
		</td>
		<td width="190" align="left" valign="top">
			<xsl:if test="cancelled=''">
			<span style="font-weight:bold"><xsl:value-of select="pilotName"/></span>
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
			<br/>Home Base:<xsl:value-of select="homeBase"/>
			</xsl:if>
			<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text>
		</td>
		<td width="190" align="left" valign="top">
			<span style="font-weight:bold"><xsl:value-of select="reqName"/></span>
			<xsl:if test="reqDayPhone!=''">
				<br/>Day:<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text><xsl:value-of select="reqDayPhone"/>
			</xsl:if>
			<xsl:if test="reqEvePhone!=''">
				<br/>Eve:<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text><xsl:value-of select="reqEvePhone"/>
			</xsl:if>
			<xsl:if test="reqPagerPhone!=''">
				<br/>Pager:<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text><xsl:value-of select="reqPagerPhone"/>
			</xsl:if>
			<xsl:if test="reqMobilePhone!=''">
				<br/>Cell:<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text><xsl:value-of select="reqMobilePhone"/>
			</xsl:if>
			<xsl:if test="reqOtherPhone!=''">
				<br/>Other:<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text><xsl:value-of select="reqOtherPhone"/>
			</xsl:if>
			<xsl:if test="reqFaxPhone!=''">
				<br/>Fax:<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text><xsl:value-of select="reqFaxPhone"/>
			</xsl:if>
			<xsl:if test="reqEmail!=''">
				<br/>Email:<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text><xsl:value-of select="reqEmail"/>
			</xsl:if>
			<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text></td>
    </tr>
	</xsl:for-each>
	</tbody>
	</table>
</xsl:template>
</xsl:stylesheet>
