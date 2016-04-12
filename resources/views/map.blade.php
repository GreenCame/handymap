@extends('layouts.app')

@section('links')
    <link rel="stylesheet" href="{{URL::asset('assets/css/map.css')}}">
@endsection

@section('content')
<input id="pac-input" class="controls" type="text" placeholder="Search Box">
<input id="origin-input" class="controls" type="text"
       placeholder="Enter an origin location">
<input id="destination-input" class="controls" type="text"
       placeholder="Enter a destination location">
<div id="map"></div>
@endsection

@section('scripts')
    <script type="text/javascript" src="{{URL::asset('assets/js/googleMap.js')}}"></script>
    <!--Google api-->
    <script src="https://maps.googleapis.com/maps/api/js?signed_in=true&amp;&key=AIzaSyD-bMa_k4awmSZ2mW5pqwBvKJEdyevP650&libraries=drawing,places&callback=initMap"async defer></script>
@endsection