<xsl:stylesheet version="1.0" xmlns:xsl="http://www.w3.org/1999/XSL/Transform">
<xsl:output method="html" />
<xsl:strip-space elements="*"/>

<xsl:template match="/">
<script type="text/javascript" charset="utf-8">
<![CDATA[			jQuery(document).ready(function() {
				jQuery('#reportData').dataTable({
					"iDisplayLength":25
					});
			} );
]]></script>
<div id="demo" style="width:760px">
	<table border="0" cellspacing="0" cellpadding="0" id="reportData" style="width:760px">
	<thead>
	 <tr>
		<th width="140" align="left"><b>MissionID</b></th>
		<th width="140" align="left"><b>Mission Date</b></th>
		<th width="200" align="left"><b>Provider</b></th>
		<th width="100" align="left"><b>Cost</b></th>
	 </tr>
	</thead>
<xsl:for-each select=".//record">
 	<tr>
		<td align="left" valign="top" width="140">
			<xsl:value-of select="externalid"/>
		</td>
		<td align="left" valign="top" width="140">
			<xsl:value-of select="missionDateDisplay"/>
		</td>
		<td align="left" valign="top" width="200">
			<xsl:value-of select="pilotName"/>
			<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text>
		</td>
		<td align="right" valign="top" width="100">
			<xsl:value-of select="format-number(commercialticketcost,'$#,###.00')"/>
			<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text>
		</td>
	</tr>
</xsl:for-each>
	<tfoot>
 	<tr>
		<th align="left" valign="top" width="140">
			<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text>
		</th>
		<th align="left" valign="top" width="140">
			<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text>
		</th>
		<th align="left" valign="top" width="200">
			<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text>
		</th>
		<th align="right" valign="top" width="100">
			<xsl:value-of select="format-number(sum(.//commercialticketcost),'$#,###.00')"/>
			<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text>
		</th>
	</tr>
	</tfoot>
</table>
</div>
</xsl:template>

</xsl:stylesheet>
