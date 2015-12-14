<xsl:stylesheet version="1.0" xmlns:xsl="http://www.w3.org/1999/XSL/Transform">
<xsl:output method="html" />
<xsl:strip-space elements="*"/>

<xsl:template match="/">
<script type="text/javascript" charset="utf-8">
<![CDATA[
		jQuery(document).ready(function() {
				jQuery('#reportData').dataTable({
					"iDisplayLength":25,
					"aoColumns": [
            { "bSortable": false, "bVisible": false }, // Mission ID (hidden)
            { "bSortable": true, "bVisible": true, "iDataSort": 0 }, // Mission 
            { "bSortable": false, "bVisible": false }, // pilotName (hidden)
            { "bSortable": true, "bVisible": true, "iDataSort": 2 }, // Pilot 
            { "bSortable": false, "bVisible": false }, // passName (hidden)
            { "bSortable": true, "bVisible": true, "iDataSort": 4 }, // Pass 
            { "bSortable": false, "bVisible": false }, // AgencyName (hidden)
            { "bSortable": true, "bVisible": true, "iDataSort": 6 } // Agency 
	        ]
				});
		});
]]></script>
<div id="demo" style="width:760px">
	<table cellpadding="0" cellspacing="0" border="0" class="display" id="reportData" style="width:760px">
	<thead>
	<tr>
		<th align="left"><b>Mission ID (hidden)</b></th>
		<th align="left"><b>Mission</b></th>
		<th align="left"><b>Pilot Name (hidden)</b></th>
		<th align="left"><b>Pilot</b></th>
		<th align="left"><b>Passenger Name (hidden)</b></th>
		<th align="left"><b>Passenger</b></th>
		<th align="left"><b>Agency Name (hidden)</b></th>
		<th align="left"><b>Agency</b></th>
	</tr>
	</thead>
	<tbody>
	<xsl:for-each select=".//record">
    <tr>
		<td><xsl:value-of select="externalID"/></td> <!-- sorting col -->
		<td align="left" valign="top">
			<b><xsl:value-of select="externalID"/>-<xsl:value-of select="legNumber"/></b>
			<br/><xsl:value-of select="displayDate"/>
			<xsl:choose>
			   <xsl:when test="cancelled">
						<br/><xsl:value-of select="cancelled"/>
			   </xsl:when>
		  </xsl:choose>
			<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text>
		</td>
		<td><xsl:value-of select="pilotLastName"/></td> <!-- sorting col -->
		<td width="175" align="left" valign="top">
			<xsl:value-of select="pilotName"/>
			<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text>
		</td>
		<td><xsl:value-of select="passLastName"/></td> <!-- sorting col -->		
		<td width="175" align="left" valign="top">
		  <b><xsl:value-of select="passName"/></b>
			<br/>Home state: <xsl:value-of select="passState"/>
			<xsl:choose>
				<xsl:when test="passAge">
					<br/>Age: <xsl:value-of select="passAge"/>
			  </xsl:when>
		  </xsl:choose>
			<xsl:choose>
				<xsl:when test="illness">
					<br/><xsl:value-of select="illness"/>
			   </xsl:when>
		   </xsl:choose>
			<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text>
		</td>
		<td><xsl:value-of select="agencyName"/></td> <!-- sorting col -->
		<td width="175" align="left" valign="top">
			<b><xsl:value-of select="agencyName"/></b>
			<br/><xsl:value-of select="agencyCity"/>, <xsl:value-of select="agencyState"/>
			<xsl:choose>
				<xsl:when test="facilityName">
					<br/><xsl:value-of select="facilityName"/>
			  </xsl:when>
		  </xsl:choose>
			<xsl:choose>
				<xsl:when test="lodgingName">
					<br/><xsl:value-of select="lodgingName"/>
			  </xsl:when>
		  </xsl:choose>
			<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text>
		</td>
   	</tr>
	</xsl:for-each>
	</tbody>
	</table>
</div>
</xsl:template>

<xsl:template name="make-agency-xref">
	<xsl:value-of select="concat('../agencyview.asp?id=',agencyID)"/>
</xsl:template>
<xsl:template name="make-pass-xref">
	<xsl:value-of select="concat('../passengerview.asp?id=',passengerID)"/>
</xsl:template>
</xsl:stylesheet>
