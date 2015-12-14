<xsl:stylesheet version="1.0" xmlns:xsl="http://www.w3.org/1999/XSL/Transform">
<xsl:output method="html" />
<xsl:strip-space elements="*"/>
<xsl:template match="/">
<xsl:variable name="q">&apos;</xsl:variable>
<table border="1" cellpadding="2" cellspacing="0" width="500">
  <thead>
	<tr nobr="true">
		<xsl:for-each select=".//outputType[@outputType='print']/columns/column">
			<td>
			<xsl:attribute name="style">
				<xsl:value-of select="concat('background-color: rgb(240, 240, 240);width:',@width,'px')"/>
			</xsl:attribute>
				<xsl:if test="@align">
					<xsl:attribute name="align">
						<xsl:value-of select="@align"/>
					</xsl:attribute>
				</xsl:if>
			<span style="font-weight:bold;color: rgb(52, 121, 190);">
			<xsl:value-of select="."/>
			</span>
			</td>
		</xsl:for-each>
	</tr>
	</thead>
	<tbody>
	<xsl:for-each select=".//record">
	<tr nobr="true">
		<xsl:for-each select="*">
			<xsl:variable name="position" select="position()"/>
			<td>
				<xsl:if test="/afids_report/header/outputTypes/outputType[@outputType='print']/columns/column[$position]/@width">
					<xsl:attribute name="style">
						<xsl:value-of select="concat('width:',/afids_report/header/outputTypes/outputType[@outputType='print']/columns/column[$position]/@width,'px')"/>
					</xsl:attribute>
				</xsl:if>
				<xsl:if test="/afids_report/header/outputTypes/outputType[@outputType='print']/columns/column[$position]/@width">
					<xsl:attribute name="width">
						<xsl:value-of select="/afids_report/header/outputTypes/outputType[@outputType='print']/columns/column[$position]/@width"/>
					</xsl:attribute>
				</xsl:if>
				<xsl:if test="/afids_report/header/outputTypes/outputType[@outputType='print']/columns/column[$position]/@align">
					<xsl:attribute name="align">
						<xsl:value-of select="/afids_report/header/outputTypes/outputType[@outputType='print']/columns/column[$position]/@align"/>
					</xsl:attribute>
				</xsl:if>
				<xsl:choose>
					<xsl:when test="/afids_report/header/outputTypes/outputType[@outputType='print']/columns/column[$position]/@dataType='number'">
						<xsl:value-of select="format-number(.,'#,###')"/>
					</xsl:when>
					<xsl:when test="/afids_report/header/outputTypes/outputType[@outputType='print']/columns/column[$position]/@dataType='integer'">
						<xsl:value-of select="format-number(.,'#,###')"/>
					</xsl:when>
					<xsl:when test="/afids_report/header/outputTypes/outputType[@outputType='print']/columns/column[$position]/@dataType='decimal_1'">
						<xsl:value-of select="format-number(.,'#,###.#')"/>
					</xsl:when>
					<xsl:when test="/afids_report/header/outputTypes/outputType[@outputType='print']/columns/column[$position]/@dataType='decimal_2'">
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
	<xsl:if test=".//outputType[@outputType='print']/columns/column[@totalColumn='yes']">
	 <tfoot>
		<tr>
			<xsl:for-each select=".//outputType[@outputType='print']/columns/column">
			<th>
				<xsl:if test="@width">
					<xsl:attribute name="width">
						<xsl:value-of select="@width"/>
					</xsl:attribute>
				</xsl:if>
				<xsl:if test="@align">
					<xsl:attribute name="align">
						<xsl:value-of select="@align"/>
					</xsl:attribute>
				</xsl:if>
			<xsl:if test="@totalColumn='yes'">
				<xsl:variable name="childNode" select="@field"/>
				<xsl:value-of select="format-number(sum(/afids_report/record[descendant::*]/*[local-name() = $childNode]),'##,###')"/>
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
</xsl:template>
</xsl:stylesheet>