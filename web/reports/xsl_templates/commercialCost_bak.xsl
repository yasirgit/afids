<xsl:stylesheet version="1.0" xmlns:xsl="http://www.w3.org/1999/XSL/Transform">
<xsl:output method="html" />
<xsl:strip-space elements="*"/>

<xsl:template match="/">
<script type="text/javascript" charset="utf-8">
<![CDATA[			jQuery(document).ready(function() {
				jQuery('#reportData').dataTable();
			} );
]]></script>
<div id="demo">
<table cellpadding="0" cellspacing="0" border="0" class="display" id="reportData">
	<thead>
	 <tr>
		<th width="140" bgcolor="#1848B0" align="left"><b>MissionID</b></th>
		<th width="140" bgcolor="#1848B0" align="left"><b>Mission Date</b></th>
		<th width="200" bgcolor="#1848B0" align="left"><b>Provider</b></th>
		<th width="100" bgcolor="#1848B0" align="right"><b>Cost</b></th>
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
 	<tr>
		<td align="left" valign="top" width="140">
			<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text>
		</td>
		<td align="left" valign="top" width="140">
			<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text>
		</td>
		<td align="left" valign="top" width="200">
			<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text>
		</td>
		<td align="right" valign="top" width="100">
			<xsl:value-of select="format-number(sum(.//commercialticketcost),'$#,###.00')"/>
			<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text>
		</td>
	</tr>
</table></p>
</xsl:template>

</xsl:stylesheet>
