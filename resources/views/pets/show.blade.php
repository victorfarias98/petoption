@extends('include.app')
@section('title', $pet->nickname)

@section('content')
<div class="row">
    <div class="col-md-6">
        <div class="card">
        <div class="card-body">
           <h5 class="card-title">{{ $pet->nickname }}</h5>
            <p class="card-text">
                {{ $pet->description }}
            </p>
        </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="card">
            <div class="card-header">
                <img src="../pet_thumbs/{{$pet->thumb}}" class="card-img-top img-fluid"
                    alt="Imagem do pet- {{ $pet->nickname }}">
            </div>
            <div class="card-body">
                <p class="card-text">{{ $breed->title }}</p>
                <p class="card-text">{{ $category->title }}</p>
            </div>
        </div>
    </div>
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Onde esse pet foi encontrado</h4>
            </div>
            <div class="card-body">
                <p class="card-text">
                    <h5 class="card-title">{{ $address->street }} , {{ $address->district }} , {{ $address->city }} - {{ $address->state}}</h5>
                </p>
            </div>
            <div id="mapid" style="height:400px;"></div>
            <div class="card-body">
                <small class="card-text">{{ $display_name }}</small>
            </div>
        </div>
    </div>
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Quem Encontrou esse pet</h4>
            </div>
            <div class="card-body py-4 px-5">
                <div class="d-flex align-items-center">
                    <div class="avatar avatar-xl">
                        <img src="../assets/images/faces/1.jpg" alt="Face 1">
                    </div>
                    <div class="ms-3 name">
                        <h5 class="font-bold">{{ $founder->name }}</h5>
                        <h6 class="text-muted mb-0">{{ $founder->email }}</h6>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
<script>
    var mymap = L.map('mapid').setView([{{$lat}}, {{$lon}}], 20);
    L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token={accessToken}', {
        attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors, Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
        maxZoom: 18,
        id: 'mapbox/streets-v11',
        tileSize: 512,
        zoomOffset: -1,
        accessToken: 'pk.eyJ1IjoidmljdG9yZmFyaWFzOTgiLCJhIjoiY2tzN3dscXlsMG83MzJvcDVxeXR1YWo3aCJ9.06Iexw0Z67CvK2grwOKHoA'
    }).addTo(mymap);
    var marker = L.marker([{{$lat}}, {{$lon}}]).addTo(mymap);
    var circle = L.circle([{{$lat}}, {{$lon}}], {
        color: 'blue',
        fillColor: '#ff03',
        fillOpacity: 0.1,
        radius: 500
    }).addTo(mymap);
</script>
@endsection
