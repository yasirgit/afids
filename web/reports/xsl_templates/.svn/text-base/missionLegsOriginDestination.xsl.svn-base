<xsl:stylesheet version="1.0" xmlns:xsl="http://www.w3.org/1999/XSL/Transform">
<xsl:output method="html" />
<xsl:strip-space elements="*"/>

<xsl:template match="/">
<script type="text/javascript" charset="utf-8">
<![CDATA[			
			var oCache = {
				iCacheLower: -1
			};
			
			function fnSetKey( aoData, sKey, mValue )
			{
				for ( var i=0, iLen=aoData.length ; i<iLen ; i++ )
				{
					if ( aoData[i].name == sKey )
					{
						aoData[i].value = mValue;
					}
				}
			}
			
			function fnGetKey( aoData, sKey )
			{
				for ( var i=0, iLen=aoData.length ; i<iLen ; i++ )
				{
					if ( aoData[i].name == sKey )
					{
						return aoData[i].value;
					}
				}
				return null;
			}
			
			function fnDataTablesPipeline ( sSource, aoData, fnCallback ) {
				var iPipe = 5; /* Ajust the pipe size */
				
				var bNeedServer = false;
				var sEcho = fnGetKey(aoData, "sEcho");
				var iRequestStart = fnGetKey(aoData, "iDisplayStart");
				var iRequestLength = fnGetKey(aoData, "iDisplayLength");
				var iRequestEnd = iRequestStart + iRequestLength;
				oCache.iDisplayStart = iRequestStart;
				
				/* outside pipeline? */
				if ( oCache.iCacheLower < 0 || iRequestStart < oCache.iCacheLower || iRequestEnd > oCache.iCacheUpper )
				{
					bNeedServer = true;
				}
				
				/* sorting etc changed? */
				if ( oCache.lastRequest && !bNeedServer )
				{
					for( var i=0, iLen=aoData.length ; i<iLen ; i++ )
					{
						if ( aoData[i].name != "iDisplayStart" && aoData[i].name != "iDisplayLength" && aoData[i].name != "sEcho" )
						{
							if ( aoData[i].value != oCache.lastRequest[i].value )
							{
								bNeedServer = true;
								break;
							}
						}
					}
				}
				
				/* Store the request for checking next time around */
				oCache.lastRequest = aoData.slice();
				
				if ( bNeedServer )
				{
					if ( iRequestStart < oCache.iCacheLower )
					{
						iRequestStart = iRequestStart - (iRequestLength*(iPipe-1));
						if ( iRequestStart < 0 )
						{
							iRequestStart = 0;
						}
					}
					
					oCache.iCacheLower = iRequestStart;
					oCache.iCacheUpper = iRequestStart + (iRequestLength * iPipe);
					oCache.iDisplayLength = fnGetKey( aoData, "iDisplayLength" );
					fnSetKey( aoData, "iDisplayStart", iRequestStart );
					fnSetKey( aoData, "iDisplayLength", iRequestLength*iPipe );
					
					$.getJSON( sSource, aoData, function (json) { 
						/* Callback processing */
						oCache.lastJson = jQuery.extend(true, {}, json);
						
						if ( oCache.iCacheLower != oCache.iDisplayStart )
						{
							json.aaData.splice( 0, oCache.iDisplayStart-oCache.iCacheLower );
						}
						json.aaData.splice( oCache.iDisplayLength, json.aaData.length );
						
						fnCallback(json)
					} );
				}
				else
				{
					json = jQuery.extend(true, {}, oCache.lastJson);
					json.sEcho = sEcho; /* Update the echo for each response */
					json.aaData.splice( 0, iRequestStart-oCache.iCacheLower );
					json.aaData.splice( iRequestLength, json.aaData.length );
					fnCallback(json);
					return;
				}
			}
			
			$(document).ready(function() {
				$('#reportTable').dataTable( {
					"bProcessing": true,
					"bServerSide": true,
					"iDisplayLength": 25,
					"sAjaxSource": 'reports.php?reportDef=report_specs.xml&reportName=originDestinationLegs&action=display&responseformat=json&]]><xsl:value-of select=".//whereClause"/><![CDATA[',
					"fnServerData": fnDataTablesPipeline,
					"aoColumns": [
						{"sWidth":"60px"}, // mission
						{"sWidth":"60px","sType":"date"}, // date
						{"sWidth":"170px"}, // origin
						{"sWidth":"170px"}, // destination
						{"sWidth":"120px"}, // wing
					]
				} );
			} );
]]></script>
<div id="demo">
<table class="display" id="reportTable">
 <thead>
	<tr>
		<th align="left"><b>Mission</b></th>
		<th align="left"><b>Date</b></th>
		<th align="left"><b>Origin</b></th>
		<th align="left"><b>Destination</b></th>
		<th align="left"><b>Wing</b></th>
	</tr>
 </thead>
	<tbody>
		<tr>
			<td colspan="5" class="dataTables_empty">Loading data from server</td>
		</tr>
	</tbody>
	</table>
</div>
</xsl:template>
</xsl:stylesheet>
