<!DOCTYPE html> 
<html>
  <head>
    <script src="http://code.jquery.com/jquery-1.4.2.min.js"></script>
    <script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script>
    <script>
		jQuery(window).ready(function(){
			jQuery("#btnInit").click(initiate_watchlocation);
			jQuery("#btnStop").click(stop_watchlocation);
		});

		var watchProcess = null;
	  
		function initiate_watchlocation() {
			if (watchProcess == null) {
				watchProcess = navigator.geolocation.watchPosition(handle_geolocation_query, handle_errors);
			}
		}

		function stop_watchlocation() {
			if (watchProcess != null)
			{
				navigator.geolocation.clearWatch(watchProcess);
				watchProcess = null;
			}
		}
	  
		function handle_errors(error)
		{
			switch(error.code)
			{
				case error.PERMISSION_DENIED: alert("user did not share Geolocation data");
				break;

				case error.POSITION_UNAVAILABLE: alert("could not detect current position");
				break;

				case error.TIMEOUT: alert("retrieving position timedout");
				break;

				default: alert("unknown error");
				break;	
			}
		}
	  
		function handle_geolocation_query(position) {
			var text = "Latitude: "  + position.coords.latitude  + "<br/>" +
			            "Longitude: " + position.coords.longitude + "<br/>" +
			            "Accuracy: "  + position.coords.accuracy  + "m<br/>" +
			            "Time: " + new Date(position.timestamp);
			jQuery("#info").html(text);

			var image_url = "http://maps.google.com/maps/api/staticmap?sensor=false&center=" + position.coords.latitude + ',' + position.coords.longitude + 
							"&zoom=14&size=300x400&markers=color:blue|label:S|" + position.coords.latitude + ',' + position.coords.longitude;
			
			  var myOptions = {
    zoom: 15,
    center: latlng,
    mapTypeControl: false,
    navigationControlOptions: {style: google.maps.NavigationControlStyle.SMALL},
    mapTypeId: google.maps.MapTypeId.ROADMAP
  };
  var map = new google.maps.Map(document.getElementById("mapcanvas"), myOptions);

  var marker = new google.maps.Marker({
      position: latlng,
      map: map,
      title:""
  });
  
			jQuery("#map").remove();
			jQuery(document.body).append(
			  jQuery(document.createElement("img")).attr("src", image_url).attr('id','map')
			);
		}
    </script>
  </head>
  <body>
    <div>
      <button id="btnInit" >Monitor my location</button>
      <button id="btnStop" >Stop monitoring</button>
    </div>
    <div id="info">
    </div>
  </body>
</html>
