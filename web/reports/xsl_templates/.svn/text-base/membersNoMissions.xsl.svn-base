<xsl:stylesheet version="1.0" 
xmlns:xsl="http://www.w3.org/1999/XSL/Transform"
 xmlns:s='uuid:BDC6E3F0-6DA3-11d1-A2A3-00AA00C14882'
	xmlns:dt='uuid:C2F41010-65B3-11d1-A29F-00AA00C14882'
	xmlns:rs='urn:schemas-microsoft-com:rowset'
	xmlns:z='#RowsetSchema'>
<xsl:output method="html" />
<xsl:strip-space elements="*"/>

<xsl:template match="/">
<script type="text/javascript" charset="utf-8">
<![CDATA[			jQuery(document).ready(function() {
				jQuery('#reportData').dataTable({
					"iDisplayLength":25,
					"aoColumns": [
            { "bSortable": false, "bVisible": false }, // member name (hidden)
            { "bSortable": true, "bVisible": true, "iDataSort": 0 }, // Member 
            { "bSortable": true, "bVisible": true}, // Join Date
            { "bSortable": true, "bVisible": true} // Oriented Date 
	        ]
				});
			} );
]]></script>
<div id="demo">
<table cellpadding="0" cellspacing="0" border="0" class="display" id="reportData">
	<thead>
	 <tr>
		<th width="60%" align="left">Member Name (hidden)</th>
		<th width="60%" align="left"><b>Member</b></th>
		<th width="20%" align="left"><b>Join Date</b></th>
		<th width="20%" align="left"><b>Oriented Date</b></th>
	 </tr>
	</thead>
	<xsl:for-each select=".//record">
   <tr style='page-break-inside:avoid'>
		<td><xsl:value-of select="lastName"/></td> <!-- sorting col -->
		<td width="60%" align="left" valign="top">
			<a>
				<xsl:attribute name="href">
					<xsl:value-of select="concat('mailto:',email)"/>
				</xsl:attribute>
				<xsl:value-of select="firstName"/><xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text><xsl:value-of select="lastName"/>
			</a>
		<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text></td>
		<td width="20%" align="left" valign="top">
			<xsl:value-of select="joinDate"/>
			<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text>
		</td>
		<td width="20%" align="left" valign="top">
			<xsl:value-of select="orientedDate"/>
			<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text>
		</td>
   </tr>
	</xsl:for-each>
	</table>
</div>
</xsl:template>
</xsl:stylesheet>
