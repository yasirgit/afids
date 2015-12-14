<?xml version="1.0"?>
<xsl:stylesheet version="1.0" xmlns:xsl="http://www.w3.org/1999/XSL/Transform">
<xsl:output method="html" />
<xsl:include href="common-1.0.xsl"/>
<xsl:template match="/">
This is a multi-part message in MIME format.    
   
--==Multipart_Boundary_xc75j85x    
Content-Type: text/plain; charset="iso-8859-1"    
Content-Transfer-Encoding: 7bit    
   
Dear <xsl:value-of select=".//firstName"/>,

You have <xsl:choose><xsl:when test=".//legCount > 1"><xsl:value-of select=".//legCount"/> outstanding mission reports due for recent <xsl:value-of select="$orgName"/> Flights. The oldest outstanding mission leg was scheduled to be flown on </xsl:when><xsl:otherwise>an oustanding mission report due for an <xsl:value-of select="$orgName"/> Flight scheduled for </xsl:otherwise></xsl:choose><xsl:value-of select=".//oldestMission"/>.

The easiest way to enter a mission report is on our web site<xsl:value-of select="concat(' (',$baseURL,').')"/>

Otherwise, you can fax a mission report to the office at <xsl:value-of select="$officeFax"/>.

Please remember to use the Mission Report Form from your member notebook, or you can download the form from the website<xsl:value-of select="concat(' ',$webURL,'members/forms.asp')"/>

If the mission was cancelled for any reason, please notify the office immediately by phone at <xsl:value-of select="$officePhone"/>.

Thank you very much for your prompt attention to your mission reports. They are critical to our effective operation.

Best regards,

<xsl:value-of select="concat(.//notifyTo,' (',.//notifyToEmail,')')"/>
------------------------------------------------------------------------
This email was sent to: <xsl:value-of select="concat(.//email,' (',.//firstName,' ',.//lastName,')')"/>
   
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
                <td width="520"><h3><xsl:value-of select="$orgName"/><br/>Mission Report Reminder</h3></td>
            </tr>
          </table>
      </td>
  </tr>
</table>
<p>Dear <xsl:value-of select=".//firstName"/>,</p>
<p>You have 
<xsl:choose>
  <xsl:when test=".//legCount > 1">
    <xsl:value-of select=".//legCount"/> outstanding mission reports due for recent {$orgName} Flights. The oldest outstanding mission leg was scheduled to be flown on 
  </xsl:when>
  <xsl:otherwise>
     an oustanding mission report due for an {$orgName} Flight scheduled for 
  </xsl:otherwise>
</xsl:choose>
<xsl:value-of select=".//oldestMission"/>.</p>

<p>The easiest way to enter a mission report is on our <a href="{$baseURL}">web site</a>. Otherwise, you can fax a mission report to the office at {$officeFax}.</p>
<p>Please remember to use the Mission Report Form from your member notebook, or you can <a href="{$webURL}members/forms.asp">download the form</a> from the website.</p>
<p>If the mission was cancelled for any reason, please notify the office immediately by phone at {$officePhone}.</p>
<p>Thank you very much for your prompt attention to your mission reports. They are critical to our effective operation.</p>
<p>Best regards,</p>
<p>{$orgName} Coordination Staff ({$coordEmail})</p>
<hr/>
<p>This email was sent to: <xsl:value-of select="concat(.//firstName,' ',.//lastName,' (',.//email,')')"/></p>
</body>
</html>

--==Multipart_Boundary_xc75j85x--
</xsl:template>
</xsl:stylesheet>