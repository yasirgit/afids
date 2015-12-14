<xsl:stylesheet version="1.0" xmlns:xsl="http://www.w3.org/1999/XSL/Transform">
<xsl:output method="html" />
<xsl:strip-space elements="*"/>

<xsl:template match="/">
<table style="width:500px; border-collapse:collapse; margin:8px 0 0;" border="1" cellpadding="2" bordercolor="#a6bee0">
	<thead>
	 <tr>
		<th style="color:#153f7a;font-weight:bold;height:24px" bgcolor="#cfe1fc" width="300" align="left">Member</th>
		<th style="color:#153f7a;font-weight:bold;height:24px" bgcolor="#cfe1fc" width="100" align="left">Join Date</th>
		<th style="color:#153f7a;font-weight:bold;height:24px" bgcolor="#cfe1fc" width="100" align="left">Oriented Date</th>
	 </tr>
	</thead>
	<xsl:for-each select=".//record">
   <tr nobr="true">
		<td style="height:24px" width="300" align="left" valign="top">
			<xsl:value-of select="firstName"/><xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text><xsl:value-of select="lastName"/>
			<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text></td>
		<td style="height:24px" width="100" align="left" valign="top">
			<xsl:value-of select="joinDate"/>
			<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text>
		</td>
		<td style="height:24px" width="100" align="left" valign="top">
			<xsl:value-of select="orientedDate"/>
			<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text>
		</td>
   </tr>
	</xsl:for-each>
	</table>
</xsl:template>
</xsl:stylesheet>
