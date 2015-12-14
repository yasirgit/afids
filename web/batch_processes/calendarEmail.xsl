<?xml version="1.0"?>
<xsl:stylesheet version="1.0" xmlns:xsl="http://www.w3.org/1999/XSL/Transform">
<xsl:include href="common-1.0.xsl"/>
<xsl:output method="html"/>

<xsl:template match="/">
<xsl:value-of select="concat($orgName,' Calendar of Events')"/>
<xsl:text>

Dear members,

 &#x20; &#x20; &#x20; &#x20; The following is a list of upcoming events. To see the detail of an event on the web site, click on the event name. For the most up-to-date listing, please visit the Angel Flight Web Site.

Date/Time &#x20; &#x20; &#x20; &#x20; &#x20; &#x20; &#x20; &#x20; &#x20; &#x20; &#x20; &#x20; &#x20; &#x20; &#x20; &#x20; &#x20; &#x20;&#x20; &#x20; &#x20; &#x20;  Event &#x20; &#x20; Location &#x20; &#x20; Cost &#x20; &#x20; Contact
-----------------------------------------------------------------------------------
</xsl:text>

<xsl:for-each select=".//record">
  <xsl:value-of select="eventdate"/><xsl:text>&#x20;&#x20;&#x20;&#x20;</xsl:text>
  <xsl:choose>
    <xsl:when test="eventTime">
      <xsl:value-of select="eventTime"/><xsl:text>&#x20;&#x20;&#x20;&#x20;</xsl:text>
    </xsl:when>
  </xsl:choose>
<!-- Next Line -->
<xsl:value-of select="eventname"/><xsl:text>&#xA;&#x20;&#x20;&#x20;&#x20;</xsl:text>
              <xsl:choose>
                <xsl:when test="@location">
                  <xsl:value-of select="@location"/>
                </xsl:when>
              </xsl:choose>
              <xsl:text>&#x20;&#x20;&#x20;&#x20;</xsl:text>
              <xsl:choose>
                <xsl:when test="@adultCost>0">
                  <xsl:value-of select="format-number(@adultCost,'$#.00')"/>
                </xsl:when>
                <xsl:otherwise>
                  <xsl:text disable-output-escaping="yes">&#x20;</xsl:text>
                </xsl:otherwise>
              </xsl:choose>
              <xsl:text>&#x20;&#x20;&#x20;&#x20;</xsl:text>
              <xsl:choose>
              <xsl:when test="@childCost!=@adultCost">
                <xsl:value-of select="format-number(@childCost,'$#.00')"/><xsl:text> </xsl:text>(children)
              </xsl:when>
              </xsl:choose>
          <xsl:text>&#x20;&#x20;&#x20;&#x20;</xsl:text>
          <xsl:value-of select="@contactInfo" disable-output-escaping="yes"/>
          <!-- Next Event -->
          <xsl:text disable-output-escaping="yes">
-----------------------------------------------------------------------------------
</xsl:text>
          </xsl:for-each>
	  <xsl:apply-templates select="/" mode="footer_list"/>
</xsl:template>
</xsl:stylesheet>
