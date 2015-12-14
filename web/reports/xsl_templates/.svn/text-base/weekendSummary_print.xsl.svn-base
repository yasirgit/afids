<xsl:stylesheet version="1.0" xmlns:xsl="http://www.w3.org/1999/XSL/Transform">
<xsl:output method="html" />
<xsl:strip-space elements="*"/>

<xsl:template match="/">
<table style="width:500px; border-collapse:collapse; margin:8px 0 0;" border="1" cellpadding="2" bordercolor="#a6bee0">
	<thead>
	<tr>
		<th style="color:#153f7a;font-weight:bold;height:24px" bgcolor="#cfe1fc" align="left" width="125">Passenger</th>
		<th style="color:#153f7a;font-weight:bold;height:24px" bgcolor="#cfe1fc" align="left" width="125">Mission</th>
		<th style="color:#153f7a;font-weight:bold;height:24px" bgcolor="#cfe1fc" align="left" width="125">Pilot</th>
		<th style="color:#153f7a;font-weight:bold;height:24px" bgcolor="#cfe1fc" align="left" width="125">Requester</th>
	</tr>
	</thead>
	<tbody>
	<xsl:for-each select=".//record">
		<tr nobr="true">
		<td width="125" align="left" valign="top">
			<table>
				<tr><td><span style="font-weight:bold"><xsl:value-of select="passName"/></span></td></tr>
				<xsl:if test="passDayPhone!=''">
					<tr><td>Day:<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text><xsl:value-of select="passDayPhone"/></td></tr>
				</xsl:if>
				<xsl:if test="passEvePhone!=''">
					<tr><td>Eve:<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text><xsl:value-of select="passEvePhone"/></td></tr>
				</xsl:if>
				<xsl:if test="passPagerPhone!=''">
					<tr><td>Pager:<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text><xsl:value-of select="passPagerPhone"/></td></tr>
				</xsl:if>
				<xsl:if test="passMobilePhone!=''">
					<tr><td>Cell:<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text><xsl:value-of select="passMobilePhone"/></td></tr>
				</xsl:if>
			  <xsl:if test="passOtherPhone!=''">
					<tr><td>Other:<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text><xsl:value-of select="passOtherPhone"/></td></tr>
				</xsl:if>
				<xsl:if test="passFaxPhone!=''">
					<tr><td>Fax:<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text><xsl:value-of select="passFaxPhone"/></td></tr>
				</xsl:if>
			</table>
		</td>
		<td width="125" align="left" valign="top">
			<table>
				<tr><td><span style="font-weight:bold">Mission#:<xsl:value-of select="missionID"/></span></td></tr>
				<tr><td>Type:<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text><xsl:value-of select="missionType"/></td></tr>
				<tr><td>Date:<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text><xsl:value-of select="missionDisplayDate"/></td></tr>
				<tr><td>From:<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text><xsl:value-of select="fromAirportIdent"/></td></tr>
				<tr><td>To:<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text><xsl:value-of select="toAirportIdent"/></td></tr>
				<xsl:if test="cancelled!=''">
					<tr><td>Cancelled:<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text><xsl:value-of select="cancelled"/></td></tr>
				</xsl:if>
			</table>
		</td>
		<td width="125" align="left" valign="top">
			<xsl:if test="cancelled=''">
			<table>
				<tr><td><span style="font-weight:bold"><xsl:value-of select="pilotName"/></span></td></tr>
				<xsl:if test="pilotDayPhone!=''">
					<tr><td>Day:<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text><xsl:value-of select="pilotDayPhone"/></td></tr>
				</xsl:if>
		  	<xsl:if test="pilotEvePhone!=''">
					<tr><td>Eve:<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text><xsl:value-of select="pilotEvePhone"/></td></tr>
				</xsl:if>
				<xsl:if test="pilotPagerPhone!=''">
					<tr><td>Pager:<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text><xsl:value-of select="pilotPagerPhone"/></td></tr>
				</xsl:if>
				<xsl:if test="pilotMobilePhone!=''">
					<tr><td>Cell:<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text><xsl:value-of select="pilotMobilePhone"/></td></tr>
				</xsl:if>
				<xsl:if test="pilotOtherPhone!=''">
					<tr><td>Other:<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text><xsl:value-of select="pilotOtherPhone"/></td></tr>
				</xsl:if>
				<xsl:if test="pilotFaxPhone!=''">
					<tr><td>Fax:<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text><xsl:value-of select="pilotFaxPhone"/></td></tr>
				</xsl:if>
				<xsl:if test="pilotEmail!=''">
					<tr><td>Email:<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text><xsl:value-of select="pilotEmail"/></td></tr>
				</xsl:if>
				<xsl:if test="homeBase!=''">
					<tr><td>Home Base:<xsl:value-of select="homeBase"/></td></tr>
				</xsl:if>
				</table>
			</xsl:if>
		</td>
		<td width="125" align="left" valign="top">
			<table>
				<tr><td><span style="font-weight:bold"><xsl:value-of select="reqName"/></span></td></tr>
				<xsl:if test="reqDayPhone!=''">
					<tr><td>Day:<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text><xsl:value-of select="reqDayPhone"/></td></tr>
				</xsl:if>
				<xsl:if test="reqEvePhone!=''">
					<tr><td>Eve:<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text><xsl:value-of select="reqEvePhone"/></td></tr>
				</xsl:if>
				<xsl:if test="reqPagerPhone!=''">
					<tr><td>Pager:<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text><xsl:value-of select="reqPagerPhone"/></td></tr>
				</xsl:if>
				<xsl:if test="reqMobilePhone!=''">
					<tr><td>Cell:<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text><xsl:value-of select="reqMobilePhone"/></td></tr>
				</xsl:if>
				<xsl:if test="reqOtherPhone!=''">
					<tr><td>Other:<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text><xsl:value-of select="reqOtherPhone"/></td></tr>
				</xsl:if>
				<xsl:if test="reqFaxPhone!=''">
					<tr><td>Fax:<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text><xsl:value-of select="reqFaxPhone"/></td></tr>
				</xsl:if>
				<xsl:if test="reqEmail!=''">
					<tr><td>Email:<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text><xsl:value-of select="reqEmail"/></td></tr>
				</xsl:if>
				</table>
			</td>
    </tr>
	</xsl:for-each>
	</tbody>
	</table>
</xsl:template>
</xsl:stylesheet>
