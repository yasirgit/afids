<xsl:stylesheet version="1.0" xmlns:xsl="http://www.w3.org/1999/XSL/Transform">
<xsl:output method="html" />
<xsl:strip-space elements="*"/>

<xsl:template match="/">
<table border="0" cellpadding="0" width="650" cellspacing="0">
	<tr>
		<td>
		<p><table border="1" cellpadding="2" width="650" cellspacing="0">
		      <tr>
		        <td width="90" valign="top" align="left"><strong><small>Mission Date</small></strong></td>
		        <td width="150" valign="top" align="left"><strong><small>Passenger (age)</small></strong></td>
		        <td width="150" valign="top" align="left"><strong><small>Origin</small></strong></td>
		        <td width="150" valign="top" align="left"><strong><small>Destination</small></strong></td>
		        <td width="110" valign="top" align="left"><strong><small>Illness</small></strong></td>
		      </tr>
			<xsl:for-each select=".//record">
		      <tr>
		        <td width="90" valign="top" align="left"><small><xsl:value-of select="displayDate"/></small></td>
		        <td width="150" valign="top" align="left">
				<small>
					<xsl:value-of select="firstname"/><xsl:text> </xsl:text><xsl:value-of select="initial"/><xsl:text> (</xsl:text><xsl:value-of select="passAge"/><xsl:text>)</xsl:text>
					<br /><xsl:value-of select="passCity"/><xsl:text>, </xsl:text><xsl:value-of select="passState"/>
				</small>
			</td>
		        <td width="150" valign="top" align="left"><small>
					<xsl:value-of select="originIdent"/><xsl:text> (</xsl:text><xsl:value-of select="originCity"/><xsl:text> </xsl:text><xsl:value-of select="originState"/><xsl:text>)</xsl:text>
					<br/>Agency: <xsl:value-of select="agencyName"/>
				</small>
			</td>
		        <td width="150" valign="top" align="left"><small>
					<xsl:value-of select="destIdent"/><xsl:text> (</xsl:text><xsl:value-of select="destCity"/><xsl:text> </xsl:text><xsl:value-of select="destState"/><xsl:text>)</xsl:text>
					<br/>Dest Facility: <xsl:value-of select="facilityName"/>
				</small>
			</td>
		        <td width="100" valign="top" align="left"><small>
					<xsl:value-of select="illness"/>
				</small>
			</td>
		      </tr>
			</xsl:for-each>	
		    </table></p>
		</td>
	</tr>
</table>
</xsl:template>
</xsl:stylesheet>
