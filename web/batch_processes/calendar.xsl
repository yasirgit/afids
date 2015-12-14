<?xml version="1.0"?>
<xsl:stylesheet version="1.0" xmlns:xsl="http://www.w3.org/1999/XSL/Transform">
<xsl:output method="html" />
<xsl:include href="common-1.0.xsl"/>
<xsl:template match="/">
This is a multi-part message in MIME format.    
   
--==Multipart_Boundary_xc75j85x    
Content-Type: text/plain; charset="iso-8859-1"    
Content-Transfer-Encoding: 7bit    
   
This is the text portion of the mixed message.    
   
--==Multipart_Boundary_xc75j85x    
Content-Type: text/html; charset="iso-8859-1"    
Content-Transfer-Encoding: 7bit    
<html>
<head><title><xsl:value-of select="$orgName"/> Calendar of Events</title>
<style type="text/css" title="currentStyle" media="screen">

</style>
</head>
<body topmargin="1" leftmargin="1">
<div align="left">
<table border="0" cellpadding="4" width="650" cellspacing="4">
  <tr>
      <td>
          <table border="0" cellpadding="2" width="650" cellspacing="0">
            <tr>
                <td width="130">
                  <img>
	    							<xsl:attribute name="src"><xsl:value-of select="$wings"/></xsl:attribute>
		  							<xsl:attribute name="width">113</xsl:attribute>
		  							<xsl:attribute name="height">38</xsl:attribute>
		  							<xsl:attribute name="alt"><xsl:value-of select="orgName"/></xsl:attribute>
	  							</img>
                </td>
                <td width="520"><h3><xsl:value-of select="orgName"/><br/>Calendar of Events</h3></td>
            </tr>
          </table>
      </td>
  </tr>
  <tr>
      <td>
      <p>Dear Members,</p>
      <p>The following is a list of upcoming events. To see the detail of an event on the web site, click on the event name. For the most up-to-date listing, please visit the <a href="{concat($webURL,'news/calendar.asp')}"><xsl:value-of select="$orgName"/> Web Site</a>.</p>
          <p><table border="1" cellpadding="2" width="650" cellspacing="0">
            <tr>
              <td width="100" valign="top" align="left"><p><b>Date/Time</b></p></td>
              <td width="300" valign="top" align="left"><p><b>Event</b></p></td>
              <td width="100" valign="top" align="left"><p><b>Cost</b></p></td>
              <td width="150" valign="top" align="left"><p><b>Contact</b></p></td>
            </tr>
          <xsl:for-each select=".//record">
            <tr>
              <td width="100" valign="top" align="left"><p>
                  <xsl:value-of select="eventdate"/>
                  <xsl:choose>
                  <xsl:when test="eventtime">
                      <br/><xsl:value-of select="eventtime"/>
                  </xsl:when>
                  </xsl:choose>
              </p></td>
              <td width="300" valign="top" align="left"><p>
               <a href="{concat($webURL,'news/calendar_detail.asp?eventID=',id)}">
                  <xsl:value-of select="eventname"/>
               </a>
              <xsl:choose>
              <xsl:when test="location">
                  <br/><xsl:value-of select="location"/>
              </xsl:when>
              </xsl:choose>
              <xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text>
              </p></td>
              <td width="100" valign="top" align="left"><p>
              <xsl:choose>
              <xsl:when test="adultcost>0">
                  <xsl:value-of select="format-number(adultcost,'$#.00')"/>
              </xsl:when>
              <xsl:otherwise>
                  <xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text>
              </xsl:otherwise>
              </xsl:choose>
              <xsl:choose>
              <xsl:when test="childcost!=adultcost">
                  <br/><xsl:value-of select="format-number(childcost,'$#.00')"/><xsl:text> </xsl:text>(children)
              </xsl:when>
              </xsl:choose>
              <xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text>
              </p></td>
              <td width="150" valign="top" align="left"><p>
              	<xsl:value-of select="contactinfo" disable-output-escaping="yes"/><xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text>
              </p></td>
            </tr>
          </xsl:for-each>
         </table></p>
    </td>
</tr>
</table>
</div>
</body>
</html>

--==Multipart_Boundary_xc75j85x--
</xsl:template>
</xsl:stylesheet>