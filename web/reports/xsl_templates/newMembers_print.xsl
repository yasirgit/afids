<xsl:stylesheet version="1.0" xmlns:xsl="http://www.w3.org/1999/XSL/Transform">
<xsl:output method="html" />
<xsl:strip-space elements="*"/>

<xsl:template match="/">
<table style="width:500px; border-collapse:collapse; margin:8px 0 0;" border="1" cellpadding="2" bordercolor="#a6bee0">
 <thead>
	<tr nobr="true">
		<th style="color:#153f7a;font-weight:bold;height:24px" bgcolor="#cfe1fc" width="150" align="left"><b>Member</b></th>
		<th style="color:#153f7a;font-weight:bold;height:24px" bgcolor="#cfe1fc" width="150" align="left"><b>Flight Status</b></th>
		<th style="color:#153f7a;font-weight:bold;height:24px" bgcolor="#cfe1fc" width="50" align="left"><b>Join Date</b></th>
		<th style="color:#153f7a;font-weight:bold;height:24px" bgcolor="#cfe1fc" width="50" align="left"><b>Insurance</b></th>
		<th style="color:#153f7a;font-weight:bold;height:24px" bgcolor="#cfe1fc" width="50" align="left"><b>Badge</b></th>
		<th style="color:#153f7a;font-weight:bold;height:24px" bgcolor="#cfe1fc" width="50" align="left"><b>Notebook</b></th>
	</tr>
  </thead>
  <tbody>
	<xsl:for-each select=".//record">
   <tr nobr="true">
		<td style="height:24px" width="150" align="left" valign="top">
			<xsl:value-of select="firstName"/><xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text><xsl:value-of select="lastName"/>
			<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text></td>
		<td style="height:24px" width="150" align="left" valign="top">
			<xsl:value-of select="flightStatus"/>
		<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text></td>
		<td style="height:24px" width="50" align="left" valign="top">
			<xsl:value-of select="joinDate"/>
		<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text></td>
		<td style="height:24px" width="50" align="left" valign="top">
			<xsl:value-of select="insuranceReceived"/>
		<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text></td>
		<td style="height:24px" width="50" align="left" valign="top">
			<xsl:value-of select="badgeMade"/>
		<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text></td>
		<td style="height:24px" width="50" align="left" valign="top">
			<xsl:value-of select="notebookSent"/>
		<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text></td>
   </tr>
	</xsl:for-each>
	</tbody>
	</table>
</xsl:template>

</xsl:stylesheet>
