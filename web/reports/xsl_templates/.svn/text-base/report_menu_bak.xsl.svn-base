<xsl:stylesheet version="1.0" xmlns:xsl="http://www.w3.org/1999/XSL/Transform">
<xsl:output method="xml" />
<xsl:strip-space elements="*"/>

<xsl:template match="/">
<reports>
	<xsl:for-each select=".//reports/report">
		<xsl:sort select="category"/>
		<xsl:sort select="category_2"/>
		<xsl:sort select="title"/>
			<report>
				<title><xsl:value-of select="title"/></title>
				<category><xsl:value-of select="category"/></category>
				<category_2><xsl:value-of select="category_2"/></category_2>
				<active><xsl:value-of select="active"/></active>
				<reportName><xsl:value-of select="reportName"/></reportName>
			</report>
	</xsl:for-each>
</reports>
</xsl:template>
</xsl:stylesheet>