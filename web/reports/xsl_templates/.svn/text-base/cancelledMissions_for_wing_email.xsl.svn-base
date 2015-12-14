<xsl:stylesheet version="1.0" xmlns:xsl="http://www.w3.org/1999/XSL/Transform">
<xsl:output method="html" />
<xsl:strip-space elements="*"/>

<xsl:template match="/">
<!--report table start-->
<p><span style="font-weight:bold;font-size:12pt;color: rgb(52, 121, 190);">Canceled Missions Detail</span></p>
<p style="margin-top:8px;margin-bottom:8px">For wing: <xsl:value-of select="/afids_report/record/wingName"/></p>
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
		<td align="left" valign="top" width="140">AFW</td>
		<td align="right" width="44" valign="top">
			<xsl:value-of select="format-number(sum(/afids_report/record[cancelled='Angel Flight' or cancelled='Angel Flight West' or cancelled='Other Leg'][monthNo=1]/legCount),'#,###')"/>
			<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text>
		</td>
		<td align="right" width="44" valign="top">
			<xsl:value-of select="format-number(sum(/afids_report/record[cancelled='Angel Flight' or cancelled='Angel Flight West' or cancelled='Other Leg'][monthNo=2]/legCount),'#,###')"/>
			<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text>
		</td>
		<td align="right" width="44" valign="top">
			<xsl:value-of select="format-number(sum(/afids_report/record[cancelled='Angel Flight' or cancelled='Angel Flight West' or cancelled='Other Leg'][monthNo=3]/legCount),'#,###')"/>
			<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text>
		</td>
		<td align="right" width="44" valign="top">
			<xsl:value-of select="format-number(sum(/afids_report/record[cancelled='Angel Flight' or cancelled='Angel Flight West' or cancelled='Other Leg'][monthNo=4]/legCount),'#,###')"/>
			<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text>
		</td>
		<td align="right" width="44" valign="top">
			<xsl:value-of select="format-number(sum(/afids_report/record[cancelled='Angel Flight' or cancelled='Angel Flight West' or cancelled='Other Leg'][monthNo=5]/legCount),'#,###')"/>
			<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text>
		</td>
		<td align="right" width="44" valign="top">
			<xsl:value-of select="format-number(sum(/afids_report/record[cancelled='Angel Flight' or cancelled='Angel Flight West' or cancelled='Other Leg'][monthNo=6]/legCount),'#,###')"/>
			<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text>
		</td>
		<td align="right" width="44" valign="top">
			<xsl:value-of select="format-number(sum(/afids_report/record[cancelled='Angel Flight' or cancelled='Angel Flight West' or cancelled='Other Leg'][monthNo=7]/legCount),'#,###')"/>
			<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text>
		</td>
		<td align="right" width="44" valign="top">
			<xsl:value-of select="format-number(sum(/afids_report/record[cancelled='Angel Flight' or cancelled='Angel Flight West' or cancelled='Other Leg'][monthNo=8]/legCount),'#,###')"/>
			<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text>
		</td>
		<td align="right" width="44" valign="top">
			<xsl:value-of select="format-number(sum(/afids_report/record[cancelled='Angel Flight' or cancelled='Angel Flight West' or cancelled='Other Leg'][monthNo=9]/legCount),'#,###')"/>
			<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text>
		</td>
		<td align="right" width="44" valign="top">
			<xsl:value-of select="format-number(sum(/afids_report/record[cancelled='Angel Flight' or cancelled='Angel Flight West' or cancelled='Other Leg'][monthNo=10]/legCount),'#,###')"/>
			<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text>
		</td>
		<td align="right" width="44" valign="top">
			<xsl:value-of select="format-number(sum(/afids_report/record[cancelled='Angel Flight' or cancelled='Angel Flight West' or cancelled='Other Leg'][monthNo=11]/legCount),'#,###')"/>
			<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text>
		</td>
		<td align="right" width="44" valign="top">
			<xsl:value-of select="format-number(sum(/afids_report/record[cancelled='Angel Flight' or cancelled='Angel Flight West' or cancelled='Other Leg'][monthNo=12]/legCount),'#,###')"/>
			<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text>
		</td>
		<td align="right" width="44" valign="top">
			<xsl:value-of select="format-number(sum(/afids_report/record[cancelled='Angel Flight' or cancelled='Angel Flight West' or cancelled='Other Leg']/legCount),'#,###')"/>
			<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text>
		</td>
		<td align="right" width="44" valign="top">
			<xsl:value-of select="format-number(sum(/afids_report/record[cancelled='Angel Flight' or cancelled='Angel Flight West' or cancelled='Other Leg']/legCount) div sum(/afids_report/record[cancelled!='']/legCount),'#,###.0%')"/>
			<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text>
		</td>
</tr>
 	<tr>
		<td align="left" valign="top" width="140">Weather</td>
		<td align="right" valign="top">
			<xsl:value-of select="format-number(sum(/afids_report/record[cancelled='Weather'][monthNo=1]/legCount),'#,###')"/>
			<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text>
		</td>
		<td align="right" width="44" valign="top">
			<xsl:value-of select="format-number(sum(/afids_report/record[cancelled='Weather'][monthNo=2]/legCount),'#,###')"/>
			<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text>
		</td>
		<td align="right" width="44" valign="top">
			<xsl:value-of select="format-number(sum(/afids_report/record[cancelled='Weather'][monthNo=3]/legCount),'#,###')"/>
			<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text>
		</td>
		<td align="right" width="44" valign="top">
			<xsl:value-of select="format-number(sum(/afids_report/record[cancelled='Weather'][monthNo=4]/legCount),'#,###')"/>
			<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text>
		</td>
		<td align="right" width="44" valign="top">
			<xsl:value-of select="format-number(sum(/afids_report/record[cancelled='Weather'][monthNo=5]/legCount),'#,###')"/>
			<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text>
		</td>
		<td align="right" width="44" valign="top">
			<xsl:value-of select="format-number(sum(/afids_report/record[cancelled='Weather'][monthNo=6]/legCount),'#,###')"/>
			<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text>
		</td>
		<td align="right" width="44" valign="top">
			<xsl:value-of select="format-number(sum(/afids_report/record[cancelled='Weather'][monthNo=7]/legCount),'#,###')"/>
			<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text>
		</td>
		<td align="right" width="44" valign="top">
			<xsl:value-of select="format-number(sum(/afids_report/record[cancelled='Weather'][monthNo=8]/legCount),'#,###')"/>
			<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text>
		</td>
		<td align="right" width="44" valign="top">
			<xsl:value-of select="format-number(sum(/afids_report/record[cancelled='Weather'][monthNo=9]/legCount),'#,###')"/>
			<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text>
		</td>
		<td align="right" width="44" valign="top">
			<xsl:value-of select="format-number(sum(/afids_report/record[cancelled='Weather'][monthNo=10]/legCount),'#,###')"/>
			<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text>
		</td>
		<td align="right" width="44" valign="top">
			<xsl:value-of select="format-number(sum(/afids_report/record[cancelled='Weather'][monthNo=11]/legCount),'#,###')"/>
			<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text>
		</td>
		<td align="right" width="44" valign="top">
			<xsl:value-of select="format-number(sum(/afids_report/record[cancelled='Weather'][monthNo=12]/legCount),'#,###')"/>
			<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text>
		</td>
		<td align="right" width="44" valign="top">
			<xsl:value-of select="format-number(sum(/afids_report/record[cancelled='Weather']/legCount),'#,###')"/>
			<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text>
		</td>
		<td align="right" width="44" valign="top">
						<xsl:value-of select="format-number(sum(/afids_report/record[cancelled='Weather']/legCount) div sum(/afids_report/record[cancelled!='']/legCount),'#,###.0%')"/>
			<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text>
		</td>
</tr>
 	<tr>
		<td align="left" valign="top" width="140">Passenger</td>
		<td align="right" valign="top">
			<xsl:value-of select="format-number(sum(/afids_report/record[cancelled='Patient' or cancelled='Requester Medical'][monthNo=1]/legCount),'#,###')"/>
			<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text>
		</td>
		<td align="right" width="44" valign="top">
			<xsl:value-of select="format-number(sum(/afids_report/record[cancelled='Patient' or cancelled='Requester Medical'][monthNo=2]/legCount),'#,###')"/>
			<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text>
		</td>
		<td align="right" width="44" valign="top">
			<xsl:value-of select="format-number(sum(/afids_report/record[cancelled='Patient' or cancelled='Requester Medical'][monthNo=3]/legCount),'#,###')"/>
			<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text>
		</td>
		<td align="right" width="44" valign="top">
			<xsl:value-of select="format-number(sum(/afids_report/record[cancelled='Patient' or cancelled='Requester Medical'][monthNo=4]/legCount),'#,###')"/>
			<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text>
		</td>
		<td align="right" width="44" valign="top">
			<xsl:value-of select="format-number(sum(/afids_report/record[cancelled='Patient' or cancelled='Requester Medical'][monthNo=5]/legCount),'#,###')"/>
			<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text>
		</td>
		<td align="right" width="44" valign="top">
			<xsl:value-of select="format-number(sum(/afids_report/record[cancelled='Patient' or cancelled='Requester Medical'][monthNo=6]/legCount),'#,###')"/>
			<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text>
		</td>
		<td align="right" width="44" valign="top">
			<xsl:value-of select="format-number(sum(/afids_report/record[cancelled='Patient' or cancelled='Requester Medical'][monthNo=7]/legCount),'#,###')"/>
			<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text>
		</td>
		<td align="right" width="44" valign="top">
			<xsl:value-of select="format-number(sum(/afids_report/record[cancelled='Patient' or cancelled='Requester Medical'][monthNo=8]/legCount),'#,###')"/>
			<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text>
		</td>
		<td align="right" width="44" valign="top">
			<xsl:value-of select="format-number(sum(/afids_report/record[cancelled='Patient' or cancelled='Requester Medical'][monthNo=9]/legCount),'#,###')"/>
			<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text>
		</td>
		<td align="right" width="44" valign="top">
			<xsl:value-of select="format-number(sum(/afids_report/record[cancelled='Patient' or cancelled='Requester Medical'][monthNo=10]/legCount),'#,###')"/>
			<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text>
		</td>
		<td align="right" width="44" valign="top">
			<xsl:value-of select="format-number(sum(/afids_report/record[cancelled='Patient' or cancelled='Requester Medical'][monthNo=11]/legCount),'#,###')"/>
			<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text>
		</td>
		<td align="right" width="44" valign="top">
			<xsl:value-of select="format-number(sum(/afids_report/record[cancelled='Patient' or cancelled='Requester Medical'][monthNo=12]/legCount),'#,###')"/>
			<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text>
		</td>
		<td align="right" width="44" valign="top">
			<xsl:value-of select="format-number(sum(/afids_report/record[cancelled='Patient']/legCount),'#,###')"/>
			<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text>
		</td>
		<td align="right" width="44" valign="top">
						<xsl:value-of select="format-number(sum(/afids_report/record[cancelled='Patient' or cancelled='Requester Medical']/legCount) div sum(/afids_report/record[cancelled!='']/legCount),'#,###.0%')"/>
			<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text>
		</td>
</tr>
 	<tr>
		<td align="left" valign="top" width="140">Other Agency</td>
		<td align="right" valign="top">
			<xsl:value-of select="format-number(sum(/afids_report/record[cancelled='Other Agency'][monthNo=1]/legCount),'#,###')"/>
			<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text>
		</td>
		<td align="right" width="44" valign="top">
			<xsl:value-of select="format-number(sum(/afids_report/record[cancelled='Other Agency'][monthNo=2]/legCount),'#,###')"/>
			<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text>
		</td>
		<td align="right" width="44" valign="top">
			<xsl:value-of select="format-number(sum(/afids_report/record[cancelled='Other Agency'][monthNo=3]/legCount),'#,###')"/>
			<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text>
		</td>
		<td align="right" width="44" valign="top">
			<xsl:value-of select="format-number(sum(/afids_report/record[cancelled='Other Agency'][monthNo=4]/legCount),'#,###')"/>
			<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text>
		</td>
		<td align="right" width="44" valign="top">
			<xsl:value-of select="format-number(sum(/afids_report/record[cancelled='Other Agency'][monthNo=5]/legCount),'#,###')"/>
			<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text>
		</td>
		<td align="right" width="44" valign="top">
			<xsl:value-of select="format-number(sum(/afids_report/record[cancelled='Other Agency'][monthNo=6]/legCount),'#,###')"/>
			<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text>
		</td>
		<td align="right" width="44" valign="top">
			<xsl:value-of select="format-number(sum(/afids_report/record[cancelled='Other Agency'][monthNo=7]/legCount),'#,###')"/>
			<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text>
		</td>
		<td align="right" width="44" valign="top">
			<xsl:value-of select="format-number(sum(/afids_report/record[cancelled='Other Agency'][monthNo=8]/legCount),'#,###')"/>
			<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text>
		</td>
		<td align="right" width="44" valign="top">
			<xsl:value-of select="format-number(sum(/afids_report/record[cancelled='Other Agency'][monthNo=9]/legCount),'#,###')"/>
			<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text>
		</td>
		<td align="right" width="44" valign="top">
			<xsl:value-of select="format-number(sum(/afids_report/record[cancelled='Other Agency'][monthNo=10]/legCount),'#,###')"/>
			<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text>
		</td>
		<td align="right" width="44" valign="top">
			<xsl:value-of select="format-number(sum(/afids_report/record[cancelled='Other Agency'][monthNo=11]/legCount),'#,###')"/>
			<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text>
		</td>
		<td align="right" width="44" valign="top">
			<xsl:value-of select="format-number(sum(/afids_report/record[cancelled='Other Agency'][monthNo=12]/legCount),'#,###')"/>
			<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text>
		</td>
		<td align="right" width="44" valign="top">
			<xsl:value-of select="format-number(sum(/afids_report/record[cancelled='Other Agency']/legCount),'#,###')"/>
			<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text>
		</td>
		<td align="right" width="44" valign="top">
						<xsl:value-of select="format-number(sum(/afids_report/record[cancelled='Other Agency']/legCount) div sum(/afids_report/record[cancelled!='']/legCount),'#,###.0%')"/>
			<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text>
		</td>
</tr>
 	<tr>
		<td align="left" valign="top" width="140">Requester</td>
		<td align="right" valign="top">
			<xsl:value-of select="format-number(sum(/afids_report/record[cancelled='Requester'][monthNo=1]/legCount),'#,###')"/>
			<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text>
		</td>
		<td align="right" width="44" valign="top">
			<xsl:value-of select="format-number(sum(/afids_report/record[cancelled='Requester'][monthNo=2]/legCount),'#,###')"/>
			<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text>
		</td>
		<td align="right" width="44" valign="top">
			<xsl:value-of select="format-number(sum(/afids_report/record[cancelled='Requester'][monthNo=3]/legCount),'#,###')"/>
			<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text>
		</td>
		<td align="right" width="44" valign="top">
			<xsl:value-of select="format-number(sum(/afids_report/record[cancelled='Requester'][monthNo=4]/legCount),'#,###')"/>
			<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text>
		</td>
		<td align="right" width="44" valign="top">
			<xsl:value-of select="format-number(sum(/afids_report/record[cancelled='Requester'][monthNo=5]/legCount),'#,###')"/>
			<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text>
		</td>
		<td align="right" width="44" valign="top">
			<xsl:value-of select="format-number(sum(/afids_report/record[cancelled='Requester'][monthNo=6]/legCount),'#,###')"/>
			<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text>
		</td>
		<td align="right" width="44" valign="top">
			<xsl:value-of select="format-number(sum(/afids_report/record[cancelled='Requester'][monthNo=7]/legCount),'#,###')"/>
			<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text>
		</td>
		<td align="right" width="44" valign="top">
			<xsl:value-of select="format-number(sum(/afids_report/record[cancelled='Requester'][monthNo=8]/legCount),'#,###')"/>
			<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text>
		</td>
		<td align="right" width="44" valign="top">
			<xsl:value-of select="format-number(sum(/afids_report/record[cancelled='Requester'][monthNo=9]/legCount),'#,###')"/>
			<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text>
		</td>
		<td align="right" width="44" valign="top">
			<xsl:value-of select="format-number(sum(/afids_report/record[cancelled='Requester'][monthNo=10]/legCount),'#,###')"/>
			<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text>
		</td>
		<td align="right" width="44" valign="top">
			<xsl:value-of select="format-number(sum(/afids_report/record[cancelled='Requester'][monthNo=11]/legCount),'#,###')"/>
			<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text>
		</td>
		<td align="right" width="44" valign="top">
			<xsl:value-of select="format-number(sum(/afids_report/record[cancelled='Requester'][monthNo=12]/legCount),'#,###')"/>
			<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text>
		</td>
		<td align="right" width="44" valign="top">
			<xsl:value-of select="format-number(sum(/afids_report/record[cancelled='Requester']/legCount),'#,###')"/>
			<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text>
		</td>
		<td align="right" width="44" valign="top">
						<xsl:value-of select="format-number(sum(/afids_report/record[cancelled='Requester']/legCount) div sum(/afids_report/record[cancelled!='']/legCount),'#,###.0%')"/>
			<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text>
		</td>
</tr>
 	<tr>
		<td align="left" valign="top" width="140">No Pilot</td>
		<td align="right" valign="top">
			<xsl:value-of select="format-number(sum(/afids_report/record[cancelled='No Pilot'][monthNo=1]/legCount),'#,###')"/>
			<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text>
		</td>
		<td align="right" width="44" valign="top">
			<xsl:value-of select="format-number(sum(/afids_report/record[cancelled='No Pilot'][monthNo=2]/legCount),'#,###')"/>
			<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text>
		</td>
		<td align="right" width="44" valign="top">
			<xsl:value-of select="format-number(sum(/afids_report/record[cancelled='No Pilot'][monthNo=3]/legCount),'#,###')"/>
			<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text>
		</td>
		<td align="right" width="44" valign="top">
			<xsl:value-of select="format-number(sum(/afids_report/record[cancelled='No Pilot'][monthNo=4]/legCount),'#,###')"/>
			<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text>
		</td>
		<td align="right" width="44" valign="top">
			<xsl:value-of select="format-number(sum(/afids_report/record[cancelled='No Pilot'][monthNo=5]/legCount),'#,###')"/>
			<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text>
		</td>
		<td align="right" width="44" valign="top">
			<xsl:value-of select="format-number(sum(/afids_report/record[cancelled='No Pilot'][monthNo=6]/legCount),'#,###')"/>
			<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text>
		</td>
		<td align="right" width="44" valign="top">
			<xsl:value-of select="format-number(sum(/afids_report/record[cancelled='No Pilot'][monthNo=7]/legCount),'#,###')"/>
			<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text>
		</td>
		<td align="right" width="44" valign="top">
			<xsl:value-of select="format-number(sum(/afids_report/record[cancelled='No Pilot'][monthNo=8]/legCount),'#,###')"/>
			<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text>
		</td>
		<td align="right" width="44" valign="top">
			<xsl:value-of select="format-number(sum(/afids_report/record[cancelled='No Pilot'][monthNo=9]/legCount),'#,###')"/>
			<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text>
		</td>
		<td align="right" width="44" valign="top">
			<xsl:value-of select="format-number(sum(/afids_report/record[cancelled='No Pilot'][monthNo=10]/legCount),'#,###')"/>
			<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text>
		</td>
		<td align="right" width="44" valign="top">
			<xsl:value-of select="format-number(sum(/afids_report/record[cancelled='No Pilot'][monthNo=11]/legCount),'#,###')"/>
			<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text>
		</td>
		<td align="right" width="44" valign="top">
			<xsl:value-of select="format-number(sum(/afids_report/record[cancelled='No Pilot'][monthNo=12]/legCount),'#,###')"/>
			<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text>
		</td>
		<td align="right" width="44" valign="top">
			<xsl:value-of select="format-number(sum(/afids_report/record[cancelled='No Pilot']/legCount),'#,###')"/>
			<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text>
		</td>
		<td align="right" width="44" valign="top">
						<xsl:value-of select="format-number(sum(/afids_report/record[cancelled='No Pilot']/legCount) div sum(/afids_report/record[cancelled!='']/legCount),'#,###.0%')"/>
			<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text>
		</td>
</tr>
 	<tr>
		<td align="left" valign="top" width="140">Mechanical</td>
		<td align="right" valign="top">
			<xsl:value-of select="format-number(sum(/afids_report/record[cancelled='Mechanical'][monthNo=1]/legCount),'#,###')"/>
			<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text>
		</td>
		<td align="right" width="44" valign="top">
			<xsl:value-of select="format-number(sum(/afids_report/record[cancelled='Mechanical'][monthNo=2]/legCount),'#,###')"/>
			<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text>
		</td>
		<td align="right" width="44" valign="top">
			<xsl:value-of select="format-number(sum(/afids_report/record[cancelled='Mechanical'][monthNo=3]/legCount),'#,###')"/>
			<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text>
		</td>
		<td align="right" width="44" valign="top">
			<xsl:value-of select="format-number(sum(/afids_report/record[cancelled='Mechanical'][monthNo=4]/legCount),'#,###')"/>
			<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text>
		</td>
		<td align="right" width="44" valign="top">
			<xsl:value-of select="format-number(sum(/afids_report/record[cancelled='Mechanical'][monthNo=5]/legCount),'#,###')"/>
			<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text>
		</td>
		<td align="right" width="44" valign="top">
			<xsl:value-of select="format-number(sum(/afids_report/record[cancelled='Mechanical'][monthNo=6]/legCount),'#,###')"/>
			<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text>
		</td>
		<td align="right" width="44" valign="top">
			<xsl:value-of select="format-number(sum(/afids_report/record[cancelled='Mechanical'][monthNo=7]/legCount),'#,###')"/>
			<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text>
		</td>
		<td align="right" width="44" valign="top">
			<xsl:value-of select="format-number(sum(/afids_report/record[cancelled='Mechanical'][monthNo=8]/legCount),'#,###')"/>
			<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text>
		</td>
		<td align="right" width="44" valign="top">
			<xsl:value-of select="format-number(sum(/afids_report/record[cancelled='Mechanical'][monthNo=9]/legCount),'#,###')"/>
			<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text>
		</td>
		<td align="right" width="44" valign="top">
			<xsl:value-of select="format-number(sum(/afids_report/record[cancelled='Mechanical'][monthNo=10]/legCount),'#,###')"/>
			<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text>
		</td>
		<td align="right" width="44" valign="top">
			<xsl:value-of select="format-number(sum(/afids_report/record[cancelled='Mechanical'][monthNo=11]/legCount),'#,###')"/>
			<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text>
		</td>
		<td align="right" width="44" valign="top">
			<xsl:value-of select="format-number(sum(/afids_report/record[cancelled='Mechanical'][monthNo=12]/legCount),'#,###')"/>
			<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text>
		</td>
		<td align="right" width="44" valign="top">
			<xsl:value-of select="format-number(sum(/afids_report/record[cancelled='Mechanical']/legCount),'#,###')"/>
			<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text>
		</td>
		<td align="right" width="44" valign="top">
						<xsl:value-of select="format-number(sum(/afids_report/record[cancelled='Mechanical']/legCount) div sum(/afids_report/record[cancelled!='']/legCount),'#,###.0%')"/>
			<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text>
		</td>
</tr>
 	<tr>
		<td align="left" valign="top" width="140">Data Entry</td>
		<td align="right" valign="top">
			<xsl:value-of select="format-number(sum(/afids_report/record[cancelled='Data Entry Error'][monthNo=1]/legCount),'#,###')"/>
			<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text>
		</td>
		<td align="right" width="44" valign="top">
			<xsl:value-of select="format-number(sum(/afids_report/record[cancelled='Data Entry Error'][monthNo=2]/legCount),'#,###')"/>
			<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text>
		</td>
		<td align="right" width="44" valign="top">
			<xsl:value-of select="format-number(sum(/afids_report/record[cancelled='Data Entry Error'][monthNo=3]/legCount),'#,###')"/>
			<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text>
		</td>
		<td align="right" width="44" valign="top">
			<xsl:value-of select="format-number(sum(/afids_report/record[cancelled='Data Entry Error'][monthNo=4]/legCount),'#,###')"/>
			<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text>
		</td>
		<td align="right" width="44" valign="top">
			<xsl:value-of select="format-number(sum(/afids_report/record[cancelled='Data Entry Error'][monthNo=5]/legCount),'#,###')"/>
			<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text>
		</td>
		<td align="right" width="44" valign="top">
			<xsl:value-of select="format-number(sum(/afids_report/record[cancelled='Data Entry Error'][monthNo=6]/legCount),'#,###')"/>
			<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text>
		</td>
		<td align="right" width="44" valign="top">
			<xsl:value-of select="format-number(sum(/afids_report/record[cancelled='Data Entry Error'][monthNo=7]/legCount),'#,###')"/>
			<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text>
		</td>
		<td align="right" width="44" valign="top">
			<xsl:value-of select="format-number(sum(/afids_report/record[cancelled='Data Entry Error'][monthNo=8]/legCount),'#,###')"/>
			<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text>
		</td>
		<td align="right" width="44" valign="top">
			<xsl:value-of select="format-number(sum(/afids_report/record[cancelled='Data Entry Error'][monthNo=9]/legCount),'#,###')"/>
			<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text>
		</td>
		<td align="right" width="44" valign="top">
			<xsl:value-of select="format-number(sum(/afids_report/record[cancelled='Data Entry Error'][monthNo=10]/legCount),'#,###')"/>
			<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text>
		</td>
		<td align="right" width="44" valign="top">
			<xsl:value-of select="format-number(sum(/afids_report/record[cancelled='Data Entry Error'][monthNo=11]/legCount),'#,###')"/>
			<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text>
		</td>
		<td align="right" width="44" valign="top">
			<xsl:value-of select="format-number(sum(/afids_report/record[cancelled='Data Entry Error'][monthNo=12]/legCount),'#,###')"/>
			<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text>
		</td>
		<td align="right" width="44" valign="top">
			<xsl:value-of select="format-number(sum(/afids_report/record[cancelled='Data Entry Error']/legCount),'#,###')"/>
			<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text>
		</td>
		<td align="right" width="44" valign="top">
						<xsl:value-of select="format-number(sum(/afids_report/record[cancelled='Data Entry Error']/legCount) div sum(/afids_report/record[cancelled!='']/legCount),'#,###.0%')"/>
			<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text>
		</td>
</tr>
 	<tr>
		<td align="left" valign="top" width="140">Weather O.L.</td>
		<td align="right" valign="top">
			<xsl:value-of select="format-number(sum(/afids_report/record[cancelled='Weather Other Leg'][monthNo=1]/legCount),'#,###')"/>
			<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text>
		</td>
		<td align="right" width="44" valign="top">
			<xsl:value-of select="format-number(sum(/afids_report/record[cancelled='Weather Other Leg'][monthNo=2]/legCount),'#,###')"/>
			<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text>
		</td>
		<td align="right" width="44" valign="top">
			<xsl:value-of select="format-number(sum(/afids_report/record[cancelled='Weather Other Leg'][monthNo=3]/legCount),'#,###')"/>
			<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text>
		</td>
		<td align="right" width="44" valign="top">
			<xsl:value-of select="format-number(sum(/afids_report/record[cancelled='Weather Other Leg'][monthNo=4]/legCount),'#,###')"/>
			<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text>
		</td>
		<td align="right" width="44" valign="top">
			<xsl:value-of select="format-number(sum(/afids_report/record[cancelled='Weather Other Leg'][monthNo=5]/legCount),'#,###')"/>
			<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text>
		</td>
		<td align="right" width="44" valign="top">
			<xsl:value-of select="format-number(sum(/afids_report/record[cancelled='Weather Other Leg'][monthNo=6]/legCount),'#,###')"/>
			<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text>
		</td>
		<td align="right" width="44" valign="top">
			<xsl:value-of select="format-number(sum(/afids_report/record[cancelled='Weather Other Leg'][monthNo=7]/legCount),'#,###')"/>
			<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text>
		</td>
		<td align="right" width="44" valign="top">
			<xsl:value-of select="format-number(sum(/afids_report/record[cancelled='Weather Other Leg'][monthNo=8]/legCount),'#,###')"/>
			<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text>
		</td>
		<td align="right" width="44" valign="top">
			<xsl:value-of select="format-number(sum(/afids_report/record[cancelled='Weather Other Leg'][monthNo=9]/legCount),'#,###')"/>
			<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text>
		</td>
		<td align="right" width="44" valign="top">
			<xsl:value-of select="format-number(sum(/afids_report/record[cancelled='Weather Other Leg'][monthNo=10]/legCount),'#,###')"/>
			<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text>
		</td>
		<td align="right" width="44" valign="top">
			<xsl:value-of select="format-number(sum(/afids_report/record[cancelled='Weather Other Leg'][monthNo=11]/legCount),'#,###')"/>
			<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text>
		</td>
		<td align="right" width="44" valign="top">
			<xsl:value-of select="format-number(sum(/afids_report/record[cancelled='Weather Other Leg'][monthNo=12]/legCount),'#,###')"/>
			<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text>
		</td>
		<td align="right" width="44" valign="top">
			<xsl:value-of select="format-number(sum(/afids_report/record[cancelled='Weather Other Leg']/legCount),'#,###')"/>
			<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text>
		</td>
		<td align="right" width="44" valign="top">
						<xsl:value-of select="format-number(sum(/afids_report/record[cancelled='Weather Other Leg']/legCount) div sum(/afids_report/record[cancelled!='']/legCount),'#,###.0%')"/>
			<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text>
		</td>
</tr>
 	<tr>
		<td align="left" valign="top" width="140">No Pilot O.L.</td>
		<td align="right" valign="top">
			<xsl:value-of select="format-number(sum(/afids_report/record[cancelled='No Pilot Other Leg'][monthNo=1]/legCount),'#,###')"/>
			<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text>
		</td>
		<td align="right" width="44" valign="top">
			<xsl:value-of select="format-number(sum(/afids_report/record[cancelled='No Pilot Other Leg'][monthNo=2]/legCount),'#,###')"/>
			<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text>
		</td>
		<td align="right" width="44" valign="top">
			<xsl:value-of select="format-number(sum(/afids_report/record[cancelled='No Pilot Other Leg'][monthNo=3]/legCount),'#,###')"/>
			<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text>
		</td>
		<td align="right" width="44" valign="top">
			<xsl:value-of select="format-number(sum(/afids_report/record[cancelled='No Pilot Other Leg'][monthNo=4]/legCount),'#,###')"/>
			<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text>
		</td>
		<td align="right" width="44" valign="top">
			<xsl:value-of select="format-number(sum(/afids_report/record[cancelled='No Pilot Other Leg'][monthNo=5]/legCount),'#,###')"/>
			<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text>
		</td>
		<td align="right" width="44" valign="top">
			<xsl:value-of select="format-number(sum(/afids_report/record[cancelled='No Pilot Other Leg'][monthNo=6]/legCount),'#,###')"/>
			<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text>
		</td>
		<td align="right" width="44" valign="top">
			<xsl:value-of select="format-number(sum(/afids_report/record[cancelled='No Pilot Other Leg'][monthNo=7]/legCount),'#,###')"/>
			<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text>
		</td>
		<td align="right" width="44" valign="top">
			<xsl:value-of select="format-number(sum(/afids_report/record[cancelled='No Pilot Other Leg'][monthNo=8]/legCount),'#,###')"/>
			<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text>
		</td>
		<td align="right" width="44" valign="top">
			<xsl:value-of select="format-number(sum(/afids_report/record[cancelled='No Pilot Other Leg'][monthNo=9]/legCount),'#,###')"/>
			<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text>
		</td>
		<td align="right" width="44" valign="top">
			<xsl:value-of select="format-number(sum(/afids_report/record[cancelled='No Pilot Other Leg'][monthNo=10]/legCount),'#,###')"/>
			<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text>
		</td>
		<td align="right" width="44" valign="top">
			<xsl:value-of select="format-number(sum(/afids_report/record[cancelled='No Pilot Other Leg'][monthNo=11]/legCount),'#,###')"/>
			<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text>
		</td>
		<td align="right" width="44" valign="top">
			<xsl:value-of select="format-number(sum(/afids_report/record[cancelled='No Pilot Other Leg'][monthNo=12]/legCount),'#,###')"/>
			<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text>
		</td>
		<td align="right" width="44" valign="top">
			<xsl:value-of select="format-number(sum(/afids_report/record[cancelled='No Pilot Other Leg']/legCount),'#,###')"/>
			<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text>
		</td>
		<td align="right" width="44" valign="top">
						<xsl:value-of select="format-number(sum(/afids_report/record[cancelled='No Pilot Other Leg']/legCount) div sum(/afids_report/record[cancelled!='']/legCount),'#,###.0%')"/>
			<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text>
		</td>
</tr>
 	<tr class="totalrow">
		<td align="left" valign="top" width="140">Totals
		</td>
		<td align="right" valign="top" width="44"><b>
			<xsl:value-of select="format-number(sum(/afids_report/record[monthNo=1][cancelled!='']/legCount),'#,###')"/>
			<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text></b>
		</td>
		<td align="right" valign="top" width="44"><b>
			<xsl:value-of select="format-number(sum(/afids_report/record[monthNo=2][cancelled!='']/legCount),'#,###')"/>
			<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text></b>
		</td>
		<td align="right" valign="top" width="44"><b>
			<xsl:value-of select="format-number(sum(/afids_report/record[monthNo=3][cancelled!='']/legCount),'#,###')"/>
			<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text></b>
		</td>
		<td align="right" valign="top" width="44"><b>
			<xsl:value-of select="format-number(sum(/afids_report/record[monthNo=4][cancelled!='']/legCount),'#,###')"/>
			<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text></b>
		</td>
		<td align="right" valign="top" width="44"><b>
			<xsl:value-of select="format-number(sum(/afids_report/record[monthNo=5][cancelled!='']/legCount),'#,###')"/>
			<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text></b>
		</td>
		<td align="right" valign="top" width="44"><b>
			<xsl:value-of select="format-number(sum(/afids_report/record[monthNo=6][cancelled!='']/legCount),'#,###')"/>
			<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text></b>
		</td>
		<td align="right" valign="top" width="44"><b>
			<xsl:value-of select="format-number(sum(/afids_report/record[monthNo=7][cancelled!='']/legCount),'#,###')"/>
			<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text></b>
		</td>		
		<td align="right" valign="top" width="44"><b>
			<xsl:value-of select="format-number(sum(/afids_report/record[monthNo=8][cancelled!='']/legCount),'#,###')"/>
			<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text></b>
		</td>
		<td align="right" valign="top" width="44"><b>
			<xsl:value-of select="format-number(sum(/afids_report/record[monthNo=9][cancelled!='']/legCount),'#,###')"/>
			<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text></b>
		</td>		
		<td align="right" valign="top" width="44"><b>
			<xsl:value-of select="format-number(sum(/afids_report/record[monthNo=10][cancelled!='']/legCount),'#,###')"/>
			<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text></b>
		</td>		
		<td align="right" valign="top" width="44"><b>
			<xsl:value-of select="format-number(sum(/afids_report/record[monthNo=11][cancelled!='']/legCount),'#,###')"/>
			<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text></b>
		</td>		
		<td align="right" valign="top" width="44"><b>
			<xsl:value-of select="format-number(sum(/afids_report/record[monthNo=12][cancelled!='']/legCount),'#,###')"/>
			<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text></b>
		</td>					
		<td align="right" valign="top" width="44"><b>
			<xsl:value-of select="format-number(sum(/afids_report/record[cancelled!='']/legCount),'#,###')"/>
			<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text></b>
		</td>
		<td align="right" valign="top" width="44"><xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text></td>
	</tr>
 	<tr>
		<td align="left" valign="top" width="140">Percent
		</td>
		<td align="right" valign="top" width="44"><b>
			<xsl:value-of select="format-number(sum(/afids_report/record[monthNo=1][cancelled!='']/legCount) div sum(/afids_report/record[cancelled!='']/legCount),'#,###.0%')"/>
			<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text></b>
		</td>
		<td align="right" valign="top" width="44"><b>
			<xsl:value-of select="format-number(sum(/afids_report/record[monthNo=2][cancelled!='']/legCount) div sum(/afids_report/record[cancelled!='']/legCount),'#,###.0%')"/>
			<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text></b>
		</td>
		<td align="right" valign="top" width="44"><b>
			<xsl:value-of select="format-number(sum(/afids_report/record[monthNo=3][cancelled!='']/legCount) div sum(/afids_report/record[cancelled!='']/legCount),'#,###.0%')"/>
			<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text></b>
		</td>
		<td align="right" valign="top" width="44"><b>
			<xsl:value-of select="format-number(sum(/afids_report/record[monthNo=4][cancelled!='']/legCount) div sum(/afids_report/record[cancelled!='']/legCount),'#,###.0%')"/>
			<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text></b>
		</td>
		<td align="right" valign="top" width="44"><b>
			<xsl:value-of select="format-number(sum(/afids_report/record[monthNo=5][cancelled!='']/legCount) div sum(/afids_report/record[cancelled!='']/legCount),'#,###.0%')"/>
			<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text></b>
		</td>
		<td align="right" valign="top" width="44"><b>
			<xsl:value-of select="format-number(sum(/afids_report/record[monthNo=6][cancelled!='']/legCount) div sum(/afids_report/record[cancelled!='']/legCount),'#,###.0%')"/>
			<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text></b>
		</td>
		<td align="right" valign="top" width="44"><b>
			<xsl:value-of select="format-number(sum(/afids_report/record[monthNo=7][cancelled!='']/legCount) div sum(/afids_report/record[cancelled!='']/legCount),'#,###.0%')"/>
			<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text></b>
		</td>
		<td align="right" valign="top" width="44"><b>
			<xsl:value-of select="format-number(sum(/afids_report/record[monthNo=8][cancelled!='']/legCount) div sum(/afids_report/record[cancelled!='']/legCount),'#,###.0%')"/>
			<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text></b>
		</td>
		<td align="right" valign="top" width="44"><b>
			<xsl:value-of select="format-number(sum(/afids_report/record[monthNo=9][cancelled!='']/legCount) div sum(/afids_report/record[cancelled!='']/legCount),'#,###.0%')"/>
			<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text></b>
		</td>
		<td align="right" valign="top" width="44"><b>
			<xsl:value-of select="format-number(sum(/afids_report/record[monthNo=10][cancelled!='']/legCount) div sum(/afids_report/record[cancelled!='']/legCount),'#,###.0%')"/>
			<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text></b>
		</td>
		<td align="right" valign="top" width="44"><b>
			<xsl:value-of select="format-number(sum(/afids_report/record[monthNo=11][cancelled!='']/legCount) div sum(/afids_report/record[cancelled!='']/legCount),'#,###.0%')"/>
			<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text></b>
		</td>
		<td align="right" valign="top" width="44"><b>
			<xsl:value-of select="format-number(sum(/afids_report/record[monthNo=12][cancelled!='']/legCount) div sum(/afids_report/record[cancelled!='']/legCount),'#,###.0%')"/>
			<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text></b>
		</td>
		<td align="right" valign="top" width="120"><xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text></td>
		<td align="right" valign="top" width="120"><xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text></td>
	</tr>
	</tbody>
</table>
<p>Notes:
<ul>
<li>Data for recent period is subject to change as mission reports are received and approved. Use the permanent statistics report for historical data.</li>
<li>AFW includes 'Angel Flight', 'Angel Flight West', and 'Other Leg'</li>
<li>Passenger includes 'Passenger', 'Requester Medical'</li>
</ul>
</p>
</xsl:template>
</xsl:stylesheet>
