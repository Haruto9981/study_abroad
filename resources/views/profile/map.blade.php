<head>
    <script src="https://polyfill.io/v3/polyfill.min.js?features=default"></script>
    <link rel="stylesheet" type="text/css" href="{{ asset('/css/style.css') }}" />
    <script type="module" src="{{ asset('/js/index.js') }}"></script>
</head>

<x-app-layout>
    <body>
      <br>
        <input
          id="pac-input"
          class="controls"
          type="text"
          placeholder="SearchBox"
        />
        <div id="map"></div>
    
        <!-- 
          The `defer` attribute causes the callback to execute after the full HTML
          document has been parsed. For non-blocking uses, avoiding race conditions,
          and consistent behavior across browsers, consider loading using Promises.
          See https://developers.google.com/maps/documentation/javascript/load-maps-js-api
          for more information.
          -->
        <script
          src="https://maps.googleapis.com/maps/api/js?key={{ config('services.google-map.apikey') }}&callback=initAutocomplete&libraries=places&v=weekly"
          defer
        ></script>
    </body>
</x-app-layout>