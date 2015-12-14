<xsl:stylesheet version="1.0" xmlns:xsl="http://www.w3.org/1999/XSL/Transform">
<xsl:output method="html" />
<xsl:strip-space elements="*"/>

<xsl:template match="/">
<table style="width:500px; border-collapse:collapse; margin:8px 0 0;" border="1" cellpadding="2" bordercolor="#a6bee0">
	<thead>
	<tr>
		<th style="color:#153f7a;font-weight:bold;height:24" bgcolor="#cfe1fc" width="75" align="left">Member ID</th>
		<th style="color:#153f7a;font-weight:bold;height:24" bgcolor="#cfe1fc" width="200" align="left">Member Name</th>
		<th style="color:#153f7a;font-weight:bold;height:24" bgcolor="#cfe1fc" width="75" align="right"># Legs</th>
		<th style="color:#153f7a;font-weight:bold;height:24" bgcolor="#cfe1fc" width="75" align="right">Hobbs Time</th>
		<th style="color:#153f7a;font-weight:bold;height:24" bgcolor="#cfe1fc" width="75" align="right">Commercial Ticket Cost</th>
	</tr>
  </thead>
  <tbody>
	<xsl:for-each select=".//record">
   <tr nobr="true">
		<td style="height:12px;" width="75" align="left" valign="top">
			<xsl:value-of select="externalID"/>
			<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text></td>
		<td style="height:12px;"  align="left" width="200" valign="top">
			<xsl:value-of select="pilotName"/>
			<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text></td>
		<td style="height:12px;"  align="right" width="75" valign="top">
			<xsl:value-of select="format-number(legCount,'#,###')"/>		
		<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text></td>
		<td style="height:12px;"  align="right" width="75" valign="top">
			<xsl:value-of select="format-number(hobbsTime,'###.#')"/>		
		<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text></td>
		<td style="height:12px;"  align="right" width="75" valign="top">
			<xsl:if test="commercialTicketCost &gt; 0">
				<xsl:value-of select="format-number(commercialTicketCost,'$#,###.##')"/>
			</xsl:if>
		<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text></td>
   </tr>
	</xsl:for-each>
	</tbody>
	</table>
</xsl:template>
</xsl:stylesheet>
