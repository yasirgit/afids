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
	<p><table border="1" cellpadding="2" width="620">
	<tr>
		<td width="100" bgcolor="#1848B0" align="left"><font face="Verdana" color="#FFFFFF" size="1"><b>Mission</b></font></td>
		<td width="100" bgcolor="#1848B0" align="left"><font face="Verdana" color="#FFFFFF" size="1"><b>Date</b></font></td>
		<td width="150" bgcolor="#1848B0" align="left"><font face="Verdana" color="#FFFFFF" size="1"><b>Origin</b></font></td>
		<td width="160" bgcolor="#1848B0" align="left"><font face="Verdana" color="#FFFFFF" size="1"><b>Destination</b></font></td>
		<td width="120" bgcolor="#1848B0" align="left"><font face="Verdana" color="#FFFFFF" size="1"><b>Wing</b></font></td>
	</tr>
	<xsl:for-each select="z:row">
            <tr style='page-break-inside:avoid'>
		<td width="100" align="left" valign="top"><font face="Verdana" size="1">
			<xsl:value-of select="@externalID"/>
			<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text>
		</font></td>
		<td width="100" align="left" valign="top"><font face="Verdana" size="1">
			<xsl:value-of select="@missionDateDisplay"/>
			<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text>
		</font></td>
		<td width="150" align="left" valign="top"><font face="Verdana" size="1">
			<xsl:value-of select="@originID"/> (<xsl:value-of select="@originCity"/>, <xsl:value-of select="@originState"/>)
			<br/><xsl:value-of select="@originCounty"/>
		</font></td>
		<td width="150" align="left" valign="top"><font face="Verdana" size="1">
			<xsl:value-of select="@destID"/> (<xsl:value-of select="@destCity"/>, <xsl:value-of select="@destState"/>)
			<br/><xsl:value-of select="@destCounty"/>
		</font></td>
		<td width="120" align="left" valign="top"><font face="Verdana" size="1">
			<xsl:value-of select="@wingName"/>
			<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text>
		</font></td>
            </tr>
	</xsl:for-each>
	</table></p>
</xsl:template>
</xsl:stylesheet>
