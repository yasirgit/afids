<xsl:stylesheet version="1.0" xmlns:xsl="http://www.w3.org/1999/XSL/Transform">
<xsl:output method="html" />
<xsl:strip-space elements="*"/>

<xsl:template match="/">
<table style="width:760px; border-collapse:collapse; margin:8px 0 0;" border="1" cellpadding="2" bordercolor="#a6bee0">
 <thead>
	<tr nobr="true">
		<th style="color:#153f7a;font-weight:bold;height:24px;font-family:Verdana;font-size:10pt" bgcolor="#cfe1fc" width="200" align="left"><b>Member</b></th>
		<th style="color:#153f7a;font-weight:bold;height:24px;font-family:Verdana;font-size:10pt" bgcolor="#cfe1fc" width="200" align="left"><b>Flight Status</b></th>
		<th style="color:#153f7a;font-weight:bold;height:24px;font-family:Verdana;font-size:10pt" bgcolor="#cfe1fc" width="90" align="left"><b>Join Date</b></th>
		<th style="color:#153f7a;font-weight:bold;height:24px;font-family:Verdana;font-size:10pt" bgcolor="#cfe1fc" width="90" align="left"><b>Insurance</b></th>
		<th style="color:#153f7a;font-weight:bold;height:24px;font-family:Verdana;font-size:10pt" bgcolor="#cfe1fc" width="90" align="left"><b>Badge</b></th>
		<th style="color:#153f7a;font-weight:bold;height:24px;font-family:Verdana;font-size:10pt" bgcolor="#cfe1fc" width="90" align="left"><b>Notebook</b></th>
	</tr>
  </thead>
  <tbody>
	<xsl:for-each select=".//record">
   <tr nobr="true">
		<td style="height:24px;font-family:Verdana;font-size:10pt" width="200" align="left" valign="top">
			<a>
				<xsl:attribute name="href">
					<xsl:value-of select="concat('mailto:',email)"/>
				</xsl:attribute>
				<xsl:value-of select="firstName"/><xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text><xsl:value-of select="lastName"/>
			</a>
		<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text></td>
		<td style="height:24px;font-family:Verdana;font-size:10pt" width="200" align="left" valign="top">
			<xsl:value-of select="flightStatus"/>
		<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text></td>
		<td style="height:24px;font-family:Verdana;font-size:10pt" width="90" align="left" valign="top">
			<xsl:value-of select="joinDate"/>
		<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text></td>
		<td style="height:24px;font-family:Verdana;font-size:10pt" width="90" align="left" valign="top">
			<xsl:value-of select="insuranceReceived"/>
		<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text></td>
		<td style="height:24px;font-family:Verdana;font-size:10pt" width="90" align="left" valign="top">
			<xsl:value-of select="badgeMade"/>
		<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text></td>
		<td style="height:24px;font-family:Verdana;font-size:10pt" width="90" align="left" valign="top">
			<xsl:value-of select="notebookSent"/>
		<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text></td>
   </tr>
	</xsl:for-each>
	</tbody>
	</table>
</xsl:template>

</xsl:stylesheet>
