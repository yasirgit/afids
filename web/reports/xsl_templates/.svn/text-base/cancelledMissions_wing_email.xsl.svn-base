<xsl:stylesheet version="1.0" xmlns:xsl="http://www.w3.org/1999/XSL/Transform">
<xsl:output method="html" />
<xsl:strip-space elements="*"/>

<xsl:template match="/">

<!--report table start-->
<!--report table start-->
<p><span style="font-weight:bold;font-size:12pt;color: rgb(52, 121, 190);">Canceled Missions Detail (by Wing)</span></p>
  <table border="1" cellpadding="2" cellspacing="0" width="760">
  	<thead>
    	<tr>
      	<td align="left" style="background-color: rgb(240, 240, 240);" width="140"><span style="font-weight:bold;color: rgb(52, 121, 190);">Reason</span></td>
        <td align="center" style="background-color: rgb(240, 240, 240);" width="44"><span style="font-weight:bold;color: rgb(52, 121, 190);">Jan</span></td>
        <td align="center" style="background-color: rgb(240, 240, 240);" width="44"><span style="font-weight:bold;color: rgb(52, 121, 190);">Feb</span></td>
        <td align="center" style="background-color: rgb(240, 240, 240);" width="44"><span style="font-weight:bold;color: rgb(52, 121, 190);">Mar</span></td>
        <td align="center" style="background-color: rgb(240, 240, 240);" width="44"><span style="font-weight:bold;color: rgb(52, 121, 190);">Apr</span></td>
        <td align="center" style="background-color: rgb(240, 240, 240);" width="44"><span style="font-weight:bold;color: rgb(52, 121, 190);">May</span></td>
        <td align="center" style="background-color: rgb(240, 240, 240);" width="44"><span style="font-weight:bold;color: rgb(52, 121, 190);">Jun</span></td>
        <td align="center" style="background-color: rgb(240, 240, 240);" width="44"><span style="font-weight:bold;color: rgb(52, 121, 190);">Jul</span></td>        
        <td align="center" style="background-color: rgb(240, 240, 240);" width="44"><span style="font-weight:bold;color: rgb(52, 121, 190);">Aug</span></td>
        <td align="center" style="background-color: rgb(240, 240, 240);" width="44"><span style="font-weight:bold;color: rgb(52, 121, 190);">Sep</span></td>
        <td align="center" style="background-color: rgb(240, 240, 240);" width="44"><span style="font-weight:bold;color: rgb(52, 121, 190);">Oct</span></td>
        <td align="center" style="background-color: rgb(240, 240, 240);" width="44"><span style="font-weight:bold;color: rgb(52, 121, 190);">Nov</span></td>
        <td align="center" style="background-color: rgb(240, 240, 240);" width="44"><span style="font-weight:bold;color: rgb(52, 121, 190);">Dec</span></td>
        <td align="center" style="background-color: rgb(240, 240, 240);" width="44"><span style="font-weight:bold;color: rgb(52, 121, 190);">Tot</span></td>        
        <td align="center" style="background-color: rgb(240, 240, 240);" width="44"><span style="font-weight:bold;color: rgb(52, 121, 190);">%</span></td>
      </tr>
    </thead>
    <tbody>
 	<tr>
		<td align="left" valign="top" width="140">AFW Office</td>
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
		<td align="left" valign="top" width="140">Airline</td>
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
		<td align="left" valign="top" width="140">Alaska</td>
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
		<td align="left" valign="top" width="140">Alaska Air</td>
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
		<td align="left" valign="top" width="140">Alaska Air Mileage</td>
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
		<td align="left" valign="top" width="140">Arizona</td>
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
		<td align="left" valign="top" width="140">Calif, N</td>
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
		<td align="left" valign="top" width="140">Calif, S</td>
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
		<td align="left" valign="top" width="140">Colorado</td>
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
		<td align="left" valign="top" width="140">Frontier</td>
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
		<td align="left" valign="top" width="140">Hawaii</td>
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
		<td align="left" valign="top" width="140">Idaho</td>
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
		<td align="left" valign="top" width="140">Montana</td>
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
		<td align="left" valign="top" width="140">Nevada</td>
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
		<td align="left" valign="top" width="140">New Mexico</td>
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
		<td align="left" valign="top" width="140">Oregon</td>
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
		<td align="left" valign="top" width="140">Outside AFW</td>
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
			<xsl:value-of select="format-number(sum(/afids_report/record[wingID=21]/cancelledCount) div sum(/afids_report/record/cancelledCount),'#,###.0%')"/>
			<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text>
		</td>
	</tr>
  	<tr>
		<td align="left" valign="top" width="140">Special Assist</td>
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
		<td align="left" valign="top" width="140">Utah</td>
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
		<td align="left" valign="top" width="140">Washington</td>
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
		<td align="left" valign="top" width="140">Wyoming</td>
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
		<td align="left" valign="top" width="140">Totals
		</td>
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
		<td align="left" valign="top" width="140">Percent
		</td>
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
</xsl:template>
</xsl:stylesheet>