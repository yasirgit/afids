<xsl:stylesheet version="1.0" xmlns:xsl="http://www.w3.org/1999/XSL/Transform">
<xsl:output method="html" />
<xsl:strip-space elements="*"/>

<xsl:template match="/">
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
			<xsl:for-each select=".//record">
			<xsl:choose>
		     	<xsl:when test="not(preceding-sibling::node()[externalID = current()/externalID])">
		      <tr bgcolor="lightblue">
		        <td width="50" valign="top" align="left"><small>
		        	<a>
		        	<xsl:attribute name="href">
			        	<xsl:call-template name="make-xref"/>
		        	</xsl:attribute>
		        	<xsl:value-of select="externalID"/>
		        	</a>
		        </small></td>
		        <td width="90" valign="top" align="left"><small><xsl:value-of select="missionDate"/></small></td>
		        <td width="155" valign="top" align="left"><small><xsl:value-of select="originID"/> (<xsl:value-of select="originCity"/>, <xsl:value-of select="originState"/>)</small></td>
		        <td width="155" valign="top" align="left"><small><xsl:value-of select="destinationID"/> (<xsl:value-of select="destinationCity"/>, <xsl:value-of select="destinationState"/>)</small></td>
		        <td width="100" valign="top" align="left"><small><xsl:value-of select="flightTime"/></small></td>
		        <td width="50" valign="top" align="right"><small><xsl:value-of select="passCount"/><br/><xsl:value-of select="totalMissionWeight"/></small></td>
		        <td width="50" valign="top" align="right"><small><xsl:value-of select="distance"/></small></td>
		      </tr>
			      <tr>
			        <td width="140" colspan="2" valign="top" align="left"><small><xsl:value-of select="firstName"/><xsl:text> </xsl:text><xsl:value-of select="lastName"/></small></td>
			        <td width="310" colspan="2" valign="top" align="left"><small>Day: <xsl:value-of select="dayPhone"/><xsl:text>/Eve: </xsl:text><xsl:value-of select="evePhone"/>
		        	<br/>			        	<a>
			        	<xsl:attribute name="href">
				        	<xsl:call-template name="make-email-xref"/>
			        	</xsl:attribute>
			        	<xsl:value-of select="email"/>
			        	</a>
				</small></td>
			        <td width="200" colspan="3" valign="top" align="left"><small>
				<xsl:choose>
			     	<xsl:when test="number(distance) div number(fastestAircraft) &gt; 2">
					<font color="red">Speed: <xsl:value-of select="fastestAircraft"/></font>
				</xsl:when>
				<xsl:otherwise>
					<font color="green">Speed: <xsl:value-of select="fastestAircraft"/></font>
				</xsl:otherwise>
				</xsl:choose>
				<xsl:text> </xsl:text>
				<xsl:choose>
			     	<xsl:when test="number(seatsAircraft) &lt; number(passCount)">
					<font color="red">Seats: <xsl:value-of select="seatsAircraft"/></font>
				</xsl:when>
				<xsl:otherwise>
					<font color="green">Seats: <xsl:value-of select="seatsAircraft"/></font>
				</xsl:otherwise>
				</xsl:choose>
				<xsl:text> </xsl:text>
				<xsl:choose>
			     	<xsl:when test="number(seatsAircraft) &lt; number(passCount)">
					<font color="red">Range: <xsl:value-of select="bestRangeAircraft"/></font>
				</xsl:when>
				<xsl:otherwise>
					<font color="green">Range: <xsl:value-of select="bestRangeAircraft"/></font>
				</xsl:otherwise>
				</xsl:choose>
				<br/>Missions Flown: <xsl:value-of select="missionCount"/>
				<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text></small></td>
		      </tr>
			</xsl:when>
			<xsl:otherwise>
			      <tr>
			        <td width="140" colspan="2" valign="top" align="left"><small><xsl:value-of select="firstName"/><xsl:text> </xsl:text><xsl:value-of select="lastName"/></small></td>
			        <td width="310" colspan="2" valign="top" align="left"><small>Day: <xsl:value-of select="dayPhone"/><xsl:text>/Eve: </xsl:text><xsl:value-of select="evePhone"/>
		        	<br/>
			        	<a>
			        	<xsl:attribute name="href">
				        	<xsl:call-template name="make-email-xref"/>
			        	</xsl:attribute>
			        	<xsl:value-of select="email"/>
			        	</a>
				</small></td>
			        <td width="200" colspan="3" valign="top" align="left"><small>
				<xsl:choose>
			     	<xsl:when test="number(distance) div number(fastestAircraft) &gt; 2">
					<font color="red">Speed: <xsl:value-of select="fastestAircraft"/></font>
				</xsl:when>
				<xsl:otherwise>
					<font color="green">Speed: <xsl:value-of select="fastestAircraft"/></font>
				</xsl:otherwise>
				</xsl:choose>
				<xsl:text> </xsl:text>
				<xsl:choose>
			     	<xsl:when test="number(seatsAircraft) &lt; number(passCount)">
					<font color="red">Seats: <xsl:value-of select="seatsAircraft"/></font>
				</xsl:when>
				<xsl:otherwise>
					<font color="green">Seats: <xsl:value-of select="seatsAircraft"/></font>
				</xsl:otherwise>
				</xsl:choose>
				<xsl:text> </xsl:text>
				<xsl:choose>
			     	<xsl:when test="number(seatsAircraft) &lt; number(passCount)">
					<font color="red">Range: <xsl:value-of select="bestRangeAircraft"/></font>
				</xsl:when>
				<xsl:otherwise>
					<font color="green">Range: <xsl:value-of select="bestRangeAircraft"/></font>
				</xsl:otherwise>
				</xsl:choose>
				<br/>Missions Flown: <xsl:value-of select="missionCount"/>
				<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text></small></td>
		      </tr>
			</xsl:otherwise>
		     </xsl:choose>
			</xsl:for-each>	
		    </table></p>
		</td>
	</tr>
</table>
</div>
</xsl:template>

<xsl:template name="make-xref">
	<xsl:value-of select="concat('../missionlegview.asp?id=',legID)"/>
</xsl:template>
<xsl:template name="make-email-xref">
	<xsl:value-of select="concat('mailto:',email)"/>
</xsl:template>
</xsl:stylesheet>
