<xsl:stylesheet version="1.0" xmlns:xsl="http://www.w3.org/1999/XSL/Transform">
<xsl:output method="html" />
<xsl:strip-space elements="*"/>

<xsl:template match="/">
<table style="width:500px; border-collapse:collapse; margin:8px 0 0;" border="1" cellpadding="2" bordercolor="#a6bee0">
	<thead>
	<tr>
		<th style="color:#153f7a;font-weight:bold;height:24px" bgcolor="#cfe1fc" align="left" width="75">Mission</th>
		<th style="color:#153f7a;font-weight:bold;height:24px" bgcolor="#cfe1fc" align="left" width="125">Pilot</th>
		<th style="color:#153f7a;font-weight:bold;height:24px" bgcolor="#cfe1fc" align="left" width="150">Passenger</th>
		<th style="color:#153f7a;font-weight:bold;height:24px" bgcolor="#cfe1fc" align="left" width="150">Agency</th>
	</tr>
	</thead>
	<tbody>
	<xsl:for-each select=".//record">
    <tr nobr="true">
		<td style="height:24px" align="left" valign="top" width="75">
			<b><xsl:value-of select="externalID"/>-<xsl:value-of select="legNumber"/></b>
			<br/><xsl:value-of select="displayDate"/>
			<xsl:choose>
			   <xsl:when test="cancelled">
						<br/><xsl:value-of select="cancelled"/>
			   </xsl:when>
		  </xsl:choose>
			<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text>
		</td>
		<td style="height:24px" width="125" align="left" valign="top">
			<xsl:value-of select="pilotName"/>
			<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text>
		</td>
		<td style="height:24px" width="150" align="left" valign="top">
		  <b><xsl:value-of select="passName"/></b>
			<br/>Home state: <xsl:value-of select="passState"/>
			<xsl:choose>
				<xsl:when test="passAge!=''">
					<br/>Age: <xsl:value-of select="passAge"/>
			  </xsl:when>
		  </xsl:choose>
			<xsl:choose>
				<xsl:when test="illness!=''">
					<br/><xsl:value-of select="illness"/>
			   </xsl:when>
		   </xsl:choose>
			<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text>
		</td>
		<td style="height:24px" width="150" align="left" valign="top">
			<b><xsl:value-of select="agencyName"/></b>
			<xsl:choose>
				<xsl:when test="agencyCity!=''">
					<br/><xsl:value-of select="agencyCity"/>, <xsl:value-of select="agencyState"/>
				</xsl:when>
			</xsl:choose>
			<xsl:choose>
				<xsl:when test="facilityName!=''">
					<br/><xsl:value-of select="facilityName"/>
			  </xsl:when>
		  </xsl:choose>
			<xsl:choose>
				<xsl:when test="lodgingName!=''">
					<br/><xsl:value-of select="lodgingName"/>
			  </xsl:when>
		  </xsl:choose>
			<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text>
		</td>
   	</tr>
	</xsl:for-each>
	</tbody>
	</table>
</xsl:template>
</xsl:stylesheet>
