<xsl:stylesheet version="1.0" xmlns:xsl="http://www.w3.org/1999/XSL/Transform">
<xsl:output method="html" />
<xsl:strip-space elements="*"/>

<xsl:template match="/">
	<table style="width:500px; border-collapse:collapse; margin:8px 0 0;" border="1" cellpadding="2" bordercolor="#a6bee0">
	<thead>
	 <tr>
		<th style="color:#153f7a;font-weight:bold;height:24" bgcolor="#cfe1fc" width="140" align="left"><b>MissionID</b></th>
		<th style="color:#153f7a;font-weight:bold;height:24" bgcolor="#cfe1fc" width="140" align="left"><b>Mission Date</b></th>
		<th style="color:#153f7a;font-weight:bold;height:24" bgcolor="#cfe1fc" width="200" align="left"><b>Provider</b></th>
		<th style="color:#153f7a;font-weight:bold;height:24" bgcolor="#cfe1fc" width="100" align="left"><b>Cost</b></th>
	 </tr>
	</thead>
<xsl:for-each select=".//record">
 	<tr nobr="true">
		<td style="height:24px;" align="left" valign="top" width="140">
			<xsl:value-of select="externalid"/>
		</td>
		<td style="height:24px;" align="left" valign="top" width="140">
			<xsl:value-of select="missionDateDisplay"/>
		</td>
		<td style="height:24px;" align="left" valign="top" width="200">
			<xsl:value-of select="pilotName"/>
			<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text>
		</td>
		<td style="height:24px;" align="right" valign="top" width="100">
			<xsl:value-of select="format-number(commercialticketcost,'$#,###.00')"/>
			<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text>
		</td>
	</tr>
</xsl:for-each>
	<tfoot>
 	<tr nobr="true">
		<th style="height:24px;" align="left" valign="top" width="140">
			<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text>
		</th>
		<th style="height:24px;" align="left" valign="top" width="140">
			<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text>
		</th>
		<th style="height:24px;" align="left" valign="top" width="200">
			<span style="font-weight:bold">Total</span>
		</th>
		<th style="height:24px;" align="right" valign="top" width="100">
			<xsl:value-of select="format-number(sum(.//commercialticketcost),'$#,###.00')"/>
			<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text>
		</th>
	</tr>
	</tfoot>
</table>
</xsl:template>

</xsl:stylesheet>
