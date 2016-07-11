$(document).ready(function(){
	
var lon = $('#lon').val();
var lat = $('#lat').val();
var tit = $('#tit').val();

$('map').gomap({
		
latitude: 45.53940,
longitude: -122.59025,
zoom: 15 ,
maptype: 'terrain',
scaleControl : true

});
		
$goMap.createMarker ({
latitude: lat,
longitude: lon,
title : tit,
html:{
	content: '<h2>You are seing<h2><p>'+ tit +'</p>',
	popup: true
}
});
});

