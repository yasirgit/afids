<xsl:stylesheet version="1.0" 
	xmlns:xsl="http://www.w3.org/1999/XSL/Transform"
	xmlns:s='uuid:BDC6E3F0-6DA3-11d1-A2A3-00AA00C14882'
	xmlns:dt='uuid:C2F41010-65B3-11d1-A29F-00AA00C14882'
	xmlns:rs='urn:schemas-microsoft-com:rowset'
	xmlns:z='#RowsetSchema'>
<xsl:include href="../../includes/settings.xsl"/>
<xsl:output method="html"/>
<xsl:strip-space elements="*"/>

<xsl:template match="/">
<html>
<head>
<title><xsl:value-of select="$organizationName"/> Mission Coordination</title>
</head>
<body>
<table border="0" cellpadding="2" width="650" cellspacing="0">
<tr>
   <td width="150"><img src="{$organizationAFIDSHomePage}/graphics/AFWwing_120.gif" width="120" height="55" alt="AFWest"/></td>
   <td width="549"><h3><xsl:value-of select="$organizationName"/><br/>Mission Coordination Email</h3></td>
</tr>
</table>
<p>The following is a coordination list for the missions available. The list contains the names of Command Pilots who have not flown a mission who are based at either the origin or destination airport.</p>
<xsl:apply-templates select="//rs:data" mode="missioncount" />

</body>
</html>
</xsl:template>

<xsl:template match="rs:data" mode="missioncount">
<div align="left">
<table border="0" cellpadding="0" width="650" cellspacing="0">
	<tr>
		<td>
		<p><table border="1" cellpadding="2" width="650" cellspacing="0">
			<xsl:for-each select="z:row">
			<xsl:choose>
		     	<xsl:when test="not(preceding-sibling::node()[@memberID = current()/@memberID])">
			      <tr bgcolor="lightblue">
			        <td width="140" colspan="2" valign="top" align="left"><small><xsl:value-of select="@firstName"/><xsl:text> </xsl:text><xsl:value-of select="@lastName"/></small></td>
			        <td width="310" colspan="2" valign="top" align="left"><small>Day: <xsl:value-of select="@dayPhone"/><xsl:text>/Eve: </xsl:text><xsl:value-of select="@evePhone"/>
		        	<br/><xsl:value-of select="@email"/></small></td>
			        <td width="200" colspan="3" valign="top" align="left"><small><xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text></small></td>
		      </tr>
		      <tr>
		        <td width="50" valign="top" align="left"><small>
		        	<a>
		        	<xsl:attribute name="href">
			        	<xsl:call-template name="make-xref"/>
		        	</xsl:attribute>
		        	<xsl:value-of select="@externalID"/>
		        	</a>
		        </small></td>
		        <td width="90" valign="top" align="left"><small><xsl:value-of select="@missionDate"/></small></td>
		        <td width="155" valign="top" align="left"><small><xsl:value-of select="@originID"/> (<xsl:value-of select="@originCity"/>, <xsl:value-of select="@originState"/>)</small></td>
		        <td width="155" valign="top" align="left"><small><xsl:value-of select="@destinationID"/> (<xsl:value-of select="@destinationCity"/>, <xsl:value-of select="@destinationState"/>)</small></td>
		        <td width="100" valign="top" align="left"><small><xsl:value-of select="@flightTime"/></small></td>
		        <td width="100" colspan="2" valign="top" align="right"><small>
				<xsl:choose>
			     	<xsl:when test="number(@distance) div number(@fastestAircraft) &gt; 2">
					<font color="red">Dist: <xsl:value-of select="@distance"/></font>
				</xsl:when>
				<xsl:otherwise>
					<font color="green">Dist: <xsl:value-of select="@distance"/></font>
				</xsl:otherwise>
				</xsl:choose>
				<xsl:text> </xsl:text>
				<xsl:choose>
			     	<xsl:when test="number(@seatsAircraft) &lt; number(@passCount)">
					<font color="red">#Pass: <xsl:value-of select="@passCount"/></font>
				</xsl:when>
				<xsl:otherwise>
					<font color="green">#Pass: <xsl:value-of select="@passCount"/></font>
				</xsl:otherwise>
				</xsl:choose>
				<xsl:text> </xsl:text>
				<xsl:choose>
			     	<xsl:when test="number(@seatsAircraft) &lt; number(@passCount)">
					<font color="red">Range: <xsl:value-of select="@bestRangeAircraft"/></font>
				</xsl:when>
				<xsl:otherwise>
					<font color="green">Range: <xsl:value-of select="@bestRangeAircraft"/></font>
				</xsl:otherwise>
				</xsl:choose>
			</small></td>
		      </tr>
			</xsl:when>
			<xsl:otherwise>
		      <tr>
		        <td width="50" valign="top" align="left"><small>
		        	<a>
		        	<xsl:attribute name="href">
			        	<xsl:call-template name="make-xref"/>
		        	</xsl:attribute>
		        	<xsl:value-of select="@externalID"/>
		        	</a>
		        </small></td>
		        <td width="90" valign="top" align="left"><small><xsl:value-of select="@missionDate"/></small></td>
		        <td width="155" valign="top" align="left"><small><xsl:value-of select="@originID"/> (<xsl:value-of select="@originCity"/>, <xsl:value-of select="@originState"/>)</small></td>
		        <td width="155" valign="top" align="left"><small><xsl:value-of select="@destinationID"/> (<xsl:value-of select="@destinationCity"/>, <xsl:value-of select="@destinationState"/>)</small></td>
		        <td width="100" valign="top" align="left"><small><xsl:value-of select="@flightTime"/></small></td>
		        <td width="100" colspan="2" valign="top" align="right"><small>
				<xsl:choose>
			     	<xsl:when test="number(@distance) div number(@fastestAircraft) &gt; 2">
					<font color="red">Dist: <xsl:value-of select="@distance"/></font>
				</xsl:when>
				<xsl:otherwise>
					<font color="green">Dist: <xsl:value-of select="@distance"/></font>
				</xsl:otherwise>
				</xsl:choose>
				<xsl:text> </xsl:text>
				<xsl:choose>
			     	<xsl:when test="number(@seatsAircraft) &lt; number(@passCount)">
					<font color="red">#Pass: <xsl:value-of select="@passCount"/></font>
				</xsl:when>
				<xsl:otherwise>
					<font color="green">#Pass: <xsl:value-of select="@passCount"/></font>
				</xsl:otherwise>
				</xsl:choose>
				<xsl:text> </xsl:text>
				<xsl:choose>
			     	<xsl:when test="number(@seatsAircraft) &lt; number(@passCount)">
					<font color="red">Range: <xsl:value-of select="@bestRangeAircraft"/></font>
				</xsl:when>
				<xsl:otherwise>
					<font color="green">Range: <xsl:value-of select="@bestRangeAircraft"/></font>
				</xsl:otherwise>
				</xsl:choose>
			</small></td>
		      </tr>
			</xsl:otherwise>
		     </xsl:choose>
			</xsl:for-each>	
		    </table></p>
		<p>To see the detail of a mission on the web site and/or request a mission, click on the mission number. For the most up-to-date listing, please visit the <xsl:value-of select="$organizationName"/> Web Site.</p>
		</td>
	</tr>
</table>
</div>
</xsl:template>

<xsl:template match="rs:data" mode="wing">
<div align="left">
<table border="0" cellpadding="0" width="650" cellspacing="0">
	<tr>
		<td>
		<xsl:choose>
			<xsl:when test=".//z:row[(@originWingID=@memberWingID) or (@destinationWingID=@memberWingID)]">
			<p><table border="1" cellpadding="2" width="650" cellspacing="0">
		      <tr>
		        <td width="50" valign="top" align="left"><strong><small>Miss#</small></strong></td>
		        <td width="90" valign="top" align="left"><strong><small>Date</small></strong></td>
		        <td width="155" valign="top" align="left"><strong><small>Origin</small></strong></td>
		        <td width="155" valign="top" align="left"><strong><small>Destination</small></strong></td>
		        <td width="100" valign="top" align="left"><strong><small>Time</small></strong></td>
		        <td width="50" valign="top" align="right"><strong><small>#Pass/Tot Wgt</small></strong></td>
		        <td width="50" valign="top" align="right"><strong><small>Distance</small></strong></td>
		      </tr>
			<xsl:for-each select=".//z:row[(@originWingID=@memberWingID) or (@destinationWingID=@memberWingID)]">
		      <tr>
		        <td width="50" valign="top" align="left"><small>
		        	<a>
		        	<xsl:attribute name="href">
			        	<xsl:call-template name="make-xref"/>
		        	</xsl:attribute>
		        	<xsl:value-of select="@externalID"/>
		        	</a>
		        </small></td>
		        <td width="90" valign="top" align="left"><small><xsl:value-of select="@missionDate"/></small></td>
		        <td width="155" valign="top" align="left"><small><xsl:value-of select="@originID"/> (<xsl:value-of select="@originCity"/>, <xsl:value-of select="@originState"/>)</small></td>
		        <td width="155" valign="top" align="left"><small><xsl:value-of select="@destinationID"/> (<xsl:value-of select="@destinationCity"/>, <xsl:value-of select="@destinationState"/>)</small></td>
		        <td width="100" valign="top" align="left"><small><xsl:value-of select="@flightTime"/></small></td>
		        <td width="50" valign="top" align="right"><small><xsl:value-of select="@passCount"/><br/><xsl:value-of select="@totalMissionWeight"/></small></td>
		        <td width="50" valign="top" align="right"><small><xsl:value-of select="@distance"/></small></td>
		      </tr>
			</xsl:for-each>	
		    </table></p>
			<p>To see the detail of a mission on the web site and/or request a mission, click on the mission number. For the most up-to-date listing, please visit the <xsl:value-of select="$organizationName"/> Web Site.</p>
		    </xsl:when>
		    <xsl:otherwise>
			<p><b><i>There are no missions currently available in your wing.</i></b></p>
		    </xsl:otherwise>
		</xsl:choose>
		</td>
	</tr>
</table>
</div>
</xsl:template>

<xsl:template match="rs:data" mode="all">
<div align="left">
<table border="0" cellpadding="0" width="650" cellspacing="0">
	<tr>
		<td>
			<p><table border="1" cellpadding="2" width="650" cellspacing="0">
		      <tr>
		        <td width="50" valign="top" align="left"><strong><small>Miss#</small></strong></td>
		        <td width="90" valign="top" align="left"><strong><small>Date</small></strong></td>
		        <td width="155" valign="top" align="left"><strong><small>Origin</small></strong></td>
		        <td width="155" valign="top" align="left"><strong><small>Destination</small></strong></td>
		        <td width="100" valign="top" align="left"><strong><small>Time</small></strong></td>
		        <td width="50" valign="top" align="right"><strong><small>#Pass/Tot Wgt</small></strong></td>
		        <td width="50" valign="top" align="right"><strong><small>Distance</small></strong></td>
		      </tr>
			<xsl:for-each select=".//z:row">
		      <tr>
		        <td width="50" valign="top" align="left"><small>
		        	<a>
		        	<xsl:attribute name="href">
			        	<xsl:call-template name="make-xref"/>
		        	</xsl:attribute>
		        	<xsl:value-of select="@externalID"/>
		        	</a>
		        </small></td>
		        <td width="90" valign="top" align="left"><small><xsl:value-of select="@missionDate"/></small></td>
		        <td width="155" valign="top" align="left"><small><xsl:value-of select="@originID"/> (<xsl:value-of select="@originCity"/>, <xsl:value-of select="@originState"/>)</small></td>
		        <td width="155" valign="top" align="left"><small><xsl:value-of select="@destinationID"/> (<xsl:value-of select="@destinationCity"/>, <xsl:value-of select="@destinationState"/>)</small></td>
		        <td width="100" valign="top" align="left"><small><xsl:value-of select="@flightTime"/></small></td>
		        <td width="50" valign="top" align="right"><small><xsl:value-of select="@passCount"/><br/><xsl:value-of select="@totalMissionWeight"/></small></td>
		        <td width="50" valign="top" align="right"><small><xsl:value-of select="@distance"/></small></td>
		      </tr>
			</xsl:for-each>
		    </table></p>
		</td>
	</tr>
</table>
<p>To request a mission, click on the mission number above or go to the <a href="{$organizationAFIDSHomePage}"><xsl:value-of select="$organizationName"/> Web Site</a>. Do not reply to this email.</p>
<p>You are receiving this email because you subscribed. To unsubscribe to this mailing,
     	<a>
       	<xsl:attribute name="href">
        	<xsl:call-template name="make-link-unsub"/>
       	</xsl:attribute>
Click Here</a>.
<br/>To switch to text-only format for this and all future emails from <xsl:value-of select="$organizationName"/>, 
     	<a>
       	<xsl:attribute name="href">
        	<xsl:call-template name="make-link-text"/>
       	</xsl:attribute>
Click Here</a>.</p>
<p><small>Copyright 2003, Angel Flight West. All Rights Reserved.</small></p>
</div>
</xsl:template>

<xsl:template name="make-xref">
	<xsl:value-of select="concat('mission_availability_check.asp?id=',@legID)"/>
</xsl:template>
<xsl:template name="make-link-unsub">
	<xsl:value-of select="concat('email_list_maintain.asp?action=unsub','&amp;','list=1')"/>
</xsl:template>
<xsl:template name="make-link-text">
	<xsl:value-of select="concat('email_list_maintain.asp?action=','textonly')"/>
</xsl:template>

</xsl:stylesheet>
