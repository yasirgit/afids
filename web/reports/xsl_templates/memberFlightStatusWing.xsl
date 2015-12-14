<xsl:stylesheet version="1.0" xmlns:xsl="http://www.w3.org/1999/XSL/Transform">
<xsl:output method="html" />
<xsl:strip-space elements="*"/>
<xsl:variable name="q"><xsl:text disable-output-escaping="yes">&amp;</xsl:text></xsl:variable>
<xsl:template match="/">
<table class="report-table" style="width: 760px">
 <thead>
	<tr>
		<td align="left" width="40%" valign="top">Wing</td>
		<td align="center" width="10%" valign="top">Command Pilot</td>
		<td align="center" width="10%" valign="top"><b>Non-Pilot</b></td>
		<td align="center" width="10%" valign="top"><b>Verify Orientation</b></td>
		<td align="center" width="10%" valign="top"><b>Ground Angel</b></td>
		<td align="center" width="10%" valign="top"><b>Mission Assistant</b></td>
		<td align="center" width="10%" valign="top"><b>Total</b></td>
	</tr>
</thead>
<tbody>
<xsl:for-each select=".//record">
 	<tr>
		<td align="left" valign="top">
			<a>
				<xsl:attribute name="href">
			<xsl:value-of select="concat('/reports/reports.php?reportDef=report_specs.xml',$q,'reportName=member_roster',$q,'action=display',$q,'memberStatus=1',$q,'wing=',wingID)"/>
				</xsl:attribute>
				<xsl:value-of select="wingName"/>
			</a>
		</td>
		<td align="right" valign="top">
			<a>
				<xsl:attribute name="href">
			<xsl:value-of select="concat('/reports/reports.php?reportDef=report_specs.xml',$q,'reportName=member_roster',$q,'action=display',$q,'memberStatus=1',$q,'flightstatus=Command Pilot',$q,'wing=',wingID)"/>
				</xsl:attribute>
			<xsl:value-of select="format-number(commandPilot,'#,###')"/>
			</a>
			<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text>
		</td>
		<td align="right" valign="top">
			<a>
				<xsl:attribute name="href">
			<xsl:value-of select="concat('/reports/reports.php?reportDef=report_specs.xml',$q,'reportName=member_roster',$q,'action=display',$q,'memberStatus=1',$q,'flightstatus=Non-Pilot',$q,'wing=',wingID)"/>
				</xsl:attribute>
			<xsl:value-of select="format-number(nonPilot,'#,###')"/>
			</a>
			<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text>
		</td>
		<td align="right" valign="top">
			<a>
				<xsl:attribute name="href">
			<xsl:value-of select="concat('/reports/reports.php?reportDef=report_specs.xml',$q,'reportName=member_roster',$q,'action=display',$q,'memberStatus=1',$q,'flightstatus=Verify Orientation',$q,'wing=',wingID)"/>
				</xsl:attribute>
			<xsl:value-of select="format-number(verifyOrientation,'#,###')"/>
			</a>
			<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text>
		</td>
		<td align="right" valign="top">
			<a>
				<xsl:attribute name="href">
			<xsl:value-of select="concat('/reports/reports.php?reportDef=report_specs.xml',$q,'reportName=member_roster',$q,'action=display',$q,'memberStatus=1',$q,'flightstatus=Ground Angel',$q,'wing=',wingID)"/>
				</xsl:attribute>
			<xsl:value-of select="format-number(groundAngel,'#,###')"/>
			</a>
			<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text>
		</td>
		<td align="right" valign="top">
			<a>
				<xsl:attribute name="href">
			<xsl:value-of select="concat('/reports/reports.php?reportDef=report_specs.xml',$q,'reportName=member_roster',$q,'action=display',$q,'memberStatus=1',$q,'flightstatus=Mission Assistant',$q,'wing=',wingID)"/>
				</xsl:attribute>
			<xsl:value-of select="format-number(missionAssistant,'#,###')"/>
			</a>
			<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text>
		</td>
		<td align="right" valign="top">
			<a>
				<xsl:attribute name="href">
			<xsl:value-of select="concat('/reports/reports.php?reportDef=report_specs.xml',$q,'reportName=member_roster',$q,'action=display',$q,'memberStatus=1',$q,'wing=',wingID)"/>
				</xsl:attribute>
			<xsl:value-of select="format-number(totalCount,'#,###')"/>
			<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text>
			</a>
		</td>
	</tr>
</xsl:for-each>
 	<tr class="totalrow">
		<td align="left" valign="top"><span style="font-weight:bold">Total</span></td>
		<td align="right" valign="top">
			<span style="font-weight:bold"><xsl:value-of select="format-number(sum(.//commandPilot),'#,###')"/>
			<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text></span>
		</td>
		<td align="right" valign="top">
			<span style="font-weight:bold"><xsl:value-of select="format-number(sum(.//nonPilot),'#,###')"/>
			<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text></span>
		</td>
		<td align="right" valign="top">
			<span style="font-weight:bold"><xsl:value-of select="format-number(sum(.//verifyOrientation),'#,###')"/>
			<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text></span>
		</td>
		<td align="right" valign="top">
			<span style="font-weight:bold"><xsl:value-of select="format-number(sum(.//groundAngel),'#,###')"/>
			<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text></span>
		</td>
		<td align="right" valign="top">
			<span style="font-weight:bold"><xsl:value-of select="format-number(sum(.//missionAssistant),'#,###')"/>
			<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text></span>
		</td>
		<td align="right" valign="top">
			<span style="font-weight:bold"><xsl:value-of select="format-number(sum(.//totalCount),'#,###')"/>
			<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text></span>
		</td>
	</tr>
</tbody>
</table>
</xsl:template>
</xsl:stylesheet>