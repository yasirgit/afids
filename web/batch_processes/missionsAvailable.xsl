<?xml version="1.0"?>
<xsl:stylesheet version="1.0" xmlns:xsl="http://www.w3.org/1999/XSL/Transform">
<xsl:output method="html" />
<xsl:include href="org_common.xsl"/>
<xsl:include href="missionsAvailableMailer_templates.xsl"/>
<xsl:template match="/">
This is a multi-part message in MIME format.    
   
--==Multipart_Boundary_xc75j85x    
Content-Type: text/plain; charset="iso-8859-1"    
Content-Transfer-Encoding: 7bit    
   
Dear <xsl:value-of select="$orgName"/> Pilots:

The following is a "snapshot" of missions available at the time of this email. To see the detail of a mission or request a mission visit the missions available list on the AFIDS web site.

Mission Requests are processed on a first-come, first-served basis each business day by the Missions Team.

PLEASE CLICK ON THE AFIDS LOGIN (<xsl:value-of select="$baseURL"/>) ON THE <xsl:value-of select="translate($orgName,$lowercase,$uppercase)"/> WEBSITE FOR THE MOST UP-TO-DATE LISTING OF MISSIONS AVAILABLE.

Thank you for flying for <xsl:value-of select="$orgName"/>

The following are <xsl:value-of select="$orgName"/> missions currently leaving from or going to your home base airport:
<xsl:apply-templates select="//afids_bp" mode="homebase_text" />

The following is a list of missions currently available leaving from or arriving at any airport in your <xsl:value-of select="$wingTerm"/>:
<xsl:apply-templates select="//record" mode="wing_text" />

The following is a list of all upcoming missions:
<xsl:apply-templates select="//afids_bp" mode="all_text" />

<xsl:apply-templates select="/" mode="footer_member_text"/>

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
<p>Dear <xsl:value-of select="$orgName"/> Pilots:</p>

<p>The following is a "snapshot" of missions available at the time of this email. To see the detail of a mission or request a mission, click on the mission number.</p>

<p>Mission Requests are processed on a first-come, first-served basis each business day by the Missions Team.</p>

<p>PLEASE CLICK ON THE <a>
	<xsl:attribute name="href"><xsl:value-of select="$baseURL"/></xsl:attribute>
AFIDS LOGIN ON THE <xsl:value-of select="translate($orgName,$lowercase,$uppercase)"/> WEBSITE
</a>FOR THE MOST UP-TO-DATE LISTING OF MISSIONS AVAILABLE.</p>

<p>Thank you for flying for <xsl:value-of select="$orgName"/></p>

<p><strong>The following are <xsl:value-of select="$orgName"/> missions currently leaving from or going to your home base airport:</strong></p>
<xsl:apply-templates select="." mode="homebase" />

<p><strong>The following is a list of missions currently available leaving from or arriving at any airport in your <xsl:value-of select="$wingTerm"/>:</strong></p>
<xsl:apply-templates select="." mode="wing" />

<p><strong>The following is a list of all upcoming missions:</strong></p>
<xsl:apply-templates select="." mode="all" />

<xsl:apply-templates select="/" mode="footer_member_html"/>

</body>
</html>

--==Multipart_Boundary_xc75j85x--
</xsl:template>



</xsl:stylesheet>