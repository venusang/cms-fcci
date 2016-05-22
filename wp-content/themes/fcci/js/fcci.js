$.ajaxSetup({
	cache: false
});

$(document).ready(function() {
	// TAX ADVANTAGE ANALYZE
	$("#btnAnalyze").live("click", function(){

		//Validation 
		if ($.trim($("#txtZipCode").val()) == "" && $.trim($("#txtNumberOfEmployees").val()) == "") {
			$("#zipError").html("Please enter a zip code");
			$("#txtZipCode").focus();
			$("#employeesError").html("Please enter number of employees");
			return false;
		}

		if ($.trim($("#txtZipCode").val()) == "" && $.trim($("#txtNumberOfEmployees").val()) != "") {
			$("#zipError").html("Please enter a zip code");
			$("#employeesError").html("");
			$("#txtZipCode").focus();
			return false;
		}

		if ($.trim($("#txtZipCode").val()) != "" && $.trim($("#txtNumberOfEmployees").val()) == "") {
			$("#zipError").html("");
			$("#employeesError").html("Please enter number of employees");
			$("#txtNumberOfEmployees").focus();
			return false;
		}

		//Show loading messaging and hide analyze button
		$("#analysisWait").show();
		$("#btnAnalyze").hide();

		//AJAX call - cross domain - make sure API has JSONP capability
		$.ajax({
			url:"https://content.taxadvantage.us.com/Content/Analysis?industry="+$.URLEncode($("#ddlIndustries").val()) + "&zip=" + $.URLEncode($("#txtZipCode").val()) + "&count=" + $.URLEncode($("#txtNumberOfEmployees").val()),
			type:'GET',
			dataType:'jsonp',
			success: function(results){
				console.log(results);

				var theResults;

				theResults ='';
				theResults +='On average, clients matching your profile<br />save approximately ';
				theResults +='<span>';
				theResults += '$'+results;
				theResults += '</span> per year.';
				theResults +='<br />';
				// theResults +='<a href="#" onclick="return Undo();" class="howlink">Perform another calculation</a>';
				theResults +='<div id="btnUndo" onclick="return Undo();" class="howlink">Estimate Savings</div>';


				$("#analysisResult").html(theResults);
				$("#analysisWait").hide();
				$("#analysisResult").show();

			}
		});//end of ajax call

		return false;
	}); //end of anonymous function from btnAnalyze click event

	

	//Events for "i" (How is) module 
	show = true;
	$("#closeHowIs").live("click",closeHowIs);
	$("#howis").live( "click", closeHowIs);
	$("#howisdiv").live( "click", closeHowIs);
});  //end of document ready call


function closeHowIs(){
	if( show )
			$("#howisdiv").fadeIn("slow");
		else
			$("#howisdiv").fadeOut("slow");

		show = !show;

		return false;
}

function Undo() {
	$("#btnAnalyze").show();
	$("#analysisResult").hide();
	$("#txtZipCode").focus();
	$('#formAnalyze')[0].reset();
	document.getElementById("ddlIndusties").selectedIndex = 0;
	$("#txtZipCode").focus();
	$("#analysisResult").hide();
	return false;
}
$.extend({ URLEncode: function(c) {
	var o = ''; var x = 0; c = c.toString(); var r = /(^[a-zA-Z0-9_.]*)/;
	while (x < c.length) {
		var m = r.exec(c.substr(x));
		if (m != null && m.length > 1 && m[1] != '') {
			o += m[1]; x += m[1].length;
		} else {
			if (c[x] == ' ') o += '+'; else {
				var d = c.charCodeAt(x); var h = d.toString(16);
				o += '%' + (h.length < 2 ? '0' : '') + h.toUpperCase();
			} x++;
		}
	} return o;
},
	URLDecode: function(s) {
		var o = s; var binVal, t; var r = /(%[^%]{2})/;
		while ((m = r.exec(o)) != null && m.length > 1 && m[1] != '') {
			b = parseInt(m[1].substr(1), 16);
			t = String.fromCharCode(b); o = o.replace(m[1], t);
		} return o;
	}

//END OF TAX ADVANTAGE ANALYZE



});















/**
 * jQuery gMap - Google Maps API V3
 *
 * @url		http://github.com/marioestrada/jQuery-gMap
 * @author	Cedric Kastner <cedric@nur-text.de> and Mario Estrada <me@mario.ec>
 * @version	2.1
 */(function(a){a.fn.gMap=function(b,c){switch(b){case"addMarker":return a(this).trigger("gMap.addMarker",[c.latitude,c.longitude,c.content,c.icon,c.popup]);case"centerAt":return a(this).trigger("gMap.centerAt",[c.latitude,c.longitude,c.zoom])}opts=a.extend({},a.fn.gMap.defaults,b);return this.each(function(){var b=new google.maps.Map(this);$geocoder=new google.maps.Geocoder,opts.address?$geocoder.geocode({address:opts.address},function(a,c){a.length>0&&b.setCenter(a[0].geometry.location)}):opts.latitude&&opts.longitude?b.setCenter(new google.maps.LatLng(opts.latitude,opts.longitude)):a.isArray(opts.markers)&&opts.markers.length>0?opts.markers[0].address?$geocoder.geocode({address:opts.markers[0].address},function(a,c){a.length>0&&b.setCenter(a[0].geometry.location)}):b.setCenter(new google.maps.LatLng(opts.markers[0].latitude,opts.markers[0].longitude)):b.setCenter(new google.maps.LatLng(34.885931,9.84375)),b.setZoom(opts.zoom),b.setMapTypeId(google.maps.MapTypeId[opts.maptype]),map_options={scrollwheel:opts.scrollwheel},opts.controls===!1?a.extend(map_options,{disableDefaultUI:!0}):opts.controls.length!=0&&a.extend(map_options,opts.controls,{disableDefaultUI:!0}),b.setOptions(map_options);var c=new google.maps.Marker;marker_icon=new google.maps.MarkerImage(opts.icon.image),marker_icon.size=new google.maps.Size(opts.icon.iconsize[0],opts.icon.iconsize[1]),marker_icon.anchor=new google.maps.Point(opts.icon.iconanchor[0],opts.icon.iconanchor[1]),c.setIcon(marker_icon),opts.icon.shadow&&(marker_shadow=new google.maps.MarkerImage(opts.icon.shadow),marker_shadow.size=new google.maps.Size(opts.icon.shadowsize[0],opts.icon.shadowsize[1]),marker_shadow.anchor=new google.maps.Point(opts.icon.shadowanchor[0],opts.icon.shadowanchor[1]),c.setShadow(marker_shadow)),a(this).bind("gMap.centerAt",function(a,c,d,e){e&&b.setZoom(e),b.panTo(new google.maps.LatLng(parseFloat(c),parseFloat(d)))});var d;a(this).bind("gMap.addMarker",function(a,e,f,g,h,i){var j=new google.maps.LatLng(parseFloat(e),parseFloat(f)),k=new google.maps.Marker({position:j});h?(marker_icon=new google.maps.MarkerImage(h.image),marker_icon.size=new google.maps.Size(h.iconsize[0],h.iconsize[1]),marker_icon.anchor=new google.maps.Point(h.iconanchor[0],h.iconanchor[1]),k.setIcon(marker_icon),h.shadow&&(marker_shadow=new google.maps.MarkerImage(h.shadow),marker_shadow.size=new google.maps.Size(h.shadowsize[0],h.shadowsize[1]),marker_shadow.anchor=new google.maps.Point(h.shadowanchor[0],h.shadowanchor[1]),c.setShadow(marker_shadow))):(k.setIcon(c.getIcon()),k.setShadow(c.getShadow()));if(g){g=="_latlng"&&(g=e+", "+f);var l=new google.maps.InfoWindow({content:opts.html_prepend+g+opts.html_append});google.maps.event.addListener(k,"click",function(){d&&d.close(),l.open(b,k),d=l}),i&&l.open(b,k)}k.setMap(b)});for(var e=0;e<opts.markers.length;e++){marker=opts.markers[e];if(marker.address){marker.html=="_address"&&(marker.html=marker.address);var f=this;$geocoder.geocode({address:marker.address},function(b,c){return function(d,e){d.length>0&&a(c).trigger("gMap.addMarker",[d[0].geometry.location.lat(),d[0].geometry.location.lng(),b.html,b.icon])}}(marker,f))}else a(this).trigger("gMap.addMarker",[marker.latitude,marker.longitude,marker.html,marker.icon])}})},a.fn.gMap.defaults={address:"",latitude:0,longitude:0,zoom:1,markers:[],controls:[],scrollwheel:!1,maptype:"ROADMAP",html_prepend:'<div class="gmap_marker">',html_append:"</div>",icon:{image:"http://www.google.com/mapfiles/marker.png",shadow:"http://www.google.com/mapfiles/shadow50.png",iconsize:[20,34],shadowsize:[37,34],iconanchor:[9,34],shadowanchor:[6,34]}}})(jQuery)