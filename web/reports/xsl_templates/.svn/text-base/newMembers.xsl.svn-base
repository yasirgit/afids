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
           { "bSortable": true, "bVisible": false}, // Member (sorting)
           { "bSortable": true, "bVisible": true, "sType": "string", "iDataSort": 0}, // Member
           { "bSortable": true, "bVisible": true, "sType": "string"}, // Flight Status
           { "bSortable": true, "bVisible": true, "sType": "date"}, // Join date
           { "bSortable": true, "bVisible": true, "sType": "date"}, // Insurance
           { "bSortable": true, "bVisible": true, "sType": "numeric"}, // Badge
           { "bSortable": true, "bVisible": true, "sType": "numeric"} // Notebook
	       ]
		});
	});
]]></script>
<div id="demo">
 <table cellpadding="0" cellspacing="0" border="0" class="display" id="reportData" style="width:760px">
	<thead>
	<tr>
		<th align="left"><b>Member</b></th> <!-- sorting column -->
		<th align="left"><b>Member</b></th>
		<th align="left"><b>Flight Status</b></th>
		<th align="left"><b>Join Date</b></th>
		<th align="left"><b>Insurance</b></th>
		<th align="left"><b>Badge</b></th>
		<th align="left"><b>Notebook</b></th>
	</tr>
  </thead>
  <tbody>
	<xsl:for-each select=".//record">
   <tr>
		<td align="left" valign="top"><xsl:value-of select="lastName"/></td> <!-- sorting column -->
		<td align="left" valign="top">
			<a>
				<xsl:attribute name="href">
					<xsl:value-of select="concat('mailto:',email)"/>
				</xsl:attribute>
				<xsl:value-of select="firstName"/><xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text><xsl:value-of select="lastName"/>
			</a>
		<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text></td>
		<td align="left" valign="top">
			<xsl:value-of select="flightStatus"/>
		<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text></td>
		<td align="left" valign="top">
			<xsl:value-of select="joinDate"/>
		<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text></td>
		<td align="left" valign="top">
			<xsl:value-of select="insuranceReceived"/>
		<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text></td>
		<td align="left" valign="top">
			<xsl:value-of select="badgeMade"/>
		<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text></td>
		<td align="left" valign="top">
			<xsl:value-of select="notebookSent"/>
		<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text></td>
   </tr>
	</xsl:for-each>
	</tbody>
	</table>
</div>
</xsl:template>

</xsl:stylesheet>
