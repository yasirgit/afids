<xsl:stylesheet version="1.0" xmlns:xsl="http://www.w3.org/1999/XSL/Transform">
<xsl:output method="html" />
<xsl:strip-space elements="*"/>

<xsl:variable name="noMonths" select=".//record[last()]/monthNo"/>

<xsl:template match="/">
<!--report table start-->
<table style="width:500px; border-collapse:collapse; margin:8px 0 0;" border="1" cellpadding="2" bordercolor="#a6bee0">
  	<thead>
    	<tr>
      	<td style="color:#153f7a;font-weight:bold;height:24px" bgcolor="#cfe1fc" align="left" width="150">Month</td>
        <td style="color:#153f7a;font-weight:bold;height:24px" bgcolor="#cfe1fc" align="right" width="58">Normal</td>
        <td style="color:#153f7a;font-weight:bold;height:24px" bgcolor="#cfe1fc" align="right" width="58">Transplant</td>
        <td style="color:#153f7a;font-weight:bold;height:24px" bgcolor="#cfe1fc" align="right" width="58">Admin</td>
        <td style="color:#153f7a;font-weight:bold;height:24px" bgcolor="#cfe1fc" align="right" width="58">Compassion</td>
        <td style="color:#153f7a;font-weight:bold;height:24px" bgcolor="#cfe1fc" align="right" width="58">Commercial Companion</td>
        <td style="color:#153f7a;font-weight:bold;height:24px" bgcolor="#cfe1fc" align="right" width="58">Disaster Response</td>
      </tr>
    </thead>
    <tbody>
<xsl:for-each select=".//record">
<xsl:choose>
  <xsl:when test="not(preceding-sibling::node()[monthNo = current()/monthNo])">
 	<tr>
		<td style="height:24px;" align="left" valign="top" width="150"><xsl:call-template name="monthName"/>
		</td>
		<td style="height:24px;" align="right" valign="top" width="58">
			<xsl:value-of select="format-number(sum(/afids_report/record[missionTypeID=1][monthNo=current()/monthNo]/totalHours),'#,###.0')"/>
			<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text>
		</td>
		<td style="height:24px;" align="right" valign="top" width="58">
			<xsl:value-of select="format-number(sum(/afids_report/record[missionTypeID=3][monthNo=current()/monthNo]/totalHours),'#,###.0')"/>
			<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text>
		</td>
		<td style="height:24px;" align="right" valign="top" width="58">
			<xsl:value-of select="format-number(sum(/afids_report/record[missionTypeID=2][monthNo=current()/monthNo]/totalHours),'#,###.0')"/>
			<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text>
		</td>
		<td style="height:24px;" align="right" valign="top" width="58">
			<xsl:value-of select="format-number(sum(/afids_report/record[missionTypeID=4][monthNo=current()/monthNo]/totalHours),'#,###.0')"/>
			<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text>
		</td>
		<td style="height:24px;" align="right" valign="top" width="58">
			<xsl:value-of select="format-number(sum(/afids_report/record[missionTypeID=5][monthNo=current()/monthNo]/totalHours),'#,###.0')"/>
			<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text>
		</td>
		<td style="height:24px;" align="right" valign="top" width="58">
			<xsl:value-of select="format-number(sum(/afids_report/record[missionTypeID=6][monthNo=current()/monthNo]/totalHours),'#,###.0')"/>
			<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text>
		</td>
	</tr>
</xsl:when>
</xsl:choose>
</xsl:for-each>
 	<tr>
		<td style="color:#153f7a;font-weight:bold;height:24px" bgcolor="#cfe1fc" align="left" valign="top" width="150">Totals
		</td>
		<td style="color:#153f7a;font-weight:bold;height:24px" bgcolor="#cfe1fc" align="right" valign="top" width="58"><b>
			<xsl:value-of select="format-number(sum(/afids_report/record[missionTypeID=1]/totalHours),'#,###.0')"/>
			<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text></b>
		</td>
		<td style="color:#153f7a;font-weight:bold;height:24px" bgcolor="#cfe1fc" align="right" valign="top" width="58"><b>
			<xsl:value-of select="format-number(sum(/afids_report/record[missionTypeID=3]/totalHours),'#,###.0')"/>
			<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text></b>
		</td>
		<td style="color:#153f7a;font-weight:bold;height:24px" bgcolor="#cfe1fc" align="right" valign="top" width="58"><b>
			<xsl:value-of select="format-number(sum(/afids_report/record[missionTypeID=2]/totalHours),'#,###.0')"/>
			<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text></b>
		</td>
		<td style="color:#153f7a;font-weight:bold;height:24px" bgcolor="#cfe1fc" align="right" valign="top" width="58"><b>
			<xsl:value-of select="format-number(sum(/afids_report/record[missionTypeID=4]/totalHours),'#,###.0')"/>
			<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text></b>
		</td>
		<td style="color:#153f7a;font-weight:bold;height:24px" bgcolor="#cfe1fc" align="right" valign="top" width="58"><b>
			<xsl:value-of select="format-number(sum(/afids_report/record[missionTypeID=5]/totalHours),'#,###.0')"/>
			<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text></b>
		</td>
		<td style="color:#153f7a;font-weight:bold;height:24px" bgcolor="#cfe1fc" align="right" valign="top" width="58"><b>
			<xsl:value-of select="format-number(sum(/afids_report/record[missionTypeID=6]/totalHours),'#,###.0')"/>
			<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text></b>
		</td>
	</tr>
	</tbody>
</table>
</xsl:template>

<xsl:template name="monthName">
	<xsl:choose>
	<xsl:when test=".//monthNo=1">
	   <xsl:value-of select="'January'"/>
	</xsl:when>
	<xsl:when test=".//monthNo=2">
	   <xsl:value-of select="'February'"/>
	</xsl:when>
	<xsl:when test=".//monthNo=3">
	   <xsl:value-of select="'March'"/>
	</xsl:when>
	<xsl:when test=".//monthNo=4">
	   <xsl:value-of select="'April'"/>
	</xsl:when>
	<xsl:when test=".//monthNo=5">
	   <xsl:value-of select="'May'"/>
	</xsl:when>
	<xsl:when test=".//monthNo=6">
	   <xsl:value-of select="'June'"/>
	</xsl:when>
	<xsl:when test=".//monthNo=7">
	   <xsl:value-of select="'July'"/>
	</xsl:when>
	<xsl:when test=".//monthNo=8">
	   <xsl:value-of select="'August'"/>
	</xsl:when>
	<xsl:when test=".//monthNo=9">
	   <xsl:value-of select="'September'"/>
	</xsl:when>
	<xsl:when test=".//monthNo=10">
	   <xsl:value-of select="'October'"/>
	</xsl:when>
	<xsl:when test=".//monthNo=11">
	   <xsl:value-of select="'November'"/>
	</xsl:when>
	<xsl:when test=".//monthNo=12">
	   <xsl:value-of select="'December'"/>
	</xsl:when>
	</xsl:choose>
</xsl:template>
</xsl:stylesheet>
