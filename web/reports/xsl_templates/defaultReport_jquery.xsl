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
<table cellpadding="0" cellspacing="0" border="0" class="display" id="reportData" style="width:760px">
 <thead>
	<tr class="gradeX">
		<xsl:for-each select=".//outputType[@outputType='html']/columns/column">
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
			<xsl:variable name="position" select="position()"/>
			<td>
				<xsl:if test="@align">
					<xsl:attribute name="align">
						<xsl:value-of select="@align"/>
					</xsl:attribute>
				</xsl:if>
				<xsl:choose>
					<xsl:when test="/afids_report/header/columns/column[$position]/@dataType='number'">
						<xsl:value-of select="format-number(.,'#,###')"/>
					</xsl:when>
					<xsl:when test="/afids_report/header/columns/column[$position]/@dataType='integer'">
						<xsl:value-of select="format-number(.,'#,###')"/>
					</xsl:when>
					<xsl:when test="/afids_report/header/columns/column[$position]/@dataType='decimal_1'">
						<xsl:value-of select="format-number(.,'#,###.#')"/>
					</xsl:when>
					<xsl:when test="/afids_report/header/columns/column[$position]/@dataType='decimal_2'">
						<xsl:value-of select="format-number(.,'#,###.##')"/>
					</xsl:when>
					<xsl:otherwise>
						<xsl:value-of select="."/>
					</xsl:otherwise>
				</xsl:choose>
			</td>
		</xsl:for-each>
	</tr>
	</xsl:for-each>
	</tbody>
	<xsl:if test=".//outputType[@outputType='html']/columns/column[@totalColumn='yes']">
	 <tfoot>
		<tr>
			<xsl:for-each select=".//outputType[@outputType='html']/columns/column">
				<th>
				<xsl:if test="@align">
					<xsl:attribute name="align">
						<xsl:value-of select="@align"/>
					</xsl:attribute>
			</xsl:if>
			<xsl:if test="@totalColumn='yes'">
				<xsl:variable name="childNode" select="@field"/>
				<xsl:value-of select="sum(/afids_report/record[descendant::*]/*[local-name() = $childNode])"/>
			</xsl:if>
			<xsl:if test="@totalColumn!='yes'">
			 	<xsl:if test="position()=1">
					Totals
				</xsl:if>
			 	<xsl:if test="position()!=1">
					<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text>
				</xsl:if>
			</xsl:if>
			</th>
		</xsl:for-each>
	</tr>
	</tfoot>
	</xsl:if>
</table>
</div>
</xsl:template>
<xsl:template name="totalCol">
	<xsl:variable name="childNode" select="@field"/>
	<xsl:value-of select="/afids_report/record[descendant::*][child::*='legCount']"/>
</xsl:template>
</xsl:stylesheet>