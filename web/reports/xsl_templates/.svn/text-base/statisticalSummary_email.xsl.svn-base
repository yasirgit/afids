<xsl:stylesheet version="1.0" xmlns:xsl="http://www.w3.org/1999/XSL/Transform">
<xsl:output method="html" />
<xsl:strip-space elements="*"/>

<xsl:variable name="noMonths" select=".//record[last()]/monthNo"/>

<xsl:template match="/">
<p><span style="font-weight:bold;font-size:12pt;color: rgb(52, 121, 190);">Statistical Summary</span></p>
<table style="border-collapse:collapse; margin:8px 0 0;" border="1" cellpadding="2" bordercolor="#a6bee0" width="600">
<tbody>
<tr>
	<td  style="height:16px;" width="200" align="right" valign="top">Mission Legs Scheduled:</td>
	<td  style="height:16px;" width="100" align="right"><xsl:value-of select="format-number(.//legsScheduled,'#,###')"/></td>
	<td  style="height:16px;" width="300" align="left"><xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text></td>
</tr>
<tr>
	<td  style="height:16px;" width="200" align="right" valign="top">Canceled:</td>
	<td  style="height:16px;" width="100" align="right"><xsl:value-of select="format-number(.//legsCancelled,'#,###')"/></td>
	<td  style="height:16px;" width="300" align="left"><xsl:value-of select="format-number(.//legsCancelled div .//legsScheduled,'###.#%')"/> of legs scheduled</td>
</tr>
<tr>
	<td  style="height:16px;" width="200" align="right" valign="top">Flown:</td>
	<td  style="height:16px;" width="100" align="right"><xsl:value-of select="format-number(.//legsFlown,'#,###')"/></td>
	<td  style="height:16px;" width="300" align="left"><xsl:value-of select="format-number(.//legsFlown div .//legsScheduled,'###.#%')"/> of legs scheduled</td>
</tr>
<tr>
	<td  style="height:16px;" width="200" align="right" valign="top">Missions Flown:</td>
	<td  style="height:16px;" width="100" align="right"><xsl:value-of select="format-number(.//missionCount,'#,###')"/></td>
	<td  style="height:16px;" width="300" align="left">100.0%</td>
</tr>
<tr>
	<td  style="height:16px;" width="200" align="right" valign="top">Multiple Leg Missions:</td>
	<td  style="height:16px;" width="100" align="right"><xsl:value-of select="format-number(.//multilegMissionCount,'#,###')"/></td>
	<td  style="height:16px;" width="300" align="left"><xsl:value-of select="format-number(.//multilegMissionCount div .//missionCount,'###.#%')"/> of all missions</td>
</tr>
<tr>
	<td  style="height:16px;" width="200" align="right" valign="top">Linking Missions:</td>
	<td  style="height:16px;" width="100" align="right"><xsl:value-of select="format-number(.//otherOrgLegs,'#,###')"/></td>
	<td  style="height:16px;" width="300" align="left"><xsl:value-of select="format-number(.//otherOrgLegs div .//missionCount,'###.#%')"/> of all missions</td>
</tr>
<tr>
	<td  style="height:16px;" width="200" align="right" valign="top">Total Hours Flown:</td>
	<td  style="height:16px;" width="100" align="right"><xsl:value-of select="format-number(.//hoursFlown,'#,###')"/></td>
	<td  style="height:16px;" width="300" align="left">Ave: <xsl:value-of select="format-number((.//hoursFlown div .//legsFlown),'###.#')"/> hrs./mission leg</td>
</tr>
<tr>
	<td  style="height:16px;" width="200" align="right" valign="top">Total Distance Flown (nm):</td>
	<td  style="height:16px;" width="100" align="right"><xsl:value-of select="format-number(.//nauticalMilesFlown,'#,###')"/></td>
	<td  style="height:16px;" width="300" align="left">Ave: <xsl:value-of select="format-number((.//nauticalMilesFlown div .//legsFlown),'#,###')"/> nm per mission leg</td>
</tr>
<tr>
	<td  style="height:16px;" width="200" align="right" valign="top">Total Cost:</td>
	<td  style="height:16px;" width="100" align="right">$<xsl:value-of select="format-number(.//costValue,'#,###')"/></td>
	<td  style="height:16px;" width="300" align="left">Ave: $<xsl:value-of select="format-number((.//costValue div .//legsFlown),'#,###')"/>/mission leg</td>
</tr>
<tr>
	<td  style="height:16px;" width="200" align="right" valign="top">Pilot Services:</td>
	<td  style="height:16px;" width="100" align="right">$<xsl:value-of select="format-number(.//pilotValue,'#,###')"/></td>
	<td  style="height:16px;" width="300" align="left">Ave: $<xsl:value-of select="format-number((.//pilotValue div .//legsFlown),'#,###')"/>/mission leg</td>
</tr>
<tr>
	<td  style="height:16px;" width="200" align="right" valign="top">Tickets Purchased:</td>
	<td  style="height:16px;" width="100" align="right">$<xsl:value-of select="format-number(.//ticketValue,'#,###')"/></td>
	<td  style="height:16px;" width="300" align="left"><xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text></td>
</tr>
<tr>
	<td  style="height:16px;" width="200" align="right" valign="top">Child Mission Legs:</td>
	<td  style="height:16px;" width="100" align="right"><xsl:value-of select="format-number(.//childMissionLegs,'#,###')"/></td>
	<td  style="height:16px;" width="300" align="left">Ave: <xsl:value-of select="format-number((.//childMissionLegs div .//legsFlown) * 100,'###.#')"/>% of all legs</td>
</tr>
<tr>
	<td  style="height:16px;" width="200" align="right" valign="top">Unique Passengers Served:</td>
	<td  style="height:16px;" width="100" align="right"><xsl:value-of select="format-number(.//passengersFlown,'#,###')"/></td>
	<td  style="height:16px;" width="300" align="left">Ave: <xsl:value-of select="format-number((.//legsFlown div .//passengersFlown),'###.#')"/> mission legs(s)/pass.</td>
</tr>
<tr>
	<td  style="height:16px;" width="200" align="right" valign="top">Unique Child Passengers Served:</td>
	<td  style="height:16px;" width="100" align="right"><xsl:value-of select="format-number(.//uniqueChildPassengers,'#,###')"/></td>
	<td  style="height:16px;" width="300" align="left">Ave: <xsl:value-of select="format-number(.//uniqueChildPassengers div .//passengersFlown,'###.#%')"/> Child passengers as a % of all passengers flown.</td>
</tr>
<tr>
	<td  style="height:16px;" width="200" align="right" valign="top">Unique Companions Served:</td>
	<td  style="height:16px;" width="100" align="right"><xsl:value-of select="format-number(.//companionsFlown,'#,###')"/></td>
	<td  style="height:16px;" width="300" align="left"><xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text></td>
</tr>
<tr>
	<td  style="height:16px;" width="200" align="right" valign="top">Unique Souls Served:</td>
	<td  style="height:16px;" width="100" align="right"><xsl:value-of select="format-number(.//passengersFlown + .//companionsFlown,'#,###')"/></td>
	<td  style="height:16px;" width="300" align="left"><xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text></td>
</tr>
<tr>
	<td  style="height:16px;" width="200" align="right" valign="top">Unique Requesters Served:</td>
	<td  style="height:16px;" width="100" align="right"><xsl:value-of select="format-number(.//requestersServed,'#,###')"/></td>
	<td  style="height:16px;" width="300" align="left">Ave: <xsl:value-of select="format-number((.//legsFlown div .//requestersServed),'###.#')"/> mission leg(s)/req.</td>
</tr>
<tr>
	<td  style="height:16px;" width="200" align="right" valign="top">New Members Joined:</td>
	<td  style="height:16px;" width="100" align="right"><xsl:value-of select="format-number(.//newMembers,'#,###')"/></td>
	<td  style="height:16px;" width="300" align="left"><xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text></td>
</tr>
</tbody>
</table>
<p>Notes:</p>
<ul>
<li>Mission Legs Scheduled: All mission legs entered for that period. Does not include other organization legs.</li>
<li>Canceled: Canceled mission legs. Does not include other organization legs.</li>
<li>Flown: Mission legs not canceled with approved mission reports. Does not include other organization legs. Does include legs for which commercial tickets were purchased.</li>
<li>Missions Flown: Number of missions flown where all legs have approved mission reports.</li>
<li>Multiple Leg Missions: Number of missions which have more than one leg.</li>
<li>Linking Missions: Number of missions in which one or more legs were other organization legs.</li>
<li>Total Hours: Hours flown on all mission legs which have approved mission reports. Does not include other organization Legs.</li>
<li>Total Distance: Sum of the distince in nautical miles between each origin and destination on all mission legs that have approved mission reports. Does not include other organization legs or legs for which commercial tickets were purchased.</li>
<li>Total Cost: Sum of the flight cost for all mission legs that have approved mission reports. Does not include the cost of purchased commercial tickets.</li>
<li>Pilot Services: Value of the pilot's time at $35 per flight hour.</li>
<li>Tickets purchased: Sum of all commercial tickets purchased.</li>
<li>Child Mission Legs: Mission Legs for passengers under 18 at the time of the mission. Does not include other organization legs.</li>
<li>Unique Passengers served: Number of unique passengers on missions where all mission legs have approved mission reports.</li>
<li>Unique Child Passengers: Number of passengers served during this period who were under 18 at the time of their mission.</li>
<li>Unique requesters served: Number of unique requesters served during this period with missions where all mission legs have approved mission reports.</li>
<li>New members joined: Count of members whose join date was during the requested period.</li>
</ul>
</xsl:template>
</xsl:stylesheet>
