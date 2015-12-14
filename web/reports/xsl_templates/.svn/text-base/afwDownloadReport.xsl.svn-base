<xsl:stylesheet version="1.0" 
xmlns:xsl="http://www.w3.org/1999/XSL/Transform"
 xmlns:s='uuid:BDC6E3F0-6DA3-11d1-A2A3-00AA00C14882'
	xmlns:dt='uuid:C2F41010-65B3-11d1-A29F-00AA00C14882'
	xmlns:rs='urn:schemas-microsoft-com:rowset'
	xmlns:z='#RowsetSchema'>
<xsl:output method="text" />
<xsl:strip-space elements="*"/>
<xsl:template match="/">
<xsl:apply-templates select="//xml" /><xsl:apply-templates select="//rs:data" />
</xsl:template>
<xsl:template match="xml"><xsl:for-each select="column"><xsl:value-of select="@header"/><xsl:text>&#x9;</xsl:text></xsl:for-each><xsl:text>&#xD;</xsl:text></xsl:template>
<xsl:template match="rs:data"><xsl:for-each select="z:row"><xsl:for-each select="@*"><xsl:value-of select="."/><xsl:text>&#x9;</xsl:text></xsl:for-each><xsl:text>&#xD;</xsl:text></xsl:for-each></xsl:template>
</xsl:stylesheet>
