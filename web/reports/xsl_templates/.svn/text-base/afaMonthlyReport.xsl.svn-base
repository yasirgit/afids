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
<h2 align="center">Air Charity Network<xsl:text disable-output-escaping="yes">&amp;trade;</xsl:text></h2>

<h3 align="center">Monthly Mission and Pilot Data Reporting Form</h3>

<h3 align="center">For the Period From:<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text><xsl:value-of select=".//@startDate"/><xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text>to<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text><xsl:value-of select=".//@endDate"/></h3>

<p>For (please place an "X" in the respective blank space for the reporting organization):</p>

<p>AFC:____ AFMA:____ AFNE:____ AFSC:____ AFSE:____ AFW:_X_ MMA:_____</p>

<p>Completed by: <b>Cheri Cimmarrusti</b><xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text><xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text><xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text><xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text><xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text><xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text><xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text><xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text>Date: <b><xsl:value-of select=".//@reportDate"/></b></p>

<p align="center"><b>Mission Information</b></p>
<p>Mission Legs Coordinated: <b><xsl:value-of select=".//@missionsCoordinated"/></b></p>
<p>Mission Legs Flown: <b><xsl:value-of select=".//@missionsFlown"/></b></p>
<p>Of the Mission Legs Flown:</p>
<p>How Many Were for Children (defined as 18 or under): <b><xsl:value-of select=".//@childrenFlown"/></b></p>
<p>Note: The definition of a "Mission Leg" remains the same as used in prior years.</p>

<p><table border="1" cellpadding="2" width="500" cellspacing="0">
      <tr>
        <td width="200" valign="top" align="left"><strong><small>Illness Category</small></strong></td>
        <td width="150" valign="top" align="center"><strong><small>Unique Passengers Served</small></strong></td>
        <td width="150" valign="top" align="center"><strong><small>Total Mission Legs</small></strong></td>
      </tr>
	<xsl:for-each select="z:row">
      <tr>
        <td width="200" valign="top" align="left"><small><xsl:value-of select="@categoryDescription"/></small></td>
        <td width="150" valign="top" align="center">
		<small><xsl:value-of select="@uniquePassengers"/></small>
	</td>
        <td width="150" valign="top" align="center">
		<small><xsl:value-of select="@missionLegs"/></small>
	</td>
      </tr>
	</xsl:for-each>	
    </table></p>

<p align="center"><b>Pilot Information</b></p>
<p>New Pilots Added to the Roster this period: <b><xsl:value-of select=".//@newPilots"/></b></p>
<p>Total Pilots on Your Roster on <xsl:value-of select=".//@reportDate"/>: <b><xsl:value-of select=".//@allPilots"/></b>. (does not include non-pilots)</p>
</td></tr></table>
</xsl:template>
</xsl:stylesheet>
