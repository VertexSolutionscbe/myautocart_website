<html>
<body onload="getLocation();">

<!-- <p id="demo"></p> -->
<p id="demo"></p>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
var x = document.getElementById("demo");

var la= document.getElementById("lat");
var lo= document.getElementById("lon");


function getLocation() {
  if (navigator.geolocation) {
    navigator.geolocation.getCurrentPosition(showPosition);
  } else { 
    x.innerHTML = "Geolocation is not supported by this browser.";
  }
}

function showPosition(position) {
        
  akey="c98c67233ac0bb";
  lat=position.coords.latitude;
  lon=position.coords.longitude;
  jurl= "https://us1.locationiq.com/v1/reverse.php?key="+akey+"&lat="+lat+"&lon="+lon+"&format=json";
var settings = {
"async": true,
"crossDomain": true,
"url": jurl,
"method": "GET"
}

$.ajax(settings).done(function (response) {
var city=response["address"]["state_district"];
var display_name=response["display_name"];
//x.innerHTML = "Latitude: " + position.coords.latitude + "<br>Longitude: " + position.coords.longitude + "<br> Location Name : " +city + " <br> Full Address : "+display_name;
x.innerHTML = "Location Name : " +city;
console.log(response);
console.log(city);
});
     
}
</script>

</body>
</html>
