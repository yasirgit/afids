<xsl:stylesheet version="1.0" xmlns:xsl="http://www.w3.org/1999/XSL/Transform">
<xsl:variable name="and">&amp;</xsl:variable>
<xsl:output method="html" />
<xsl:strip-space elements="*"/>

<xsl:template match="/">
<div id="demo">
<p style="font-weight:bold;font-size:14pt">Missions Summary</p>

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
 
<p><a>
	<xsl:attribute name="href">
		<xsl:value-of select="concat('http://69.50.211.150/reports/reports.php?action=display',$and,'reportDef=report_specs.xml',$and,'reportName=monthly_mission_report',$and,'startDate=',//params/param[@field='startDate']/@value,$and,'endDate=',//params/param[@field='endDate']/@value)"/>
	</xsl:attribute>
	View detail report for this period</a></p>
</div>
</xsl:template>
</xsl:stylesheet>
