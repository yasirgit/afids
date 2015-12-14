<xsl:stylesheet version="1.0" xmlns:xsl="http://www.w3.org/1999/XSL/Transform">
<xsl:output method="html" />
<xsl:strip-space elements="*"/>

<xsl:template match="/">
<h3>Month of <xsl:call-template name="monthName"/>, <xsl:value-of select=".//params/param[@field='yearNo']/@value"/></h3>

<!--report table start-->
<table style="width:500px; border-collapse:collapse; margin:8px 0 0;" border="1" cellpadding="2" bordercolor="#a6bee0">
	<thead>
  	<tr>
		<td style="color:#153f7a;font-weight:bold;height:24px" bgcolor="#cfe1fc" width="240" align="left">Wing</td>
		<td style="color:#153f7a;font-weight:bold;height:24px" bgcolor="#cfe1fc" width="100" align="right">Non-Pilot</td>
		<td style="color:#153f7a;font-weight:bold;height:24px" bgcolor="#cfe1fc" width="100" align="right">Verify Orientation</td>
		<td style="color:#153f7a;font-weight:bold;height:24px" bgcolor="#cfe1fc" width="100" align="right">Command Pilot</td>
		<td style="color:#153f7a;font-weight:bold;height:24px" bgcolor="#cfe1fc" width="100" align="right">Total</td>
	</tr>
	</thead>
	<tbody>
<xsl:for-each select=".//record">
<xsl:choose>
     <xsl:when test="not(preceding-sibling::node()[wingID = current()/wingID])">
 	<tr>
		<td style="height:24px;" align="left" valign="top" width="240">
			<xsl:value-of select="wingName"/>
		</td>
		<td style="height:24px;" align="right" valign="top" width="100">
			<xsl:value-of select="format-number(sum(/afids_report/record[flightStatus='Non-pilot'][wingID=current()/wingID]/memberCount),'#,###')"/>
			<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text>
		</td>
		<td style="height:24px;" align="right" valign="top" width="100">
			<xsl:value-of select="format-number(sum(/afids_report/record[flightStatus='Verify Orientation'][wingID=current()/wingID]/memberCount),'#,###')"/>
			<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text>
		</td>
		<td style="height:24px;" align="right" valign="top" width="100">
			<xsl:value-of select="format-number(sum(/afids_report/record[flightStatus='Command Pilot'][wingID=current()/wingID]/memberCount),'#,###')"/>
			<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text>
		</td>
		<td style="height:24px;" align="right" valign="top" width="100">
			<xsl:value-of select="format-number(sum(/afids_report/record[wingID=current()/wingID]/memberCount),'#,###')"/>
			<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text>
		</td>
	</tr>
</xsl:when>
</xsl:choose>
</xsl:for-each>
 	<tr>
		<td style="color:#153f7a;font-weight:bold;height:24px" bgcolor="#cfe1fc" align="left" valign="top" width="240">Totals
		</td>
		<td style="color:#153f7a;font-weight:bold;height:24px" bgcolor="#cfe1fc" align="right" valign="top" width="100"><b>
			<xsl:value-of select="format-number(sum(/afids_report/record[flightStatus='Non-pilot']/memberCount),'#,###')"/>
			<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text></b>
		</td>
		<td style="color:#153f7a;font-weight:bold;height:24px" bgcolor="#cfe1fc" align="right" valign="top" width="100"><b>
			<xsl:value-of select="format-number(sum(/afids_report/record[flightStatus='Verify Orientation']/memberCount),'#,###')"/>
			<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text></b>
		</td>
		<td style="color:#153f7a;font-weight:bold;height:24px" bgcolor="#cfe1fc" align="right" valign="top" width="100"><b>
			<xsl:value-of select="format-number(sum(/afids_report/record[flightStatus='Command Pilot']/memberCount),'#,###')"/>
			<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text></b>
		</td>
		<td style="color:#153f7a;font-weight:bold;height:24px" bgcolor="#cfe1fc" align="right" valign="top" width="100"><b>
			<xsl:value-of select="format-number(sum(/afids_report/record/memberCount),'#,###')"/>
			<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text></b>
		</td>
	</tr>
	</tbody>
</table>
</xsl:template>

<xsl:template name="monthName">
	<xsl:choose>
	<xsl:when test=".//params/param[@field='monthNo'][@value=1]">
	   <xsl:value-of select="'January'"/>
	</xsl:when>
	<xsl:when test=".//params/param[@field='monthNo'][@value=2]">
	   <xsl:value-of select="'February'"/>
	</xsl:when>
	<xsl:when test=".//params/param[@field='monthNo'][@value=3]">
	   <xsl:value-of select="'March'"/>
	</xsl:when>
	<xsl:when test=".//params/param[@field='monthNo'][@value=4]">
	   <xsl:value-of select="'April'"/>
	</xsl:when>
	<xsl:when test=".//params/param[@field='monthNo'][@value=5]">
	   <xsl:value-of select="'May'"/>
	</xsl:when>
	<xsl:when test=".//params/param[@field='monthNo'][@value=6]">
	   <xsl:value-of select="'June'"/>
	</xsl:when>
	<xsl:when test=".//params/param[@field='monthNo'][@value=7]">
	   <xsl:value-of select="'July'"/>
	</xsl:when>
	<xsl:when test=".//params/param[@field='monthNo'][@value=8]">
	   <xsl:value-of select="'August'"/>
	</xsl:when>
	<xsl:when test=".//params/param[@field='monthNo'][@value=9]">
	   <xsl:value-of select="'September'"/>
	</xsl:when>
	<xsl:when test=".//params/param[@field='monthNo'][@value=10]">
	   <xsl:value-of select="'October'"/>
	</xsl:when>
	<xsl:when test=".//params/param[@field='monthNo'][@value=11]">
	   <xsl:value-of select="'November'"/>
	</xsl:when>
	<xsl:when test=".//params/param[@field='monthNo'][@value=12]">
	   <xsl:value-of select="'December'"/>
	</xsl:when>
	</xsl:choose>
</xsl:template>
</xsl:stylesheet>
