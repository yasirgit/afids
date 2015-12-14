<xsl:stylesheet version="1.0" xmlns:xsl="http://www.w3.org/1999/XSL/Transform">
<xsl:output method="html" />
<xsl:strip-space elements="*"/>

<xsl:variable name="noMonths" select=".//record[last()]/monthNo"/>

<xsl:template match="/">
<ul class="tab-interface-tabs">
	<li class="active">
		<a href="javascript:void(0)">
			<span>Mission Legs</span>
		</a>
	</li>
  <li>
  	<a>
			<xsl:attribute name="href">
				<xsl:call-template name="make-hours-link"/>
			</xsl:attribute>
  		<span>Hours</span>
  	</a>
  </li>
  <li>
  	<a>
			<xsl:attribute name="href">
				<xsl:call-template name="make-cost-link"/>
			</xsl:attribute>
  		<span>Pilot Cost</span>
  	</a>
  </li>
  <li>
  	<a>
			<xsl:attribute name="href">
				<xsl:call-template name="make-comm-link"/>
			</xsl:attribute>
  		<span>Commercial Cost</span>
  	</a>
  </li>
</ul>

<!--report table start-->
<div class="raw_frame" style="padding-left: 10px; padding-bottom: 10px; width: 590px">
  <table class="report-table" style="width: 580px">
  	<thead>
    	<tr>
      	<td align="left" bgcolor="#1848b0"><strong>Month</strong></td>
        <td align="right" bgcolor="#1848b0"><strong>Normal</strong></td>
        <td align="right" bgcolor="#1848b0"><strong>Transplant</strong></td>
        <td align="right" bgcolor="#1848b0"><strong>Admin</strong></td>
        <td align="right" bgcolor="#1848b0"><strong>Compassion</strong></td>
        <td align="right" bgcolor="#1848b0"><strong>Commercial Companion</strong></td>
        <td align="right" bgcolor="#1848b0"><strong>Disaster Response</strong></td>
      </tr>
    </thead>
    <tbody>
<xsl:for-each select=".//record">
<xsl:choose>
  <xsl:when test="not(preceding-sibling::node()[monthNo = current()/monthNo])">
 	<tr>
		<td align="left" valign="top" width="140"><xsl:call-template name="monthName"/>
		</td>
		<td align="right" valign="top" width="100">
			<xsl:value-of select="format-number(sum(/afids_report/record[missionTypeID=1][monthNo=current()/monthNo]/legCount),'#,###')"/>
			<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text>
		</td>
		<td align="right" valign="top" width="100">
			<xsl:value-of select="format-number(sum(/afids_report/record[missionTypeID=3][monthNo=current()/monthNo]/legCount),'#,###')"/>
			<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text>
		</td>
		<td align="right" valign="top" width="100">
			<xsl:value-of select="format-number(sum(/afids_report/record[missionTypeID=2][monthNo=current()/monthNo]/legCount),'#,###')"/>
			<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text>
		</td>
		<td align="right" valign="top" width="100">
			<xsl:value-of select="format-number(sum(/afids_report/record[missionTypeID=4][monthNo=current()/monthNo]/legCount),'#,###')"/>
			<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text>
		</td>
		<td align="right" valign="top" width="100">
			<xsl:value-of select="format-number(sum(/afids_report/record[missionTypeID=5][monthNo=current()/monthNo]/legCount),'#,###')"/>
			<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text>
		</td>
		<td align="right" valign="top" width="100">
			<xsl:value-of select="format-number(sum(/afids_report/record[missionTypeID=6][monthNo=current()/monthNo]/legCount),'#,###')"/>
			<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text>
		</td>
	</tr>
</xsl:when>
</xsl:choose>
</xsl:for-each>
 	<tr>
		<td align="left" valign="top" width="140">Totals
		</td>
		<td align="right" valign="top" width="100"><b>
			<xsl:value-of select="format-number(sum(/afids_report/record[missionTypeID=1]/legCount),'#,###')"/>
			<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text></b>
		</td>
		<td align="right" valign="top" width="100"><b>
			<xsl:value-of select="format-number(sum(/afids_report/record[missionTypeID=3]/legCount),'#,###')"/>
			<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text></b>
		</td>
		<td align="right" valign="top" width="100"><b>
			<xsl:value-of select="format-number(sum(/afids_report/record[missionTypeID=2]/legCount),'#,###')"/>
			<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text></b>
		</td>
		<td align="right" valign="top" width="100"><b>
			<xsl:value-of select="format-number(sum(/afids_report/record[missionTypeID=4]/legCount),'#,###')"/>
			<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text></b>
		</td>
		<td align="right" valign="top" width="100"><b>
			<xsl:value-of select="format-number(sum(/afids_report/record[missionTypeID=5]/legCount),'#,###')"/>
			<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text></b>
		</td>
		<td align="right" valign="top" width="100"><b>
			<xsl:value-of select="format-number(sum(/afids_report/record[missionTypeID=6]/legCount),'#,###')"/>
			<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text></b>
		</td>
	</tr>
	</tbody>
</table>
</div>
<p><a href="/reports/special_functions/process_stat_month.php">Process the next month's mission data</a></p>
</xsl:template>

<xsl:template name="make-hours-link">
	<xsl:value-of select="concat('reports.php?reportDef=','report_specs.xml')" /><xsl:text disable-output-escaping="yes">&amp;</xsl:text>
	<xsl:value-of select="concat('reportName=','missionTypeWingStatsHours')" /><xsl:text disable-output-escaping="yes">&amp;</xsl:text>
	<xsl:value-of select="concat('action=','display')" /><xsl:text disable-output-escaping="yes">&amp;</xsl:text>
	<xsl:for-each select="//params/param">
	   <xsl:value-of select="concat(@field,'=',@value)"/><xsl:text disable-output-escaping="yes">&amp;</xsl:text>
	</xsl:for-each>
</xsl:template>
<xsl:template name="make-cost-link">
	<xsl:value-of select="concat('reports.php?reportDef=','report_specs.xml')" /><xsl:text disable-output-escaping="yes">&amp;</xsl:text>
	<xsl:value-of select="concat('reportName=','missionTypeWingStatsCost')" /><xsl:text disable-output-escaping="yes">&amp;</xsl:text>
	<xsl:value-of select="concat('action=','display')" /><xsl:text disable-output-escaping="yes">&amp;</xsl:text>
	<xsl:for-each select="//params/param">
	   <xsl:value-of select="concat(@field,'=',@value)"/><xsl:text disable-output-escaping="yes">&amp;</xsl:text>
	</xsl:for-each>
</xsl:template>
<xsl:template name="make-comm-link">
	<xsl:value-of select="concat('reports.php?reportDef=','report_specs.xml')" /><xsl:text disable-output-escaping="yes">&amp;</xsl:text>
	<xsl:value-of select="concat('reportName=','missionTypeWingStatsComm')" /><xsl:text disable-output-escaping="yes">&amp;</xsl:text>
	<xsl:value-of select="concat('action=','display')" /><xsl:text disable-output-escaping="yes">&amp;</xsl:text>
	<xsl:for-each select="//params/param">
	   <xsl:value-of select="concat(@field,'=',@value)"/><xsl:text disable-output-escaping="yes">&amp;</xsl:text>
	</xsl:for-each>
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
