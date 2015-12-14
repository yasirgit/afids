<?xml version="1.0"?>
<xsl:stylesheet version="1.0" xmlns:xsl="http://www.w3.org/1999/XSL/Transform">
<xsl:output method="html" />
<xsl:include href="org_common.xsl"/>
<xsl:template match="/">
This is a multi-part message in MIME format.    
   
--==Multipart_Boundary_xc75j85x    
Content-Type: text/plain; charset="iso-8859-1"    
Content-Transfer-Encoding: 7bit    
   
Dear <xsl:value-of select=".//firstName"/>,

Your membership in <xsl:value-of select="$orgName"/> is coming up for renewal next month. We wanted to give you the opportunity to get a head start on a new year of Angel Flight West membership.

We very much value your membership in <xsl:value-of select="$orgName"/>. You are an integral part of all these efforts, whether you fly 10 missions or none, whether you're able to volunteer your time on the ground or not. Whatever your level of participation, your support means a great deal to <xsl:value-of select="$orgName"/>.

Please renew your membership on our convenient online renewal form now. Simply visit <xsl:value-of select="concat($baseURL,'membership_renewal.asp')"/>, or log on to AFIDS at <xsl:value-of select="$baseURL"/> at your convenience and click on the link to "Renew your membership."

Note: Even if you do not owe membership dues, you must renew your membership!. We do require that you complete the renewal process to insure that we have a current affirmation on file for you. We cannot contine your membership without a current affirmation, so please renew now!

We are now accepting renewals online only. You will not receive a paper renewal form in the mail.

If you have any questions about your membership, or about the online renewal process, please call Erin at (310) 390-2958 x101 or send an email to <xsl:value-of select="$memberInfoEmail"/>.

Best Regards,

Alan Dias, Executive Director

Renewal Information:
Renewal Date: <xsl:value-of select=".//renewalDate"/>

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
	<p>Dear <xsl:value-of select=".//firstName"/>,</p>
	<p>Your membership in <xsl:value-of select="$orgName"/> is coming up for renewal next month. We wanted to give you the opportunity to get a head start on a new year of Angel Flight West membership.</p>
	<p>We very much value your membership in <xsl:value-of select="$orgName"/>. You are an integral part of all these efforts, whether you fly 10 missions or none, whether you're able to volunteer your time on the ground or not. Whatever your level of participation, your support means a great deal to <xsl:value-of select="$orgName"/>.</p>
	<p>Please renew your membership on our convenient online renewal form now. Simply <a href="{concat($baseURL,'membership_renewal.asp')}">click this link</a>. Otherwise, you can log on to <a href="{$baseURL}">AFIDS</a> at your convenience and click on the link to "Renew your membership."</p>
	<p><font color="red"><strong>Note: Even if you do not owe membership dues, you must renew your membership!</strong></font> We do require that you complete the renewal process to insure that we have a current affirmation on file for you. We cannot contine your membership without a current affirmation, so please renew now!</p>
	<p>We are now accepting renewals online only. You will not receive a paper renewal form in the mail.</p>
	<p>If you have any questions about your membership, or about the online renewal process, please call Erin at (310) 390-2958 x101 or send an email to <xsl:value-of select="$memberInfoEmail"/>.</p>
	<p class="indent">Best Regards,</p>
	<p class="indent">Alan Dias<br/>Executive Director</p>
	<hr/>
	<p><strong>Renewal Information:</strong>
	<br/>Renewal Date: <xsl:value-of select=".//renewalDate"/></p>

<xsl:apply-templates select="/" mode="footer_member_html"/>

</body>
</html>

--==Multipart_Boundary_xc75j85x--
</xsl:template>
</xsl:stylesheet>