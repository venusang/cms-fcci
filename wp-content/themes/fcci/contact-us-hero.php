<!-- HERO -->
<div class="heroWrapper">
	<div id="hero">
<style>
#map {
    width: 612px;
    height: 654px;
    position: absolute;
    top: 0;
    margin-left: 328px !important;
}
.page-id-276 #primary{
  width:325px;
  margin:0;
}
.page-id-276 input[type=text]{
  margin-bottom:5px !important;
}

#cntctfrm_contact_form input.text, #cntctfrm_contact_form textarea, #cntctfrm_contact_message, #cntctfrm_contact_name, #cntctfrm_contact_email, #cntctfrm_contact_subject{
  width:200px !important;
}
</style>
<div id="map"></div>
<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script>
<script>
function createMap() {

  var MRCStyles = [
    {
      featureType: "all",
      stylers: [
        { hue: "#000000" },
        { saturation: -100 },
        {lightness: -30}
      ]
    }
  ];

  var mapType = new google.maps.StyledMapType(MRCStyles,
    {name: "First Capital Consulting, Inc."});
//37.269174,-119.306607
//34.06188, -118.30751
//34.061751,-118.301113
//37.269174,-119.306607
//34.06085,-118.300788
  var mapOptions = {
    zoom: 15,
    center: new google.maps.LatLng(34.06085,-118.300788),
    disableDefaultUI: true,
    mapTypeControlOptions: {
      mapTypeIds: [google.maps.MapTypeId.ROADMAP, 'mrc_map']
    }
  };
  
  var map = new google.maps.Map(document.getElementById('map'),
    mapOptions);
  
  map.mapTypes.set('mrc_map', mapType);
  map.setMapTypeId('mrc_map');




    //var image = '/images/interface/marker.png';
    var myLatLng = new google.maps.LatLng(34.06085,-118.300788);
    var marker = new google.maps.Marker({
        position: myLatLng, 
        map: map
    });   

}

createMap();
</script>
	</div><!-- hero -->
</div><!-- heroWrapper -->
<!-- END OF HERO -->
