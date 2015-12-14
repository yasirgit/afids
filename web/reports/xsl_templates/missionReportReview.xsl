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
	<p><table border="1" cellpadding="2" width="640">
	<tr>
		<td width="260" bgcolor="#1848B0" align="left"><font face="Verdana" color="#FFFFFF" size="1"><b>Mission Info</b></font></td>
		<td width="260" bgcolor="#1848B0" align="left"><font face="Verdana" color="#FFFFFF" size="1"><b>Mission Report</b></font></td>
		<td width="120" bgcolor="#1848B0" align="left"><font face="Verdana" color="#FFFFFF" size="1"><b>Action</b></font></td>
	</tr>
	<xsl:for-each select="z:row">

 		<tr style='page-break-inside:avoid; background-image: url(blank.png)'>
		<xsl:attribute name="bgcolor">
		   <xsl:call-template name="bg-color"/>
		</xsl:attribute>

		<td align="left" valign="top" width="260"><font face="verdana" size="1">
			Mission Date: <xsl:value-of select="@missionDateDisplay"/>
			<br/>Passenger: <xsl:value-of select="@passengerName"/>
			<br/>Route: <xsl:value-of select="@origin"/> to <xsl:value-of select="@destination"/>
			<br/>Pilot: 
			<a>
<!-- AFSE adding memberrec Start -->
<!-- 
			<xsl:attribute name="href">
				<xsl:call-template name="make-email-xref"/>
			</xsl:attribute>
-->
			<xsl:attribute name="href">
				<xsl:call-template name="make-xref-memberrec"/>
			</xsl:attribute>
			<xsl:value-of select="@pilotName"/>
			</a>
			<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text>
			<a>
			<xsl:attribute name="href">
				<xsl:call-template name="make-email-xref"/>
			</xsl:attribute>
			<xsl:text>Email</xsl:text>
<!-- AFSE adding memberrec Stop -->
			</a>
			<xsl:choose>
				<xsl:when test="@cancelled">
					<br/><font color="red">CANCELLED</font>
				</xsl:when>
			</xsl:choose>
			<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text></font>
		</td>

		<xsl:choose>
			<xsl:when test="@missionReportID">
			<td align="left" valign="top" width="250"><font face="verdana" size="1">
				Report Filed: <xsl:value-of select="@reportDateDisplay"/>
				<br/>Mission Date: <xsl:value-of select="@missionReportMissionDateDisplay"/>
				<br/>Assistant: <xsl:value-of select="@coPilotName"/>
				<xsl:choose>
					<xsl:when test="@make">
					   <br/>Aircraft: <xsl:value-of select="@make"/>/<xsl:value-of select="@model"/>
					</xsl:when>
					<xsl:otherwise>
					   <br/><font face="verdana" size="1" color="red">Aircraft: Missing</font><font face="verdana"  size="1"></font>
					</xsl:otherwise>
				</xsl:choose>
				<br/>Hobbs: <xsl:value-of select="@hobbsTimeDisplay"/>
				<xsl:choose>
					<xsl:when test="@commercialTicketCost > 0">
					   <br/><font face="verdana" size="1">Commercial Ticket Purchased: <xsl:value-of select="@commercialTicketCostDisplay"/></font>
					</xsl:when>
				</xsl:choose>
					<xsl:if test="@approvedTest = 'Yes'">
						<br/><font face="verdana" size="1" color="red">APPROVED</font>
					</xsl:if>
					<xsl:if test="@approvedTest = 'No'">
						<br/><font face="verdana" size="1" color="red">NOT APPROVED</font>
					</xsl:if>
				<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text>
			</font></td>
			</xsl:when>
			<xsl:otherwise>
				<td align="left" valign="top" width="260">
				   <font face="verdana" size="1" color="red">Missing
				   <br/>
		        	   <a>
		        	   <xsl:attribute name="href">
			        	<xsl:call-template name="make-xref-mradd"/>
		        	   </xsl:attribute>
		        	   Add New Report
		        	   </a>
				</font></td>
			</xsl:otherwise>
		</xsl:choose>
		<td align="left" valign="top" width="120"><font face="verdana" size="1">
			<xsl:choose>
				<xsl:when test="@missionReportID">
		        	   <a>
		        	   <xsl:attribute name="href">
			        	<xsl:call-template name="make-xref-mrv"/>
		        	   </xsl:attribute>
		        	   Edit This Report
		        	   </a>
				</xsl:when>
			</xsl:choose>
			<xsl:choose>
				<xsl:when test="@approvedTest = 'Yes'">
				</xsl:when>
				<xsl:otherwise>
				   <xsl:choose>
					<xsl:when test="@missionReportID">
		        	   	<a>
		        	   	<xsl:attribute name="href">
			       	 	<xsl:call-template name="make-xref-mra"/>
		        		   </xsl:attribute>
		        	   	Approve This Report
		        	   	</a>
					</xsl:when>
				   </xsl:choose>
				</xsl:otherwise>
			</xsl:choose>
		<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text></font></td>
            </tr>
	</xsl:for-each>
	</table></p>
</xsl:template>

<xsl:template name="make-email-xref">
	<xsl:value-of select="concat('mailto:',@email)"/>
</xsl:template>
<xsl:template name="make-xref-mrv">
	<xsl:value-of select="concat('../missionreportview.asp?id=',@missionReportID)"/>
</xsl:template>
<xsl:template name="make-xref-mra">
	<xsl:value-of select="concat('../missionreportapprove.asp?id=',@missionReportID)"/><xsl:text disable-output-escaping="yes">&amp;</xsl:text>
	<xsl:for-each select="//page_link/pair">
	   <xsl:value-of select="concat(name,'=',value)"/><xsl:text disable-output-escaping="yes">&amp;</xsl:text>
	</xsl:for-each>
</xsl:template>
<xsl:template name="make-xref-mradd">
	<xsl:value-of select="concat('../mission_report_list_member.asp?id=',@pilotID)"/>
</xsl:template>
<!-- AFSE adding memberrec Start -->
<xsl:template name="make-xref-memberrec">
 <xsl:value-of select="concat('../spcmemberview.asp?id=',@pilotID)"/>
</xsl:template>
<!-- AFSE adding memberrec Stop -->
<xsl:template name="bg-color">
	<xsl:choose>
	<xsl:when test=".//@cancelled">
	   <xsl:value-of select="'#C0C0C0'"/>
	</xsl:when>
	<xsl:when test=".//@approvedTest = 'Yes'">
	   <xsl:value-of select="'#CDFF1F'"/>
	</xsl:when>
	<xsl:otherwise>
	   <xsl:value-of select="'#FFFFFF'"/>
	</xsl:otherwise>
	</xsl:choose>
</xsl:template>
</xsl:stylesheet>
