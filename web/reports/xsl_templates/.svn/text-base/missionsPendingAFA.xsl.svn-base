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
	<td bgcolor="#1848B0" align="left" width="75"><font face="verdana" size="1" 
color="#FFFFFF">Date</font></td>
	<td bgcolor="#1848B0" align="left" width="75"><font face="verdana" size="1" 
color="#FFFFFF">Mission#</font></td>
	<td bgcolor="#1848B0" align="left" width="180"><font face="verdana" size="1" 
color="#FFFFFF">Passenger</font></td>
	<td bgcolor="#1848B0" align="left" width="120"><font face="verdana" size="1" 
color="#FFFFFF">From-To</font></td>
	<td bgcolor="#1848B0" align="left" width="150"><font face="verdana" size="1" 
color="#FFFFFF">Pilot</font></td>
	</tr>


	<xsl:for-each select="z:row">
            <tr style='page-break-inside:avoid'>
		<td width="75" align="left" valign="top"><font face="Verdana" size="1">
			<xsl:value-of select="@missionDateDisplay"/>
		<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text></font></td>
		<td width="75" align="left" valign="top"><font face="Verdana" size="1">
			<br/><xsl:value-of select="@externalID"/>-<xsl:value-of select="@legNumber"/>
			<xsl:value-of select="@afaOrgName"/>
		<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text></font></td>
		<td width="180" align="left" valign="top"><font face="Verdana" size="1">
			<b><xsl:value-of select="@passengerName"/></b>
			<br/>Weight:<xsl:value-of select="@weight"/> lbs
			<xsl:choose>
			   <xsl:when test="@passDayPhone">
				<br/>Day: <xsl:value-of select="@passDayPhone"/>
			   </xsl:when>
		        </xsl:choose>
			<xsl:choose>
			   <xsl:when test="@passEvePhone">
				<br/>Eve: <xsl:value-of select="@passEvePhone"/>
			   </xsl:when>
		        </xsl:choose>
			<xsl:choose>
			   <xsl:when test="@passPagerPhone">
				<br/>Pager: <xsl:value-of select="@passPagerPhone"/>
			   </xsl:when>
		        </xsl:choose>
			<xsl:choose>
			   <xsl:when test="@passMobilePhone">
				<br/>Cell: <xsl:value-of select="@passMobilePhone"/>
			   </xsl:when>
		        </xsl:choose>
			<xsl:choose>
			   <xsl:when test="@passOtherPhone">
				<br/>Other: <xsl:value-of select="@passOtherPhone"/>
			   </xsl:when>
		       </xsl:choose>
			<xsl:choose>
			   <xsl:when test="@passFaxPhone">
				<br/>Fax: <xsl:value-of select="@passFaxPhone"/>
			   </xsl:when>
        		</xsl:choose>
		<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text></font></td>
		<td width="120" align="left" valign="top"><font face="Verdana" size="1">
			From:<xsl:value-of select="@fromAirport"/>
			<br/>To:<xsl:value-of select="@toAirport"/>
			<xsl:choose>
			   <xsl:when test="@cancelled">
				<br/>Cancelled: <xsl:value-of select="@cancelled"/>
			   </xsl:when>
		        </xsl:choose>
		<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text></font></td>
		<td width="150" align="left" valign="top"><font face="Verdana" size="1">
			<xsl:choose>
			   <xsl:when test="@pilotName">
			<b><xsl:value-of select="@pilotName"/></b>
			<xsl:choose>
			   <xsl:when test="@pilotDayPhone">
				<br/>Day: <xsl:value-of select="@pilotDayPhone"/>
			   </xsl:when>
		        </xsl:choose>
			<xsl:choose>
			   <xsl:when test="@pilotEvePhone">
				<br/>Eve: <xsl:value-of select="@pilotEvePhone"/>
			   </xsl:when>
		        </xsl:choose>
			<xsl:choose>
			   <xsl:when test="@pilotPagerPhone">
				<br/>Pager: <xsl:value-of select="@pilotPagerPhone"/>
			   </xsl:when>
		        </xsl:choose>
			<xsl:choose>
			   <xsl:when test="@pilotMobilePhone">
				<br/>Cell: <xsl:value-of select="@pilotMobilePhone"/>
			   </xsl:when>
		        </xsl:choose>
			<xsl:choose>
			   	<xsl:when test="@pilotOtherPhone">
				<br/>Other: <xsl:value-of select="@pilotOtherPhone"/>
			   </xsl:when>
		        </xsl:choose>
			<xsl:choose>
			   	<xsl:when test="@pilotFaxPhone">
				<br/>Fax: <xsl:value-of select="@pilotFaxPhone"/>
			   </xsl:when>
		        </xsl:choose>
			<xsl:choose>
			   <xsl:when test="@pilotEmail">
				<br/>Email: <xsl:value-of select="@pilotEmail"/>
			   </xsl:when>
		        </xsl:choose>
			<br/>Home Base:<xsl:value-of select="@homeBase"/>
			   </xsl:when>
		        </xsl:choose>
			<xsl:choose>
			<xsl:when test="@afaPilotName">
			<b><xsl:value-of select="@afaPilotName"/></b>
			<br/><b>Confirm: <xsl:value-of select="@confirmAfaPilotName"/></b>
			<xsl:choose>
			   <xsl:when test="@afaDayPhone">
				<br/>Day: <xsl:value-of select="@afaDayPhone"/>
			   </xsl:when>
		        </xsl:choose>
			<xsl:choose>
			   <xsl:when test="@afaEvePhone">
				<br/>Eve: <xsl:value-of select="@afaEvePhone"/>
			   </xsl:when>
		        </xsl:choose>
			<xsl:choose>
			   <xsl:when test="@afaPagerPhone">
				<br/>Pager: <xsl:value-of select="@afaPagerPhone"/>
			   </xsl:when>
		        </xsl:choose>
			<xsl:choose>
			   <xsl:when test="@afaMobilePhone">
				<br/>Cell: <xsl:value-of select="@afaMobilePhone"/>
			   </xsl:when>
		        </xsl:choose>
			<xsl:choose>
			   	<xsl:when test="@afaOtherPhone">
				<br/>Other: <xsl:value-of select="@afaOtherPhone"/>
			   </xsl:when>
		        </xsl:choose>
			<xsl:choose>
			   	<xsl:when test="@afaFaxPhone">
				<br/>Fax: <xsl:value-of select="@afaFaxPhone"/>
			   </xsl:when>
		        </xsl:choose>
			<xsl:choose>
			   <xsl:when test="@afaEmail">
				<br/>Email: <xsl:value-of select="@afaEmail"/>
			   </xsl:when>
		        </xsl:choose>
				<a>
				<xsl:attribute name="id">
					<xsl:value-of select="concat('popLink_',position())" />
				</xsl:attribute>
				<xsl:attribute name="onClick">
					<xsl:value-of select="concat('displayPopUp(','this',')')" />
				</xsl:attribute>
				<xsl:call-template name="countSynch"/></a>
				<xsl:call-template name="makeDiv"/>
			   </xsl:when>
		        </xsl:choose>
		<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text></font></td>
            </tr>
	</xsl:for-each>
	</table></p>
</xsl:template>

<xsl:template name="countSynch">
	<xsl:choose>
	<xsl:when test="@confirmAfaPilotName">
		<xsl:choose>
		<xsl:when test="@afaPilotName!=@confirmAfaPilotName">
			<br/>Pilot Name
		</xsl:when>
		</xsl:choose>
	</xsl:when>
	<xsl:otherwise>
			<br/>Pilot Missing
	</xsl:otherwise>
	</xsl:choose>

	<xsl:choose>
	<xsl:when test="@afaDayPhone!=@confirmAfaDayPhone">
	   	<br/>Work Phone
	</xsl:when>
	</xsl:choose>
</xsl:template>

<xsl:template name="makeDiv">
<div style="position: absolute; width: 385px; height: 140px; z-index: 1; left: 346px; top: 238px; background-color:#99CCFF; visibility='hidden'">
<xsl:attribute name="id">
	<xsl:value-of select="concat('synchErrors_',position())" />
</xsl:attribute>
		<table border="1" style="border-collapse: collapse" width="100%" id="table1">
			<tr>
				<td width="78"><b><font face="Verdana" size="1"></font></b></td>
				<td width="140"><b><font face="Verdana" size="1">Your Records</font></b></td>
				<td><b><font face="Verdana" size="1">Linking Organization</font></b></td>
			</tr>
			<tr>
				<td width="78"><font face="Verdana" size="1">Pilot Name</font></td>
				<td width="140"><font face="Verdana" size="1"><xsl:value-of select="@afaPilotName"/></font></td>
				<td>
				<xsl:attribute name="id">
					<xsl:value-of select="concat('confirmAfaPilotName_',@legID)" />
				</xsl:attribute>
				<font face="Verdana" size="1"><xsl:value-of select="@confirmAfaPilotName"/></font></td>
			</tr>
			<tr>
				<td width="78"><font face="Verdana" size="1">Work Phone</font></td>
				<td width="140"><font face="Verdana" size="1"><xsl:value-of select="@afaDayPhone"/></font></td>
				<td><font face="Verdana" size="1">310-470-9272</font></td>
			</tr>
			<tr>
				<td width="78"><font face="Verdana" size="1">Home Phone</font></td>
				<td width="140"><font face="Verdana" size="1"><xsl:value-of select="@afaEvePhone"/></font></td>
				<td><font face="Verdana" size="1">310-470-9272</font></td>
			</tr>
			<tr>
				<td width="78"><font face="Verdana" size="1">Mobile</font></td>
				<td width="140"><font face="Verdana" size="1"><xsl:value-of select="@afaPilotMobilePhone"/></font></td>
				<td><font face="Verdana" size="1">310-470-9272</font></td>
			</tr>
			<tr>
				<td width="78"><font face="Verdana" size="1">Fax</font></td>
				<td width="140"><font face="Verdana" size="1"><xsl:value-of select="@afaFaxPhone"/></font></td>
				<td><font face="Verdana" size="1">310-470-9272</font></td>
			</tr>
			<tr>
				<td width="78"><font face="Verdana" size="1">Aircraft</font></td>
				<td width="140"><font face="Verdana" size="1">Cessna 172</font></td>
				<td><font face="Verdana" size="1">Cessna 172</font></td>
			</tr>
			<tr>
				<td width="78"><font face="Verdana" size="1">Tail #/Color</font></td>
				<td width="140"><font face="Verdana" size="1">N63722/Black w/Red</font></td>
				<td><font face="Verdana" size="1">N63722/Black w/Red</font></td>
			</tr>
			<tr>
				<td width="78"><b><font face="Verdana" size="1" color="#0000FF"></font></b></td>
				<td width="140"><b>
				<font face="Verdana" size="1" color="#0000FF">
				<a><xsl:attribute name="onclick">javascript:document.getElementById('synchErrors_<xsl:value-of select="position()" />').style.visibility='hidden'</xsl:attribute>
			     <u>Close</u></a></font></b></td>
				<td><b><font face="Verdana" size="1" color="#0000FF">
				<a><xsl:attribute name="onclick">updateAFALeg(<xsl:value-of select="@legID" />)</xsl:attribute>
				<u>Synch</u></a></font></b></td>
			</tr>
		</table>
	</div>
</xsl:template>

</xsl:stylesheet>
