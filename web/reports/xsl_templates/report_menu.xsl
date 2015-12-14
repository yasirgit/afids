<xsl:stylesheet version="1.0" xmlns:xsl="http://www.w3.org/1999/XSL/Transform">
<xsl:output method="xml" />
<xsl:strip-space elements="*"/>

<xsl:template match="/">
<reports>
	<xsl:for-each select=".//selcategories/selcategory">
		<xsl:sort select="@pageOrder"/>

		<xsl:call-template name="make-reports"/>
	</xsl:for-each>
</reports>
</xsl:template>

<xsl:template name="make-reports">
		<xsl:variable name="desc"><xsl:value-of select="@desc"/></xsl:variable>
		<xsl:variable name="reportName"><xsl:value-of select="@reportName"/></xsl:variable>
		<xsl:for-each select="/reportWriter/reports/report[category=$desc]">
			<xsl:sort select="category_2"/>
			<xsl:sort select="title"/>
			<report>
				<title><xsl:value-of select="title"/></title>
				<category><xsl:value-of select="category"/></category>
				<category_2><xsl:value-of select="category_2"/></category_2>
				<active><xsl:value-of select="active"/></active>
				<reportName><xsl:value-of select="reportName"/></reportName>
				<security>
					<userRoles>
					<xsl:for-each select="security/userRoles/userRole">
						<userRole><xsl:value-of select="."/></userRole>
					</xsl:for-each>
					</userRoles>				
				</security>
			</report>
		</xsl:for-each>
</xsl:template>

</xsl:stylesheet>