@extends('layouts.bulma')
@section('stylesheet')
<link href='https://api.mapbox.com/mapbox-gl-js/v1.8.0/mapbox-gl.css' rel='stylesheet' />
@endsection
@section('body')
Welcome to Maps<br />

<div id='map' style='width: 800px; height: 600px;'></div>
m@tig2matig2rty2


@endsection




@push('script')
<!-- Replace the value of the key parameter with your own API key. -->
<script src='https://api.mapbox.com/mapbox-gl-js/v1.8.0/mapbox-gl.js'></script>
<script>
mapboxgl.accessToken = 'pk.eyJ1IjoiZ2l0YW1nYWR0YXVsYSIsImEiOiJjazd1YzNrbGowMTlrM2xwZHFsMmM2eW9zIn0.IBzj1D-LDjikK9wNvohMvA';
var map = new mapboxgl.Map({
container: 'map',
style: 'mapbox://styles/mapbox/streets-v11'
});
</script>

@endpush
