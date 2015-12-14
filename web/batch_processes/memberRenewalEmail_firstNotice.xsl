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

You are a part of a very special family -- the <xsl:value-of select="$orgName"/> family! You and the more than 2,000 others in this family have touched the lives of thousands of people in the past 12 months.

Infants, young children, adults and senior citizens alike are on the receiving end of the generosity and support of our members.

Whether it's actually flying an <xsl:value-of select="$orgName"/> mission, or assisting with pilot recruitment or outreach to social workers, or simply supporting <xsl:value-of select="$orgName"/>'s mission with your membership, your involvement truly makes a difference in people's lives. For your caring heart, we are very grateful.

In talking with many <xsl:value-of select="$orgName"/> members, I know that your participation has been meaningful to you as well. Your life has been impacted because you are combining your passion for flying with your compassion to help those in need.

I hope you will say "yes" to continuing to bring help and hope to people in need by sending in your annual dues and renewing your membership.

Your participation is needed now more than ever, as we are flying more missions than ever before. In 2007, <xsl:value-of select="$orgName"/> flew more than 4,000 missions, and we anticipate surpassing that number in 2008.

Please complete your renewal by <xsl:value-of select=".//dueDate"/>. 

Please note: Whether you are a pilot or non-pilot, whether or not you wish to fly missions, and even if you are a spouse member or do not owe membership dues, you must complete your renewal and agree to our affirmation in order to remain active as a member.

To renew, log on to <xsl:value-of select="$baseURL"/> and click on the link to "Renew Your Membership."

Take a few moments now to renew your commitment to <xsl:value-of select="$orgName"/> while it's fresh in your mind. To save staff time and expense, we've moved to a online-only renewal. We won't be sending letters with renewal forms, only email reminders. So please, log into AFIDS and take care of your renewal online as soon as possible. 

If you are unable to renew online, or prefer to pay by check, please call Erin at (310) 390-2958 or email memberinfo@angelflightwest.org to request a paper form. 

I hope to hear from you very soon.

A tip of the wing in thanks,
 
Alan Dias
Executive Director

A SPECIAL OFFER

We have been very excited over the years as many <xsl:value-of select="$orgName"/> members have made special contributions by adding a donation over and above their dues.
We want to say thanks for such donations in a tangible way. To celebrate <xsl:value-of select="$orgName"/>'s expanding services and following an enthusiastic response to our earlier offers, we will send you, for a contribution of $150 or more in addition to your annual dues, a special pilot's pen with the <xsl:value-of select="$orgName"/>'s logo on it. This pressurized pen will not leak when you reach altitude. And it will write at any angle, so you can copy clearance changes even when you're inverted! (Which we hope you're not!) Pilots and non-pilots alike will love this pen.
I hope we hear from you very soon!

Join Date: <xsl:value-of select=".//joinDate"/>
Renewal Date: <xsl:value-of select=".//renewalDate"/>
<xsl:apply-templates select="/" mode="footer_member_text"/>
   
--==Multipart_Boundary_xc75j85x    
Content-Type: text/html; charset="iso-8859-1"    
Content-Transfer-Encoding: 7bit    
<html>
<head><title><xsl:value-of select="$orgName"/> Mission Renewal Reminder</title>
<style type="text/css" title="currentStyle" media="screen">
		@import "afids_emails.css";
</style>
</head>
<body>
<p>Dear <xsl:value-of select=".//firstName"/>,</p>

<p>You are a part of a very special family -- the <xsl:value-of select="$orgName"/> family! You and the nearly 2,000 others in this family have touched the lives of thousands of people in the past 12 months.</p>

<p>Infants, young children, adults and senior citizens alike are on the receiving end of the generosity and support of our members.</p>

<p>Whether it's actually flying an <xsl:value-of select="$orgName"/> mission, or assisting with pilot recruitment or outreach to social workers, or simply supporting <xsl:value-of select="$orgName"/>'s mission with your membership, your involvement truly makes a difference in people's lives. For your caring heart, we are very grateful.</p>

<p>In talking with many <xsl:value-of select="$orgName"/> members, I know that your participation has been meaningful to you as well. Your life has been impacted because you are combining your passion for flying with your compassion to help those in need.</p>

<p>I hope you will say "yes" to continuing to bring help and hope to people in need by sending in your annual dues and renewing your membership.</p>

<p>Your participation is needed now more than ever, as we are flying more missions than ever before. In 2007, <xsl:value-of select="$orgName"/> flew more than 4,000 missions, and we anticipate surpassing that number in 2008.</p>

<p>Please complete your renewal by <xsl:value-of select="@dueDate"/>.</p>

<p><font color="red"><b>Please note:</b> Whether you are a pilot or non-pilot, whether or not you wish to fly missions, and even if you are a spouse member or do not owe membership dues, you must complete your renewal and agree to our affirmation in order to remain active as a member.</font></p>

<p>To renew, log on to <a><xsl:attribute name="href"><xsl:value-of select="$baseURL"/></xsl:attribute><xsl:value-of select="$baseURL"/></a> and click on the link to "Renew Your Membership" or <a href="{concat($baseURL,'membership_renewal.asp')}">click this link</a>.</p>

<p>Take a few moments now to renew your commitment to <xsl:value-of select="$orgName"/> while it's fresh in your mind. To save staff time and expense, we've moved to a online-only renewal. We won't be sending letters with renewal forms, only email reminders. So please, log into AFIDS and take care of your renewal online as soon as possible.</p>

<p>If you are unable to renew online, or prefer to pay by check, please call Erin at (310) 390-2958 or email memberinfo@angelflightwest.org to request a paper form.</p>

<p>I hope to hear from you very soon.</p>

<p>A tip of the wing in thanks,</p> 

<p>Alan Dias
<br/>Executive Director</p>

<p>A SPECIAL OFFER</p>

<p>We have been very excited over the years as many <xsl:value-of select="$orgName"/> members have made special contributions by adding a donation over and above their dues.
We want to say thanks for such donations in a tangible way. To celebrate <xsl:value-of select="$orgName"/>'s expanding services and following an enthusiastic response to our earlier offers, we will send you, for a contribution of $150 or more in addition to your annual dues, a special pilot's pen with the <xsl:value-of select="$orgName"/>'s logo on it. This pressurized pen will not leak when you reach altitude. And it will write at any angle, so you can copy clearance changes even when you're inverted! (Which we hope you're not!) Pilots and non-pilots alike will love this pen.
I hope we hear from you very soon!</p>

<p>Join Date: <xsl:value-of select="@joinDate"/>
<br/>Renewal Date: <xsl:value-of select="@renewalDate"/></p>

<xsl:apply-templates select="/" mode="footer_member_html"/>
</body>
</html>

--==Multipart_Boundary_xc75j85x--
</xsl:template>
</xsl:stylesheet>