<xsl:stylesheet version="1.0" xmlns:xsl="http://www.w3.org/1999/XSL/Transform">
<xsl:output method="html" />
<xsl:strip-space elements="*"/>

<xsl:variable name="noMonths" select=".//record[last()]/monthNo"/>

<xsl:template match="/">
<h3 style="margin-top:8px;margin-bottom:8px">For wing: <xsl:value-of select="/afids_report/record/wingName"/></h3>

<ul class="tab-interface-tabs">
	<li>
  	<a>
    	<xsl:attribute name="href">
       	<xsl:call-template name="make-month-link"/>
      </xsl:attribute>
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
</div>
<p>Notes:
<ul>
<li>Data for recent period is subject to change as mission reports are received and approved. Use the permanent statistics report for historical data.</li>
<li>AFW includes 'Angel Flight', 'Angel Flight West', and 'Other Leg'</li>
<li>Passenger includes 'Passenger'</li>
</ul>
</p>
</xsl:template>

<xsl:template name="make-month-link">
	<xsl:value-of select="concat('reports.php?reportDef=','report_specs.xml')" /><xsl:text disable-output-escaping="yes">&amp;</xsl:text>
	<xsl:value-of select="concat('reportName=','cancelled_mission_detail')" /><xsl:text disable-output-escaping="yes">&amp;</xsl:text>
	<xsl:value-of select="concat('action=','display')" /><xsl:text disable-output-escaping="yes">&amp;</xsl:text>
	<xsl:for-each select="//params/param">
	   <xsl:value-of select="concat(@field,'=',@value)"/><xsl:text disable-output-escaping="yes">&amp;</xsl:text>
	</xsl:for-each>
</xsl:template>
<xsl:template name="make-wing-link">
	<xsl:value-of select="concat('reports.php?reportDef=','report_specs.xml')" /><xsl:text disable-output-escaping="yes">&amp;</xsl:text>
	<xsl:value-of select="concat('reportName=','cancelled_mission_detail_wing')" /><xsl:text disable-output-escaping="yes">&amp;</xsl:text>
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
