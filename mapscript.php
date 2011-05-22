    <script src="http://bloggermint.com/demos/html5geo/files/h5utils.js"></script></head>
<body>
<section id="wrapper">
    <header>
          </header><meta name="viewport" content="width=620" />

<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script>
    <article>
      <p><span id="status"></span></p>
    </article>
<script>
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

	var lat = '/zipcode.php?zip=90028&lat=1';
	var lng = '/zipcode.php?zip=90028&lng=1';


  var latlng = new google.maps.LatLng(position.coords.latitude, position.coords.longitude);
  var latlng = new google.maps.LatLng(position.coords.latitude, position.coords.longitude);
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