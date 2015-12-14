<xsl:stylesheet version="1.0" xmlns:xsl="http://www.w3.org/1999/XSL/Transform">
<xsl:output method="html" />
<xsl:strip-space elements="*"/>

<xsl:variable name="noMonths" select=".//record[last()]/monthNo"/>

<xsl:template match="/">
<ul class="tab-interface-tabs">
	<li class="active">
		<a href="javascript:void(0)">
			<span>By Month</span>
		</a>
	</li>
  <li>
  	<a>
			<xsl:attribute name="href">
				<xsl:call-template name="make-wing-link"/>
			</xsl:attribute>
  		<span>By Wing</span>
  	</a>
  </li>
</ul>

<!--report table start-->
<div class="raw_frame" style="padding-left: 10px; padding-bottom: 10px; width: 760px">
  <table class="report-table" style="width: 760px">
  	<thead>
    	<tr>
      	<td align="left"><strong>Reason</strong></td>
        <td align="center" width="44"><strong>Jan</strong></td>
        <td align="center" width="44"><strong>Feb</strong></td>
        <td align="center" width="44"><strong>Mar</strong></td>
        <td align="center" width="44"><strong>Apr</strong></td>
        <td align="center" width="44"><strong>May</strong></td>
        <td align="center" width="44"><strong>Jun</strong></td>
        <td align="center" width="44"><strong>Jul</strong></td>        
        <td align="center" width="44"><strong>Aug</strong></td>
        <td align="center" width="44"><strong>Sep</strong></td>
        <td align="center" width="44"><strong>Oct</strong></td>
        <td align="center" width="44"><strong>Nov</strong></td>
        <td align="center" width="44"><strong>Dec</strong></td>
        <td align="center" width="44"><strong>Tot</strong></td>        
        <td align="center" width="44"><strong>%</strong></td>
        
        
        
        
        
      	<td align="left"><strong>Month</strong></td>
        <td align="right"><strong>AFW</strong></td>
        <td align="right"><strong>Weather</strong></td>
        <td align="right"><strong>Passenger</strong></td>
        <td align="right"><strong>Other Leg</strong></td>
        <td align="right"><strong>Other Agency</strong></td>
        <td align="right"><strong>Requester</strong></td>
        <td align="right"><strong>No Pilot</strong></td>
        <td align="right"><strong>Mechanical</strong></td>
				<td align="right"><strong>Total</strong></td>
				<td align="right"><strong>Percent</strong></td>
      </tr>
    </thead>
    <tbody>
<xsl:for-each select=".//record">
<xsl:choose>
  <xsl:when test="not(preceding-sibling::node()[cancelled = current()/cancelled])">
 	<tr>
		<td align="left" valign="top" width="140"><xsl:call-template name="monthName"/>
		</td>
		<td align="right" valign="top">
			<xsl:value-of select="format-number(sum(/afids_report/record[monthNo='Angel Flight' or cancelled='Angel Flight West'][monthNo=current()/monthNo]/legCount),'#,###')"/>
			<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text>
		</td>
		<td align="right" valign="top">
			<xsl:value-of select="format-number(sum(/afids_report/record[cancelled='Weather'][monthNo=current()/monthNo]/legCount),'#,###')"/>
			<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text>
		</td>
		<td align="right" valign="top">
			<xsl:value-of select="format-number(sum(/afids_report/record[cancelled='Patient'][monthNo=current()/monthNo]/legCount),'#,###')"/>
			<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text>
		</td>
		<td align="right" valign="top">
			<xsl:value-of select="format-number(sum(/afids_report/record[cancelled='Other Leg'][monthNo=current()/monthNo]/legCount),'#,###')"/>
			<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text>
		</td>
		<td align="right" valign="top">
			<xsl:value-of select="format-number(sum(/afids_report/record[cancelled='Other Agency'][monthNo=current()/monthNo]/legCount),'#,###')"/>
			<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text>
		</td>
		<td align="right" valign="top">
			<xsl:value-of select="format-number(sum(/afids_report/record[cancelled='Requester' or cancelled='Requester Medical'][monthNo=current()/monthNo]/legCount),'#,###')"/>
			<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text>
		</td>
		<td align="right" valign="top">
			<xsl:value-of select="format-number(sum(/afids_report/record[cancelled='No Pilot'][monthNo=current()/monthNo]/legCount),'#,###')"/>
			<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text>
		</td>
		<td align="right" valign="top">
			<xsl:value-of select="format-number(sum(/afids_report/record[cancelled='Mechanical'][monthNo=current()/monthNo]/legCount),'#,###')"/>
			<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text>
		</td>
		<td align="right" valign="top"><b>
			<xsl:value-of select="format-number(sum(/afids_report/record[cancelled!=''][monthNo=current()/monthNo]/legCount),'#,###')"/>
			<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text>
		</b></td>
		<td align="right" valign="top">
			<xsl:value-of select="format-number(sum(/afids_report/record[cancelled!=''][monthNo=current()/monthNo]/legCount) div sum(/afids_report/record[cancelled!='']/legCount),'#,###.0%')"/>
			<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text>
		</td>
	</tr>
</xsl:when>
</xsl:choose>
</xsl:for-each>
 	<tr class="totalrow">
		<td align="left" valign="top" width="140">Totals
		</td>
		<td align="right" valign="top" width="120"><b>
			<xsl:value-of select="format-number(sum(/afids_report/record[cancelled='Angel Flight' or cancelled='Angel Flight West']/legCount),'#,###')"/>
			<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text></b>
		</td>
		<td align="right" valign="top" width="120"><b>
			<xsl:value-of select="format-number(sum(/afids_report/record[cancelled='Weather']/legCount),'#,###')"/>
			<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text></b>
		</td>
		<td align="right" valign="top" width="120"><b>
			<xsl:value-of select="format-number(sum(/afids_report/record[cancelled='Patient']/legCount),'#,###')"/>
			<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text></b>
		</td>
		<td align="right" valign="top" width="120"><b>
			<xsl:value-of select="format-number(sum(/afids_report/record[cancelled='Other Leg']/legCount),'#,###')"/>
			<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text></b>
		</td>
		<td align="right" valign="top" width="120"><b>
			<xsl:value-of select="format-number(sum(/afids_report/record[cancelled='Other Agency']/legCount),'#,###')"/>
			<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text></b>
		</td>
		<td align="right" valign="top" width="120"><b>
			<xsl:value-of select="format-number(sum(/afids_report/record[cancelled='Requester' or cancelled='Requester Medical']/legCount),'#,###')"/>
			<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text></b>
		</td>
		<td align="right" valign="top" width="120"><b>
			<xsl:value-of select="format-number(sum(/afids_report/record[cancelled='No Pilot']/legCount),'#,###')"/>
			<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text></b>
		</td>
		<td align="right" valign="top" width="120"><b>
			<xsl:value-of select="format-number(sum(/afids_report/record[cancelled='Mechanical']/legCount),'#,###')"/>
			<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text></b>
		</td>
		<td align="right" valign="top" width="120"><b>
			<xsl:value-of select="format-number(sum(/afids_report/record[cancelled!='']/legCount),'#,###')"/>
			<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text></b>
		</td>
		<td align="right" valign="top" width="120"><xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text></td>
	</tr>
 	<tr>
		<td align="left" valign="top" width="140">Percent
		</td>
		<td align="right" valign="top" width="120"><b>
			<xsl:value-of select="format-number(sum(/afids_report/record[cancelled='Angel Flight' or cancelled='Angel Flight West']/legCount) div sum(/afids_report/record[cancelled!='']/legCount),'#,###.0%')"/>
			<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text></b>
		</td>
		<td align="right" valign="top" width="120"><b>
			<xsl:value-of select="format-number(sum(/afids_report/record[cancelled='Weather']/legCount) div sum(/afids_report/record[cancelled!='']/legCount),'#,###.0%')"/>
			<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text></b>
		</td>
		<td align="right" valign="top" width="120"><b>
			<xsl:value-of select="format-number(sum(/afids_report/record[cancelled='Patient']/legCount) div sum(/afids_report/record[cancelled!='']/legCount),'#,###.0%')"/>
			<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text></b>
		</td>
		<td align="right" valign="top" width="120"><b>
			<xsl:value-of select="format-number(sum(/afids_report/record[cancelled='Other Leg']/legCount) div sum(/afids_report/record[cancelled!='']/legCount),'#,###.0%')"/>
			<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text></b>
		</td>
		<td align="right" valign="top" width="120"><b>
			<xsl:value-of select="format-number(sum(/afids_report/record[cancelled='Other Agency']/legCount) div sum(/afids_report/record[cancelled!='']/legCount),'#,###.0%')"/>
			<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text></b>
		</td>
		<td align="right" valign="top" width="120"><b>
			<xsl:value-of select="format-number(sum(/afids_report/record[cancelled='Requester' or cancelled='Requester Medical']/legCount) div sum(/afids_report/record[cancelled!='']/legCount),'#,###.0%')"/>
			<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text></b>
		</td>
		<td align="right" valign="top" width="120"><b>
			<xsl:value-of select="format-number(sum(/afids_report/record[cancelled='No Pilot']/legCount) div sum(/afids_report/record[cancelled!='']/legCount),'#,###.0%')"/>
			<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text></b>
		</td>
		<td align="right" valign="top" width="120"><b>
			<xsl:value-of select="format-number(sum(/afids_report/record[cancelled='Mechanical']/legCount) div sum(/afids_report/record[cancelled!='']/legCount),'#,###.0%')"/>
			<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text></b>
		</td>
		<td align="right" valign="top" width="120"><xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text></td>
		<td align="right" valign="top" width="120"><xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text></td>
	</tr>
	</tbody>
</table>
</div>
</xsl:template>

<xsl:template name="make-wing-link">
	<xsl:value-of select="concat('reports.php?reportDef=','report_specs.xml')" /><xsl:text disable-output-escaping="yes">&amp;</xsl:text>
	<xsl:value-of select="concat('reportName=','cancelled_mission_detail_wing')" /><xsl:text disable-output-escaping="yes">&amp;</xsl:text>
	<xsl:value-of select="concat('action=','display')" /><xsl:text disable-output-escaping="yes">&amp;</xsl:text>
	<xsl:for-each select="//page_link/pair">
	   <xsl:value-of select="concat(name,'=',value)"/><xsl:text disable-output-escaping="yes">&amp;</xsl:text>
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
