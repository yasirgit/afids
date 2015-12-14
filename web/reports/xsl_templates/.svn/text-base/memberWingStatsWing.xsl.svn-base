<xsl:stylesheet version="1.0" xmlns:xsl="http://www.w3.org/1999/XSL/Transform">
<xsl:strip-space elements="*"/>

<xsl:template match="/">

<h3>Report for <xsl:value-of select=".//params/param[@field='yearNo']/@value"/></h3>

<ul class="tab-interface-tabs">
	<li class="active">
  	<a>
			<xsl:attribute name="href">
				<xsl:call-template name="make-wing-link"/>
			</xsl:attribute>
			<span>View by Member Type</span>
		</a>
	</li>
</ul>
<!--report table start-->
<div class="raw_frame" style="padding-left: 10px; padding-bottom: 10px; width: 760px">
  <table class="report-table" style="width: 760px">
  	<thead>
	<tr>
		<td width="136" bgcolor="#1848B0" align="left"><b>Wing</b></td>
		<td width="47" bgcolor="#1848B0" align="right"><b>1</b></td>
		<td width="47" bgcolor="#1848B0" align="right"><b>2</b></td>
		<td width="47" bgcolor="#1848B0" align="right"><b>3</b></td>
		<td width="47" bgcolor="#1848B0" align="right"><b>4</b></td>
		<td width="47" bgcolor="#1848B0" align="right"><b>5</b></td>
		<td width="47" bgcolor="#1848B0" align="right"><b>6</b></td>
		<td width="47" bgcolor="#1848B0" align="right"><b>7</b></td>
		<td width="47" bgcolor="#1848B0" align="right"><b>8</b></td>
		<td width="47" bgcolor="#1848B0" align="right"><b>9</b></td>
		<td width="47" bgcolor="#1848B0" align="right"><b>10</b></td>
		<td width="47" bgcolor="#1848B0" align="right"><b>11</b></td>
		<td width="47" bgcolor="#1848B0" align="right"><b>12</b></td>
	</tr>
	</thead>
	<tbody>
<xsl:for-each select=".//record">
<xsl:choose>
     <xsl:when test="not(preceding-sibling::node()[wingID = current()/wingID])">
 	<tr>
		<td align="left" valign="top" width="136">
			<xsl:value-of select="wingName"/>
		</td>
		<td align="right" valign="top" width="47">
			<xsl:value-of select="format-number(sum(/afids_report/record[monthNo='1'][wingID=current()/wingID]/memberCount),'#,###')"/>
			<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text>
		</td>
		<td align="right" valign="top" width="47">
			<xsl:value-of select="format-number(sum(/afids_report/record[monthNo='2'][wingID=current()/wingID]/memberCount),'#,###')"/>
			<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text>
		</td>
		<td align="right" valign="top" width="47">
			<xsl:value-of select="format-number(sum(/afids_report/record[monthNo='3'][wingID=current()/wingID]/memberCount),'#,###')"/>
			<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text>
		</td>
		<td align="right" valign="top" width="47">
			<xsl:value-of select="format-number(sum(/afids_report/record[monthNo='4'][wingID=current()/wingID]/memberCount),'#,###')"/>
			<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text>
		</td>
		<td align="right" valign="top" width="47">
			<xsl:value-of select="format-number(sum(/afids_report/record[monthNo='5'][wingID=current()/wingID]/memberCount),'#,###')"/>
			<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text>
		</td>
		<td align="right" valign="top" width="47">
			<xsl:value-of select="format-number(sum(/afids_report/record[monthNo='6'][wingID=current()/wingID]/memberCount),'#,###')"/>
			<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text>
		</td>
		<td align="right" valign="top" width="47">
			<xsl:value-of select="format-number(sum(/afids_report/record[monthNo='7'][wingID=current()/wingID]/memberCount),'#,###')"/>
			<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text>
		</td>
		<td align="right" valign="top" width="47">
			<xsl:value-of select="format-number(sum(/afids_report/record[monthNo='8'][wingID=current()/wingID]/memberCount),'#,###')"/>
			<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text>
		</td>
		<td align="right" valign="top" width="47">
			<xsl:value-of select="format-number(sum(/afids_report/record[monthNo='9'][wingID=current()/wingID]/memberCount),'#,###')"/>
			<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text>
		</td>
		<td align="right" valign="top" width="47">
			<xsl:value-of select="format-number(sum(/afids_report/record[monthNo='10'][wingID=current()/wingID]/memberCount),'#,###')"/>
			<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text>
		</td>
		<td align="right" valign="top" width="47">
			<xsl:value-of select="format-number(sum(/afids_report/record[monthNo='11'][wingID=current()/wingID]/memberCount),'#,###')"/>
			<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text>
		</td>
		<td align="right" valign="top" width="47">
			<xsl:value-of select="format-number(sum(/afids_report/record[monthNo='12'][wingID=current()/wingID]/memberCount),'#,###')"/>
			<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text>
		</td>
	</tr>
</xsl:when>
</xsl:choose>
</xsl:for-each>
 	<tr class="totalrow">
		<td align="left" valign="top" width="136">Totals
		</td>
		<td align="right" valign="top" width="47"><b>
			<xsl:value-of select="format-number(sum(/afids_report/record[monthNo='1']/memberCount),'#,###')"/>
			<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text></b>
		</td>
		<td align="right" valign="top" width="47"><b>
			<xsl:value-of select="format-number(sum(/afids_report/record[monthNo='2']/memberCount),'#,###')"/>
			<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text></b>
		</td>
		<td align="right" valign="top" width="47"><b>
			<xsl:value-of select="format-number(sum(/afids_report/record[monthNo='3']/memberCount),'#,###')"/>
			<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text></b>
		</td>
		<td align="right" valign="top" width="47"><b>
			<xsl:value-of select="format-number(sum(/afids_report/record[monthNo='4']/memberCount),'#,###')"/>
			<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text></b>
		</td>
		<td align="right" valign="top" width="47"><b>
			<xsl:value-of select="format-number(sum(/afids_report/record[monthNo='5']/memberCount),'#,###')"/>
			<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text></b>
		</td>
		<td align="right" valign="top" width="47"><b>
			<xsl:value-of select="format-number(sum(/afids_report/record[monthNo='6']/memberCount),'#,###')"/>
			<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text></b>
		</td>
		<td align="right" valign="top" width="47"><b>
			<xsl:value-of select="format-number(sum(/afids_report/record[monthNo='7']/memberCount),'#,###')"/>
			<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text></b>
		</td>
		<td align="right" valign="top" width="47"><b>
			<xsl:value-of select="format-number(sum(/afids_report/record[monthNo='8']/memberCount),'#,###')"/>
			<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text></b>
		</td>
		<td align="right" valign="top" width="47"><b>
			<xsl:value-of select="format-number(sum(/afids_report/record[monthNo='9']/memberCount),'#,###')"/>
			<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text></b>
		</td>
		<td align="right" valign="top" width="47"><b>
			<xsl:value-of select="format-number(sum(/afids_report/record[monthNo='10']/memberCount),'#,###')"/>
			<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text></b>
		</td>
		<td align="right" valign="top" width="47"><b>
			<xsl:value-of select="format-number(sum(/afids_report/record[monthNo='11']/memberCount),'#,###')"/>
			<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text></b>
		</td>
		<td align="right" valign="top" width="47"><b>
			<xsl:value-of select="format-number(sum(/afids_report/record[monthNo='12']/memberCount),'#,###')"/>
			<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text></b>
		</td>
	</tr>
</tbody>
</table>
</div>
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
<xsl:template name="make-wing-link">
	<xsl:value-of select="concat('reports.php?reportDef=','report_specs.xml')" /><xsl:text disable-output-escaping="yes">&amp;</xsl:text>
	<xsl:value-of select="concat('reportName=','memberWingStatsMonth')" /><xsl:text disable-output-escaping="yes">&amp;</xsl:text>
	<xsl:value-of select="concat('action=','display')" /><xsl:text disable-output-escaping="yes">&amp;</xsl:text>
	<xsl:value-of select="concat('monthNo=','1')" /><xsl:text disable-output-escaping="yes">&amp;</xsl:text>
	<xsl:value-of select="concat('yearNo=',.//yearNo)" /><xsl:text disable-output-escaping="yes">&amp;</xsl:text>
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
