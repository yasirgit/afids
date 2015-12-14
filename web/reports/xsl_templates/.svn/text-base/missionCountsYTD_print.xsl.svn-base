<xsl:stylesheet version="1.0" xmlns:xsl="http://www.w3.org/1999/XSL/Transform">
<xsl:output method="html" />
<xsl:strip-space elements="*"/>

<xsl:template match="/">
 <table style="width:500px; border-collapse:collapse; margin:8px 0 0;" border="1" cellpadding="2" bordercolor="#a6bee0">
 <thead>
   <tr>
		<td style="color:#153f7a;font-weight:bold;height:12" bgcolor="#cfe1fc" align="left">Month</td>
		<td style="color:#153f7a;font-weight:bold;height:12" bgcolor="#cfe1fc" align="center">Scheduled</td>
		<td style="color:#153f7a;font-weight:bold;height:12" bgcolor="#cfe1fc" align="center" colspan="2">Cancelled</td>
		<td style="color:#153f7a;font-weight:bold;height:12" bgcolor="#cfe1fc" align="center" colspan="2">Not Cancelled</td>
		<td style="color:#153f7a;font-weight:bold;height:12" bgcolor="#cfe1fc" align="center" colspan="2">Approved</td>
	</tr>
	<tr>
		<td style="color:#153f7a;font-weight:bold;height:12" bgcolor="#cfe1fc" align="left"><xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text></td>
		<td style="color:#153f7a;font-weight:bold;height:12" bgcolor="#cfe1fc" align="center"><xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text></td>
		<td style="color:#153f7a;font-weight:bold;height:12" bgcolor="#cfe1fc" align="center">Count</td>
		<td style="color:#153f7a;font-weight:bold;height:12" bgcolor="#cfe1fc" align="center">Percent</td>
		<td style="color:#153f7a;font-weight:bold;height:12" bgcolor="#cfe1fc" align="center">Count</td>
		<td style="color:#153f7a;font-weight:bold;height:12" bgcolor="#cfe1fc" align="center">Percent</td>
		<td style="color:#153f7a;font-weight:bold;height:12" bgcolor="#cfe1fc" align="center">Count</td>
		<td style="color:#153f7a;font-weight:bold;height:12" bgcolor="#cfe1fc" align="center">Percent</td>
	</tr>
</thead>
<tbody>
<xsl:for-each select=".//record">
 	<tr>
		<td style="height:24px;" align="left" valign="top">
			<xsl:call-template name="monthName"/>
		</td>
		<td style="height:24px;" align="right" valign="top">
			<xsl:value-of select="format-number(scheduled,'#,###')"/>
		</td>
		<td style="height:24px;" align="right" valign="top">
			<xsl:value-of select="format-number(cancelled,'#,###')"/>
			<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text>
		</td>
		<td style="height:24px;" align="right" valign="top">
			<xsl:choose>
			<xsl:when test="scheduled=0">
				<xsl:value-of select="format-number(0,'#,###.0')"/>
			</xsl:when>
			<xsl:otherwise>
				<xsl:variable name="cancelled"><xsl:value-of select="number(cancelled)"/></xsl:variable>
				<xsl:variable name="scheduled"><xsl:value-of select="number(scheduled)"/></xsl:variable>
				<xsl:value-of select="format-number(($cancelled div $scheduled),'#,###.0%')"/>
			</xsl:otherwise>
			</xsl:choose>			
			<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text>
		</td>
		<td style="height:24px;" align="right" valign="top">
			<xsl:value-of select="format-number(notCancelled,'#,###')"/>
			<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text>
		</td>
		<td style="height:24px;" align="right" valign="top">
			<xsl:choose>
			<xsl:when test="scheduled=0">
				<xsl:value-of select="format-number(0,'#,###.0')"/>
			</xsl:when>
			<xsl:otherwise>
				<xsl:variable name="notCancelled"><xsl:value-of select="number(notCancelled)"/></xsl:variable>
				<xsl:variable name="scheduled"><xsl:value-of select="number(scheduled)"/></xsl:variable>
				<xsl:value-of select="format-number(($notCancelled div $scheduled),'#,###.0%')"/>
			</xsl:otherwise>
			</xsl:choose>			
			<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text>
		</td>
		<td style="height:24px;" align="right" valign="top">
			<xsl:value-of select="format-number(approved,'#,###')"/>
			<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text>
		</td>
		<td style="height:24px;" align="right" valign="top">
			<xsl:choose>
			<xsl:when test="scheduled=0">
				<xsl:value-of select="format-number(0,'#,###.0')"/>
			</xsl:when>
			<xsl:otherwise>
				<xsl:variable name="approved"><xsl:value-of select="number(approved)"/></xsl:variable>
				<xsl:variable name="scheduled"><xsl:value-of select="number(scheduled)"/></xsl:variable>
				<xsl:value-of select="format-number(($approved div $scheduled),'#,###.0%')"/>
			</xsl:otherwise>
			</xsl:choose>			
			<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text>
		</td>
	</tr>
</xsl:for-each>
 	<tr>
		<td style="color:#153f7a;font-weight:bold;height:24" bgcolor="#cfe1fc" align="right" valign="top">
			Total<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text>
		</td>
		<td style="color:#153f7a;font-weight:bold;height:24" bgcolor="#cfe1fc" align="right" valign="top">
			<xsl:value-of select="format-number(sum(.//scheduled),'#,###')"/>
			<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text>
		</td>
		<td style="color:#153f7a;font-weight:bold;height:24" bgcolor="#cfe1fc" align="right" valign="top">
			<xsl:value-of select="format-number(sum(.//cancelled),'#,###')"/>
			<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text>
		</td>
		<td style="color:#153f7a;font-weight:bold;height:24" bgcolor="#cfe1fc" align="right" valign="top">
			<!-- cancelled percent -->
			<xsl:choose>
			<xsl:when test="sum(.//scheduled)=0">
				<xsl:value-of select="format-number(0,'#,###.0%')"/>
			</xsl:when>
			<xsl:otherwise>
				<xsl:variable name="cancelled"><xsl:value-of select="number(sum(.//cancelled))"/></xsl:variable>
				<xsl:variable name="scheduled"><xsl:value-of select="number(sum(.//scheduled))"/></xsl:variable>
				<xsl:value-of select="format-number(($cancelled div $scheduled),'#,###.0%')"/>
			</xsl:otherwise>
			</xsl:choose>	
			<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text>
		</td>
		<td style="color:#153f7a;font-weight:bold;height:24" bgcolor="#cfe1fc" align="right" valign="top">
			<xsl:value-of select="format-number(sum(.//notCancelled),'#,###')"/>
			<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text>
		</td>
		<td style="color:#153f7a;font-weight:bold;height:24" bgcolor="#cfe1fc" align="right" valign="top">
			<!-- not cancelled percent -->
			<xsl:choose>
			<xsl:when test="sum(.//scheduled)=0">
				<xsl:value-of select="format-number(0,'#,###.0')"/>
			</xsl:when>
			<xsl:otherwise>
				<xsl:variable name="notCancelled"><xsl:value-of select="number(sum(.//notCancelled))"/></xsl:variable>
				<xsl:variable name="scheduled"><xsl:value-of select="number(sum(.//scheduled))"/></xsl:variable>
				<xsl:value-of select="format-number(($notCancelled div $scheduled),'#,###.0%')"/>
			</xsl:otherwise>
			</xsl:choose>
			<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text>
		</td>
		<td style="color:#153f7a;font-weight:bold;height:24" bgcolor="#cfe1fc" align="right" valign="top">
			<xsl:value-of select="format-number(sum(.//approved),'#,###')"/>
			<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text>
		</td>
		<td style="color:#153f7a;font-weight:bold;height:24" bgcolor="#cfe1fc" align="right" valign="top">
			<!-- approved percent -->
			<xsl:choose>
			<xsl:when test="sum(.//scheduled)=0">
				<xsl:value-of select="format-number(0,'#,###.0')"/>
			</xsl:when>
			<xsl:otherwise>
				<xsl:variable name="approved"><xsl:value-of select="number(sum(.//approved))"/></xsl:variable>
				<xsl:variable name="scheduled"><xsl:value-of select="number(sum(.//scheduled))"/></xsl:variable>
				<xsl:value-of select="format-number(($approved div $scheduled),'#,###.0%')"/>
			</xsl:otherwise>
			</xsl:choose>
			<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text>
		</td>
	</tr>
</tbody>
</table>
</xsl:template>

<xsl:template name="monthName">
	<xsl:if test="monthNo = 1">January</xsl:if>
	<xsl:if test="monthNo = 2">February</xsl:if>
	<xsl:if test="monthNo = 3">March</xsl:if>	
	<xsl:if test="monthNo = 4">April</xsl:if>
	<xsl:if test="monthNo = 5">May</xsl:if>
	<xsl:if test="monthNo = 6">June</xsl:if>
	<xsl:if test="monthNo = 7">July</xsl:if>
	<xsl:if test="monthNo = 8">August</xsl:if>
	<xsl:if test="monthNo = 9">September</xsl:if>
	<xsl:if test="monthNo = 10">October</xsl:if>
	<xsl:if test="monthNo = 11">November</xsl:if>
	<xsl:if test="monthNo = 12">December</xsl:if>
</xsl:template>
</xsl:stylesheet>