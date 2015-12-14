<xsl:stylesheet version="1.0" xmlns:xsl="http://www.w3.org/1999/XSL/Transform">
<xsl:output method="html" />
<xsl:strip-space elements="*"/>

<xsl:template match="/">
<xsl:variable name="and">&amp;</xsl:variable>
<script type="text/javascript" charset="utf-8">
<![CDATA[			jQuery(document).ready(function() {
				jQuery('#reportData').dataTable({
					"iDisplayLength":25,
					"aoColumns": [
            { "bSortable": true, "bVisible": true}, // Member ID
            { "bSortable": false, "bVisible": false }, // Member (hidden)
            { "bSortable": true, "bVisible": true, "iDataSort": 1}, // Member
            { "bSortable": true, "bVisible": true}, // Badge
            { "bSortable": true, "bVisible": true}, // Notebook
	        ]
				});
		});
]]></script>
<div id="demo" style="width:760px">
<table cellpadding="0" cellspacing="0" border="0" class="display" id="reportData" style="width:760px">
	<thead>
	<tr>
		<th align="left"><b>Member ID</b></th>
		<th align="left"><b>Name (hidden)</b></th>
		<th align="left"><b>Name</b></th>
		<th align="left"><b>Badge</b></th>
		<th align="left"><b>Notebook</b></th>
	</tr>
  </thead>
  <tbody>
	<xsl:for-each select=".//record">
   <tr>
		<td align="left" valign="top">
			<a>
				<xsl:attribute name="href">
					<xsl:value-of select="concat('/reports/reports.php?action=display',$and,'reportDef=report_specs.xml',$and,'reportName=memberApplication',$and,'outtype=html',$and,'applicationID=',applicationID)"/>
				</xsl:attribute>
				<xsl:value-of select="externalID"/>
			</a>
			<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text>
		</td>
		<td><xsl:value-of select="lastName"/></td> <!-- sorting col -->
		<td align="left" valign="top">
			<xsl:value-of select="firstName"/><xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text><xsl:value-of select="lastName"/>
			<br/><xsl:value-of select="addressOne"/>
			<br/><xsl:value-of select="city"/>,<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text><xsl:value-of select="state"/><xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text><xsl:value-of select="zipcode"/>
			<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text>
		</td>
		<td align="left" valign="top">
			<xsl:choose>
				<xsl:when test="badgeMade!=''">
					<xsl:value-of select="badgeMade"/>
				</xsl:when>
				<xsl:otherwise>
					<a>
						<xsl:attribute name="href">
							<xsl:value-of select="concat('special_functions/new_member_update.php?action=badge',$and,'memberid=',memberID)"/>
						</xsl:attribute>
						Update badge made
					</a>
				</xsl:otherwise>
			</xsl:choose>
		<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text></td>
		<td align="left" valign="top">
			<xsl:choose>
				<xsl:when test="notebookSent!=''">
					<xsl:value-of select="notebookSent"/>
				</xsl:when>
				<xsl:otherwise>
					<a>
						<xsl:attribute name="href">
							<xsl:value-of select="concat('special_functions/new_member_update.php?action=notebook',$and,'memberid=',memberID)"/>
						</xsl:attribute>
						Update notebook sent
					</a>
				</xsl:otherwise>
			</xsl:choose>
		<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text></td>
   </tr>
	</xsl:for-each>
	</tbody>
	</table>
</div>
</xsl:template>

</xsl:stylesheet>
