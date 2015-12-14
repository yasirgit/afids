<xsl:stylesheet version="1.0" xmlns:xsl="http://www.w3.org/1999/XSL/Transform">
<xsl:include href="settings.xsl"/>
<xsl:include href="mission_waiver_afw.xsl"/>
<xsl:output method="html"/>
<xsl:template match="/">
<table border="0" cellpadding="2" width="525" cellspacing="0"><tr><td align="center"><span style="font-weight:bold;font-size:16pt;color:rgb(232, 53, 66)">Mission Itinerary</span></td></tr></table>
<table border="0" cellpadding="2" width="525" cellspacing="0">
	<tr nobr="true">
  	<td width="25%" align="left"><strong>Mission #: </strong><xsl:value-of select=".//externalID"/></td>
  	<td width="50%" align="center"><xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text></td>
    <td width="25%" align="right"><strong>Date: </strong><xsl:value-of select=".//Now"/></td>
	</tr>
	<tr nobr="true">
  	<td width="25%" align="left"><strong>Mission Date: </strong><xsl:value-of select=".//missionDate"/></td>
  	<td width="50%" align="center"><strong>Primary Coordinator: </strong><xsl:value-of select="concat(.//coordFirstName,' ',.//coordLastName)"/></td>
    <td width="25%" align="right">
    	<xsl:choose>
      	<xsl:when test=".//apptDate!=''">
        	<strong>Appointment Date/Time: </strong><xsl:value-of select=".//apptDate"/>
        </xsl:when>
        <xsl:otherwise>
        	<strong>Appointment Date/Time: </strong>N/A
        </xsl:otherwise>
    </xsl:choose>
    </td>
	</tr>
</table>

<hr/>

<!-- begin patient info -->
	<table border="0" cellpadding="2" width="525" cellspacing="0">
      <tr nobr="true">
        <td width="15%" valign="top" align="right"><strong>Name:</strong></td>
        <td width="35%" valign="top" align="left"><xsl:value-of select="concat(.//passFirstName,' ',.//passLastName)"/>
        <xsl:if test=".//passGender!=''">
        			<xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text>(<xsl:value-of select=".//passGender"/>)
        </xsl:if>
        <br/>DOB/Age: <xsl:value-of select=".//passDOB"/> (<xsl:value-of select=".//passAge"/>)
        <br/>Weight: <xsl:value-of select=".//passWeight"/>
        </td>
        <td width="15%" valign="top" align="right"><strong>Address:</strong></td>
        <td width="35%" valign="top" align="left">
           <xsl:value-of select=".//passAddressOne"/>
              <xsl:if test=".//passAddressTwo!=''">
                <br/><xsl:value-of select=".//passAddressTwo"/>
              </xsl:if>
           <br/><xsl:value-of select="concat(.//passCity,', ',.//passState,' ',.//passZipcode)"/>
        </td>
      </tr>
    <tr nobr="true">
        <td width="15%" valign="top" align="right"><strong>Contact:</strong></td>
        <td width="85%" valign="top" align="left" colspan="3">
        	<strong>Language:</strong><xsl:value-of select="concat(' ',.//languageSpoken)"/>
        	<br/><strong>Best Contact:</strong><xsl:value-of select="concat(' ',.//bestContactMethod)"/>
        </td>
    </tr>
      <tr nobr="true">
        <td width="15%" valign="top" align="right"><strong>Prim. Phone: </strong></td>
        <td width="35%" valign="top" align="left">
        <xsl:if test=".//passDayPhone!=''">
            <br/>Work: <xsl:value-of select="concat(.//passDayPhone,' ',.//passDayComment)"/>
        </xsl:if>
        <xsl:if test=".//passEvePhone!=''">
            <br/>Home: <xsl:value-of select="concat(.//passEvePhone,' ',.//passEveComment)"/>
        </xsl:if>
        <xsl:if test=".//passMobilePhone!=''">
            <br/>Cell: <xsl:value-of select="concat(.//passMobilePhone,' ',.//passMobileComment,' ')"/>
        </xsl:if>
    </td>
        <td width="15%" valign="top" align="right"><strong>Other:</strong></td>
        <td width="35%" valign="top" align="left">
        <xsl:if test=".//passPagerPhone!=''">
            <br/>Pager: <xsl:value-of select="concat(.//passPagerPhone,' ',.//passPagerComment,' ')"/>
        </xsl:if>        
        <xsl:if test=".//passOtherPhone!=''">
            <br/>Other: <xsl:value-of select="concat(.//passOtherPhone,' ',.//passOtherComment,' ')"/>
        </xsl:if>
        <xsl:if test=".//passFaxPhone!=''">
            <br/>Other: <xsl:value-of select="concat(.//passFaxPhone,' ',.//passFaxComment,' ')"/>
        </xsl:if>
        <xsl:if test=".//passEmail!=''">
	        	<br/>Email: <xsl:value-of select=".//passEmail"/>
	      </xsl:if>
        <xsl:if test=".//passPagerEmail!=''">
	        	<br/>Email: <xsl:value-of select=".//passPagerEmail"/>
	      </xsl:if>
        <xsl:if test=".//passSecondaryEmail!=''">
	        	<br/>Email: <xsl:value-of select=".//passSecondaryEmail"/>
	      </xsl:if>
    </td>
      </tr>
      <xsl:if test=".//parent!=''">
      <tr nobr="true">
        <td width="15%" valign="top" align="right"><strong>Parent:</strong></td>
        <td width="85%" valign="top" align="left" colspan="3"><xsl:value-of select=".//parent"/></td>
      </tr>
      </xsl:if>      
      <tr>
        <td width="15%" valign="top" align="right"><strong>Illness:</strong></td>
        <td width="85%" valign="top" align="left" colspan="3"><xsl:value-of select=".//illness"/></td>
      </tr>
    <tr nobr="true">
        <td width="15%" valign="top" align="right"><strong>Lodging:</strong></td>
        <td width="35%" valign="top" align="left"><xsl:value-of select=".//lodgingName"/>
            <xsl:if test=".//lodgingPhone!=''">
              <xsl:value-of select="concat(' ',.//lodgingPhone,' ',.//lodgingPhoneComment)"/>
            </xsl:if>
        </td>
        <td width="15%" valign="top" align="right"><strong>Treating Physician:</strong></td>
        <td width="35%" valign="top" align="left">
    				<xsl:value-of select=".//treatingPhysician"/>
    				<xsl:if test=".//treatingPhone!=''">
        		   Phone: <xsl:value-of select="concat(' ',.//treatingPhone)"/>
    				</xsl:if>
    				<xsl:if test=".//treatingFax1!=''">
        		   Fax: <xsl:value-of select="concat(' ',.//treatingFax1,' ',.//treatingFax1Comment)"/>
    				</xsl:if>
    				<xsl:if test=".//treatingEmail!=''">
        		   <xsl:value-of select="concat(' ',.//treatingEmail)"/>
    				</xsl:if>
    	   </td>
    </tr>
    
      <tr nobr="true">
        <td width="15%" valign="top" align="right"><strong>Destination:</strong></td>
        <td width="35%" valign="top" align="left"><xsl:value-of select=".//facilityName"/>
           <xsl:if test=".//facilityPhone!=''">
              <xsl:value-of select="concat(' ',.//facilityPhone,' ',.//facilityPhoneComment)"/>
           </xsl:if>
        </td>
        <td width="15%" valign="top" align="right"><strong>Releasing Physician:</strong></td>
        <td width="35%" valign="top" align="left">
           <xsl:value-of select=".//releasingPhysician"/>
           <xsl:if test=".//releasingPhone!=''">
              Phone: <xsl:value-of select="concat(' ',.//releasingPhone,' ',.//releasingComment)"/>
           </xsl:if>
           <xsl:if test=".//releasingFax1!=''">
              Fax: <xsl:value-of select="concat(' ',.//releasingFax1,' ',.//releasingFax1Comment)"/>
           </xsl:if>
           <xsl:if test=".//releasingEmail!=''">
              <xsl:value-of select="concat(' ',.//releasingEmail)"/>
           </xsl:if>
        </td>
      </tr>
      <!-- Emergency contact info -->
      <xsl:if test=".//releasingEmail!=''">
        <tr nobr="true">
           <td width="15%" valign="top" align="right"><strong>Emergency Contact:</strong></td>
           <td width="35%" valign="top" align="left">
              <xsl:value-of select=".//emergencyContactName"/>
              <xsl:if test=".//emergencyContactPrimaryPhone!=''">
                 Primary: <xsl:value-of select="concat(' ',.//emergencyContactPrimaryPhone,' ',.//emergencyContactPrimaryComment)"/>
              </xsl:if>
           </td>
           <td width="15%" valign="top" align="right"><strong>Secondary:</strong></td>
           <td width="35%" valign="top" align="left">
              <xsl:if test=".//emergencyContactSecondaryPhone!=''">
                 <xsl:value-of select="concat(' ',.//emergencyContactSecondaryPhone,' ',.//emergencyContactSecondaryComment)"/>
              </xsl:if>
           </td>
        </tr>
			</xsl:if>
      <!-- Requester info -->
      <tr nobr="true">
        <td width="15%" valign="top" align="right"><strong>Social Wkr: </strong></td>
        <td width="35%" valign="top" align="left">
        		<xsl:value-of select=".//requesterName"/>
        		<br/><xsl:value-of select=".//agencyName"/>
              <xsl:if test=".//agencyPhone!=''">
                <br/><xsl:value-of select="concat(.//agencyPhone,' ',.//agencyPhoneComment)"/>
              </xsl:if>
              <xsl:if test=".//reqEmail!=''">
                <br/><xsl:value-of select=".//reqEmail"/>
              </xsl:if>
              <xsl:if test=".//reqPagerEmail!=''">
                <br/><xsl:value-of select=".//reqPagerEmail"/>
              </xsl:if>
              <xsl:if test=".//reqSecondaryEmail!=''">
                <br/><xsl:value-of select=".//reqSecondaryEmail"/>
              </xsl:if>
        </td>
        <td width="15%" valign="top" align="right"><strong>Phone: </strong></td>
        <td width="35%" valign="top" align="left">
            <xsl:if test=".//reqDayPhone!=''">
                Work: <xsl:value-of select="concat(.//reqDayPhone,' ',.//reqDayComment,' ')"/>
            </xsl:if>
        <xsl:if test=".//reqEvePhone!=''">
            Home: <xsl:value-of select="concat(.//reqEvePhone,' ',.//reqEveComment,' ')"/>
        </xsl:if>
        <xsl:if test=".//reqMobilePhone!=''">
            Cell: <xsl:value-of select="concat(.//reqMobilePhone,' ',.//reqMobileComment,' ')"/>
        </xsl:if>
        <xsl:if test=".//reqPagerPhone!=''">
            Pager: <xsl:value-of select="concat(.//reqPagerPhone,' ',.//reqPagerComment,' ')"/>
        </xsl:if>
        <xsl:if test=".//reqOtherPhone!=''">
            Other: <xsl:value-of select="concat(.//reqOtherPhone,' ',.//reqOtherComment,' ')"/>
        </xsl:if>
        <xsl:if test=".//reqOtherPhone!=''">
            Fax: <xsl:value-of select="concat(.//reqFaxPhone,' ',.//reqFaxComment,' ')"/>
        </xsl:if>        
    </td>
      </tr>
    </table>
<!-- End Requester info -->

<!-- afse_jw_camp_05032005 Start -->
		<table border="0" cellpadding="2" width="525" cellspacing="0">
			<xsl:if test=".//campName!=''">
				<hr/>
				<table border="0" cellpadding="2" width="525" cellspacing="0">
					<tr nobr="true">
						<td>
							<strong>
								CAMP INFORMATION
							</strong>
						</td>
					</tr>
				</table>
				<table border="0" cellpadding="2" width="525" cellspacing="0">
					<tr>
						<td width="15%" valign="top" align="right">
							
								<strong>Camp name:</strong>
							
						</td>
						<td width="85%" colspan="3" valign="top" align="left">
							
								<xsl:value-of select=".//campName"/>
							
						</td>
					</tr>
					<tr>
						<td width="15%" valign="top" align="right">
							
								<strong>Flight Info:</strong>
							
						</td>
						<td width="85%" colspan="3" valign="top" align="left">
							
								<xsl:value-of select=".//flightInformation"/>
							
						</td>
					</tr>
					<xsl:if test=".//fboCampName">
					<tr>
						<td width="15%" valign="top" align="right">
							
								<strong>FBO (Ident):</strong>
							
						</td>
						<td width="35%" valign="top" align="left">
							
								<xsl:value-of select=".//fboCampName"/> (<xsl:value-of select=".//fboCampAirportIdent"/>)
							
						</td>
						<td width="15%" valign="top" align="right">
							
								<strong>FBO Phone:</strong>
							
						</td>
						<td width="35%" valign="top" align="left">
							
								<xsl:value-of select=".//fboCampPhone"/>
							
						</td>
					</tr>
					</xsl:if>
					<tr>
						<td width="15%" valign="top" align="right">
							
								<strong>Arrival Date:</strong>
							
						</td>
						<td width="35%" valign="top" align="left">
							
								<xsl:value-of select=".//arrivalDate"/>
							
						</td>
						<td width="15%" valign="top" align="right">
							
								<strong>Departure Date:</strong>
							
						</td>
						<td width="35%" valign="top" align="left">
							
								<xsl:value-of select=".//departureDate"/>
							
						</td>
					</tr>
					<tr>
						<td width="50%" colspan="2" valign="top" align="center">
							
								<strong>Camp Contact:</strong>
							
						</td>
						<td width="50%" colspan="2" valign="top" align="center">
							
								<strong>Add'l Camp Contacts:</strong>
							
						</td>
					</tr>
					<tr>
						<td width="15%" valign="top" align="right">
							
								<strong>Camp phone:</strong>
							
						</td>
						<td width="35%" valign="top" align="left">
							
								<xsl:value-of select=".//campLodgingPhone"/>
							
						</td>
						<td width="15%" valign="top" align="right">
							
								<strong>Contact info:</strong>
							
						</td>
						<td width="35%" valign="top" align="left">
							
								<xsl:value-of select=".//campLodgingName"/>
							
						</td>
					</tr>
					<tr>
						<td width="15%" valign="top" align="right">
							
								<strong>(description:)</strong>
							
						</td>
						<td width="35%" valign="top" align="left">
							
								<xsl:value-of select=".//campLodgingPhoneComment"/>
							
						</td>
						<td width="15%" valign="top" align="right">
							
								<strong>Add'l phone:</strong>
							
						</td>
						<td width="35%" valign="top" align="left">
							
								<xsl:value-of select="concat(.//campPhone,' ',.//campPhoneComment)"/>
							
						</td>
					</tr>
					<tr>
						<td width="15%" valign="top" align="right">
							<strong>
								Comment:
							</strong>
						</td>
						<td width="85%" colspan="3" valign="top" align="left">
							
								<xsl:value-of select=".//campComment"/>
							
						</td>
					</tr>
				</table>
			</xsl:if>
		</table>
<!-- AFSE_jw_show_camp_0503200500 Stop -->
<xsl:for-each select=".//record">
    <xsl:if test="not(preceding-sibling::node()[legNumber = current()/legNumber])">
    <table border="0" cellpadding="2" width="525" cellspacing="0" nobr="true">
      <tr nobr="true">
        <td colspan="4" bgcolor="rgb(200,200,200)"><font color="rgb(52, 121, 190)"><strong>Leg <xsl:value-of select="legNumber"/>:
    <xsl:choose>
        <xsl:when test="afaOrgName!=''">
            <xsl:value-of select="concat(afaOrgName,' -- ',afaOrgPhone)"/>
        </xsl:when>
        <xsl:otherwise>
            <xsl:value-of select="concat($organizationName,' -- ',$organizationPhone)"/>
        </xsl:otherwise>
    </xsl:choose>
    <xsl:if test="afaShareOrgName!=''">
        <xsl:value-of select="concat(' / ',afaShareOrgName,' -- ',afaShareOrgPhone)"/>
    </xsl:if>
    </strong></font></td>
      </tr>
      <tr>
        <td width="33%" valign="top" align="left"><strong>FROM: </strong><xsl:value-of select="fromAirportIdent"/>
        <xsl:choose>
            <xsl:when test="fromAirportGMTOffset=-8">(PT) GMT -8</xsl:when>
            <xsl:when test="fromAirportGMTOffset=-7">(MT) GMT -7</xsl:when>
            <xsl:when test="fromAirportGMTOffset=-6">(CT) GMT -6</xsl:when>
            <xsl:when test="fromAirportGMTOffset=-5">(ET) GMT -5</xsl:when>
        </xsl:choose>
    </td>
        <td width="33%" valign="top" align="left"><strong>Airport Name: </strong><xsl:value-of select="fromAirportName"/></td>
        <td width="33%" valign="top" align="left"><strong>City/St: </strong><xsl:value-of select="concat(fromAirportCity,', ',fromAirportState)"/></td>
      </tr>
      <tr>
        <td width="33%" valign="top" align="left"><strong>-->ETD: </strong> 
    			<xsl:choose>
            <xsl:when test="flightTime">
               <xsl:value-of select="flightTime"/>
            </xsl:when>
            <xsl:otherwise>
               <xsl:value-of select="etd"/>
            </xsl:otherwise>
          </xsl:choose></td>
        <td width="33%" valign="top" align="left">
        <strong>FBO:</strong>
        <xsl:if test="fboName">
            <xsl:value-of select="concat(' ',fboName,' (',fboAirportIdent,')')"/>
            <xsl:if test="fboFuelDiscount='True'">
                <br/><strong><font color="red">Ask About Fuel Discount</font></strong>
            </xsl:if>
        </xsl:if>
    </td>
        <td width="33%" valign="top" align="left"><strong>FBO Phone: </strong>
        <xsl:value-of select="fboPhone"/>
    </td>
      </tr>
      <tr nobr="true">
        <td width="33%" valign="top" align="left"><strong>TO: </strong><xsl:value-of select="toAirportIdent"/>
        <xsl:choose>
            <xsl:when test="toAirportGMTOffset=-8">(PT) GMT -8</xsl:when>
            <xsl:when test="toAirportGMTOffset=-7">(MT) GMT -7</xsl:when>
            <xsl:when test="toAirportGMTOffset=-6">(CT) GMT -6</xsl:when>
            <xsl:when test="toAirportGMTOffset=-5">(ET) GMT -5</xsl:when>
        </xsl:choose>
    </td>
        <td width="33%" valign="top" align="left"><strong>Airport Name: </strong><xsl:value-of select="toAirportName"/></td>
        <td width="33%" valign="top" align="left"><strong>City/St: </strong><xsl:value-of select="concat(toAirportCity,', ',toAirportState)"/></td>
      </tr>
      <tr nobr="true">
        <td width="33%" valign="top" align="left"><strong>-->ETA: </strong><xsl:value-of select="eta"/></td>
<!-- AFSE_2005070300_jw_add_FBODest Start -->
       <td width="33%" valign="top" align="left">
        <strong>FBO: </strong>
        <xsl:if test="fboDestName">
            <xsl:value-of select="concat(fboDestName,' (',fboDestAirportIdent,')')"/>
            <xsl:if test="fboDestFuelDiscount='True'">
                <br/><strong><font color="red">Ask About Fuel Discount</font></strong>
            </xsl:if>
        </xsl:if>
    </td>
        <td width="33%" valign="top" align="left"><strong>FBO Phone: </strong>
        <xsl:value-of select="fboDestPhone"/>
    </td>
<!-- AFSE_2005070300_jw_add_FBODest Stop -->
      </tr>
      <tr nobr="true">
        <td width="33%" valign="top" align="left"><strong>Pilot: </strong> 
    <xsl:choose>
             <xsl:when test="pilotLastName!=''">
            <xsl:value-of select="concat(pilotFirstName,' ',pilotLastName)"/>
        </xsl:when>
             <xsl:when test="pilotName!=''">
            <xsl:value-of select="pilotName"/>
        </xsl:when>
        <xsl:otherwise>
            <i>Not Assigned</i>
        </xsl:otherwise>
    </xsl:choose></td>
    <td width="66%" colspan="2" valign="top" align="left"><strong>Phone: </strong>
    <xsl:if test="pilotDayPhone!=''">
        <xsl:value-of select="concat(' Work: ',pilotDayPhone,' ',pilotDayComment)"/><br/>
    </xsl:if>
    <xsl:if test="pilotEvePhone!=''">
        <xsl:value-of select="concat(' Home: ',pilotEvePhone,' ',pilotEveComment)"/><br/>
    </xsl:if>
    <xsl:if test="pilotFaxPhone!=''">
        <xsl:value-of select="concat(' Fax: ',pilotFaxPhone,' ',pilotFaxComment)"/><br/>
    </xsl:if>
    <xsl:if test="pilotMobilePhone!=''">
        <xsl:value-of select="concat(' Cell: ',pilotMobilePhone,' ',pilotMobileComment)"/><br/>
    </xsl:if>
    <xsl:if test="pilotPagerPhone!=''">
        <xsl:value-of select="concat(' Pager: ',pilotPagerPhone,' ',pilotPagerComment)"/><br/>
    </xsl:if>
    <xsl:if test="pilotEmail!=''">
        <xsl:value-of select="concat(' Email: ',pilotEmail)"/><br/>
    </xsl:if>
    <xsl:if test="pilotPagerEmail!=''">
        <xsl:value-of select="concat(' Pager Email: ',pilotPagerEmail)"/>
    </xsl:if>
    <xsl:if test="pilotSecondaryEmail!=''">
        <xsl:value-of select="concat(' Secondary Email: ',pilotSecondaryEmail)"/><br/>
    </xsl:if>    
    <xsl:if test="afaDayPhone!=''">
        <xsl:value-of select="concat(' Day: ',afaDayPhone)"/><br/>
    </xsl:if>
    <xsl:if test="afaNightPhone!=''">
        <xsl:value-of select="concat(' Eve: ',afaNightPhone)"/><br/>
    </xsl:if>
    <xsl:if test="afaFaxPhone!=''">
        <xsl:value-of select="concat(' Fax: ',afaFaxPhone)"/><br/>
    </xsl:if>
    <xsl:if test="afaMobilePhone!=''">
        <xsl:value-of select="concat(' Mobile: ',afaMobilePhone)"/><br/>
    </xsl:if>
    </td>
      </tr>
      <tr nobr="true">
        <td width="33%" valign="top" align="left"><strong>-->Aircraft: </strong>
    <xsl:choose>
        <xsl:when test="aircraftMake!=''">
            <xsl:value-of select="concat(aircraftMake,' ',aircraftModel)"/>
        </xsl:when>
        <xsl:otherwise>
            <xsl:value-of select="afaAircraft"/>
        </xsl:otherwise>
    </xsl:choose></td>
        <td width="33%" valign="top" align="left"><strong>N Number: </strong>
    <xsl:choose>
        <xsl:when test="aircraftNNumber!=''">
            <xsl:value-of select="aircraftNNumber"/>
        </xsl:when>
        <xsl:otherwise>
            <xsl:value-of select="afaNNumber"/>
        </xsl:otherwise>
    </xsl:choose></td>
        <td width="33%" valign="top" align="left">
    <xsl:choose>
        <xsl:when test="aircraftColor!=''">
            <strong>Color: </strong>
            <xsl:value-of select="aircraftColor"/>
        </xsl:when>
        <xsl:otherwise>
            <xsl:if test="aircraftSeats!=''">
                <xsl:value-of select="concat(' Seats: ',aircraftSeats)"/>
            </xsl:if> Ice: <strong>
            <xsl:choose> 
                <xsl:when test="aircraftKnownIce='True'">
                     Yes
                </xsl:when>
                <xsl:when test="aircraftKnownIce='False'">
                     No
                </xsl:when>
                <xsl:otherwise>
                    Unknown
                </xsl:otherwise>
            </xsl:choose></strong>
        </xsl:otherwise>
    </xsl:choose>
    </td>
 </tr>
<xsl:if test="copilotID">
 <tr nobr="true">
   <td width="33%" valign="top" align="left"><strong>Mission Assistant: </strong>
    <xsl:choose>
        <xsl:when test="coPilotLastName!=''">
            <xsl:value-of select="concat(coPilotFirstName,' ',coPilotLastName)"/>
        </xsl:when>
        <xsl:when test="coPilotName!=''">
            <xsl:value-of select="coPilotName"/>
        </xsl:when>
        <xsl:otherwise>
            <i>Not Assigned</i>
        </xsl:otherwise>
    </xsl:choose></td>
        <td width="66%" colspan="2" valign="top" align="left"><strong>Phone: </strong>
    <xsl:if test="coPilotDayPhone!=''">
        <xsl:value-of select="concat(' Work: ',coPilotDayPhone,' ',coPilotDayComment)"/>
    </xsl:if>
    <xsl:if test="coPilotEvePhone!=''">
        <xsl:value-of select="concat(' Home: ',coPilotEvePhone,' ',coPilotEveComment)"/>
    </xsl:if>
    <xsl:if test="coPilotFaxPhone!=''">
        <xsl:value-of select="concat(' Fax: ',coPilotFaxPhone,' ',coPilotFaxComment)"/>
    </xsl:if>
    <xsl:if test="coPilotMobilePhone!=''">
        <xsl:value-of select="concat(' Cell: ',coPilotMobilePhone,' ',coPilotMobileComment)"/>
    </xsl:if>
    <xsl:if test="coPilotPagerPhone!=''">
        <xsl:value-of select="concat(' Pager: ',coPilotPagerPhone,' ',coPilotPagerComment)"/>
    </xsl:if>
    <xsl:if test="coPilotMobilePhone!=''">
        <xsl:value-of select="concat(' Mobile: ',coPilotMobilePhone)"/>
    </xsl:if>
    <xsl:if test="coPilotPagerEcoPilotil!=''">
        <xsl:value-of select="concat(' Pager EcoPilotil: ',coPilotPagerEcoPilotil)"/>
    </xsl:if>
    <xsl:if test="coPilotSecondaryEcoPilotil!=''">
        <xsl:value-of select="concat(' Secondary EcoPilotil: ',coPilotSecondaryEcoPilotil)"/>
    </xsl:if>
    <xsl:choose>
    <xsl:when test="coPilotActive!=''">
        <br/>Membership: Active
        <xsl:value-of select="concat(' Flight Status: ',coPilotFlightStatus)"/>
		</xsl:when>
		<xsl:otherwise>
        <br/>Membership: Inactive
		</xsl:otherwise>
		</xsl:choose> 
    <xsl:if test="coPilotDateOfBirth!=''">
        <xsl:value-of select="concat(' DOB: ',coPilotDateOfBirth)"/>
    </xsl:if>
    <xsl:if test="coPilotWeight!=''">
        <xsl:value-of select="concat(' Weight: ',coPilotWeight)"/>
    </xsl:if>
    </td>
 </tr>
</xsl:if>
<xsl:if test="backuppilotID"> 
 <tr nobr="true">
   <td width="33%" valign="top" align="left"><strong>Backup Pilot: </strong>
    <xsl:choose>
        <xsl:when test="bupLastName!=''">
            <xsl:value-of select="concat(bupFirstName,' ',bupLastName)"/>
        </xsl:when>
        <xsl:otherwise>
            <i>Not Assigned</i>
        </xsl:otherwise>
    </xsl:choose></td>
        <td width="66%" colspan="2" valign="top" align="left"><strong>Phone: </strong>
    <xsl:if test="bupDayPhone!=''">
        <xsl:value-of select="concat(' Work: ',bupDayPhone,' ',bupDayComment)"/>
    </xsl:if>
    <xsl:if test="bupEvePhone!=''">
        <xsl:value-of select="concat(' Home: ',bupEvePhone,' ',bupEveComment)"/>
    </xsl:if>
    <xsl:if test="bupFaxPhone!=''">
        <xsl:value-of select="concat(' Fax: ',bupFaxPhone,' ',bupFaxComment)"/>
    </xsl:if>
    <xsl:if test="bupMobilePhone!=''">
        <xsl:value-of select="concat(' Cell: ',bupMobilePhone,' ',bupMobileComment)"/>
    </xsl:if>
    <xsl:if test="bupPagerPhone!=''">
        <xsl:value-of select="concat(' Pager: ',bupPagerPhone,' ',bupPagerComment)"/>
    </xsl:if>
    <xsl:if test="bupEmail!=''">
        <xsl:value-of select="concat(' Email: ',bupEmail)"/>
    </xsl:if>
    <xsl:if test="bupPagerEmail!=''">
        <xsl:value-of select="concat(' Pager Email: ',bupPagerEmail)"/>
    </xsl:if>
    <xsl:if test="bupSecondaryEmail!=''">
        <xsl:value-of select="concat(' Secondary Email: ',bupSecondaryEmail)"/>
    </xsl:if>
    <xsl:choose>
    <xsl:when test="bupActive!=''">
        <br/>Membership: Active
        <xsl:value-of select="concat(' Flight Status: ',bupFlightStatus)"/>
		</xsl:when>
		<xsl:otherwise>
        <br/>Membership: Inactive
		</xsl:otherwise>
		</xsl:choose> 
    <xsl:if test="bupDateOfBirth!=''">
        <xsl:value-of select="concat(' DOB: ',bupDateOfBirth)"/>
    </xsl:if>
    <xsl:if test="bupWeight!=''">
        <xsl:value-of select="concat(' Weight: ',bupWeight)"/>
    </xsl:if>
    </td>
 </tr>
</xsl:if>
<xsl:if test="backupCopilotID">
 <tr nobr="true">
   <td width="33%" valign="top" align="left">
      <strong>Backup Mission Assistant: </strong>
      <xsl:choose>
        <xsl:when test="bucLastName!=''">
            <xsl:value-of select="concat(bucFirstName,' ',bucLastName)"/>
        </xsl:when>
        <xsl:otherwise>
            <i>Not Assigned</i>
        </xsl:otherwise>
    </xsl:choose></td>
    <td width="66%" colspan="2" valign="top" align="left">
    <strong>Phone: </strong>
    <xsl:if test="bucDayPhone!=''">
        <xsl:value-of select="concat(' Work: ',bucDayPhone,' ',bucDayComment)"/>
    </xsl:if>
    <xsl:if test="bucEvePhone!=''">
        <xsl:value-of select="concat(' Home: ',bucEvePhone,' ',bucEveComment)"/>
    </xsl:if>
    <xsl:if test="bucFaxPhone!=''">
        <xsl:value-of select="concat(' Fax: ',bucFaxPhone,' ',bucFaxComment)"/>
    </xsl:if>
    <xsl:if test="bucMobilePhone!=''">
        <xsl:value-of select="concat(' Cell: ',bucMobilePhone,' ',bucMobileComment)"/>
    </xsl:if>
    <xsl:if test="bucPagerPhone!=''">
        <xsl:value-of select="concat(' Pager: ',bucPagerPhone,' ',bucPagerComment)"/>
    </xsl:if>
    <xsl:if test="bucEmail!=''">
        <xsl:value-of select="concat(' Email: ',bucEmail)"/>
    </xsl:if>
    <xsl:if test="bucPagerEmail!=''">
        <xsl:value-of select="concat(' Pager Email: ',bucPagerEmail)"/>
    </xsl:if>
    <xsl:if test="bucSecondaryEmail!=''">
        <xsl:value-of select="concat(' Secondary Email: ',bucSecondaryEmail)"/>
    </xsl:if>
    <xsl:choose>
    <xsl:when test="bucActive!=''">
        <br/>Membership: Active
        <xsl:value-of select="concat(' Flight Status: ',bucFlightStatus)"/>
		</xsl:when>
		<xsl:otherwise>
        <br/>Membership: Inactive
		</xsl:otherwise>
		</xsl:choose> 
    <xsl:if test="bucDateOfBirth!=''">
        <xsl:value-of select="concat(' DOB: ',bucDateOfBirth)"/>
    </xsl:if>
    <xsl:if test="bucWeight!=''">
        <xsl:value-of select="concat(' Weight: ',bucWeight)"/>
    </xsl:if>
    </td>
 </tr>
</xsl:if>
</table>
</xsl:if>
</xsl:for-each>
<p><xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text></p>
<!-- companions table -->
<table border="0" nobr="true"><tr nobr="true"><td>
<table border="1" cellpadding="4" width="525" cellspacing="0" nobr="true">
<tr nobr="true">
	<td colspan="5" style="background-color: rgb(200, 200, 200)" width="525" valign="top" align="center">
		<span style='font-weight:bold;color: rgb(232, 53, 66)'>
      COMPANIONS AND MISSION WEIGHT
		</span>
	</td>
</tr>
<tr nobr="true">
	<td width="120" valign="top" align="left">Companion name</td>
  <td width="120" valign="top" align="left">Relationship</td>
  <td width="100" valign="top" align="left">DOB</td>
  <td width="100" valign="top" align="left">Weight</td>
  <td width="85" valign="top" align="left">Phone</td>
</tr>
<xsl:if test=".//companionName!=''">
<xsl:for-each select=".//record">
   <xsl:if test="not(preceding-sibling::node()[companionName = current()/companionName])">
			<tr nobr="true">
        <td width="120" valign="top" align="left"><xsl:value-of select="companionName"/><xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text></td>
        <td width="120" valign="top" align="left"><xsl:value-of select="relationship"/><xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text></td>
        <td width="100" valign="top" align="left">
          <xsl:choose>
            <xsl:when test="companionDOB!=''">
                <xsl:value-of select="concat(companionDOB,' (',companionAge,')')"/>
            </xsl:when>
            <xsl:otherwise>N/A</xsl:otherwise>
        </xsl:choose><xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text></td>
        <td width="100" valign="top" align="left">
          <xsl:choose>
            <xsl:when test="companionWeight!=''">
                <xsl:value-of select="companionWeight"/>
            </xsl:when>
            <xsl:otherwise>N/A</xsl:otherwise>
        </xsl:choose><xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text></td>
        <td width="85" valign="top" align="left">
          <xsl:choose>
            <xsl:when test="companionPhone!=''">
							<xsl:value-of select="concat(companionPhone,' ',companionPhoneComment)"/>
            </xsl:when>
            <xsl:otherwise>N/A</xsl:otherwise>
          </xsl:choose>
        <xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text></td>
      </tr>
   </xsl:if>
</xsl:for-each>
</xsl:if>
      <tr nobr="true">
        <td width="340" colspan="3" valign="top" align="left"><strong>Baggage: </strong><xsl:value-of select=".//baggageDesc"/></td>
        <td width="100" valign="top" align="left"><xsl:value-of select="number(.//baggageWeight)"/></td>
        <td width="85"><xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text></td>
      </tr>
      <tr nobr="true">
        <td width="340" valign="top" align="right"><strong>Total Mission Weight (passenger, companion(s), baggage): </strong></td>
        <td width="100" valign="top" align="left"><xsl:value-of select="number(.//baggageWeight) + number(.//passWeight) + sum(//record[legNumber = '1']/companionWeight)"/></td>
        <td width="85"><xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text></td>
      </tr>
</table>
</td></tr></table>
<!-- end companions table -->
<p><xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text></p>
<table border="0" cellpadding="2" width="525" cellspacing="0">
	<tr nobr="true">
		<td colspan="4" style="background-color: rgb(200, 200, 200)" width="524" valign="top" align="center">
			<span style='font-weight:bold;color: rgb(232, 53, 66)'>COMMENTS AND OTHER INFORMATION</span>
		</td>
  </tr>
      <xsl:if test=".//publicConsiderations!=''">
      <tr nobr="true">
        <td width="75" valign="top" align="right"><strong>Pub. Cons.:</strong></td>
        <td valign="top" align="left" width="450"><xsl:value-of select=".//publicConsiderations"/></td>
      </tr>
      </xsl:if>
      <xsl:if test=".//privateConsiderations!=''">
      <tr nobr="true">
        <td width="75" valign="top" align="right"><strong>Priv. Cons.:</strong></td>
        <td valign="top" align="left" width="450"><xsl:value-of select=".//privateConsiderations"/></td>
      </tr>
      </xsl:if>
      <xsl:if test=".//comment!=''">
      <tr nobr="true">
        <td width="75" valign="top" align="right"><strong>Comments:</strong></td>
        <td valign="top" align="left" width="450"><xsl:value-of select=".//comment"/></td>
      </tr>
      </xsl:if>
      <xsl:if test=".//missionSpecificComments!=''">
      <tr nobr="true">
        <td width="75" valign="top" align="right"><strong>Mission Comments:</strong></td>
        <td valign="top" align="left" width="450"><xsl:value-of select=".//missionSpecificComments"/></td>
      </tr>
      </xsl:if>
      <xsl:if test=".//groundTransportationComment!=''">
      <tr nobr="true">
        <td width="75" valign="top" align="right"><strong>Ground Xport:</strong></td>
        <td width="450" valign="top" align="left" colspan="3"><xsl:value-of select=".//groundTransportationComment"/></td>
      </tr>
      </xsl:if>
    </table>

<p style='page-break-after:always'><xsl:text disable-output-escaping="yes">&amp;nbsp;</xsl:text></p>
<xsl:apply-templates select="/" mode="mission_waiver_afw"/>
</xsl:template>
</xsl:stylesheet>
