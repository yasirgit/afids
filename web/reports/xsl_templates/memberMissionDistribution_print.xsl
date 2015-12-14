<xsl:stylesheet version="1.0" xmlns:xsl="http://www.w3.org/1999/XSL/Transform">
<xsl:output method="html" />
<xsl:strip-space elements="*"/>

<xsl:template match="/">
<table style="width:210px; border-collapse:collapse; margin:8px 0 0;" border="1" cellpadding="2" bordercolor="#a6bee0">
	<thead>
	<tr>
		<td style="color:#153f7a;font-weight:bold;height:24" bgcolor="#cfe1fc" width="70" align="left">Groups</td>
		<td style="color:#153f7a;font-weight:bold;height:24" bgcolor="#cfe1fc" width="70" align="left"># Members</td>
		<td style="color:#153f7a;font-weight:bold;height:24" bgcolor="#cfe1fc" width="70" align="left">% Members</td>
	</tr>
	</thead>
	<tbody>
	<tr>
		<td style="height:24px;" width="70" align="left" valign="top">
		   All missions
			<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text>
		</td>
		<td  style="height:24px;" width="70" align="right" valign="top">
			<xsl:value-of select="format-number(.//rowOne, '###,##0')"/>
			<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text>
		</td>
		<td  style="height:24px;" width="70" align="right" valign="top">
			<xsl:choose>
				<xsl:when test=".//rowOne=''">
					<xsl:value-of select="format-number(.//rowOne div .//rowOne,'#0.0%')"/>
				</xsl:when>
				<xsl:otherwise>--</xsl:otherwise>
			</xsl:choose>
			<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text>
		</td>
  </tr>
  <tr>
		<td  style="height:24px;" width="70" align="left" valign="top">
		   1 mission
		<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text></td>
		<td  style="height:24px;" width="70" align="right" valign="top">
			<xsl:value-of select="format-number(.//rowTwo, '###,##0')"/>
		<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text></td>
		<td  style="height:24px;" width="70" align="right" valign="top">
			<xsl:choose>
				<xsl:when test=".//rowOne=''">
					<xsl:value-of select="format-number(.//rowTwo div .//rowOne,'#0.0%')"/>
				</xsl:when>
				<xsl:otherwise>--</xsl:otherwise>
			</xsl:choose>
		<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text></td>
            </tr>
            <tr>
		<td  style="height:24px;" width="70" align="left" valign="top">
		   5 or more
		<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text></td>
		<td  style="height:24px;" width="70" align="right" valign="top">
			<xsl:value-of select="format-number(.//rowThree, '###,##0')"/>
		<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text></td>
		<td  style="height:24px;" width="70" align="right" valign="top">
			<xsl:choose>
				<xsl:when test=".//rowOne=''">
					<xsl:value-of select="format-number(.//rowThree div .//rowOne,'#0.0%')"/>
				</xsl:when>
				<xsl:otherwise>--</xsl:otherwise>
			</xsl:choose>
		<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text></td>
            </tr>
            <tr>
		<td  style="height:24px;" width="70" align="left" valign="top">
		   10 or more
		<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text></td>
		<td  style="height:24px;" width="70" align="right" valign="top">
			<xsl:value-of select="format-number(.//rowFour, '###,##0')"/>
		<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text></td>
		<td  style="height:24px;" width="70" align="right" valign="top">
			<xsl:choose>
				<xsl:when test=".//rowOne=''">
					<xsl:value-of select="format-number(.//rowFour div .//rowOne,'#0.0%')"/>
				</xsl:when>
				<xsl:otherwise>--</xsl:otherwise>
			</xsl:choose>
		<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text></td>
            </tr>
            <tr>
		<td  style="height:24px;" width="70" align="left" valign="top">
		   15 or more
		<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text></td>
		<td  style="height:24px;" width="70" align="right" valign="top">
			<xsl:value-of select="format-number(.//rowFive, '###,##0')"/>
		<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text></td>
		<td  style="height:24px;" width="70" align="right" valign="top">
			<xsl:choose>
				<xsl:when test=".//rowOne=''">
					<xsl:value-of select="format-number(.//rowFive div .//rowOne,'#0.0%')"/>
				</xsl:when>
				<xsl:otherwise>--</xsl:otherwise>
			</xsl:choose>
		<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text></td>
            </tr>
            <tr>
		<td  style="height:24px;" width="70" align="left" valign="top">
		   20 or more
		<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text></td>
		<td  style="height:24px;" width="70" align="right" valign="top">
			<xsl:value-of select="format-number(.//rowSix, '###,##0')"/>
		<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text></td>
		<td  style="height:24px;" width="70" align="right" valign="top">
			<xsl:choose>
				<xsl:when test=".//rowOne=''">
					<xsl:value-of select="format-number(.//rowSix div .//rowOne,'#0.0%')"/>
				</xsl:when>
				<xsl:otherwise>--</xsl:otherwise>
			</xsl:choose>
		<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text></td>
            </tr>
            <tr>
		<td  style="height:24px;" width="70" align="left" valign="top">
		   30 or more
		<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text></td>
		<td  style="height:24px;" width="70" align="right" valign="top">
			<xsl:value-of select="format-number(.//rowSeven, '###,##0')"/>
		<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text></td>
		<td  style="height:24px;" width="70" align="right" valign="top">
			<xsl:choose>
				<xsl:when test=".//rowOne=''">
					<xsl:value-of select="format-number(.//rowSeven div .//rowOne,'#0.0%')"/>
				</xsl:when>
				<xsl:otherwise>--</xsl:otherwise>
			</xsl:choose>
		<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text></td>
            </tr>
            <tr>
		<td  style="height:24px;" width="70" align="left" valign="top">
		   50 or more
		<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text></td>
		<td  style="height:24px;" width="70" align="right" valign="top">
			<xsl:value-of select="format-number(.//rowEight, '###,##0')"/>
		<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text></td>
		<td  style="height:24px;" width="70" align="right" valign="top">
			<xsl:choose>
				<xsl:when test=".//rowOne=''">
					<xsl:value-of select="format-number(.//rowEight div .//rowOne,'#0.0%')"/>
				</xsl:when>
				<xsl:otherwise>--</xsl:otherwise>
			</xsl:choose>
		<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text></td>
            </tr>
            <tr>
		<td  style="height:24px;" width="70" align="left" valign="top">
		   75 or more
		<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text></td>
		<td  style="height:24px;" width="70" align="right" valign="top">
			<xsl:value-of select="format-number(.//rowNine, '###,##0')"/>
		<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text></td>
		<td  style="height:24px;" width="70" align="right" valign="top">
			<xsl:choose>
				<xsl:when test=".//rowOne=''">
					<xsl:value-of select="format-number(.//rowNine div .//rowOne,'#0.0%')"/>
				</xsl:when>
				<xsl:otherwise>--</xsl:otherwise>
			</xsl:choose>
		<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text></td>
            </tr>
            <tr>
		<td  style="height:24px;" width="70" align="left" valign="top">
		   100 or more
		<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text></td>
		<td  style="height:24px;" width="70" align="right" valign="top">
			<xsl:value-of select="format-number(.//rowTen, '###,##0')"/>
		<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text></td>
		<td  style="height:24px;" width="70" align="right" valign="top">
			<xsl:choose>
				<xsl:when test=".//rowOne=''">
					<xsl:value-of select="format-number(.//rowTen div .//rowOne,'#0.0%')"/>
				</xsl:when>
				<xsl:otherwise>--</xsl:otherwise>
			</xsl:choose>
		<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text></td>
  	</tr>
	</tbody>
	</table>
<p>Figures are based on approved mission reports for active members of Command Pilot Status. Does not include staff members or airlines.</p>
<p>Current Membership Overview</p>
  <table style="width:210px; border-collapse:collapse; margin:8px 0 0;" border="1" cellpadding="2" bordercolor="#a6bee0">
	<tr>
		<td  style="height:24px;" width="140" align="left"><b>All Current Members as of today</b></td>
		<td  style="height:24px;" width="70" align="right"><xsl:value-of select="format-number(.//allCurrentMembers, '###,##0')"/><xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text></td>
	</tr>
	<tr>
		<td  style="height:24px;" width="140" align="left"><b>Command Pilots as of today</b></td>
		<td  style="height:24px;" width="70" align="right"><xsl:value-of select="format-number(.//allCurrentCommandPilots, '###,##0')"/><xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text></td>
	</tr>
	<tr>
		<td  style="height:24px;" width="140" align="left"><b>Current Command Pilots who have flown a mission (ever)</b></td>
		<td  style="height:24px;" width="70" align="right"><xsl:value-of select="format-number(.//membersWithMissions, '###,##0')"/><xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text></td>
	</tr>
	<tr>
		<td  style="height:24px;" width="140" align="left"><b>Current Command Pilots who have never flown a mission</b></td>
		<td  style="height:24px;" width="70" align="right"><xsl:value-of select="format-number(.//membersWithoutMissions, '###,##0')"/><xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text></td>
	</tr>
	<tr>
		<td  style="height:24px;" width="140" align="left"><b>Mission Legs flown during this period</b></td>
		<td  style="height:24px;" width="70" align="right"><xsl:value-of select="format-number(.//legCount, '###,##0')"/><xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text></td>
	</tr>
	<tr>
		<td  style="height:24px;" width="140" align="left"><b>Ave Legs/Current Member flown during this period</b></td>
		<td  style="height:24px;" width="70" align="right">			<xsl:choose>
			<xsl:when test=".//rowOne=''">
					<xsl:value-of select="format-number(number(.//legCount) div number(.//rowOne), '###,##0.0')"/>
				</xsl:when>
				<xsl:otherwise>--</xsl:otherwise>
			</xsl:choose>
			<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text></td>
	</tr>
	</table>
</xsl:template>

<xsl:template name="make-email-xref">
	<xsl:value-of select="concat('mailto:',email)"/>
</xsl:template>
</xsl:stylesheet>