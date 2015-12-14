<xsl:stylesheet version="1.0" xmlns:xsl="http://www.w3.org/1999/XSL/Transform">
<xsl:output method="html" />
<xsl:strip-space elements="*"/>

<xsl:template match="/">
<table border="1">
	<xsl:if test=".//column">
	<tr>
		<xsl:for-each select=".//column">
			<td>
			<xsl:attribute name="width">
				<xsl:value-of select="@width"/>
			</xsl:attribute>
			<xsl:value-of select="."/>
			</td>
		</xsl:for-each>
	</tr>
	</xsl:if>
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
</table>
</xsl:template>
</xsl:stylesheet>