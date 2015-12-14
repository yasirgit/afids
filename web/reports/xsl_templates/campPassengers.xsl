<xsl:stylesheet version="1.0" xmlns:xsl="http://www.w3.org/1999/XSL/Transform">
<xsl:output method="html" />
<xsl:strip-space elements="*"/>

<xsl:template match="/">
<script type="text/javascript" charset="utf-8">
<![CDATA[
		jQuery(document).ready(function() {
				jQuery('#reportData').dataTable({
					"iDisplayLength":25,
					"aoColumns": [
            { "bSortable": false, "bVisible": false }, // passName (hidden)
            { "bSortable": true, "bVisible": true, "iDataSort": 0 }, // Passenger 
            { "bSortable": false, "bVisible": false }, // MissionID (hidden)
            { "bSortable": true, "bVisible": true, "iDataSort": 2 }, // Mission
            { "bSortable": false, "bVisible": false }, // pilotName (hidden)
            { "bSortable": true, "bVisible": true, "iDataSort": 4 }, // Pilot
            { "bSortable": false, "bVisible": true} // Releases 
	        ]
				});
		});
]]></script>

<xsl:choose>
	<xsl:when test=".//campName">
		<h3><xsl:value-of select=".//campName"/>
		<br/><xsl:value-of select=".//campPhone"/></h3>
	</xsl:when>
</xsl:choose>

<p><xsl:choose>
	 <xsl:when test=".//reqName!=''">
		<b>Requester:<xsl:text> </xsl:text><xsl:value-of select=".//reqName"/></b>
	   </xsl:when>
        </xsl:choose>
	<xsl:choose>
	   <xsl:when test=".//reqDayPhone!=''">
		<br/>Day:<xsl:text> </xsl:text><xsl:value-of select=".//reqDayPhone"/><xsl:text> </xsl:text><xsl:value-of select="reqDayComment"/>
	   </xsl:when>
        </xsl:choose>
	<xsl:choose>
	   <xsl:when test=".//reqEvePhone!=''">
	<br/>Eve:<xsl:text> </xsl:text><xsl:value-of select=".//reqEvePhone"/><xsl:text> </xsl:text><xsl:value-of select=".//reqEveComment"/>
	   </xsl:when>
        </xsl:choose>
	<xsl:choose>
	   <xsl:when test=".//reqMobilePhone!=''">
	<br/>Mobile:<xsl:text> </xsl:text><xsl:value-of select=".//reqMobilePhone"/><xsl:text> </xsl:text><xsl:value-of select=".//reqMobileComment"/>
	   </xsl:when>
        </xsl:choose>
	<xsl:choose>
	   <xsl:when test=".//reqPagerPhone!=''">
	<br/>Pager:<xsl:text> </xsl:text><xsl:value-of select=".//reqPagerPhone"/><xsl:text> </xsl:text><xsl:value-of select=".//reqPagerComment"/>
	   </xsl:when>
        </xsl:choose>
	<xsl:choose>
	   <xsl:when test=".//reqOtherPhone!=''">
	<br/>Other:<xsl:text> </xsl:text><xsl:value-of select=".//reqOtherPhone"/><xsl:text> </xsl:text><xsl:value-of select=".//reqOtherComment"/>
	   </xsl:when>
        </xsl:choose>
	<xsl:choose>
	   <xsl:when test=".//reqFaxPhone!=''">
		<br/>Fax:<xsl:text> </xsl:text><xsl:value-of select=".//reqFaxPhone"/><xsl:text> </xsl:text><xsl:value-of select=".//reqFaxComment"/>
	   </xsl:when>
  </xsl:choose>
</p>

<div id="demo" style="width:760px">
<table cellpadding="0" cellspacing="0" border="0" class="display" id="reportData" style="width:760px">
 <thead>
	<tr>
		<th align="left"><b>Pass Name (hidden)</b></th>
		<th align="left"><b>Passenger</b></th>
		<th align="left"><b>Mission (hidden)</b></th>
		<th align="left"><b>Mission</b></th>
		<th align="left"><b>Pilot Name (hidden)</b></th>
		<th align="left"><b>Pilot</b></th>
		<th align="left"><b>Releases</b></th>
	</tr>
	</thead>
	<tbody>
	<xsl:for-each select=".//record">
    <tr>
		<td><xsl:value-of select="passLastName"/></td> <!-- sorting col -->
		<td width="175" align="left" valign="top">
			<b><xsl:value-of select="passName"/></b>
			<br/>Weight:<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text><xsl:value-of select="weight"/> lbs
			<br/>DOB/Age:<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text><xsl:value-of select="passDOB"/><xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text>(<xsl:value-of select="passAge"/>)
			<xsl:if test="passDayPhone!=''">
				<br/>Day:<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text><xsl:value-of select="passDayPhone"/>
			</xsl:if>
			<xsl:if test="passEvePhone!=''">
				<br/>Eve:<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text><xsl:value-of select="passEvePhone"/>
			</xsl:if>
			<xsl:if test="passPagerPhone!=''">
				<br/>Pager:<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text><xsl:value-of select="passPagerPhone"/>
			</xsl:if>
			<xsl:if test="passMobilePhone!=''">
				<br/>Cell:<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text><xsl:value-of select="passMobilePhone"/>
			</xsl:if>
			<xsl:if test="passOtherPhone!=''">
				<br/>Other:<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text><xsl:value-of select="passOtherPhone"/>
			</xsl:if>
			<xsl:if test="passFaxPhone!=''">
				<br/>Fax:<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text><xsl:value-of select="passFaxPhone"/>
			</xsl:if>
			<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text>
		</td>
		<td><xsl:value-of select="missionDate"/></td> <!-- sorting col -->
		<td width="125" align="left" valign="top">
			<b>Mission#:<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text><xsl:value-of select="missionID"/></b>
			<br/>Date:<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text><xsl:value-of select="missionDate"/>
			<br/>From:<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text><xsl:value-of select="fromAirportIdent"/>
			<br/>To:<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text><xsl:value-of select="toAirportIdent"/>
			<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text>
		</td>
		<td><xsl:value-of select="pilotLastName"/></td> <!-- sorting col -->
		<td width="200" align="left" valign="top">
			<b><xsl:value-of select="pilotName"/></b>
			<xsl:if test="pilotDayPhone!=''">
				<br/>Day:<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text><xsl:value-of select="pilotDayPhone"/>
			</xsl:if>
			<xsl:if test="pilotEvePhone!=''">
				<br/>Eve:<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text><xsl:value-of select="pilotEvePhone"/>
			</xsl:if>
			<xsl:if test="pilotPagerPhone!=''">
				<br/>Pager:<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text><xsl:value-of select="pilotPagerPhone"/>
			</xsl:if>
			<xsl:if test="pilotMobilePhone!=''">
				<br/>Cell:<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text><xsl:value-of select="pilotMobilePhone"/>
			</xsl:if>
			<xsl:if test="pilotOtherPhone!=''">
				<br/>Other:<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text><xsl:value-of select="pilotOtherPhone"/>
			</xsl:if>
			<xsl:if test="pilotFaxPhone!=''">
				<br/>Fax:<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text><xsl:value-of select="pilotFaxPhone"/>
			</xsl:if>
			<xsl:if test="pilotEmail!=''">
				<br/>Email:<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text><xsl:value-of select="pilotEmail"/>
			</xsl:if>
			<xsl:if test="pilotName!=''">
				<br/>IFR:<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text>
				<xsl:if test="ifr='1'">Yes</xsl:if>
			</xsl:if>
			<xsl:if test="privateCNote!=''">
				<br/><xsl:value-of select="privateCNote"/>
			</xsl:if>
			<xsl:if test="homeBase!=''">
				<br/>Home Base:<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text><xsl:value-of select="homeBase"/>
			</xsl:if>
			<xsl:if test="make!=''">
				<br/>(<xsl:value-of select="make"/><xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text><xsl:value-of select="model"/><xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text><xsl:value-of select="nnumber"/>)
			</xsl:if>
			<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text>
		</td>
		<td width="150" align="left" valign="top">
			Release:<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text><xsl:value-of select="medicalReleaseReceived"/>
			<br/>Waiver:<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text><xsl:value-of select="waiverReceived"/>
			<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text>
		</td>
   </tr>
	</xsl:for-each>
	</tbody>
	</table>
</div>
</xsl:template>
</xsl:stylesheet>
