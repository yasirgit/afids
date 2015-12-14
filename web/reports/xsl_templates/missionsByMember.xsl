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
           { "bSortable": true, "bVisible": true, "sType": "numeric"}, // Member ID
           { "bSortable": true, "bVisible": true, "sType": "string"}, // Member Name
           { "bSortable": true, "bVisible": true, "sType": "numeric"}, // # legs
           { "bSortable": true, "bVisible": true, "sType": "numeric"}, // hobbs time 
           { "bSortable": true, "bVisible": true, "sType": "numeric"} // commercial ticket cost 
	       ]
		});
	});
]]></script>
<div id="demo">
 <table cellpadding="0" cellspacing="0" border="0" class="display" id="reportData" style="width:760px">
	<thead>
	<tr>
		<th align="left">Member ID</th>
		<th align="left">Member Name</th>
		<th align="left"># Legs</th>
		<th align="left">Hobbs Time</th>
		<th align="left">Commercial Ticket Cost</th>
	</tr>
  </thead>
  <tbody>
	<xsl:for-each select=".//record">
   <tr>
		<td align="left" valign="top">
			<xsl:value-of select="externalID"/>
		</td>
		<td align="left" valign="top">
			<xsl:value-of select="pilotName"/>
		</td>
		<td align="right" valign="top">
			<xsl:value-of select="format-number(legCount,'#,###')"/>
		</td>
		<td align="right" valign="top">
			<xsl:value-of select="format-number(hobbsTime,'###.#')"/>
		</td>
		<td align="right" valign="top">
			<xsl:if test="commercialTicketCost &gt; 0">
				<xsl:value-of select="format-number(commercialTicketCost,'$#,###.##')"/>
			</xsl:if>
		</td>
   </tr>
	</xsl:for-each>
	</tbody>
	</table>
</div>
</xsl:template>
</xsl:stylesheet>
