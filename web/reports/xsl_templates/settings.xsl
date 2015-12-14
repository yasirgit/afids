<?xml version="1.0"?>
<xsl:stylesheet version="1.0" xmlns:xsl="http://www.w3.org/1999/XSL/Transform">

	<!--  Define variables -->
	<xsl:param name="afidsDSN">DSN=missions_afw;UID=sa;PWD=go*ifr</xsl:param>
	<xsl:param name="webmasterEmail">webmaster@angelflightwest.org</xsl:param>
	<xsl:param name="postmasterEmail">postmaster@angelflightwest.org</xsl:param>
	<xsl:param name="memberInfoEmail">memberinfo@angelflightwest.org</xsl:param>
	<xsl:param name="requesterInfoEmail">swinfo@angelflightwest.org</xsl:param>
	<xsl:param name="golfInfoEmail">golf@angelflightwest.org</xsl:param>
	<xsl:param name="ordersEmail">orders@angelflightwest.org</xsl:param>
	<xsl:param name="postmasterName">Postmaster</xsl:param>
	<xsl:param name="webmasterName">Webmaster</xsl:param>
	<xsl:param name="organizationAcronym">AFW</xsl:param>
	<xsl:param name="organizationName">Angel Flight West</xsl:param>
	<xsl:param name="organizationAddress1">3161 Donald Douglas Loop South</xsl:param>
	<xsl:param name="organizationAddress2">Santa Monica, CA  90405</xsl:param>
	<xsl:param name="organizationHomePage">http://www.angelflightwest.org</xsl:param>
	<xsl:param name="organizationAFIDSHomePage">http://afids.angelflightwest.org</xsl:param>
	<xsl:param name="organizationPhone">(310) 390-2958</xsl:param>
	<xsl:param name="organizationHotline">(888) 4-AN-ANGEL</xsl:param>
	<xsl:param name="organizationFax">(310) 397-9636</xsl:param>
	<xsl:param name="organizationEfaxEmail">fax@angelflightwest.org</xsl:param>
	<xsl:param name="organizationEfaxNumber"></xsl:param>
	<xsl:attribute-set name="organizationLogo">
		<xsl:attribute name="src"><xsl:value-of select="concat($organizationAFIDSHomePage,'')"/></xsl:attribute>
		<xsl:attribute name="height"></xsl:attribute>
		<xsl:attribute name="width"></xsl:attribute>
		<xsl:attribute name="alt"><xsl:value-of select="$organizationName"/></xsl:attribute>
	</xsl:attribute-set>
	<xsl:param name="rootDirectory">d:\afw\</xsl:param>
	<xsl:param name="afidsRoot">d:\afw\</xsl:param>
	<xsl:param name="missionEmailDirectory">d:\afw\mission_emails\</xsl:param>
	<xsl:param name="xslDirectory">d:\afw\xsl\</xsl:param>
	<xsl:param name="defaultBaggageWeight">25</xsl:param>
	<xsl:param name="defaultBaggageDesc">normal</xsl:param>
	<xsl:param name="reportDefDirectory">d:\afw\report\xsl_templates\</xsl:param>
	<xsl:param name="emailAttachmentsDirectory">d:\afw\aspupload\attachmentFiles\</xsl:param>
	<xsl:param name="organizationWingID">102</xsl:param>
	<xsl:param name="newApplicationPremium">1</xsl:param>
	<xsl:param name="newApplicationFee">50.00</xsl:param>
	<xsl:param name="renewalApplicationFee">1</xsl:param>
	<xsl:param name="newApplicationMinHours">250</xsl:param>
	<xsl:param name="newApplicationMinHoursHandling">1</xsl:param>	<!-- 1 = allow user to continue, 0 = do not allow user to continue -->
	<xsl:param name="newApplicationTShirtOption">0</xsl:param>
	<xsl:param name="newApplicationSpouseMembership">1</xsl:param>
	<xsl:param name="renewalPremiumAmount">150</xsl:param>
	<xsl:param name="renewalPremiumDesc">Pressurized Pen</xsl:param>
	<xsl:param name="renewalPremiumSKU"></xsl:param>
	<xsl:param name="dobWarningMessage">1</xsl:param>
	<xsl:param name="orgUsesLiabilityFields">0</xsl:param>
	<xsl:param name="orgTracksInsuranceDate">0</xsl:param>

	<!--  For mission requests -->
	<xsl:param name="organizationUsesPassengerRequester">0</xsl:param>
	<xsl:param name="passengerRequesterID">0</xsl:param>

	<!--  For mission count charts -->
	<xsl:param name="missionChartFileURL">../mission_emails/charts/</xsl:param>
	<xsl:param name="missionChartFileRoot">d:\afw\mission_emails\charts\</xsl:param>
	<xsl:param name="doMissionCharts">1</xsl:param>

	<!--  Missions Visual -->
	<xsl:param name="missionsVisualCenterLatLng">36.080055,-115.15225</xsl:param>
	<xsl:param name="missionsVisualZoom">5</xsl:param>

	<!--  Hardcoded Colors for mission types not found in the missionTypes table -->
	<!--  The stored procedure missionsAvailable also has this value hardcoded -->
	<xsl:param name="campBgColor">#80FF80</xsl:param>
</xsl:stylesheet>
