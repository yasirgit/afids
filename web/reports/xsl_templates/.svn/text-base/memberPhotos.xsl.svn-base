<xsl:stylesheet version="1.0" xmlns:xsl="http://www.w3.org/1999/XSL/Transform">
<xsl:output method="html" />
<xsl:strip-space elements="*"/>

<xsl:template match="/">
<script type="text/javascript" charset="utf-8">
<![CDATA[
			jQuery(document).ready(function() {
				jQuery('#reportData').dataTable({
					"iDisplayLength":10,
					"aoColumns": [
            { "bSortable": true, "bVisible": true}, // Photo
            { "bSortable": true, "bVisible": true}, // Mission date
            { "bSortable": true, "bVisible": true}, // Submission date     
            { "bSortable": false, "bVisible": false }, // Passenger (hidden)
            { "bSortable": true, "bVisible": true, "iDataSort": 3}, // Passenger
            { "bSortable": false, "bVisible": false }, // Pilot (hidden)
            { "bSortable": true, "bVisible": true, "iDataSort": 5}, // Pilot
            { "bSortable": true, "bVisible": true}, // Quality
	        ]
				});
		});
]]></script>
<div id="demo" style="width:760px">
<table cellpadding="0" cellspacing="0" border="0" class="display" id="reportData" style="width:760px">
	<thead>
	<tr>
		<th align="left">Photo</th>
		<th align="left">Mission Date</th>
		<th align="left">Submission Date</th>
		<th align="left">Passenger (hidden)</th>
		<th align="left">Passenger</th>
		<th align="left">Pilot (hidden)</th>
		<th align="left">Pilot</th>
		<th align="left">Quality</th>
	</tr>
  </thead>
  <tbody>
	<xsl:for-each select=".//record">
   <tr>
		<td align="left" valign="top">
			<a target="_new">
				<xsl:attribute name="href">
					<xsl:value-of select="concat('../mission_photos/',photofilename)"/>
				</xsl:attribute>
				<img border="0">
				<xsl:attribute name="src">
					<xsl:value-of select="concat('http://afids.angelflightwest.org/mission_photos/thumbnails/',photoThumb)"/>
				</xsl:attribute>
				</img>
			</a>
		</td>
		<td align="left" valign="top">
			<xsl:value-of select="missionDate"/>
			<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text>
		</td>
		<td align="left" valign="top">
			<xsl:value-of select="submissionDate"/>
			<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text>
		</td>
		<td><xsl:value-of select="passLastName"/></td> <!-- sorting col -->
		<td align="left" valign="top">
			<xsl:value-of select="passengerName"/>
			<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text>
		</td>
		<td><xsl:value-of select="pilotLastName"/></td> <!-- sorting col -->
		<td align="left" valign="top">
			<xsl:value-of select="pilotName"/>
			<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text>
		</td>
		<td align="left" valign="top">
			<xsl:if test="photoquality = 1">Excellent</xsl:if>
			<xsl:if test="photoquality = 2">Good</xsl:if>
			<xsl:if test="photoquality = 3">Fair</xsl:if>
			<xsl:if test="photoquality = 4">Poor</xsl:if>		
			<xsl:if test="photoquality = 5">Not usable</xsl:if>
			<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text>
		</td>
   </tr>
	</xsl:for-each>
	</tbody>
	</table>
</div>
</xsl:template>
</xsl:stylesheet>
