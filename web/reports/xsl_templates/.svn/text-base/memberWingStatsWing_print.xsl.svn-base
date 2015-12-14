<xsl:stylesheet version="1.0" xmlns:xsl="http://www.w3.org/1999/XSL/Transform">
<xsl:strip-space elements="*"/>

<xsl:template match="/">

<h3>Report for <xsl:value-of select=".//params/param[@field='yearNo']/@value"/></h3>

<!--report table start-->
<table style="width:500px; border-collapse:collapse; margin:8px 0 0;" border="1" cellpadding="2" bordercolor="#a6bee0">
 <thead>
	<tr>
		<td style="color:#153f7a;font-weight:bold;height:24px" bgcolor="#cfe1fc" width="92" align="left"><b>Wing</b></td>
		<td style="color:#153f7a;font-weight:bold;height:24px" bgcolor="#cfe1fc" width="34" align="right"><b>1</b></td>
		<td style="color:#153f7a;font-weight:bold;height:24px" bgcolor="#cfe1fc" width="34" align="right"><b>2</b></td>
		<td style="color:#153f7a;font-weight:bold;height:24px" bgcolor="#cfe1fc" width="34" align="right"><b>3</b></td>
		<td style="color:#153f7a;font-weight:bold;height:24px" bgcolor="#cfe1fc" width="34" align="right"><b>4</b></td>
		<td style="color:#153f7a;font-weight:bold;height:24px" bgcolor="#cfe1fc" width="34" align="right"><b>5</b></td>
		<td style="color:#153f7a;font-weight:bold;height:24px" bgcolor="#cfe1fc" width="34" align="right"><b>6</b></td>
		<td style="color:#153f7a;font-weight:bold;height:24px" bgcolor="#cfe1fc" width="34" align="right"><b>7</b></td>
		<td style="color:#153f7a;font-weight:bold;height:24px" bgcolor="#cfe1fc" width="34" align="right"><b>8</b></td>
		<td style="color:#153f7a;font-weight:bold;height:24px" bgcolor="#cfe1fc" width="34" align="right"><b>9</b></td>
		<td style="color:#153f7a;font-weight:bold;height:24px" bgcolor="#cfe1fc" width="34" align="right"><b>10</b></td>
		<td style="color:#153f7a;font-weight:bold;height:24px" bgcolor="#cfe1fc" width="34" align="right"><b>11</b></td>
		<td style="color:#153f7a;font-weight:bold;height:24px" bgcolor="#cfe1fc" width="34" align="right"><b>12</b></td>
	</tr>
	</thead>
	<tbody>
<xsl:for-each select=".//record">
<xsl:choose>
     <xsl:when test="not(preceding-sibling::node()[wingID = current()/wingID])">
 	<tr>
		<td style="height:16px" align="left" valign="top" width="92">
			<xsl:value-of select="wingName"/>
		</td>
		<td style="height:16px" align="right" valign="top" width="34">
			<xsl:value-of select="format-number(sum(/afids_report/record[monthNo='1'][wingID=current()/wingID]/memberCount),'#,###')"/>
			<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text>
		</td>
		<td style="height:16px" align="right" valign="top" width="34">
			<xsl:value-of select="format-number(sum(/afids_report/record[monthNo='2'][wingID=current()/wingID]/memberCount),'#,###')"/>
			<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text>
		</td>
		<td style="height:16px" align="right" valign="top" width="34">
			<xsl:value-of select="format-number(sum(/afids_report/record[monthNo='3'][wingID=current()/wingID]/memberCount),'#,###')"/>
			<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text>
		</td>
		<td style="height:16px" align="right" valign="top" width="34">
			<xsl:value-of select="format-number(sum(/afids_report/record[monthNo='4'][wingID=current()/wingID]/memberCount),'#,###')"/>
			<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text>
		</td>
		<td style="height:16px" align="right" valign="top" width="34">
			<xsl:value-of select="format-number(sum(/afids_report/record[monthNo='5'][wingID=current()/wingID]/memberCount),'#,###')"/>
			<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text>
		</td>
		<td style="height:16px" align="right" valign="top" width="34">
			<xsl:value-of select="format-number(sum(/afids_report/record[monthNo='6'][wingID=current()/wingID]/memberCount),'#,###')"/>
			<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text>
		</td>
		<td style="height:16px" align="right" valign="top" width="34">
			<xsl:value-of select="format-number(sum(/afids_report/record[monthNo='7'][wingID=current()/wingID]/memberCount),'#,###')"/>
			<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text>
		</td>
		<td style="height:16px" align="right" valign="top" width="34">
			<xsl:value-of select="format-number(sum(/afids_report/record[monthNo='8'][wingID=current()/wingID]/memberCount),'#,###')"/>
			<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text>
		</td>
		<td style="height:16px" align="right" valign="top" width="34">
			<xsl:value-of select="format-number(sum(/afids_report/record[monthNo='9'][wingID=current()/wingID]/memberCount),'#,###')"/>
			<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text>
		</td>
		<td style="height:16px" align="right" valign="top" width="34">
			<xsl:value-of select="format-number(sum(/afids_report/record[monthNo='10'][wingID=current()/wingID]/memberCount),'#,###')"/>
			<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text>
		</td>
		<td style="height:16px" align="right" valign="top" width="34">
			<xsl:value-of select="format-number(sum(/afids_report/record[monthNo='11'][wingID=current()/wingID]/memberCount),'#,###')"/>
			<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text>
		</td>
		<td style="height:16px" align="right" valign="top" width="34">
			<xsl:value-of select="format-number(sum(/afids_report/record[monthNo='12'][wingID=current()/wingID]/memberCount),'#,###')"/>
			<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text>
		</td>
	</tr>
</xsl:when>
</xsl:choose>
</xsl:for-each>
 	<tr>
		<td style="color:#153f7a;font-weight:bold;height:24px" align="left" valign="top" width="92">Totals
		</td>
		<td style="color:#153f7a;font-weight:bold;height:24px"  align="right" valign="top" width="34"><b>
			<xsl:value-of select="format-number(sum(/afids_report/record[monthNo='1']/memberCount),'#,###')"/>
			<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text></b>
		</td>
		<td style="color:#153f7a;font-weight:bold;height:24px"  align="right" valign="top" width="34"><b>
			<xsl:value-of select="format-number(sum(/afids_report/record[monthNo='2']/memberCount),'#,###')"/>
			<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text></b>
		</td>
		<td style="color:#153f7a;font-weight:bold;height:24px"  align="right" valign="top" width="34"><b>
			<xsl:value-of select="format-number(sum(/afids_report/record[monthNo='3']/memberCount),'#,###')"/>
			<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text></b>
		</td>
		<td style="color:#153f7a;font-weight:bold;height:24px"  align="right" valign="top" width="34"><b>
			<xsl:value-of select="format-number(sum(/afids_report/record[monthNo='4']/memberCount),'#,###')"/>
			<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text></b>
		</td>
		<td style="color:#153f7a;font-weight:bold;height:24px"  align="right" valign="top" width="34"><b>
			<xsl:value-of select="format-number(sum(/afids_report/record[monthNo='5']/memberCount),'#,###')"/>
			<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text></b>
		</td>
		<td style="color:#153f7a;font-weight:bold;height:24px"  align="right" valign="top" width="34"><b>
			<xsl:value-of select="format-number(sum(/afids_report/record[monthNo='6']/memberCount),'#,###')"/>
			<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text></b>
		</td>
		<td style="color:#153f7a;font-weight:bold;height:24px"  align="right" valign="top" width="34"><b>
			<xsl:value-of select="format-number(sum(/afids_report/record[monthNo='7']/memberCount),'#,###')"/>
			<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text></b>
		</td>
		<td style="color:#153f7a;font-weight:bold;height:24px"  align="right" valign="top" width="34"><b>
			<xsl:value-of select="format-number(sum(/afids_report/record[monthNo='8']/memberCount),'#,###')"/>
			<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text></b>
		</td>
		<td style="color:#153f7a;font-weight:bold;height:24px"  align="right" valign="top" width="34"><b>
			<xsl:value-of select="format-number(sum(/afids_report/record[monthNo='9']/memberCount),'#,###')"/>
			<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text></b>
		</td>
		<td style="color:#153f7a;font-weight:bold;height:24px"  align="right" valign="top" width="34"><b>
			<xsl:value-of select="format-number(sum(/afids_report/record[monthNo='10']/memberCount),'#,###')"/>
			<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text></b>
		</td>
		<td style="color:#153f7a;font-weight:bold;height:24px"  align="right" valign="top" width="34"><b>
			<xsl:value-of select="format-number(sum(/afids_report/record[monthNo='11']/memberCount),'#,###')"/>
			<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text></b>
		</td>
		<td style="color:#153f7a;font-weight:bold;height:24px"  align="right" valign="top" width="34"><b>
			<xsl:value-of select="format-number(sum(/afids_report/record[monthNo='12']/memberCount),'#,###')"/>
			<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text></b>
		</td>
	</tr>
</tbody>
</table>
</xsl:template>
</xsl:stylesheet>
