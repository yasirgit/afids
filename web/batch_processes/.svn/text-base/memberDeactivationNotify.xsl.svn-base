<?xml version="1.0"?>
<xsl:stylesheet version="1.0" xmlns:xsl="http://www.w3.org/1999/XSL/Transform">
<xsl:output method="html" />
<xsl:include href="common-1.0.xsl"/>
<xsl:template match="/">
This is a multi-part message in MIME format.    
   
--==Multipart_Boundary_xc75j85x    
Content-Type: text/plain; charset="iso-8859-1"    
Content-Transfer-Encoding: 7bit    
   
This template does not support text-only email. Please re-set your preferences to accept HTML emails.
   
--==Multipart_Boundary_xc75j85x    
Content-Type: text/html; charset="iso-8859-1"    
Content-Transfer-Encoding: 7bit    
<html>
<head><title><xsl:value-of select="$orgName"/> Mission Report Reminder</title>
<style type="text/css" title="currentStyle" media="screen">
		@import "afids_emails.css";
</style>
</head>
<body>
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
		  	<xsl:attribute name="alt"><xsl:value-of select="$orgName"/></xsl:attribute>
	  	  </img>
                </td>
                <td width="520"><h3><xsl:value-of select="$orgName"/><br/>Membership Deactivation Notification</h3></td>
            </tr>
          </table>
      </td>
  </tr>
</table>
<p>The following members will be set to inactive due to non-renewal on the 15th of this month:</p>

<table border="1" cellpadding="2" width="650" cellspacing="2">
<tr>
	<td width="200" valign="top" align="left"><p>Member</p></td>
	<td width="150" valign="top" align="left"><p>Renewal Date</p></td>
	<td width="150" valign="top" align="left"><p>Join Date</p></td>
	<td width="150" valign="top" align="left"><p>Email</p></td>
</tr>
<xsl:for-each select=".//record">
<xsl:choose>
<xsl:when test="not(preceding-sibling::node()[externalID = current()/externalID])">
<tr>
	<td width="200" valign="top" align="left"><p>
		
			<a>
		            <xsl:attribute name="href">
			        <xsl:call-template name="make-xref"/>
		            </xsl:attribute>
		            <xsl:value-of select="memberName"/>
		        </a>	

		
	</p></td>
	<td width="150" valign="top" align="left"><p>
		<xsl:value-of select="renewalDate"/>
	</p></td>
	<td width="150" valign="top" align="left"><p>
		<xsl:value-of select="joinDate"/>
	</p></td>
	<td width="150" valign="top" align="left"><p>
		
			<a>
		            <xsl:attribute name="href">
			        <xsl:call-template name="make-email"/>
		            </xsl:attribute>
			<xsl:value-of select="email"/>
			</a>
		
	<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text>
	</p></td>
</tr>
</xsl:when>
</xsl:choose>
</xsl:for-each>
</table>
</body>
</html>

--==Multipart_Boundary_xc75j85x--
</xsl:template>

<xsl:template name="make-xref">
	<xsl:value-of select="concat($baseURL,'personview.asp?id=',personID)"/>
</xsl:template>
<xsl:template name="make-email">
	<xsl:value-of select="concat('mailto:',email)"/>
</xsl:template>
</xsl:stylesheet>