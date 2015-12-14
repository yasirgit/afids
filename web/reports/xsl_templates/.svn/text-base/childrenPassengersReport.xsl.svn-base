<xsl:stylesheet version="1.0" xmlns:xsl="http://www.w3.org/1999/XSL/Transform">
<xsl:output method="html" />
<xsl:strip-space elements="*"/>

<xsl:template match="/">
<script type="text/javascript" charset="utf-8">
<![CDATA[			jQuery(document).ready(function() {
				jQuery('#reportData').dataTable({
					"iDisplayLength":25,
					"aoColumns": [
            { "bSortable": true, "bVisible": true }, // date
            { "bSortable": false, "bVisible": false }, // age
            { "bSortable": true, "bVisible": true, "iDataSort": 1 }, // passenger 
            { "bSortable": false, "bVisible": true }, // origin
            { "bSortable": false, "bVisible": true }, // dest
            { "bSortable": true, "bVisible": true } // illness
	        ]
				});
			} );
]]></script>
<div id="demo">
 <table cellpadding="0" cellspacing="0" border="0" class="display" id="reportData" style="width:760px">
 <thead>
	<tr>
		<th width="100" valign="top" align="left"><strong>Mission Date</strong></th>
		<th><strong>last name (hidden)</strong></th>
		<th width="150" valign="top" align="left"><strong>Passenger (age)</strong></th>
		<th width="175" valign="top" align="left"><strong>Origin</strong></th>
		<th width="175" valign="top" align="left"><strong>Destination</strong></th>
		<th width="150" valign="top" align="left"><strong>Illness</strong></th>
	</tr>
	</thead>
	<tbody>
	<xsl:for-each select=".//record">
		<tr>
			<td width="100" valign="top" align="left"><xsl:value-of select="displayDate"/></td>
			<!-- hidden -->
			<td><xsl:value-of select="lastname"/></td>  
		  <td width="150" valign="top" align="left">
				<xsl:value-of select="firstname"/><xsl:text> </xsl:text><xsl:value-of select="lastname"/><xsl:text> (</xsl:text><xsl:value-of select="passAge"/><xsl:text>)</xsl:text>
				<br /><xsl:value-of select="passCity"/><xsl:text>, </xsl:text><xsl:value-of select="passState"/>
			</td>
			<td width="175" valign="top" align="left">
				<xsl:value-of select="originIdent"/><xsl:text> (</xsl:text><xsl:value-of select="originCity"/><xsl:text> </xsl:text><xsl:value-of select="originState"/><xsl:text>)</xsl:text>
				<br/>Agency: <xsl:value-of select="agencyName"/>
			</td>
		  <td width="175" valign="top" align="left">
				<xsl:value-of select="destIdent"/><xsl:text> (</xsl:text><xsl:value-of select="destCity"/><xsl:text> </xsl:text><xsl:value-of select="destState"/><xsl:text>)</xsl:text>
				<br/>Dest Facility: <xsl:value-of select="facilityName"/>
			</td>
		  <td width="150" valign="top" align="left">
				<xsl:value-of select="passengerIllness"/>
			</td>
		</tr>
	</xsl:for-each>
	</tbody>
</table>
</div>
</xsl:template>
</xsl:stylesheet>
