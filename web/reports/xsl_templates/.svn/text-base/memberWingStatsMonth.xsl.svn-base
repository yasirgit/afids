<xsl:stylesheet version="1.0" xmlns:xsl="http://www.w3.org/1999/XSL/Transform">
<xsl:output method="html" />
<xsl:strip-space elements="*"/>

<xsl:template match="/">

<h3>Month of <xsl:call-template name="monthName"/>, <xsl:value-of select=".//params/param[@field='yearNo']/@value"/></h3>

<ul class="tab-interface-tabs">
	<li class="active">
  	<a>
			<xsl:attribute name="href">
				<xsl:call-template name="make-prevmonth-link"/>
			</xsl:attribute>
			<span>Previous Month</span>
		</a>
	</li>
  <li>
  	<a>
			<xsl:attribute name="href">
				<xsl:call-template name="make-nextmonth-link"/>
			</xsl:attribute>
  		<span>Next Month</span>
  	</a>
  </li>
  <li>
  	<a>
			<xsl:attribute name="href">
				<xsl:call-template name="make-month-link"/>
			</xsl:attribute>
  		<span>View by Month</span>
  	</a>
  </li>
</ul>

<!--report table start-->
<div class="raw_frame" style="padding-left: 10px; padding-bottom: 10px; width: 590px">
  <table class="report-table" style="width: 580px">
  	<thead>
    	<tr>
		<td width="240" bgcolor="#1848B0" align="left"><b>Wing</b></td>
		<td width="100" bgcolor="#1848B0" align="right"><b>Non-Pilot</b></td>
		<td width="100" bgcolor="#1848B0" align="right"><b>Verify Orientation</b></td>
		<td width="100" bgcolor="#1848B0" align="right"><b>Command Pilot</b></td>
		<td width="100" bgcolor="#1848B0" align="right"><b>Total</b></td>
	</tr>
	</thead>
	<tbody>
<xsl:for-each select=".//record">
<xsl:choose>
     <xsl:when test="not(preceding-sibling::node()[wingID = current()/wingID])">
 	<tr>
		<td align="left" valign="top" width="240">
			<xsl:value-of select="wingName"/>
		</td>
		<td align="right" valign="top" width="100">
			<xsl:value-of select="format-number(sum(/afids_report/record[flightStatus='Non-pilot'][wingID=current()/wingID]/memberCount),'#,###')"/>
			<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text>
		</td>
		<td align="right" valign="top" width="100">
			<xsl:value-of select="format-number(sum(/afids_report/record[flightStatus='Verify Orientation'][wingID=current()/wingID]/memberCount),'#,###')"/>
			<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text>
		</td>
		<td align="right" valign="top" width="100">
			<xsl:value-of select="format-number(sum(/afids_report/record[flightStatus='Command Pilot'][wingID=current()/wingID]/memberCount),'#,###')"/>
			<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text>
		</td>
		<td align="right" valign="top" width="100">
			<xsl:value-of select="format-number(sum(/afids_report/record[wingID=current()/wingID]/memberCount),'#,###')"/>
			<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text>
		</td>
	</tr>
</xsl:when>
</xsl:choose>
</xsl:for-each>
 	<tr class="totalrow">
		<td align="left" valign="top" width="240">Totals
		</td>
		<td align="right" valign="top" width="100"><b>
			<xsl:value-of select="format-number(sum(/afids_report/record[flightStatus='Non-pilot']/memberCount),'#,###')"/>
			<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text></b>
		</td>
		<td align="right" valign="top" width="100"><b>
			<xsl:value-of select="format-number(sum(/afids_report/record[flightStatus='Verify Orientation']/memberCount),'#,###')"/>
			<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text></b>
		</td>
		<td align="right" valign="top" width="100"><b>
			<xsl:value-of select="format-number(sum(/afids_report/record[flightStatus='Command Pilot']/memberCount),'#,###')"/>
			<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text></b>
		</td>
		<td align="right" valign="top" width="100"><b>
			<xsl:value-of select="format-number(sum(/afids_report/record/memberCount),'#,###')"/>
			<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text></b>
		</td>
	</tr>
	</tbody>
</table></div>
</xsl:template>

<xsl:template name="make-nextmonth-link">
	<xsl:value-of select="concat('reports.php?reportDef=','report_specs.xml')" /><xsl:text disable-output-escaping="yes">&amp;</xsl:text>
	<xsl:value-of select="concat('reportName=','memberWingStatsMonth')" /><xsl:text disable-output-escaping="yes">&amp;</xsl:text>
	<xsl:choose>
	<xsl:when test=".//monthNo=12">
		<xsl:value-of select="concat('monthNo=','1')" /><xsl:text disable-output-escaping="yes">&amp;</xsl:text>
		<xsl:value-of select="concat('yearNo=',.//yearNo + 1)" /><xsl:text disable-output-escaping="yes">&amp;</xsl:text>
	</xsl:when>
	<xsl:otherwise>
		<xsl:value-of select="concat('monthNo=',.//monthNo + 1)" /><xsl:text disable-output-escaping="yes">&amp;</xsl:text>
		<xsl:value-of select="concat('yearNo=',.//yearNo)" /><xsl:text disable-output-escaping="yes">&amp;</xsl:text>
	</xsl:otherwise>
	</xsl:choose>
	<xsl:value-of select="concat('action=','display')" /><xsl:text disable-output-escaping="yes">&amp;</xsl:text>
</xsl:template>
<xsl:template name="make-prevmonth-link">
	<xsl:value-of select="concat('reports.php?reportDef=','report_specs.xml')" /><xsl:text disable-output-escaping="yes">&amp;</xsl:text>
	<xsl:value-of select="concat('reportName=','memberWingStatsMonth')" /><xsl:text disable-output-escaping="yes">&amp;</xsl:text>
	<xsl:choose>
	<xsl:when test=".//monthNo=1">
		<xsl:value-of select="concat('monthNo=','12')" /><xsl:text disable-output-escaping="yes">&amp;</xsl:text>
		<xsl:value-of select="concat('yearNo=',.//yearNo - 1)" /><xsl:text disable-output-escaping="yes">&amp;</xsl:text>
	</xsl:when>
	<xsl:otherwise>
		<xsl:value-of select="concat('monthNo=',.//monthNo - 1)" /><xsl:text disable-output-escaping="yes">&amp;</xsl:text>
		<xsl:value-of select="concat('yearNo=',.//yearNo)" /><xsl:text disable-output-escaping="yes">&amp;</xsl:text>
	</xsl:otherwise>
	</xsl:choose>
	<xsl:value-of select="concat('action=','display')" /><xsl:text disable-output-escaping="yes">&amp;</xsl:text>
</xsl:template>
<xsl:template name="make-month-link">
	<xsl:value-of select="concat('reports.php?reportDef=','report_specs.xml')" /><xsl:text disable-output-escaping="yes">&amp;</xsl:text>
	<xsl:value-of select="concat('reportName=','memberWingStatsWing')" /><xsl:text disable-output-escaping="yes">&amp;</xsl:text>
	<xsl:value-of select="concat('action=','display')" /><xsl:text disable-output-escaping="yes">&amp;</xsl:text>
	<xsl:for-each select="//params/param">
	   <xsl:value-of select="concat(@field,'=',@value)"/><xsl:text disable-output-escaping="yes">&amp;</xsl:text>
	</xsl:for-each>
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
