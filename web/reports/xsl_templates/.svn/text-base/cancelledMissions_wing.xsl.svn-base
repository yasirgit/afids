<xsl:stylesheet version="1.0" xmlns:xsl="http://www.w3.org/1999/XSL/Transform">
<xsl:output method="html" />
<xsl:strip-space elements="*"/>

<xsl:variable name="noMonths" select=".//record[last()]/monthNo"/>
<xsl:variable name="and">&amp;</xsl:variable>

<xsl:template match="/">
<p>Click on the wing name to see the cancel reasons detail for that wing.</p>
<ul class="tab-interface-tabs">
	<li>
  	<a>
            <xsl:attribute name="href">
            <xsl:call-template name="make-month-link"/>
            </xsl:attribute>
            <span>By Month</span>
	</a>
	</li>
  <li class="active">
		<a href="javascript:void(0)">
  		<span>By Wing</span>
  	</a>
  </li>
</ul>

<!--report table start-->
<div class="raw_frame" style="padding-left: 10px; padding-bottom: 10px; width: 760px">
  <table class="report-table" style="width: 760px">
  	<thead>
    	<tr>
      	<td align="left"><strong>Wing</strong></td>
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
      </tr>
    </thead>
    <tbody>
  	<tr>
		<td align="left" valign="top" width="140">
			<a>
				<xsl:attribute name="href">
					<xsl:value-of select="concat('/reports/reports.php?reportDef=report_specs.xml',$and,'reportName=cancelled_mission_detail_for_wing',$and,'year=',/afids_report/record/missionYear,$and,'wing=15',$and,'action=display')"/>
				</xsl:attribute>
				AFW Office
			</a>
		</td>
		<td align="right" width="44" valign="top">
			<xsl:value-of select="format-number(sum(/afids_report/record[wingID=15][monthNo=1]/cancelledCount),'#,###')"/>
			<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text>
		</td>
		<td align="right" width="44" valign="top">
			<xsl:value-of select="format-number(sum(/afids_report/record[wingID=15][monthNo=2]/cancelledCount),'#,###')"/>
			<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text>
		</td>
		<td align="right" width="44" valign="top">
			<xsl:value-of select="format-number(sum(/afids_report/record[wingID=15][monthNo=3]/cancelledCount),'#,###')"/>
			<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text>
		</td>
		<td align="right" width="44" valign="top">
			<xsl:value-of select="format-number(sum(/afids_report/record[wingID=15][monthNo=4]/cancelledCount),'#,###')"/>
			<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text>
		</td>
		<td align="right" width="44" valign="top">
			<xsl:value-of select="format-number(sum(/afids_report/record[wingID=15][monthNo=5]/cancelledCount),'#,###')"/>
			<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text>
		</td>
		<td align="right" width="44" valign="top">
			<xsl:value-of select="format-number(sum(/afids_report/record[wingID=15][monthNo=6]/cancelledCount),'#,###')"/>
			<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text>
		</td>
		<td align="right" width="44" valign="top">
			<xsl:value-of select="format-number(sum(/afids_report/record[wingID=15][monthNo=7]/cancelledCount),'#,###')"/>
			<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text>
		</td>
		<td align="right" width="44" valign="top">
			<xsl:value-of select="format-number(sum(/afids_report/record[wingID=15][monthNo=8]/cancelledCount),'#,###')"/>
			<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text>
		</td>
		<td align="right" width="44" valign="top">
			<xsl:value-of select="format-number(sum(/afids_report/record[wingID=15][monthNo=9]/cancelledCount),'#,###')"/>
			<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text>
		</td>
		<td align="right" width="44" valign="top">
			<xsl:value-of select="format-number(sum(/afids_report/record[wingID=15][monthNo=10]/cancelledCount),'#,###')"/>
			<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text>
		</td>
		<td align="right" width="44" valign="top">
			<xsl:value-of select="format-number(sum(/afids_report/record[wingID=15][monthNo=11]/cancelledCount),'#,###')"/>
			<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text>
		</td>
		<td align="right" width="44" valign="top">
			<xsl:value-of select="format-number(sum(/afids_report/record[wingID=15][monthNo=12]/cancelledCount),'#,###')"/>
			<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text>
		</td>
		<td align="right" width="44" valign="top">
			<xsl:value-of select="format-number(sum(/afids_report/record[wingID=15]/cancelledCount),'#,###')"/>
			<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text>
		</td>
		<td align="right" width="44" valign="top">
			<xsl:value-of select="format-number(sum(/afids_report/record[wingID=15]/cancelledCount) div sum(/afids_report/record/cancelledCount),'#,###.0%')"/>
			<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text>
		</td>
	</tr>
  	<tr>
		<td align="left" valign="top" width="140">
			<a>
				<xsl:attribute name="href">
					<xsl:value-of select="concat('/reports/reports.php?reportDef=report_specs.xml',$and,'reportName=cancelled_mission_detail_for_wing',$and,'year=',/afids_report/record/missionYear,$and,'wing=20',$and,'action=display')"/>
				</xsl:attribute>
				Airline
			</a>
		</td>
		<td align="right" width="44" valign="top">
			<xsl:value-of select="format-number(sum(/afids_report/record[wingID=20][monthNo=1]/cancelledCount),'#,###')"/>
			<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text>
		</td>
		<td align="right" width="44" valign="top">
			<xsl:value-of select="format-number(sum(/afids_report/record[wingID=20][monthNo=2]/cancelledCount),'#,###')"/>
			<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text>
		</td>
		<td align="right" width="44" valign="top">
			<xsl:value-of select="format-number(sum(/afids_report/record[wingID=20][monthNo=3]/cancelledCount),'#,###')"/>
			<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text>
		</td>
		<td align="right" width="44" valign="top">
			<xsl:value-of select="format-number(sum(/afids_report/record[wingID=20][monthNo=4]/cancelledCount),'#,###')"/>
			<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text>
		</td>
		<td align="right" width="44" valign="top">
			<xsl:value-of select="format-number(sum(/afids_report/record[wingID=20][monthNo=5]/cancelledCount),'#,###')"/>
			<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text>
		</td>
		<td align="right" width="44" valign="top">
			<xsl:value-of select="format-number(sum(/afids_report/record[wingID=20][monthNo=6]/cancelledCount),'#,###')"/>
			<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text>
		</td>
		<td align="right" width="44" valign="top">
			<xsl:value-of select="format-number(sum(/afids_report/record[wingID=20][monthNo=7]/cancelledCount),'#,###')"/>
			<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text>
		</td>
		<td align="right" width="44" valign="top">
			<xsl:value-of select="format-number(sum(/afids_report/record[wingID=20][monthNo=8]/cancelledCount),'#,###')"/>
			<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text>
		</td>
		<td align="right" width="44" valign="top">
			<xsl:value-of select="format-number(sum(/afids_report/record[wingID=20][monthNo=9]/cancelledCount),'#,###')"/>
			<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text>
		</td>
		<td align="right" width="44" valign="top">
			<xsl:value-of select="format-number(sum(/afids_report/record[wingID=20][monthNo=10]/cancelledCount),'#,###')"/>
			<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text>
		</td>
		<td align="right" width="44" valign="top">
			<xsl:value-of select="format-number(sum(/afids_report/record[wingID=20][monthNo=11]/cancelledCount),'#,###')"/>
			<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text>
		</td>
		<td align="right" width="44" valign="top">
			<xsl:value-of select="format-number(sum(/afids_report/record[wingID=20][monthNo=12]/cancelledCount),'#,###')"/>
			<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text>
		</td>
		<td align="right" width="44" valign="top">
			<xsl:value-of select="format-number(sum(/afids_report/record[wingID=20]/cancelledCount),'#,###')"/>
			<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text>
		</td>
		<td align="right" width="44" valign="top">
			<xsl:value-of select="format-number(sum(/afids_report/record[wingID=20]/cancelledCount) div sum(/afids_report/record/cancelledCount),'#,###.0%')"/>
			<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text>
		</td>
	</tr>
  	<tr>
		<td align="left" valign="top" width="140">
			<a>
				<xsl:attribute name="href">
					<xsl:value-of select="concat('/reports/reports.php?reportDef=report_specs.xml',$and,'reportName=cancelled_mission_detail_for_wing',$and,'year=',/afids_report/record/missionYear,$and,'wing=13',$and,'action=display')"/>
				</xsl:attribute>Alaska
			</a>
		</td>
		<td align="right" width="44" valign="top">
			<xsl:value-of select="format-number(sum(/afids_report/record[wingID=13][monthNo=1]/cancelledCount),'#,###')"/>
			<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text>
		</td>
		<td align="right" width="44" valign="top">
			<xsl:value-of select="format-number(sum(/afids_report/record[wingID=13][monthNo=2]/cancelledCount),'#,###')"/>
			<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text>
		</td>
		<td align="right" width="44" valign="top">
			<xsl:value-of select="format-number(sum(/afids_report/record[wingID=13][monthNo=3]/cancelledCount),'#,###')"/>
			<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text>
		</td>
		<td align="right" width="44" valign="top">
			<xsl:value-of select="format-number(sum(/afids_report/record[wingID=13][monthNo=4]/cancelledCount),'#,###')"/>
			<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text>
		</td>
		<td align="right" width="44" valign="top">
			<xsl:value-of select="format-number(sum(/afids_report/record[wingID=13][monthNo=5]/cancelledCount),'#,###')"/>
			<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text>
		</td>
		<td align="right" width="44" valign="top">
			<xsl:value-of select="format-number(sum(/afids_report/record[wingID=13][monthNo=6]/cancelledCount),'#,###')"/>
			<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text>
		</td>
		<td align="right" width="44" valign="top">
			<xsl:value-of select="format-number(sum(/afids_report/record[wingID=13][monthNo=7]/cancelledCount),'#,###')"/>
			<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text>
		</td>
		<td align="right" width="44" valign="top">
			<xsl:value-of select="format-number(sum(/afids_report/record[wingID=13][monthNo=8]/cancelledCount),'#,###')"/>
			<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text>
		</td>
		<td align="right" width="44" valign="top">
			<xsl:value-of select="format-number(sum(/afids_report/record[wingID=13][monthNo=9]/cancelledCount),'#,###')"/>
			<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text>
		</td>
		<td align="right" width="44" valign="top">
			<xsl:value-of select="format-number(sum(/afids_report/record[wingID=13][monthNo=10]/cancelledCount),'#,###')"/>
			<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text>
		</td>
		<td align="right" width="44" valign="top">
			<xsl:value-of select="format-number(sum(/afids_report/record[wingID=13][monthNo=11]/cancelledCount),'#,###')"/>
			<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text>
		</td>
		<td align="right" width="44" valign="top">
			<xsl:value-of select="format-number(sum(/afids_report/record[wingID=13][monthNo=12]/cancelledCount),'#,###')"/>
			<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text>
		</td>
		<td align="right" width="44" valign="top">
			<xsl:value-of select="format-number(sum(/afids_report/record[wingID=13]/cancelledCount),'#,###')"/>
			<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text>
		</td>
		<td align="right" width="44" valign="top">
			<xsl:value-of select="format-number(sum(/afids_report/record[wingID=13]/cancelledCount) div sum(/afids_report/record/cancelledCount),'#,###.0%')"/>
			<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text>
		</td>
	</tr>
  	<tr>
		<td align="left" valign="top" width="140">
			<a>
				<xsl:attribute name="href">
					<xsl:value-of select="concat('/reports/reports.php?reportDef=report_specs.xml',$and,'reportName=cancelled_mission_detail_for_wing',$and,'year=',/afids_report/record/missionYear,$and,'wing=19',$and,'action=display')"/>
				</xsl:attribute>
			Alaska Air
			</a>
		</td>
		<td align="right" width="44" valign="top">
			<xsl:value-of select="format-number(sum(/afids_report/record[wingID=16][monthNo=1]/cancelledCount),'#,###')"/>
			<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text>
		</td>
		<td align="right" width="44" valign="top">
			<xsl:value-of select="format-number(sum(/afids_report/record[wingID=16][monthNo=2]/cancelledCount),'#,###')"/>
			<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text>
		</td>
		<td align="right" width="44" valign="top">
			<xsl:value-of select="format-number(sum(/afids_report/record[wingID=16][monthNo=3]/cancelledCount),'#,###')"/>
			<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text>
		</td>
		<td align="right" width="44" valign="top">
			<xsl:value-of select="format-number(sum(/afids_report/record[wingID=16][monthNo=4]/cancelledCount),'#,###')"/>
			<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text>
		</td>
		<td align="right" width="44" valign="top">
			<xsl:value-of select="format-number(sum(/afids_report/record[wingID=16][monthNo=5]/cancelledCount),'#,###')"/>
			<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text>
		</td>
		<td align="right" width="44" valign="top">
			<xsl:value-of select="format-number(sum(/afids_report/record[wingID=16][monthNo=6]/cancelledCount),'#,###')"/>
			<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text>
		</td>
		<td align="right" width="44" valign="top">
			<xsl:value-of select="format-number(sum(/afids_report/record[wingID=16][monthNo=7]/cancelledCount),'#,###')"/>
			<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text>
		</td>
		<td align="right" width="44" valign="top">
			<xsl:value-of select="format-number(sum(/afids_report/record[wingID=16][monthNo=8]/cancelledCount),'#,###')"/>
			<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text>
		</td>
		<td align="right" width="44" valign="top">
			<xsl:value-of select="format-number(sum(/afids_report/record[wingID=16][monthNo=9]/cancelledCount),'#,###')"/>
			<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text>
		</td>
		<td align="right" width="44" valign="top">
			<xsl:value-of select="format-number(sum(/afids_report/record[wingID=16][monthNo=10]/cancelledCount),'#,###')"/>
			<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text>
		</td>
		<td align="right" width="44" valign="top">
			<xsl:value-of select="format-number(sum(/afids_report/record[wingID=16][monthNo=11]/cancelledCount),'#,###')"/>
			<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text>
		</td>
		<td align="right" width="44" valign="top">
			<xsl:value-of select="format-number(sum(/afids_report/record[wingID=16][monthNo=12]/cancelledCount),'#,###')"/>
			<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text>
		</td>
		<td align="right" width="44" valign="top">
			<xsl:value-of select="format-number(sum(/afids_report/record[wingID=16]/cancelledCount),'#,###')"/>
			<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text>
		</td>
		<td align="right" width="44" valign="top">
			<xsl:value-of select="format-number(sum(/afids_report/record[wingID=16]/cancelledCount) div sum(/afids_report/record/cancelledCount),'#,###.0%')"/>
			<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text>
		</td>
	</tr>
  	<tr>
		<td align="left" valign="top" width="140">
			<a>
				<xsl:attribute name="href">
					<xsl:value-of select="concat('/reports/reports.php?reportDef=report_specs.xml',$and,'reportName=cancelled_mission_detail_for_wing',$and,'year=',/afids_report/record/missionYear,$and,'wing=19',$and,'action=display')"/>
				</xsl:attribute>
				Alaska Air Mileage
			</a>
		</td>
		<td align="right" width="44" valign="top">
			<xsl:value-of select="format-number(sum(/afids_report/record[wingID=19][monthNo=1]/cancelledCount),'#,###')"/>
			<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text>
		</td>
		<td align="right" width="44" valign="top">
			<xsl:value-of select="format-number(sum(/afids_report/record[wingID=19][monthNo=2]/cancelledCount),'#,###')"/>
			<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text>
		</td>
		<td align="right" width="44" valign="top">
			<xsl:value-of select="format-number(sum(/afids_report/record[wingID=19][monthNo=3]/cancelledCount),'#,###')"/>
			<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text>
		</td>
		<td align="right" width="44" valign="top">
			<xsl:value-of select="format-number(sum(/afids_report/record[wingID=19][monthNo=4]/cancelledCount),'#,###')"/>
			<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text>
		</td>
		<td align="right" width="44" valign="top">
			<xsl:value-of select="format-number(sum(/afids_report/record[wingID=19][monthNo=5]/cancelledCount),'#,###')"/>
			<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text>
		</td>
		<td align="right" width="44" valign="top">
			<xsl:value-of select="format-number(sum(/afids_report/record[wingID=19][monthNo=6]/cancelledCount),'#,###')"/>
			<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text>
		</td>
		<td align="right" width="44" valign="top">
			<xsl:value-of select="format-number(sum(/afids_report/record[wingID=19][monthNo=7]/cancelledCount),'#,###')"/>
			<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text>
		</td>
		<td align="right" width="44" valign="top">
			<xsl:value-of select="format-number(sum(/afids_report/record[wingID=19][monthNo=8]/cancelledCount),'#,###')"/>
			<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text>
		</td>
		<td align="right" width="44" valign="top">
			<xsl:value-of select="format-number(sum(/afids_report/record[wingID=19][monthNo=9]/cancelledCount),'#,###')"/>
			<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text>
		</td>
		<td align="right" width="44" valign="top">
			<xsl:value-of select="format-number(sum(/afids_report/record[wingID=19][monthNo=10]/cancelledCount),'#,###')"/>
			<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text>
		</td>
		<td align="right" width="44" valign="top">
			<xsl:value-of select="format-number(sum(/afids_report/record[wingID=19][monthNo=11]/cancelledCount),'#,###')"/>
			<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text>
		</td>
		<td align="right" width="44" valign="top">
			<xsl:value-of select="format-number(sum(/afids_report/record[wingID=19][monthNo=12]/cancelledCount),'#,###')"/>
			<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text>
		</td>
		<td align="right" width="44" valign="top">
			<xsl:value-of select="format-number(sum(/afids_report/record[wingID=19]/cancelledCount),'#,###')"/>
			<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text>
		</td>
		<td align="right" width="44" valign="top">
			<xsl:value-of select="format-number(sum(/afids_report/record[wingID=19]/cancelledCount) div sum(/afids_report/record/cancelledCount),'#,###.0%')"/>
			<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text>
		</td>
	</tr>
 	<tr>
		<td align="left" valign="top" width="140">
			<a>
				<xsl:attribute name="href">
					<xsl:value-of select="concat('/reports/reports.php?reportDef=report_specs.xml',$and,'reportName=cancelled_mission_detail_for_wing',$and,'year=',/afids_report/record/missionYear,$and,'wing=1',$and,'action=display')"/>
				</xsl:attribute>
				Arizona
			</a>
		</td>
		<td align="right" width="44" valign="top">
			<xsl:value-of select="format-number(sum(/afids_report/record[wingID=1][monthNo=1]/cancelledCount),'#,###')"/>
			<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text>
		</td>
		<td align="right" width="44" valign="top">
			<xsl:value-of select="format-number(sum(/afids_report/record[wingID=1][monthNo=2]/cancelledCount),'#,###')"/>
			<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text>
		</td>
		<td align="right" width="44" valign="top">
			<xsl:value-of select="format-number(sum(/afids_report/record[wingID=1][monthNo=3]/cancelledCount),'#,###')"/>
			<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text>
		</td>
		<td align="right" width="44" valign="top">
			<xsl:value-of select="format-number(sum(/afids_report/record[wingID=1][monthNo=4]/cancelledCount),'#,###')"/>
			<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text>
		</td>
		<td align="right" width="44" valign="top">
			<xsl:value-of select="format-number(sum(/afids_report/record[wingID=1][monthNo=5]/cancelledCount),'#,###')"/>
			<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text>
		</td>
		<td align="right" width="44" valign="top">
			<xsl:value-of select="format-number(sum(/afids_report/record[wingID=1][monthNo=6]/cancelledCount),'#,###')"/>
			<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text>
		</td>
		<td align="right" width="44" valign="top">
			<xsl:value-of select="format-number(sum(/afids_report/record[wingID=1][monthNo=7]/cancelledCount),'#,###')"/>
			<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text>
		</td>
		<td align="right" width="44" valign="top">
			<xsl:value-of select="format-number(sum(/afids_report/record[wingID=1][monthNo=8]/cancelledCount),'#,###')"/>
			<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text>
		</td>
		<td align="right" width="44" valign="top">
			<xsl:value-of select="format-number(sum(/afids_report/record[wingID=1][monthNo=9]/cancelledCount),'#,###')"/>
			<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text>
		</td>
		<td align="right" width="44" valign="top">
			<xsl:value-of select="format-number(sum(/afids_report/record[wingID=1][monthNo=10]/cancelledCount),'#,###')"/>
			<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text>
		</td>
		<td align="right" width="44" valign="top">
			<xsl:value-of select="format-number(sum(/afids_report/record[wingID=1][monthNo=11]/cancelledCount),'#,###')"/>
			<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text>
		</td>
		<td align="right" width="44" valign="top">
			<xsl:value-of select="format-number(sum(/afids_report/record[wingID=1][monthNo=12]/cancelledCount),'#,###')"/>
			<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text>
		</td>
		<td align="right" width="44" valign="top">
			<xsl:value-of select="format-number(sum(/afids_report/record[wingID=1]/cancelledCount),'#,###')"/>
			<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text>
		</td>
		<td align="right" width="44" valign="top">
			<xsl:value-of select="format-number(sum(/afids_report/record[wingID=1]/cancelledCount) div sum(/afids_report/record[wingID=1]/legCount),'#,###.0%')"/>
			<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text>
		</td>
</tr>
 	<tr>
		<td align="left" valign="top" width="140">
			<a>
				<xsl:attribute name="href">
					<xsl:value-of select="concat('/reports/reports.php?reportDef=report_specs.xml',$and,'reportName=cancelled_mission_detail_for_wing',$and,'year=',/afids_report/record/missionYear,$and,'wing=2',$and,'action=display')"/>
				</xsl:attribute>
				Calif, N
			</a>
		</td>
		<td align="right" width="44" valign="top">
			<xsl:value-of select="format-number(sum(/afids_report/record[wingID=2][monthNo=1]/cancelledCount),'#,###')"/>
			<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text>
		</td>
		<td align="right" width="44" valign="top">
			<xsl:value-of select="format-number(sum(/afids_report/record[wingID=2][monthNo=2]/cancelledCount),'#,###')"/>
			<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text>
		</td>
		<td align="right" width="44" valign="top">
			<xsl:value-of select="format-number(sum(/afids_report/record[wingID=2][monthNo=3]/cancelledCount),'#,###')"/>
			<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text>
		</td>
		<td align="right" width="44" valign="top">
			<xsl:value-of select="format-number(sum(/afids_report/record[wingID=2][monthNo=4]/cancelledCount),'#,###')"/>
			<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text>
		</td>
		<td align="right" width="44" valign="top">
			<xsl:value-of select="format-number(sum(/afids_report/record[wingID=2][monthNo=5]/cancelledCount),'#,###')"/>
			<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text>
		</td>
		<td align="right" width="44" valign="top">
			<xsl:value-of select="format-number(sum(/afids_report/record[wingID=2][monthNo=6]/cancelledCount),'#,###')"/>
			<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text>
		</td>
		<td align="right" width="44" valign="top">
			<xsl:value-of select="format-number(sum(/afids_report/record[wingID=2][monthNo=7]/cancelledCount),'#,###')"/>
			<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text>
		</td>
		<td align="right" width="44" valign="top">
			<xsl:value-of select="format-number(sum(/afids_report/record[wingID=2][monthNo=8]/cancelledCount),'#,###')"/>
			<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text>
		</td>
		<td align="right" width="44" valign="top">
			<xsl:value-of select="format-number(sum(/afids_report/record[wingID=2][monthNo=9]/cancelledCount),'#,###')"/>
			<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text>
		</td>
		<td align="right" width="44" valign="top">
			<xsl:value-of select="format-number(sum(/afids_report/record[wingID=2][monthNo=10]/cancelledCount),'#,###')"/>
			<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text>
		</td>
		<td align="right" width="44" valign="top">
			<xsl:value-of select="format-number(sum(/afids_report/record[wingID=2][monthNo=11]/cancelledCount),'#,###')"/>
			<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text>
		</td>
		<td align="right" width="44" valign="top">
			<xsl:value-of select="format-number(sum(/afids_report/record[wingID=2][monthNo=12]/cancelledCount),'#,###')"/>
			<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text>
		</td>
		<td align="right" width="44" valign="top">
			<xsl:value-of select="format-number(sum(/afids_report/record[wingID=2]/cancelledCount),'#,###')"/>
			<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text>
		</td>
		<td align="right" width="44" valign="top">
			<xsl:value-of select="format-number(sum(/afids_report/record[wingID=2]/cancelledCount) div sum(/afids_report/record[wingID=2]/legCount),'#,###.0%')"/>
			<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text>
		</td>
</tr>
 	<tr>
		<td align="left" valign="top" width="140">
			<a>
				<xsl:attribute name="href">
					<xsl:value-of select="concat('/reports/reports.php?reportDef=report_specs.xml',$and,'reportName=cancelled_mission_detail_for_wing',$and,'year=',/afids_report/record/missionYear,$and,'wing=3',$and,'action=display')"/>
				</xsl:attribute>
				Calif, S
			</a>
		</td>
		<td align="right" width="44" valign="top">
			<xsl:value-of select="format-number(sum(/afids_report/record[wingID=3][monthNo=1]/cancelledCount),'#,###')"/>
			<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text>
		</td>
		<td align="right" width="44" valign="top">
			<xsl:value-of select="format-number(sum(/afids_report/record[wingID=3][monthNo=2]/cancelledCount),'#,###')"/>
			<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text>
		</td>
		<td align="right" width="44" valign="top">
			<xsl:value-of select="format-number(sum(/afids_report/record[wingID=3][monthNo=3]/cancelledCount),'#,###')"/>
			<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text>
		</td>
		<td align="right" width="44" valign="top">
			<xsl:value-of select="format-number(sum(/afids_report/record[wingID=3][monthNo=4]/cancelledCount),'#,###')"/>
			<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text>
		</td>
		<td align="right" width="44" valign="top">
			<xsl:value-of select="format-number(sum(/afids_report/record[wingID=3][monthNo=5]/cancelledCount),'#,###')"/>
			<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text>
		</td>
		<td align="right" width="44" valign="top">
			<xsl:value-of select="format-number(sum(/afids_report/record[wingID=3][monthNo=6]/cancelledCount),'#,###')"/>
			<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text>
		</td>
		<td align="right" width="44" valign="top">
			<xsl:value-of select="format-number(sum(/afids_report/record[wingID=3][monthNo=7]/cancelledCount),'#,###')"/>
			<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text>
		</td>
		<td align="right" width="44" valign="top">
			<xsl:value-of select="format-number(sum(/afids_report/record[wingID=3][monthNo=8]/cancelledCount),'#,###')"/>
			<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text>
		</td>
		<td align="right" width="44" valign="top">
			<xsl:value-of select="format-number(sum(/afids_report/record[wingID=3][monthNo=9]/cancelledCount),'#,###')"/>
			<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text>
		</td>
		<td align="right" width="44" valign="top">
			<xsl:value-of select="format-number(sum(/afids_report/record[wingID=3][monthNo=10]/cancelledCount),'#,###')"/>
			<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text>
		</td>
		<td align="right" width="44" valign="top">
			<xsl:value-of select="format-number(sum(/afids_report/record[wingID=3][monthNo=11]/cancelledCount),'#,###')"/>
			<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text>
		</td>
		<td align="right" width="44" valign="top">
			<xsl:value-of select="format-number(sum(/afids_report/record[wingID=3][monthNo=12]/cancelledCount),'#,###')"/>
			<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text>
		</td>
		<td align="right" width="44" valign="top">
			<xsl:value-of select="format-number(sum(/afids_report/record[wingID=3]/cancelledCount),'#,###')"/>
			<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text>
		</td>
		<td align="right" width="44" valign="top">
			<xsl:value-of select="format-number(sum(/afids_report/record[wingID=3]/cancelledCount) div sum(/afids_report/record[wingID=3]/legCount),'#,###.0%')"/>
			<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text>
		</td>
</tr>
 	<tr>
		<td align="left" valign="top" width="140">
			<a>
				<xsl:attribute name="href">
					<xsl:value-of select="concat('/reports/reports.php?reportDef=report_specs.xml',$and,'reportName=cancelled_mission_detail_for_wing',$and,'year=',/afids_report/record/missionYear,$and,'wing=4',$and,'action=display')"/>
				</xsl:attribute>
				Colorado
			</a>
		</td>
		<td align="right" width="44" valign="top">
			<xsl:value-of select="format-number(sum(/afids_report/record[wingID=4][monthNo=1]/cancelledCount),'#,###')"/>
			<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text>
		</td>
		<td align="right" width="44" valign="top">
			<xsl:value-of select="format-number(sum(/afids_report/record[wingID=4][monthNo=2]/cancelledCount),'#,###')"/>
			<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text>
		</td>
		<td align="right" width="44" valign="top">
			<xsl:value-of select="format-number(sum(/afids_report/record[wingID=4][monthNo=3]/cancelledCount),'#,###')"/>
			<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text>
		</td>
		<td align="right" width="44" valign="top">
			<xsl:value-of select="format-number(sum(/afids_report/record[wingID=4][monthNo=4]/cancelledCount),'#,###')"/>
			<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text>
		</td>
		<td align="right" width="44" valign="top">
			<xsl:value-of select="format-number(sum(/afids_report/record[wingID=4][monthNo=5]/cancelledCount),'#,###')"/>
			<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text>
		</td>
		<td align="right" width="44" valign="top">
			<xsl:value-of select="format-number(sum(/afids_report/record[wingID=4][monthNo=6]/cancelledCount),'#,###')"/>
			<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text>
		</td>
		<td align="right" width="44" valign="top">
			<xsl:value-of select="format-number(sum(/afids_report/record[wingID=4][monthNo=7]/cancelledCount),'#,###')"/>
			<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text>
		</td>
		<td align="right" width="44" valign="top">
			<xsl:value-of select="format-number(sum(/afids_report/record[wingID=4][monthNo=8]/cancelledCount),'#,###')"/>
			<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text>
		</td>
		<td align="right" width="44" valign="top">
			<xsl:value-of select="format-number(sum(/afids_report/record[wingID=4][monthNo=9]/cancelledCount),'#,###')"/>
			<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text>
		</td>
		<td align="right" width="44" valign="top">
			<xsl:value-of select="format-number(sum(/afids_report/record[wingID=4][monthNo=10]/cancelledCount),'#,###')"/>
			<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text>
		</td>
		<td align="right" width="44" valign="top">
			<xsl:value-of select="format-number(sum(/afids_report/record[wingID=4][monthNo=11]/cancelledCount),'#,###')"/>
			<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text>
		</td>
		<td align="right" width="44" valign="top">
			<xsl:value-of select="format-number(sum(/afids_report/record[wingID=4][monthNo=12]/cancelledCount),'#,###')"/>
			<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text>
		</td>
		<td align="right" width="44" valign="top">
			<xsl:value-of select="format-number(sum(/afids_report/record[wingID=4]/cancelledCount),'#,###')"/>
			<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text>
		</td>
		<td align="right" width="44" valign="top">
			<xsl:value-of select="format-number(sum(/afids_report/record[wingID=4]/cancelledCount) div sum(/afids_report/record[wingID=4]/legCount),'#,###.0%')"/>
			<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text>
		</td>
</tr>
  	<tr>
		<td align="left" valign="top" width="140">
			<a>
				<xsl:attribute name="href">
					<xsl:value-of select="concat('/reports/reports.php?reportDef=report_specs.xml',$and,'reportName=cancelled_mission_detail_for_wing',$and,'year=',/afids_report/record/missionYear,$and,'wing=17',$and,'action=display')"/>
				</xsl:attribute>
				Frontier
			</a>
		</td>
		<td align="right" width="44" valign="top">
			<xsl:value-of select="format-number(sum(/afids_report/record[wingID=17][monthNo=1]/cancelledCount),'#,###')"/>
			<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text>
		</td>
		<td align="right" width="44" valign="top">
			<xsl:value-of select="format-number(sum(/afids_report/record[wingID=17][monthNo=2]/cancelledCount),'#,###')"/>
			<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text>
		</td>
		<td align="right" width="44" valign="top">
			<xsl:value-of select="format-number(sum(/afids_report/record[wingID=17][monthNo=3]/cancelledCount),'#,###')"/>
			<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text>
		</td>
		<td align="right" width="44" valign="top">
			<xsl:value-of select="format-number(sum(/afids_report/record[wingID=17][monthNo=4]/cancelledCount),'#,###')"/>
			<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text>
		</td>
		<td align="right" width="44" valign="top">
			<xsl:value-of select="format-number(sum(/afids_report/record[wingID=17][monthNo=5]/cancelledCount),'#,###')"/>
			<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text>
		</td>
		<td align="right" width="44" valign="top">
			<xsl:value-of select="format-number(sum(/afids_report/record[wingID=17][monthNo=6]/cancelledCount),'#,###')"/>
			<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text>
		</td>
		<td align="right" width="44" valign="top">
			<xsl:value-of select="format-number(sum(/afids_report/record[wingID=17][monthNo=7]/cancelledCount),'#,###')"/>
			<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text>
		</td>
		<td align="right" width="44" valign="top">
			<xsl:value-of select="format-number(sum(/afids_report/record[wingID=17][monthNo=8]/cancelledCount),'#,###')"/>
			<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text>
		</td>
		<td align="right" width="44" valign="top">
			<xsl:value-of select="format-number(sum(/afids_report/record[wingID=17][monthNo=9]/cancelledCount),'#,###')"/>
			<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text>
		</td>
		<td align="right" width="44" valign="top">
			<xsl:value-of select="format-number(sum(/afids_report/record[wingID=17][monthNo=10]/cancelledCount),'#,###')"/>
			<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text>
		</td>
		<td align="right" width="44" valign="top">
			<xsl:value-of select="format-number(sum(/afids_report/record[wingID=17][monthNo=11]/cancelledCount),'#,###')"/>
			<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text>
		</td>
		<td align="right" width="44" valign="top">
			<xsl:value-of select="format-number(sum(/afids_report/record[wingID=17][monthNo=12]/cancelledCount),'#,###')"/>
			<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text>
		</td>
		<td align="right" width="44" valign="top">
			<xsl:value-of select="format-number(sum(/afids_report/record[wingID=17]/cancelledCount),'#,###')"/>
			<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text>
		</td>
		<td align="right" width="44" valign="top">
			<xsl:value-of select="format-number(sum(/afids_report/record[wingID=17]/cancelledCount) div sum(/afids_report/record/cancelledCount),'#,###.0%')"/>
			<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text>
		</td>
	</tr>
 	<tr>
		<td align="left" valign="top" width="140">
			<a>
				<xsl:attribute name="href">
					<xsl:value-of select="concat('/reports/reports.php?reportDef=report_specs.xml',$and,'reportName=cancelled_mission_detail_for_wing',$and,'year=',/afids_report/record/missionYear,$and,'wing=14',$and,'action=display')"/>
				</xsl:attribute>
				Hawaii
			</a>
		</td>
		<td align="right" width="44" valign="top">
			<xsl:value-of select="format-number(sum(/afids_report/record[wingID=14][monthNo=1]/cancelledCount),'#,###')"/>
			<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text>
		</td>
		<td align="right" width="44" valign="top">
			<xsl:value-of select="format-number(sum(/afids_report/record[wingID=14][monthNo=2]/cancelledCount),'#,###')"/>
			<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text>
		</td>
		<td align="right" width="44" valign="top">
			<xsl:value-of select="format-number(sum(/afids_report/record[wingID=14][monthNo=3]/cancelledCount),'#,###')"/>
			<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text>
		</td>
		<td align="right" width="44" valign="top">
			<xsl:value-of select="format-number(sum(/afids_report/record[wingID=14][monthNo=4]/cancelledCount),'#,###')"/>
			<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text>
		</td>
		<td align="right" width="44" valign="top">
			<xsl:value-of select="format-number(sum(/afids_report/record[wingID=14][monthNo=5]/cancelledCount),'#,###')"/>
			<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text>
		</td>
		<td align="right" width="44" valign="top">
			<xsl:value-of select="format-number(sum(/afids_report/record[wingID=14][monthNo=6]/cancelledCount),'#,###')"/>
			<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text>
		</td>
		<td align="right" width="44" valign="top">
			<xsl:value-of select="format-number(sum(/afids_report/record[wingID=14][monthNo=7]/cancelledCount),'#,###')"/>
			<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text>
		</td>
		<td align="right" width="44" valign="top">
			<xsl:value-of select="format-number(sum(/afids_report/record[wingID=14][monthNo=8]/cancelledCount),'#,###')"/>
			<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text>
		</td>
		<td align="right" width="44" valign="top">
			<xsl:value-of select="format-number(sum(/afids_report/record[wingID=14][monthNo=9]/cancelledCount),'#,###')"/>
			<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text>
		</td>
		<td align="right" width="44" valign="top">
			<xsl:value-of select="format-number(sum(/afids_report/record[wingID=14][monthNo=10]/cancelledCount),'#,###')"/>
			<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text>
		</td>
		<td align="right" width="44" valign="top">
			<xsl:value-of select="format-number(sum(/afids_report/record[wingID=14][monthNo=11]/cancelledCount),'#,###')"/>
			<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text>
		</td>
		<td align="right" width="44" valign="top">
			<xsl:value-of select="format-number(sum(/afids_report/record[wingID=14][monthNo=12]/cancelledCount),'#,###')"/>
			<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text>
		</td>
		<td align="right" width="44" valign="top">
			<xsl:value-of select="format-number(sum(/afids_report/record[wingID=14]/cancelledCount),'#,###')"/>
			<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text>
		</td>
		<td align="right" width="44" valign="top">
			<xsl:value-of select="format-number(sum(/afids_report/record[wingID=14]/cancelledCount) div sum(/afids_report/record[wingID=14]/legCount),'#,###.0%')"/>
			<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text>
		</td>
</tr>
 	<tr>
		<td align="left" valign="top" width="140">
			<a>
				<xsl:attribute name="href">
					<xsl:value-of select="concat('/reports/reports.php?reportDef=report_specs.xml',$and,'reportName=cancelled_mission_detail_for_wing',$and,'year=',/afids_report/record/missionYear,$and,'wing=5',$and,'action=display')"/>
				</xsl:attribute>
				Idaho
			</a>
		</td>
		<td align="right" width="44" valign="top">
			<xsl:value-of select="format-number(sum(/afids_report/record[wingID=5][monthNo=1]/cancelledCount),'#,###')"/>
			<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text>
		</td>
		<td align="right" width="44" valign="top">
			<xsl:value-of select="format-number(sum(/afids_report/record[wingID=5][monthNo=2]/cancelledCount),'#,###')"/>
			<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text>
		</td>
		<td align="right" width="44" valign="top">
			<xsl:value-of select="format-number(sum(/afids_report/record[wingID=5][monthNo=3]/cancelledCount),'#,###')"/>
			<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text>
		</td>
		<td align="right" width="44" valign="top">
			<xsl:value-of select="format-number(sum(/afids_report/record[wingID=5][monthNo=4]/cancelledCount),'#,###')"/>
			<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text>
		</td>
		<td align="right" width="44" valign="top">
			<xsl:value-of select="format-number(sum(/afids_report/record[wingID=5][monthNo=5]/cancelledCount),'#,###')"/>
			<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text>
		</td>
		<td align="right" width="44" valign="top">
			<xsl:value-of select="format-number(sum(/afids_report/record[wingID=5][monthNo=6]/cancelledCount),'#,###')"/>
			<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text>
		</td>
		<td align="right" width="44" valign="top">
			<xsl:value-of select="format-number(sum(/afids_report/record[wingID=5][monthNo=7]/cancelledCount),'#,###')"/>
			<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text>
		</td>
		<td align="right" width="44" valign="top">
			<xsl:value-of select="format-number(sum(/afids_report/record[wingID=5][monthNo=8]/cancelledCount),'#,###')"/>
			<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text>
		</td>
		<td align="right" width="44" valign="top">
			<xsl:value-of select="format-number(sum(/afids_report/record[wingID=5][monthNo=9]/cancelledCount),'#,###')"/>
			<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text>
		</td>
		<td align="right" width="44" valign="top">
			<xsl:value-of select="format-number(sum(/afids_report/record[wingID=5][monthNo=10]/cancelledCount),'#,###')"/>
			<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text>
		</td>
		<td align="right" width="44" valign="top">
			<xsl:value-of select="format-number(sum(/afids_report/record[wingID=5][monthNo=11]/cancelledCount),'#,###')"/>
			<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text>
		</td>
		<td align="right" width="44" valign="top">
			<xsl:value-of select="format-number(sum(/afids_report/record[wingID=5][monthNo=12]/cancelledCount),'#,###')"/>
			<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text>
		</td>
		<td align="right" width="44" valign="top">
			<xsl:value-of select="format-number(sum(/afids_report/record[wingID=5]/cancelledCount),'#,###')"/>
			<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text>
		</td>
		<td align="right" width="44" valign="top">
			<xsl:value-of select="format-number(sum(/afids_report/record[wingID=5]/cancelledCount) div sum(/afids_report/record[wingID=5]/legCount),'#,###.0%')"/>
			<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text>
		</td>
</tr>
 	<tr>
		<td align="left" valign="top" width="140">
			<a>
				<xsl:attribute name="href">
					<xsl:value-of select="concat('/reports/reports.php?reportDef=report_specs.xml',$and,'reportName=cancelled_mission_detail_for_wing',$and,'year=',/afids_report/record/missionYear,$and,'wing=6',$and,'action=display')"/>
				</xsl:attribute>Montana
			</a>
		</td>
		<td align="right" width="44" valign="top">
			<xsl:value-of select="format-number(sum(/afids_report/record[wingID=6][monthNo=1]/cancelledCount),'#,###')"/>
			<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text>
		</td>
		<td align="right" width="44" valign="top">
			<xsl:value-of select="format-number(sum(/afids_report/record[wingID=6][monthNo=2]/cancelledCount),'#,###')"/>
			<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text>
		</td>
		<td align="right" width="44" valign="top">
			<xsl:value-of select="format-number(sum(/afids_report/record[wingID=6][monthNo=3]/cancelledCount),'#,###')"/>
			<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text>
		</td>
		<td align="right" width="44" valign="top">
			<xsl:value-of select="format-number(sum(/afids_report/record[wingID=6][monthNo=4]/cancelledCount),'#,###')"/>
			<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text>
		</td>
		<td align="right" width="44" valign="top">
			<xsl:value-of select="format-number(sum(/afids_report/record[wingID=6][monthNo=5]/cancelledCount),'#,###')"/>
			<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text>
		</td>
		<td align="right" width="44" valign="top">
			<xsl:value-of select="format-number(sum(/afids_report/record[wingID=6][monthNo=6]/cancelledCount),'#,###')"/>
			<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text>
		</td>
		<td align="right" width="44" valign="top">
			<xsl:value-of select="format-number(sum(/afids_report/record[wingID=6][monthNo=7]/cancelledCount),'#,###')"/>
			<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text>
		</td>
		<td align="right" width="44" valign="top">
			<xsl:value-of select="format-number(sum(/afids_report/record[wingID=6][monthNo=8]/cancelledCount),'#,###')"/>
			<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text>
		</td>
		<td align="right" width="44" valign="top">
			<xsl:value-of select="format-number(sum(/afids_report/record[wingID=6][monthNo=9]/cancelledCount),'#,###')"/>
			<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text>
		</td>
		<td align="right" width="44" valign="top">
			<xsl:value-of select="format-number(sum(/afids_report/record[wingID=6][monthNo=10]/cancelledCount),'#,###')"/>
			<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text>
		</td>
		<td align="right" width="44" valign="top">
			<xsl:value-of select="format-number(sum(/afids_report/record[wingID=6][monthNo=11]/cancelledCount),'#,###')"/>
			<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text>
		</td>
		<td align="right" width="44" valign="top">
			<xsl:value-of select="format-number(sum(/afids_report/record[wingID=6][monthNo=12]/cancelledCount),'#,###')"/>
			<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text>
		</td>
		<td align="right" width="44" valign="top">
			<xsl:value-of select="format-number(sum(/afids_report/record[wingID=6]/cancelledCount),'#,###')"/>
			<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text>
		</td>
		<td align="right" width="44" valign="top">
			<xsl:value-of select="format-number(sum(/afids_report/record[wingID=6]/cancelledCount) div sum(/afids_report/record[wingID=6]/legCount),'#,###.0%')"/>
			<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text>
		</td>
</tr>
 	<tr>
		<td align="left" valign="top" width="140">
			<a>
				<xsl:attribute name="href">
					<xsl:value-of select="concat('/reports/reports.php?reportDef=report_specs.xml',$and,'reportName=cancelled_mission_detail_for_wing',$and,'year=',/afids_report/record/missionYear,$and,'wing=8',$and,'action=display')"/>
				</xsl:attribute>
				Nevada
			</a>
		</td>
		<td align="right" width="44" valign="top">
			<xsl:value-of select="format-number(sum(/afids_report/record[wingID=8][monthNo=1]/cancelledCount),'#,###')"/>
			<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text>
		</td>
		<td align="right" width="44" valign="top">
			<xsl:value-of select="format-number(sum(/afids_report/record[wingID=8][monthNo=2]/cancelledCount),'#,###')"/>
			<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text>
		</td>
		<td align="right" width="44" valign="top">
			<xsl:value-of select="format-number(sum(/afids_report/record[wingID=8][monthNo=3]/cancelledCount),'#,###')"/>
			<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text>
		</td>
		<td align="right" width="44" valign="top">
			<xsl:value-of select="format-number(sum(/afids_report/record[wingID=8][monthNo=4]/cancelledCount),'#,###')"/>
			<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text>
		</td>
		<td align="right" width="44" valign="top">
			<xsl:value-of select="format-number(sum(/afids_report/record[wingID=8][monthNo=5]/cancelledCount),'#,###')"/>
			<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text>
		</td>
		<td align="right" width="44" valign="top">
			<xsl:value-of select="format-number(sum(/afids_report/record[wingID=8][monthNo=6]/cancelledCount),'#,###')"/>
			<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text>
		</td>
		<td align="right" width="44" valign="top">
			<xsl:value-of select="format-number(sum(/afids_report/record[wingID=8][monthNo=7]/cancelledCount),'#,###')"/>
			<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text>
		</td>
		<td align="right" width="44" valign="top">
			<xsl:value-of select="format-number(sum(/afids_report/record[wingID=8][monthNo=8]/cancelledCount),'#,###')"/>
			<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text>
		</td>
		<td align="right" width="44" valign="top">
			<xsl:value-of select="format-number(sum(/afids_report/record[wingID=8][monthNo=9]/cancelledCount),'#,###')"/>
			<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text>
		</td>
		<td align="right" width="44" valign="top">
			<xsl:value-of select="format-number(sum(/afids_report/record[wingID=8][monthNo=10]/cancelledCount),'#,###')"/>
			<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text>
		</td>
		<td align="right" width="44" valign="top">
			<xsl:value-of select="format-number(sum(/afids_report/record[wingID=8][monthNo=11]/cancelledCount),'#,###')"/>
			<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text>
		</td>
		<td align="right" width="44" valign="top">
			<xsl:value-of select="format-number(sum(/afids_report/record[wingID=8][monthNo=12]/cancelledCount),'#,###')"/>
			<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text>
		</td>
		<td align="right" width="44" valign="top">
			<xsl:value-of select="format-number(sum(/afids_report/record[wingID=8]/cancelledCount),'#,###')"/>
			<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text>
		</td>
		<td align="right" width="44" valign="top">
			<xsl:value-of select="format-number(sum(/afids_report/record[wingID=8]/cancelledCount) div sum(/afids_report/record[wingID=8]/legCount),'#,###.0%')"/>
			<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text>
		</td>
</tr>
 	<tr>
		<td align="left" valign="top" width="140">
			<a>
				<xsl:attribute name="href">
					<xsl:value-of select="concat('/reports/reports.php?reportDef=report_specs.xml',$and,'reportName=cancelled_mission_detail_for_wing',$and,'year=',/afids_report/record/missionYear,$and,'wing=7',$and,'action=display')"/>
				</xsl:attribute>
				New Mexico
			</a>
		</td>
		<td align="right" width="44" valign="top">
			<xsl:value-of select="format-number(sum(/afids_report/record[wingID=7][monthNo=1]/cancelledCount),'#,###')"/>
			<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text>
		</td>
		<td align="right" width="44" valign="top">
			<xsl:value-of select="format-number(sum(/afids_report/record[wingID=7][monthNo=2]/cancelledCount),'#,###')"/>
			<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text>
		</td>
		<td align="right" width="44" valign="top">
			<xsl:value-of select="format-number(sum(/afids_report/record[wingID=7][monthNo=3]/cancelledCount),'#,###')"/>
			<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text>
		</td>
		<td align="right" width="44" valign="top">
			<xsl:value-of select="format-number(sum(/afids_report/record[wingID=7][monthNo=4]/cancelledCount),'#,###')"/>
			<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text>
		</td>
		<td align="right" width="44" valign="top">
			<xsl:value-of select="format-number(sum(/afids_report/record[wingID=7][monthNo=5]/cancelledCount),'#,###')"/>
			<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text>
		</td>
		<td align="right" width="44" valign="top">
			<xsl:value-of select="format-number(sum(/afids_report/record[wingID=7][monthNo=6]/cancelledCount),'#,###')"/>
			<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text>
		</td>
		<td align="right" width="44" valign="top">
			<xsl:value-of select="format-number(sum(/afids_report/record[wingID=7][monthNo=7]/cancelledCount),'#,###')"/>
			<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text>
		</td>
		<td align="right" width="44" valign="top">
			<xsl:value-of select="format-number(sum(/afids_report/record[wingID=7][monthNo=8]/cancelledCount),'#,###')"/>
			<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text>
		</td>
		<td align="right" width="44" valign="top">
			<xsl:value-of select="format-number(sum(/afids_report/record[wingID=7][monthNo=9]/cancelledCount),'#,###')"/>
			<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text>
		</td>
		<td align="right" width="44" valign="top">
			<xsl:value-of select="format-number(sum(/afids_report/record[wingID=7][monthNo=10]/cancelledCount),'#,###')"/>
			<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text>
		</td>
		<td align="right" width="44" valign="top">
			<xsl:value-of select="format-number(sum(/afids_report/record[wingID=7][monthNo=11]/cancelledCount),'#,###')"/>
			<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text>
		</td>
		<td align="right" width="44" valign="top">
			<xsl:value-of select="format-number(sum(/afids_report/record[wingID=7][monthNo=12]/cancelledCount),'#,###')"/>
			<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text>
		</td>
		<td align="right" width="44" valign="top">
			<xsl:value-of select="format-number(sum(/afids_report/record[wingID=7]/cancelledCount),'#,###')"/>
			<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text>
		</td>
		<td align="right" width="44" valign="top">
			<xsl:value-of select="format-number(sum(/afids_report/record[wingID=7]/cancelledCount) div sum(/afids_report/record[wingID=7]/legCount),'#,###.0%')"/>
			<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text>
		</td>
</tr>
 	<tr>
		<td align="left" valign="top" width="140">
			<a>
				<xsl:attribute name="href">
					<xsl:value-of select="concat('/reports/reports.php?reportDef=report_specs.xml',$and,'reportName=cancelled_mission_detail_for_wing',$and,'year=',/afids_report/record/missionYear,$and,'wing=9',$and,'action=display')"/>
				</xsl:attribute>
				Oregon
			</a>
		</td>
		<td align="right" width="44" valign="top">
			<xsl:value-of select="format-number(sum(/afids_report/record[wingID=9][monthNo=1]/cancelledCount),'#,###')"/>
			<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text>
		</td>
		<td align="right" width="44" valign="top">
			<xsl:value-of select="format-number(sum(/afids_report/record[wingID=9][monthNo=2]/cancelledCount),'#,###')"/>
			<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text>
		</td>
		<td align="right" width="44" valign="top">
			<xsl:value-of select="format-number(sum(/afids_report/record[wingID=9][monthNo=3]/cancelledCount),'#,###')"/>
			<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text>
		</td>
		<td align="right" width="44" valign="top">
			<xsl:value-of select="format-number(sum(/afids_report/record[wingID=9][monthNo=4]/cancelledCount),'#,###')"/>
			<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text>
		</td>
		<td align="right" width="44" valign="top">
			<xsl:value-of select="format-number(sum(/afids_report/record[wingID=9][monthNo=5]/cancelledCount),'#,###')"/>
			<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text>
		</td>
		<td align="right" width="44" valign="top">
			<xsl:value-of select="format-number(sum(/afids_report/record[wingID=9][monthNo=6]/cancelledCount),'#,###')"/>
			<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text>
		</td>
		<td align="right" width="44" valign="top">
			<xsl:value-of select="format-number(sum(/afids_report/record[wingID=9][monthNo=7]/cancelledCount),'#,###')"/>
			<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text>
		</td>
		<td align="right" width="44" valign="top">
			<xsl:value-of select="format-number(sum(/afids_report/record[wingID=9][monthNo=8]/cancelledCount),'#,###')"/>
			<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text>
		</td>
		<td align="right" width="44" valign="top">
			<xsl:value-of select="format-number(sum(/afids_report/record[wingID=9][monthNo=9]/cancelledCount),'#,###')"/>
			<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text>
		</td>
		<td align="right" width="44" valign="top">
			<xsl:value-of select="format-number(sum(/afids_report/record[wingID=9][monthNo=10]/cancelledCount),'#,###')"/>
			<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text>
		</td>
		<td align="right" width="44" valign="top">
			<xsl:value-of select="format-number(sum(/afids_report/record[wingID=9][monthNo=11]/cancelledCount),'#,###')"/>
			<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text>
		</td>
		<td align="right" width="44" valign="top">
			<xsl:value-of select="format-number(sum(/afids_report/record[wingID=9][monthNo=12]/cancelledCount),'#,###')"/>
			<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text>
		</td>
		<td align="right" width="44" valign="top">
			<xsl:value-of select="format-number(sum(/afids_report/record[wingID=9]/cancelledCount),'#,###')"/>
			<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text>
		</td>
		<td align="right" width="44" valign="top">
			<xsl:value-of select="format-number(sum(/afids_report/record[wingID=9]/cancelledCount) div sum(/afids_report/record[wingID=9]/legCount),'#,###.0%')"/>
			<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text>
		</td>
</tr>
 	<tr>
		<td align="left" valign="top" width="140">
			<a>
				<xsl:attribute name="href">
					<xsl:value-of select="concat('/reports/reports.php?reportDef=report_specs.xml',$and,'reportName=cancelled_mission_detail_for_wing',$and,'year=',/afids_report/record/missionYear,$and,'wing=21',$and,'action=display')"/>
				</xsl:attribute>
				Outside AFW
			</a>
		</td>
		<td align="right" width="44" valign="top">
			<xsl:value-of select="format-number(sum(/afids_report/record[wingID=21][monthNo=1]/cancelledCount),'#,###')"/>
			<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text>
		</td>
		<td align="right" width="44" valign="top">
			<xsl:value-of select="format-number(sum(/afids_report/record[wingID=21][monthNo=2]/cancelledCount),'#,###')"/>
			<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text>
		</td>
		<td align="right" width="44" valign="top">
			<xsl:value-of select="format-number(sum(/afids_report/record[wingID=21][monthNo=3]/cancelledCount),'#,###')"/>
			<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text>
		</td>
		<td align="right" width="44" valign="top">
			<xsl:value-of select="format-number(sum(/afids_report/record[wingID=21][monthNo=4]/cancelledCount),'#,###')"/>
			<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text>
		</td>
		<td align="right" width="44" valign="top">
			<xsl:value-of select="format-number(sum(/afids_report/record[wingID=21][monthNo=5]/cancelledCount),'#,###')"/>
			<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text>
		</td>
		<td align="right" width="44" valign="top">
			<xsl:value-of select="format-number(sum(/afids_report/record[wingID=21][monthNo=6]/cancelledCount),'#,###')"/>
			<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text>
		</td>
		<td align="right" width="44" valign="top">
			<xsl:value-of select="format-number(sum(/afids_report/record[wingID=21][monthNo=7]/cancelledCount),'#,###')"/>
			<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text>
		</td>
		<td align="right" width="44" valign="top">
			<xsl:value-of select="format-number(sum(/afids_report/record[wingID=21][monthNo=8]/cancelledCount),'#,###')"/>
			<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text>
		</td>
		<td align="right" width="44" valign="top">
			<xsl:value-of select="format-number(sum(/afids_report/record[wingID=21][monthNo=9]/cancelledCount),'#,###')"/>
			<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text>
		</td>
		<td align="right" width="44" valign="top">
			<xsl:value-of select="format-number(sum(/afids_report/record[wingID=21][monthNo=10]/cancelledCount),'#,###')"/>
			<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text>
		</td>
		<td align="right" width="44" valign="top">
			<xsl:value-of select="format-number(sum(/afids_report/record[wingID=21][monthNo=11]/cancelledCount),'#,###')"/>
			<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text>
		</td>
		<td align="right" width="44" valign="top">
			<xsl:value-of select="format-number(sum(/afids_report/record[wingID=21][monthNo=12]/cancelledCount),'#,###')"/>
			<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text>
		</td>
		<td align="right" width="44" valign="top">
			<xsl:value-of select="format-number(sum(/afids_report/record[wingID=21]/cancelledCount),'#,###')"/>
			<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text>
		</td>
		<td align="right" width="44" valign="top">
			<xsl:value-of select="format-number(sum(/afids_report/record[wingID=21]/cancelledCount) div sum(/afids_report/record[wingID=9]/legCount),'#,###.0%')"/>
			<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text>
		</td>
</tr>
  	<tr>
		<td align="left" valign="top" width="140">
			<a>
				<xsl:attribute name="href">
					<xsl:value-of select="concat('/reports/reports.php?reportDef=report_specs.xml',$and,'reportName=cancelled_mission_detail_for_wing',$and,'year=',/afids_report/record/missionYear,$and,'wing=18',$and,'action=display')"/>
				</xsl:attribute>
				Special Assist
			</a>
		</td>
		<td align="right" width="44" valign="top">
			<xsl:value-of select="format-number(sum(/afids_report/record[wingID=18][monthNo=1]/cancelledCount),'#,###')"/>
			<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text>
		</td>
		<td align="right" width="44" valign="top">
			<xsl:value-of select="format-number(sum(/afids_report/record[wingID=18][monthNo=2]/cancelledCount),'#,###')"/>
			<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text>
		</td>
		<td align="right" width="44" valign="top">
			<xsl:value-of select="format-number(sum(/afids_report/record[wingID=18][monthNo=3]/cancelledCount),'#,###')"/>
			<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text>
		</td>
		<td align="right" width="44" valign="top">
			<xsl:value-of select="format-number(sum(/afids_report/record[wingID=18][monthNo=4]/cancelledCount),'#,###')"/>
			<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text>
		</td>
		<td align="right" width="44" valign="top">
			<xsl:value-of select="format-number(sum(/afids_report/record[wingID=18][monthNo=5]/cancelledCount),'#,###')"/>
			<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text>
		</td>
		<td align="right" width="44" valign="top">
			<xsl:value-of select="format-number(sum(/afids_report/record[wingID=18][monthNo=6]/cancelledCount),'#,###')"/>
			<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text>
		</td>
		<td align="right" width="44" valign="top">
			<xsl:value-of select="format-number(sum(/afids_report/record[wingID=18][monthNo=7]/cancelledCount),'#,###')"/>
			<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text>
		</td>
		<td align="right" width="44" valign="top">
			<xsl:value-of select="format-number(sum(/afids_report/record[wingID=18][monthNo=8]/cancelledCount),'#,###')"/>
			<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text>
		</td>
		<td align="right" width="44" valign="top">
			<xsl:value-of select="format-number(sum(/afids_report/record[wingID=18][monthNo=9]/cancelledCount),'#,###')"/>
			<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text>
		</td>
		<td align="right" width="44" valign="top">
			<xsl:value-of select="format-number(sum(/afids_report/record[wingID=18][monthNo=10]/cancelledCount),'#,###')"/>
			<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text>
		</td>
		<td align="right" width="44" valign="top">
			<xsl:value-of select="format-number(sum(/afids_report/record[wingID=18][monthNo=11]/cancelledCount),'#,###')"/>
			<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text>
		</td>
		<td align="right" width="44" valign="top">
			<xsl:value-of select="format-number(sum(/afids_report/record[wingID=18][monthNo=12]/cancelledCount),'#,###')"/>
			<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text>
		</td>
		<td align="right" width="44" valign="top">
			<xsl:value-of select="format-number(sum(/afids_report/record[wingID=18]/cancelledCount),'#,###')"/>
			<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text>
		</td>
		<td align="right" width="44" valign="top">
			<xsl:value-of select="format-number(sum(/afids_report/record[wingID=18]/cancelledCount) div sum(/afids_report/record/cancelledCount),'#,###.0%')"/>
			<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text>
		</td>
	</tr>
 	<tr>
		<td align="left" valign="top" width="140">
			<a>
				<xsl:attribute name="href">
					<xsl:value-of select="concat('/reports/reports.php?reportDef=report_specs.xml',$and,'reportName=cancelled_mission_detail_for_wing',$and,'year=',/afids_report/record/missionYear,$and,'wing=10',$and,'action=display')"/>
				</xsl:attribute>
				Utah
			</a>
		</td>
		<td align="right" width="44" valign="top">
			<xsl:value-of select="format-number(sum(/afids_report/record[wingID=10][monthNo=1]/cancelledCount),'#,###')"/>
			<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text>
		</td>
		<td align="right" width="44" valign="top">
			<xsl:value-of select="format-number(sum(/afids_report/record[wingID=10][monthNo=2]/cancelledCount),'#,###')"/>
			<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text>
		</td>
		<td align="right" width="44" valign="top">
			<xsl:value-of select="format-number(sum(/afids_report/record[wingID=10][monthNo=3]/cancelledCount),'#,###')"/>
			<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text>
		</td>
		<td align="right" width="44" valign="top">
			<xsl:value-of select="format-number(sum(/afids_report/record[wingID=10][monthNo=4]/cancelledCount),'#,###')"/>
			<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text>
		</td>
		<td align="right" width="44" valign="top">
			<xsl:value-of select="format-number(sum(/afids_report/record[wingID=10][monthNo=5]/cancelledCount),'#,###')"/>
			<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text>
		</td>
		<td align="right" width="44" valign="top">
			<xsl:value-of select="format-number(sum(/afids_report/record[wingID=10][monthNo=6]/cancelledCount),'#,###')"/>
			<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text>
		</td>
		<td align="right" width="44" valign="top">
			<xsl:value-of select="format-number(sum(/afids_report/record[wingID=10][monthNo=7]/cancelledCount),'#,###')"/>
			<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text>
		</td>
		<td align="right" width="44" valign="top">
			<xsl:value-of select="format-number(sum(/afids_report/record[wingID=10][monthNo=8]/cancelledCount),'#,###')"/>
			<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text>
		</td>
		<td align="right" width="44" valign="top">
			<xsl:value-of select="format-number(sum(/afids_report/record[wingID=10][monthNo=9]/cancelledCount),'#,###')"/>
			<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text>
		</td>
		<td align="right" width="44" valign="top">
			<xsl:value-of select="format-number(sum(/afids_report/record[wingID=10][monthNo=10]/cancelledCount),'#,###')"/>
			<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text>
		</td>
		<td align="right" width="44" valign="top">
			<xsl:value-of select="format-number(sum(/afids_report/record[wingID=10][monthNo=11]/cancelledCount),'#,###')"/>
			<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text>
		</td>
		<td align="right" width="44" valign="top">
			<xsl:value-of select="format-number(sum(/afids_report/record[wingID=10][monthNo=12]/cancelledCount),'#,###')"/>
			<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text>
		</td>
		<td align="right" width="44" valign="top">
			<xsl:value-of select="format-number(sum(/afids_report/record[wingID=10]/cancelledCount),'#,###')"/>
			<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text>
		</td>
		<td align="right" width="44" valign="top">
			<xsl:value-of select="format-number(sum(/afids_report/record[wingID=10]/cancelledCount) div sum(/afids_report/record[wingID=10]/legCount),'#,###.0%')"/>
			<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text>
		</td>
</tr>
 	<tr>
		<td align="left" valign="top" width="140">
			<a>
				<xsl:attribute name="href">
					<xsl:value-of select="concat('/reports/reports.php?reportDef=report_specs.xml',$and,'reportName=cancelled_mission_detail_for_wing',$and,'year=',/afids_report/record/missionYear,$and,'wing=11',$and,'action=display')"/>
				</xsl:attribute>
				Washington
			</a>
		</td>
		<td align="right" width="44" valign="top">
			<xsl:value-of select="format-number(sum(/afids_report/record[wingID=11][monthNo=1]/cancelledCount),'#,###')"/>
			<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text>
		</td>
		<td align="right" width="44" valign="top">
			<xsl:value-of select="format-number(sum(/afids_report/record[wingID=11][monthNo=2]/cancelledCount),'#,###')"/>
			<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text>
		</td>
		<td align="right" width="44" valign="top">
			<xsl:value-of select="format-number(sum(/afids_report/record[wingID=11][monthNo=3]/cancelledCount),'#,###')"/>
			<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text>
		</td>
		<td align="right" width="44" valign="top">
			<xsl:value-of select="format-number(sum(/afids_report/record[wingID=11][monthNo=4]/cancelledCount),'#,###')"/>
			<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text>
		</td>
		<td align="right" width="44" valign="top">
			<xsl:value-of select="format-number(sum(/afids_report/record[wingID=11][monthNo=5]/cancelledCount),'#,###')"/>
			<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text>
		</td>
		<td align="right" width="44" valign="top">
			<xsl:value-of select="format-number(sum(/afids_report/record[wingID=11][monthNo=6]/cancelledCount),'#,###')"/>
			<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text>
		</td>
		<td align="right" width="44" valign="top">
			<xsl:value-of select="format-number(sum(/afids_report/record[wingID=11][monthNo=7]/cancelledCount),'#,###')"/>
			<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text>
		</td>
		<td align="right" width="44" valign="top">
			<xsl:value-of select="format-number(sum(/afids_report/record[wingID=11][monthNo=8]/cancelledCount),'#,###')"/>
			<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text>
		</td>
		<td align="right" width="44" valign="top">
			<xsl:value-of select="format-number(sum(/afids_report/record[wingID=11][monthNo=9]/cancelledCount),'#,###')"/>
			<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text>
		</td>
		<td align="right" width="44" valign="top">
			<xsl:value-of select="format-number(sum(/afids_report/record[wingID=11][monthNo=10]/cancelledCount),'#,###')"/>
			<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text>
		</td>
		<td align="right" width="44" valign="top">
			<xsl:value-of select="format-number(sum(/afids_report/record[wingID=11][monthNo=11]/cancelledCount),'#,###')"/>
			<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text>
		</td>
		<td align="right" width="44" valign="top">
			<xsl:value-of select="format-number(sum(/afids_report/record[wingID=11][monthNo=12]/cancelledCount),'#,###')"/>
			<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text>
		</td>
		<td align="right" width="44" valign="top">
			<xsl:value-of select="format-number(sum(/afids_report/record[wingID=11]/cancelledCount),'#,###')"/>
			<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text>
		</td>
		<td align="right" width="44" valign="top">
			<xsl:value-of select="format-number(sum(/afids_report/record[wingID=11]/cancelledCount) div sum(/afids_report/record[wingID=11]/legCount),'#,###.0%')"/>
			<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text>
		</td>
  </tr>
 	<tr>
		<td align="left" valign="top" width="140">
			<a>
				<xsl:attribute name="href">
					<xsl:value-of select="concat('/reports/reports.php?reportDef=report_specs.xml',$and,'reportName=cancelled_mission_detail_for_wing',$and,'year=',/afids_report/record/missionYear,$and,'wing=12',$and,'action=display')"/>
				</xsl:attribute>
				Wyoming
			</a>
		</td>
		<td align="right" width="44" valign="top">
			<xsl:value-of select="format-number(sum(/afids_report/record[wingID=12][monthNo=1]/cancelledCount),'#,###')"/>
			<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text>
		</td>
		<td align="right" width="44" valign="top">
			<xsl:value-of select="format-number(sum(/afids_report/record[wingID=12][monthNo=2]/cancelledCount),'#,###')"/>
			<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text>
		</td>
		<td align="right" width="44" valign="top">
			<xsl:value-of select="format-number(sum(/afids_report/record[wingID=12][monthNo=3]/cancelledCount),'#,###')"/>
			<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text>
		</td>
		<td align="right" width="44" valign="top">
			<xsl:value-of select="format-number(sum(/afids_report/record[wingID=12][monthNo=4]/cancelledCount),'#,###')"/>
			<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text>
		</td>
		<td align="right" width="44" valign="top">
			<xsl:value-of select="format-number(sum(/afids_report/record[wingID=12][monthNo=5]/cancelledCount),'#,###')"/>
			<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text>
		</td>
		<td align="right" width="44" valign="top">
			<xsl:value-of select="format-number(sum(/afids_report/record[wingID=12][monthNo=6]/cancelledCount),'#,###')"/>
			<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text>
		</td>
		<td align="right" width="44" valign="top">
			<xsl:value-of select="format-number(sum(/afids_report/record[wingID=12][monthNo=7]/cancelledCount),'#,###')"/>
			<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text>
		</td>
		<td align="right" width="44" valign="top">
			<xsl:value-of select="format-number(sum(/afids_report/record[wingID=12][monthNo=8]/cancelledCount),'#,###')"/>
			<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text>
		</td>
		<td align="right" width="44" valign="top">
			<xsl:value-of select="format-number(sum(/afids_report/record[wingID=12][monthNo=9]/cancelledCount),'#,###')"/>
			<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text>
		</td>
		<td align="right" width="44" valign="top">
			<xsl:value-of select="format-number(sum(/afids_report/record[wingID=12][monthNo=10]/cancelledCount),'#,###')"/>
			<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text>
		</td>
		<td align="right" width="44" valign="top">
			<xsl:value-of select="format-number(sum(/afids_report/record[wingID=12][monthNo=11]/cancelledCount),'#,###')"/>
			<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text>
		</td>
		<td align="right" width="44" valign="top">
			<xsl:value-of select="format-number(sum(/afids_report/record[wingID=12][monthNo=12]/cancelledCount),'#,###')"/>
			<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text>
		</td>
		<td align="right" width="44" valign="top">
			<xsl:value-of select="format-number(sum(/afids_report/record[wingID=12]/cancelledCount),'#,###')"/>
			<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text>
		</td>
		<td align="right" width="44" valign="top">
			<xsl:value-of select="format-number(sum(/afids_report/record[wingID=12]/cancelledCount) div sum(/afids_report/record[wingID=12]/legCount),'#,###.0%')"/>
			<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text>
		</td>
        </tr>
 	<tr class="totalrow">
		<td align="left" valign="top" width="140">Totals</td>
		<td align="right" valign="top" width="44"><b>
			<xsl:value-of select="format-number(sum(/afids_report/record[monthNo=1]/cancelledCount),'#,###')"/>
			<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text></b>
		</td>
		<td align="right" valign="top" width="44"><b>
			<xsl:value-of select="format-number(sum(/afids_report/record[monthNo=2]/cancelledCount),'#,###')"/>
			<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text></b>
		</td>
		<td align="right" valign="top" width="44"><b>
			<xsl:value-of select="format-number(sum(/afids_report/record[monthNo=3]/cancelledCount),'#,###')"/>
			<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text></b>
		</td>
		<td align="right" valign="top" width="44"><b>
			<xsl:value-of select="format-number(sum(/afids_report/record[monthNo=4]/cancelledCount),'#,###')"/>
			<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text></b>
		</td>
		<td align="right" valign="top" width="44"><b>
			<xsl:value-of select="format-number(sum(/afids_report/record[monthNo=5]/cancelledCount),'#,###')"/>
			<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text></b>
		</td>
		<td align="right" valign="top" width="44"><b>
			<xsl:value-of select="format-number(sum(/afids_report/record[monthNo=6]/cancelledCount),'#,###')"/>
			<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text></b>
		</td>
		<td align="right" valign="top" width="44"><b>
			<xsl:value-of select="format-number(sum(/afids_report/record[monthNo=7]/cancelledCount),'#,###')"/>
			<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text></b>
		</td>		
		<td align="right" valign="top" width="44"><b>
			<xsl:value-of select="format-number(sum(/afids_report/record[monthNo=8]/cancelledCount),'#,###')"/>
			<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text></b>
		</td>
		<td align="right" valign="top" width="44"><b>
			<xsl:value-of select="format-number(sum(/afids_report/record[monthNo=9]/cancelledCount),'#,###')"/>
			<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text></b>
		</td>		
		<td align="right" valign="top" width="44"><b>
			<xsl:value-of select="format-number(sum(/afids_report/record[monthNo=10]/cancelledCount),'#,###')"/>
			<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text></b>
		</td>		
		<td align="right" valign="top" width="44"><b>
			<xsl:value-of select="format-number(sum(/afids_report/record[monthNo=11]/cancelledCount),'#,###')"/>
			<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text></b>
		</td>		
		<td align="right" valign="top" width="44"><b>
			<xsl:value-of select="format-number(sum(/afids_report/record[monthNo=12]/cancelledCount),'#,###')"/>
			<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text></b>
		</td>					
		<td align="right" valign="top" width="44"><b>
			<xsl:value-of select="format-number(sum(/afids_report/record/cancelledCount),'#,###')"/>
			<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text></b>
		</td>
		<td align="right" valign="top" width="44"><xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text></td>
	</tr>
  <tr>
		<td align="left" valign="top" width="140">% Cancel</td>
		<td align="right" valign="top" width="44"><b>
			<xsl:value-of select="format-number(sum(/afids_report/record[monthNo=1]/cancelledCount) div sum(/afids_report/record/cancelledCount),'#,###.0%')"/>
			<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text></b>
		</td>
		<td align="right" valign="top" width="44"><b>
			<xsl:value-of select="format-number(sum(/afids_report/record[monthNo=2]/cancelledCount) div sum(/afids_report/record/cancelledCount),'#,###.0%')"/>
			<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text></b>
		</td>
		<td align="right" valign="top" width="44"><b>
			<xsl:value-of select="format-number(sum(/afids_report/record[monthNo=3]/cancelledCount) div sum(/afids_report/record/cancelledCount),'#,###.0%')"/>
			<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text></b>
		</td>
		<td align="right" valign="top" width="44"><b>
			<xsl:value-of select="format-number(sum(/afids_report/record[monthNo=4]/cancelledCount) div sum(/afids_report/record/cancelledCount),'#,###.0%')"/>
			<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text></b>
		</td>
		<td align="right" valign="top" width="44"><b>
			<xsl:value-of select="format-number(sum(/afids_report/record[monthNo=5]/cancelledCount) div sum(/afids_report/record/cancelledCount),'#,###.0%')"/>
			<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text></b>
		</td>
		<td align="right" valign="top" width="44"><b>
			<xsl:value-of select="format-number(sum(/afids_report/record[monthNo=6]/cancelledCount) div sum(/afids_report/record/cancelledCount),'#,###.0%')"/>
			<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text></b>
		</td>
		<td align="right" valign="top" width="44"><b>
			<xsl:value-of select="format-number(sum(/afids_report/record[monthNo=7]/cancelledCount) div sum(/afids_report/record/cancelledCount),'#,###.0%')"/>
			<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text></b>
		</td>
		<td align="right" valign="top" width="44"><b>
			<xsl:value-of select="format-number(sum(/afids_report/record[monthNo=8]/cancelledCount) div sum(/afids_report/record/cancelledCount),'#,###.0%')"/>
			<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text></b>
		</td>
		<td align="right" valign="top" width="44"><b>
			<xsl:value-of select="format-number(sum(/afids_report/record[monthNo=9]/cancelledCount) div sum(/afids_report/record/cancelledCount),'#,###.0%')"/>
			<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text></b>
		</td>
		<td align="right" valign="top" width="44"><b>
			<xsl:value-of select="format-number(sum(/afids_report/record[monthNo=10]/cancelledCount) div sum(/afids_report/record/cancelledCount),'#,###.0%')"/>
			<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text></b>
		</td>
		<td align="right" valign="top" width="44"><b>
			<xsl:value-of select="format-number(sum(/afids_report/record[monthNo=11]/cancelledCount) div sum(/afids_report/record/cancelledCount),'#,###.0%')"/>
			<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text></b>
		</td>
		<td align="right" valign="top" width="44"><b>
			<xsl:value-of select="format-number(sum(/afids_report/record[monthNo=12]/cancelledCount) div sum(/afids_report/record/cancelledCount),'#,###.0%')"/>
			<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text></b>
		</td>
		<td align="right" valign="top" width="120"><xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text></td>
		<td align="right" valign="top" width="120"><xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text></td>
	</tr>
	</tbody>
</table>
</div>
</xsl:template>

<xsl:template name="make-month-link">
	<xsl:value-of select="concat('reports.php?reportDef=','report_specs.xml')" /><xsl:text disable-output-escaping="yes">&amp;</xsl:text>
	<xsl:value-of select="concat('reportName=','cancelled_mission_detail')" /><xsl:text disable-output-escaping="yes">&amp;</xsl:text>
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
