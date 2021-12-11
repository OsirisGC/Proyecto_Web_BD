console.log("Map is running");
document.addEventListener("DOMContentLoaded", () => {
  mapboxgl.accessToken =
    "pk.eyJ1IjoibXJ0cnVuaXgiLCJhIjoiY2t3emFoY3l3MDNlOTJubXBlb2htZnI0cCJ9.E5QwerBruuNeyWBwBUc5Yg";
  var map = new mapboxgl.Map({
    container: "map",
    style: "mapbox://styles/mapbox/streets-v11",
    center: [-110.31337047639808,24.141812270469217], // starting position
    zoom: 12,
  });
  map.addControl(new mapboxgl.NavigationControl());
  const marker = new mapboxgl.Marker({
      draggable: false,
  }).setLngLat([-110.31337047639808,24.141812270469217]).addTo(map);
});
