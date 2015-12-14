<xsl:stylesheet version="1.0" 
	xmlns:xsl="http://www.w3.org/1999/XSL/Transform"
	xmlns:AFIDSmath='http://angelflight.org/AFIDSmath'
	xmlns:AFIDS='http://angelflight.org/AFIDS'
	extension-element-prefixes='AFIDS AFIDSmath'>
<xsl:import href="AFIDSmath.xsl"/>
<xsl:template match="afids_batch_process" mode="wing">
<div align="left">
<table border="0" cellpadding="0" width="650" cellspacing="0">
	<tr>
		<td>
		<xsl:choose>
			<xsl:when test=".//record[(originWingID=//wingID) or (destinationWingID=//wingID)]">
			<p><table border="1" cellpadding="2" width="650" cellspacing="0">
		      <tr>
			<td valign="top" align="left" width="50"><strong><small>Miss#</small></strong></td>
			<td valign="top" align="left"><strong><small>Date</small></strong></td>
			<td valign="top" align="left"><strong><small>Origin</small></strong></td>
			<td valign="top" align="left"><strong><small>Destination</small></strong></td>
			<td valign="top" align="left"><strong><small>Time</small></strong></td>
			<td valign="top" align="right" width="50"><strong><small># Pass /<br/>Tot Wgt</small></strong></td>
			<td valign="top" align="right" width="50"><strong><small>Dist /<br/>Tot Dist</small></strong></td>
			<td valign="top" align="right"><strong><small>Eff</small></strong></td>
		      </tr>
			<xsl:for-each select=".//record[(originWingID=//wingID) or (destinationWingID=//wingID)]">
		      <tr>
		        <td valign="top" align="left" bgcolor="{missionBgColor}"><small>
		        	<a href="{concat($baseURL,'mission_availability_check.asp?id=',legID)}">
		        	<xsl:value-of select="externalID"/>
		        	</a>
		        </small></td>
			<td valign="top" align="center" bgcolor="{missionBgColor}"><small><xsl:value-of select="missionDate"/><br/><xsl:value-of select="AFIDS:getDW(missionDate)"/></small></td>
		        <td valign="top" align="left" bgcolor="{missionBgColor}"><small><xsl:value-of select="originID"/> (<xsl:value-of select="originCity"/>, <xsl:value-of select="originState"/>)</small></td>
		        <td valign="top" align="left" bgcolor="{missionBgColor}"><small><xsl:value-of select="destinationID"/> (<xsl:value-of select="destinationCity"/>, <xsl:value-of select="destinationState"/>)</small></td>
			<td valign="top" align="left" bgcolor="{missionBgColor}"><small><xsl:choose><xsl:when test="flightTime"><xsl:value-of select="flightTime"/></xsl:when><xsl:otherwise><xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text></xsl:otherwise></xsl:choose></small></td>
		        <td valign="top" align="right" bgcolor="{missionBgColor}"><small><xsl:value-of select="passCount"/><br/><xsl:value-of select="totalMissionWeight"/></small></td>
			<td valign="top" align="right" bgcolor="{missionBgColor}"><small><xsl:value-of select="distance"/><br/><xsl:value-of select="round(AFIDSmath:tot_dst(number(//latitude), number(//longitude), number(destinationLat), number(destinationLong), number(originLat), number(originLong)))"/></small></td>
			<td valign="top" align="right" bgcolor="{missionBgColor}"><small><xsl:choose><xsl:when test="round(AFIDSmath:eff(number(//latitude), number(//longitude), number(destinationLat), number(destinationLong), number(originLat), number(originLong))) >= 70"><span style="color:red; font-weight:bold"><xsl:value-of select="round(AFIDSmath:eff(number(//latitude), number(//longitude), number(destinationLat), number(destinationLong), number(originLat), number(originLong)))"/>%</span></xsl:when><xsl:otherwise><xsl:value-of select="round(AFIDSmath:eff(number(//latitude), number(//longitude), number(destinationLat), number(destinationLong), number(originLat), number(originLong)))"/>%</xsl:otherwise></xsl:choose></small></td>
		      </tr>
			</xsl:for-each>	
		    </table></p>
			<!--p>To see the detail of a mission on the web site and/or request a mission, click on the mission number. For the most up-to-date listing, please visit the <xsl:value-of select="$organizationName"/> Web Site.</p-->
		    </xsl:when>
		    <xsl:otherwise>
			<p><b><i>There are no missions currently available in your <xsl:value-of select="$wingTerm"/>.</i></b></p>
		    </xsl:otherwise>
		</xsl:choose>
		</td>
	</tr>
</table>
</div>
</xsl:template>

<xsl:template match="afids_batch_process" mode="all">
<div align="left">
<table border="0" cellpadding="0" width="650" cellspacing="0">
	<tr>
		<td>
			<p><table border="1" cellpadding="2" width="650" cellspacing="0">
		      <tr>
			<td valign="top" align="left" width="50"><strong><small>Miss#</small></strong></td>
			<td valign="top" align="left"><strong><small>Date</small></strong></td>
			<td valign="top" align="left"><strong><small>Origin</small></strong></td>
			<td valign="top" align="left"><strong><small>Destination</small></strong></td>
			<td valign="top" align="left"><strong><small>Time</small></strong></td>
			<td valign="top" align="right" width="50"><strong><small># Pass /<br/>Tot Wgt</small></strong></td>
			<td valign="top" align="right" width="50"><strong><small>Dist /<br/>Tot Dist</small></strong></td>
			<td valign="top" align="right"><strong><small>Eff</small></strong></td>

		      </tr>
		      <xsl:for-each select=".//record">
		      <tr>
		        <td valign="top" align="left" bgcolor="{missionBgColor}"><small>
		        	<a href="{concat($baseURL,'mission_availability_check.asp?id=',legID)}">
		        	<xsl:value-of select="externalID"/>
		        	</a>
		        </small></td>
			<td valign="top" align="center" bgcolor="{missionBgColor}"><small><xsl:value-of select="missionDate"/><br/><xsl:value-of select="missionDate"/></small></td>
		        <td valign="top" align="left" bgcolor="{missionBgColor}"><small><xsl:value-of select="originID"/> (<xsl:value-of select="originCity"/>, <xsl:value-of select="originState"/>)</small></td>
		        <td valign="top" align="left" bgcolor="{missionBgColor}"><small><xsl:value-of select="destinationID"/> (<xsl:value-of select="destinationCity"/>, <xsl:value-of select="destinationState"/>)</small></td>
			<td valign="top" align="left" bgcolor="{missionBgColor}"><small><xsl:choose><xsl:when test="flightTime"><xsl:value-of select="flightTime"/></xsl:when><xsl:otherwise><xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text></xsl:otherwise></xsl:choose></small></td>
		        <td valign="top" align="right" bgcolor="{missionBgColor}"><small><xsl:value-of select="passCount"/><br/><xsl:value-of select="totalMissionWeight"/></small></td>
			<td valign="top" align="right" bgcolor="{missionBgColor}"><small><xsl:value-of select="distance"/><br/><xsl:value-of select="distance"/></small></td>
			<td valign="top" align="right" bgcolor="{missionBgColor}"><small></small></td>
		      </tr>
			</xsl:for-each>
		    </table></p>
		</td>
	</tr>
</table>
<br/>
<table border="0" cellpadding="0" width="650" cellspacing="0">
<tr><td>
<p>To request a mission, click on the mission number above or go to the <a href="{$baseURL}">AFIDS Web 
Site</a>. You can use the "Manage Email Subscriptions" link after logging on AFIDS to unsubscribe to this Missions 
Available distribution list. Please contact <a href="mailto:{$coordEmail}"><xsl:value-of select="$coordEmail"/></a> if you have any questions.
</p>
<p><xsl:apply-templates select="/" mode="footer_list_html"/></p>
</td></tr></table>
</div>
</xsl:template>

<xsl:template match="afids_batch_process" mode="homebase">
<div align="left">
<table border="0" cellpadding="0" width="650" cellspacing="0">
	<tr>
		<td>
		<xsl:choose>
			<xsl:when test=".//record[(originID=//ident) or (destinationID=//ident)]">
			<p><table border="1" cellpadding="2" width="650" cellspacing="0">
		      <tr>
			<td valign="top" align="left" width="50"><strong><small>Miss#</small></strong></td>
			<td valign="top" align="left"><strong><small>Date</small></strong></td>
			<td valign="top" align="left"><strong><small>Origin</small></strong></td>
			<td valign="top" align="left"><strong><small>Destination</small></strong></td>
			<td valign="top" align="left"><strong><small>Time</small></strong></td>
			<td valign="top" align="right" width="50"><strong><small># Pass /<br/>Tot Wgt</small></strong></td>
			<td valign="top" align="right" width="50"><strong><small>Dist /<br/>Tot Dist</small></strong></td>
			<td valign="top" align="right"><strong><small>Eff</small></strong></td>
		      </tr>
			<xsl:for-each select=".//record[(originID=//ident) or (destinationID=//ident)]">
		      <tr>
		        <td valign="top" align="left" bgcolor="{missionBgColor}"><small>
		        	<a href="{concat($baseURL,'mission_availability_check.asp?id=',legID)}">
		        	<xsl:value-of select="externalID"/>
		        	</a>
		        </small></td>
			<td valign="top" align="center" bgcolor="{missionBgColor}"><small><xsl:value-of select="missionDate"/><br/><xsl:value-of select="AFIDS:getDW(missionDate)"/></small></td>
		        <td valign="top" align="left" bgcolor="{missionBgColor}"><small><xsl:value-of select="originID"/> (<xsl:value-of select="originCity"/>, <xsl:value-of select="originState"/>)</small></td>
		        <td valign="top" align="left" bgcolor="{missionBgColor}"><small><xsl:value-of select="destinationID"/> (<xsl:value-of select="destinationCity"/>, <xsl:value-of select="destinationState"/>)</small></td>
			<td valign="top" align="left" bgcolor="{missionBgColor}"><small><xsl:choose><xsl:when test="flightTime"><xsl:value-of select="flightTime"/></xsl:when><xsl:otherwise><xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text></xsl:otherwise></xsl:choose></small></td>
		        <td valign="top" align="right" bgcolor="{missionBgColor}"><small><xsl:value-of select="passCount"/><br/><xsl:value-of select="totalMissionWeight"/></small></td>
			<td valign="top" align="right" bgcolor="{missionBgColor}"><small><xsl:value-of select="distance"/><br/><xsl:value-of select="round(AFIDSmath:tot_dst(number(//latitude), number(//longitude), number(destinationLat), number(destinationLong), number(originLat), number(originLong)))"/></small></td>
			<td valign="top" align="right" bgcolor="{missionBgColor}"><small><xsl:choose><xsl:when test="round(AFIDSmath:eff(number(//latitude), number(//longitude), number(destinationLat), number(destinationLong), number(originLat), number(originLong))) >= 70"><span style="color:red; font-weight:bold"><xsl:value-of select="round(AFIDSmath:eff(number(//latitude), number(//longitude), number(destinationLat), number(destinationLong), number(originLat), number(originLong)))"/>%</span></xsl:when><xsl:otherwise><xsl:value-of select="round(AFIDSmath:eff(number(//latitude), number(//longitude), number(destinationLat), number(destinationLong), number(originLat), number(originLong)))"/>%</xsl:otherwise></xsl:choose></small></td>
		      </tr>
			</xsl:for-each>	
		    </table></p>
			<!--p>To see the detail of a mission on the web site and/or request a mission, click on the mission number. For the most up-to-date listing, please visit the <xsl:value-of select="$organizationName"/> Web Site.</p-->
		    </xsl:when>
		    <xsl:otherwise>
			<p><b><i>There are no missions currently available at your home base airport.</i></b></p>
		    </xsl:otherwise>
		</xsl:choose>
		</td>
	</tr>
</table>
</div>
</xsl:template>

<xsl:template match="afids_batch_process" mode="homebase_text">
		<xsl:choose>
			<xsl:when test=".//record[(originID=//memberHomeBase[1]) or (destinationID=//memberHomeBase[1])]">
				<xsl:for-each select=".//record[(originID=//memberHomeBase[1]) or (destinationID=//memberHomeBase[1])]">
<xsl:value-of select="missionDate"/> from <xsl:value-of select="originID"/> to <xsl:value-of select="destinationID"/> (<xsl:value-of select="externalID"/>)
  <xsl:if test='flightTime'>Time: <xsl:value-of select="flightTime"/>, </xsl:if><xsl:value-of select="passCount"/> passenger(s), <xsl:value-of select="totalMissionWeight"/>lbs total weight, <xsl:value-of select="distance"/> nm
		    </xsl:for-each>	
		  </xsl:when>
		  <xsl:otherwise>
* There are no missions currently available at your home base airport.
		  </xsl:otherwise>
		</xsl:choose>
</xsl:template>

<xsl:template match="afids_batch_process" mode="wing_text">
		<xsl:choose>
			<xsl:when test=".//record[(originWingID=//memberWingID[1]) or (destinationWingID=//memberWingID[1])]">
			<xsl:for-each select=".//record[(originWingID=//memberWingID[1]) or (destinationWingID=//memberWingID[1])]">
<xsl:value-of select="missionDate"/> from <xsl:value-of select="originID"/> to <xsl:value-of select="destinationID"/> (<xsl:value-of select="externalID"/>)
  <xsl:if test='flightTime'>Time: <xsl:value-of select="flightTime"/>, </xsl:if><xsl:value-of select="passCount"/> passenger(s), <xsl:value-of select="totalMissionWeight"/>lbs total weight, <xsl:value-of select="distance"/> nm
			</xsl:for-each>	
		    </xsl:when>
		    <xsl:otherwise>
* There are no missions currently available in your zone.
		    </xsl:otherwise>
		</xsl:choose>
</xsl:template>

<xsl:template match="afids_batch_process" mode="all_text">
<xsl:for-each select=".//record">
<xsl:value-of select="missionDate"/> from <xsl:value-of select="originID"/> to <xsl:value-of select="destinationID"/> (<xsl:value-of select="externalID"/>)
  <xsl:if test='flightTime'>Time: <xsl:value-of select="flightTime"/>, </xsl:if><xsl:value-of select="passCount"/> passenger(s), <xsl:value-of select="totalMissionWeight"/>lbs total weight, <xsl:value-of select="distance"/> nm
</xsl:for-each>

To request a mission, go to the AFIDS Web Site (<xsl:value-of select="$baseURL"/>). Please contact <xsl:value-of select="$coordEmail"/> if you have any questions.
<xsl:apply-templates select="/" mode="footer_list_text"/>
</xsl:template>

</xsl:stylesheet>
