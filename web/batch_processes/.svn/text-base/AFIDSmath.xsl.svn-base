<?xml version='1.0'?>
<xsl:stylesheet version="1.0"
	xmlns:xsl="http://www.w3.org/1999/XSL/Transform"
	xmlns:msxsl="urn:schemas-microsoft-com:xslt"
	xmlns:AFIDSmath="http://angelflight.org/AFIDSmath"
	xmlns:AFIDS="http://angelflight.org/AFIDS"
	extension-element-prefixes="AFIDS AFIDSmath msxsl">

<msxsl:script language="JavaScript" implements-prefix="AFIDSmath">
<![CDATA[
Number.prototype.toRad = function() {
	return this * Math.PI / 180;
}
Number.prototype.toDeg = function() {
	return this * 180 / Math.PI;
}
Number.prototype.toBrng = function() {
	return (this.toDeg()+360) % 360;
}

function dst(lat1,lon1,lat2,lon2) {
	lat1 = lat1.toRad(); lon1 = lon1.toRad();
	lat2 = lat2.toRad(); lon2 = lon2.toRad();
	return Math.acos(Math.sin(lat1)*Math.sin(lat2) +
	Math.cos(lat1)*Math.cos(lat2) *
	Math.cos(lon2-lon1)) *
	(180*60)/3.1415;
}
function tot_dst(lat1,lon1,lat2,lon2,lat3,lon3) {
	return dst(lat1,lon1,lat2,lon2) +
	dst(lat1,lon1,lat3,lon3) +
	dst(lat3,lon3,lat2,lon2);
	}
function eff(home_lat,home_lon,fa_lat,fa_lon,ta_lat,ta_lon) {
	return dst(fa_lat,fa_lon,ta_lat,ta_lon) / tot_dst(home_lat,home_lon,fa_lat,fa_lon,ta_lat,ta_lon) * 200;
}

]]>
</msxsl:script>
<msxsl:script language="JavaScript" implements-prefix="AFIDS">
<![CDATA[
function getDW(date) {
	dw = ["Sun","Mon","Tue","Wed","Thr","Fri","Sat","Sun"];

	thedate = new Date(date[0].value);
	return dw[thedate.getDay()];
}
]]>
</msxsl:script>
</xsl:stylesheet>
