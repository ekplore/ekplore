    <script src="http://bloggermint.com/demos/html5geo/files/h5utils.js"></script></head>
<body>
<section id="wrapper">
    <header>
          </header><meta name="viewport" content="width=620" />
          <script src="http://code.jquery.com/jquery-latest.js"></script>

<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script>
    <article>
      <p><span id="status"></span></p>
    </article>
    
<script>
jQuery.download = function(url, data, method){
	//url and data options required
	if( url && data ){ 
		//data can be string of parameters or array/object
		data = typeof data == 'string' ? data : jQuery.param(data);
		//split params into form inputs
		var inputs = '';
		jQuery.each(data.split('&'), function(){ 
			var pair = this.split('=');
			inputs+='<input type="hidden" name="'+ pair[0] +'" value="'+ pair[1] +'" />'; 
		});
		//send request
		jQuery('<form action="'+ url +'" method="'+ (method||'get') +'">'+inputs+'</form>')
		.appendTo('body').submit().remove();
	};
};

function success(position) {
  var s = document.querySelector('#status');

  if (s.className == 'success') {
    // not sure why we're hitting this twice in FF, I think it's to do with a cached result coming back
    return;
  }

  s.innerHTML = "";
  s.className = 'success';

  var mapcanvas = document.createElement('div');
  mapcanvas.id = 'mapcanvas';
  mapcanvas.style.height = '370px';
  mapcanvas.style.width = '100%';

  document.querySelector('article').appendChild(mapcanvas);

//	var lat = $.get("zipcode.php", {zip: "90028", lat: "1"});
//	var lng = $.download('http://beta.ekplore.com/zipcode.php','zip=90028&lng=1');
	//console.log(lng);
	
	var lat=<?php echo $lat; ?>;
	var lng=<?php echo $lng; ?>;
	

  var latlng = new google.maps.LatLng(lat, lng);//position.coords.latitude, position.coords.longitude);
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
}

function error(msg) {
  var s = document.querySelector('#status');
  s.innerHTML = typeof msg == 'string' ? msg : "failed";
  s.className = 'fail';

  // console.log(arguments);
}

if (navigator.geolocation) {
  navigator.geolocation.getCurrentPosition(success, error);
} else {
  error('not supported');
}

</script>
</section>
<script src="http://bloggermint.com/demos/html5geo/files/prettify.packed.js"></script>