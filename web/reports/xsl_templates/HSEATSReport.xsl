<xsl:stylesheet version="1.0" 
xmlns:xsl="http://www.w3.org/1999/XSL/Transform"
 xmlns:s='uuid:BDC6E3F0-6DA3-11d1-A2A3-00AA00C14882'
	xmlns:dt='uuid:C2F41010-65B3-11d1-A29F-00AA00C14882'
	xmlns:rs='urn:schemas-microsoft-com:rowset'
	xmlns:z='#RowsetSchema'>
<xsl:output method="html" />
<xsl:strip-space elements="*"/>

<xsl:template match="/">
<xsl:apply-templates select="//rs:data" />
</xsl:template>

<xsl:template match="rs:data">
<table width="650" cellpadding="0" cellspacing="0" border="0"><tr><td>
<p><table border="1" cellpadding="2" width="650" cellspacing="0">
      <tr>
        <td width="125" valign="top" align="left"><font face="verdana" size="1"><strong>Mission Number</strong></font></td>
        <td width="125" valign="top" align="left"><font face="verdana" size="1"><strong>Mission Date</strong></font></td>
        <td width="150" valign="top" align="left"><font face="verdana" size="1"><strong>Agency</strong></font></td>
        <td width="125" valign="top" align="left"><font face="verdana" size="1"><strong>Origin</strong></font></td>
        <td width="125" valign="top" align="left"><font face="verdana" size="1"><strong>Destination</strong></font></td>
      </tr>
      <tr>
        <td width="125" valign="top" align="left"><font face="verdana" size="1"><strong><xsl:value-of select=".//@externalID"/><xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text>(AFW)</strong></font></td>
        <td width="125" valign="top" align="left"><font face="verdana" size="1"><strong><xsl:value-of select=".//@missionDate"/><xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text></strong></font></td>
        <td width="150" valign="top" align="left"><font face="verdana" size="1"><strong><xsl:value-of select=".//@agencyName"/><xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text></strong></font></td>
        <td width="125" valign="top" align="left"><font face="verdana" size="1"><strong><xsl:value-of select=".//@missionOrigin"/><xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text></strong></font></td>
        <td width="125" valign="top" align="left"><font face="verdana" size="1"><strong><xsl:value-of select=".//@missionDestination"/><xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text></strong></font></td>
      </tr>
</table>
<table border="1" cellpadding="2" width="650" cellspacing="0">
      <tr>
        <td width="150" valign="top" align="left"><font face="verdana" size="1"><strong>Mission Type</strong><xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text></font></td>
        <td width="175" valign="top" align="left"><font face="verdana" size="1"><xsl:value-of select=".//@passengerType"/><xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text></font></td>
        <td width="150" valign="top" align="left"><font face="verdana" size="1"><strong># Companions/Weight</strong><xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text></font></td>
        <td width="175" valign="top" align="left"><font face="verdana" size="1"><xsl:value-of select=".//@CompanionCount"/>/<xsl:value-of select=".//@CompanionTotalWeight"/><xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text></font></td>
      </tr>
      <tr>
        <td width="150" valign="top" align="left"><font face="verdana" size="1"><strong>Passenger Weight</strong></font></td>
        <td width="175" valign="top" align="left"><font face="verdana" size="1"><xsl:value-of select=".//@passWeight"/><xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text></font></td>
        <td width="150" valign="top" align="left"><font face="verdana" size="1"><strong>Baggage Weight</strong></font></td>
        <td width="175" valign="top" align="left"><font face="verdana" size="1"><xsl:value-of select=".//@baggageWeight"/><xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text></font></td>
      </tr>
</table>

<table border="1" cellpadding="2" width="650" cellspacing="0">
      <tr>
        <td width="100" valign="top" align="left"><font face="verdana" size="1"><strong>Agency POC</strong></font></td>
        <td width="275" valign="top" align="left"><font face="verdana" size="1"><xsl:value-of select=".//@requesterName"/><xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text></font></td>
        <td width="275" valign="top" align="left"><font face="verdana" size="1"><xsl:value-of select=".//@agencyPhone"/><xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text></font></td>
      </tr>
</table>

<table border="1" cellpadding="2" width="650" cellspacing="0">
      <tr>
        <td width="100" valign="top" align="left"><font face="verdana" size="1"><strong>Comments</strong></font></td>
        <td width="550" valign="top" align="left"><font face="verdana" size="1"><xsl:value-of select=".//@publicCNote"/><xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text></font></td>
      </tr>
</table>
</p>

<p><font face="verdana" size="2"><strong>Mission Legs</strong></font></p>

<p><table border="1" cellpadding="2" width="650" cellspacing="0">
      <tr>
        <td width="50" valign="top" align="left"><font face="verdana" size="1"><b>Org</b></font></td>
        <td width="150" valign="top" align="center"><font face="verdana" size="1"><b>Pilot Name</b></font></td>
        <td width="150" valign="top" align="center"><font face="verdana" size="1"><b>Aircraft</b></font></td>
        <td width="150" valign="top" align="center"><font face="verdana" size="1"><b>Origin</b></font></td>
        <td width="150" valign="top" align="center"><font face="verdana" size="1"><b>Destination</b></font></td>
      </tr>
	<xsl:for-each select="z:row">
      	   <tr>
             <td width="50" valign="top" align="left"><font face="verdana" size="1">
		<xsl:if test="not(@afaOrgID)">AFW</xsl:if>
		<xsl:if test="@afaOrgID=1">AFSC</xsl:if>
		<xsl:if test="@afaOrgID=2">AFC</xsl:if>
		<xsl:if test="@afaOrgID=3">AFW</xsl:if>
		<xsl:if test="@afaOrgID=4">AFNE</xsl:if>
		<xsl:if test="@afaOrgID=5">AFOK</xsl:if>
		<xsl:if test="@afaOrgID=6">AFMA</xsl:if>
		<xsl:if test="@afaOrgID=7">AFSE</xsl:if>
	        <xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text>
	     </font></td>
             <td width="150" valign="top" align="center"><font face="verdana" size="1">
		<xsl:choose>
		<xsl:when test="@afaOrgID">
		  <xsl:value-of select="@afaPilotName"/>
		  <xsl:choose>
		    <xsl:when test="@afaPilotDayPhone"><br/><xsl:value-of select="@afaPilotDayPhone"/><xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text>(d)</xsl:when>
		  </xsl:choose>
		  <xsl:choose>
		    <xsl:when test="@afaPilotEvePhone"><br/><xsl:value-of select="@afaPilotEvePhone"/><xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text>(e)</xsl:when>
		  </xsl:choose>
		  <xsl:choose>
		    <xsl:when test="@afaPilotMobilePhone"><br/><xsl:value-of select="@afaPilotMobilePhone"/><xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text>(c)</xsl:when>
		  </xsl:choose>
		</xsl:when>
		<xsl:otherwise>
		  <xsl:value-of select="@pilotName"/>
		  <xsl:choose>
		    <xsl:when test="@pilotDayPhone"><br/><xsl:value-of select="@pilotDayPhone"/><xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text>(d)</xsl:when>
		  </xsl:choose>
		  <xsl:choose>
		    <xsl:when test="@pilotEvePhone"><br/><xsl:value-of select="@pilotEvePhone"/><xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text>(e)</xsl:when>
		  </xsl:choose>
		  <xsl:choose>
		    <xsl:when test="@pilotMobilePhone"><br/><xsl:value-of select="@pilotMobilePhone"/><xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text>(c)</xsl:when>
		  </xsl:choose>
		</xsl:otherwise>
		</xsl:choose>
		<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text></font></td>
             <td width="150" valign="top" align="center"><font face="verdana" size="1">
		<xsl:choose>
		<xsl:when test="@afaOrgID">
  		   <xsl:value-of select="@afaMake"/>/<xsl:value-of select="@afaModel"/>
		</xsl:when>
		<xsl:otherwise>
  		   <xsl:value-of select="@aircraftMake"/>/<xsl:value-of select="@aircraftModel"/>
		</xsl:otherwise>
		</xsl:choose>
		<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text>
		</font></td>
             <td width="150" valign="top" align="center"><font face="verdana" size="1"><xsl:value-of select="@originIdent"/>
		<br/><xsl:value-of select="@originCity"/>,<xsl:value-of select="@originState"/>
		<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text></font></td>
             <td width="150" valign="top" align="center"><font face="verdana" size="1"><xsl:value-of select="@destIdent"/>
		<br/><xsl:value-of select="@destCity"/>,<xsl:value-of select="@destState"/>
		<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text></font></td>
           </tr>
	</xsl:for-each>	
    </table></p>
</td></tr></table>
</xsl:template>
</xsl:stylesheet>
