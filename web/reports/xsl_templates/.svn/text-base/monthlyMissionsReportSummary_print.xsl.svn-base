<xsl:stylesheet version="1.0" xmlns:xsl="http://www.w3.org/1999/XSL/Transform">
<xsl:output method="html" />
<xsl:strip-space elements="*"/>
<xsl:template match="/">
<xsl:variable name="q">&apos;</xsl:variable>
<table border="0" cellpadding="2" cellspacing="0" width="500"><tr><td>
<p style="font-weight:bold;font-size:14pt">Missions Summary for period <xsl:value-of select="//params/param[@field='startDate']/@value"/> to <xsl:value-of select="//params/param[@field='endDate']/@value"/></p>

<p>
<xsl:if test=".//legCount=0">
	0 total mission legs
</xsl:if>
<xsl:if test=".//legCount&gt;0">
	<xsl:value-of select="format-number(.//legCount,'#,###')"/> total mission legs
</xsl:if>
<xsl:if test=".//hours&gt;0">
	<br/><xsl:value-of select="format-number(.//hours,'#,###.0')"/> total hours flown
</xsl:if>
<xsl:if test=".//hours=0 or .//hours=''">
	<br/>0 total hours flown
</xsl:if>
<xsl:if test=".//legCost&gt;0">
	<br/><xsl:value-of select="format-number(.//legCost,'$#,###.00')"/> donated flight time cost
</xsl:if>
<xsl:if test=".//legCost=0 or .//legCost=''" >
	<br/>$0 donated flight time cost
</xsl:if>
<xsl:if test=".//commercialTicketCost&gt;0">
	<br/><xsl:value-of select="format-number(.//commercialTicketCost,'$#,###.00')"/> total commercial tickets purchased
</xsl:if>
<xsl:if test=".//commercialTicketCost=0 or .//commercialTicketCost=''">
	<br/>$0 total commercial tickets purchased
</xsl:if>
<xsl:if test=".//legCount&gt;0 and .//commercialTicketCost&gt;0">
	<br/>Average donated flight time per mission leg: <xsl:value-of select="format-number((.//commercialTicketCost div .//legCount),'$#,###.00')"/> 
</xsl:if>
<xsl:if test=".//legCount&gt;0 and .//hours&gt;0">
	<br/>Average hours per mission leg: <xsl:value-of select="format-number((.//hours div .//legCount),'#,###')"/>
</xsl:if>
</p> 
</td></tr></table>
</xsl:template>
</xsl:stylesheet>