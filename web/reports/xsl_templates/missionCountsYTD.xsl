<xsl:stylesheet version="1.0" xmlns:xsl="http://www.w3.org/1999/XSL/Transform">
<xsl:output method="html" />
<xsl:strip-space elements="*"/>

<xsl:template match="/">
<table class="report-table" style="width: 580px">
 <thead>
   <tr>
		<td align="left"><b>Month</b></td>
		<td align="center"><b>Scheduled</b></td>
		<td align="center" colspan="2"><b>Cancelled</b></td>
		<td align="center" colspan="2"><b>Not Cancelled</b></td>
		<td align="center" colspan="2"><b>Approved</b></td>
	</tr>
	<tr>
		<td align="left"><xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text></td>
		<td align="center"><xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text></td>
		<td align="center"><b>Count</b></td>
		<td align="center"><b>Percent</b></td>
		<td align="center"><b>Count</b></td>
		<td align="center"><b>Percent</b></td>
		<td align="center"><b>Count</b></td>
		<td align="center"><b>Percent</b></td>
	</tr>
</thead>
<tbody>
<xsl:for-each select=".//record">
 	<tr>
		<td align="left" valign="top">
			<xsl:call-template name="monthName"/>
		</td>
		<td align="right" valign="top">
			<xsl:value-of select="format-number(scheduled,'#,###')"/>
		</td>
		<td align="right" valign="top">
			<xsl:value-of select="format-number(cancelled,'#,###')"/>
			<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text>
		</td>
		<td align="right" valign="top">
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
		<td align="right" valign="top">
			<xsl:value-of select="format-number(notCancelled,'#,###')"/>
			<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text>
		</td>
		<td align="right" valign="top">
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
		<td align="right" valign="top">
			<xsl:value-of select="format-number(approved,'#,###')"/>
			<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text>
		</td>
		<td align="right" valign="top">
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
		<td align="right" valign="top">
			<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text>
		</td>
		<td align="right" valign="top">
			<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text>
		</td>
		<td align="right" valign="top">
			<xsl:value-of select="format-number(sum(.//cancelled),'#,###')"/>
			<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text>
		</td>
		<td align="right" valign="top">
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
		<td align="right" valign="top">
			<xsl:value-of select="format-number(sum(.//notCancelled),'#,###')"/>
			<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text>
		</td>
		<td align="right" valign="top">
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
		<td align="right" valign="top">
			<xsl:value-of select="format-number(sum(.//approved),'#,###')"/>
			<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text>
		</td>
		<td align="right" valign="top">
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
	<xsl:if test="monthNo = 1">Jan</xsl:if>
	<xsl:if test="monthNo = 2">Feb</xsl:if>
	<xsl:if test="monthNo = 3">Mar</xsl:if>	
	<xsl:if test="monthNo = 4">Apr</xsl:if>
	<xsl:if test="monthNo = 5">May</xsl:if>
	<xsl:if test="monthNo = 6">Jun</xsl:if>
	<xsl:if test="monthNo = 7">Jul</xsl:if>
	<xsl:if test="monthNo = 8">Aug</xsl:if>
	<xsl:if test="monthNo = 9">Sep</xsl:if>
	<xsl:if test="monthNo = 10">Oct</xsl:if>
	<xsl:if test="monthNo = 11">Nov</xsl:if>
	<xsl:if test="monthNo = 12">Dec</xsl:if>
</xsl:template>
</xsl:stylesheet>