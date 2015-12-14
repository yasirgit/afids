<xsl:stylesheet version="1.0" xmlns:xsl="http://www.w3.org/1999/XSL/Transform">
<xsl:output method="html" />
<xsl:strip-space elements="*"/>

<xsl:template match="/">
<table style="width:500px; border-collapse:collapse; margin:8px 0 0;" border="1" cellpadding="2" bordercolor="#a6bee0">
	<thead>
		<tr>
		  <td style="color:#153f7a;font-weight:bold;height:24" bgcolor="#cfe1fc" width="50" valign="top" align="left">Mission Date</td>
		  <td style="color:#153f7a;font-weight:bold;height:24" bgcolor="#cfe1fc" width="75" valign="top" align="left">Passenger (age)</td>
		  <td style="color:#153f7a;font-weight:bold;height:24" bgcolor="#cfe1fc" width="125" valign="top" align="left">Origin</td>
		  <td style="color:#153f7a;font-weight:bold;height:24" bgcolor="#cfe1fc" width="125" valign="top" align="left">Destination</td>
		  <td style="color:#153f7a;font-weight:bold;height:24" bgcolor="#cfe1fc" width="100" valign="top" align="left">Illness</td>
		</tr>
	</thead>
	<tbody>
	<xsl:for-each select=".//record">
		<tr nobr="true">
			<td style="height:24px;" width="50" valign="top" align="left"><xsl:value-of select="displayDate"/></td>
		  <td style="height:24px;" width="75" valign="top" align="left">
				<xsl:value-of select="firstname"/><xsl:text> </xsl:text><xsl:value-of select="initial"/><xsl:text> (</xsl:text><xsl:value-of select="passAge"/><xsl:text>)</xsl:text>
				<br /><xsl:value-of select="passCity"/><xsl:text>, </xsl:text><xsl:value-of select="passState"/>
			</td>
		  <td style="height:24px;" width="125" valign="top" align="left">
				<xsl:value-of select="originIdent"/><xsl:text> (</xsl:text><xsl:value-of select="originCity"/><xsl:text> </xsl:text><xsl:value-of select="originState"/><xsl:text>)</xsl:text>
				<br/>Agency: <xsl:value-of select="agencyName"/>
			</td>
		  <td style="height:24px;" width="125" valign="top" align="left">
				<xsl:value-of select="destIdent"/><xsl:text> (</xsl:text><xsl:value-of select="destCity"/><xsl:text> </xsl:text><xsl:value-of select="destState"/><xsl:text>)</xsl:text>
				<br/>Dest Facility: <xsl:value-of select="facilityName"/>
			</td>
		  <td style="height:24px;" width="100" valign="top" align="left">
				<xsl:value-of select="illness"/>
			</td>
		</tr>
	</xsl:for-each>
	</tbody>
</table>
</xsl:template>
</xsl:stylesheet>
