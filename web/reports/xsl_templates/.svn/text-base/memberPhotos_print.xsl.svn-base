<xsl:stylesheet version="1.0" xmlns:xsl="http://www.w3.org/1999/XSL/Transform">
<xsl:output method="html" />
<xsl:strip-space elements="*"/>

<xsl:template match="/">
<table style="width:500px; border-collapse:collapse; margin:8px 0 0;" border="1" cellpadding="2" bordercolor="#a6bee0" width="500">
	<thead>
	<tr>
		<th style="color:#153f7a;font-weight:bold;height:24" bgcolor="#cfe1fc" width="120" valign="top" align="left">Photo</th>
		<th style="color:#153f7a;font-weight:bold;height:24" bgcolor="#cfe1fc" width="150" valign="top" align="left">Mission Date/Submission Date</th>
		<th style="color:#153f7a;font-weight:bold;height:24" bgcolor="#cfe1fc" width="150" valign="top" align="left">Passenger/Pilot</th>
		<th style="color:#153f7a;font-weight:bold;height:24" bgcolor="#cfe1fc" width="80" valign="top" align="left">Quality</th>
	</tr>
  </thead>
  <tbody>
	<xsl:for-each select=".//record">
   <tr>
		<td align="left" valign="top" width="120">
			<a target="_new">
				<xsl:attribute name="href">
					<xsl:value-of select="concat('../mission_photos/',photofilename)"/>
				</xsl:attribute>
				<img border="0">
				<xsl:attribute name="src">
					<xsl:value-of select="concat('http://afids.angelflightwest.org/mission_photos/thumbnails/',photoThumb)"/>
				</xsl:attribute>
				</img>
			</a>
		</td>
		<td align="left" valign="top" width="150">
			<xsl:value-of select="missionDate"/>
			<br/><xsl:value-of select="submissionDate"/>
			<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text>
		</td>
		<td align="left" valign="top" width="150">
			<xsl:value-of select="passengerName"/>
			<br/><xsl:value-of select="pilotName"/>
			<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text>
		</td>
		<td align="left" valign="top" width="80">
			<xsl:if test="photoquality = 1">Excellent</xsl:if>
			<xsl:if test="photoquality = 2">Good</xsl:if>
			<xsl:if test="photoquality = 3">Fair</xsl:if>
			<xsl:if test="photoquality = 4">Poor</xsl:if>		
			<xsl:if test="photoquality = 5">Not usable</xsl:if>
			<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text>
		</td>
   </tr>
	</xsl:for-each>
	</tbody>
	</table>
</xsl:template>
</xsl:stylesheet>
