@extends('include.app')
@section('title', $pet->nickname)

@section('content')
<div class="row">
    <div class="col-md-6">
        <div class="card">


        <div class="card-body">
            <a href="{{ route('pets.show', $pet->id ) }}"><h5 class="card-title">{{ $pet->nickname }}</h5></a>
            <p class="card-text">
                {{ $pet->description }}
            </p>

        </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="card">
            <div class="card-content">
                <img src="pet_thumbs/{{$pet->thumb}}" class="card-img-top img-fluid"
                    alt="Imagem do pet- {{ $pet->nickname }}">
            </div>
        </div>
    </div>
</div>
<div class="row">

</div>
@endsection
