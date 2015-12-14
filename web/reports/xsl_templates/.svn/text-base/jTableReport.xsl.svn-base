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
	<tr class="gradeX">
		<xsl:for-each select=".//column">
			<th>
			<xsl:attribute name="width">
				<xsl:value-of select="@width"/>
			</xsl:attribute>
			<xsl:value-of select="."/>
			</th>
		</xsl:for-each>
	</tr>
	</thead>
	<tbody>
	<xsl:for-each select=".//record">
	<tr>
		<xsl:for-each select="*">
			<td>
				<xsl:if test="@align">
					<xsl:attribute name="align">
						<xsl:value-of select="@align"/>
					</xsl:attribute>
				</xsl:if>
				<xsl:value-of select="."/>
			</td>
		</xsl:for-each>
	</tr>
	</xsl:for-each>
	</tbody>
</table>
</div>
</xsl:template>
</xsl:stylesheet>