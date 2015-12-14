<?xml version="1.0"?>
<xsl:stylesheet version="1.0" xmlns:xsl="http://www.w3.org/1999/XSL/Transform">

	<xsl:variable name="lowercase" select="'abcdefghijklmnopqrstuvwxyz'" />
	<xsl:variable name="uppercase" select="'ABCDEFGHIJKLMNOPQRSTUVWXYZ'" />

	<xsl:param name="organizationNameAllCaps">ANGEL FLIGHT WEST</xsl:param>

	<xsl:param name="orgAB">AFW</xsl:param>

	<xsl:param name="baseURL">http://afids.angelflightwest.org</xsl:param>

	<xsl:param name="wingTerm">Wing</xsl:param>

	<xsl:param name="webURL">http://www.angelflightwest.org</xsl:param>

	<xsl:param name="orgName">Angel Flight West</xsl:param>

	<xsl:param name="officePhone">(310) 390-2958</xsl:param>
	
	<xsl:param name="officeFax">(310) 397-9636</xsl:param>

	<xsl:param name="officeHotline">(800) 352-4256</xsl:param>

	<xsl:param name="memberInfoEmail">memberInfo@angelflightwest.org</xsl:param>

	<xsl:param name="coordEmail">coordination@angelflightwest.org</xsl:param>

	<xsl:param name="webmasterEmail">webmaster@angelflightwest.org</xsl:param>

	<xsl:param name="wings">http://afids.angelflightwest.org/graphics/wings.jpg</xsl:param>

	<xsl:param name="logo_west">http://afids.angelflightwest.org/images/logos/afwest_logo_141x57.jpg</xsl:param>

	<xsl:param name="ed_signature"></xsl:param>

	<!-- Just the url, or the whole element? -->
	<xsl:param name="wing120">graphics/AFWwing_120.gif</xsl:param>

	<xsl:param name="logo_url">
		<xsl:value-of select="$wings"/>
	</xsl:param>
	<xsl:param name="logo_height">57</xsl:param>
	<xsl:param name="logo_width">141</xsl:param>

	<xsl:param name="logo">
	  <img>
	    <xsl:attribute name="src"><xsl:value-of select="$wings"/></xsl:attribute>
		  <xsl:attribute name="width">141</xsl:attribute>
		  <xsl:attribute name="height">57</xsl:attribute>
		  <xsl:attribute name="alt"><xsl:value-of select="$orgName"/></xsl:attribute>
	  </img>
	</xsl:param>

	<xsl:attribute-set name="img.wing120">
		<xsl:attribute name="src"><xsl:value-of select="$wing120"/></xsl:attribute>
		<xsl:attribute name="width">120</xsl:attribute>
		<xsl:attribute name="height">55</xsl:attribute>
		<xsl:attribute name="alt">AFWest</xsl:attribute>
	</xsl:attribute-set>

	<xsl:template match="/" mode="footer_html">
		<p>To block this and all future emails from <xsl:value-of select="$orgName"/>, <a href="{concat($baseURL,'email_list_management.asp?action=block')}"> Click Here</a>.
		<br/>To switch to a text-only format for this and all future emails from <xsl:value-of select="$orgName"/>, <a href="{concat($baseURL,'email_list_management.asp?action=emailText')}">Click Here</a>.</p>
		<p><small>Copyright 2008, <xsl:value-of select="$orgName"/>. All Rights Reserved.</small></p>
	</xsl:template>

	<xsl:template match="/" mode="footer_text">To block this and all future emails from <xsl:value-of select="$orgName"/>, open the following URL in your webbrowser: <xsl:value-of select="concat($baseURL,'email_list_management.asp?action=block')"/>.
     To switch to HTML format for this and all future emails from <xsl:value-of select="$orgName"/>, open the following URL in your webbrowser: <xsl:value-of select="concat($baseURL,'email_list_management.asp?action=emailHTML')"/> or email <xsl:value-of select=".//rs:data/@notifyTo"/><xsl:text>&#xA;&#xA;</xsl:text>
	   <xsl:value-of select="concat('Copyright 2008, ',$orgName,'. All Rights Reserved.')"/>
	</xsl:template>

	<xsl:template match="/" mode="footer_list">
		<xsl:choose>
			<xsl:when test="//rs:data/@emailTextOnly=0">
				<xsl:apply-templates select="." mode="footer_list_html"/>
			</xsl:when>
			<xsl:otherwise>
				<xsl:apply-templates select="." mode="footer_list_text"/>
			</xsl:otherwise>
		</xsl:choose>
	</xsl:template>

	<xsl:template match="/" mode="footer_list_html">
		<p>You are receiving this email because you subscribed. To unsubscribe from this list, <a href="{concat($baseURL,'email_list_management.asp?action=unsubscribe&amp;listID=1')}"> Click Here</a>.
		<br/>To switch to a text-only format for this and all future emails from <xsl:value-of select="$orgName"/>, <a href="{concat($baseURL,'email_list_management.asp?action=emailText')}">Click Here</a>.</p>
		<p><small>Copyright 2008, <xsl:value-of select="$orgName"/>. All Rights Reserved.</small></p>
	</xsl:template>

	<xsl:template match="/" mode="footer_member_html">
		<p>This email was sent to you by <xsl:value-of select="$orgName"/> as a part of our regular communication with our members.
		<br/>To switch to a text-only format for this and all future emails, <a href="{concat($baseURL,'email_list_management.asp?action=emailText')}">Click Here</a>.</p>
		<p><small>Copyright 2008, <xsl:value-of select="$orgName"/>. All Rights Reserved.</small></p>
	</xsl:template>

	<xsl:template match="/" mode="footer_list_text">You are receiving this email because you subscribed. To unsubscribe to from this list, visit the following URL in your webbrowser: <xsl:value-of select="concat($baseURL,'email_list_management.asp?action=unsubscribe&amp;listID=1')"/><xsl:text>&#xA;</xsl:text>
     To switch to a richer, HTML format for this and all futer emails from <xsl:value-of select="$orgName"/>, visit the following address in your web browser: <xsl:value-of select="concat($baseURL,'email_list_management.asp?action=emailHTML')"/> or email <xsl:value-of select=".//rs:data/@notifyTo"/><xsl:text>&#xA;&#xA;</xsl:text>
	   <xsl:value-of select="concat('Copyright 2008, ',$orgName,'. All Rights Reserved.')"/>
	</xsl:template>

	<xsl:template match="/" mode="footer_member_text">
		This email was sent to you by <xsl:value-of select="$orgName"/> as a part of our regular communication with our members. To switch to a richer, HTML format for this and all futer emails from <xsl:value-of select="$orgName"/>, visit the following address in your web browser: <xsl:value-of select="concat($baseURL,'email_list_management.asp?action=emailHTML')"/> or email <xsl:value-of select=".//notifyTo"/><xsl:text>&#xA;&#xA;</xsl:text>
	  <xsl:value-of select="concat('Copyright 2008, ',$orgName,'. All Rights Reserved.')"/>
	</xsl:template>

</xsl:stylesheet>
