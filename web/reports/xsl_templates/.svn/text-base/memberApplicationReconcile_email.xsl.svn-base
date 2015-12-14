<xsl:stylesheet version="1.0" xmlns:xsl="http://www.w3.org/1999/XSL/Transform">
<xsl:output method="html" />
<xsl:strip-space elements="*"/>

<xsl:variable name="noMonths" select=".//record[last()]/monthNo"/>

<xsl:template match="/">
<table style="width:750px; border-collapse:collapse; margin:8px 0 0;" border="1" cellpadding="2" bordercolor="#a6bee0" width="750">
 <thead>
	<tr nobr="true">
		<th style="color:#153f7a;font-weight:bold;height:24px" bgcolor="#cfe1fc" align="left" width="150">Date</th>
		<th style="color:#153f7a;font-weight:bold;height:24px" bgcolor="#cfe1fc" align="right" width="200">Member</th>
		<th style="color:#153f7a;font-weight:bold;height:24px" bgcolor="#cfe1fc" align="right" width="100">Dues</th>
		<th style="color:#153f7a;font-weight:bold;height:24px" bgcolor="#cfe1fc" align="right" width="100">Donation</th>
		<th style="color:#153f7a;font-weight:bold;height:24px" bgcolor="#cfe1fc" align="right" width="200">Method</th>
	</tr>
	</thead>
<tbody>
<xsl:for-each select=".//record">
 	<tr nobr="true">
		<td style="height:24px" align="left" valign="top" width="150"><xsl:value-of select="applicationDateDisplay"/>
			<xsl:choose>
				<xsl:when test="renewal=1">
				  <br/>(Renewal)
				</xsl:when>			
				<xsl:when test="renewal=0">
					<br/>(New Member)
				</xsl:when>
			</xsl:choose>
		</td>
		<td style="height:24px" align="left" valign="top" width="200">
			<b><xsl:value-of select="firstname"/>
			<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text>
			<xsl:value-of select="lastname"/></b>
			<br/>#<xsl:value-of select="externalid"/>
			<br/><xsl:value-of select="memberClass"/>
			<xsl:choose>
				<xsl:when test="masterMemberID">
				  <br/>(Spouse: <xsl:value-of select="masterMemberFirstName"/><xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text><xsl:value-of select="masterMemberLastName"/>)
				</xsl:when>			
			</xsl:choose>
		</td>
		<td style="height:24px" align="right" valign="top" width="100">
			<xsl:value-of select="format-number(duesamountpaid,'$#,###')"/>
			<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text>
		</td>
		<td style="height:24px" align="right" valign="top" width="100">
			<xsl:value-of select="format-number(donationamountpaid,'$#,###')"/>
			<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text>
		</td>
		<td style="height:24px" align="right" valign="top" width="200">
			<xsl:value-of select="paymenttransactionid"/>
			<xsl:choose>
				<xsl:when test="methodofpayment='cash'">
				  <br/>Cash
				</xsl:when>
				<xsl:when test="methodofpayment=2">
				  <br/>Check: <xsl:value-of select="checknumber"/>
				</xsl:when>
				<xsl:when test="methodofpayment='ccard'">
				  <br/>CCard: <xsl:value-of select="ccardapprovalnumber"/>
				</xsl:when>
			</xsl:choose>
			<br/>Processed: <xsl:value-of select="processedDate"/>
			<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text>
		</td>
	</tr>
</xsl:for-each>
</tbody>
<tfoot>
	<tr nobr="true">
		<th style="color:#153f7a;font-weight:bold;height:24px" bgcolor="#cfe1fc" align="left" width="150"><b>Total</b></th>
		<th style="color:#153f7a;font-weight:bold;height:24px" bgcolor="#cfe1fc" align="right" width="200"><xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text></th>
		<th style="color:#153f7a;font-weight:bold;height:24px" bgcolor="#cfe1fc" align="right" width="100"><b><xsl:value-of select="format-number(sum(/afids_report/record/duesamountpaid),'$#,###')"/></b></th>
		<th style="color:#153f7a;font-weight:bold;height:24px" bgcolor="#cfe1fc" align="right" width="100"><b><xsl:value-of select="format-number(sum(/afids_report/record/donationamountpaid),'$#,###')"/></b></th>
		<th style="color:#153f7a;font-weight:bold;height:24px" bgcolor="#cfe1fc" align="right" width="200"><xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text></th>
	</tr>
</tfoot>
</table>
</xsl:template>
</xsl:stylesheet>
