<xsl:stylesheet version="1.0" xmlns:xsl="http://www.w3.org/1999/XSL/Transform">
<xsl:output method="html" />
<xsl:variable name="and">&amp;</xsl:variable>
<xsl:strip-space elements="*"/>

<xsl:template match="/">
<script type="text/javascript" charset="utf-8">
<![CDATA[			jQuery(document).ready(function() {
				jQuery('#reportData').dataTable({
					"iDisplayLength":25,
					"aoColumns": [
            { "bSortable": true, "bVisible": true }, // date
            { "bSortable": false, "bVisible": false }, // pilotname 
            { "bSortable": true, "bVisible": true, "iDataSort": 1 }, // pilotname 
            { "bSortable": true, "bVisible": true }, // legcount
            { "bSortable": true, "bVisible": true }, // hours
            { "bSortable": false, "bVisible": false }, // leg cost
            { "bSortable": true, "bVisible": true, "iDataSort": 4 }, // pilot cost 
            { "bSortable": false, "bVisible": false }, // pilot cost
            { "bSortable": true, "bVisible": true, "iDataSort": 6 } // pilot cost 
	        ]
				});
			} );
]]></script>
<div id="demo">
 <table cellpadding="0" cellspacing="0" border="0" class="display" id="reportData" style="width:760px">
 <thead>
	<tr>
		<th valign="top" align="left"><strong>Mission Date</strong></th>
		<th>Pilot Name (hidden)</th>
		<th valign="top" align="left"><strong>Pilot Name</strong></th>
		<th valign="top" align="right"><strong># Legs</strong></th>
		<th valign="top" align="right"><strong>Hours</strong></th>
		<th><strong>cost (hidden)</strong></th>
		<th valign="top" align="right"><strong>Cost</strong></th>
		<th><strong>pilot cost (hidden)</strong></th>
		<th valign="top" align="right"><strong>Pilot Cost</strong></th>
	</tr>
	</thead>
	<tbody>
	<xsl:for-each select=".//record">
		<tr>
			<td valign="top" align="left"><xsl:value-of select="missionDateDisplay"/></td>
		  <td valign="top" align="left"><xsl:value-of select="pilotLastName"/></td>
		  <td valign="top" align="left">
				<xsl:value-of select="pilotName"/>
			</td>
			<td valign="top" align="right">
				<xsl:value-of select="legCount"/>
			</td>
		  <td valign="top" align="right">
				<xsl:value-of select="hours"/>
			</td>
			<!-- hidden -->
			<td>
		  	<xsl:if test="legCost != 0">
					<xsl:value-of select="legCost"/>
				</xsl:if>
		  	<xsl:if test="legCost = 0">
					<xsl:value-of select="commercialTicketCost"/>
				</xsl:if>				
			</td>  
		  <td valign="top" align="right">
		  	<xsl:if test="legCost != 0">
					<xsl:value-of select="format-number(legCost,'$#,###.00')"/>
				</xsl:if>
		  	<xsl:if test="legCost = 0">
					<xsl:value-of select="format-number(commercialTicketCost,'$#,###.00')"/>
				</xsl:if>
			</td>
			<td><xsl:value-of select="pilotCost"/></td>  
		  <td valign="top" align="right">
				<xsl:value-of select="format-number(pilotCost,'$#,###')"/>
			</td>
		</tr>
	</xsl:for-each>
	</tbody>
</table>
<p><a>
	<xsl:attribute name="href">
		<xsl:value-of select="concat('http://69.50.211.150/reports/reports.php?action=display',$and,'reportDef=report_specs.xml',$and,'reportName=monthly_mission_report_summary',$and,'startDate=',//params/param[@field='startDate']/@value,$and,'endDate=',//params/param[@field='endDate']/@value)"/>
	</xsl:attribute>
	View summary report for this period</a></p>
</div>
</xsl:template>
</xsl:stylesheet>
