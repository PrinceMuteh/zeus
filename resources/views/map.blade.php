<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Display a marker</title>
  <script src="https://cdn.maptiler.com/maplibre-gl-js/v2.2.0-pre.2/maplibre-gl.js"></script>
  <link href="https://cdn.maptiler.com/maplibre-gl-js/v2.2.0-pre.2/maplibre-gl.css" rel="stylesheet" />
  <style>
    body {
      margin: 0;
      padding: 0;
    }

  </style>
</head>
<body>
  <div id="map"></div>
  <script>
      const key = 'oQJFVAhEHifhM8T2F9RE';
      const map = new maplibregl.Map({
        container: 'map', // container id
        style: `https://api.maptiler.com/maps/streets/style.json?key=${key}`, // style URL
        center: [12.550343, 55.665957], // starting position [lng, lat]
        zoom: 9, // starting zoom
      });
      map.addControl(new maplibregl.NavigationControl(), 'top-right');
  </script>
</body>
</html>
