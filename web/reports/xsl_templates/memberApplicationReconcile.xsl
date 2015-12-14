<xsl:stylesheet version="1.0" xmlns:xsl="http://www.w3.org/1999/XSL/Transform">
<xsl:output method="html" />
<xsl:strip-space elements="*"/>

<xsl:variable name="noMonths" select=".//record[last()]/monthNo"/>

<xsl:template match="/">
<script type="text/javascript" charset="utf-8">
<![CDATA[
		jQuery(document).ready(function() {
				jQuery('#reportData').dataTable({
					"iDisplayLength":25,
					"aoColumns": [
            { "bSortable": false, "bVisible": false }, // date (hidden)
            { "bSortable": true, "bVisible": true, "iDataSort": 0 }, // Date
            { "bSortable": false, "bVisible": false }, // Member (hidden)
            { "bSortable": true, "bVisible": true, "iDataSort": 2 }, // Member
            { "bSortable": true, "bVisible": true}, // Dues
            { "bSortable": true, "bVisible": true}, // Donation
            { "bSortable": false, "bVisible": false }, // method (hidden)
            { "bSortable": true, "bVisible": true, "iDataSort": 6 } // Method
	        ]
				});
		});
]]></script>
<div id="demo">
<table cellpadding="0" cellspacing="0" border="0" class="display" id="reportData">
 <thead>
	<tr>
		<th align="left"><b>Date Hidden</b></th>
		<th align="left"><b>Date</b></th>
		<th align="left"><b>Member Hidden</b></th>
		<th align="right"><b>Member</b></th>
		<th align="right"><b>Dues</b></th>
		<th align="right"><b>Donation</b></th>
		<th align="left"><b>Method Hidden</b></th>
		<th align="right"><b>Method</b></th>
	</tr>
	</thead>
<tbody>
<xsl:for-each select=".//record">
 	<tr>
		<td><xsl:value-of select="applicationdate"/></td> <!-- sorting col -->
		<td align="left" valign="top"><xsl:value-of select="applicationDateDisplay"/>
			<xsl:choose>
				<xsl:when test="renewal=1">
				  <br/>(Renewal)
				</xsl:when>			
				<xsl:when test="renewal=0">
					<br/>(New Member)
				</xsl:when>
			</xsl:choose>
		</td>
		<td><xsl:value-of select="lastname"/></td> <!-- sorting col -->
		<td align="left" valign="top">
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
		<td align="right" valign="top">
			<xsl:value-of select="format-number(duesamountpaid,'$#,###')"/>
			<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text>
			
		</td>
		<td align="right" valign="top">
			<xsl:value-of select="format-number(donationamountpaid,'$#,###')"/>
			<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text>
			
		</td>
		<td><xsl:value-of select="methodofpayment"/></td> <!-- sorting col -->
		<td align="right" valign="top">
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
	<tr>
		<th align="right"><xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text></th>
		<th align="left"><b>Total</b></th>
		<th align="right"><xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text></th>
		<th align="right"><xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text></th>
		<th align="right"><b><xsl:value-of select="format-number(sum(/afids_report/record/duesamountpaid),'$#,###')"/></b></th>
		<th align="right"><b><xsl:value-of select="format-number(sum(/afids_report/record/donationamountpaid),'$#,###')"/></b></th>
		<th align="right"><xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text></th>
		<th align="right"><xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text></th>
	</tr>
</tfoot>
</table>
</div>
</xsl:template>
</xsl:stylesheet>
